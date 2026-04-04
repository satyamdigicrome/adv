@extends('layouts.app')

@section('meta_title', ($service->meta_title ?: $service->title) . ' | S K Document Centre')
@section('meta_description', $service->meta_description ?: $service->short_description)
@section('meta_keywords', $service->meta_keywords)
@section('canonical', route('services.show', $service->slug))

@section('og_title', $service->meta_title ?: $service->title)
@section('og_description', $service->meta_description ?: $service->short_description)
@section('og_image', $service->main_image_url)

@section('content')

    <!-- ===== HERO SECTION (Two-column: text left, banner image right) ===== -->
    <div
        style="background:linear-gradient(135deg,#0f2044 0%,#1a3460 100%);min-height:480px;display:flex;align-items:center;position:relative;overflow:hidden;">
        <!-- Background texture -->
        <div
            style="position:absolute;inset:0;opacity:0.03;background-image:url('data:image/svg+xml,%3Csvg width=%2260%22 height=%2260%22 viewBox=%220 0 60 60%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23ffffff%22 fill-opacity=%221%22%3E%3Cpath d=%22M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');pointer-events:none;">
        </div>

        <div
            style="position:absolute;bottom:-60px;left:-60px;width:300px;height:300px;border-radius:50%;background:rgba(201,168,76,0.05);pointer-events:none;">
        </div>

        <div class="container position-relative" style="padding:80px 12px;">
            <div class="row align-items-center g-5">

                <!-- Left: Text content -->
                <div class="col-lg-6" data-aos="fade-right">
                    <!-- Breadcrumb -->
                    <nav style="margin-bottom:20px;">
                        <ol
                            style="list-style:none;padding:0;margin:0;display:flex;flex-wrap:wrap;gap:8px;font-size:12.5px;color:rgba(255,255,255,0.5);">
                            <li><a href="{{ url('/') }}" style="color:rgba(255,255,255,0.5);text-decoration:none;"
                                    onmouseover="this.style.color='var(--gold)'"
                                    onmouseout="this.style.color='rgba(255,255,255,0.5)'">Home</a></li>
                            <li style="margin:0 4px;">/</li>
                            <li><a href="{{ route('services') }}" style="color:rgba(255,255,255,0.5);text-decoration:none;"
                                    onmouseover="this.style.color='var(--gold)'"
                                    onmouseout="this.style.color='rgba(255,255,255,0.5)'">Services</a></li>
                            <li style="margin:0 4px;">/</li>
                            <li style="color:var(--gold);">{{ Str::limit($service->title, 30) }}</li>
                        </ol>
                    </nav>

                    <div
                        style="display:inline-flex;align-items:center;gap:8px;background:rgba(201,168,76,0.12);border:1px solid rgba(201,168,76,0.25);border-radius:50px;padding:6px 16px;margin-bottom:16px;">
                        <i class="{{ $service->icon ?? 'fas fa-file-alt' }}" style="color:var(--gold);font-size:12px;"></i>
                        <span
                            style="color:var(--gold);font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:1px;">Our
                            Services</span>
                    </div>

                    <h1
                        style="font-family:'Playfair Display',serif;color:#fff;font-size:clamp(28px,5vw,46px);font-weight:700;line-height:1.2;margin-bottom:16px;">
                        {{ $service->title }}
                    </h1>

                    @if ($service->short_description)
                        <p
                            style="color:rgba(255,255,255,0.72);font-size:15px;line-height:1.8;max-width:520px;margin-bottom:28px;">
                            {{ $service->short_description }}
                        </p>
                    @endif

                    <div class="d-flex gap-3 flex-wrap">
                        <a href="#enquire"
                            style="background:var(--gold);color:var(--primary);font-weight:700;font-size:14px;padding:13px 28px;border-radius:50px;text-decoration:none;transition:all 0.2s;display:inline-flex;align-items:center;gap:8px;"
                            onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 8px 24px rgba(201,168,76,0.35)'"
                            onmouseout="this.style.transform='';this.style.boxShadow=''">
                            <i class="fas fa-paper-plane"></i> Enquire Now
                        </a>
                        <a href="tel:+919354234462"
                            style="background:rgba(255,255,255,0.08);color:#fff;font-weight:600;font-size:14px;padding:13px 24px;border-radius:50px;text-decoration:none;border:1.5px solid rgba(255,255,255,0.2);transition:all 0.2s;display:inline-flex;align-items:center;gap:8px;"
                            onmouseover="this.style.background='rgba(255,255,255,0.15)'"
                            onmouseout="this.style.background='rgba(255,255,255,0.08)'">
                            <i class="fas fa-phone"></i> Call Us
                        </a>
                    </div>

                    <!-- Trust badges -->
                    <div style="display:flex;gap:20px;margin-top:28px;flex-wrap:wrap;">
                        @foreach (['Govt. Approved', '100% Genuine', 'Fast Processing'] as $b)
                            <div style="display:flex;align-items:center;gap:6px;">
                                <i class="fas fa-check-circle" style="color:var(--gold);font-size:12px;"></i>
                                <span
                                    style="font-size:12.5px;color:rgba(255,255,255,0.65);font-weight:500;">{{ $b }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Right: Banner Image -->
                <div class="col-lg-6 d-none d-lg-block" data-aos="fade-left" data-aos-delay="100">
                    @if ($service->banner_image)
                        <div style="position:relative;">
                            <img src="{{ $service->banner_image_url }}" alt="{{ $service->title }}"
                                style="width:100%;border-radius:20px;box-shadow:0 24px 60px rgba(0,0,0,0.35);object-fit:cover;max-height:380px;"
                                onerror="this.parentElement.innerHTML = `
                            <div style='width:100%;height:300px;background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.1);display:flex;align-items:center;justify-content:center;'>
                                <i class='{{ $service->icon ?? 'fas fa-file-alt' }}' style='font-size:64px;color:var(--gold);opacity:0.3;'></i>
                            </div>
                        `">
                        </div>
                    @else
                        <div
                            style="width:100%;height:300px;background:rgba(255,255,255,0.04);border-radius:20px;border:1px dashed rgba(255,255,255,0.12);display:flex;align-items:center;justify-content:center;">
                            <div style="text-align:center;">
                                <i class="{{ $service->icon ?? 'fas fa-file-alt' }}"
                                    style="font-size:64px;color:var(--gold);opacity:0.4;display:block;margin-bottom:16px;"></i>
                                <div style="font-size:14px;color:rgba(255,255,255,0.4);">{{ $service->title }}</div>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <!-- ===== MAIN CONTENT AREA ===== -->
    <section style="padding:80px 0;background:#f8fafc;">
        <div class="container">
            <div class="row g-5">

                <!-- ===== LEFT COLUMN ===== -->
                <div class="col-lg-8" data-aos="fade-right">

                    <!-- Main Image (above content) -->
                    @if ($service->main_image)
                        <div style="margin-bottom:32px;">
                            <img src="{{ $service->main_image_url }}" alt="{{ $service->title }}"
                                style="width:100%;border-radius:16px;box-shadow:0 8px 32px rgba(15,32,68,0.1);object-fit:cover;max-height:420px;"
                                onerror="this.style.display='none'">
                        </div>
                    @endif

                    <!-- Long Description Content -->
                    <div class="service-content"
                        style="background:#fff;border-radius:16px;padding:36px;box-shadow:0 2px 20px rgba(15,32,68,0.06);border:1px solid #edf1f8;margin-bottom:32px;font-size:15.5px;line-height:1.9;color:#3d4a5c;word-wrap:break-word;overflow-wrap:break-word;">
                        @if ($service->long_description)
                            {!! $service->long_description !!}
                        @else
                            <p>{{ $service->short_description }}</p>
                            <p>For more information about our {{ $service->title }} services, please contact our team.</p>
                        @endif
                    </div>
                    @if ($service->steps_image || ($service->steps && count($service->steps) > 0))
                        <div class="service-steps"
                            style="background:#fff;border-radius:16px;padding:32px;box-shadow:0 2px 20px rgba(15,32,68,0.06);border:1px solid #edf1f8;margin-bottom:32px;">
                            <h3
                                style="font-family:'Playfair Display',serif;font-size:22px;font-weight:700;color:var(--primary);margin-bottom:20px;">
                                Work Steps</h3>

                            @if ($service->steps_image)
                                <div style="margin-bottom:18px;">
                                    <img src="{{ $service->steps_image_url }}" alt="Work Steps"
                                        style="width:100%;height:auto;border-radius:12px;object-fit:cover;display:block;"
                                        onerror="this.style.display='none'" />
                                </div>
                            @endif

                            @if ($service->steps && count($service->steps) > 0)
                                <div style="margin-top:32px;">
                                    @foreach ($service->steps as $index => $step)
                                        <div class="row align-items-start g-4 mb-5"
                                            style="border-bottom:1px solid #edf1f8;padding-bottom:32px;">
                                            <div class="col-lg-6">
                                                <div style="display:flex;align-items:center;margin-bottom:12px;">
                                                    <div
                                                        style="width:36px;height:36px;border-radius:50%;background:var(--gold);color:var(--primary);font-weight:700;font-size:16px;display:flex;align-items:center;justify-content:center;margin-right:12px;">
                                                        {{ $loop->iteration }}
                                                    </div>
                                                    <h4
                                                        style="margin:0;color:var(--primary);font-weight:700;font-size:17px;">
                                                        {{ $step['heading'] ?? 'Step ' . $loop->iteration }}
                                                    </h4>
                                                </div>
                                                @if ($step['description'] ?? null)
                                                    <div
                                                        style="font-size:15px;line-height:1.8;color:#3d4a5c;word-wrap:break-word;overflow-wrap:break-word;">
                                                        {!! $step['description'] !!}
                                                    </div>
                                                @endif
                                            </div>
                                            @if ($step['image'] ?? null)
                                                <div class="col-lg-6 d-flex justify-content-end">
                                                    <img src="{{ asset('storage/' . $step['image']) }}"
                                                        alt="{{ $step['heading'] ?? 'Step Image' }}"
                                                        style="width:100%;max-width:350px;height:auto;border-radius:12px;object-fit:cover;box-shadow:0 4px 20px rgba(15,32,68,0.1);"
                                                        onerror="this.parentElement.innerHTML = '&nbsp;';" />
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endif

                    <!-- Why Choose Us -->
                    <div
                        style="background:#fff;border-radius:16px;padding:32px;box-shadow:0 2px 20px rgba(15,32,68,0.06);border:1px solid #edf1f8;margin-bottom:32px;">
                        <h3
                            style="font-family:'Playfair Display',serif;font-size:22px;font-weight:700;color:var(--primary);margin-bottom:20px;">
                            <span style="border-bottom:3px solid var(--gold);padding-bottom:4px;">Why Choose S K Document
                                Centre?</span>
                        </h3>
                        <div class="row g-3">
                            @foreach (['100% Authentic Attestation', 'Pan India Service', 'Fast Turnaround Time', 'Transparent Pricing', '11+ Years Experience', 'Dedicated Support'] as $point)
                                <div class="col-sm-6">
                                    <div
                                        style="display:flex;align-items:center;gap:10px;padding:12px;border-radius:10px;background:#f8fafc;">
                                        <div
                                            style="width:32px;height:32px;background:rgba(201,168,76,0.1);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                            <i class="fas fa-check" style="color:var(--gold);font-size:12px;"></i>
                                        </div>
                                        <span
                                            style="font-size:13.5px;font-weight:600;color:var(--primary);">{{ $point }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- ===== FAQ Section ===== -->
                    @if (isset($faqs) && $faqs->isNotEmpty())
                        <div style="background:#fff;border-radius:16px;padding:32px;box-shadow:0 2px 20px rgba(15,32,68,0.06);border:1px solid #edf1f8;"
                            id="faqs">
                            <h3
                                style="font-family:'Playfair Display',serif;font-size:22px;font-weight:700;color:var(--primary);margin-bottom:24px;">
                                <span style="border-bottom:3px solid var(--gold);padding-bottom:4px;">Frequently Asked
                                    Questions</span>
                            </h3>
                            <div class="accordion" id="faqAccordion">
                                @foreach ($faqs as $faq)
                                    <div class="accordion-item"
                                        style="border:1.5px solid #edf1f8;border-radius:12px;margin-bottom:10px;overflow:hidden;">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#faq{{ $faq->id }}"
                                                style="font-size:14.5px;font-weight:600;color:var(--primary);background:{{ $loop->first ? 'rgba(201,168,76,0.06)' : '#fff' }};border:none;padding:18px 20px;">
                                                <i class="fas fa-question-circle me-2"
                                                    style="color:var(--gold);font-size:13px;"></i>
                                                {{ $faq->question }}
                                            </button>
                                        </h2>
                                        <div id="faq{{ $faq->id }}"
                                            class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                            data-bs-parent="#faqAccordion">
                                            <div class="accordion-body"
                                                style="font-size:14px;color:#637082;line-height:1.8;padding:16px 20px;border-top:1px solid #edf1f8;">
                                                {!! $faq->answer !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>

                <!-- ===== RIGHT SIDEBAR ===== -->
                <div class="col-lg-4">

                    <!-- Enquire Now Form -->
                    <div id="enquire"
                        style="background:var(--primary);border-radius:18px;padding:28px;margin-bottom:24px;position:sticky;top:80px;"
                        data-aos="fade-left">
                        <h5 style="color:#fff;font-weight:700;font-size:17px;margin-bottom:4px;">
                            <i class="fas fa-paper-plane me-2" style="color:var(--gold);"></i> Enquire Now
                        </h5>
                        <p style="color:rgba(255,255,255,0.55);font-size:12.5px;margin-bottom:20px;">
                            Free consultation for {{ $service->title }}
                        </p>

                        @if (session('enquiry_success'))
                            <div
                                style="background:rgba(34,197,94,0.15);border:1px solid rgba(34,197,94,0.3);color:#6bffa1;border-radius:10px;padding:12px 16px;font-size:13px;margin-bottom:16px;">
                                <i class="fas fa-check-circle me-2"></i> {{ session('enquiry_success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('services.enquire', $service->slug) }}">
                            @csrf
                            @foreach ([['name', 'text', 'Full Name', 'Your full name', 'required'], ['email', 'email', 'Email Address', 'your@email.com', 'required'], ['phone', 'tel', 'Phone Number', '+91 XXXXX XXXXX', 'required']] as $field)
                                <div class="mb-3">
                                    <label
                                        style="font-size:12px;font-weight:600;color:rgba(255,255,255,0.65);margin-bottom:5px;display:block;">
                                        {{ $field[2] }} <span style="color:#ff8080;">*</span>
                                    </label>
                                    <input type="{{ $field[1] }}" name="{{ $field[0] }}"
                                        class="form-control @error($field[0]) is-invalid @enderror"
                                        value="{{ old($field[0]) }}" placeholder="{{ $field[3] }}"
                                        {{ $field[4] }}
                                        style="background:rgba(255,255,255,0.08);border:1.5px solid rgba(255,255,255,0.15);color:#fff;border-radius:9px;padding:11px 14px;font-size:13.5px;">
                                    @error($field[0])
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach
                            <div class="mb-3">
                                <label
                                    style="font-size:12px;font-weight:600;color:rgba(255,255,255,0.65);margin-bottom:5px;display:block;">
                                    Address <span style="color:#ff8080;">*</span>
                                </label>
                                <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="2"
                                    placeholder="Your city / full address" required
                                    style="background:rgba(255,255,255,0.08);border:1.5px solid rgba(255,255,255,0.15);color:#fff;border-radius:9px;padding:11px 14px;font-size:13.5px;resize:none;">{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label
                                    style="font-size:12px;font-weight:600;color:rgba(255,255,255,0.65);margin-bottom:5px;display:block;">
                                    Message <span style="color:rgba(255,255,255,0.35);font-weight:400;">(optional)</span>
                                </label>
                                <textarea name="message" rows="2" placeholder="Any specific requirements..."
                                    style="background:rgba(255,255,255,0.08);border:1.5px solid rgba(255,255,255,0.15);color:#fff;border-radius:9px;padding:11px 14px;font-size:13.5px;resize:none;width:100%;"
                                    class="form-control">{{ old('message') }}</textarea>
                            </div>
                            <button type="submit"
                                style="width:100%;background:var(--gold);border:none;color:var(--primary);font-weight:800;font-size:15px;padding:14px;border-radius:10px;cursor:pointer;transition:all 0.2s;"
                                onmouseover="this.style.transform='translateY(-1px)';this.style.boxShadow='0 6px 20px rgba(201,168,76,0.4)'"
                                onmouseout="this.style.transform='';this.style.boxShadow=''">
                                <i class="fas fa-paper-plane me-2"></i> Submit Enquiry
                            </button>
                            <p
                                style="font-size:11px;color:rgba(255,255,255,0.4);text-align:center;margin-top:10px;margin-bottom:0;">
                                <i class="fas fa-lock me-1"></i> Your information is safe with us.
                            </p>
                        </form>
                    </div>

                    <!-- 5 Latest Services List -->
                    @if (isset($latestServices) && $latestServices->isNotEmpty())
                        <div
                            style="background:#fff;border-radius:16px;padding:24px;box-shadow:0 2px 16px rgba(15,32,68,0.06);border:1px solid #edf1f8;margin-bottom:24px;">
                            <h6
                                style="font-size:13px;font-weight:700;color:var(--primary);margin-bottom:16px;text-transform:uppercase;letter-spacing:0.5px;">
                                <i class="fas fa-star me-2" style="color:var(--gold);"></i> Our Services
                            </h6>
                            @foreach ($latestServices as $svc)
                                <a href="{{ route('services.show', $svc->slug) }}"
                                    style="display:flex;align-items:center;gap:12px;padding:10px 0;border-bottom:1px solid #f0f3f8;text-decoration:none;transition:all 0.2s;{{ $svc->id === $service->id ? 'opacity:0.6;pointer-events:none;' : '' }}"
                                    onmouseover="this.style.paddingLeft='6px'" onmouseout="this.style.paddingLeft='0'">
                                    <div
                                        style="width:38px;height:38px;background:{{ $svc->id === $service->id ? 'var(--primary)' : 'rgba(15,32,68,0.06)' }};border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                        <i class="{{ $svc->icon ?? 'fas fa-file-alt' }}"
                                            style="color:{{ $svc->id === $service->id ? 'var(--gold)' : 'var(--primary)' }};font-size:14px;"></i>
                                    </div>
                                    <span
                                        style="font-size:13px;font-weight:600;color:var(--primary);line-height:1.3;flex:1;">{{ $svc->title }}</span>
                                    @if ($svc->id !== $service->id)
                                        <i class="fas fa-chevron-right"
                                            style="color:var(--gold);font-size:10px;flex-shrink:0;"></i>
                                    @endif
                                </a>
                            @endforeach
                            <a href="{{ route('services') }}"
                                style="display:block;text-align:center;color:var(--gold);font-size:12.5px;font-weight:700;margin-top:14px;text-decoration:none;">
                                View All Services →
                            </a>
                        </div>
                    @endif

                    <!-- Quick Contact -->
                    <div style="background:#f8fafc;border-radius:14px;padding:20px;border:1px solid #edf1f8;">
                        <h6 style="font-size:13px;font-weight:700;color:var(--primary);margin-bottom:14px;">
                            <i class="fas fa-headset me-2" style="color:var(--gold);"></i> Need Help?
                        </h6>
                        <a href="tel:+919354234462"
                            style="display:flex;align-items:center;gap:10px;text-decoration:none;margin-bottom:10px;">
                            <i class="fas fa-phone" style="color:var(--primary);font-size:14px;"></i>
                            <span style="font-size:13.5px;font-weight:600;color:var(--primary);">+91-9354234462</span>
                        </a>
                        <a href="https://wa.me/919354234462" target="_blank"
                            style="display:flex;align-items:center;gap:10px;text-decoration:none;">
                            <i class="fab fa-whatsapp" style="color:#25D366;font-size:16px;"></i>
                            <span style="font-size:13.5px;font-weight:600;color:var(--primary);">WhatsApp Us</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <style>
        .service-content h1,
        .service-content h2,
        .service-content h3 {
            color: var(--primary);
            font-weight: 700;
            margin-top: 28px;
            margin-bottom: 14px;
        }

        .service-content h2 {
            font-size: 22px;
        }

        .service-content h3 {
            font-size: 18px;
        }

        .service-content ul,
        .service-content ol {
            padding-left: 22px;
            margin-bottom: 18px;
        }

        .service-content ul li,
        .service-content ol li {
            margin-bottom: 8px;
        }

        .service-content table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .service-content table th {
            background: var(--primary);
            color: #fff;
            padding: 12px 16px;
            text-align: left;
            font-size: 14px;
        }

        .service-content table td {
            padding: 10px 16px;
            border-bottom: 1px solid #edf1f8;
            font-size: 14px;
        }

        .service-content blockquote {
            border-left: 4px solid var(--gold);
            padding: 14px 20px;
            background: #f8fafc;
            border-radius: 0 8px 8px 0;
            margin: 20px 0;
            color: #637082;
            font-style: italic;
        }

        .service-content img {
            max-width: 100%;
            border-radius: 8px;
            margin: 10px 0;
        }

        #enquire input::placeholder,
        #enquire textarea::placeholder {
            color: rgba(255, 255, 255, 0.35);
        }

        .accordion-button:not(.collapsed) {
            color: var(--primary);
            background: rgba(201, 168, 76, 0.06);
        }

        .accordion-button:focus {
            box-shadow: none;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.location.hash === '#enquire') {
                var el = document.getElementById('enquire');
                if (el) setTimeout(() => el.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                }), 300);
            }
            @if (session('enquiry_success'))
                var el = document.getElementById('enquire');
                if (el) el.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            @endif
        });
    </script>
@endpush
