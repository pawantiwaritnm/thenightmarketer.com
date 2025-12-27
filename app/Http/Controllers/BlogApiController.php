<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;


class BlogApiController extends Controller
{
    /**
     * Create blog via webhook API (pending approval)
     */
    public function createBlogWebhook(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slug' => 'nullable|string|max:255',
            'category_id' => 'nullable|integer|exists:blog_categories,id',
            'category_name' => 'nullable|string|max:255',
            'tags' => 'nullable|string',
            'image_url' => 'nullable|url',
            'featured_images_urls' => 'nullable|array',
            'featured_images_urls.*' => 'url',
            'status' => 'nullable|integer', // Optional status field (default to 0 or 1)
        ]);

        // Handle category: if category_id provided and valid, use it.
        // Else if category_name provided, find or create the category.
        $categoryId = null;
        if (!empty($validated['category_id'])) {
            $categoryId = $validated['category_id'];
        } elseif (!empty($validated['category_name'])) {
            $category = BlogCategory::firstOrCreate(
                ['name' => $validated['category_name']],
                ['slug' => Str::slug($validated['category_name']), 'status' => 1]
            );
            $categoryId = $category->id;
        } else {
            // If no category info provided, you can decide default category or error
            return response()->json(['error' => 'Category ID or name required'], 422);
        }

        // Prepare blog data
        $blogData = [
            'title' => $validated['title'],
            'subtitle' => $validated['title'],
            'desc' => $validated['content'],
            'slug' => Str::slug($validated['slug'] ?? $validated['title']),
            'blog_category_id' => $categoryId,
            'author_id' => 2,               // Default author ID as per request
            'is_approved' => 0,             // Pending approval
            'first_approved' => 0,          // Pending first approval
            'status' => $validated['status'] ?? 0,
            'tags' => $validated['tags'] ?? null,
            'image' => null,
        ];

        if (!empty($validated['image_url'])) {
            try {
                $response = Http::get($validated['image_url']);

                if ($response->successful()) {
                    $imageContents = $response->body();

                    $extension = pathinfo(parse_url($validated['image_url'], PHP_URL_PATH), PATHINFO_EXTENSION);
                    if (!in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                        $extension = 'jpg';
                    }

                    $fileName =  uniqid() . '.' . $extension;

                    Storage::disk('public')->put('blogs/' . $fileName, $imageContents);

                    // ✅ Use full accessible path
                    $blogData['image'] = 'blogs/' . $fileName;
                }
            } catch (\Exception $e) {
                \Log::error('Image download failed: ' . $e->getMessage());
            }
        }


        // Create blog
        $blog = Blog::create($blogData);

        // Handle featured images URLs if any (optional)
        if (!empty($validated['featured_images_urls']) && is_array($validated['featured_images_urls'])) {
            $featuredImagesData = array_map(fn($url) => ['image' => $url], $validated['featured_images_urls']);
            $blog->images()->createMany($featuredImagesData);
        }

        return response()->json([
            'message' => 'Blog created successfully and is pending approval',
            'blog_id' => $blog->id,
            'slug' => $blog->slug,
        ], 201);
    }
}
