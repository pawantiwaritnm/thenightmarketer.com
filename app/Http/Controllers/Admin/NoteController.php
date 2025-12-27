<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crm\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of notes
     */
    public function index()
    {
        $notes = Note::with('addedBy')
            ->orderBy('added_on', 'desc')
            ->get();

        return view('admin.notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new note
     */
    public function create()
    {
        return view('admin.notes.create');
    }

    /**
     * Store a newly created note
     */
    public function store(Request $request)
    {
        $request->validate([
            'topic' => 'required|string|max:200',
            'date' => 'required|date',
            'text' => 'required',
        ]);

        try {
            Note::create([
                'topic' => $request->topic,
                'date' => $request->date,
                'text' => $request->text,
                'type' => $request->type ?? 0,
                'status' => 1,
                'added_on' => now(),
                'updated_on' => now(),
                'added_by' => auth()->id()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Notes added successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add Notes: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified note
     */
    public function show($id)
    {
        $note = Note::with('addedBy')->findOrFail($id);
        return view('admin.notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified note
     */
    public function edit($id)
    {
        $note = Note::findOrFail($id);
        return view('admin.notes.edit', compact('note'));
    }

    /**
     * Update the specified note
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'topic' => 'required|string|max:200',
            'date' => 'required|date',
            'text' => 'required',
        ]);

        try {
            $note = Note::findOrFail($id);

            $note->update([
                'topic' => $request->topic,
                'date' => $request->date,
                'text' => $request->text,
                'updated_on' => now()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Notes updated successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Notes: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified note
     */
    public function destroy($id)
    {
        try {
            $note = Note::findOrFail($id);
            $note->status = -1;
            $note->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Note deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update note status
     */
    public function updateStatus(Request $request)
    {
        try {
            $note = Note::findOrFail($request->id);
            $note->status = $request->status;
            $note->save();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'fail'], 500);
        }
    }
}
