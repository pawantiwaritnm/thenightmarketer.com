<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use App\Models\CaseStudySection;
use App\Models\CaseStudyImage;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CaseStudyController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all case studies with optional pagination
        $caseStudies = CaseStudy::with(['sections', 'images'])
            ->orderBy('created_at', 'desc')
            ->paginate(10); // Adjust the pagination limit as needed

        // Return a view or JSON response
        return view('admin.pages.case_study.index', compact('caseStudies'));
    }

    /**
     * Store a new case study along with its sections and images.
     */
    public function create()
    {
        $tags = Tag::all();

        return view('admin.pages.case_study.create', ['caseStudy' => null, 'tags' => $tags]);
    }
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:case_studies,slug|max:255',
            'client_name' => 'required|string|max:255',
            'client_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'summary' => 'nullable|string',
            'duration' => 'nullable|string|max:50',
            'services' => 'nullable|array',
            'services.*' => 'nullable|string|max:100',
            'lessons_title' => 'nullable|string',
            'lessons_desc_1' => 'nullable|string',
            'lessons_desc_2' => 'nullable|string',
            'solution_title' => 'nullable|string',
            'solution_desc' => 'nullable|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner_background' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sections' => 'nullable|array',
            'sections.*.section_type' => 'required|string|max:100',
            'sections.*.heading' => 'nullable|string|max:255',
            'sections.*.content' => 'required|string',
            'sections.*.order' => 'nullable|integer',
            'images' => 'nullable|array',
            'images.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*.caption' => 'nullable|string|max:255',
            'images.*.alt_text' => 'nullable|string|max:255',
            'images.*.order' => 'nullable|integer',
            'statistics_lable' => 'nullable|string',
            'statistics' => 'nullable|array',
            'statistics.*.percentage' => 'required|numeric',
            'statistics.*.title' => 'required|string',
            'statistics.*.description' => 'required|string',
            'tags.*' => 'exists:tags,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            // Handle file uploads
            $bannerImagePath = null;
            if ($request->hasFile('banner_image')) {
                $bannerImagePath = $request->file('banner_image')->store('banners', 'public');
            }

            $bannerBackgroundPath = null;
            if ($request->hasFile('banner_background')) {
                $bannerBackgroundPath = $request->file('banner_background')->store('backgrounds', 'public');
            }

            $clientLogoPath = null;
            if ($request->hasFile('client_logo')) {
                $clientLogoPath = $request->file('client_logo')->store('logos', 'public');
            }

            // Convert services array to JSON
            $servicesJson = $request->has('services') ? json_encode($request->input('services')) : null;

            $slug = $request->input('slug');
            if (empty($slug)) {
                $slug = Str::slug($request->input('title'));
                // Ensure the slug is unique
                $count = CaseStudy::where('slug', 'like', "{$slug}%")->count();
                if ($count > 0) {
                    $slug .= '-' . ($count + 1);
                }
            }
            $statistics = json_encode($request->input('statistics'));


            // Store the main case study
            $caseStudy = CaseStudy::create([
                'title' => $request->input('title'),
                'slug' => $slug,
                'statistics_lable ' => $request->input('statistics_lable'),
                'statistics ' => $statistics,
                'client_name' => $request->input('client_name'),
                'challenge_title' => $request->input('challenge_title'),
                'challenge_desc' => $request->input('challenge_desc'),
                'client_logo' => $clientLogoPath,
                'summary' => $request->input('summary'),
                'duration' => $request->input('duration'),
                'services' => $servicesJson,
                'lessons_title' => $request->input('lessons_title'),
                'lessons_desc_1' => $request->input('lessons_desc_1'),
                'lessons_desc_2' => $request->input('lessons_desc_2'),
                'solution_title' => $request->input('solution_title'),
                'solution_desc' => $request->input('solution_desc'),
                'banner_image' => $bannerImagePath,
                'banner_background' => $bannerBackgroundPath,
            ]);

            // Store sections if provided
            if ($request->has('sections')) {
                foreach ($request->input('sections') as $index => $section) {
                    // Prepare data for section creation
                    $sectionData = [
                        'case_study_id' => $caseStudy->id,
                        'section_type' => $section['section_type'],
                        'heading' => $section['heading'] ?? null,
                        'content' => $section['content'],
                        'order' => $section['order'] ?? 0,
                    ];

                    // Handle the image upload if an image is provided
                    if (isset($section['image']) && $request->hasFile("sections.$index.image")) {
                        $sectionData['image'] = $request->file("sections.$index.image")->store('case_study_sections', 'public');
                    }

                    // Create a new section or update the existing one
                    if (isset($section['id'])) {
                        // Update the existing section if an ID is provided
                        $existingSection = CaseStudySection::find($section['id']);
                        if ($existingSection) {
                            $existingSection->update($sectionData);
                        }
                    } else {
                        // Create a new section if no ID is provided
                        CaseStudySection::create($sectionData);
                    }
                }
            }


            // Store images if provided
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $key => $file) {
                    if ($file->isValid()) {
                        // Store the uploaded image
                        $imagePath = $file->store('case_studies', 'public');

                        // Save the image data to the database
                        CaseStudyImage::create([
                            'case_study_id' => $caseStudy->id,
                            'image_path' => $imagePath,
                            'caption' => $request->input('captions')[$key] ?? null,
                            'alt_text' => $request->input('alt_texts')[$key] ?? null,
                            'order' => $request->input('orders')[$key] ?? 0,
                        ]);
                    }
                }
            }

            // Attach tags
            if ($request->has('tags')) {
                $caseStudy->tags()->sync($request->input('tags'));
            }

            return response()->json(['message' => 'Case study created successfully', 'case_study' => $caseStudy], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while saving the case study.', 'details' => $e->getMessage()], 500);
        }
    }
}
