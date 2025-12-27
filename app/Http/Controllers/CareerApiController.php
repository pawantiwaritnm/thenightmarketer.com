<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\JobListing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CareerApiController extends Controller
{
    // Get career details with limit and offset
    public function getCareerDetails(Request $request)
    {
        // Validate the limit and offset parameters
        $validated = $request->validate([
            'limit' => 'nullable|integer|min:1', // Limit of records per request
            'offset' => 'nullable|integer|min:0', // Offset to skip records
        ]);

        // Set default values for pagination
        $limit = $validated['limit'] ?? 50;  // Default limit to 50 items per request
        $offset = $validated['offset'] ?? 0; // Default offset to 0 (start from first record)

        // Query careers with limit and offset
        $careers = Career::skip($offset)->take($limit)->get();
        $totalItems = Career::count(); // Total count for pagination

        // Prepare the response data
        $data = [];

        foreach ($careers as $career) {
            // Extract the job title (first two words) from the career's role
            $jobTitleWords = explode(' ', $career->role);
            $jobTitle = implode(' ', array_slice($jobTitleWords, 0, 2));

            // Find job listing based on the job title (first two words)
            $jobListing = JobListing::where('title', 'like', '%' . $jobTitle . '%')->first();

            // Add the career form and job listing details to the response data
            $data[] = [
                'career' => [
                    'id' => $career->id,
                    'name' => $career->name,
                    'email' => $career->email,
                    'phone' => $career->phone,
                    'role' => $career->role,
                    'experience' => $career->experience,
                    'resume_path' => $career->resume_path ? url('storage/' . $career->resume_path) : null, // Full URL for resume
                    'cover' => $career->cover,
                    'created_at' => $career->created_at->format('d M Y'),
                    'skills_req' => $jobListing ? $jobListing->skills_req : null,
                    'job_description' => $jobListing ? $jobListing->long_desc : null,
                ]
            ];
        }

        // Return the response with paginated career forms
        return response()->json([
            'data' => $data,
            'current_page' => ceil(($offset + 1) / $limit),  // Calculate current page based on offset and limit
            'total_pages' => ceil($totalItems / $limit),      // Total pages based on limit and total items
            'total_items' => $totalItems,                      // Total number of items available
        ]);
    }
    // Update career details based on ID
    // public function updateCareerDetails(Request $request, $id)
    // {
    //     // Validate incoming request data
    //     $validated = $request->validate([
    //         'risk_factor' => 'nullable|string',
    //         'reward_factor' => 'nullable|string',
    //         'overall_fit' => 'nullable|string',
    //         'justification' => 'nullable|string',
    //     ]);

    //     // Find the career record by ID
    //     $career = Career::find($id);

    //     if (!$career) {
    //         return response()->json(['message' => 'Career not found'], 404);
    //     }

    //     // Update the record with the new fields if provided
    //     $career->risk_factor = $validated['risk_factor'] ?? $career->risk_factor;
    //     $career->reward_factor = $validated['reward_factor'] ?? $career->reward_factor;
    //     $career->overall_fit = $validated['overall_fit'] ?? $career->overall_fit;
    //     $career->justification = $validated['justification'] ?? $career->justification;

    //     // Save the updated career record
    //     $career->save();

    //     // Return success response
    //     return response()->json([
    //         'message' => 'Career details updated successfully',
    //         'career' => $career
    //     ]);
    // }
     public function updateCareerDetails(Request $request, $id)
    {
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'risk_factor' => 'nullable|string|max:1000',
            'reward_factor' => 'nullable|string|max:1000',
            'overall_fit' => 'nullable|string|max:255',
            'justification' => 'nullable|string|max:4000',
        ]);

        // If validation fails, return a detailed error response
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 400);  // Bad Request
        }

        // Find the career record by ID
        $career = Career::find($id);

        // If the career record is not found, return an error response
        if (!$career) {
            return response()->json([
                'message' => 'Career not found'
            ], 404);  // Not Found
        }

        // Update the career record with the new fields if provided
        $career->risk_factor = $request->input('risk_factor', $career->risk_factor);
        $career->reward_factor = $request->input('reward_factor', $career->reward_factor);
        $career->overall_fit = $request->input('overall_fit', $career->overall_fit);
        $career->justification = $request->input('justification', $career->justification);

        // Save the updated career record
        $career->save();

        // Return a success response with the updated career data
        return response()->json([
            'message' => 'Career details updated successfully',
            'career' => $career
        ], 200);  // OK
    }
}
