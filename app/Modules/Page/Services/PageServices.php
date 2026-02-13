<?php

namespace Modules\Page\Services;

use Modules\Page\Models\Page;
use Illuminate\Support\Str;

class PageService
{
    public function create(array $data)
    {
        $page = Page::create([
            'slug' => \Str::slug($data['slug']),
            'status' => $data['status'] ?? false
        ]);

        foreach ($data['translations'] as $locale => $translation) {
            $page->translations()->create([
                'locale' => $locale,
                'title' => $translation['title'],
                'content' => $translation['content'] ?? null,
                'meta_title' => $translation['meta_title'] ?? null,
                'meta_description' => $translation['meta_description'] ?? null,
            ]);
        }

        return $page;
    }
}