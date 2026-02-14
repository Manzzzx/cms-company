@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Team Member</h1>
    @if ($errors->any())
        <div style="color: red; margin-bottom: 1rem;">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('admin.teams.store') }}">
        @include('admin.teams._form')
    </form>
</div>
@endsection
