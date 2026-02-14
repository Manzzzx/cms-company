@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Page</h1>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 1rem;">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.pages.update', $page) }}">
        @include('admin.pages._form', ['page' => $page])
    </form>
</div>
@endsection
