@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Portfolio</h1>
    @if ($errors->any())
        <div style="color: red; margin-bottom: 1rem;">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('admin.portfolios.update', $portfolio) }}">
        @include('admin.portfolios._form', ['portfolio' => $portfolio])
    </form>
</div>
@endsection
