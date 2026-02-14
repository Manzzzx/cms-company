@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pages</h1>

    @if (session('success'))
        <div style="color: green; margin-bottom: 1rem;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.pages.create') }}" style="display: inline-block; margin-bottom: 1rem;">+ Create Page</a>

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Slug</th>
                <th>Title</th>
                <th>Status</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pages as $page)
            <tr>
                <td>{{ $page->id }}</td>
                <td>{{ $page->slug }}</td>
                <td>{{ $page->translations->firstWhere('locale', 'en')?->title ?? '—' }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.pages.toggleStatus', $page) }}" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" style="cursor: pointer; border: none; background: none; color: {{ $page->status ? 'green' : 'gray' }};">
                            {{ $page->status ? '● Published' : '○ Draft' }}
                        </button>
                    </form>
                </td>
                <td>{{ $page->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('admin.pages.edit', $page) }}">Edit</a>
                    &nbsp;|&nbsp;
                    <form method="POST" action="{{ route('admin.pages.destroy', $page) }}" style="display:inline;"
                          onsubmit="return confirm('Are you sure you want to delete this page?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="cursor: pointer; border: none; background: none; color: red;">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center; padding: 2rem;">No pages found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $pages->links() }}
</div>
@endsection