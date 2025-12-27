@extends('admin.layouts.app')
@section('title', isset($blog) ? 'Edit Blog' : 'Create Blog')
@section('page-title', isset($blog) ? 'Edit Blog' : 'Create New Blog')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-blog me-2"></i>{{ isset($blog) ? 'Edit Blog: ' . $blog->title : 'Create New Blog' }}</h5>
        <a href="{{ route('blog-list') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back to Blogs
        </a>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Please fix the following errors:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form method="POST" enctype="multipart/form-data"
            action="{{ isset($blog) ? route('blog-update', $blog) : route('blog-store') }}" id="blogForm">
            @csrf
            @isset($blog)
                @method('PUT')
            @endisset

            <div class="row">
                <!-- Basic Information Section -->
                <div class="col-12">
                    <h6 class="mb-3 border-bottom pb-2"><i class="fas fa-info-circle me-2"></i>Basic Information</h6>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                           id="title" name="title" value="{{ old('title', @$blog->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="subtitle" class="form-label">Subtitle</label>
                    <input type="text" class="form-control @error('subtitle') is-invalid @enderror"
                           id="subtitle" name="subtitle" value="{{ old('subtitle', @$blog->subtitle) }}">
                    @error('subtitle')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror"
                           id="slug" name="slug" value="{{ old('slug', @$blog->slug) }}">
                    <small class="text-muted">Leave blank to auto-generate from title</small>
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="blog_category_id" class="form-label">Category</label>
                    <select class="form-select @error('blog_category_id') is-invalid @enderror"
                            id="blog_category_id" name="blog_category_id">
                        <option value="">Select Category</option>
                        @foreach ($blogCategories as $cat)
                            <option value="{{ $cat->id }}"
                                {{ old('blog_category_id', @$blog->blog_category_id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('blog_category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="author_id" class="form-label">Author</label>
                    <select class="form-select @error('author_id') is-invalid @enderror"
                            id="author_id" name="author_id">
                        <option value="">Select Author</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}"
                                {{ old('author_id', @$blog->author_id) == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3 mb-3">
                    <label for="date" class="form-label">Publish Date</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                           id="date" name="date"
                           @if(isset($blog->date))
                               value="{{ date('Y-m-d', strtotime($blog->date)) }}"
                           @elseif(old('date'))
                               value="{{ date('Y-m-d', strtotime(old('date'))) }}"
                           @endif>
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3 mb-3">
                    <label for="sortOrder" class="form-label">Sort Order</label>
                    <input type="number" class="form-control @error('sortOrder') is-invalid @enderror"
                           id="sortOrder" name="sortOrder" value="{{ old('sortOrder', @$blog->sortOrder ?? 0) }}">
                    @error('sortOrder')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <textarea class="form-control @error('desc') is-invalid @enderror"
                              id="desc" name="desc" rows="10">{{ old('desc', @$blog->desc) }}</textarea>
                    @error('desc')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="key_takeaways" class="form-label">Key Takeaways</label>
                    <textarea class="form-control @error('key_takeaways') is-invalid @enderror"
                              id="key_takeaways" name="key_takeaways" rows="10">{{ old('key_takeaways', @$blog->key_takeaways) }}</textarea>
                    @error('key_takeaways')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="tags" class="form-label">Tags</label>
                    <input type="text" class="form-control @error('tags') is-invalid @enderror"
                           id="tags" name="tags" value="{{ old('tags', @$blog->tags) }}"
                           placeholder="Enter tags separated by commas">
                    <small class="text-muted">Separate multiple tags with commas</small>
                    @error('tags')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Media Section -->
                <div class="col-12 mt-3">
                    <h6 class="mb-3 border-bottom pb-2"><i class="fas fa-image me-2"></i>Media</h6>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">Blog Image @if(!isset($blog))<span class="text-danger">*</span>@endif</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                           id="image" name="image" accept="image/*" {{ isset($blog) ? '' : 'required' }}>
                    @if(isset($blog) && $blog->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/blogs/' . $blog->image) }}"
                                 alt="Current Image" height="100" class="img-thumbnail">
                        </div>
                    @endif
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- SEO Section -->
                <div class="col-12 mt-3">
                    <h6 class="mb-3 border-bottom pb-2"><i class="fas fa-search me-2"></i>SEO Settings</h6>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="metaTitle" class="form-label">Meta Title</label>
                    <input type="text" class="form-control @error('metaTitle') is-invalid @enderror"
                           id="metaTitle" name="metaTitle" value="{{ old('metaTitle', @$blog->metaTitle) }}"
                           maxlength="60">
                    <small class="text-muted">Recommended: 50-60 characters</small>
                    @error('metaTitle')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="metaDesc" class="form-label">Meta Description</label>
                    <textarea class="form-control @error('metaDesc') is-invalid @enderror"
                              id="metaDesc" name="metaDesc" rows="3"
                              maxlength="160">{{ old('metaDesc', @$blog->metaDesc) }}</textarea>
                    <small class="text-muted">Recommended: 150-160 characters</small>
                    @error('metaDesc')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="metaKeyword" class="form-label">Meta Keywords</label>
                    <input type="text" class="form-control @error('metaKeyword') is-invalid @enderror"
                           id="metaKeyword" name="metaKeyword" value="{{ old('metaKeyword', @$blog->metaKeyword) }}"
                           placeholder="keyword1, keyword2, keyword3">
                    <small class="text-muted">Separate keywords with commas</small>
                    @error('metaKeyword')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ isset($blog) ? 'Update Blog' : 'Create Blog' }}
                </button>
                <a href="{{ route('blog-list') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('admin/js/ckeditor.js') }}"></script>
<script>
$(document).ready(function() {
    // Initialize CKEditor for description and key takeaways
    if (typeof CKEDITOR !== 'undefined') {
        CKEDITOR.replace('desc', {
            height: 300
        });
        CKEDITOR.replace('key_takeaways', {
            height: 200
        });
    }

    // Auto-generate slug from title
    $('#title').on('blur', function() {
        if ($('#slug').val() === '') {
            let slug = $(this).val()
                .toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/[\s_-]+/g, '-')
                .replace(/^-+|-+$/g, '');
            $('#slug').val(slug);
        }
    });

    // Character count for meta fields
    function updateCharCount(inputId, maxLength) {
        const input = $(`#${inputId}`);
        const currentLength = input.val().length;
        const color = currentLength > maxLength ? 'text-danger' : 'text-muted';

        input.next('small').html(`${currentLength}/${maxLength} characters <span class="${color}">${maxLength - currentLength} remaining</span>`);
    }

    $('#metaTitle').on('input', function() {
        updateCharCount('metaTitle', 60);
    });

    $('#metaDesc').on('input', function() {
        updateCharCount('metaDesc', 160);
    });
});
</script>
<style>
    .cke_notifications_area {
        display: none !important;
    }
</style>
@endpush
