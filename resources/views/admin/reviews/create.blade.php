@extends('admin.layouts.app')
@section('title', 'Add Review')
@section('page_title', 'Add Review')

@section('content')
<div class="page-header">
    <div>
        <h4>Add Review</h4>
        <div class="page-breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a> / <a href="{{ route('admin.reviews.index') }}">Reviews</a> / Add</div>
    </div>
    <a href="{{ route('admin.reviews.index') }}" class="btn btn-sm" style="border:1.5px solid #e2e8f0;font-size:13px;font-weight:600;color:#555;border-radius:8px;padding:8px 18px;">
        <i class="fas fa-arrow-left me-1"></i> Back
    </a>
</div>

@if($errors->any())
<div class="alert border-0 rounded-3 mb-4" style="background:rgba(239,68,68,0.08);color:#dc2626;font-size:13.5px;">
    <ul class="mb-0 mt-1">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
</div>
@endif

<form method="POST" action="{{ route('admin.reviews.store') }}">
@csrf
<div class="row g-4">
    <div class="col-lg-8">
        <div class="form-card">
            <h6 class="fw-bold mb-4" style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                <i class="fas fa-user me-2" style="color:var(--gold);"></i> Reviewer Details
            </h6>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Reviewer Name <span class="text-danger">*</span></label>
                    <input type="text" name="reviewer_name" class="form-control @error('reviewer_name') is-invalid @enderror"
                           value="{{ old('reviewer_name') }}" placeholder="e.g. Rahul Sharma" required>
                    @error('reviewer_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Location</label>
                    <input type="text" name="reviewer_location" class="form-control @error('reviewer_location') is-invalid @enderror"
                           value="{{ old('reviewer_location') }}" placeholder="e.g. Delhi, India">
                    @error('reviewer_location')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="mt-4">
                <label class="form-label">Star Rating <span class="text-danger">*</span></label>
                <div class="d-flex gap-3 flex-wrap mt-1">
                    @for($i = 1; $i <= 5; $i++)
                    <label style="cursor:pointer;">
                        <input type="radio" name="rating" value="{{ $i }}" {{ old('rating', 5) == $i ? 'checked' : '' }} style="display:none;" class="rating-radio">
                        <div class="rating-option p-3 rounded-2 text-center {{ old('rating', 5) == $i ? 'selected' : '' }}"
                             style="border:2px solid {{ old('rating', 5) == $i ? 'var(--gold)' : '#e2e8f0' }};background:{{ old('rating', 5) == $i ? 'rgba(201,168,76,0.1)' : '#f8fafc' }};min-width:80px;transition:all 0.2s;">
                            <div style="color:#f5b301;font-size:20px;margin-bottom:4px;">
                                @for($j = 1; $j <= $i; $j++)<i class="fas fa-star"></i>@endfor
                            </div>
                            <div style="font-size:12px;font-weight:700;color:var(--primary);">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</div>
                        </div>
                    </label>
                    @endfor
                </div>
                @error('rating')<div class="text-danger" style="font-size:12px;margin-top:6px;">{{ $message }}</div>@enderror
            </div>

            <div class="mt-4">
                <label class="form-label">Review Text <span class="text-danger">*</span></label>
                <textarea name="review_text" class="form-control @error('review_text') is-invalid @enderror"
                          rows="5" placeholder="Enter the customer review text here..." maxlength="2000" required>{{ old('review_text') }}</textarea>
                @error('review_text')<div class="invalid-feedback">{{ $message }}</div>@enderror
                <div style="font-size:11.5px;color:#8a99b0;margin-top:4px;">Max 2000 characters</div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-card mb-4">
            <h6 class="fw-bold mb-4" style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                <i class="fas fa-cog me-2" style="color:var(--gold);"></i> Settings
            </h6>
            <div class="mb-3">
                <label class="form-label">Source</label>
                <select name="source" class="form-select">
                    @foreach(['Google','Facebook','Justdial','Sulekha','Other'] as $src)
                    <option value="{{ $src }}" {{ old('source','Google') === $src ? 'selected' : '' }}>{{ $src }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" min="0">
                <div style="font-size:11.5px;color:#8a99b0;margin-top:4px;">Lower = shown first</div>
            </div>
            <div class="mb-4 d-flex align-items-center justify-content-between p-3 rounded-2" style="background:#f8fafc;border:1.5px solid #e2e8f0;">
                <div>
                    <div style="font-size:13.5px;font-weight:600;color:var(--primary);">Active</div>
                    <div style="font-size:12px;color:#8a99b0;">Show on website</div>
                </div>
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" type="checkbox" name="is_active" {{ old('is_active','1') ? 'checked' : '' }} style="width:42px;height:22px;cursor:pointer;">
                </div>
            </div>
            <div class="section-divider"></div>
            <div class="d-grid">
                <button type="submit" class="btn btn-gold-admin"><i class="fas fa-save me-2"></i> Save Review</button>
            </div>
        </div>

        <!-- Preview -->
        <div class="form-card" id="previewCard">
            <h6 class="fw-bold mb-3" style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                <i class="fas fa-eye me-2" style="color:var(--gold);"></i> Preview
            </h6>
            <div style="background:#f8fafc;border-radius:10px;padding:16px;border:1px solid #e2e8f0;">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div id="prevAvatar" style="width:42px;height:42px;border-radius:50%;background:linear-gradient(135deg,var(--primary),#1a3460);display:flex;align-items:center;justify-content:center;color:var(--gold);font-weight:700;font-size:14px;">?</div>
                    <div>
                        <div id="prevName" style="font-weight:700;font-size:13.5px;color:var(--primary);">Reviewer Name</div>
                        <div id="prevLocation" style="font-size:11.5px;color:#8a99b0;"></div>
                    </div>
                </div>
                <div id="prevStars" style="color:#f5b301;font-size:14px;margin-bottom:8px;">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <div id="prevText" style="font-size:13px;color:#637082;line-height:1.7;font-style:italic;">"Your review will appear here..."</div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection

@push('scripts')
<script>
// Live preview
function updatePreview() {
    var name     = document.querySelector('[name="reviewer_name"]').value || 'Reviewer Name';
    var location = document.querySelector('[name="reviewer_location"]').value;
    var text     = document.querySelector('[name="review_text"]').value || 'Your review will appear here...';
    var rating   = document.querySelector('[name="rating"]:checked')?.value || 5;

    // Avatar initials
    var words = name.trim().split(' ');
    var initials = words.length >= 2 ? words[0][0] + words[1][0] : name[0] || '?';
    document.getElementById('prevAvatar').textContent = initials.toUpperCase();
    document.getElementById('prevName').textContent = name;
    document.getElementById('prevLocation').textContent = location ? '📍 ' + location : '';
    document.getElementById('prevText').textContent = '"' + text + '"';

    // Stars
    var starsHtml = '';
    for (var i = 1; i <= 5; i++) {
        starsHtml += '<i class="fas fa-star" style="color:' + (i <= rating ? '#f5b301' : '#ddd') + '"></i>';
    }
    document.getElementById('prevStars').innerHTML = starsHtml;
}

document.querySelector('[name="reviewer_name"]').addEventListener('input', updatePreview);
document.querySelector('[name="reviewer_location"]').addEventListener('input', updatePreview);
document.querySelector('[name="review_text"]').addEventListener('input', updatePreview);
document.querySelectorAll('.rating-radio').forEach(function(radio) {
    radio.addEventListener('change', function() {
        // Update visual selection
        document.querySelectorAll('.rating-option').forEach(function(opt) {
            opt.style.border = '2px solid #e2e8f0';
            opt.style.background = '#f8fafc';
        });
        this.nextElementSibling.style.border = '2px solid var(--gold)';
        this.nextElementSibling.style.background = 'rgba(201,168,76,0.1)';
        updatePreview();
    });
});
</script>
@endpush
