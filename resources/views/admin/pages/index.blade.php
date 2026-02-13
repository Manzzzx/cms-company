@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Pages</h1>

  <a href="{{ route('admin.pages.create') }}">Create Page</a>

  <table border="1">
    <thead>
      <tr>
        <th>ID</th>
        <th>Slug</th>
        <th>Status</th>
        <th>Created</th>
      </tr>
    </thead>
    <tbody>
      @foreach($pages as $page)
      <tr>
        <td>{{ $page->id }}</td>
        <td>{{ $page->slug }}</td>
        <td>{{ $page->status ? 'Published' : 'Draft' }}</td>
        <td>{{ $page->created_at }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  {{ $pages->links() }}
</div>
@endsection