<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crm\Portfolio;
use App\Models\Crm\Industry;
use App\Models\Crm\PortfolioCategory;
use App\Models\Crm\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of portfolios
     */
    public function index()
    {
        $portfolios = Portfolio::with(['category', 'industryRelation', 'addedBy'])
            ->orderBy('added_on', 'desc')
            ->get();

        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new portfolio
     */
    public function create()
    {
        $industries = Industry::where('status', 1)->get();
        $technologies = Technology::where('status', 1)->get();
        $categories = PortfolioCategory::where('status', 1)->get();
         
        return view('admin.portfolios.create', compact('industries', 'categories','technologies'));
    }

    /**
     * Store a newly created portfolio
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_project_name' => 'required|string|max:200',
            'industry' => 'required',
            'category_id' => 'required',
        ]);

        try {
            $uploadedFile = '';

            if ($request->hasFile('upload_file')) {
                $file = $request->file('upload_file');
                $uploadedFile = $file->store('portfolios', 'public');
            }

            Portfolio::create([
                'client_project_name' => $request->client_project_name,
                'industry' => $request->industry,
                'url' => $request->url,
                'android_app_url' => $request->android_app_url,
                'mobile_app_url' => $request->mobile_app_url,
                'category_id' => $request->category_id,
                'figma_link' => $request->figma_link,
                'upload_file' => $uploadedFile,
                'financial_year' => 1,
                'status' => 1,
                'added_on' => now(),
                'updated_on' => now(),
                'added_by' => auth()->id()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Portfolio added successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add Portfolio: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified portfolio
     */
    public function show($id)
    {
        $portfolio = Portfolio::with(['category', 'industryRelation', 'addedBy'])->findOrFail($id);
        return view('admin.portfolios.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified portfolio
     */
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $industries = Industry::where('status', 1)->get();
        $categories = PortfolioCategory::where('status', 1)->get();

        return view('admin.portfolios.edit', compact('portfolio', 'industries', 'categories'));
    }

    /**
     * Update the specified portfolio
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'client_project_name' => 'required|string|max:200',
            'industry' => 'required',
            'category_id' => 'required',
        ]);

        try {
            $portfolio = Portfolio::findOrFail($id);

            $uploadedFile = $portfolio->upload_file;

            if ($request->hasFile('upload_file')) {
                // Delete old file
                if ($uploadedFile) {
                    Storage::disk('public')->delete($uploadedFile);
                }
                $file = $request->file('upload_file');
                $uploadedFile = $file->store('portfolios', 'public');
            }

            $portfolio->update([
                'client_project_name' => $request->client_project_name,
                'industry' => $request->industry,
                'url' => $request->url,
                'android_app_url' => $request->android_app_url,
                'mobile_app_url' => $request->mobile_app_url,
                'category_id' => $request->category_id,
                'figma_link' => $request->figma_link,
                'upload_file' => $uploadedFile,
                'updated_on' => now()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Portfolio updated successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Portfolio: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified portfolio
     */
    public function destroy($id)
    {
        try {
            $portfolio = Portfolio::findOrFail($id);
            $portfolio->status = -1;
            $portfolio->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Portfolio deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update portfolio status
     */
    public function updateStatus(Request $request)
    {
        try {
            $portfolio = Portfolio::findOrFail($request->id);
            $portfolio->status = $request->status;
            $portfolio->save();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'fail'], 500);
        }
    }
}
