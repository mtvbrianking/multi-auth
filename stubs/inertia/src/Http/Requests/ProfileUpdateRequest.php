<?php

namespace App\Modules\{{pluralClass}}\Http\Requests;

use App\Modules\{{pluralClass}}\Models\{{singularClass}};
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique({{singularClass}}::class)->ignore($this->user('{{singularSlug}}')->id)],
        ];
    }
}
