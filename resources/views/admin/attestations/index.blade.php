@extends('admin.layouts.app')
@section('title', 'Attestation Pages')
@section('page_title', 'Attestation Pages')

@section('content')
<div class="page-header">
    <div>
        <h4>Attestation Pages</h4>
        <div class="page-breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a> / Attestations</div>
    </div>
    <a href="{{ route('admin.attestations.create') }}" class="btn btn-gold-admin">
        <i class="fas fa-plus me-2"></i> Add New Attestation
    </a>
</div>

<div class="admin-table">
    <div style="padding:14px 18px; border-bottom:1px solid #f0f3f8;">
        <span style="font-size:13px; color:#8a99b0;">{{ $attestations->total() }} attestation pages found</span>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Country</th>
                    <th>Slug</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th style="text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($attestations as $att)
                <tr>
                    <td>{{ $att->id }}</td>
                    <td>
                        @if($att->main_image)
                            <img src="{{ asset('storage/'.$att->main_image) }}" alt="{{ $att->title }}"
                                 style="width:50px;height:50px;object-fit:cover;border-radius:8px;border:1px solid #e2e8f0;">
                        @else
                            <div style="width:50px;height:50px;background:#f0f3f8;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                                <i class="{{ $att->icon ?? 'fas fa-certificate' }}" style="color:#c9a84c;font-size:18px;"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div style="font-weight:600;font-size:13.5px;">{{ $att->title }}</div>
                        @if($att->short_description)
                            <div style="font-size:12px;color:#8a99b0;margin-top:2px;">{{ Str::limit($att->short_description,55) }}</div>
                        @endif
                    </td>
                    <td>
                        @if($att->country)
                            <span style="font-size:12px;background:rgba(201,168,76,0.1);color:#a8893a;padding:3px 10px;border-radius:50px;font-weight:600;">{{ $att->country }}</span>
                        @else <span style="color:#ccc;">—</span> @endif
                    </td>
                    <td><code style="font-size:12px;color:#6366f1;">/attestation-services/{{ $att->slug }}</code></td>
                    <td>{{ $att->sort_order }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.attestations.toggle', $att) }}" style="display:inline;">
                            @csrf @method('PATCH')
                            <button type="submit" class="status-badge badge-{{ $att->is_active ? 'active' : 'inactive' }}" style="border:none;cursor:pointer;background:none;">
                                {{ $att->is_active ? 'Active' : 'Inactive' }}
                            </button>
                        </form>
                    </td>
                    <td style="font-size:12px;color:#8a99b0;">{{ $att->created_at->format('d M Y') }}</td>
                    <td style="text-align:center;">
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('attestations.show', $att->slug) }}" target="_blank"
                               class="btn btn-sm" style="border:1px solid #e2e8f0;color:#555;border-radius:7px;padding:5px 10px;font-size:12px;" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.attestations.edit', $att) }}"
                               class="btn btn-sm btn-primary-admin" style="padding:5px 10px;font-size:12px;" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.attestations.destroy', $att) }}"
                                  onsubmit="return confirm('Delete this attestation page?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm" title="Delete"
                                        style="background:rgba(239,68,68,0.1);color:#dc2626;border:none;border-radius:7px;padding:5px 10px;font-size:12px;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center py-5 text-muted">
                        <i class="fas fa-certificate fa-2x mb-2 opacity-25 d-block"></i>
                        No attestation pages yet. <a href="{{ route('admin.attestations.create') }}" style="color:var(--gold);">Add your first one</a>.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($attestations->hasPages())
        <div style="padding:16px 18px;border-top:1px solid #f0f3f8;">{{ $attestations->links() }}</div>
    @endif
</div>
@endsection
