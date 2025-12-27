<?php

namespace App\Http\Controllers;

use App\Models\PageMeta;
use Illuminate\Http\Request;

class PageMetaController extends Controller
{
    /**
     * Display a listing of PageMeta records.
     */
    public function index(Request $request)
    {
        $query = PageMeta::query();
    
        // Filter by slug if provided
        if ($request->has('slug') && !empty($request->slug)) {
            $query->where('slug', 'like', '%' . $request->slug . '%');
        }
    
        $pageMetas = $query->get();
    
        // Check if the request is AJAX
        if ($request->ajax()) {
            return view('admin.pages.pagemeta.partials.pagemeta-list', compact('pageMetas'));
        }
    
        // For non-AJAX requests, return the full view
        return view('admin.pages.pagemeta.index', compact('pageMetas'));
    }
    

    /**
     * Show the form for creating a new PageMeta record.
     */
    public function create()
    {
        return view('admin.pages.pagemeta.create');
    }

    /**
     * Store a new PageMeta record.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'slug' => 'required|string|unique:page_meta,slug',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'meta_keyword' => 'required|string',
        ]);

        PageMeta::create($validated);

        return redirect()->route('pagemeta.index')->with('success', 'PageMeta created successfully!');
    }

    /**
     * Show the form for editing a specific PageMeta record.
     */
    public function edit($id)
    {
        $pageMeta = PageMeta::findOrFail($id);
        return view('admin.pages.pagemeta.edit', compact('pageMeta'));
    }

    /**
     * Update an existing PageMeta record.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'slug' => 'sometimes|required|string|unique:page_meta,slug,' . $id,
            'meta_title' => 'sometimes|required|string',
            'meta_description' => 'sometimes|required|string',
            'meta_keyword' => 'sometimes|required|string',
        ]);

        $pageMeta = PageMeta::findOrFail($id);
        $pageMeta->update($validated);

        return redirect()->route('pagemeta.index')->with('success', 'PageMeta updated successfully!');
    }

    /**
     * Delete a PageMeta record.
     */
    public function destroy($id)
    {
        $pageMeta = PageMeta::findOrFail($id);
        $pageMeta->delete();

        return redirect()->route('pagemeta.index')->with('success', 'PageMeta deleted successfully!');
    }
}
