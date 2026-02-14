@csrf

@if(isset($page))
    @method('PUT')
@endif

<div style="margin-bottom: 1rem;">
    <label for="slug"><strong>Slug</strong></label><br>
    <input type="text" id="slug" name="slug" placeholder="e.g. about-us"
           value="{{ old('slug', $page->slug ?? '') }}" style="width: 100%; padding: 0.5rem;">
    @error('slug')
        <div style="color: red; font-size: 0.85rem;">{{ $message }}</div>
    @enderror
</div>

<div style="margin-bottom: 1rem;">
    <label>
        <input type="checkbox" name="status" value="1"
               {{ old('status', $page->status ?? false) ? 'checked' : '' }}>
        <strong>Publish</strong>
    </label>
</div>

<hr>

<h3>English</h3>

@php
    $translation = isset($page) ? $page->translations->firstWhere('locale', 'en') : null;
@endphp

<div style="margin-bottom: 1rem;">
    <label for="title"><strong>Title</strong></label><br>
    <input type="text" id="title" name="translations[en][title]" placeholder="Page title"
           value="{{ old('translations.en.title', $translation->title ?? '') }}" style="width: 100%; padding: 0.5rem;">
    @error('translations.en.title')
        <div style="color: red; font-size: 0.85rem;">{{ $message }}</div>
    @enderror
</div>

<div style="margin-bottom: 1rem;">
    <label for="content"><strong>Content</strong></label><br>
    <textarea id="content" name="translations[en][content]" placeholder="Page content"
              rows="6" style="width: 100%; padding: 0.5rem;">{{ old('translations.en.content', $translation->content ?? '') }}</textarea>
</div>

<div style="margin-bottom: 1rem;">
    <label for="meta_title"><strong>Meta Title</strong></label><br>
    <input type="text" id="meta_title" name="translations[en][meta_title]" placeholder="SEO title"
           value="{{ old('translations.en.meta_title', $translation->meta_title ?? '') }}" style="width: 100%; padding: 0.5rem;">
</div>

<div style="margin-bottom: 1rem;">
    <label for="meta_description"><strong>Meta Description</strong></label><br>
    <textarea id="meta_description" name="translations[en][meta_description]" placeholder="SEO description"
              rows="2" style="width: 100%; padding: 0.5rem;">{{ old('translations.en.meta_description', $translation->meta_description ?? '') }}</textarea>
</div>

<button type="submit" style="padding: 0.5rem 1.5rem; cursor: pointer;">
    {{ isset($page) ? 'Update Page' : 'Create Page' }}
</button>
