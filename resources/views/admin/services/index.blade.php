@extends('admin.layouts.app')
@section('title', 'Services')
@section('page_title', 'Services')

@section('content')

<div class="page-header">
    <div>
        <h4>All Services</h4>
        <div class="page-breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a> / Services</div>
    </div>
    <a href="{{ route('admin.services.create') }}" class="btn btn-gold-admin">
        <i class="fas fa-plus me-2"></i> Add New Service
    </a>
</div>

<div class="admin-table">
    <div style="padding:14px 18px; border-bottom:1px solid #f0f3f8; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:10px;">
        <span style="font-size:13px; color:#8a99b0;">{{ $services->total() }} services found</span>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th style="text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>
                        @if($service->main_image)
                            <img src="{{ asset('storage/'.$service->main_image) }}" alt="{{ $service->title }}"
                                 style="width:50px; height:50px; object-fit:cover; border-radius:8px; border:1px solid #e2e8f0;">
                        @else
                            <div style="width:50px; height:50px; background:#f0f3f8; border-radius:8px; display:flex; align-items:center; justify-content:center;">
                                <i class="{{ $service->icon ?? 'fas fa-file-alt' }}" style="color:#c9a84c; font-size:18px;"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div style="font-weight:600; font-size:13.5px;">{{ $service->title }}</div>
                        @if($service->short_description)
                            <div style="font-size:12px; color:#8a99b0; margin-top:2px;">{{ Str::limit($service->short_description, 60) }}</div>
                        @endif
                    </td>
                    <td><code style="font-size:12px; color:#6366f1;">{{ $service->slug }}</code></td>
                    <td>{{ $service->sort_order }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.services.toggle', $service) }}" style="display:inline;">
                            @csrf @method('PATCH')
                            <button type="submit" class="status-badge badge-{{ $service->is_active ? 'active' : 'inactive' }}"
                                    style="border:none; cursor:pointer; background:none;">
                                {{ $service->is_active ? 'Active' : 'Inactive' }}
                            </button>
                        </form>
                    </td>
                    <td style="font-size:12px; color:#8a99b0;">{{ $service->created_at->format('d M Y') }}</td>
                    <td style="text-align:center;">
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('services.show', $service->slug) }}" target="_blank"
                               class="btn btn-sm" style="border:1px solid #e2e8f0; color:#555; border-radius:7px; padding:5px 10px; font-size:12px;"
                               title="View on site">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.services.edit', $service) }}"
                               class="btn btn-sm btn-primary-admin" style="padding:5px 10px; font-size:12px;" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.services.destroy', $service) }}"
                                  onsubmit="return confirm('Delete this service? This cannot be undone.')">
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
                    <td colspan="8" class="text-center py-5 text-muted">
                        <i class="fas fa-concierge-bell fa-2x mb-2 opacity-25 d-block"></i>
                        No services yet. <a href="{{ route('admin.services.create') }}" style="color:var(--gold);">Add your first service</a>.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($services->hasPages())
        <div style="padding:16px 18px; border-top:1px solid #f0f3f8;">
            {{ $services->links() }}
        </div>
    @endif
</div>

@endsection
