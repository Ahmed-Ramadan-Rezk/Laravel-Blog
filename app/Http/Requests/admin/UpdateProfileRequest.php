<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class UpdateProfileRequest extends FormRequest
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
            'avatar' => ['nullable', 'sometimes', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'name' => ['nullable', 'sometimes', 'string', 'max:255'],
            'about' => ['nullable', 'sometimes', 'string', 'max:255'],
            'company' => ['nullable', 'sometimes', 'string', 'max:255'],
            'job' => ['nullable', 'sometimes', 'string', 'max:255'],
            'country' => ['nullable', 'sometimes', 'string', 'max:255'],
            'address' => ['nullable', 'sometimes', 'string', 'max:255'],
            'phone' => ['nullable', 'sometimes', 'string', 'max:255'],
            'email' => [
                'sometimes',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'twitter' => ['nullable', 'sometimes', 'string', 'max:255'],
            'facebook' => ['nullable', 'sometimes', 'string', 'max:255'],
            'instagram' => ['nullable', 'sometimes', 'string', 'max:255'],
            'linkedin' => ['nullable', 'sometimes', 'string', 'max:255'],
        ];
    }
}
