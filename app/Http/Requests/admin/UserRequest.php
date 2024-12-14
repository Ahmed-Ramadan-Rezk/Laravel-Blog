<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use App\Models\User;

class UserRequest extends FormRequest
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
        $method = $this->method();

        switch ($method) {
            case 'POST':
            case 'PUT':
                return [
                    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                    'name' => ['required', 'string', 'max:255'],
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                    'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
                    'is_admin' => ['required', 'boolean'],
                    'is_active' => ['required', 'boolean'],
                ];
            case 'PATCH':
                return [
                    'password' => ['nullable', 'sometimes', 'confirmed', Rules\Password::defaults()],
                    'is_admin' => ['sometimes', 'boolean'],
                    'is_active' => ['sometimes', 'boolean'],
                ];
            default:
                return [];
        }
    }
}
