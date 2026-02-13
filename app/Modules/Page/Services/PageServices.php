<?php

namespace Modules\Page\Services;

use Modules\Page\Models\Page;
use Illuminate\Support\Str;

class PageService
{
    private function generateUniqueSlug(string $slug): string
    {
        $base = Str::slug($slug);
        $count = 1;

        while (Page::where('slug', $base)->exists()) {
            $base = Str::slug($slug) . '-' . $count++;
        }

        return $base;
    }
    public function create(array $data)
    {
        $page = Page::create([
            'slug' => $this->generateUniqueSlug($data['slug']),
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