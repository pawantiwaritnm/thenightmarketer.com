<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Http\Requests\BlogRequest;
use App\Models\Admin;
use App\Models\BlogImage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use App\Helpers\SitemapHelper;



class BlogController extends Controller
{
    public $path = "admin.pages.blog.";

    public $route = "blog.";
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Getting query parameters from request
        $query = $request->input('query');
        $status = $request->input('status');
        $authorId = $request->input('author_id');

        $authors = Admin::all();

        // Start building the query for blogs
        $blogsQuery = Blog::query()
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('title', 'like', "%$query%");
            })
            ->when($status !== null && $status !== -1, function ($queryBuilder) use ($status) {
                return $queryBuilder->where('status', $status);
            })
            ->when($authorId, function ($queryBuilder) use ($authorId) {
                return $queryBuilder->where('author_id', $authorId);
            });

        // Get the logged-in user role and ID from the session
        $user = auth()->user();
        $role = $user->role;
        $userId = $user->id;

        // Filter based on user role
        // if ($role === 'Author') {
        //     $blogsQuery->where('author_id', $userId);
        // }

        // Order the blogs by 'id' descending
        $blogsQuery->where('first_approved', 1)->orderBy('id', 'desc');

        // Paginate the results
        $blogs = $blogsQuery->paginate(10);

        return view($this->path . "index", compact('blogs', 'authors'));
    }
    public function incrementShareCount($id, Request $request)
    {
        $blog = Blog::findOrFail($id);
    
        // Increment the share count by 1
        $blog->increment('share_cnt');
    
        // Refresh the model to get the latest data
        $blog->refresh();
    
        // Check if the share count is still null
        // \Log::info('New share count after refresh: ' . $blog->share_cnt);
    
        return response()->json(['status' => 'success', 'share_cnt' => $blog->share_cnt]);
    }
    

    public function pendingBlogs(Request $request)
    {
        // Getting query parameters from request
        $query = $request->input('query');
        $status = $request->input('status');

        // Getting blogs and applying query and status filters
        $blogsQuery = Blog::query()
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('title', 'like', "%$query%");
            })
            ->when($status !== null && $status !== -1, function ($queryBuilder) use ($status) {
                return $queryBuilder->where('status', $status);
            })->where('is_approved', '!=', 1)
            ->orderBy('id', 'desc');


        // Paginating the results
        $blogs = $blogsQuery->paginate(10);


        return view($this->path . "pending", compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //getting all active blog categories
        $blogCategories = BlogCategory::where("status", 1)->get();
        //getting authors list from admins table where role is author
        $authors = Admin::where("role", "Author")->get();
        return view($this->path . "create", compact('blogCategories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $featured_images = [];
        // getting validated data
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['slug']);
        if ($request->filled('tags')) {
            $validated['tags'] = $request->input('tags');
        }

        // Check the user's role and set the 'is_approved' field
        if (session('role') == 'Author') {
            $validated['is_approved'] = 0;
            $validated['first_approved'] = 0;
        } else {
            $validated['is_approved'] = 1;
            $validated['first_approved'] = 1;
        }

        // checking if image is uploaded
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/blogs');
            $validated['image'] = 'blogs/' . basename($imagePath);
        }

        // checking if featured images are uploaded
        if ($request->hasFile('featured_images')) {
            foreach ($request->file('featured_images') as $file) {
                // uploading each featured image to public/blogs and storing the path as blogs/image_name
                $path = $file->store('public/blogs');
                $featured_images[] = 'blogs/' . basename($path);
            }
        }

        // inserting blog data
        $blog = Blog::create($validated);
        // attaching featured images to blog
        $blog->images()->createMany(
            array_map(function ($image) {
                return ['image' => $image];
            }, $featured_images)
        );

      SitemapHelper::update();

        return redirect()
            ->route("blog-list")
            ->with(['status' => 'Success', 'msg' => 'Blog created successfully']);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    { //getting all active blog categories
        $Blog = Blog::find($id);
        $blogCategories = BlogCategory::where("status", 1)->get();
        //getting authors list from admins table where role is author
        $authors = Admin::where("role", "Author")->get();
        return view($this->path . 'create', [
            'blog' => $Blog,
            'blogCategories' => $blogCategories,
            'authors' => $authors
        ]);
    }

    public function updateBlogApproval($id, Request $request)
    {
        // Find the blog by its ID
        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json(['error' => 'Blog not found'], 404);
        }

        // Update the approval status (0 for pending, 1 for approved)
        $blog->is_approved = $request->input('is_approved');
        $blog->first_approved = 1;
        $blog->save();

        // Return a success response
        return response()->json(['message' => 'Blog approval status updated successfully']);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, $id)
    {
        // dd($request->all());

        // Find the blog by its ID
        $Blog = Blog::find($id);

        $featured_images = [];
        // Getting validated data
        $validated = $request->validated();

// Store tags as a comma-separated string
if ($request->filled('tags')) {
    $validated['tags'] = $request->input('tags');
}
        // Check the user's role and set the 'is_approved' field
        if (session('role') == 'Author') {
            $validated['is_approved'] = 1;
            $validated['first_approved'] = 1;
        } else {
            $validated['is_approved'] = 1;
            $validated['first_approved'] = 1;
        }

        // Checking if an image is uploaded
        if ($request->hasFile('image')) {
            // Uploading blog image to public/blogs and removing 'public/' from the stored path
            $path = $request->file('image')->store('public/blogs');
            $validated['image'] = str_replace('public/', '', $path);
        }

        // Checking if featured images are uploaded
        if ($request->hasFile('featured_images')) {
            // Uploading featured images to public/blogs and removing 'public/' from the stored paths
            foreach ($request->file('featured_images') as $file) {
                $path = $file->store('public/blogs');
                $featured_images[] = str_replace('public/', '', $path);
            }

            // Attaching featured images to the blog
            $Blog->images()->createMany(
                array_map(fn($image) => ['image' => $image], $featured_images)
            );
        }

        // Generating a slug for the blog
        $validated['slug'] = Str::slug($validated['slug']);

        // Updating blog data
        $Blog->update($validated);
        SitemapHelper::update();
        return redirect()
            ->route('blog-list')
            ->with(['status' => 'Success', 'msg' => 'Blog updated successfully']);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $Blog)
    {
        //deleting images from storage
        foreach ($Blog->images as $image) {
            if ($image->image && Storage::exists("public/blogs/{$image->image}"))
                Storage::delete("public/blogs/{$image->image}");
            $image->delete();
        }
        //deleting blog
        $Blog->delete();
        //redirecting user back to blogs list page
        return redirect()
            ->route("blog-list")
            ->with(['status' => 'Success', 'msg' => "Blog '{$Blog->title}' deleted successfully"]);
    }

    /**
     * Delete a blog image
     */
    public function deleteImage(BlogImage $BlogImage)
    {
        //checking if image exists
        if ($BlogImage->image && Storage::exists("public/blogs/{$BlogImage->image}"))
            Storage::delete("public/blogs/{$BlogImage->image}");

        // deleting blog image
        $BlogImage->delete();
        //returning response
        return response()->json(
            [
                'status' => 'ok',
                'message' => 'Image deleted successfully.'
            ],
            Response::HTTP_OK
        );
    }

    public function updateBlogStatus($id, Request $request)
    {
        $service = Blog::find($id);

        if (!$service) {
            return response()->json(['error' => 'Service not found'], 404);
        }

        $service->status = $request->input('status');
        $service->save();

        return response()->json(['message' => 'Service status updated successfully']);
    }
}
