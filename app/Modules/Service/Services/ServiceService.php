<?php

namespace Modules\Service\Services;

use App\Core\Services\BaseModuleService;
use Illuminate\Support\Str;
use Modules\Service\Models\Service;

class ServiceService extends BaseModuleService
{
    protected function getModelClass(): string
    {
        return Service::class;
    }

    protected function getEntityFields(array $data): array
    {
        return [
            'slug' => Str::slug($data['slug']),
            'status' => $data['status'] ?? false,
            'icon' => $data['icon'] ?? null,
        ];
    }

    protected function getTranslationFields(array $translation): array
    {
        return [
            'title' => $translation['title'],
            'description' => $translation['description'] ?? null,
            'meta_title' => $translation['meta_title'] ?? null,
            'meta_description' => $translation['meta_description'] ?? null,
        ];
    }
}
