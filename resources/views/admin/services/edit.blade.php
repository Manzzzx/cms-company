@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Service</h1>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 1rem;">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('admin.services.update', $service) }}">
        @include('admin.services._form', ['service' => $service])
    </form>
</div>
@endsection
