@csrf

@if(isset($service))
    @method('PUT')
@endif

<div style="margin-bottom: 1rem;">
    <label for="slug"><strong>Slug</strong></label><br>
    <input type="text" id="slug" name="slug" placeholder="e.g. web-development"
           value="{{ old('slug', $service->slug ?? '') }}" style="width: 100%; padding: 0.5rem;">
    @error('slug')
        <div style="color: red; font-size: 0.85rem;">{{ $message }}</div>
    @enderror
</div>

<div style="margin-bottom: 1rem;">
    <label for="icon"><strong>Icon</strong></label><br>
    <input type="text" id="icon" name="icon" placeholder="e.g. fa-code or icon class"
           value="{{ old('icon', $service->icon ?? '') }}" style="width: 100%; padding: 0.5rem;">
</div>

<div style="margin-bottom: 1rem;">
    <label>
        <input type="checkbox" name="status" value="1"
               {{ old('status', $service->status ?? false) ? 'checked' : '' }}>
        <strong>Publish</strong>
    </label>
</div>

<hr>

<h3>English</h3>

@php
    $translation = isset($service) ? $service->translations->firstWhere('locale', 'en') : null;
@endphp

<div style="margin-bottom: 1rem;">
    <label for="title"><strong>Title</strong></label><br>
    <input type="text" id="title" name="translations[en][title]" placeholder="Service title"
           value="{{ old('translations.en.title', $translation->title ?? '') }}" style="width: 100%; padding: 0.5rem;">
    @error('translations.en.title')
        <div style="color: red; font-size: 0.85rem;">{{ $message }}</div>
    @enderror
</div>

<div style="margin-bottom: 1rem;">
    <label for="description"><strong>Description</strong></label><br>
    <textarea id="description" name="translations[en][description]" placeholder="Service description"
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
    {{ isset($service) ? 'Update Service' : 'Create Service' }}
</button>
