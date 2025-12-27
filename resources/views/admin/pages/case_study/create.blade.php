@extends('admin.layouts.app')
@section('title', isset($caseStudy) ? 'Edit Case Study' : 'Add Case Study')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">{{ isset($caseStudy) ? 'Update' : 'Add' }} Case Study</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-Vertical card-default card-md mb-4">
                <div class="card-body pb-md-30">
                    <form method="POST" enctype="multipart/form-data" 
                          action="{{ isset($caseStudy) ? route('admin.case-study.update', $caseStudy->id) : route('admin.case-study.store') }}"
                          class="needs-validation" novalidate>
                        @csrf
                        @isset($caseStudy)
                            @method('PUT')
                        @endisset

                        <div class="row">
                            <!-- Hero Image -->
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="hero_image" class="form-label">Hero Image</label>
                                    <input type="file" name="hero_image" class="form-control" id="hero_image">
                                    @if(isset($caseStudy) && $caseStudy->hero_image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $caseStudy->hero_image) }}" class="img-thumbnail" style="height: 100px;">
                                        </div>
                                    @endif
                                    @error('hero_image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Type -->
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="type" class="form-label">Type</label>
                                    <select name="type" class="form-control" required>
                                        <option selected disabled>Select Type</option>
                                        <option value="mobile" {{ (isset($caseStudy) && $caseStudy->type == 'mobile') || old('type') == 'mobile' ? 'selected' : '' }}>Mobile</option>
                                        <option value="desktop" {{ (isset($caseStudy) && $caseStudy->type == 'desktop') || old('type') == 'desktop' ? 'selected' : '' }}>Desktop</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Title -->
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" id="title"
                                           value="{{ $caseStudy->title ?? old('title') }}" 
                                           class="form-control" placeholder="Enter Title" required>
                                    @error('title')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Client Name -->
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="client_name" class="form-label">Client Name</label>
                                    <input type="text" name="client_name" id="client_name"
                                           value="{{ $caseStudy->client_name ?? old('client_name') }}" 
                                           class="form-control" placeholder="Enter Client Name" required>
                                    @error('client_name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Client Logo -->
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="client_logo" class="form-label">Client Logo</label>
                                    <input type="file" name="client_logo" class="form-control" id="client_logo">
                                    @if(isset($caseStudy) && $caseStudy->client_logo)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $caseStudy->client_logo) }}" class="img-thumbnail" style="height: 100px;">
                                        </div>
                                    @endif
                                    @error('client_logo')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Summary -->
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="summary" class="form-label">Summary</label>
                                    <textarea name="summary" id="summary" class="form-control" rows="4">{{ $caseStudy->summary ?? old('summary') }}</textarea>
                                    @error('summary')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                             <!-- Tags -->
                             <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="tags" class="form-label">Tags</label>
                                    <select name="tags[]" id="tags" class="form-control select2" multiple>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}" 
                                                {{ isset($caseStudy) && $caseStudy->tags->contains($tag->id) ? 'selected' : '' }}>
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tags')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Duration -->
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="duration" class="form-label">Duration</label>
                                    <input type="text" name="duration" id="duration"
                                           value="{{ $caseStudy->duration ?? old('duration') }}" 
                                           class="form-control" placeholder="Enter Duration (e.g., 3 months)">
                                    @error('duration')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Banner Image -->
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="banner_image" class="form-label">Banner Image</label>
                                    <input type="file" name="banner_image" class="form-control" id="banner_image">
                                    @if(isset($caseStudy) && $caseStudy->banner_image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $caseStudy->banner_image) }}" class="img-thumbnail" style="height: 100px;">
                                        </div>
                                    @endif
                                    @error('banner_image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Banner Background Image -->
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="banner_background" class="form-label">Banner Background Image</label>
                                    <input type="file" name="banner_background" class="form-control" id="banner_background">
                                    @if(isset($caseStudy) && $caseStudy->banner_background)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $caseStudy->banner_background) }}" class="img-thumbnail" style="height: 100px;">
                                        </div>
                                    @endif
                                    @error('banner_background')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Challenge Title -->
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="challenge_title" class="form-label">Challenge Title</label>
                                    <input type="text" name="challenge_title" id="challenge_title"
                                           value="{{ $caseStudy->challenge_title ?? old('challenge_title') }}" 
                                           class="form-control" placeholder="Enter Challenge Title" required>
                                    @error('challenge_title')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Challenge Description -->
                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="challenge_desc" class="form-label">Challenge Description</label>
                                    <textarea name="challenge_desc" id="challenge_desc" class="form-control" rows="4">{{ $caseStudy->challenge_desc ?? old('challenge_desc') }}</textarea>
                                    @error('challenge_desc')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Services -->
                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label class="form-label">Services</label>
                                    <div id="services" class="services-container">
                                        @php
                                            $services = $caseStudy->services ?? old('services', ['']);
                                        @endphp
                                        @foreach ($services as $index => $service)
                                            <div class="input-group mb-2">
                                                <input type="text" name="services[]" value="{{ $service }}" 
                                                       class="form-control" placeholder="Enter Service">
                                                <button type="button" class="btn btn-danger remove-service">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('services')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    <button type="button" id="addService" class="btn btn-secondary mt-2">
                                        <i class="fas fa-plus"></i> Add Service
                                    </button>
                                </div>
                            </div>

                            <!-- Dynamic Sections -->
                            <div class="col-md-12 mb-4">
                                <h5 class="card-title mb-3">Sections</h5>
                                <div id="sections" class="sections-container">
                                    @php
                                        $sections = old('sections', $caseStudy->sections ?? [['section_type' => '', 'heading' => '', 'content' => '', 'order' => 0, 'image' => '']]);
                                    @endphp

                                    @foreach ($sections as $index => $section)
                                    <div class="section-group card mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Section Type</label>
                                                    <input type="text" name="sections[{{ $index }}][section_type]" 
                                                           class="form-control" 
                                                           value="{{ old("sections.$index.section_type", $section['section_type']) }}" required>
                                                    @error("sections.$index.section_type")
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Heading</label>
                                                    <input type="text" name="sections[{{ $index }}][heading]" 
                                                           class="form-control" 
                                                           value="{{ old("sections.$index.heading", $section['heading']) }}">
                                                    @error("sections.$index.heading")
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Content</label>
                                                    <textarea name="sections[{{ $index }}][content]" 
                                                              class="form-control" rows="4" required>{{ old("sections.$index.content", $section['content']) }}</textarea>
                                                    @error("sections.$index.content")
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Order</label>
                                                    <input type="number" name="sections[{{ $index }}][order]" 
                                                           class="form-control" 
                                                           value="{{ old("sections.$index.order", $section['order']) }}" required>
                                                    @error("sections.$index.order")
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Image</label>
                                                    <input type="file" name="sections[{{ $index }}][image]" class="form-control">
                                                    @if(isset($section['image']) && $section['image'])
                                                        <div class="mt-2">
                                                            <img src="{{ asset('storage/' . $section['image']) }}" class="img-thumbnail" style="height: 100px;">
                                                        </div>
                                                    @endif
                                                    @error("sections.$index.image")
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-danger remove-section">
                                                <i class="fas fa-trash"></i> Remove Section
                                            </button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <button type="button" id="addSection" class="btn btn-secondary">
                                    <i class="fas fa-plus"></i> Add Section
                                </button>
                            </div>

                            <!-- Statistics -->
                            <div class="col-md-12 mb-4">
                                <h5 class="card-title mb-3">Statistics</h5>
                                <div class="form-group mb-3">
                                    <label for="statistics_lable" class="form-label">Statistics Label</label>
                                    <input type="text" name="statistics_lable" class="form-control"
                                           value="{{ old('statistics_lable', isset($caseStudy) ? $caseStudy->statistics_lable : '') }}" 
                                           placeholder="Enter Statistics Label">
                                    @error('statistics_lable')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div id="statistics" class="statistics-container">
                                    @php
                                        $statistics = old('statistics', isset($caseStudy) && $caseStudy && $caseStudy->statistics ? json_decode($caseStudy->statistics, true) : [['percentage' => '', 'title' => '', 'description' => '']]);
                                    @endphp

                                    @foreach ($statistics as $index => $stat)
                                    <div class="stat-group card mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Percentage</label>
                                                    <input type="number" name="statistics[{{ $index }}][percentage]" 
                                                           class="form-control"
                                                           value="{{ old("statistics.$index.percentage", $stat['percentage'] ?? '') }}" required>
                                                </div>

                                                <div class="col-md-8 mb-3">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="statistics[{{ $index }}][title]" 
                                                           class="form-control"
                                                           value="{{ old("statistics.$index.title", $stat['title'] ?? '') }}" required>
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="statistics[{{ $index }}][description]" 
                                                              class="form-control" rows="3" required>{{ old("statistics.$index.description", $stat['description'] ?? '') }}</textarea>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-danger remove-stat">
                                                <i class="fas fa-trash"></i> Remove Statistic
                                            </button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <button type="button" id="addStatistic" class="btn btn-secondary">
                                    <i class="fas fa-plus"></i> Add Statistic
                                </button>
                            </div>

                            <!-- Lessons -->
                            <div class="col-md-12 mb-4">
                                <h5 class="card-title mb-3">Lessons</h5>
                                <div class="form-group mb-3">
                                    <label for="lessons_title" class="form-label">Lesson Title</label>
                                    <input type="text" name="lessons_title" class="form-control" 
                                           value="{{ old('lessons_title', $caseStudy->lessons_title ?? '') }}" 
                                           placeholder="Enter Lesson Title" required>
                                    @error('lessons_title')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div id="lessons-descriptions">
                                    @php
                                        $lessonsDesc = [
                                            'lessons_desc_1' => old('lessons_desc_1', $caseStudy->lessons_desc_1 ?? ''),
                                            'lessons_desc_2' => old('lessons_desc_2', $caseStudy->lessons_desc_2 ?? '')
                                        ];
                                    @endphp

                                    @foreach ($lessonsDesc as $index => $desc)
                                    <div class="lesson-desc-group mb-3">
                                        <label class="form-label">Lesson Description {{ $loop->index + 1 }}</label>
                                        <textarea name="{{ $index }}" class="form-control" rows="3" 
                                                  placeholder="Enter Lesson Description">{{ $desc }}</textarea>
                                        @error($index)
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @endforeach
                                </div>

                                <button type="button" id="addLessonDesc" class="btn btn-secondary" 
                                        {{ count($lessonsDesc) >= 2 ? 'disabled' : '' }}>
                                    <i class="fas fa-plus"></i> Add Description
                                </button>
                            </div>

                            <!-- Featured Images -->
                            <div class="col-md-12 mb-4">
                                <h5 class="card-title mb-3">Featured Images</h5>
                                <div id="featuredImagesContainer">
                                    <input type="file" multiple name="images[]" class="form-control">
                                    @error('images')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    @if ($errors->has('images.*'))
                                        @foreach ($errors->get('images.*') as $index => $messages)
                                            @foreach ($messages as $message)
                                                <div class="invalid-feedback d-block">Image {{ $index + 1 }}: {{ $message }}</div>
                                            @endforeach
                                        @endforeach
                                    @endif
                                </div>

                                @if(isset($caseStudy) && $caseStudy->images)
                                    <div class="row mt-3">
                                        @foreach ($caseStudy->images as $image)
                                            <div class="col-md-2 mb-3">
                                                <img src="{{ asset('storage/' . $image->image_path) }}" 
                                                     class="img-thumbnail" style="height: 100px; width: 100px; object-fit: cover;">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> {{ isset($caseStudy) ? 'Update' : 'Save' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pageJs')
<script>
    let sectionIndex = {{ isset($caseStudy) && $caseStudy->sections ? count($caseStudy->sections) : 1 }};
    let serviceIndex = {{ isset($caseStudy) && $caseStudy->services ? count($caseStudy->services) : 1 }};

    // Add Service
    document.getElementById('addService').addEventListener('click', function() {
        let serviceInput = `
            <div class="input-group mb-2">
                <input type="text" name="services[]" class="form-control" placeholder="Enter Service">
                <button type="button" class="btn btn-danger remove-service">
                    <i class="fas fa-times"></i>
                </button>
            </div>`;
        document.getElementById('services').insertAdjacentHTML('beforeend', serviceInput);
    });

    // Remove Service
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-service') || event.target.closest('.remove-service')) {
            event.target.closest('.input-group').remove();
        }
    });

    // Add Section
    document.getElementById('addSection').addEventListener('click', function() {
        let template = `
            <div class="section-group card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Section Type</label>
                            <input type="text" name="sections[${sectionIndex}][section_type]" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Heading</label>
                            <input type="text" name="sections[${sectionIndex}][heading]" class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Content</label>
                            <textarea name="sections[${sectionIndex}][content]" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" name="sections[${sectionIndex}][order]" class="form-control" value="0" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="sections[${sectionIndex}][image]" class="form-control">
                        </div>
                    </div>

                    <button type="button" class="btn btn-danger remove-section">
                        <i class="fas fa-trash"></i> Remove Section
                    </button>
                </div>
            </div>`;
        document.getElementById('sections').insertAdjacentHTML('beforeend', template);
        sectionIndex++;
    });

    // Remove Section
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-section') || event.target.closest('.remove-section')) {
            event.target.closest('.section-group').remove();
        }
    });

    // Statistics
    let statIndex = {{ old('statistics') ? count(old('statistics')) : (isset($caseStudy) && $caseStudy && $caseStudy->statistics ? count(json_decode($caseStudy->statistics, true)) : 1) }};

    document.getElementById('addStatistic').addEventListener('click', function() {
        let template = `
            <div class="stat-group card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Percentage</label>
                            <input type="number" name="statistics[${statIndex}][percentage]" class="form-control" required>
                        </div>

                        <div class="col-md-8 mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="statistics[${statIndex}][title]" class="form-control" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="statistics[${statIndex}][description]" class="form-control" rows="3" required></textarea>
                        </div>
                    </div>

                    <button type="button" class="btn btn-danger remove-stat">
                        <i class="fas fa-trash"></i> Remove Statistic
                    </button>
                </div>
            </div>`;
        document.getElementById('statistics').insertAdjacentHTML('beforeend', template);
        statIndex++;
    });

    // Remove Statistic
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-stat') || event.target.closest('.remove-stat')) {
            event.target.closest('.stat-group').remove();
        }
    });

    // Lessons
    let lessonDescIndex = {{ count($lessonsDesc) }};

    document.getElementById('addLessonDesc').addEventListener('click', function() {
        if (lessonDescIndex < 2) {
            let descTemplate = `
                <div class="lesson-desc-group mb-3">
                    <label class="form-label">Lesson Description ${lessonDescIndex + 1}</label>
                    <textarea name="lessons_desc_${lessonDescIndex + 1}" class="form-control" rows="3" 
                              placeholder="Enter Lesson Description"></textarea>
                </div>`;
            document.getElementById('lessons-descriptions').insertAdjacentHTML('beforeend', descTemplate);
            lessonDescIndex++;

            if (lessonDescIndex >= 2) {
                this.disabled = true;
            }
        }
    });

    // Form validation
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<script>
    $(document).ready(function() {
        $('#tags').select2({
            placeholder: "Select tags",
            allowClear: true
        });
    });
</script>

@endsection
