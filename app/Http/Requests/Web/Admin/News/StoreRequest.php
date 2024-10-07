<?php

namespace App\Http\Requests\Web\Admin\News;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'sections' => ['nullable', 'array'],
            'sections.*.type' => ['nullable', 'string', 'max:255'],
            'sections.*.value' => ['nullable', 'string'],
        ];
    }
}
