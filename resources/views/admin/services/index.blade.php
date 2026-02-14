@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Services</h1>

    @if (session('success'))
        <div style="color: green; margin-bottom: 1rem;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.services.create') }}" style="display: inline-block; margin-bottom: 1rem;">+ Create Service</a>

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Slug</th>
                <th>Title</th>
                <th>Icon</th>
                <th>Status</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->slug }}</td>
                <td>{{ $service->translations->firstWhere('locale', 'en')?->title ?? '—' }}</td>
                <td>{{ $service->icon ?? '—' }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.services.toggleStatus', $service) }}" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" style="cursor: pointer; border: none; background: none; color: {{ $service->status ? 'green' : 'gray' }};">
                            {{ $service->status ? '● Published' : '○ Draft' }}
                        </button>
                    </form>
                </td>
                <td>{{ $service->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('admin.services.edit', $service) }}">Edit</a>
                    &nbsp;|&nbsp;
                    <form method="POST" action="{{ route('admin.services.destroy', $service) }}" style="display:inline;"
                          onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="cursor: pointer; border: none; background: none; color: red;">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; padding: 2rem;">No services found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $services->links() }}
</div>
@endsection
