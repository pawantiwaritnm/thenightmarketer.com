<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DueRequest extends FormRequest
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
            'title' => 'required|string',
            'month' => 'required|string',
            'year' => 'required|integer',
            'link' => 'required|string',
            'note' => 'required|string',
            'desc' => 'required|string',
            'admin_id' => 'required|integer',
            // 'due_date' => 'required|date_format:Y-m-d',
            // 'due_date.*' => 'required|date_format:Y-m-d',
        ];
    }
}
