@extends('admin.layouts.app')
@section('title', 'Edit Service — ' . $service->title)
@section('page_title', 'Edit Service')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.css" rel="stylesheet">
<style>
.note-editor { border-radius: 8px !important; overflow: hidden; border: 1.5px solid #e2e8f0 !important; }
.note-editor:focus-within { border-color: var(--gold) !important; box-shadow: 0 0 0 3px rgba(201,168,76,0.12) !important; }
.note-toolbar { background: #f8fafc !important; border-bottom: 1px solid #e2e8f0 !important; }
.img-preview-box { width: 100%; max-height: 120px; object-fit: cover; border-radius: 8px; border: 1px solid #e2e8f0; display: block; margin-bottom: 10px; }
.img-new-preview { max-width: 180px; max-height: 120px; border-radius: 8px; border: 2px dashed var(--gold); object-fit: cover; display: block; margin-top: 10px; }
</style>
@endpush

@section('content')

<div class="page-header">
    <div>
        <h4>Edit: {{ $service->title }}</h4>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a> /
            <a href="{{ route('admin.services.index') }}">Services</a> / Edit
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('services.show', $service->slug) }}" target="_blank" class="btn btn-sm"
           style="border:1.5px solid #e2e8f0; font-size:13px; font-weight:600; color:#555; border-radius:8px; padding:8px 16px;">
            <i class="fas fa-eye me-1"></i> View on Site
        </a>
        <a href="{{ route('admin.services.index') }}" class="btn btn-sm"
           style="border:1.5px solid #e2e8f0; font-size:13px; font-weight:600; color:#555; border-radius:8px; padding:8px 16px;">
            <i class="fas fa-arrow-left me-1"></i> Back
        </a>
    </div>
</div>

@if($errors->any())
    <div class="alert border-0 rounded-3 mb-4" style="background:rgba(239,68,68,0.08); color:#dc2626; font-size:13.5px;">
        <i class="fas fa-exclamation-circle me-2"></i>
        <ul class="mb-0 mt-1">
            @foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data">
    @csrf @method('PUT')

    <div class="row g-4">
        <!-- Left Column -->
        <div class="col-lg-8">
            <div class="form-card mb-4">
                <h6 class="fw-bold mb-4" style="color:var(--primary); font-size:15px; border-bottom:1px solid #f0f3f8; padding-bottom:12px;">
                    <i class="fas fa-info-circle me-2" style="color:var(--gold);"></i> Basic Information
                </h6>
                <div class="mb-3">
                    <label class="form-label">Service Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title', $service->title) }}" required>
                    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <div class="input-group">
                        <span class="input-group-text" style="font-size:12.5px; color:#8a99b0; border-radius:8px 0 0 8px; border:1.5px solid #e2e8f0; border-right:none;">/services/</span>
                        <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                               value="{{ old('slug', $service->slug) }}" style="border-radius:0 8px 8px 0;">
                    </div>
                    @error('slug')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Short Description</label>
                    <textarea name="short_description" class="form-control" rows="2" maxlength="500">{{ old('short_description', $service->short_description) }}</textarea>
                </div>
                <div class="mb-1">
                    <label class="form-label">Long Description</label>
                    <textarea name="long_description" id="long_description" class="form-control">{{ old('long_description', $service->long_description) }}</textarea>
                </div>
            </div>

            <div class="form-card">
                <h6 class="fw-bold mb-4" style="color:var(--primary); font-size:15px; border-bottom:1px solid #f0f3f8; padding-bottom:12px;">
                    <i class="fas fa-search me-2" style="color:var(--gold);"></i> SEO Settings
                </h6>
                <div class="mb-3">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $service->meta_title) }}" maxlength="255">
                </div>
                <div class="mb-3">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="2" maxlength="500">{{ old('meta_description', $service->meta_description) }}</textarea>
                </div>
                <div class="mb-1">
                    <label class="form-label">Meta Keywords</label>
                    <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords', $service->meta_keywords) }}">
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-lg-4">
            <div class="form-card mb-4">
                <h6 class="fw-bold mb-4" style="color:var(--primary); font-size:15px; border-bottom:1px solid #f0f3f8; padding-bottom:12px;">
                    <i class="fas fa-cog me-2" style="color:var(--gold);"></i> Settings
                </h6>
                <div class="mb-3 d-flex align-items-center justify-content-between p-3 rounded-2" style="background:#f8fafc; border:1.5px solid #e2e8f0;">
                    <div>
                        <div style="font-size:13.5px; font-weight:600; color:var(--primary);">Active / Visible</div>
                        <div style="font-size:12px; color:#8a99b0;">Show on website</div>
                    </div>
                    <div class="form-check form-switch mb-0">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                               {{ old('is_active', $service->is_active) ? 'checked' : '' }}
                               style="width:42px; height:22px; cursor:pointer;">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $service->sort_order) }}" min="0">
                </div>
                <div class="mb-1">
                    <label class="form-label">Icon Class</label>
                    <input type="text" name="icon" class="form-control" value="{{ old('icon', $service->icon) }}" placeholder="fas fa-file-alt">
                </div>
                <div class="section-divider"></div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-gold-admin">
                        <i class="fas fa-save me-2"></i> Update Service
                    </button>
                    <button type="button"
                            onclick="adminDelete('{{ route('admin.services.destroy', $service) }}', 'Delete this service permanently? This cannot be undone.')"
                            class="btn w-100"
                            style="background:rgba(239,68,68,0.08); color:#dc2626; border:1.5px solid rgba(239,68,68,0.2); font-size:13.5px; border-radius:8px; padding:10px; font-weight:600;">
                        <i class="fas fa-trash me-2"></i> Delete Service
                    </button>
                </div>
            </div>

            <!-- Banner Image -->
            <div class="form-card mb-4">
                <h6 class="fw-bold mb-3" style="color:var(--primary); font-size:15px; border-bottom:1px solid #f0f3f8; padding-bottom:12px;">
                    <i class="fas fa-image me-2" style="color:var(--gold);"></i> Banner Image
                </h6>
                @if($service->banner_image)
                    <div style="font-size:12px; color:#8a99b0; margin-bottom:6px;">Current banner:</div>
                    <img src="{{ asset('storage/'.$service->banner_image) }}" alt="Banner" class="img-preview-box">
                @endif
                <label class="form-label">{{ $service->banner_image ? 'Replace Banner' : 'Upload Banner' }}</label>
                <input type="file" name="banner_image" class="form-control" accept="image/*" id="bannerInput">
                <img id="bannerPreview" class="img-new-preview d-none">
            </div>

            <!-- Main Image -->
            <div class="form-card">
                <h6 class="fw-bold mb-3" style="color:var(--primary); font-size:15px; border-bottom:1px solid #f0f3f8; padding-bottom:12px;">
                    <i class="fas fa-photo-video me-2" style="color:var(--gold);"></i> Main Image
                </h6>
                @if($service->main_image)
                    <div style="font-size:12px; color:#8a99b0; margin-bottom:6px;">Current image:</div>
                    <img src="{{ asset('storage/'.$service->main_image) }}" alt="Main" class="img-preview-box">
                @endif
                <label class="form-label">{{ $service->main_image ? 'Replace Image' : 'Upload Image' }}</label>
                <input type="file" name="main_image" class="form-control" accept="image/*" id="mainInput">
                <img id="mainPreview" class="img-new-preview d-none">
            </div>
        </div>
    </div>
</form>

@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.js"></script>
<script>
$(document).ready(function () {
    $('#long_description').summernote({
        placeholder: 'Write the full service description here...',
        tabsize: 2,
        height: 360,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ['fullscreen', 'codeview', 'help']],
        ]
    });

    function setupPreview(inputId, previewId) {
        document.getElementById(inputId).addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = e => {
                    const p = document.getElementById(previewId);
                    p.src = e.target.result;
                    p.classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            }
        });
    }
    setupPreview('bannerInput', 'bannerPreview');
    setupPreview('mainInput', 'mainPreview');
});
</script>
@endpush
