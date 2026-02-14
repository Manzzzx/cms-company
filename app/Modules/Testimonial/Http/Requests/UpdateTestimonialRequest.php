<?php

namespace Modules\Testimonial\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTestimonialRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'client_name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'status' => 'boolean',
            'translations' => 'required|array',
            'translations.*.message' => 'nullable|string',
        ];
    }
}
