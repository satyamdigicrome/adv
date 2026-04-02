@extends('admin.layouts.app')
@section('title', 'Site Settings')
@section('page_title', 'Site Settings')

@section('content')
    <div class="page-header">
        <div>
            <h4>Settings</h4>
            <div class="page-breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a> / Settings</div>
        </div>
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

    <form method="POST" action="{{ route('admin.settings.update') }}">
        @csrf @method('PUT')

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="form-card mb-4">
                    <h6 class="fw-bold mb-4"
                        style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                        General</h6>
                    <div class="mb-3">
                        <label class="form-label">Site Name</label>
                        <input type="text" name="site_name" class="form-control"
                            value="{{ old('site_name', $setting->site_name) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control"
                            value="{{ old('phone', $setting->phone) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"
                            value="{{ old('email', $setting->email) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control" rows="3">{{ old('address', $setting->address) }}</textarea>
                    </div>
                </div>

                <div class="form-card mb-4">
                    <h6 class="fw-bold mb-4"
                        style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                        Social Links</h6>
                    <div class="mb-3"><label class="form-label">Facebook URL</label><input type="url"
                            name="facebook_url" class="form-control"
                            value="{{ old('facebook_url', $setting->facebook_url) }}"></div>
                    <div class="mb-3"><label class="form-label">Instagram URL</label><input type="url"
                            name="instagram_url" class="form-control"
                            value="{{ old('instagram_url', $setting->instagram_url) }}"></div>
                    <div class="mb-3"><label class="form-label">Twitter URL</label><input type="url"
                            name="twitter_url" class="form-control"
                            value="{{ old('twitter_url', $setting->twitter_url) }}"></div>
                    <div class="mb-3"><label class="form-label">LinkedIn URL</label><input type="url"
                            name="linkedin_url" class="form-control"
                            value="{{ old('linkedin_url', $setting->linkedin_url) }}"></div>
                </div>

                <div class="form-card mb-4">
                    <h6 class="fw-bold mb-4"
                        style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                        Home: Why Choose Us</h6>
                    <div class="mb-3"><label class="form-label">Section Title</label><input type="text"
                            name="why_choose_title" class="form-control"
                            value="{{ old('why_choose_title', $setting->why_choose_title) }}"></div>
                    <div class="mb-3"><label class="form-label">Section Subtitle</label>
                        <textarea name="why_choose_subtitle" class="form-control" rows="2">{{ old('why_choose_subtitle', $setting->why_choose_subtitle) }}</textarea>
                    </div>

                    <div id="whyChooseItems">
                        @php $oldItems = old('why_choose_items', $setting->why_choose_items ?? []); @endphp
                        @foreach ($oldItems as $idx => $item)
                            <div class="why-choose-item mb-3 p-3" style="border:1px solid #e2e8f0;border-radius:8px;">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <strong>Item {{ $idx + 1 }}</strong>
                                    <button type="button" class="btn btn-sm btn-danger"
                                        onclick="removeWhyChooseItem(this)">Remove</button>
                                </div>
                                <div class="mb-2"><label class="form-label">Icon (FontAwesome)</label><input
                                        type="text" name="why_choose_items[{{ $idx }}][icon]"
                                        class="form-control" value="{{ $item['icon'] ?? '' }}"></div>
                                <div class="mb-2"><label class="form-label">Title</label><input type="text"
                                        name="why_choose_items[{{ $idx }}][title]" class="form-control"
                                        value="{{ $item['title'] ?? '' }}"></div>
                                <div><label class="form-label">Description</label>
                                    <textarea name="why_choose_items[{{ $idx }}][desc]" class="form-control" rows="2">{{ $item['desc'] ?? '' }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="addWhyChooseItem();"><i
                            class="fas fa-plus"></i> Add New Item</button>
                </div>

                <div class="form-card mb-4">
                    <h6 class="fw-bold mb-4"
                        style="color:var(--primary);font-size:15px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">
                        Home: How It Works</h6>
                    <div class="mb-3"><label class="form-label">Section Title</label><input type="text"
                            name="how_it_works_title" class="form-control"
                            value="{{ old('how_it_works_title', $setting->how_it_works_title) }}"></div>
                    <div class="mb-3"><label class="form-label">Section Subtitle</label>
                        <textarea name="how_it_works_subtitle" class="form-control" rows="2">{{ old('how_it_works_subtitle', $setting->how_it_works_subtitle) }}</textarea>
                    </div>

                    <div id="howItWorksItems">
                        @php $oldHowItems = old('how_it_works_items', $setting->how_it_works_items ?? []); @endphp
                        @foreach ($oldHowItems as $idx => $item)
                            <div class="how-it-works-item mb-3 p-3" style="border:1px solid #e2e8f0;border-radius:8px;">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <strong>Step {{ $idx + 1 }}</strong>
                                    <button type="button" class="btn btn-sm btn-danger"
                                        onclick="removeHowItWorksItem(this)">Remove</button>
                                </div>
                                <div class="mb-2"><label class="form-label">Step Number</label><input type="text"
                                        name="how_it_works_items[{{ $idx }}][step]" class="form-control"
                                        value="{{ $item['step'] ?? $idx + 1 }}"></div>
                                <div class="mb-2"><label class="form-label">Title</label><input type="text"
                                        name="how_it_works_items[{{ $idx }}][title]" class="form-control"
                                        value="{{ $item['title'] ?? '' }}"></div>
                                <div><label class="form-label">Description</label>
                                    <textarea name="how_it_works_items[{{ $idx }}][desc]" class="form-control" rows="2">{{ $item['desc'] ?? '' }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="addHowItWorksItem();"><i
                            class="fas fa-plus"></i> Add New Step</button>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-gold-admin"><i class="fas fa-save me-2"></i> Save
                        Settings</button>
                </div>
            </div>
        </div>
    </form>

@endsection

@push('scripts')
    <script>
        function addWhyChooseItem() {
            const container = document.getElementById('whyChooseItems');
            const count = container.querySelectorAll('.why-choose-item').length;
            const index = count;
            const itemHTML = `
            <div class="why-choose-item mb-3 p-3" style="border:1px solid #e2e8f0;border-radius:8px;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <strong>Item ${index + 1}</strong>
                    <button type="button" class="btn btn-sm btn-danger" onclick="removeWhyChooseItem(this)">Remove</button>
                </div>
                <div class="mb-2"><label class="form-label">Icon (FontAwesome)</label><input type="text" name="why_choose_items[${index}][icon]" class="form-control"></div>
                <div class="mb-2"><label class="form-label">Title</label><input type="text" name="why_choose_items[${index}][title]" class="form-control"></div>
                <div><label class="form-label">Description</label><textarea name="why_choose_items[${index}][desc]" class="form-control" rows="2"></textarea></div>
            </div>
        `;
            container.insertAdjacentHTML('beforeend', itemHTML);
        }

        function removeWhyChooseItem(button) {
            const node = button.closest('.why-choose-item');
            if (node) node.remove();
        }

        function addHowItWorksItem() {
            const container = document.getElementById('howItWorksItems');
            const count = container.querySelectorAll('.how-it-works-item').length;
            const index = count;
            const stepNum = index + 1;
            const itemHTML = `
            <div class="how-it-works-item mb-3 p-3" style="border:1px solid #e2e8f0;border-radius:8px;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <strong>Step ${stepNum}</strong>
                    <button type="button" class="btn btn-sm btn-danger" onclick="removeHowItWorksItem(this)">Remove</button>
                </div>
                <div class="mb-2"><label class="form-label">Step Number</label><input type="text" name="how_it_works_items[${index}][step]" class="form-control" value="${stepNum}"></div>
                <div class="mb-2"><label class="form-label">Title</label><input type="text" name="how_it_works_items[${index}][title]" class="form-control"></div>
                <div><label class="form-label">Description</label><textarea name="how_it_works_items[${index}][desc]" class="form-control" rows="2"></textarea></div>
            </div>
        `;
            container.insertAdjacentHTML('beforeend', itemHTML);
        }

        function removeHowItWorksItem(button) {
            const node = button.closest('.how-it-works-item');
            if (node) node.remove();
        }
    </script>
@endpush
