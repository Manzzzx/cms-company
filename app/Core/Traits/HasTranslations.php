<?php

namespace App\Core\Traits;

trait HasTranslations
{
    public function translations()
    {
        return $this->hasMany($this->translationModel);
    }

    public function getTranslation(string $locale = 'en')
    {
        return $this->translations->firstWhere('locale', $locale);
    }
}
