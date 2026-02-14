@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Testimonials</h1>
    @if (session('success'))
        <div style="color: green; margin-bottom: 1rem;">{{ session('success') }}</div>
    @endif
    <a href="{{ route('admin.testimonials.create') }}" style="display: inline-block; margin-bottom: 1rem;">+ Add Testimonial</a>
    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr><th>ID</th><th>Client</th><th>Company</th><th>Rating</th><th>Status</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @forelse($testimonials as $testimonial)
            <tr>
                <td>{{ $testimonial->id }}</td>
                <td>{{ $testimonial->client_name }}</td>
                <td>{{ $testimonial->company ?? '—' }}</td>
                <td>{{ str_repeat('★', $testimonial->rating) }}{{ str_repeat('☆', 5 - $testimonial->rating) }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.testimonials.toggleStatus', $testimonial) }}" style="display:inline;">
                        @csrf @method('PATCH')
                        <button type="submit" style="cursor:pointer;border:none;background:none;color:{{ $testimonial->status ? 'green' : 'gray' }};">
                            {{ $testimonial->status ? '● Published' : '○ Draft' }}
                        </button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}">Edit</a> |
                    <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                        @csrf @method('DELETE')
                        <button type="submit" style="cursor:pointer;border:none;background:none;color:red;">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" style="text-align:center;padding:2rem;">No testimonials found.</td></tr>
            @endforelse
        </tbody>
    </table>
    {{ $testimonials->links() }}
</div>
@endsection
