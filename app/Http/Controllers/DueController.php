<?php

namespace App\Http\Controllers;

use App\Http\Requests\DueRequest;
use App\Models\Admin;
use App\Models\Due;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class DueController extends Controller
{
    public $path = "admin.pages.due.";
    public $route = "due.";
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Paginating the dues with 10 items per page (you can adjust the number as needed)
    $dues = Due::paginate(10);
    return view($this->path . "index", compact('dues'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {  
        //getting admins
        $admins = Admin::all();
        return view($this->path . "create", compact("admins"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DueRequest $dueRequest)
    {              
        $validatedData = $dueRequest->validated();
        // Set the slug attribute using the title
        $validatedData['slug'] = Str::slug($validatedData['title']);
        // Create the Due instance
        $Due = Due::create($validatedData);
       // print_r($Due); die('ok');
        $DueDates = [];
        if (is_array($dueRequest->input()['due_date']))
            foreach ($dueRequest->input()['due_date'] as $key => $value) {
                $DueDates[$key]['date'] = $value;
                $DueDates[$key]['desc'] = $dueRequest->input()['due_desc'][$key];
                $DueDates[$key]['type'] = $dueRequest->input()['due_type'][$key];
                $DueDates[$key]['link'] = $dueRequest->input()['due_link'][$key];
            }
        $Due->dueDates()->createMany($DueDates);
        return redirect()
            ->route("due-list")
            ->with(['status' => 'Success', 'msg' => 'Due added successfully']);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //getting data
        $due = Due::with('dueDates')->findOrFail($id);
        $admins = Admin::all();
        return view($this->path . "create", compact('due', 'admins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DueRequest $dueRequest,$id)
    {
        $due = Due::find($id);
        $due->update($dueRequest->validated());
        // Get the IDs of existing due dates
        $existingDueDateIds = $due->dueDates->pluck('id')->toArray();
        $dueDates = [];
        foreach ($dueRequest->input()['due_date'] as $key => $value) {
            $dueDateData = [
                'date' => $value,
                'desc' => $dueRequest->input()['due_desc'][$key],
                'type' => $dueRequest->input()['due_type'][$key],
                'link' => $dueRequest->input()['due_link'][$key],
            ];
            // If due_id is present, update existing due date
            if (isset($dueRequest->input()['due_id'][$key])) {
                $due->dueDates()->where('id', $dueRequest->input()['due_id'][$key])->update($dueDateData);
                // Remove the ID from the existing IDs array
                unset($existingDueDateIds[array_search($dueRequest->input()['due_id'][$key], $existingDueDateIds)]);
            } else {
                // Add new due date data to the array
                $dueDates[] = $dueDateData;
            }
        }
    
        // Delete remaining due dates that were not updated
        $due->dueDates()->whereIn('id', $existingDueDateIds)->delete();
        // Create new due dates
        $due->dueDates()->createMany($dueDates);
    
        return redirect()
            ->route('due-list')
            ->with(['status' => 'Success', 'msg' => 'Data updated successfully']);
    }
    

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Due $Due)
    {
        //deleting due
        $Due->delete();
        //redirecting user back to dues list page
        return redirect()
            ->route("due-list")
            ->with(['status' => 'Success', 'msg' => "Due '{$Due->title}' deleted successfully"]);
    }
}
