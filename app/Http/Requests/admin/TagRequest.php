<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
                    'name' => 'required|string|max:255|unique:tags,name',
                ];

            case 'PATCH':
                return [
                    'name' => 'sometimes|string|max:255|unique:tags,name',
                ];
            default:
                return [];
        }
    }
}
