<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
        return [
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'short_desc' => 'required|string',
            'long_desc' => 'required|string',
            'adv_title' => 'required|string|max:255',
            'adv_desc' => 'required|string',
            'process_title' => 'required|string|max:255',
            'process_desc' => 'required|string',
            'docs_title' => 'required|string|max:255',
            'docs_desc' => 'required|string',
            'overview' => 'required|string',
            'procedure' => 'required|string',
            'date' => 'required|date',
            'sort' => 'required|integer',
            'meta_title' => 'required|string|max:255',
            'meta_desc' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'service_category_id' => 'required|integer|exists:service_categories,id',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
