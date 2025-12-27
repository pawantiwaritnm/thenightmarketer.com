<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
{
    $categories = Category::with('parent')->paginate(10);
    return view('admin.pages.categories.index', compact('categories'));
}


    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.pages.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        }

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'parent_id' => $request->parent_id,
            'url' => $request->url,
            'image' => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category added successfully.');
    }

    public function edit(Category $category)
{
    $categories = Category::whereNull('parent_id')->where('id', '!=', $category->id)->get();
    return view('admin.pages.categories.create', compact('category', 'categories'));
}

 
     // Update an existing category in the database
     public function update(Request $request, Category $category)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'status' => 'required|in:0,1',
             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);
 
         if ($request->hasFile('image')) {
             // Delete old image if it exists
             if ($category->image) {
                 Storage::disk('public')->delete($category->image);
             }
             $category->image = $request->file('image')->store('categories', 'public');
         }
 
         $category->update([
             'name' => $request->name,
             'slug' => Str::slug($request->name),
             'parent_id' => $request->parent_id,
             'url' => $request->url,
             'status' => $request->status,
         ]);
 
         return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
     }

    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
    public function updateStatus(Request $request, $id)
{
    $category = Category::findOrFail($id);
    $category->status = $request->status;
    $category->save();

    return response()->json(['message' => 'Status updated successfully.']);
}

}
