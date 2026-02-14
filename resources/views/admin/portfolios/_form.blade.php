@csrf

@if(isset($portfolio))
    @method('PUT')
@endif

<div style="margin-bottom: 1rem;">
    <label for="slug"><strong>Slug</strong></label><br>
    <input type="text" id="slug" name="slug" placeholder="e.g. project-alpha"
           value="{{ old('slug', $portfolio->slug ?? '') }}" style="width: 100%; padding: 0.5rem;">
    @error('slug')
        <div style="color: red; font-size: 0.85rem;">{{ $message }}</div>
    @enderror
</div>

<div style="margin-bottom: 1rem;">
    <label for="client"><strong>Client</strong></label><br>
    <input type="text" id="client" name="client" placeholder="Client name"
           value="{{ old('client', $portfolio->client ?? '') }}" style="width: 100%; padding: 0.5rem;">
</div>

<div style="margin-bottom: 1rem;">
    <label for="image"><strong>Image URL</strong></label><br>
    <input type="text" id="image" name="image" placeholder="Image URL or path"
           value="{{ old('image', $portfolio->image ?? '') }}" style="width: 100%; padding: 0.5rem;">
</div>

<div style="margin-bottom: 1rem;">
    <label for="url"><strong>Project URL</strong></label><br>
    <input type="text" id="url" name="url" placeholder="https://example.com"
           value="{{ old('url', $portfolio->url ?? '') }}" style="width: 100%; padding: 0.5rem;">
</div>

<div style="margin-bottom: 1rem;">
    <label>
        <input type="checkbox" name="status" value="1"
               {{ old('status', $portfolio->status ?? false) ? 'checked' : '' }}>
        <strong>Publish</strong>
    </label>
</div>

<hr>
<h3>English</h3>

@php
    $translation = isset($portfolio) ? $portfolio->translations->firstWhere('locale', 'en') : null;
@endphp

<div style="margin-bottom: 1rem;">
    <label for="title"><strong>Title</strong></label><br>
    <input type="text" id="title" name="translations[en][title]" placeholder="Project title"
           value="{{ old('translations.en.title', $translation->title ?? '') }}" style="width: 100%; padding: 0.5rem;">
    @error('translations.en.title')
        <div style="color: red; font-size: 0.85rem;">{{ $message }}</div>
    @enderror
</div>

<div style="margin-bottom: 1rem;">
    <label for="description"><strong>Description</strong></label><br>
    <textarea id="description" name="translations[en][description]" placeholder="Project description"
              rows="6" style="width: 100%; padding: 0.5rem;">{{ old('translations.en.description', $translation->description ?? '') }}</textarea>
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
    {{ isset($portfolio) ? 'Update Portfolio' : 'Create Portfolio' }}
</button>
