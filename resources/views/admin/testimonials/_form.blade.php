@csrf

@if(isset($testimonial))
    @method('PUT')
@endif

<div style="margin-bottom: 1rem;">
    <label for="client_name"><strong>Client Name</strong></label><br>
    <input type="text" id="client_name" name="client_name" placeholder="Client name"
           value="{{ old('client_name', $testimonial->client_name ?? '') }}" style="width: 100%; padding: 0.5rem;">
    @error('client_name')
        <div style="color: red; font-size: 0.85rem;">{{ $message }}</div>
    @enderror
</div>

<div style="margin-bottom: 1rem;">
    <label for="company"><strong>Company</strong></label><br>
    <input type="text" id="company" name="company" placeholder="Company name"
           value="{{ old('company', $testimonial->company ?? '') }}" style="width: 100%; padding: 0.5rem;">
</div>

<div style="margin-bottom: 1rem;">
    <label for="rating"><strong>Rating (1-5)</strong></label><br>
    <select id="rating" name="rating" style="padding: 0.5rem;">
        @for($i = 5; $i >= 1; $i--)
            <option value="{{ $i }}" {{ old('rating', $testimonial->rating ?? 5) == $i ? 'selected' : '' }}>
                {{ $i }} — {{ str_repeat('★', $i) }}
            </option>
        @endfor
    </select>
</div>

<div style="margin-bottom: 1rem;">
    <label>
        <input type="checkbox" name="status" value="1"
               {{ old('status', $testimonial->status ?? false) ? 'checked' : '' }}>
        <strong>Publish</strong>
    </label>
</div>

<hr>
<h3>English</h3>

@php
    $translation = isset($testimonial) ? $testimonial->translations->firstWhere('locale', 'en') : null;
@endphp

<div style="margin-bottom: 1rem;">
    <label for="message"><strong>Message</strong></label><br>
    <textarea id="message" name="translations[en][message]" placeholder="Testimonial message"
              rows="4" style="width: 100%; padding: 0.5rem;">{{ old('translations.en.message', $translation->message ?? '') }}</textarea>
</div>

<button type="submit" style="padding: 0.5rem 1.5rem; cursor: pointer;">
    {{ isset($testimonial) ? 'Update Testimonial' : 'Add Testimonial' }}
</button>
