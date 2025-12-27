<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Industry;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $industries = Industry::all();
        $clients = Client::with('industry')
            ->when($request->industry, function($query) use ($request) {
                return $query->where('industry_id', $request->industry);
            })
            ->when($request->status !== null, function($query) use ($request) {
                return $query->where('status', $request->status);
            })
            ->get();
    
        if ($request->ajax()) {
            return view('admin.pages.partials.client-list', compact('clients'))->render();
        }
    
        return view('admin.pages.clients.index', compact('clients', 'industries'));
    }

    public function create()
    {
        $industries = Industry::all();
        return view('admin.pages.clients.form', compact('industries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:150',
            'logo' => 'nullable|image|max:2048',
            'website_url' => 'nullable|string|max:255',
            'industry_id' => 'nullable|exists:industries,id',
            'status' => 'required|in:0,1'
        ]);
    
        // Check if a logo is uploaded
        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('client/logos', 'public');
        }
    
        Client::create($validated);
        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }
    

    public function edit(Client $client)
    {
        $industries = Industry::all();
        return view('admin.pages.clients.form', compact('client', 'industries'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:150',
            'logo' => 'nullable|image|max:2048',
            'website_url' => 'nullable|string|max:255',
            'industry_id' => 'nullable|exists:industries,id',
            'status' => 'required|in:0,1'
        ]);
    
        // Check if a new logo is uploaded
        if ($request->hasFile('logo')) {
            // Delete old logo if it exists
            if ($client->logo) {
                \Storage::disk('public')->delete($client->logo);
            }
    
            // Store the new logo
            $validated['logo'] = $request->file('logo')->store('client/logos', 'public');
        }
    
        $client->update($validated);
        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }
    

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
    public function updateStatus(Request $request, Client $client)
{
    $validated = $request->validate([
        'status' => 'required|in:0,1',
    ]);

    $client->update(['status' => $validated['status']]);

    return response()->json([
        'success' => true,
        'message' => 'Client status updated successfully.',
    ]);
}

public function updateIsHome(Request $request, Client $client)
{
    $validated = $request->validate([
        'is_home' => 'required|in:0,1',
    ]);

    $client->update(['is_home' => $validated['is_home']]);

    return response()->json([
        'success' => true,
        'message' => 'Client home display status updated successfully.',
    ]);
}

}
