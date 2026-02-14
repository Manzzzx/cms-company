@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Service</h1>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 1rem;">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('admin.services.store') }}">
        @include('admin.services._form')
    </form>
</div>
@endsection
