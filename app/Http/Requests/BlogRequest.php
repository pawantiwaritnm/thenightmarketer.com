<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isStoring  = $this->routeIs('blog-store');
        return [
            'title' => 'required|min:3|max:255',
            'subtitle' => 'required|min:3|max:255',
            'desc' => 'required|min:3',
            'date' => 'required|date',
            'sortOrder' => 'required|integer',
            'author_id' => "required|exists:admins,id",
            'metaTitle' => 'nullable|string|max:255',
            'metaKeyword' => 'nullable|string|max:1024',
            'metaDesc' => 'nullable|string',
            'slug' => 'required|string|max:255',
            'key_takeaways' => 'nullable|string',
            'tags' => 'nullable|string',
            'blog_category_id' => "required|exists:blog_categories,id",
            'image' => $isStoring ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048' : 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'featured_images' => $isStoring ? 'nullable|array|min:1|max:5' : 'nullable|array|min:1|max:5',
            'featured_images.*' => $isStoring ? 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' : 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];
    }

    //custom error messages
    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Title is required',
            'title.min' => 'Title must be at least 3 characters',
            'title.max' => 'Title must be less than 255 characters',
            'subtitle.required' => 'Subtitle is required',
            'subtitle.min' => 'Subtitle must be at least 3 characters',
            'subtitle.max' => 'Subtitle must be less than 255 characters',
            'desc.required' => 'Description is required',
            'desc.min' => 'Description must be at least 3 characters',
            'date.required' => 'Date is required',
            'date.date' => 'Date must be a valid date',
            'sortOrder.required' => 'Sort Order is required',
            'sortOrder.integer' => 'Sort Order must be an integer',
            'author_id.required' => 'Author is required',
            'author_id.exists' => 'Author must be a valid author',
            'metaTitle.required' => 'Meta Title is required',
            'metaKeyword.required' => 'Meta Keyword is required',
            'metaDesc.required' => 'Meta Description is required',
            'blog_category_id.required' => 'Blog Category is required',
            'blog_category_id.exists' => 'Blog Category must be a valid blog category',
            'image.required' => 'Blog Image is required',
            'image.image' => 'Blog Image must be an image',
            'image.mimes' => 'Blog Image must be a jpeg, png, jpg, gif, or svg',
            'image.max' => 'Blog Image must be less than 2MB',
            'featured_images.required' => 'Featured Images are required',
            'featured_images.array' => 'Featured Images must be an array',
            'featured_images.min' => 'Featured Images must be at least 1 image',
            'featured_images.max' => 'Featured Images must be less than 5 images',
            'featured_images.*.required' => 'Featured Image are required',
            'featured_images.*.image' => 'Featured Image must be an image',
            'featured_images.*.mimes' => 'Featured Image must be a jpeg, png, jpg, or gif, webp',
            'featured_images.*.max' => 'Featured Image must be less than 2MB',
            'tags' => 'nullable|string',
        ];
    }

    //create attributes with same name as input fields
    //this will help in showing error messages
    //with the name of input fields
    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'desc' => 'Description',
            'date' => 'Date',
            'sortOrder' => 'Sort Order',
            'author_id' => "Author",
            'metaTitle' => 'Meta Title',
            'metaKeyword' => 'Meta Keyword',
            'metaDesc' => 'Meta Description',
            'blog_category_id' => "Blog Category",
            'featured_images' => "Featured Image",
        ];
    }
}
