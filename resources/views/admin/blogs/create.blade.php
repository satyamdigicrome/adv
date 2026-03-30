@extends('admin.layouts.app')
@section('title', 'New Blog Post')
@section('page_title', 'New Blog Post')

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
        <h4>New Blog Post</h4>
        <div class="page-breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a> / <a href="{{ route('admin.blogs.index') }}">Blogs</a> / New</div>
    </div>
    <a href="{{ route('admin.blogs.index') }}" class="btn btn-sm" style="border:1.5px solid #e2e8f0;font-size:13px;font-weight:600;color:#555;border-radius:8px;padding:8px 18px;">
        <i class="fas fa-arrow-left me-1"></i> Back
    </a>
</div>

@if($errors->any())
<div class="alert border-0 rounded-3 mb-4" style="background:rgba(239,68,68,0.08);color:#dc2626;font-size:13.5px;">
    <ul class="mb-0 mt-1">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
</div>
@endif

<form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data">
@csrf
<div class="row g-4">
    <div class="col-lg-8">
        <!-- Main Content -->
        <div class="form-card mb-4">
            <h6 class="fw-bold mb-4" style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                <i class="fas fa-newspaper me-2" style="color:var(--gold);"></i> Post Content
            </h6>
            <div class="mb-3">
                <label class="form-label">Post Title <span class="text-danger">*</span></label>
                <input type="text" name="title" id="blogTitle" class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title') }}" placeholder="Enter blog post title" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">URL Slug</label>
                <div class="input-group">
                    <span class="input-group-text" style="font-size:13px;color:#8a99b0;background:#f8fafc;">/blog/</span>
                    <input type="text" name="slug" id="blogSlug" class="form-control @error('slug') is-invalid @enderror"
                           value="{{ old('slug') }}" placeholder="auto-generated-from-title">
                </div>
                @error('slug')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
            </div>
            <div class="mb-4">
                <label class="form-label">Short Description / Excerpt <span class="text-danger">*</span></label>
                <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror"
                          rows="3" placeholder="Brief summary shown on blog listing page (max 500 chars)" maxlength="500" required>{{ old('short_description') }}</textarea>
                @error('short_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="form-label">Full Content <span class="text-danger">*</span></label>
                <textarea name="long_description" id="blogContent" class="form-control">{{ old('long_description') }}</textarea>
            </div>
        </div>

        <!-- SEO -->
        <div class="form-card">
            <h6 class="fw-bold mb-4" style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                <i class="fas fa-search me-2" style="color:var(--gold);"></i> SEO
            </h6>
            <div class="mb-3">
                <label class="form-label">Meta Title</label>
                <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}" placeholder="Leave blank to use post title">
            </div>
            <div class="mb-3">
                <label class="form-label">Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="2" placeholder="SEO description">{{ old('meta_description') }}</textarea>
            </div>
            <div>
                <label class="form-label">Meta Keywords</label>
                <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords') }}" placeholder="keyword1, keyword2">
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Publish Settings -->
        <div class="form-card mb-4">
            <h6 class="fw-bold mb-4" style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                <i class="fas fa-cog me-2" style="color:var(--gold);"></i> Publish Settings
            </h6>
            <div class="mb-3 d-flex align-items-center justify-content-between p-3 rounded-2" style="background:#f8fafc;border:1.5px solid #e2e8f0;">
                <div>
                    <div style="font-size:13.5px;font-weight:600;color:var(--primary);">Published</div>
                    <div style="font-size:12px;color:#8a99b0;">Visible on blog</div>
                </div>
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" type="checkbox" name="is_active" {{ old('is_active','1') ? 'checked' : '' }} style="width:42px;height:22px;cursor:pointer;">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Published Date</label>
                <input type="datetime-local" name="published_at" class="form-control" value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" value="{{ old('category', 'Attestation Tips') }}"
                       list="categoryList" placeholder="e.g. Attestation Tips">
                <datalist id="categoryList">
                    @foreach(['Attestation Tips','Country Guides','Document Guide','Embassy News','Apostille','Translation','Company News'] as $cat)
                    <option value="{{ $cat }}">
                    @endforeach
                </datalist>
            </div>
            <div class="mb-4">
                <label class="form-label">Author</label>
                <input type="text" name="author" class="form-control" value="{{ old('author', auth()->user()->name ?? 'Admin') }}" placeholder="Author name">
            </div>
            <div class="mb-4">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" min="0">
            </div>
            <div class="section-divider"></div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-gold-admin"><i class="fas fa-save me-2"></i> Publish Post</button>
                <a href="{{ route('admin.blogs.index') }}" class="btn text-center" style="border:1.5px solid #e2e8f0;font-size:13.5px;border-radius:8px;padding:10px;font-weight:600;color:#555;">Cancel</a>
            </div>
        </div>

        <!-- Featured Image -->
        <div class="form-card">
            <h6 class="fw-bold mb-3" style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                <i class="fas fa-image me-2" style="color:var(--gold);"></i> Featured Image
            </h6>
            <div id="imgPreviewWrap" style="margin-bottom:12px;border-radius:10px;overflow:hidden;aspect-ratio:16/9;background:#f8fafc;border:2px dashed #e2e8f0;display:flex;align-items:center;justify-content:center;cursor:pointer;" onclick="document.getElementById('imgInput').click()">
                <img id="imgPreview" src="" alt="" style="display:none;width:100%;height:100%;object-fit:cover;">
                <div id="imgPlaceholder" style="text-align:center;color:#bbb;">
                    <i class="fas fa-cloud-upload-alt fa-2x mb-2 d-block"></i>
                    <span style="font-size:12px;">Click to upload image<br>(16:9 recommended)</span>
                </div>
            </div>
            <input type="file" name="image" id="imgInput" accept="image/*" style="display:none;" onchange="previewBlogImg(this)">
            <button type="button" onclick="document.getElementById('imgInput').click()" class="btn w-100" style="border:1.5px solid #e2e8f0;border-radius:8px;padding:9px;font-size:13px;font-weight:600;color:#555;">
                <i class="fas fa-upload me-2"></i> Choose Image
            </button>
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
    $('#blogContent').summernote({
        placeholder: 'Write your full blog content here...',
        height: 450,
        toolbar:[
            ['style',['style']],
            ['font',['bold','italic','underline','strikethrough','clear']],
            ['color',['color']],
            ['para',['ul','ol','paragraph']],
            ['table',['table']],
            ['insert',['link','picture','hr']],
            ['view',['codeview','fullscreen']]
        ]
    });
    $('#blogTitle').on('input', function(){
        var slug = $(this).val().toLowerCase().replace(/[^a-z0-9\s-]/g,'').replace(/\s+/g,'-').replace(/-+/g,'-').replace(/^-|-$/g,'');
        $('#blogSlug').val(slug);
    });
});
function previewBlogImg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imgPreview').src = e.target.result;
            document.getElementById('imgPreview').style.display = 'block';
            document.getElementById('imgPlaceholder').style.display = 'none';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
