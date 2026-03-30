@extends('admin.layouts.app')
@section('title', 'Add Page')
@section('page_title', 'Add Content Page')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.css" rel="stylesheet">
<style>
.note-editor{border-radius:8px!important;overflow:hidden;border:1.5px solid #e2e8f0!important;}
.note-editor:focus-within{border-color:var(--gold)!important;}
.note-toolbar{background:#f8fafc!important;border-bottom:1px solid #e2e8f0!important;}
</style>
@endpush

@section('content')
<div class="page-header">
    <div>
        <h4>Add Content Page</h4>
        <div class="page-breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a> / <a href="{{ route('admin.pages.index') }}">Pages</a> / Add</div>
    </div>
    <a href="{{ route('admin.pages.index') }}" class="btn btn-sm" style="border:1.5px solid #e2e8f0;font-size:13px;font-weight:600;color:#555;border-radius:8px;padding:8px 18px;">
        <i class="fas fa-arrow-left me-1"></i> Back
    </a>
</div>

@if($errors->any())
<div class="alert border-0 rounded-3 mb-4" style="background:rgba(239,68,68,0.08);color:#dc2626;font-size:13.5px;">
    <i class="fas fa-exclamation-circle me-2"></i>
    <ul class="mb-0 mt-1">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
</div>
@endif

<form method="POST" action="{{ route('admin.pages.store') }}" enctype="multipart/form-data">
@csrf
<div class="row g-4">
    <div class="col-lg-8">
        <div class="form-card mb-4">
            <h6 class="fw-bold mb-4" style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                <i class="fas fa-file-alt me-2" style="color:var(--gold);"></i> Page Content
            </h6>
            <div class="mb-3">
                <label class="form-label">Page Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title', request('title')) }}" id="pageTitle" placeholder="e.g. About Us" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">URL Slug <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text" style="font-size:13px;color:#8a99b0;background:#f8fafc;">/</span>
                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                           value="{{ old('slug', request('slug')) }}" id="pageSlug" placeholder="e.g. about-us" required>
                </div>
                @error('slug')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                <div style="font-size:11.5px;color:#8a99b0;margin-top:4px;">Lowercase letters, numbers and hyphens only. E.g. about-us, privacy-policy, terms-conditions</div>
            </div>
            <div class="mb-4">
                <label class="form-label">Subtitle / Tagline</label>
                <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}" placeholder="Short description shown under the title">
            </div>
            <div>
                <label class="form-label">Page Content</label>
                <textarea name="content" id="pageContent" class="form-control">{{ old('content') }}</textarea>
                <div style="font-size:11.5px;color:#8a99b0;margin-top:5px;">If left empty, the page will show "No content available" message.</div>
            </div>
        </div>

        <!-- SEO -->
        <div class="form-card">
            <h6 class="fw-bold mb-4" style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                <i class="fas fa-search me-2" style="color:var(--gold);"></i> SEO Settings
            </h6>
            <div class="mb-3">
                <label class="form-label">Meta Title</label>
                <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}" placeholder="Leave blank to use page title">
            </div>
            <div class="mb-3">
                <label class="form-label">Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="2" placeholder="SEO description (150-160 chars)">{{ old('meta_description') }}</textarea>
            </div>
            <div>
                <label class="form-label">Meta Keywords</label>
                <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords') }}" placeholder="keyword1, keyword2, keyword3">
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-card mb-4">
            <h6 class="fw-bold mb-4" style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                <i class="fas fa-cog me-2" style="color:var(--gold);"></i> Settings
            </h6>
            <div class="mb-4 d-flex align-items-center justify-content-between p-3 rounded-2" style="background:#f8fafc;border:1.5px solid #e2e8f0;">
                <div>
                    <div style="font-size:13.5px;font-weight:600;color:var(--primary);">Active / Published</div>
                    <div style="font-size:12px;color:#8a99b0;">Visible on website</div>
                </div>
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" type="checkbox" name="is_active" {{ old('is_active', '1') ? 'checked' : '' }} style="width:42px;height:22px;cursor:pointer;">
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label">Banner Image</label>
                <input type="file" name="banner_image" class="form-control" accept="image/*" onchange="previewImg(this,'bannerPreview')">
                <img id="bannerPreview" src="" alt="" style="display:none;margin-top:10px;width:100%;border-radius:8px;max-height:140px;object-fit:cover;">
            </div>
            <div class="section-divider"></div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-gold-admin"><i class="fas fa-save me-2"></i> Save Page</button>
                <a href="{{ route('admin.pages.index') }}" class="btn text-center" style="border:1.5px solid #e2e8f0;font-size:13.5px;border-radius:8px;padding:10px;font-weight:600;color:#555;">Cancel</a>
            </div>
        </div>

        <!-- Common Slugs -->
        <div class="form-card" style="background:#f8fafc;">
            <h6 class="fw-bold mb-3" style="color:var(--primary);font-size:13px;">Quick Slug Presets</h6>
            @foreach(['about-us' => 'About Us', 'privacy-policy' => 'Privacy Policy', 'terms-conditions' => 'Terms & Conditions'] as $s => $t)
            <button type="button" onclick="setSlug('{{ $s }}','{{ $t }}')"
                    style="display:block;width:100%;text-align:left;background:none;border:1px solid #e2e8f0;border-radius:7px;padding:8px 12px;font-size:12.5px;font-weight:600;color:var(--primary);margin-bottom:6px;cursor:pointer;transition:all 0.2s;"
                    onmouseover="this.style.borderColor='var(--gold)'" onmouseout="this.style.borderColor='#e2e8f0'">
                <code style="font-size:11px;color:#8a99b0;">{{ $s }}</code> — {{ $t }}
            </button>
            @endforeach
        </div>
    </div>
</div>
</form>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.js"></script>
<script>
$(document).ready(function(){
    $('#pageContent').summernote({
        placeholder: 'Write your page content here...',
        height: 400,
        toolbar:[
            ['style',['style']],
            ['font',['bold','italic','underline','clear']],
            ['color',['color']],
            ['para',['ul','ol','paragraph']],
            ['table',['table']],
            ['insert',['link','hr']],
            ['view',['codeview']]
        ]
    });
    // Auto-slug from title
    $('#pageTitle').on('input', function(){
        var slug = $(this).val().toLowerCase().replace(/[^a-z0-9\s-]/g,'').replace(/\s+/g,'-').replace(/-+/g,'-').replace(/^-|-$/g,'');
        $('#pageSlug').val(slug);
    });
});
function setSlug(slug, title) {
    document.getElementById('pageSlug').value = slug;
    if (!document.getElementById('pageTitle').value) {
        document.getElementById('pageTitle').value = title;
    }
}
function previewImg(input, id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var img = document.getElementById(id);
            img.src = e.target.result;
            img.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
