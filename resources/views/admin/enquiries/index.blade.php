@extends('admin.layouts.app')
@section('title', 'Enquiries')
@section('page_title', 'Enquiries')

@section('content')

<div class="page-header">
    <div>
        <h4>All Enquiries</h4>
        <div class="page-breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a> / Enquiries</div>
    </div>
    @if($newCount > 0)
        <span class="status-badge badge-new" style="font-size:13px; padding:7px 16px;">{{ $newCount }} New</span>
    @endif
</div>

<!-- Filters -->
<form method="GET" action="{{ route('admin.enquiries.index') }}" class="form-card mb-4">
    <div class="row g-3 align-items-end">
        <div class="col-md-5">
            <label class="form-label">Search</label>
            <input type="text" name="search" class="form-control" placeholder="Search by name, email, phone..."
                   value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="">All Status</option>
                <option value="new" {{ request('status')=='new' ? 'selected' : '' }}>New</option>
                <option value="read" {{ request('status')=='read' ? 'selected' : '' }}>Read</option>
                <option value="replied" {{ request('status')=='replied' ? 'selected' : '' }}>Replied</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary-admin w-100"><i class="fas fa-search me-1"></i> Filter</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('admin.enquiries.index') }}" class="btn w-100" style="border:1.5px solid #e2e8f0; font-size:13.5px; border-radius:8px; padding:10px; font-weight:600; color:#555;">Reset</a>
        </div>
    </div>
</form>

<div class="admin-table">
    <div style="padding:14px 18px; border-bottom:1px solid #f0f3f8;">
        <span style="font-size:13px; color:#8a99b0;">{{ $enquiries->total() }} enquiries found</span>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Service / Page</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th style="text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($enquiries as $enq)
                <tr style="{{ $enq->status === 'new' ? 'background: rgba(201,168,76,0.04);' : '' }}">
                    <td>
                        {{ $enq->id }}
                        @if($enq->status === 'new')
                            <span style="display:inline-block; width:7px; height:7px; background:#dc2626; border-radius:50%; margin-left:4px; vertical-align:middle;"></span>
                        @endif
                    </td>
                    <td style="font-weight:600;">{{ $enq->name }}</td>
                    <td><a href="mailto:{{ $enq->email }}" style="color:var(--primary);">{{ $enq->email }}</a></td>
                    <td><a href="tel:{{ $enq->phone }}" style="color:var(--primary);">{{ $enq->phone }}</a></td>
                    <td>
                        @if($enq->service)
                            <a href="{{ route('services.show', $enq->service->slug) }}" target="_blank" style="color:var(--gold); font-size:13px; font-weight:500;">
                                {{ $enq->page_name }}
                            </a>
                        @else
                            <span style="font-size:13px; color:#8a99b0;">{{ $enq->page_name ?? 'General' }}</span>
                        @endif
                    </td>
                    <td style="font-size:13px; max-width:150px;">{{ Str::limit($enq->address, 40) }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.enquiries.status', $enq) }}" style="display:inline;">
                            @csrf @method('PATCH')
                            <select name="status" class="form-select form-select-sm status-badge badge-{{ $enq->status }}"
                                    onchange="this.form.submit()"
                                    style="border:none; padding:4px 8px; font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.5px; border-radius:50px; min-width:90px; cursor:pointer;">
                                <option value="new"     {{ $enq->status==='new'     ? 'selected' : '' }}>New</option>
                                <option value="read"    {{ $enq->status==='read'    ? 'selected' : '' }}>Read</option>
                                <option value="replied" {{ $enq->status==='replied' ? 'selected' : '' }}>Replied</option>
                            </select>
                        </form>
                    </td>
                    <td style="font-size:12px; color:#8a99b0; white-space:nowrap;">{{ $enq->created_at->format('d M Y, H:i') }}</td>
                    <td style="text-align:center;">
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('admin.enquiries.show', $enq) }}" class="btn btn-sm btn-primary-admin" style="padding:5px 10px; font-size:12px;" title="View Details">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.enquiries.destroy', $enq) }}"
                                  onsubmit="return confirm('Delete this enquiry?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm" title="Delete"
                                        style="background:rgba(239,68,68,0.1); color:#dc2626; border:none; border-radius:7px; padding:5px 10px; font-size:12px;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center py-5 text-muted">
                        <i class="fas fa-inbox fa-2x mb-2 opacity-25 d-block"></i>
                        No enquiries found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($enquiries->hasPages())
        <div style="padding:16px 18px; border-top:1px solid #f0f3f8;">{{ $enquiries->links() }}</div>
    @endif
</div>

@endsection
