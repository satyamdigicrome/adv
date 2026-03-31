@extends('admin.layouts.app')
@section('title', 'Add New Service')
@section('page_title', 'Add New Service')

@push('styles')
    <!-- Summernote -->
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

        .img-preview {
            max-width: 180px;
            max-height: 120px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            object-fit: cover;
            display: block;
            margin-top: 10px;
        }
    </style>
@endpush

@section('content')

    <div class="page-header">
        <div>
            <h4>Add New Service</h4>
            <div class="page-breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a> /
                <a href="{{ route('admin.services.index') }}">Services</a> / Add New
            </div>
        </div>
        <a href="{{ route('admin.services.index') }}" class="btn btn-sm"
            style="border:1.5px solid #e2e8f0; font-size:13px; font-weight:600; color:#555; border-radius:8px; padding:8px 18px;">
            <i class="fas fa-arrow-left me-1"></i> Back
        </a>
    </div>

    @if ($errors->any())
        <div class="alert border-0 rounded-3 mb-4"
            style="background:rgba(239,68,68,0.08); color:#dc2626; font-size:13.5px;">
            <i class="fas fa-exclamation-circle me-2"></i>
            Please fix the following errors:
            <ul class="mb-0 mt-1">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row g-4">
            <!-- Left Column -->
            <div class="col-lg-8">

                <!-- Basic Info -->
                <div class="form-card mb-4">
                    <h6 class="fw-bold mb-4"
                        style="color:var(--primary); font-size:15px; border-bottom:1px solid #f0f3f8; padding-bottom:12px;">
                        <i class="fas fa-info-circle me-2" style="color:var(--gold);"></i> Basic Information
                    </h6>
                    <div class="mb-3">
                        <label class="form-label">Service Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                            placeholder="e.g. MEA Attestation Services" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Slug (URL) <span class="text-muted"
                                style="font-weight:400;">(auto-generated if empty)</span></label>
                        <div class="input-group">
                            <span class="input-group-text"
                                style="font-size:12.5px; color:#8a99b0; border-radius:8px 0 0 8px; border:1.5px solid #e2e8f0; border-right:none;">/services/</span>
                            <input type="text" name="slug" id="slug"
                                class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}"
                                placeholder="mea-attestation-services" style="border-radius:0 8px 8px 0;">
                        </div>
                        @error('slug')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Short Description <span class="text-muted" style="font-weight:400;">(max
                                500 chars)</span></label>
                        <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="2"
                            placeholder="Brief description shown in service cards and listings..." maxlength="500">{{ old('short_description') }}</textarea>
                        @error('short_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <label class="form-label">Long Description <span class="text-muted" style="font-weight:400;">(full
                                page content)</span></label>
                        <textarea name="long_description" id="long_description" class="form-control">{{ old('long_description') }}</textarea>
                        @error('long_description')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Work Steps Section -->
                <div class="form-card mb-4">
                    <h6 class="fw-bold mb-4"
                        style="color:var(--primary); font-size:15px; border-bottom:1px solid #f0f3f8; padding-bottom:12px;">
                        <i class="fas fa-list-ol me-2" style="color:var(--gold);"></i> Work Steps (Repeatable)
                    </h6>
                    <div id="stepsContainer"></div>
                    <button type="button" class="btn btn-sm"
                        style="background:rgba(201,168,76,0.12); color:var(--gold); border:1.5px solid rgba(201,168,76,0.3); border-radius:8px; font-size:13px; font-weight:600;"
                        onclick="addStep()">
                        <i class="fas fa-plus me-2"></i> Add Step
                    </button>
                </div>

                <!-- SEO Section -->
                <div class="form-card">
                    <h6 class="fw-bold mb-4"
                        style="color:var(--primary); font-size:15px; border-bottom:1px solid #f0f3f8; padding-bottom:12px;">
                        <i class="fas fa-search me-2" style="color:var(--gold);"></i> SEO Settings
                    </h6>
                    <div class="mb-3">
                        <label class="form-label">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}"
                            placeholder="SEO title (if empty, service title is used)" maxlength="255">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="2"
                            placeholder="SEO description (150-160 chars recommended)" maxlength="500">{{ old('meta_description') }}</textarea>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Meta Keywords</label>
                        <input type="text" name="meta_keywords" class="form-control"
                            value="{{ old('meta_keywords') }}" placeholder="keyword1, keyword2, keyword3">
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-4">

                <!-- Publish Settings -->
                <div class="form-card mb-4">
                    <h6 class="fw-bold mb-4"
                        style="color:var(--primary); font-size:15px; border-bottom:1px solid #f0f3f8; padding-bottom:12px;">
                        <i class="fas fa-cog me-2" style="color:var(--gold);"></i> Settings
                    </h6>

                    <div class="mb-3 d-flex align-items-center justify-content-between p-3 rounded-2"
                        style="background:#f8fafc; border:1.5px solid #e2e8f0;">
                        <div>
                            <div style="font-size:13.5px; font-weight:600; color:var(--primary);">Active / Visible</div>
                            <div style="font-size:12px; color:#8a99b0;">Show this service on website</div>
                        </div>
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                                {{ old('is_active', '1') ? 'checked' : '' }}
                                style="width:42px; height:22px; cursor:pointer;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sort Order <span class="text-muted" style="font-weight:400;">(lower =
                                first)</span></label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}"
                            min="0">
                    </div>

                    <div class="mb-1">
                        <label class="form-label">Icon Class <span class="text-muted" style="font-weight:400;">(Font
                                Awesome)</span></label>
                        <input type="text" name="icon" class="form-control"
                            value="{{ old('icon', 'fas fa-file-alt') }}" placeholder="fas fa-file-alt">
                        <div style="font-size:11.5px; color:#8a99b0; margin-top:5px;">
                            <a href="https://fontawesome.com/icons" target="_blank" style="color:var(--gold);">Browse FA
                                icons</a>
                        </div>
                    </div>

                    <div class="section-divider"></div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-gold-admin">
                            <i class="fas fa-save me-2"></i> Save Service
                        </button>
                        <a href="{{ route('admin.services.index') }}" class="btn text-center"
                            style="border:1.5px solid #e2e8f0; font-size:13.5px; border-radius:8px; padding:10px; font-weight:600; color:#555;">
                            Cancel
                        </a>
                    </div>
                </div>

                <!-- Banner Image -->
                <div class="form-card mb-4">
                    <h6 class="fw-bold mb-3"
                        style="color:var(--primary); font-size:15px; border-bottom:1px solid #f0f3f8; padding-bottom:12px;">
                        <i class="fas fa-image me-2" style="color:var(--gold);"></i> Banner Image
                    </h6>
                    <div class="mb-1">
                        <label class="form-label">Page Banner (Wide) <span class="text-muted"
                                style="font-weight:400;">JPG/PNG, max 2MB</span></label>
                        <input type="file" name="banner_image"
                            class="form-control @error('banner_image') is-invalid @enderror" accept="image/*"
                            id="bannerInput">
                        @error('banner_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <img id="bannerPreview" class="img-preview d-none">
                    </div>
                </div>

                <!-- Steps Image -->
                <div class="form-card mb-4">
                    <h6 class="fw-bold mb-3"
                        style="color:var(--primary); font-size:15px; border-bottom:1px solid #f0f3f8; padding-bottom:12px;">
                        <i class="fas fa-grip-lines-vertical me-2" style="color:var(--gold);"></i> Steps Image
                    </h6>
                    <div class="mb-1">
                        <label class="form-label">Work Steps Image (optional) <span class="text-muted"
                                style="font-weight:400;">JPG/PNG, max 2MB</span></label>
                        <input type="file" name="steps_image"
                            class="form-control @error('steps_image') is-invalid @enderror" accept="image/*"
                            id="stepsInput">
                        @error('steps_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <img id="stepsPreview" class="img-preview d-none">
                    </div>
                </div>

                <!-- Main Image -->
                <div class="form-card">
                    <h6 class="fw-bold mb-3"
                        style="color:var(--primary); font-size:15px; border-bottom:1px solid #f0f3f8; padding-bottom:12px;">
                        <i class="fas fa-photo-video me-2" style="color:var(--gold);"></i> Main Image
                    </h6>
                    <div class="mb-1">
                        <label class="form-label">Service Feature Image <span class="text-muted"
                                style="font-weight:400;">JPG/PNG, max 2MB</span></label>
                        <input type="file" name="main_image"
                            class="form-control @error('main_image') is-invalid @enderror" accept="image/*"
                            id="mainInput">
                        @error('main_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <img id="mainPreview" class="img-preview d-none">
                    </div>
                </div>

            </div>
        </div>
    </form>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.js"></script>
    <script>
        $(document).ready(function() {
            // Summernote
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

            // Auto slug from title
            $('#title').on('keyup blur', function() {
                if (!$('#slug').data('manually-edited')) {
                    const slug = $(this).val()
                        .toLowerCase()
                        .replace(/[^a-z0-9\s-]/g, '')
                        .replace(/\s+/g, '-')
                        .replace(/-+/g, '-')
                        .trim();
                    $('#slug').val(slug);
                }
            });
            $('#slug').on('input', function() {
                $(this).data('manually-edited', true);
            });

            // Image previews
            function setupPreview(inputId, previewId) {
                document.getElementById(inputId).addEventListener('change', function() {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const preview = document.getElementById(previewId);
                            preview.src = e.target.result;
                            preview.classList.remove('d-none');
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
            setupPreview('bannerInput', 'bannerPreview');
            setupPreview('mainInput', 'mainPreview');
            setupPreview('stepsInput', 'stepsPreview');

            // Initialize steps container
            initializeSteps();
        });

        let stepCount = 0;

        function addStep() {
            stepCount++;
            const html = `
                        <div class="step-item p-3 mb-3" style="background:#f8fafc; border: 1.5px solid #e2e8f0; border-radius:10px;" data-step-id="${stepCount}">
                            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                                <h6 style="margin:0; color:var(--primary); font-weight:600; font-size:13px;">Step ${stepCount}</h6>
                                <button type="button" class="btn btn-sm" style="background:rgba(239,68,68,0.1); color:#dc2626; border:none; padding:4px 12px; border-radius:6px; font-size:12px;" onclick="removeStep(${stepCount})">
                                    <i class="fas fa-trash"></i> Remove
                                </button>
                            </div>

                            <div class="mb-2">
                                <label style="font-size:12px; font-weight:600; color:#3d4a5c;">Step Heading</label>
                                <input type="text" name="steps[${stepCount}][heading]" class="form-control" placeholder="e.g., Initial Consultation" style="font-size:13px;">
                            </div>

                            <div class="mb-2">
                                <label style="font-size:12px; font-weight:600; color:#3d4a5c;">Step Description (Summernote)</label>
                                <textarea name="steps[${stepCount}][description]" class="form-control step-description" data-step-id="${stepCount}"
                                    style="font-size:13px;"></textarea>
                            </div>

                            <div class="mb-1">
                                <label style="font-size:12px; font-weight:600; color:#3d4a5c;">Step Image</label>
                                <input type="file" name="steps[${stepCount}][image]" class="form-control" accept="image/*" style="font-size:13px;">
                                <img class="step-preview d-none" style="max-width:120px; max-height:80px; border-radius:6px; border:1px solid #e2e8f0; margin-top:8px;">
                            </div>
                        </div>
                    `;
            $('#stepsContainer').append(html);

            // Initialize Summernote for new step
            const $textarea = $(`.step-description[data-step-id="${stepCount}"]`);
            $textarea.summernote({
                placeholder: 'Describe this step...',
                tabsize: 2,
                height: 150,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'hr']],
                ]
            });

            // Setup preview for new step image
            setupStepImagePreview(stepCount);
        }

        function removeStep(id) {
            $(`.step-item[data-step-id="${id}"]`).remove();
        }

        function setupStepImagePreview(stepId) {
            const $stepItem = $(`.step-item[data-step-id="${stepId}"]`);
            const $input = $stepItem.find(`input[name="steps[${stepId}][image]"]`);
            const $preview = $stepItem.find('.step-preview');

            $input.on('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $preview.attr('src', e.target.result).removeClass('d-none');
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        function initializeSteps() {
            // Initialize existing steps if editing
            // This will be implemented in edit view with old data
        }
