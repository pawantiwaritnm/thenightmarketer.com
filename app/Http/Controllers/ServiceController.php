<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceSection;
use App\Models\SectionItem;
use App\Helpers\SitemapHelper;

class ServiceController extends Controller
{
    // Display all services
    public function index()
    {
        $services = Service::with('sections.items')->get();
        return view('admin.pages.service.index', compact('services'));
    }

    // Show form to create a new service
    public function create()
    {
        return view('admin.pages.service.create');
    }

    // Store a new service with sections and items
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug',
            'achievements' => 'nullable|string',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:1012',
            'meta_desc' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:1012',
            'desktop_banner' => 'required|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'mobile_banner' => 'required|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'status' => 'required|boolean',
            'service_type' => 'required|in:normal,city',
            'city_name' => 'required_if:service_type,city|nullable|string|max:255',
            'is_city' => 'nullable|boolean',
            'cta1_heading' => 'nullable|string|max:255',
            'cta1_button_text' => 'nullable|string|max:255',
            'cta1_button_link' => 'nullable|string|max:255',
            'cta1_note' => 'nullable|string',
            'cta2_heading' => 'nullable|string|max:255',
            'cta2_button_text' => 'nullable|string|max:255',
            'cta2_button_link' => 'nullable|string|max:255',
            'cta2_note' => 'nullable|string',
            'stats' => 'nullable|array',
            'stats.*.title' => 'required_with:stats|string|max:255',
            'stats.*.value' => 'required_with:stats|string|max:255',
            'stats.*.improvement' => 'nullable|string|max:255',
            'sections' => 'required|array',
            'sections.*.section_type' => 'required|string|in:section_one,section_two,section_three,section_four,section_five,section_six',
            'sections.*.title' => 'required|string|max:255',
            'sections.*.image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'sections.*.description' => 'nullable|string',
            'sections.*.items' => 'nullable|array',
            'sections.*.items.*.title' => 'nullable|string|max:255',
            'sections.*.items.*.description' => 'nullable|string',
            'sections.*.items.*.image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'faqs' => 'nullable|array',
            'faqs.*.question' => 'required_with:faqs|string|max:255',
            'faqs.*.answer' => 'required_with:faqs|string',
        ]);

        // Upload banners
        $desktopBannerPath = $request->file('desktop_banner')->store('service/banners', 'public');
        $mobileBannerPath = $request->file('mobile_banner')->store('service/banners', 'public');

        // Create service
        $service = Service::create([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'achievements' => $validated['achievements'] ?? null,
            'description' => $validated['description'] ?? null,
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_desc' => $validated['meta_desc'] ?? null,
            'meta_keywords' => $validated['meta_keywords'] ?? null,
            'desktop_banner' => $desktopBannerPath,
            'mobile_banner' => $mobileBannerPath,
            'status' => $validated['status'],
            'service_type' => $validated['service_type'],
            'city_name' => $validated['city_name'] ?? null,
            'is_city' => $validated['service_type'] === 'city' ? 1 : 0,
            'cta1_heading' => $validated['cta1_heading'] ?? null,
            'cta1_button_text' => $validated['cta1_button_text'] ?? null,
            'cta1_button_link' => $validated['cta1_button_link'] ?? null,
            'cta1_note' => $validated['cta1_note'] ?? null,
            'cta2_heading' => $validated['cta2_heading'] ?? null,
            'cta2_button_text' => $validated['cta2_button_text'] ?? null,
            'cta2_button_link' => $validated['cta2_button_link'] ?? null,
            'cta2_note' => $validated['cta2_note'] ?? null,
            'stats' => $validated['stats'] ?? null,
        ]);

        // Save sections and items
        if (!empty($validated['sections'])) {
            foreach ($validated['sections'] as $sectionData) {
                // Handle Section Image
                $sectionImagePath = null;
                if (isset($sectionData['image'])) {
                    $sectionImagePath = $sectionData['image']->store('service/sections', 'public');
                }

                // Save Section
                $section = $service->sections()->create([
                    'title' => $sectionData['title'],
                    'section_type' => $sectionData['section_type'],
                    'image' => $sectionImagePath,
                    'description' => $sectionData['description'] ?? null,
                ]);

                // Save Section Items
                if (!empty($sectionData['items'])) {
                    foreach ($sectionData['items'] as $itemData) {
                        // Handle Item Image
                        $itemImagePath = null;
                        if (isset($itemData['image'])) {
                            $itemImagePath = $itemData['image']->store('service/section_items', 'public');
                        }

                        // Save Item
                        $section->items()->create([
                            'title' => $itemData['title'] ?? null,
                            'description' => $itemData['description'] ?? null,
                            'image' => $itemImagePath,
                        ]);
                    }
                }
            }
        }

        // Save FAQs
        if (!empty($validated['faqs'])) {
            foreach ($validated['faqs'] as $faqData) {
                $service->faqs()->create([
                    'question' => $faqData['question'],
                    'answer' => $faqData['answer'],
                ]);
            }
        }

        SitemapHelper::update();

        return redirect()->route('services.index')->with('success', 'Service added successfully!');
    }

    // Show form to edit a service
    public function edit(Service $service)
    {
        $service->load('sections.items', 'faqs');
        return view('admin.pages.service.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug,' . $service->id,
            'achievements' => 'nullable|string',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:1012',
            'meta_desc' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:1012',
            'desktop_banner' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'mobile_banner' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'status' => 'required|boolean',
            'service_type' => 'required|in:normal,city',
            'city_name' => 'required_if:service_type,city|nullable|string|max:255',
            'is_city' => 'nullable|boolean',
            'cta1_heading' => 'nullable|string|max:255',
            'cta1_button_text' => 'nullable|string|max:255',
            'cta1_button_link' => 'nullable|string|max:255',
            'cta1_note' => 'nullable|string',
            'cta2_heading' => 'nullable|string|max:255',
            'cta2_button_text' => 'nullable|string|max:255',
            'cta2_button_link' => 'nullable|string|max:255',
            'cta2_note' => 'nullable|string',
            'stats' => 'nullable|array',
            'stats.*.title' => 'required_with:stats|string|max:255',
            'stats.*.value' => 'required_with:stats|string|max:255',
            'stats.*.improvement' => 'nullable|string|max:255',
            'sections' => 'nullable|array',
            'sections.*.id' => 'nullable|exists:service_sections,id',
            'sections.*.title' => 'required|string|max:255',
            'sections.*.section_type' => 'required|string|in:section_one,section_two,section_three,section_four,section_five,section_six',
            'sections.*.image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'sections.*.description' => 'nullable|string',
            'sections.*.items' => 'nullable|array',
            'sections.*.items.*.id' => 'nullable|exists:section_items,id',
            'sections.*.items.*.title' => 'nullable|string|max:255',
            'sections.*.items.*.description' => 'nullable|string',
            'sections.*.items.*.image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'sections.*._delete' => 'sometimes|boolean',
            'sections.*.items.*._delete' => 'sometimes|boolean',
            'faqs' => 'nullable|array',
            'faqs.*.id' => 'nullable|exists:services_faq,id',
            'faqs.*.question' => 'required_with:faqs|string|max:255',
            'faqs.*.answer' => 'required_with:faqs|string',
            'faqs.*._delete' => 'sometimes|boolean',
        ]);

        // Update service banners if provided
        if ($request->hasFile('desktop_banner')) {
            if ($service->desktop_banner) {
                \Storage::disk('public')->delete($service->desktop_banner);
            }
            $service->desktop_banner = $request->file('desktop_banner')->store('service/banners', 'public');
        }
        
        if ($request->hasFile('mobile_banner')) {
            if ($service->mobile_banner) {
                \Storage::disk('public')->delete($service->mobile_banner);
            }
            $service->mobile_banner = $request->file('mobile_banner')->store('service/banners', 'public');
        }

        // Update the service details
        $service->update([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'achievements' => $validated['achievements'] ?? null,
            'description' => $validated['description'] ?? null,
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_desc' => $validated['meta_desc'] ?? null,
            'meta_keywords' => $validated['meta_keywords'] ?? null,
            'desktop_banner' => $service->desktop_banner,
            'mobile_banner' => $service->mobile_banner,
            'status' => $validated['status'],
            'service_type' => $validated['service_type'],
            'city_name' => $validated['city_name'] ?? null,
            'is_city' => $validated['service_type'] === 'city' ? 1 : 0,
            'cta1_heading' => $validated['cta1_heading'] ?? null,
            'cta1_button_text' => $validated['cta1_button_text'] ?? null,
            'cta1_button_link' => $validated['cta1_button_link'] ?? null,
            'cta1_note' => $validated['cta1_note'] ?? null,
            'cta2_heading' => $validated['cta2_heading'] ?? null,
            'cta2_button_text' => $validated['cta2_button_text'] ?? null,
            'cta2_button_link' => $validated['cta2_button_link'] ?? null,
            'cta2_note' => $validated['cta2_note'] ?? null,
            'stats' => $validated['stats'] ?? null,
        ]);

        // Update sections and items
        if (!empty($validated['sections'])) {
            foreach ($validated['sections'] as $sectionData) {
                // Handle deletion of sections
                if (isset($sectionData['_delete']) && $sectionData['_delete']) {
                    if (isset($sectionData['id'])) {
                        $existingSection = ServiceSection::find($sectionData['id']);
                        if ($existingSection) {
                            foreach ($existingSection->items as $item) {
                                if ($item->image) {
                                    \Storage::disk('public')->delete($item->image);
                                }
                                $item->delete();
                            }
                            if ($existingSection->image) {
                                \Storage::disk('public')->delete($existingSection->image);
                            }
                            $existingSection->delete();
                        }
                    }
                    continue;
                }

                $sectionAttributes = [
                    'title' => $sectionData['title'],
                    'section_type' => $sectionData['section_type'],
                    'description' => $sectionData['description'] ?? null,
                ];

                // Handle section image upload
                if (isset($sectionData['image']) && $sectionData['image']) {
                    if (isset($sectionData['id'])) {
                        $existingSection = ServiceSection::find($sectionData['id']);
                        if ($existingSection && $existingSection->image) {
                            \Storage::disk('public')->delete($existingSection->image);
                        }
                    }
                    $sectionAttributes['image'] = $sectionData['image']->store('service/sections', 'public');
                }

                // Update or create section
                if (isset($sectionData['id'])) {
                    $section = ServiceSection::find($sectionData['id']);
                    if ($section) {
                        $section->update($sectionAttributes);
                    } else {
                        continue;
                    }
                } else {
                    $section = $service->sections()->create($sectionAttributes);
                }

                // Handle items within the section
                if (!empty($sectionData['items'])) {
                    foreach ($sectionData['items'] as $itemData) {
                        // Handle deletion of items
                        if (isset($itemData['_delete']) && $itemData['_delete']) {
                            if (isset($itemData['id'])) {
                                $existingItem = SectionItem::find($itemData['id']);
                                if ($existingItem) {
                                    if ($existingItem->image) {
                                        \Storage::disk('public')->delete($existingItem->image);
                                    }
                                    $existingItem->delete();
                                }
                            }
                            continue;
                        }

                        $itemAttributes = [
                            'title' => $itemData['title'] ?? null,
                            'description' => $itemData['description'] ?? null,
                        ];

                        // Handle item image upload
                        if (isset($itemData['image']) && $itemData['image']) {
                            if (isset($itemData['id'])) {
                                $existingItem = SectionItem::find($itemData['id']);
                                if ($existingItem && $existingItem->image) {
                                    \Storage::disk('public')->delete($existingItem->image);
                                }
                            }
                            $itemAttributes['image'] = $itemData['image']->store('service/section_items', 'public');
                        }

                        // Update or create item
                        if (isset($itemData['id'])) {
                            $item = SectionItem::find($itemData['id']);
                            if ($item) {
                                $item->update($itemAttributes);
                            } else {
                                continue;
                            }
                        } else {
                            $section->items()->create($itemAttributes);
                        }
                    }
                }
            }
        }

        // Handle FAQs
        if (!empty($validated['faqs'])) {
            foreach ($validated['faqs'] as $faqData) {
                // Handle deletion of FAQs
                if (isset($faqData['_delete']) && $faqData['_delete']) {
                    if (isset($faqData['id'])) {
                        $existingFaq = $service->faqs()->find($faqData['id']);
                        if ($existingFaq) {
                            $existingFaq->delete();
                        }
                    }
                    continue;
                }

                $faqAttributes = [
                    'question' => $faqData['question'],
                    'answer' => $faqData['answer'],
                ];

                // Update or create FAQ
                if (isset($faqData['id'])) {
                    $faq = $service->faqs()->find($faqData['id']);
                    if ($faq) {
                        $faq->update($faqAttributes);
                    } else {
                        continue;
                    }
                } else {
                    $service->faqs()->create($faqAttributes);
                }
            }
        }

        SitemapHelper::update();

        return redirect()->route('services.index')->with('success', 'Service updated successfully!');
    }

    // Delete a service
    public function destroy(Service $service)
    {
        // Delete banners
        if ($service->desktop_banner) {
            \Storage::disk('public')->delete($service->desktop_banner);
        }
        if ($service->mobile_banner) {
            \Storage::disk('public')->delete($service->mobile_banner);
        }

        // Delete sections and their items
        foreach ($service->sections as $section) {
            foreach ($section->items as $item) {
                if ($item->image) {
                    \Storage::disk('public')->delete($item->image);
                }
            }
            if ($section->image) {
                \Storage::disk('public')->delete($section->image);
            }
        }

        $service->delete();
        
        SitemapHelper::update();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully!');
    }
}