@extends('admin.layouts.app')
@section('title', 'Edit Attestation — ' . $attestation->title)
@section('page_title', 'Edit Attestation')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.css" rel="stylesheet">
    <style>
        .note-editor {
            border-radius: 8px !important;
            overflow: hidden;
            border: 1.5px solid #e2e8f0 !important;
        }

        .note-editor:focus-within {
            border-color: var(--gold) !important;
            box-shadow: 0 0 0 3px rgba(201, 168, 76, 0.12) !important;
        }

        .note-toolbar {
            background: #f8fafc !important;
            border-bottom: 1px solid #e2e8f0 !important;
        }

        .img-preview-box {
            width: 100%;
            max-height: 120px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            display: block;
            margin-bottom: 10px;
        }

        .img-new-preview {
            max-width: 180px;
            max-height: 120px;
            border-radius: 8px;
            border: 2px dashed var(--gold);
            object-fit: cover;
            display: block;
            margin-top: 10px;
        }
    </style>
@endpush

@section('content')
    <div class="page-header">
        <div>
            <h4>Edit: {{ $attestation->title }}</h4>
            <div class="page-breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a> / <a
                    href="{{ route('admin.attestations.index') }}">Attestations</a> / Edit</div>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('attestations.show', $attestation->slug) }}" target="_blank" class="btn btn-sm"
                style="border:1.5px solid #e2e8f0;font-size:13px;font-weight:600;color:#555;border-radius:8px;padding:8px 16px;"><i
                    class="fas fa-eye me-1"></i> View</a>
            <a href="{{ route('admin.attestations.index') }}" class="btn btn-sm"
                style="border:1.5px solid #e2e8f0;font-size:13px;font-weight:600;color:#555;border-radius:8px;padding:8px 16px;"><i
                    class="fas fa-arrow-left me-1"></i> Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert border-0 rounded-3 mb-4" style="background:rgba(239,68,68,0.08);color:#dc2626;font-size:13.5px;">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.attestations.update', $attestation) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row g-4">
            <div class="col-lg-8">

                <!-- Basic Info -->
                <div class="form-card mb-4">
                    <h6 class="fw-bold mb-4"
                        style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                        <i class="fas fa-info-circle me-2" style="color:var(--gold);"></i> Basic Information
                    </h6>
                    <div class="mb-3">
                        <label class="form-label">Attestation Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title', $attestation->title) }}"
                            placeholder="e.g. Saudi Arabia Embassy Attestation" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-8">
                            <label class="form-label">Slug (URL)</label>
                            <div class="input-group">
                                <span class="input-group-text"
                                    style="font-size:12px;color:#8a99b0;border:1.5px solid #e2e8f0;border-right:none;border-radius:8px 0 0 8px;">/attestation-services/</span>
                                <input type="text" name="slug" id="slug" class="form-control"
                                    value="{{ old('slug', $attestation->slug) }}"
                                    placeholder="saudi-arabia-embassy-attestation" style="border-radius:0 8px 8px 0;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Country</label>
                            <input type="text" name="country" class="form-control"
                                value="{{ old('country', $attestation->country) }}" placeholder="e.g. Saudi Arabia">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Processing Time</label>
                            <input type="text" name="processing_time"
                                class="form-control @error('processing_time') is-invalid @enderror"
                                value="{{ old('processing_time', $attestation->processing_time) }}"
                                placeholder="e.g. 3-7 Days">
                            <small class="form-text text-muted d-block mt-1">How long the attestation takes</small>
                            @error('processing_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Support Type</label>
                            <input type="text" name="support_type"
                                class="form-control @error('support_type') is-invalid @enderror"
                                value="{{ old('support_type', $attestation->support_type) }}"
                                placeholder="e.g. Door-to-Door">
                            <small class="form-text text-muted d-block mt-1">Service delivery method</small>
                            @error('support_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Short Description <span class="text-muted" style="font-weight:400;">(max
                                500 chars)</span></label>
                        <textarea name="short_description" class="form-control" rows="2" maxlength="500"
                            placeholder="Brief overview shown on listing page and meta...">{{ old('short_description', $attestation->short_description) }}</textarea>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Long Description <span class="text-muted" style="font-weight:400;">(full
                                page content with Summernote)</span></label>
                        <textarea name="long_description" id="long_description" class="form-control">{{ old('long_description', $attestation->long_description) }}</textarea>
                    </div>
                </div>

                <!-- Work Steps (Repeatable) -->
                <div class="form-card mb-4">
                    <h6 class="fw-bold mb-4"
                        style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                        <i class="fas fa-list-ol me-2" style="color:var(--gold);"></i> Work Steps (Repeatable)
                    </h6>
                    <div id="stepsContainer"></div>
                    <button type="button" class="btn btn-outline-gold-admin btn-sm" onclick="addStep()">
                        <i class="fas fa-plus me-2"></i> Add Step
                    </button>
                </div>

                <!-- SEO -->
                <div class="form-card">
                    <h6 class="fw-bold mb-4"
                        style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                        <i class="fas fa-search me-2" style="color:var(--gold);"></i> SEO Settings
                    </h6>
                    <div class="mb-3">
                        <label class="form-label">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control"
                            value="{{ old('meta_title', $attestation->meta_title) }}" maxlength="255">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="2" maxlength="500">{{ old('meta_description', $attestation->meta_description) }}</textarea>
                    </div>
                    <div>
                        <label class="form-label">Meta Keywords</label>
                        <input type="text" name="meta_keywords" class="form-control"
                            value="{{ old('meta_keywords', $attestation->meta_keywords) }}"
                            placeholder="keyword1, keyword2, keyword3">
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Settings -->
                <div class="form-card mb-4">
                    <h6 class="fw-bold mb-4"
                        style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                        <i class="fas fa-cog me-2" style="color:var(--gold);"></i> Settings
                    </h6>
                    <div class="mb-3 d-flex align-items-center justify-content-between p-3 rounded-2"
                        style="background:#f8fafc;border:1.5px solid #e2e8f0;">
                        <div>
                            <div style="font-size:13.5px;font-weight:600;color:var(--primary);">Active / Visible</div>
                            <div style="font-size:12px;color:#8a99b0;">Show on website</div>
                        </div>
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                                value="1" {{ old('is_active', $attestation->is_active) ? 'checked' : '' }}
                                style="width:42px;height:22px;cursor:pointer;">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control"
                            value="{{ old('sort_order', $attestation->sort_order) }}" min="0">
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Icon Class <span class="text-muted" style="font-weight:400;">(Font
                                Awesome)</span></label>
                        <input type="text" name="icon" class="form-control"
                            value="{{ old('icon', $attestation->icon) }}" placeholder="fas fa-certificate">
                    </div>
                    <div class="section-divider"></div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-gold-admin"><i class="fas fa-save me-2"></i> Update
                            Attestation</button>
                        <button type="button"
                            onclick="adminDelete('{{ route('admin.attestations.destroy', $attestation) }}', 'Delete this attestation permanently? This cannot be undone.')"
                            class="btn w-100"
                            style="background:rgba(239,68,68,0.08);color:#dc2626;border:1.5px solid rgba(239,68,68,0.2);font-size:13.5px;border-radius:8px;padding:10px;font-weight:600;">
                            <i class="fas fa-trash me-2"></i> Delete
                        </button>
                        <a href="{{ route('admin.attestations.index') }}" class="btn text-center"
                            style="border:1.5px solid #e2e8f0;font-size:13.5px;border-radius:8px;padding:10px;font-weight:600;color:#555;">Cancel</a>
                    </div>
                </div>

                <!-- Banner Image -->
                <div class="form-card mb-4">
                    <h6 class="fw-bold mb-3"
                        style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                        <i class="fas fa-image me-2" style="color:var(--gold);"></i> Banner Image
                    </h6>
                    @if ($attestation->banner_image)
                        <img src="{{ asset('storage/' . $attestation->banner_image) }}" alt="Banner"
                            class="img-preview-box">
                        <div class="form-check" style="margin-bottom:15px;">
                            <input class="form-check-input" type="checkbox" name="delete_banner_image" value="1"
                                id="deleteBannerImage">
                            <label class="form-check-label" for="deleteBannerImage">Delete current image</label>
                        </div>
                    @endif
                    <label class="form-label">{{ $attestation->banner_image ? 'Replace' : 'Upload' }} Banner <span
                            class="text-muted" style="font-weight:400;">JPG/PNG max 2MB</span></label>
                    <input type="file" name="banner_image" class="form-control" accept="image/*" id="bannerInput">
                    <img id="bannerPreview" class="img-new-preview d-none">
                </div>

                <!-- Steps Image -->
                <div class="form-card mb-4">
                    <h6 class="fw-bold mb-3"
                        style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                        <i class="fas fa-grip-lines-vertical me-2" style="color:var(--gold);"></i> Steps Image
                    </h6>
                    @if ($attestation->steps_image)
                        <img src="{{ asset('storage/' . $attestation->steps_image) }}" alt="Steps"
                            class="img-preview-box">
                        <div class="form-check" style="margin-bottom:15px;">
                            <input class="form-check-input" type="checkbox" name="delete_steps_image" value="1"
                                id="deleteStepsImage">
                            <label class="form-check-label" for="deleteStepsImage">Delete current image</label>
                        </div>
                    @endif
                    <label class="form-label">{{ $attestation->steps_image ? 'Replace' : 'Upload' }} Steps Image <span
                            class="text-muted" style="font-weight:400;">JPG/PNG max 2MB</span></label>
                    <input type="file" name="steps_image" class="form-control" accept="image/*" id="stepsInput">
                    <img id="stepsPreview" class="img-new-preview d-none">
                </div>

                <!-- Main Image -->
                <div class="form-card">
                    <h6 class="fw-bold mb-3"
                        style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                        <i class="fas fa-photo-video me-2" style="color:var(--gold);"></i> Main Image
                    </h6>
                    @if ($attestation->main_image)
                        <img src="{{ asset('storage/' . $attestation->main_image) }}" alt="Main"
                            class="img-preview-box">
                        <div class="form-check" style="margin-bottom:15px;">
                            <input class="form-check-input" type="checkbox" name="delete_main_image" value="1"
                                id="deleteMainImage">
                            <label class="form-check-label" for="deleteMainImage">Delete current image</label>
                        </div>
                    @endif
                    <label class="form-label">{{ $attestation->main_image ? 'Replace' : 'Upload' }} Feature Image <span
                            class="text-muted" style="font-weight:400;">JPG/PNG max 2MB</span></label>
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
        let stepCount = 0;
        const existingSteps = {!! json_encode($attestation->steps ?? []) !!};

        function addStep(stepData = null) {
            let stepId = `step-${stepCount}`;
            let stepHTML = `
                <div class="form-card mb-3 p-3" id="${stepId}" style="background:#f8fafc;border:1.5px solid #e2e8f0;border-radius:8px;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0" style="color:var(--primary);font-weight:600;font-size:13px;">
                            <i class="fas fa-arrow-right me-2" style="color:var(--gold);"></i> Step ${stepCount + 1}
                        </h6>
                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeStep('${stepId}')">
                            <i class="fas fa-times"></i> Remove
                        </button>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" style="font-size:13px;font-weight:600;">Step Heading</label>
                        <input type="text" name="steps[${stepCount}][heading]" class="form-control" 
                            placeholder="e.g. Document Verification" value="${stepData ? stepData.heading : ''}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" style="font-size:13px;font-weight:600;">Step Description</label>
                        <textarea name="steps[${stepCount}][description]" id="step_desc_${stepCount}" class="form-control step-description">
${stepData ? stepData.description : ''}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" style="font-size:13px;font-weight:600;">Step Image (optional)</label>
`;

            // If we have existing image data, show it
            if (stepData && stepData.image) {
                stepHTML += `
                        <div class="mb-2">
                            <img src="${window.location.origin + '/storage/' + stepData.image}" alt="Step Image" style="width:100%;max-width:200px;height:auto;border-radius:8px;border:1px solid #e2e8f0;">
                        </div>
                        <input type="hidden" name="steps[${stepCount}][existing_image]" value="${stepData.image}">
                        <div class="form-check" style="margin-bottom:8px;">
                            <input type="checkbox" class="form-check-input" name="steps[${stepCount}][delete_image]" value="1" id="deleteStepImage${stepCount}">
                            <label class="form-check-label" for="deleteStepImage${stepCount}">Remove existing step image</label>
                        </div>
`;
            }

            stepHTML += `
                        <input type="file" name="steps[${stepCount}][image]" class="form-control step-image-input" accept="image/*">
                        <small class="form-text text-muted">JPG/PNG max 2MB</small>
                    </div>
                    <div id="step_image_preview_${stepCount}" class="mt-2"></div>
                </div>
            `;

            document.getElementById('stepsContainer').insertAdjacentHTML('beforeend', stepHTML);

            // Initialize Summernote for this step's description
            $(`#step_desc_${stepCount}`).summernote({
                placeholder: 'Describe this work step...',
                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'hr']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            setupStepImagePreview(stepId, stepCount);
            stepCount++;
        }

        function removeStep(stepId) {
            document.getElementById(stepId).remove();
        }

        function setupStepImagePreview(stepId, stepIndex) {
            let inputSelector = `#${stepId} .step-image-input`;
            let previewSelector = `#step_image_preview_${stepIndex}`;

            document.querySelector(inputSelector).addEventListener('change', function() {
                let file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        let previewDiv = document.querySelector(previewSelector);
                        previewDiv.innerHTML =
                            `<img src="${e.target.result}" class="img-preview" style="width:100%;max-width:200px;height:auto;border-radius:8px;margin-top:10px;">`;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        function initializeSteps() {
            if (existingSteps && existingSteps.length > 0) {
                existingSteps.forEach(function(step) {
                    addStep(step);
                });
            }
        }

        $(document).ready(function() {
            initializeSteps();

            $('#long_description').summernote({
                placeholder: 'Write full content...',
                tabsize: 2,
                height: 380,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'hr']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            function setupPreview(inputId, previewId) {
                document.getElementById(inputId).addEventListener('change', function() {
                    var file = this.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var p = document.getElementById(previewId);
                            p.src = e.target.result;
                            p.classList.remove('d-none');
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
            setupPreview('bannerInput', 'bannerPreview');
            setupPreview('mainInput', 'mainPreview');
            setupPreview('stepsInput', 'stepsPreview');
        });
    </script>
@endpush
