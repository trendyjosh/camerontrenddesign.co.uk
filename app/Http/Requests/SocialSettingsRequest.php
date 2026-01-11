<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialSettingsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'site_facebook' => ['nullable', 'string'],
            'site_pinterest' => ['nullable', 'string'],
            'site_linkedin' => ['nullable', 'string'],
            'site_instagram' => ['nullable', 'string'],
        ];
    }
}
