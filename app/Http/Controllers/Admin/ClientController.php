<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crm\Client;
use App\Models\Crm\ClientCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of clients
     */
    public function index()
    {
        $clients = Client::with(['categories', 'addedBy'])
            ->orderBy('added_on', 'desc')
            ->get();

        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new client
     */
    public function create()
    {
        $categories = ClientCategory::where('status', 1)->get();
        return view('admin.clients.create', compact('categories'));
    }

    /**
     * Store a newly created client
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:200',
            'client_email' => 'required|email|max:100',
            'client_phone' => 'required|string|max:20',
        ]);

        try {
            DB::beginTransaction();

            $client = Client::create([
                'client_name' => $request->client_name,
                'client_email' => $request->client_email,
                'client_phone' => $request->client_phone,
                'poc_name' => $request->poc_name,
                'poc_phone' => $request->poc_phone,
                'poc_email' => $request->poc_email,
                'client_locations' => $request->client_locations,
                'financial_year' => 1,
                'status' => 1,
                'added_on' => now(),
                'updated_on' => now(),
                'added_by' => auth()->id()
            ]);

            // Add categories if provided
            if ($request->has('category_id') && is_array($request->category_id)) {
                foreach ($request->category_id as $categoryId) {
                    DB::table('client_category')->insert([
                        'client_id' => $client->id,
                        'category_id' => $categoryId
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Client added successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to add Client: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified client
     */
    public function show($id)
    {
        $client = Client::with(['categories', 'projects', 'addedBy'])->findOrFail($id);
        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified client
     */
    public function edit($id)
    {
        $client = Client::with('categories')->findOrFail($id);
        $categories = ClientCategory::where('status', 1)->get();
        $categoryIds = $client->categories->pluck('id')->toArray();

        return view('admin.clients.edit', compact('client', 'categories', 'categoryIds'));
    }

    /**
     * Update the specified client
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'client_name' => 'required|string|max:200',
            'client_email' => 'required|email|max:100',
            'client_phone' => 'required|string|max:20',
        ]);

        try {
            DB::beginTransaction();

            $client = Client::findOrFail($id);

            $client->update([
                'client_name' => $request->client_name,
                'client_email' => $request->client_email,
                'client_phone' => $request->client_phone,
                'poc_name' => $request->poc_name,
                'poc_phone' => $request->poc_phone,
                'poc_email' => $request->poc_email,
                'client_locations' => $request->client_locations,
                'updated_on' => now()
            ]);

            // Update categories
            DB::table('client_category')->where('client_id', $id)->delete();

            if ($request->has('category_id') && is_array($request->category_id)) {
                foreach ($request->category_id as $categoryId) {
                    DB::table('client_category')->insert([
                        'client_id' => $client->id,
                        'category_id' => $categoryId
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Client updated successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Client: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified client
     */
    public function destroy($id)
    {
        try {
            $client = Client::findOrFail($id);
            $client->status = -1;
            $client->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Client deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update client status
     */
    public function updateStatus(Request $request)
    {
        try {
            $client = Client::findOrFail($request->id);
            $client->status = $request->status;
            $client->save();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'fail'], 500);
        }
    }
}
