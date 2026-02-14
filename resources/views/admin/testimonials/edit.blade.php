@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Testimonial</h1>
    @if ($errors->any())
        <div style="color: red; margin-bottom: 1rem;">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}">
        @include('admin.testimonials._form', ['testimonial' => $testimonial])
    </form>
</div>
@endsection
