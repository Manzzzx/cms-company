@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Team Member</h1>
    @if ($errors->any())
        <div style="color: red; margin-bottom: 1rem;">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('admin.teams.update', $team) }}">
        @include('admin.teams._form', ['team' => $team])
    </form>
</div>
@endsection
