@extends('admin.layouts.app')
@section('title', 'Edit FAQ')
@section('page_title', 'Edit FAQ')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.css" rel="stylesheet">
<style>
.note-editor{border-radius:8px!important;overflow:hidden;border:1.5px solid #e2e8f0!important;}
.note-editor:focus-within{border-color:var(--gold)!important;}
.note-toolbar{background:#f8fafc!important;border-bottom:1px solid #e2e8f0!important;}
.multi-select-wrap{display:flex;flex-wrap:wrap;gap:8px;max-height:200px;overflow-y:auto;padding:10px;border:1.5px solid #e2e8f0;border-radius:8px;background:#fff;}
.multi-select-wrap label{display:flex;align-items:center;gap:8px;padding:7px 12px;border-radius:7px;border:1.5px solid #e2e8f0;cursor:pointer;font-size:13px;font-weight:500;color:var(--primary);background:#fafbfd;transition:all 0.2s;user-select:none;}
.multi-select-wrap label:hover{border-color:var(--gold);background:rgba(201,168,76,0.06);}
.multi-select-wrap label:has(input:checked){border-color:var(--gold);background:rgba(201,168,76,0.1);}
</style>
@endpush

@section('content')
<div class="page-header">
    <div>
        <h4>Edit FAQ</h4>
        <div class="page-breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a> / <a href="{{ route('admin.faqs.index') }}">FAQs</a> / Edit</div>
    </div>
    <a href="{{ route('admin.faqs.index') }}" class="btn btn-sm" style="border:1.5px solid #e2e8f0;font-size:13px;font-weight:600;color:#555;border-radius:8px;padding:8px 18px;">
        <i class="fas fa-arrow-left me-1"></i> Back
    </a>
</div>

@if($errors->any())
<div class="alert border-0 rounded-3 mb-4" style="background:rgba(239,68,68,0.08);color:#dc2626;font-size:13.5px;">
    <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
</div>
@endif

@php
    $linkedServiceIds     = old('service_ids', $faq->services->pluck('id')->toArray());
    $linkedAttestationIds = old('attestation_ids', $faq->attestations->pluck('id')->toArray());
@endphp

<form method="POST" action="{{ route('admin.faqs.update', $faq) }}">
@csrf @method('PUT')
<div class="row g-4">
    <div class="col-lg-8">

        <div class="form-card mb-4">
            <h6 class="fw-bold mb-4" style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                <i class="fas fa-question-circle me-2" style="color:var(--gold);"></i> Question & Answer
            </h6>
            <div class="mb-4">
                <label class="form-label">Question <span class="text-danger">*</span></label>
                <textarea name="question" class="form-control @error('question') is-invalid @enderror"
                          rows="3" required>{{ old('question', $faq->question) }}</textarea>
                @error('question')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="form-label">Answer <span class="text-danger">*</span></label>
                <textarea name="answer" id="answer" class="form-control @error('answer') is-invalid @enderror">{{ old('answer', $faq->answer) }}</textarea>
                @error('answer')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        <!-- Link to Services -->
        <div class="form-card mb-4">
            <h6 class="fw-bold mb-2" style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                <i class="fas fa-concierge-bell me-2" style="color:#4f46e5;"></i> Show on Services
                <span style="font-size:12px;font-weight:500;color:#8a99b0;margin-left:8px;">Select one or many (optional)</span>
            </h6>
            @if($services->isEmpty())
                <p style="color:#8a99b0;font-size:13px;">No services available.</p>
            @else
            <div class="multi-select-wrap">
                @foreach($services as $svc)
                <label>
                    <input type="checkbox" name="service_ids[]" value="{{ $svc->id }}"
                           {{ in_array($svc->id, $linkedServiceIds) ? 'checked' : '' }}>
                    <span><i class="{{ $svc->icon ?? 'fas fa-file-alt' }}" style="color:#4f46e5;font-size:13px;"></i> {{ $svc->title }}</span>
                </label>
                @endforeach
            </div>
            @endif
        </div>

        <!-- Link to Attestations -->
        <div class="form-card">
            <h6 class="fw-bold mb-2" style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                <i class="fas fa-certificate me-2" style="color:var(--gold);"></i> Show on Attestations
                <span style="font-size:12px;font-weight:500;color:#8a99b0;margin-left:8px;">Select one or many (optional)</span>
            </h6>
            @if($attestations->isEmpty())
                <p style="color:#8a99b0;font-size:13px;">No attestations available.</p>
            @else
            <div class="multi-select-wrap">
                @foreach($attestations as $att)
                <label>
                    <input type="checkbox" name="attestation_ids[]" value="{{ $att->id }}"
                           {{ in_array($att->id, $linkedAttestationIds) ? 'checked' : '' }}>
                    <span>
                        <i class="{{ $att->icon ?? 'fas fa-certificate' }}" style="color:var(--gold);font-size:13px;"></i>
                        {{ $att->title }}{{ $att->country ? ' ('.$att->country.')' : '' }}
                    </span>
                </label>
                @endforeach
            </div>
            @endif

            <div style="margin-top:16px;padding:12px 16px;background:rgba(201,168,76,0.06);border:1.5px dashed rgba(201,168,76,0.3);border-radius:8px;font-size:13px;color:#a8893a;">
                <i class="fas fa-globe me-2"></i> <strong>Deselect all</strong> to make this a <strong>General FAQ</strong>.
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
                    <div style="font-size:13.5px;font-weight:600;color:var(--primary);">Active</div>
                    <div style="font-size:12px;color:#8a99b0;">Show on website</div>
                </div>
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" type="checkbox" name="is_active" {{ old('is_active', $faq->is_active) ? 'checked' : '' }} style="width:42px;height:22px;cursor:pointer;">
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $faq->sort_order) }}" min="0">
                <div style="font-size:11.5px;color:#8a99b0;margin-top:4px;">Lower = shown first</div>
            </div>
            <div class="section-divider"></div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-gold-admin"><i class="fas fa-save me-2"></i> Update FAQ</button>
            </div>
        </div>

        <div class="form-card mb-4" style="background:#f8fafc;">
            <h6 class="fw-bold mb-2" style="color:var(--primary);font-size:13px;">Currently Linked To</h6>
            @if($faq->services->isNotEmpty())
            <div style="margin-bottom:10px;">
                <div style="font-size:11px;color:#8a99b0;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:6px;">Services</div>
                @foreach($faq->services as $s)
                <span style="display:inline-block;background:rgba(79,70,229,0.1);color:#4f46e5;font-size:11.5px;font-weight:600;padding:3px 10px;border-radius:50px;margin:2px;">{{ $s->title }}</span>
                @endforeach
            </div>
            @endif
            @if($faq->attestations->isNotEmpty())
            <div>
                <div style="font-size:11px;color:#8a99b0;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:6px;">Attestations</div>
                @foreach($faq->attestations as $a)
                <span style="display:inline-block;background:rgba(201,168,76,0.12);color:#a8893a;font-size:11.5px;font-weight:600;padding:3px 10px;border-radius:50px;margin:2px;">{{ $a->title }}</span>
                @endforeach
            </div>
            @endif
            @if($faq->services->isEmpty() && $faq->attestations->isEmpty())
            <span style="font-size:12.5px;color:#8a99b0;">General FAQ (no specific links)</span>
            @endif
        </div>

        <button type="button"
                onclick="adminDelete('{{ route('admin.faqs.destroy', $faq) }}', 'Delete this FAQ permanently? This cannot be undone.')"
                class="btn w-100"
                style="background:rgba(239,68,68,0.08);color:#dc2626;border:1.5px solid rgba(239,68,68,0.2);font-size:13.5px;border-radius:8px;padding:10px;font-weight:600;">
            <i class="fas fa-trash me-2"></i> Delete FAQ
        </button>
    </div>
</div>
</form>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.js"></script>
<script>
$(document).ready(function(){
    $('#answer').summernote({
        placeholder: 'Write the answer...',
        height: 220,
        toolbar:[
            ['font',['bold','italic','underline','clear']],
            ['para',['ul','ol']],
            ['insert',['link']],
            ['view',['codeview']]
        ]
    });
});
</script>
@endpush
