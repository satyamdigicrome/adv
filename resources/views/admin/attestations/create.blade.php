@extends('admin.layouts.app')
@section('title', 'Add Attestation Page')
@section('page_title', 'Add Attestation Page')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.css" rel="stylesheet">
<style>
.note-editor{border-radius:8px!important;overflow:hidden;border:1.5px solid #e2e8f0!important;}
.note-editor:focus-within{border-color:var(--gold)!important;box-shadow:0 0 0 3px rgba(201,168,76,0.12)!important;}
.note-toolbar{background:#f8fafc!important;border-bottom:1px solid #e2e8f0!important;}
.img-preview{max-width:180px;max-height:120px;border-radius:8px;border:1px solid #e2e8f0;object-fit:cover;display:block;margin-top:10px;}
</style>
@endpush

@section('content')
<div class="page-header">
    <div>
        <h4>Add Attestation Page</h4>
        <div class="page-breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a> / <a href="{{ route('admin.attestations.index') }}">Attestations</a> / Add New</div>
    </div>
    <a href="{{ route('admin.attestations.index') }}" class="btn btn-sm" style="border:1.5px solid #e2e8f0;font-size:13px;font-weight:600;color:#555;border-radius:8px;padding:8px 18px;">
        <i class="fas fa-arrow-left me-1"></i> Back
    </a>
</div>

@if($errors->any())
<div class="alert border-0 rounded-3 mb-4" style="background:rgba(239,68,68,0.08);color:#dc2626;font-size:13.5px;">
    <i class="fas fa-exclamation-circle me-2"></i>
    <ul class="mb-0 mt-1">@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul>
</div>
@endif

<form method="POST" action="{{ route('admin.attestations.store') }}" enctype="multipart/form-data">
@csrf
<div class="row g-4">
    <div class="col-lg-8">

        <!-- Basic Info -->
        <div class="form-card mb-4">
            <h6 class="fw-bold mb-4" style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                <i class="fas fa-info-circle me-2" style="color:var(--gold);"></i> Basic Information
            </h6>
            <div class="mb-3">
                <label class="form-label">Attestation Title <span class="text-danger">*</span></label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title') }}" placeholder="e.g. Saudi Arabia Embassy Attestation" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="row g-3 mb-3">
                <div class="col-md-8">
                    <label class="form-label">Slug (URL)</label>
                    <div class="input-group">
                        <span class="input-group-text" style="font-size:12px;color:#8a99b0;border:1.5px solid #e2e8f0;border-right:none;border-radius:8px 0 0 8px;">/attestation-services/</span>
                        <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}" placeholder="saudi-arabia-embassy-attestation" style="border-radius:0 8px 8px 0;">
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Country</label>
                    <input type="text" name="country" class="form-control" value="{{ old('country') }}" placeholder="e.g. Saudi Arabia">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Short Description <span class="text-muted" style="font-weight:400;">(max 500 chars)</span></label>
                <textarea name="short_description" class="form-control" rows="2" maxlength="500"
                          placeholder="Brief overview shown on listing page and meta...">{{ old('short_description') }}</textarea>
            </div>
            <div class="mb-1">
                <label class="form-label">Long Description <span class="text-muted" style="font-weight:400;">(full page content with Summernote)</span></label>
                <textarea name="long_description" id="long_description" class="form-control">{{ old('long_description') }}</textarea>
            </div>
        </div>

        <!-- SEO -->
        <div class="form-card">
            <h6 class="fw-bold mb-4" style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                <i class="fas fa-search me-2" style="color:var(--gold);"></i> SEO Settings
            </h6>
            <div class="mb-3">
                <label class="form-label">Meta Title</label>
                <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}" maxlength="255">
            </div>
            <div class="mb-3">
                <label class="form-label">Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="2" maxlength="500">{{ old('meta_description') }}</textarea>
            </div>
            <div>
                <label class="form-label">Meta Keywords</label>
                <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords') }}" placeholder="keyword1, keyword2, keyword3">
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Settings -->
        <div class="form-card mb-4">
            <h6 class="fw-bold mb-4" style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                <i class="fas fa-cog me-2" style="color:var(--gold);"></i> Settings
            </h6>
            <div class="mb-3 d-flex align-items-center justify-content-between p-3 rounded-2" style="background:#f8fafc;border:1.5px solid #e2e8f0;">
                <div>
                    <div style="font-size:13.5px;font-weight:600;color:var(--primary);">Active / Visible</div>
                    <div style="font-size:12px;color:#8a99b0;">Show on website</div>
                </div>
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                           {{ old('is_active','1') ? 'checked' : '' }} style="width:42px;height:22px;cursor:pointer;">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order',0) }}" min="0">
            </div>
            <div class="mb-1">
                <label class="form-label">Icon Class <span class="text-muted" style="font-weight:400;">(Font Awesome)</span></label>
                <input type="text" name="icon" class="form-control" value="{{ old('icon','fas fa-certificate') }}" placeholder="fas fa-certificate">
            </div>
            <div class="section-divider"></div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-gold-admin"><i class="fas fa-save me-2"></i> Save Attestation</button>
                <a href="{{ route('admin.attestations.index') }}" class="btn text-center" style="border:1.5px solid #e2e8f0;font-size:13.5px;border-radius:8px;padding:10px;font-weight:600;color:#555;">Cancel</a>
            </div>
        </div>

        <!-- Banner Image -->
        <div class="form-card mb-4">
            <h6 class="fw-bold mb-3" style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                <i class="fas fa-image me-2" style="color:var(--gold);"></i> Banner Image
            </h6>
            <label class="form-label">Page Banner (Wide) <span class="text-muted" style="font-weight:400;">JPG/PNG max 2MB</span></label>
            <input type="file" name="banner_image" class="form-control" accept="image/*" id="bannerInput">
            <img id="bannerPreview" class="img-preview d-none">
        </div>

        <!-- Main Image -->
        <div class="form-card">
            <h6 class="fw-bold mb-3" style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                <i class="fas fa-photo-video me-2" style="color:var(--gold);"></i> Main Image
            </h6>
            <label class="form-label">Feature Image <span class="text-muted" style="font-weight:400;">JPG/PNG max 2MB</span></label>
            <input type="file" name="main_image" class="form-control" accept="image/*" id="mainInput">
            <img id="mainPreview" class="img-preview d-none">
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
    $('#long_description').summernote({
        placeholder:'Write the full attestation page content here...',tabsize:2,height:380,
        toolbar:[['style',['style']],['font',['bold','italic','underline','clear']],['fontsize',['fontsize']],['color',['color']],['para',['ul','ol','paragraph']],['table',['table']],['insert',['link','picture','hr']],['view',['fullscreen','codeview','help']]]
    });
    $('#title').on('keyup blur',function(){
        if(!$('#slug').data('manually-edited')){
            var slug=$(this).val().toLowerCase().replace(/[^a-z0-9\s-]/g,'').replace(/\s+/g,'-').replace(/-+/g,'-').trim();
            $('#slug').val(slug);
        }
    });
    $('#slug').on('input',function(){$(this).data('manually-edited',true);});
    function setupPreview(inputId,previewId){
        document.getElementById(inputId).addEventListener('change',function(){
            var file=this.files[0];if(file){var reader=new FileReader();reader.onload=function(e){var p=document.getElementById(previewId);p.src=e.target.result;p.classList.remove('d-none');};reader.readAsDataURL(file);}
        });
    }
    setupPreview('bannerInput','bannerPreview');setupPreview('mainInput','mainPreview');
});
</script>
@endpush
