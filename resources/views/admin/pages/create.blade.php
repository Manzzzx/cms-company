@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Create Page</h1>

  <form method="POST" action="{{ route('admin.pages.store') }}">
    @csrf

    <input type="text" name="slug" placeholder="Slug">

    <label>
      <input type="checkbox" name="status" value="1">
      Publish
    </label>

    <h3>English</h3>
    <input type="text" name="translations[en][title]" placeholder="Title">
    <textarea name="translations[en][content]" placeholder="Content"></textarea>

    <button type="submit">Save</button>
  </form>
</div>
@endsection