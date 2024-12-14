<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSiteSettings extends FormRequest
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
            'site_name' => 'sometimes|string|max:255',
            'site_logo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'facebook' => 'sometimes|string|max:255',
            'twitter' => 'sometimes|string|max:255',
            'github' => 'sometimes|string|max:255',
            'phone' => 'sometimes|string|max:255',
            'address' => 'sometimes|string|max:255',
            'about_title' => 'sometimes|string|max:255',
            'about_content' => 'sometimes|string|max:1000',
        ];
    }
}
