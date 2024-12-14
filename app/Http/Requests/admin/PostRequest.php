<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
                    'title' => 'required|string|min:3|max:255',
                    'tags' => 'nullable|unique:tags,name',
                    'content' => 'required|string|min:3|max:255',
                    'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
                ];
                break;
            case 'PATCH':
                return [
                    'title' => 'sometimes|string|min:3|max:255',
                    'tags' => 'sometimes|unique:tags,name',
                    'content' => 'sometimes|string|min:3|max:255',
                    'image' => 'sometimes|image|mimes:jpeg,png,jpg,webp|max:2048',
                ];
                break;
            default:
                return [];
        }
    }
}
