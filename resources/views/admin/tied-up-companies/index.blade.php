@extends('admin.layouts.app')
@section('title', 'Tied Up Companies')
@section('page_title', 'Tied Up Companies')

@section('content')

    <div class="page-header">
        <div>
            <h4>All Companies</h4>
            <div class="page-breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a> / Tied Up Companies</div>
        </div>
        <a href="{{ route('admin.tied-up-companies.create') }}" class="btn btn-gold-admin">
            <i class="fas fa-plus me-2"></i> Add New Company
        </a>
    </div>

    <div class="admin-table">
        <div
            style="padding:14px 18px; border-bottom:1px solid #f0f3f8; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:10px;">
            <span style="font-size:13px; color:#8a99b0;">{{ $companies->total() }} companies found</span>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th style="text-align:center;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($companies as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td>
                                @if ($company->image)
                                    <img src="{{ $company->image_url }}" alt="{{ $company->name }}"
                                        style="width:50px; height:50px; object-fit:cover; border-radius:8px; border:1px solid #e2e8f0;">
                                @else
                                    <div
                                        style="width:50px; height:50px; background:#f0f3f8; border-radius:8px; display:flex; align-items:center; justify-content:center;">
                                        <i class="fas fa-building" style="color:#c9a84c; font-size:18px;"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div style="font-weight:600; font-size:13.5px;">{{ $company->name }}</div>
                            </td>
                            <td>{{ $company->sort_order }}</td>
                            <td>
                                @if ($company->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $company->created_at->format('d M Y') }}</td>
                            <td style="text-align:center;">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.tied-up-companies.edit', $company) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.tied-up-companies.destroy', $company) }}"
                                        style="display:inline;"
                                        onsubmit="return confirm('Are you sure you want to delete this company?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align:center; padding:40px;">
                                <div style="color:#8a99b0;">
                                    <i class="fas fa-building fa-3x mb-3" style="color:#e2e8f0;"></i>
                                    <div>No companies found</div>
                                    <a href="{{ route('admin.tied-up-companies.create') }}"
                                        class="btn btn-sm btn-gold-admin mt-3">
                                        <i class="fas fa-plus me-2"></i> Add First Company
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($companies->hasPages())
            <div style="padding:18px; border-top:1px solid #f0f3f8;">
                {{ $companies->links() }}
            </div>
        @endif
    </div>

@endsection
