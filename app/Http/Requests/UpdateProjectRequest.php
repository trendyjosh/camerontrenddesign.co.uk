<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                Rule::unique('projects')->ignore($this->request->get('id')), // Can't match other projects
                'regex:/^[a-z ]+$/i' // Only alphabetic and spaces
            ],
            'hero' => ['nullable', 'image'],
            'sub_title' => ['nullable', 'string'],
            'thumb' => ['nullable', 'image'],
            'status' => ['nullable', 'boolean'],
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
            'title.regex' => 'The title field may only contain alphabetic characters (a-z, A-Z) and spaces.',
        ];
    }
}
