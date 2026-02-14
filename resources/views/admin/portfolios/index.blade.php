@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Portfolios</h1>

    @if (session('success'))
        <div style="color: green; margin-bottom: 1rem;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.portfolios.create') }}" style="display: inline-block; margin-bottom: 1rem;">+ Create Portfolio</a>

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Slug</th>
                <th>Title</th>
                <th>Client</th>
                <th>Status</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($portfolios as $portfolio)
            <tr>
                <td>{{ $portfolio->id }}</td>
                <td>{{ $portfolio->slug }}</td>
                <td>{{ $portfolio->translations->firstWhere('locale', 'en')?->title ?? '—' }}</td>
                <td>{{ $portfolio->client ?? '—' }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.portfolios.toggleStatus', $portfolio) }}" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" style="cursor: pointer; border: none; background: none; color: {{ $portfolio->status ? 'green' : 'gray' }};">
                            {{ $portfolio->status ? '● Published' : '○ Draft' }}
                        </button>
                    </form>
                </td>
                <td>{{ $portfolio->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('admin.portfolios.edit', $portfolio) }}">Edit</a>
                    &nbsp;|&nbsp;
                    <form method="POST" action="{{ route('admin.portfolios.destroy', $portfolio) }}" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="cursor: pointer; border: none; background: none; color: red;">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" style="text-align: center; padding: 2rem;">No portfolios found.</td></tr>
            @endforelse
        </tbody>
    </table>
    {{ $portfolios->links() }}
</div>
@endsection
