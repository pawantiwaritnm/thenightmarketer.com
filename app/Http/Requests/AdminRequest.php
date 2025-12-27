<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        $isStoring  = $this->routeIs('user-store');
       // print_r($isStoring); die();
        $roles = implode(',', config('constants.roles'));

        return [
            'name'  => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            'bio' => 'nullable|string',
            'title' => 'nullable|string',
            'email' => $isStoring ?
                'required|email|unique:admins' :
                'required|email|unique:admins,email,' . $this->id,
            'role_id'  => 'required|exists:roles,id',
            'role'  => 'nullable|string|in:' . $roles,
            'password' => $isStoring
                ? 'required|string|min:8' :
                'nullable|string|min:8',
            'pic'  => $isStoring ?
                'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' :
                'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
