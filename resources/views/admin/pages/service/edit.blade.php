@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Use PUT for update -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-body">
                        <h4 class="breadcrumb-title">Edit Service</h4>

                        <!-- Display Validation Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Service Details -->
                        <div class="row">
                            <!-- Service Title -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Service Title</label>
                                    <input type="text" name="title" value="{{ old('title', $service->title) }}" required class="form-control @error('title') is-invalid @enderror" placeholder="Enter Service Title">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Achievements -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Achievements</label>
                                    <textarea name="achievements" class="form-control @error('achievements') is-invalid @enderror" placeholder="Enter Achievements">{{ old('achievements', $service->achievements) }}</textarea>
                                    @error('achievements')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Service Slug -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Service Slug</label>
                                    <input type="text" name="slug" id="slug" value="{{ old('slug', $service->slug) }}" required class="form-control @error('slug') is-invalid @enderror" placeholder="Enter Slug">
                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Desktop Banner -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Desktop Banner</label>
                                    <input type="file" name="desktop_banner" class="form-control @error('desktop_banner') is-invalid @enderror">
                                    @error('desktop_banner')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @if ($service->desktop_banner)
                                        <img src="{{ asset('storage/' . $service->desktop_banner) }}" alt="Desktop Banner" class="mt-2" style="width: 200px; height: auto;">
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Mobile Banner -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobile Banner</label>
                                    <input type="file" name="mobile_banner" class="form-control @error('mobile_banner') is-invalid @enderror">
                                    @error('mobile_banner')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @if ($service->mobile_banner)
                                        <img src="{{ asset('storage/' . $service->mobile_banner) }}" alt="Mobile Banner" class="mt-2" style="width: 200px; height: auto;">
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="1" {{ old('status', $service->status) ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ !old('status', $service->status) ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- End Service Details -->

                        <hr>

                        <!-- Sections -->
                        <div id="sections-container">
                            <h4 class="breadcrumb-title">Sections</h4>
                            @foreach ($service->sections as $index => $section)
                                <div class="section-template">
                                    <div class="section mb-4">
                                        <!-- Remove Section Button -->
                                        <button type="button" class="btn btn-danger btn-sm float-right remove-section">Remove Section</button>
                                        
                                        <!-- Hidden Inputs -->
                                        <input type="hidden" name="sections[{{ $index }}][id]" value="{{ $section->id }}">
                                        <input type="hidden" name="sections[{{ $index }}][_delete]" value="0" class="delete-section-input">

                                        <div class="row">
                                            <!-- Section Title -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Section Title</label>
                                                    <input type="text" name="sections[{{ $index }}][title]" value="{{ old('sections.'.$index.'.title', $section->title) }}" required class="form-control @error('sections.'.$index.'.title') is-invalid @enderror" placeholder="Enter Section Title">
                                                    @error('sections.'.$index.'.title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <!-- Section Type -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Section Type</label>
                                                    <select name="sections[{{ $index }}][section_type]" required class="form-control @error('sections.'.$index.'.section_type') is-invalid @enderror">
                                                        <option value="section_one" {{ old('sections.'.$index.'.section_type', $section->section_type) == 'section_one' ? 'selected' : '' }}>Section One</option>
                                                        <option value="section_two" {{ old('sections.'.$index.'.section_type', $section->section_type) == 'section_two' ? 'selected' : '' }}>Section Two</option>
                                                        <option value="section_three" {{ old('sections.'.$index.'.section_type', $section->section_type) == 'section_three' ? 'selected' : '' }}>Section Three</option>
                                                        <option value="section_four" {{ old('sections.'.$index.'.section_type', $section->section_type) == 'section_four' ? 'selected' : '' }}>Section Four</option>
                                                        <option value="section_five" {{ old('sections.'.$index.'.section_type', $section->section_type) == 'section_five' ? 'selected' : '' }}>Section Five</option>
                                                        <option value="section_six" {{ old('sections.'.$index.'.section_type', $section->section_type) == 'section_six' ? 'selected' : '' }}>Section Six</option>
                                                    </select>
                                                    @error('sections.'.$index.'.section_type')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <!-- Section Image -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Section Image</label>
                                                    <input type="file" name="sections[{{ $index }}][image]" class="form-control @error('sections.'.$index.'.image') is-invalid @enderror">
                                                    @error('sections.'.$index.'.image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    @if ($section->image)
                                                        <img src="{{ asset('storage/' . $section->image) }}" alt="Section Image" class="mt-2" style="width: 150px; height: auto;">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Section Items -->
                                        <div id="section-items-container-{{ $index }}">
                                            <h5>Section Items</h5>
                                            @foreach ($section->items as $itemIndex => $item)
                                                <div class="row mb-3 section-item">
                                                   
                                                    
                                                    <!-- Hidden Inputs -->
                                                    <input type="hidden" name="sections[{{ $index }}][items][{{ $itemIndex }}][id]" value="{{ $item->id }}">
                                                    <input type="hidden" name="sections[{{ $index }}][items][{{ $itemIndex }}][_delete]" value="0" class="delete-item-input">

                                                    <div class="col-md-4">
                                                        <input type="text" name="sections[{{ $index }}][items][{{ $itemIndex }}][title]" value="{{ old('sections.'.$index.'.items.'.$itemIndex.'.title', $item->title) }}" class="form-control @error('sections.'.$index.'.items.'.$itemIndex.'.title') is-invalid @enderror" placeholder="Item Title">
                                                        @error('sections.'.$index.'.items.'.$itemIndex.'.title')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4">
                                                        <textarea name="sections[{{ $index }}][items][{{ $itemIndex }}][description]" class="form-control @error('sections.'.$index.'.items.'.$itemIndex.'.description') is-invalid @enderror" placeholder="Item Description">{{ old('sections.'.$index.'.items.'.$itemIndex.'.description', $item->description) }}</textarea>
                                                        @error('sections.'.$index.'.items.'.$itemIndex.'.description')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="file" name="sections[{{ $index }}][items][{{ $itemIndex }}][image]" class="form-control @error('sections.'.$index.'.items.'.$itemIndex.'.image') is-invalid @enderror">
                                                        @error('sections.'.$index.'.items.'.$itemIndex.'.image')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        @if ($item->image)
                                                            <img src="{{ asset('storage/' . $item->image) }}" alt="Item Image" class="mt-2" style="width: 150px; height: auto;">
                                                        @endif
                                                    </div>
                                                     <!-- Remove Item Button -->
                                                     <button type="button" class="btn btn-danger btn-sm remove-item">×</button>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn btn-sm btn-primary" onclick="addItem({{ $index }})">Add Item</button>
                                        <!-- End Section Items -->
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-primary" onclick="addSection()">Add Section</button>
                        <!-- End Sections -->

                        <hr>

                        <!-- FAQs -->
                        <div id="faqs-container" style="margin-top: 20px;">
                            <h4 class="breadcrumb-title">FAQs</h4>
                            @foreach ($service->faqs as $faqIndex => $faq)
                                <div class="faq mb-3">
                                    <!-- Remove FAQ Button -->
                                    <button type="button" class="btn btn-danger btn-sm float-right remove-faq">×</button>
                                    
                                    <!-- Hidden Inputs -->
                                    <input type="hidden" name="faqs[{{ $faqIndex }}][id]" value="{{ $faq->id }}">
                                    <input type="hidden" name="faqs[{{ $faqIndex }}][_delete]" value="0" class="delete-faq-input">

                                    <div class="row">
                                        <!-- Question -->
                                        <div class="col-md-6">
                                            <input type="text" name="faqs[{{ $faqIndex }}][question]" value="{{ old('faqs.'.$faqIndex.'.question', $faq->question) }}" required class="form-control @error('faqs.'.$faqIndex.'.question') is-invalid @enderror" placeholder="Enter Question">
                                            @error('faqs.'.$faqIndex.'.question')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!-- Answer -->
                                        <div class="col-md-6">
                                            <textarea name="faqs[{{ $faqIndex }}][answer]" required class="form-control @error('faqs.'.$faqIndex.'.answer') is-invalid @enderror" placeholder="Enter Answer">{{ old('faqs.'.$faqIndex.'.answer', $faq->answer) }}</textarea>
                                            @error('faqs.'.$faqIndex.'.answer')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-primary" onclick="addFaq()">Add FAQ</button>
                        <!-- End FAQs -->

                        <hr>

                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">Update Service</button>
                            </div>
                        </div>
                        <!-- End Submit Button -->
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('pageJs')
<script>
    let sectionIndex = {{ $service->sections->count() }};
    let faqIndex = {{ $service->faqs->count() }};

    // Add new section
    function addSection() {
        const sectionTemplate = `
            <div class="section mb-4">
                <button type="button" class="btn btn-danger btn-sm float-right remove-section">Remove Section</button>
                <input type="hidden" name="sections[${sectionIndex}][_delete]" value="0" class="delete-section-input">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Section Title</label>
                            <input type="text" name="sections[${sectionIndex}][title]" required class="form-control" placeholder="Enter Section Title">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Section Type</label>
                            <select name="sections[${sectionIndex}][section_type]" required class="form-control">
                                <option value="section_one">Section One</option>
                                <option value="section_two">Section Two</option>
                                <option value="section_three">Section Three</option>
                                <option value="section_four">Section Four</option>
                                <option value="section_five">Section Five</option>
                                <option value="section_six">Section Six</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Section Image</label>
                            <input type="file" name="sections[${sectionIndex}][image]" class="form-control">
                        </div>
                    </div>
                </div>
                <div id="section-items-container-${sectionIndex}">
                    <h5>Section Items</h5>
                </div>
                <button type="button" class="btn btn-sm btn-primary" onclick="addItem(${sectionIndex})">Add Item</button>
                <hr>
            </div>
        `;
        document.getElementById('sections-container').insertAdjacentHTML('beforeend', sectionTemplate);
        sectionIndex++;
    }

    // Add item to section
    function addItem(sectionIdx) {
        const itemsContainer = document.getElementById(`section-items-container-${sectionIdx}`);
        const itemCount = itemsContainer.querySelectorAll('.section-item').length;
        const itemTemplate = `
            <div class="row mb-3 section-item">
                
                <input type="hidden" name="sections[${sectionIdx}][items][${itemCount}][_delete]" value="0" class="delete-item-input">
                <div class="col-md-4">
                    <input type="text" name="sections[${sectionIdx}][items][${itemCount}][title]" class="form-control" placeholder="Item Title">
                </div>
                <div class="col-md-4">
                    <textarea name="sections[${sectionIdx}][items][${itemCount}][description]" class="form-control" placeholder="Item Description"></textarea>
                </div>
                <div class="col-md-2">
                    <input type="file" name="sections[${sectionIdx}][items][${itemCount}][image]" class="form-control">
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-item">×</button>
            </div>
        `;
        itemsContainer.insertAdjacentHTML('beforeend', itemTemplate);
    }

    // Add FAQ
    function addFaq() {
        const faqTemplate = `
            <div class="faq mb-3">
                <button type="button" class="btn btn-danger btn-sm float-right remove-faq">×</button>
                <input type="hidden" name="faqs[${faqIndex}][_delete]" value="0" class="delete-faq-input">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="faqs[${faqIndex}][question]" required class="form-control" placeholder="Enter Question">
                    </div>
                    <div class="col-md-6">
                        <textarea name="faqs[${faqIndex}][answer]" required class="form-control" placeholder="Enter Answer"></textarea>
                    </div>
                </div>
            </div>
        `;
        document.getElementById('faqs-container').insertAdjacentHTML('beforeend', faqTemplate);
        faqIndex++;
    }

    // Event delegation for removing sections
    document.getElementById('sections-container').addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-section')) {
            const sectionDiv = e.target.closest('.section');
            const deleteInput = sectionDiv.querySelector('.delete-section-input');
            if (deleteInput) {
                // If existing section, mark it for deletion
                deleteInput.value = 1;
                sectionDiv.style.display = 'none';
            } else {
                // If new section, remove it from DOM
                sectionDiv.remove();
            }
        }
    });

    // Event delegation for removing items
    document.getElementById('sections-container').addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-item')) {
            const itemDiv = e.target.closest('.section-item');
            const deleteInput = itemDiv.querySelector('.delete-item-input');
            if (deleteInput) {
                // If existing item, mark it for deletion
                deleteInput.value = 1;
                itemDiv.style.display = 'none';
            } else {
                // If new item, remove it from DOM
                itemDiv.remove();
            }
        }
    });

    // Event delegation for removing FAQs
    document.getElementById('faqs-container').addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-faq')) {
            const faqDiv = e.target.closest('.faq');
            const deleteInput = faqDiv.querySelector('.delete-faq-input');
            if (deleteInput) {
                // If existing FAQ, mark it for deletion
                deleteInput.value = 1;
                faqDiv.style.display = 'none';
            } else {
                // If new FAQ, remove it from DOM
                faqDiv.remove();
            }
        }
    });
</script>
@endsection
