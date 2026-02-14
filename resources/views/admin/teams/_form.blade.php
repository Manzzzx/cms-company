@csrf

@if(isset($team))
    @method('PUT')
@endif

<div style="margin-bottom: 1rem;">
    <label for="name"><strong>Name</strong></label><br>
    <input type="text" id="name" name="name" placeholder="Full name"
           value="{{ old('name', $team->name ?? '') }}" style="width: 100%; padding: 0.5rem;">
    @error('name')
        <div style="color: red; font-size: 0.85rem;">{{ $message }}</div>
    @enderror
</div>

<div style="margin-bottom: 1rem;">
    <label for="position"><strong>Position</strong></label><br>
    <input type="text" id="position" name="position" placeholder="e.g. CEO, CTO"
           value="{{ old('position', $team->position ?? '') }}" style="width: 100%; padding: 0.5rem;">
</div>

<div style="margin-bottom: 1rem;">
    <label for="photo"><strong>Photo URL</strong></label><br>
    <input type="text" id="photo" name="photo" placeholder="Photo URL or path"
           value="{{ old('photo', $team->photo ?? '') }}" style="width: 100%; padding: 0.5rem;">
</div>

<div style="margin-bottom: 1rem;">
    <label for="linkedin"><strong>LinkedIn</strong></label><br>
    <input type="text" id="linkedin" name="linkedin" placeholder="https://linkedin.com/in/..."
           value="{{ old('linkedin', $team->linkedin ?? '') }}" style="width: 100%; padding: 0.5rem;">
</div>

<div style="margin-bottom: 1rem;">
    <label>
        <input type="checkbox" name="status" value="1"
               {{ old('status', $team->status ?? false) ? 'checked' : '' }}>
        <strong>Publish</strong>
    </label>
</div>

<hr>
<h3>English</h3>

@php
    $translation = isset($team) ? $team->translations->firstWhere('locale', 'en') : null;
@endphp

<div style="margin-bottom: 1rem;">
    <label for="bio"><strong>Bio</strong></label><br>
    <textarea id="bio" name="translations[en][bio]" placeholder="Short biography"
              rows="4" style="width: 100%; padding: 0.5rem;">{{ old('translations.en.bio', $translation->bio ?? '') }}</textarea>
</div>

<button type="submit" style="padding: 0.5rem 1.5rem; cursor: pointer;">
    {{ isset($team) ? 'Update Member' : 'Add Member' }}
</button>
