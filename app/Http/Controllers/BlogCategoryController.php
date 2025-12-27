<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCategoryRequest;
use Illuminate\Http\Request;
use \App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public $path = "admin.pages.blogCategory.";
    public $route = "blog_category.";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = BlogCategory::withCount('blogs')
            ->where('status', '!=', -1)
            ->orderBy('id', 'desc')
            ->get();
        return view($this->path . "index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //getting all categories
        $categories = BlogCategory::all();
        //passing categories to view
        return view($this->path . "create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogCategoryRequest $request)
    {
         
        BlogCategory::create($request->validated());
        return redirect()
            ->route("blog-category-list")
            ->with(['status' => 'Success', 'msg' => 'Category created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogCategory)
    {
        return view($this->path . 'show', ['category' => $blogCategory]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogCategory)
    {
        //getting all categories except the one being edited
        $categories = BlogCategory::where('id', '!=', $blogCategory->id)->get();
        //passing categories to view
        return view($this->path . 'create', ['category' => $blogCategory, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogCategory $BlogCategory, BlogCategoryRequest $request)
    {
        $BlogCategory->update($request->validated());
        return redirect()
            ->route($this->route . "index")
            ->with(['status' => 'Success', 'msg' => 'Category updated successfully']);
    }

    /**
     * Remove the specified resource from storage (soft delete).
     */
    public function destroy($id)
    {
        $blogCategory = BlogCategory::findOrFail($id);

        // Soft delete: Set status to -1 instead of actually delating
        $blogCategory->update(['status' => -1]);
        return redirect()
            ->route("blog-category-list")
            ->with(['status' => 'Success', 'msg' => "Category '{$blogCategory->name}' deleted successfully"]);
    }

    /**
     * Toggle category status
     */
    public function toggleStatus(Request $request, $id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->update(['status' => $request->status]);

        return response()->json(['message' => 'Category status updated successfully']);
    }
}
