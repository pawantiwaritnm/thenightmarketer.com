@extends('admin.layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1 fw-bold text-dark">Create New Service</h2>
                    <p class="text-muted mb-0">Add a new service with sections, items, CTAs, stats, and FAQs</p>
                </div>
                <a href="{{ route('services.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Services
                </a>
            </div>
        </div>
    </div>

    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Service Basic Information -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="mb-0 fw-semibold text-primary">
                    <i class="fas fa-info-circle me-2"></i>Basic Information
                </h5>
            </div>
            <div class="card-body p-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Service Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" required class="form-control form-control-lg" placeholder="e.g., Web Development Services" value="{{ old('title') }}">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Service Slug <span class="text-danger">*</span></label>
                        <input type="text" name="slug" id="slug" required class="form-control form-control-lg" placeholder="e.g., web-development" value="{{ old('slug') }}">
                        <small class="text-muted">URL-friendly version of the title</small>
                        @error('slug')
                            <small class="text-danger d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Service Type <span class="text-danger">*</span></label>
                        <select name="service_type" id="serviceType" required class="form-select form-select-lg">
                            <option value="normal" {{ old('service_type') == 'normal' ? 'selected' : '' }}>Normal Service</option>
                            <option value="city" {{ old('service_type') == 'city' ? 'selected' : '' }}>City-Specific Service</option>
                        </select>
                        @error('service_type')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6" id="cityNameField" style="display: {{ old('service_type') == 'city' ? 'block' : 'none' }};">
                        <label class="form-label fw-semibold">City Name <span class="text-danger" id="cityRequired">*</span></label>
                        <input type="text" name="city_name" class="form-control form-control-lg" placeholder="e.g., New York" value="{{ old('city_name') }}">
                        <small class="text-muted">Required when service type is City-Specific</small>
                        @error('city_name')
                            <small class="text-danger d-block">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Description (Main Section)</label>
                        <textarea name="description" class="form-control" rows="4" placeholder="Enter main description for the service...">{{ old('description') }}</textarea>
                        <small class="text-muted">This will be used as the main content description</small>
                        @error('description')
                            <small class="text-danger d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Achievements</label>
                        <textarea name="achievements" class="form-control" rows="3" placeholder="Enter key achievements and highlights...">{{ old('achievements') }}</textarea>
                        @error('achievements')
                            <small class="text-danger d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Desktop Banner <span class="text-danger">*</span></label>
                        <div class="custom-file-upload">
                            <input type="file" name="desktop_banner" required class="form-control" accept="image/*">
                            <div class="upload-hint">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span>Recommended: 1920x600px</span>
                            </div>
                        </div>
                        @error('desktop_banner')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Mobile Banner <span class="text-danger">*</span></label>
                        <div class="custom-file-upload">
                            <input type="file" name="mobile_banner" required class="form-control" accept="image/*">
                            <div class="upload-hint">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span>Recommended: 768x400px</span>
                            </div>
                        </div>
                        @error('mobile_banner')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select form-select-lg">
                            <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- SEO Meta Information -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="mb-0 fw-semibold text-primary">
                    <i class="fas fa-search me-2"></i>SEO Meta Information
                </h5>
            </div>
            <div class="card-body p-4">
                <div class="row g-4">
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" placeholder="Enter SEO meta title" value="{{ old('meta_title') }}" maxlength="1012">
                        <small class="text-muted">Maximum 1012 characters</small>
                        @error('meta_title')
                            <small class="text-danger d-block">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Meta Description</label>
                        <textarea name="meta_desc" class="form-control" rows="3" placeholder="Enter SEO meta description">{{ old('meta_desc') }}</textarea>
                        @error('meta_desc')
                            <small class="text-danger d-block">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Meta Keywords</label>
                        <input type="text" name="meta_keywords" class="form-control" placeholder="Enter keywords separated by commas" value="{{ old('meta_keywords') }}" maxlength="1012">
                        <small class="text-muted">Separate keywords with commas (,)</small>
                        @error('meta_keywords')
                            <small class="text-danger d-block">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Sections -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="mb-0 fw-semibold text-primary">
                    <i class="fas fa-bullhorn me-2"></i>Call-to-Action Sections
                </h5>
            </div>
            <div class="card-body p-4">
                <!-- CTA 1 -->
                <div class="cta-section mb-4 p-3 bg-light rounded">
                    <h6 class="fw-semibold mb-3 text-secondary">CTA Section 1</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Heading</label>
                            <input type="text" name="cta1_heading" class="form-control" placeholder="e.g., I Need To Improve My Shopify Store" value="{{ old('cta1_heading') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Button Text</label>
                            <input type="text" name="cta1_button_text" class="form-control" placeholder="e.g., Buy Bulk Hours" value="{{ old('cta1_button_text') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Button Link</label>
                            <input type="text" name="cta1_button_link" class="form-control" placeholder="https://example.com or /relative-url" value="{{ old('cta1_button_link') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Note</label>
                            <textarea name="cta1_note" class="form-control" rows="2" placeholder="e.g., Unsure? Get a Free Quote">{{ old('cta1_note') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- CTA 2 -->
                <div class="cta-section p-3 bg-light rounded">
                    <h6 class="fw-semibold mb-3 text-secondary">CTA Section 2</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Heading</label>
                            <input type="text" name="cta2_heading" class="form-control" placeholder="e.g., I Need To Build A New Shopify Store" value="{{ old('cta2_heading') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Button Text</label>
                            <input type="text" name="cta2_button_text" class="form-control" placeholder="e.g., Start Free Prototype" value="{{ old('cta2_button_text') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Button Link</label>
                            <input type="text" name="cta2_button_link" class="form-control" placeholder="https://example.com or /relative-url" value="{{ old('cta2_button_link') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Note</label>
                            <textarea name="cta2_note" class="form-control" rows="2" placeholder="e.g., Looking to Migrate to Shopify?">{{ old('cta2_note') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-semibold text-primary">
                        <i class="fas fa-chart-line me-2"></i>Statistics / Achievements
                    </h5>
                    <button type="button" class="btn btn-primary btn-sm" onclick="addStat()">
                        <i class="fas fa-plus me-2"></i>Add Stat
                    </button>
                </div>
            </div>
            <div class="card-body p-4">
                <div id="stats-container">
                    <!-- Initial stat item -->
                    <div class="stat-item mb-3">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="badge bg-success">Stat 1</span>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Title</label>
                                <input type="text" name="stats[0][title]" class="form-control" placeholder="e.g., Average Conversion Rate" value="{{ old('stats.0.title') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Value</label>
                                <input type="text" name="stats[0][value]" class="form-control" placeholder="e.g., 28%" value="{{ old('stats.0.value') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Improvement (optional)</label>
                                <input type="text" name="stats[0][improvement]" class="form-control" placeholder="e.g., ↗22.6% improvement" value="{{ old('stats.0.improvement') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sections -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-semibold text-primary">
                        <i class="fas fa-layer-group me-2"></i>Content Sections
                    </h5>
                    <button type="button" class="btn btn-primary btn-sm" onclick="addSection()">
                        <i class="fas fa-plus me-2"></i>Add Section
                    </button>
                </div>
            </div>
            <div class="card-body p-4">
                <div id="sections-container">
                    <div class="section-wrapper mb-4">
                        <div class="section-card">
                            <div class="section-header">
                                <span class="section-number">Section 1</span>
                            </div>
                            
                            <div class="row g-3 mb-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Section Title <span class="text-danger">*</span></label>
                                    <input type="text" name="sections[0][title]" required class="form-control" placeholder="Enter section title" value="{{ old('sections.0.title') }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Section Type <span class="text-danger">*</span></label>
                                    <select name="sections[0][section_type]" required class="form-select">
                                        <option value="section_one" {{ old('sections.0.section_type') == 'section_one' ? 'selected' : '' }}>Section One</option>
                                        <option value="section_two" {{ old('sections.0.section_type') == 'section_two' ? 'selected' : '' }}>Section Two</option>
                                        <option value="section_three" {{ old('sections.0.section_type') == 'section_three' ? 'selected' : '' }}>Section Three</option>
                                        <option value="section_four" {{ old('sections.0.section_type') == 'section_four' ? 'selected' : '' }}>Section Four</option>
                                        <option value="section_five" {{ old('sections.0.section_type') == 'section_five' ? 'selected' : '' }}>Section Five</option>
                                        <option value="section_six" {{ old('sections.0.section_type') == 'section_six' ? 'selected' : '' }}>Section Six</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Section Image</label>
                                    <input type="file" name="sections[0][image]" class="form-control" accept="image/*">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Section Description</label>
                                    <textarea name="sections[0][description]" class="form-control" rows="2" placeholder="Enter section description">{{ old('sections.0.description') }}</textarea>
                                    <small class="text-muted">Optional description for this section</small>
                                </div>
                            </div>

                            <!-- Section Items -->
                            <div class="section-items-area">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="mb-0 fw-semibold text-secondary">Section Items</h6>
                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="addItem(0)">
                                        <i class="fas fa-plus me-1"></i>Add Item
                                    </button>
                                </div>
                                
                                <div id="section-items-container-0">
                                    <div class="item-row">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <input type="text" name="sections[0][items][0][title]" class="form-control" placeholder="Item title">
                                            </div>
                                            <div class="col-md-4">
                                                <textarea name="sections[0][items][0][description]" class="form-control" rows="1" placeholder="Item description"></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="file" name="sections[0][items][0][image]" class="form-control" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQs -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-semibold text-primary">
                        <i class="fas fa-question-circle me-2"></i>Frequently Asked Questions
                    </h5>
                    <button type="button" class="btn btn-primary btn-sm" onclick="addFaq()">
                        <i class="fas fa-plus me-2"></i>Add FAQ
                    </button>
                </div>
            </div>
            <div class="card-body p-4">
                <div id="faqs-container">
                    <div class="faq-item">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Question <span class="text-danger">*</span></label>
                                <input type="text" name="faqs[0][question]" required class="form-control" placeholder="Enter question" value="{{ old('faqs.0.question') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Answer <span class="text-danger">*</span></label>
                                <textarea name="faqs[0][answer]" required class="form-control" rows="1" placeholder="Enter answer">{{ old('faqs.0.answer') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Actions -->
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <p class="mb-0 text-muted">
                        <i class="fas fa-info-circle me-2"></i>All required fields must be filled before submission
                    </p>
                    <div>
                        <button type="reset" class="btn btn-outline-secondary me-2">
                            <i class="fas fa-redo me-2"></i>Reset Form
                        </button>
                        <button type="submit" class="btn btn-success btn-lg px-5">
                            <i class="fas fa-save me-2"></i>Save Service
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('pageJs')
<script>
    // Service Type Toggle
    document.getElementById('serviceType').addEventListener('change', function() {
        const cityField = document.getElementById('cityNameField');
        const cityInput = cityField.querySelector('input');
        if (this.value === 'city') {
            cityField.style.display = 'block';
            cityInput.required = true;
        } else {
            cityField.style.display = 'none';
            cityInput.required = false;
        }
    });

    // Initialize on page load
    window.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById('serviceType').value === 'city') {
            document.getElementById('cityNameField').style.display = 'block';
            document.querySelector('#cityNameField input').required = true;
        }
    });

    let sectionIndex = 0;
    let statIndex = 0;
    let faqIndex = 0;

    // Function to add a new stat
    function addStat() {
        statIndex++;
        const statTemplate = `
            <div class="stat-item mb-3">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <span class="badge bg-success">Stat ${statIndex + 1}</span>
                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="this.closest('.stat-item').remove()">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Title</label>
                        <input type="text" name="stats[${statIndex}][title]" class="form-control" placeholder="e.g., Average Conversion Rate">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Value</label>
                        <input type="text" name="stats[${statIndex}][value]" class="form-control" placeholder="e.g., 28%">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Improvement (optional)</label>
                        <input type="text" name="stats[${statIndex}][improvement]" class="form-control" placeholder="e.g., ↗22.6% improvement">
                    </div>
                </div>
            </div>
        `;
        document.getElementById('stats-container').insertAdjacentHTML('beforeend', statTemplate);
    }

    // Function to add a new section
    function addSection() {
        sectionIndex++;
        const sectionTemplate = `
            <div class="section-wrapper mb-4">
                <div class="section-card">
                    <div class="section-header">
                        <span class="section-number">Section ${sectionIndex + 1}</span>
                        <button type="button" class="btn-remove" onclick="this.closest('.section-wrapper').remove()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Section Title <span class="text-danger">*</span></label>
                            <input type="text" name="sections[${sectionIndex}][title]" required class="form-control" placeholder="Enter section title">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Section Type <span class="text-danger">*</span></label>
                            <select name="sections[${sectionIndex}][section_type]" required class="form-select">
                                <option value="section_one">Section One</option>
                                <option value="section_two">Section Two</option>
                                <option value="section_three">Section Three</option>
                                <option value="section_four">Section Four</option>
                                <option value="section_five">Section Five</option>
                                <option value="section_six">Section Six</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Section Image</label>
                            <input type="file" name="sections[${sectionIndex}][image]" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Section Description</label>
                            <textarea name="sections[${sectionIndex}][description]" class="form-control" rows="2" placeholder="Enter section description"></textarea>
                            <small class="text-muted">Optional description for this section</small>
                        </div>
                    </div>

                    <div class="section-items-area">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="mb-0 fw-semibold text-secondary">Section Items</h6>
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="addItem(${sectionIndex})">
                                <i class="fas fa-plus me-1"></i>Add Item
                            </button>
                        </div>
                        
                        <div id="section-items-container-${sectionIndex}">
                            <div class="item-row">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <input type="text" name="sections[${sectionIndex}][items][0][title]" class="form-control" placeholder="Item title">
                                    </div>
                                    <div class="col-md-4">
                                        <textarea name="sections[${sectionIndex}][items][0][description]" class="form-control" rows="1" placeholder="Item description"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" name="sections[${sectionIndex}][items][0][image]" class="form-control" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        document.getElementById('sections-container').insertAdjacentHTML('beforeend', sectionTemplate);
    }

    // Function to add an item to a section
    function addItem(sectionIndex) {
        const itemsContainer = document.getElementById(`section-items-container-${sectionIndex}`);
        const itemCount = itemsContainer.querySelectorAll('.item-row').length;
        const itemTemplate = `
            <div class="item-row">
                <div class="row g-3">
                    <div class="col-md-4">
                        <input type="text" name="sections[${sectionIndex}][items][${itemCount}][title]" class="form-control" placeholder="Item title">
                    </div>
                    <div class="col-md-4">
                        <textarea name="sections[${sectionIndex}][items][${itemCount}][description]" class="form-control" rows="1" placeholder="Item description"></textarea>
                    </div>
                    <div class="col-md-3">
                        <input type="file" name="sections[${sectionIndex}][items][${itemCount}][image]" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-outline-danger btn-sm w-100" onclick="this.closest('.item-row').remove()">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
        itemsContainer.insertAdjacentHTML('beforeend', itemTemplate);
    }

    // Function to add a new FAQ
    function addFaq() {
        faqIndex++;
        const faqTemplate = `
            <div class="faq-item">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <span class="badge bg-primary">FAQ ${faqIndex + 1}</span>
                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="this.closest('.faq-item').remove()">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Question <span class="text-danger">*</span></label>
                        <input type="text" name="faqs[${faqIndex}][question]" required class="form-control" placeholder="Enter question">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Answer <span class="text-danger">*</span></label>
                        <textarea name="faqs[${faqIndex}][answer]" required class="form-control" rows="1" placeholder="Enter answer"></textarea>
                    </div>
                </div>
            </div>
        `;
        document.getElementById('faqs-container').insertAdjacentHTML('beforeend', faqTemplate);
    }
</script>

<style>
    /* Modern Form Styling */
    .form-control, .form-select {
        border: 1px solid #e0e6ed;
        padding: 0.625rem 0.875rem;
        font-size: 0.9375rem;
        transition: all 0.2s;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #4361ee;
        box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.15);
    }
    
    .form-label {
        margin-bottom: 0.5rem;
        color: #495057;
        font-size: 0.875rem;
    }
    
    /* Card Styling */
    .card {
        border-radius: 0.75rem;
        overflow: hidden;
    }
    
    .card-header {
        border-radius: 0.75rem 0.75rem 0 0 !important;
    }

    /* CTA Section Styling */
    .cta-section {
        border: 2px solid #e9ecef;
        transition: all 0.2s;
    }

    .cta-section:hover {
        border-color: #4361ee;
        box-shadow: 0 2px 8px rgba(67, 97, 238, 0.08);
    }

    /* Stat Item Styling */
    .stat-item {
        background: #f8f9fa;
        border: 2px solid #e9ecef;
        border-radius: 0.5rem;
        padding: 1.25rem;
        transition: all 0.2s;
    }

    .stat-item:hover {
        border-color: #10b981;
        box-shadow: 0 2px 8px rgba(16, 185, 129, 0.08);
    }
    
    /* Section Card */
    .section-wrapper {
        position: relative;
    }
    
    .section-card {
        background: #f8f9fa;
        border: 2px solid #e9ecef;
        border-radius: 0.75rem;
        padding: 1.5rem;
        transition: all 0.3s;
    }
    
    .section-card:hover {
        border-color: #4361ee;
        box-shadow: 0 4px 12px rgba(67, 97, 238, 0.1);
    }
    
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.25rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #dee2e6;
    }
    
    .section-number {
        font-weight: 600;
        font-size: 1rem;
        color: #4361ee;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .btn-remove {
        background: transparent;
        border: none;
        color: #dc3545;
        font-size: 1.25rem;
        cursor: pointer;
        transition: all 0.2s;
        padding: 0.25rem 0.5rem;
    }
    
    .btn-remove:hover {
        color: #c82333;
        transform: scale(1.1);
    }
    
    /* Section Items Area */
    .section-items-area {
        background: white;
        border-radius: 0.5rem;
        padding: 1.25rem;
        margin-top: 1rem;
    }
    
    .item-row {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 0.5rem;
        padding: 1rem;
        margin-bottom: 0.75rem;
        transition: all 0.2s;
    }
    
    .item-row:hover {
        border-color: #4361ee;
        box-shadow: 0 2px 8px rgba(67, 97, 238, 0.08);
    }
    
    .item-row:last-child {
        margin-bottom: 0;
    }
    
    /* FAQ Item */
    .faq-item {
        background: #f8f9fa;
        border: 2px solid #e9ecef;
        border-radius: 0.5rem;
        padding: 1.25rem;
        margin-bottom: 1rem;
        transition: all 0.2s;
    }
    
    .faq-item:hover {
        border-color: #4361ee;
        box-shadow: 0 2px 8px rgba(67, 97, 238, 0.08);
    }
    
    .faq-item:last-child {
        margin-bottom: 0;
    }
    
    /* Custom File Upload Styling */
    .custom-file-upload {
        position: relative;
    }
    
    .upload-hint {
        position: absolute;
        right: 0.875rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        font-size: 0.75rem;
        pointer-events: none;
    }
    
    .upload-hint i {
        margin-right: 0.25rem;
        color: #4361ee;
    }
    
    /* Button Styling */
    .btn {
        border-radius: 0.5rem;
        font-weight: 500;
        padding: 0.5rem 1.25rem;
        transition: all 0.2s;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #4361ee 0%, #3730a3 100%);
        border: none;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
    }
    
    .btn-success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        border: none;
    }
    
    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }
    
    .btn-outline-primary:hover {
        background: #4361ee;
        transform: translateY(-1px);
    }
    
    .btn-outline-secondary:hover {
        transform: translateY(-2px);
    }
    
    /* Shadow Utilities */
    .shadow-sm {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08) !important;
    }
    
    /* Badge Styling */
    .badge {
        padding: 0.35rem 0.65rem;
        font-weight: 500;
        font-size: 0.75rem;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .card-body {
            padding: 1.5rem !important;
        }
        
        .section-card {
            padding: 1rem;
        }
        
        .section-items-area {
            padding: 1rem;
        }
        
        .item-row {
            padding: 0.75rem;
        }
    }
</style>
@endsection