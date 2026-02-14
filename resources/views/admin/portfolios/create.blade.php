@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Portfolio</h1>
    @if ($errors->any())
        <div style="color: red; margin-bottom: 1rem;">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('admin.portfolios.store') }}">
        @include('admin.portfolios._form')
    </form>
</div>
@endsection
