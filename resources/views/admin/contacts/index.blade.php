@extends('admin.layouts.app')
@section('title', 'Contact Messages')
@section('page_title', 'Contact Messages')

@section('content')
<div class="page-header">
    <div>
        <h4>Contact Messages</h4>
        <div class="page-breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a> / Contact Messages</div>
    </div>
    @if($newCount > 0)
    <span class="status-badge badge-new" style="font-size:13px;padding:8px 18px;">{{ $newCount }} New Message{{ $newCount > 1 ? 's' : '' }}</span>
    @endif
</div>

<!-- Filter Bar -->
<div class="form-card mb-4" style="padding:16px 20px;">
    <form method="GET" action="{{ route('admin.contacts.index') }}" class="d-flex gap-3 flex-wrap align-items-end">
        <div style="flex:1;min-width:180px;">
            <label class="form-label" style="font-size:12px;">Search</label>
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Name, email, phone...">
        </div>
        <div style="min-width:140px;">
            <label class="form-label" style="font-size:12px;">Status</label>
            <select name="status" class="form-select">
                <option value="">All Status</option>
                <option value="new"     {{ request('status') === 'new'     ? 'selected' : '' }}>New</option>
                <option value="read"    {{ request('status') === 'read'    ? 'selected' : '' }}>Read</option>
                <option value="replied" {{ request('status') === 'replied' ? 'selected' : '' }}>Replied</option>
            </select>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary-admin">Filter</button>
            <a href="{{ route('admin.contacts.index') }}" class="btn" style="border:1.5px solid #e2e8f0;border-radius:8px;padding:10px 18px;font-weight:600;color:#555;font-size:13.5px;">Reset</a>
        </div>
    </form>
</div>

<div class="admin-table">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email / Phone</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $contact)
            <tr style="{{ $contact->status === 'new' ? 'background:rgba(201,168,76,0.04);' : '' }}">
                <td style="font-weight:700;color:var(--primary);">{{ $contact->id }}</td>
                <td>
                    <div style="font-weight:{{ $contact->status === 'new' ? '700' : '500' }};color:var(--primary);">{{ $contact->name }}</div>
                    @if($contact->status === 'new')
                    <span style="font-size:10px;background:rgba(239,68,68,0.1);color:#dc2626;padding:2px 8px;border-radius:50px;font-weight:700;">NEW</span>
                    @endif
                </td>
                <td>
                    <div style="font-size:13px;">{{ $contact->email }}</div>
                    @if($contact->phone)<div style="font-size:12px;color:#8a99b0;">{{ $contact->phone }}</div>@endif
                </td>
                <td style="font-size:13px;max-width:150px;">{{ Str::limit($contact->subject, 40) ?? '—' }}</td>
                <td style="font-size:13px;max-width:200px;color:#637082;">{{ Str::limit($contact->message, 60) ?? '—' }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.contacts.status', $contact) }}">
                        @csrf @method('PATCH')
                        <select name="status" class="form-select form-select-sm" style="font-size:12px;width:100px;" onchange="this.form.submit()">
                            <option value="new"     {{ $contact->status === 'new'     ? 'selected' : '' }}>New</option>
                            <option value="read"    {{ $contact->status === 'read'    ? 'selected' : '' }}>Read</option>
                            <option value="replied" {{ $contact->status === 'replied' ? 'selected' : '' }}>Replied</option>
                        </select>
                    </form>
                </td>
                <td style="font-size:12.5px;color:#8a99b0;white-space:nowrap;">{{ $contact->created_at->format('d M Y') }}<br>{{ $contact->created_at->format('h:i A') }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm" style="background:rgba(15,32,68,0.08);color:var(--primary);border-radius:7px;padding:5px 12px;font-size:12px;font-weight:600;">
                            <i class="fas fa-eye"></i> View
                        </a>
                        <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" onsubmit="return confirm('Delete this message?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm" style="background:rgba(239,68,68,0.08);color:#dc2626;border-radius:7px;padding:5px 10px;font-size:12px;border:none;">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center py-5" style="color:#8a99b0;">
                    <i class="fas fa-inbox fa-2x mb-3 d-block" style="opacity:0.3;"></i>
                    No contact messages found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($contacts->hasPages())
<div class="mt-4">{{ $contacts->links() }}</div>
@endif
@endsection
