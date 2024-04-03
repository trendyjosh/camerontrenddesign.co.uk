<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectContentRequest extends FormRequest
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
            'content.*.content' => ['required_without:content.*.file', 'string'],
            'content.*.file' => ['required_without:content.*.content', 'file'],
            'content.*.full' => ['boolean', 'required'],
            'content.*.src' => ['string', 'nullable'],
            'content.*.caption' => ['required_with:content.*.file', 'string'],
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
            'content.*.content.required_without' => 'The content field is required.',
            'content.*.file.required_without' => 'The image field is required.',
            'content.*.caption.required_with' => 'The image caption is required.',
        ];
    }
}
