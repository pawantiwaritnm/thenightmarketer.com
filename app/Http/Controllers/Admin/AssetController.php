<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crm\Asset;
use App\Models\Crm\Client;
use App\Models\Crm\AssetCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{
    /**
     * Display a listing of assets
     */
    public function index(Request $request)
    {
        $query = Asset::with(['client', 'categories', 'images', 'addedBy']);

        if ($request->has('type') && $request->type) {
            $query->whereHas('categories', function($q) use ($request) {
                $q->where('cat_id', $request->type);
            });
        }

        $assets = $query->orderBy('added_on', 'desc')->get();
        $categories = AssetCategory::where('status', 1)->get();
        $clients = Client::where('status', 1)->get();

        return view('admin.assets.index', compact('assets', 'categories', 'clients'));
    }

    /**
     * Show the form for creating a new asset
     */
    public function create()
    {
        $categories = AssetCategory::where('status', 1)->get();
        $clients = Client::where('status', 1)->get();

        return view('admin.assets.create', compact('categories', 'clients'));
    }

    /**
     * Store a newly created asset
     */
    public function store(Request $request)
    {
        $request->validate([
            'file_name' => 'required|string|max:200',
            'client_id' => 'required|exists:client_master,id',
        ]);

        try {
            DB::beginTransaction();

            $asset = Asset::create([
                'file_name' => $request->file_name,
                'client_id' => $request->client_id,
                'link' => $request->link,
                'financial_year' => 1,
                'status' => 1,
                'added_on' => now(),
                'updated_on' => now(),
                'added_by' => auth()->id()
            ]);

            // Handle multiple image uploads
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $imagePath = $image->store('assets', 'public');

                    DB::table('asset_images')->insert([
                        'image' => $imagePath,
                        'asset_id' => $asset->id,
                        'added_on' => now()
                    ]);
                }
            }

            // Add categories
            if ($request->has('cat_id') && is_array($request->cat_id)) {
                foreach ($request->cat_id as $categoryId) {
                    DB::table('asset_cat')->insert([
                        'asset_class_id' => $asset->id,
                        'cat_id' => $categoryId
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Asset added successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to add Asset: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified asset
     */
    public function show($id)
    {
        $asset = Asset::with(['client', 'categories', 'images', 'addedBy'])->findOrFail($id);
        return view('admin.assets.show', compact('asset'));
    }

    /**
     * Show the form for editing the specified asset
     */
    public function edit($id)
    {
        $asset = Asset::with(['categories', 'images'])->findOrFail($id);
        $categories = AssetCategory::where('status', 1)->get();
        $clients = Client::where('status', 1)->get();
        $categoryIds = $asset->categories->pluck('id')->toArray();

        return view('admin.assets.edit', compact('asset', 'categories', 'clients', 'categoryIds'));
    }

    /**
     * Update the specified asset
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'file_name' => 'required|string|max:200',
            'client_id' => 'required|exists:client_master,id',
        ]);

        try {
            DB::beginTransaction();

            $asset = Asset::findOrFail($id);

            $asset->update([
                'file_name' => $request->file_name,
                'client_id' => $request->client_id,
                'link' => $request->link,
                'updated_on' => now()
            ]);

            // Handle multiple image uploads
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $imagePath = $image->store('assets', 'public');

                    DB::table('asset_images')->insert([
                        'image' => $imagePath,
                        'asset_id' => $asset->id,
                        'added_on' => now()
                    ]);
                }
            }

            // Update categories
            DB::table('asset_cat')->where('asset_class_id', $id)->delete();

            if ($request->has('cat_id') && is_array($request->cat_id)) {
                foreach ($request->cat_id as $categoryId) {
                    DB::table('asset_cat')->insert([
                        'asset_class_id' => $asset->id,
                        'cat_id' => $categoryId
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Asset updated successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Asset: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified asset
     */
    public function destroy($id)
    {
        try {
            $asset = Asset::findOrFail($id);
            $asset->status = -1;
            $asset->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Asset deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update asset status
     */
    public function updateStatus(Request $request)
    {
        try {
            $asset = Asset::findOrFail($request->id);
            $asset->status = $request->status;
            $asset->save();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'fail'], 500);
        }
    }

    /**
     * View asset documents/images
     */
    public function viewDocuments($id)
    {
        $asset = Asset::with('images')->findOrFail($id);
        return view('admin.assets.documents', compact('asset'));
    }
}
