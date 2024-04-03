<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectContentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'content' => ['array'],
            'content.*.id' => ['nullable', 'integer'],
            'content.*.style' => ['nullable', 'string'],
            'content.*.position' => ['nullable', 'integer'],
            'content.*.content' => ['required_without_all:content.*.file,content.*.source', 'nullable', 'string'],
            'content.*.file' => ['required_without_all:content.*.content,content.*.source', 'nullable', 'file'],
            'content.*.full' => ['boolean', 'required'],
            'content.*.source' => ['nullable', 'string'],
            'content.*.caption' => ['required_with:content.*.file', 'nullable', 'string'],
        ];
    }

    /**
     * Get the validation messages that apply to the rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'content.*.*.string' => 'This field must be a string',
            'content.*.content.required_without_all' => 'The content field is required.',
            'content.*.file.required_without_all' => 'The image field is required.',
            'content.*.caption.required_with' => 'The image caption is required.',
        ];
    }
}
