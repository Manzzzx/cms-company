<?php

namespace Modules\Portfolio\Services;

use App\Core\Services\BaseModuleService;
use Illuminate\Support\Str;
use Modules\Portfolio\Models\Portfolio;

class PortfolioService extends BaseModuleService
{
    protected function getModelClass(): string
    {
        return Portfolio::class;
    }

    protected function getEntityFields(array $data): array
    {
        return [
            'slug' => Str::slug($data['slug']),
            'status' => $data['status'] ?? false,
            'client' => $data['client'] ?? null,
            'image' => $data['image'] ?? null,
            'url' => $data['url'] ?? null,
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
