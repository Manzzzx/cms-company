<?php

namespace App\Core\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

abstract class BaseModuleService
{
    /**
     * Get the fields to store on the main entity table.
     * Override in child class to customize.
     */
    abstract protected function getEntityFields(array $data): array;

    /**
     * Get the translation fields from a single translation entry.
     * Override in child class to customize.
     */
    abstract protected function getTranslationFields(array $translation): array;

    /**
     * Get the model class for this service.
     */
    abstract protected function getModelClass(): string;

    /**
     * Check if this module supports translations.
     */
    protected function hasTranslations(): bool
    {
        return true;
    }

    public function create(array $data): Model
    {
        return DB::transaction(function () use ($data) {
            $modelClass = $this->getModelClass();
            $entity = $modelClass::create($this->getEntityFields($data));

            if ($this->hasTranslations() && isset($data['translations'])) {
                foreach ($data['translations'] as $locale => $translation) {
                    $entity->translations()->create(
                        array_merge(
                            ['locale' => $locale],
                            $this->getTranslationFields($translation)
                        )
                    );
                }
            }

            return $entity;
        });
    }

    public function update(Model $entity, array $data): Model
    {
        DB::transaction(function () use ($entity, $data) {
            $entity->update($this->getEntityFields($data));

            if ($this->hasTranslations() && isset($data['translations'])) {
                foreach ($data['translations'] as $locale => $translation) {
                    $entity->translations()->updateOrCreate(
                        ['locale' => $locale],
                        $this->getTranslationFields($translation)
                    );
                }
            }
        });

        return $entity;
    }

    public function delete(Model $entity): void
    {
        $entity->delete();
    }
}
