<?php

namespace Modules\Team\Services;

use App\Core\Services\BaseModuleService;
use Modules\Team\Models\Team;

class TeamService extends BaseModuleService
{
    protected function getModelClass(): string
    {
        return Team::class;
    }

    protected function getEntityFields(array $data): array
    {
        return [
            'name' => $data['name'],
            'position' => $data['position'] ?? null,
            'photo' => $data['photo'] ?? null,
            'linkedin' => $data['linkedin'] ?? null,
            'status' => $data['status'] ?? false,
        ];
    }

    protected function getTranslationFields(array $translation): array
    {
        return [
            'bio' => $translation['bio'] ?? null,
        ];
    }
}
