<?php

namespace Modules\Team\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'photo' => 'nullable|string|max:255',
            'linkedin' => 'nullable|url|max:255',
            'status' => 'boolean',
            'translations' => 'required|array',
            'translations.*.bio' => 'nullable|string',
        ];
    }
}
