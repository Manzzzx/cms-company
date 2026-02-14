<?php

namespace Modules\Testimonial\Services;

use App\Core\Services\BaseModuleService;
use Modules\Testimonial\Models\Testimonial;

class TestimonialService extends BaseModuleService
{
    protected function getModelClass(): string
    {
        return Testimonial::class;
    }

    protected function getEntityFields(array $data): array
    {
        return [
            'client_name' => $data['client_name'],
            'company' => $data['company'] ?? null,
            'rating' => $data['rating'],
            'status' => $data['status'] ?? false,
        ];
    }

    protected function getTranslationFields(array $translation): array
    {
        return [
            'message' => $translation['message'] ?? null,
        ];
    }
}
