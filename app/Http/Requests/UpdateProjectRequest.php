<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'title' => ['string'],
            'hero' => ['nullable', 'image'],
            'sub_title' => ['nullable', 'string'],
            'thumb' => ['nullable', 'image'],
            'status' => ['nullable', 'boolean'],
        ];
    }
}
