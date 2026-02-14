@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contact Leads</h1>
    @if (session('success'))
        <div style="color: green; margin-bottom: 1rem;">{{ session('success') }}</div>
    @endif
    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Message</th><th>Date</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @forelse($leads as $lead)
            <tr>
                <td>{{ $lead->id }}</td>
                <td>{{ $lead->name }}</td>
                <td><a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a></td>
                <td>{{ $lead->phone ?? '—' }}</td>
                <td>{{ Str::limit($lead->message, 80) }}</td>
                <td>{{ $lead->created_at->format('d M Y H:i') }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.contact-leads.destroy', $lead) }}" style="display:inline;" onsubmit="return confirm('Delete this lead?');">
                        @csrf @method('DELETE')
                        <button type="submit" style="cursor:pointer;border:none;background:none;color:red;">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" style="text-align:center;padding:2rem;">No leads yet.</td></tr>
            @endforelse
        </tbody>
    </table>
    {{ $leads->links() }}
</div>
@endsection
