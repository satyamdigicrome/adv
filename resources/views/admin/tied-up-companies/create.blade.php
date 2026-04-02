@extends('admin.layouts.app')
@section('title', 'Add New Company')
@section('page_title', 'Add New Company')

@section('content')

    <div class="page-header">
        <div>
            <h4>Add New Company</h4>
            <div class="page-breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a> /
                <a href="{{ route('admin.tied-up-companies.index') }}">Tied Up Companies</a> / Add New
            </div>
        </div>
        <a href="{{ route('admin.tied-up-companies.index') }}" class="btn btn-sm"
            style="border:1.5px solid #e2e8f0; font-size:13px; font-weight:600; color:#555; border-radius:8px; padding:8px 18px;">
            <i class="fas fa-arrow-left me-1"></i> Back
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert border-0 rounded-3 mb-4" style="background:rgba(239,68,68,0.08);color:#dc2626;font-size:13.5px;">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.tied-up-companies.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="form-card mb-4">
                    <h6 class="fw-bold mb-4"
                        style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                        Company Details</h6>

                    <div class="mb-3">
                        <label class="form-label">Company Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Company Logo/Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <small class="form-text text-muted">
                            Recommended size: 200x100px (2:1 aspect ratio). Max file size: 2MB. Supported formats: JPG, PNG,
                            WebP.
                        </small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}"
                            min="0">
                        <small class="form-text text-muted">Lower numbers appear first in the carousel.</small>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                                {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active (Show on homepage)
                            </label>
                        </div>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-gold-admin">
                        <i class="fas fa-save me-2"></i> Create Company
                    </button>
                </div>
            </div>
        </div>
    </form>

@endsection
