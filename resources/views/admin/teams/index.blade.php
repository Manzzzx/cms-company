@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Team Members</h1>
    @if (session('success'))
        <div style="color: green; margin-bottom: 1rem;">{{ session('success') }}</div>
    @endif
    <a href="{{ route('admin.teams.create') }}" style="display: inline-block; margin-bottom: 1rem;">+ Add Member</a>
    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr><th>ID</th><th>Name</th><th>Position</th><th>Status</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @forelse($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->position ?? '—' }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.teams.toggleStatus', $member) }}" style="display:inline;">
                        @csrf @method('PATCH')
                        <button type="submit" style="cursor:pointer;border:none;background:none;color:{{ $member->status ? 'green' : 'gray' }};">
                            {{ $member->status ? '● Published' : '○ Draft' }}
                        </button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('admin.teams.edit', $member) }}">Edit</a> |
                    <form method="POST" action="{{ route('admin.teams.destroy', $member) }}" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                        @csrf @method('DELETE')
                        <button type="submit" style="cursor:pointer;border:none;background:none;color:red;">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;padding:2rem;">No team members found.</td></tr>
            @endforelse
        </tbody>
    </table>
    {{ $members->links() }}
</div>
@endsection
