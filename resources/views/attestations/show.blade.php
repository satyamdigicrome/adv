@extends('layouts.app')

@section('meta_title', ($attestation->meta_title ?: $attestation->title) . ' | S K Document Centre')
@section('meta_description', $attestation->meta_description ?: $attestation->short_description)
@section('meta_keywords', $attestation->meta_keywords)
@section('canonical', route('attestations.show', $attestation->slug))

@section('og_title', $attestation->meta_title ?: $attestation->title)
@section('og_description', $attestation->meta_description ?: $attestation->short_description)
@section('og_image', $attestation->main_image_url)

@section('content')

<!-- ===== HERO BANNER ===== -->
<div style="position:relative;min-height:520px;display:flex;align-items:center;overflow:hidden;background:linear-gradient(135deg,#0f2044 0%,#1a3460 100%);">

    <!-- Background banner image with overlay -->
    @if($attestation->banner_image)
    <div style="position:absolute;inset:0;background-image:url('{{ asset('storage/'.$attestation->banner_image) }}');background-size:cover;background-position:center;opacity:0.2;"></div>
    @endif

    <!-- Decorative elements -->
    <div style="position:absolute;top:-100px;right:-100px;width:500px;height:500px;border-radius:50%;background:rgba(201,168,76,0.06);pointer-events:none;"></div>
    <div style="position:absolute;bottom:-60px;left:30%;width:200px;height:200px;border-radius:50%;background:rgba(201,168,76,0.04);pointer-events:none;"></div>

    <div class="container position-relative" style="padding:80px 12px;">
        <div class="row align-items-center g-5">

            <!-- Left: Content -->
            <div class="col-lg-7" data-aos="fade-right">
                <!-- Breadcrumb -->
                <nav style="margin-bottom:20px;">
                    <ol style="list-style:none;padding:0;margin:0;display:flex;flex-wrap:wrap;gap:8px;font-size:12.5px;color:rgba(255,255,255,0.5);">
                        <li><a href="{{ url('/') }}" style="color:rgba(255,255,255,0.5);text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--gold)'" onmouseout="this.style.color='rgba(255,255,255,0.5)'">Home</a></li>
                        <li style="margin:0 4px;">/</li>
                        <li><a href="{{ route('attestations') }}" style="color:rgba(255,255,255,0.5);text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--gold)'" onmouseout="this.style.color='rgba(255,255,255,0.5)'">Attestations</a></li>
                        <li style="margin:0 4px;">/</li>
                        <li style="color:var(--gold);">{{ Str::limit($attestation->title, 30) }}</li>
                    </ol>
                </nav>

                @if($attestation->country)
                <div style="display:inline-flex;align-items:center;gap:8px;background:rgba(201,168,76,0.12);border:1px solid rgba(201,168,76,0.25);border-radius:50px;padding:6px 16px;margin-bottom:16px;">
                    <i class="fas fa-map-marker-alt" style="color:var(--gold);font-size:11px;"></i>
                    <span style="color:var(--gold);font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:1px;">{{ $attestation->country }}</span>
                </div>
                @endif

                <h1 style="font-family:'Playfair Display',serif;color:#fff;font-size:clamp(28px,5vw,48px);font-weight:700;line-height:1.2;margin-bottom:18px;">
                    {{ $attestation->title }}
                </h1>

                @if($attestation->short_description)
                <p style="color:rgba(255,255,255,0.72);font-size:15.5px;line-height:1.8;max-width:560px;margin-bottom:28px;">
                    {{ $attestation->short_description }}
                </p>
                @endif

                <div class="d-flex gap-3 flex-wrap">
                    <a href="#apply"
                       style="background:var(--gold);color:var(--primary);font-weight:700;font-size:14.5px;padding:14px 32px;border-radius:50px;text-decoration:none;transition:all 0.2s;display:inline-flex;align-items:center;gap:8px;"
                       onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 8px 24px rgba(201,168,76,0.35)'"
                       onmouseout="this.style.transform='';this.style.boxShadow=''">
                        <i class="fas fa-file-signature"></i> Apply Now
                    </a>
                    <a href="#enquire"
                       style="background:rgba(255,255,255,0.08);color:#fff;font-weight:600;font-size:14px;padding:14px 28px;border-radius:50px;text-decoration:none;border:1.5px solid rgba(255,255,255,0.2);transition:all 0.2s;display:inline-flex;align-items:center;gap:8px;"
                       onmouseover="this.style.background='rgba(255,255,255,0.15)'"
                       onmouseout="this.style.background='rgba(255,255,255,0.08)'">
                        <i class="fas fa-comments"></i> Quick Enquiry
                    </a>
                </div>

                <!-- Trust Badges -->
                <div style="display:flex;gap:24px;margin-top:32px;flex-wrap:wrap;">
                    @foreach(['Govt. Approved','100% Genuine','Fast Processing','Pan India'] as $badge)
                    <div style="display:flex;align-items:center;gap:6px;">
                        <i class="fas fa-shield-alt" style="color:var(--gold);font-size:12px;"></i>
                        <span style="font-size:12px;color:rgba(255,255,255,0.65);font-weight:500;">{{ $badge }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Right: Main Image -->
            <div class="col-lg-5 d-none d-lg-block" data-aos="fade-left" data-aos-delay="100">
                @if($attestation->main_image)
                <div style="position:relative;">
                    <img src="{{ asset('storage/'.$attestation->main_image) }}"
                         alt="{{ $attestation->title }}"
                         style="width:100%;border-radius:20px;box-shadow:0 20px 60px rgba(0,0,0,0.3);object-fit:cover;max-height:360px;"
                         onerror="this.parentElement.style.display='none'">
                    <!-- Floating badge -->
                    <div style="position:absolute;bottom:-16px;left:-16px;background:var(--gold);color:var(--primary);border-radius:14px;padding:14px 20px;box-shadow:0 8px 24px rgba(201,168,76,0.4);">
                        <div style="font-size:22px;font-weight:800;font-family:'Playfair Display',serif;line-height:1;">15+</div>
                        <div style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;">Years Exp.</div>
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

            <!-- ===== LEFT COLUMN: Content ===== -->
            <div class="col-lg-8" data-aos="fade-right">

                <!-- Long Description Content -->
                @if($attestation->long_description)
                <div class="att-content" style="background:#fff;border-radius:16px;padding:36px;box-shadow:0 2px 20px rgba(15,32,68,0.06);border:1px solid #edf1f8;margin-bottom:32px;">
                    <div style="font-size:15.5px;line-height:1.9;color:#3d4a5c;">
                        {!! $attestation->long_description !!}
                    </div>
                </div>
                @endif

                <!-- Why Choose Us -->
                <div style="background:#fff;border-radius:16px;padding:32px;box-shadow:0 2px 20px rgba(15,32,68,0.06);border:1px solid #edf1f8;margin-bottom:32px;">
                    <h3 style="font-family:'Playfair Display',serif;font-size:22px;font-weight:700;color:var(--primary);margin-bottom:24px;">
                        <span style="border-bottom:3px solid var(--gold);padding-bottom:4px;">Why Choose Us?</span>
                    </h3>
                    <div class="row g-3">
                        @foreach([
                            ['fas fa-check-double','100% Authentic','All attestations done through official government channels.'],
                            ['fas fa-bolt','Fast Processing','Express services available for urgent requirements.'],
                            ['fas fa-headset','Dedicated Support','Assigned relationship manager for your documents.'],
                            ['fas fa-rupee-sign','Transparent Pricing','No hidden charges. Get full quote upfront.'],
                            ['fas fa-map-marked-alt','Pan India Service','Pickup and delivery across all major cities in India.'],
                            ['fas fa-award','15+ Years Exp.','Trusted by 10,000+ clients for document attestation.']
                        ] as $f)
                        <div class="col-md-6">
                            <div style="display:flex;gap:14px;padding:16px;border-radius:12px;border:1px solid #edf1f8;background:#fafbfd;transition:all 0.2s;"
                                 onmouseover="this.style.borderColor='var(--gold)';this.style.background='rgba(201,168,76,0.04)'"
                                 onmouseout="this.style.borderColor='#edf1f8';this.style.background='#fafbfd'">
                                <div style="width:40px;height:40px;background:rgba(201,168,76,0.1);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                    <i class="{{ $f[0] }}" style="color:var(--gold);font-size:15px;"></i>
                                </div>
                                <div>
                                    <div style="font-size:13.5px;font-weight:700;color:var(--primary);margin-bottom:3px;">{{ $f[1] }}</div>
                                    <div style="font-size:12.5px;color:#637082;line-height:1.5;">{{ $f[2] }}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- ===== FAQ Section ===== -->
                @if($faqs->isNotEmpty())
                <div style="background:#fff;border-radius:16px;padding:32px;box-shadow:0 2px 20px rgba(15,32,68,0.06);border:1px solid #edf1f8;" id="faqs">
                    <h3 style="font-family:'Playfair Display',serif;font-size:22px;font-weight:700;color:var(--primary);margin-bottom:24px;">
                        <span style="border-bottom:3px solid var(--gold);padding-bottom:4px;">Frequently Asked Questions</span>
                    </h3>
                    <div class="accordion" id="faqAccordion">
                        @foreach($faqs as $faq)
                        <div class="accordion-item" style="border:1.5px solid #edf1f8;border-radius:12px;margin-bottom:10px;overflow:hidden;">
                            <h2 class="accordion-header">
                                <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#faq{{ $faq->id }}"
                                        style="font-size:14.5px;font-weight:600;color:var(--primary);background:{{ $loop->first ? 'rgba(201,168,76,0.06)' : '#fff' }};border:none;padding:18px 20px;">
                                    <i class="fas fa-question-circle me-2" style="color:var(--gold);font-size:13px;"></i>
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="faq{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body" style="font-size:14px;color:#637082;line-height:1.8;padding:16px 20px;border-top:1px solid #edf1f8;">
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

                <!-- Apply Now Form -->
                <div id="apply" style="background:var(--primary);border-radius:18px;padding:28px;margin-bottom:24px;position:sticky;top:80px;" data-aos="fade-left">
                    <div style="display:flex;align-items:center;gap:12px;margin-bottom:6px;">
                        <div style="width:40px;height:40px;background:rgba(201,168,76,0.15);border-radius:10px;display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-file-signature" style="color:var(--gold);font-size:16px;"></i>
                        </div>
                        <div>
                            <h5 style="color:#fff;font-weight:700;font-size:17px;margin:0;">Apply Now</h5>
                            <p style="color:rgba(255,255,255,0.55);font-size:12px;margin:0;">Free consultation included</p>
                        </div>
                    </div>

                    <!-- Tab Toggle -->
                    <div style="display:flex;background:rgba(255,255,255,0.07);border-radius:10px;padding:4px;margin:18px 0 20px;" id="formTabs">
                        <button onclick="switchTab('apply')" id="tab-apply"
                                style="flex:1;border:none;border-radius:8px;padding:8px;font-size:12.5px;font-weight:700;cursor:pointer;transition:all 0.2s;background:var(--gold);color:var(--primary);">
                            <i class="fas fa-file-signature me-1"></i> Apply
                        </button>
                        <button onclick="switchTab('enquire')" id="tab-enquire"
                                style="flex:1;border:none;border-radius:8px;padding:8px;font-size:12.5px;font-weight:700;cursor:pointer;transition:all 0.2s;background:transparent;color:rgba(255,255,255,0.6);">
                            <i class="fas fa-comments me-1"></i> Enquire
                        </button>
                    </div>

                    @if(session('enquiry_success'))
                    <div style="background:rgba(34,197,94,0.15);border:1px solid rgba(34,197,94,0.3);color:#6bffa1;border-radius:10px;padding:12px 16px;font-size:13px;margin-bottom:16px;">
                        <i class="fas fa-check-circle me-2"></i> {{ session('enquiry_success') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('attestations.enquire', $attestation->slug) }}" id="attestationForm">
                        @csrf
                        <input type="hidden" name="form_type" id="form_type" value="apply">

                        @foreach([
                            ['name','text','Full Name','Your full name','required'],
                            ['email','email','Email Address','your@email.com','required'],
                            ['phone','tel','Phone Number','+91 XXXXX XXXXX','required'],
                        ] as $field)
                        <div class="mb-3">
                            <label style="font-size:12px;font-weight:600;color:rgba(255,255,255,0.65);margin-bottom:5px;display:block;">
                                {{ $field[2] }} <span style="color:#ff8080;">*</span>
                            </label>
                            <input type="{{ $field[1] }}" name="{{ $field[0] }}"
                                   class="form-control @error($field[0]) is-invalid @enderror"
                                   value="{{ old($field[0]) }}"
                                   placeholder="{{ $field[3] }}" {{ $field[4] }}
                                   style="background:rgba(255,255,255,0.08);border:1.5px solid rgba(255,255,255,0.15);color:#fff;border-radius:9px;padding:11px 14px;font-size:13.5px;">
                            @error($field[0])<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        @endforeach

                        <div class="mb-3">
                            <label style="font-size:12px;font-weight:600;color:rgba(255,255,255,0.65);margin-bottom:5px;display:block;">
                                Address <span style="color:#ff8080;">*</span>
                            </label>
                            <textarea name="address" class="form-control @error('address') is-invalid @enderror"
                                      rows="2" placeholder="Your city / full address" required
                                      style="background:rgba(255,255,255,0.08);border:1.5px solid rgba(255,255,255,0.15);color:#fff;border-radius:9px;padding:11px 14px;font-size:13.5px;resize:none;">{{ old('address') }}</textarea>
                            @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-4">
                            <label style="font-size:12px;font-weight:600;color:rgba(255,255,255,0.65);margin-bottom:5px;display:block;">
                                Message <span style="color:rgba(255,255,255,0.35);font-weight:400;">(optional)</span>
                            </label>
                            <textarea name="message" rows="2" placeholder="Any specific details..."
                                      style="background:rgba(255,255,255,0.08);border:1.5px solid rgba(255,255,255,0.15);color:#fff;border-radius:9px;padding:11px 14px;font-size:13.5px;resize:none;width:100%;" class="form-control">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" id="submitBtn"
                                style="width:100%;background:var(--gold);border:none;color:var(--primary);font-weight:800;font-size:15px;padding:14px;border-radius:10px;cursor:pointer;transition:all 0.2s;letter-spacing:0.3px;"
                                onmouseover="this.style.transform='translateY(-1px)';this.style.boxShadow='0 6px 20px rgba(201,168,76,0.4)'"
                                onmouseout="this.style.transform='';this.style.boxShadow=''">
                            <i class="fas fa-paper-plane me-2"></i> <span id="btnText">Submit Application</span>
                        </button>

                        <p style="font-size:11px;color:rgba(255,255,255,0.4);text-align:center;margin-top:10px;margin-bottom:0;">
                            <i class="fas fa-lock me-1"></i> 100% confidential. No spam.
                        </p>
                    </form>
                </div>

                <!-- Quick Contact Box -->
                <div style="background:#fff;border-radius:16px;padding:20px;box-shadow:0 2px 16px rgba(15,32,68,0.06);border:1px solid #edf1f8;margin-bottom:24px;">
                    <h6 style="font-size:13px;font-weight:700;color:var(--primary);margin-bottom:16px;text-transform:uppercase;letter-spacing:0.5px;">
                        <i class="fas fa-headset me-2" style="color:var(--gold);"></i> Speak to an Expert
                    </h6>
                    <a href="tel:+919310624082" style="display:flex;align-items:center;gap:12px;padding:12px;border-radius:10px;background:#f8fafc;border:1px solid #edf1f8;text-decoration:none;margin-bottom:8px;transition:all 0.2s;"
                       onmouseover="this.style.borderColor='var(--gold)'" onmouseout="this.style.borderColor='#edf1f8'">
                        <div style="width:36px;height:36px;background:rgba(34,197,94,0.1);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-phone" style="color:#16a34a;font-size:14px;"></i>
                        </div>
                        <div>
                            <div style="font-size:12px;color:#8a99b0;">Call Us Now</div>
                            <div style="font-size:14px;font-weight:700;color:var(--primary);">+91-9310624082</div>
                        </div>
                    </a>
                    <a href="https://wa.me/919310624082?text=Hi, I need {{ urlencode($attestation->title) }} assistance."
                       target="_blank"
                       style="display:flex;align-items:center;gap:12px;padding:12px;border-radius:10px;background:#f8fafc;border:1px solid #edf1f8;text-decoration:none;transition:all 0.2s;"
                       onmouseover="this.style.borderColor='#25D366'" onmouseout="this.style.borderColor='#edf1f8'">
                        <div style="width:36px;height:36px;background:rgba(37,211,102,0.1);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                            <i class="fab fa-whatsapp" style="color:#25D366;font-size:18px;"></i>
                        </div>
                        <div>
                            <div style="font-size:12px;color:#8a99b0;">WhatsApp Us</div>
                            <div style="font-size:14px;font-weight:700;color:var(--primary);">Chat Instantly</div>
                        </div>
                    </a>
                </div>

                <!-- View All Services Button -->
                <div style="background:rgba(201,168,76,0.08);border:1.5px dashed rgba(201,168,76,0.4);border-radius:14px;padding:20px;margin-bottom:24px;text-align:center;">
                    <i class="fas fa-concierge-bell" style="font-size:28px;color:var(--gold);margin-bottom:10px;display:block;"></i>
                    <p style="font-size:13px;color:var(--primary);font-weight:600;margin-bottom:14px;">Need other document services?</p>
                    <a href="{{ route('services') }}"
                       style="display:block;background:var(--primary);color:#fff;font-weight:700;font-size:13.5px;padding:12px;border-radius:10px;text-decoration:none;transition:all 0.2s;"
                       onmouseover="this.style.background='var(--gold)';this.style.color='var(--primary)'"
                       onmouseout="this.style.background='var(--primary)';this.style.color='#fff'">
                        <i class="fas fa-arrow-right me-2"></i> View All Services
                    </a>
                </div>

                <!-- Latest Services -->
                @if($services->isNotEmpty())
                <div style="background:#fff;border-radius:16px;padding:24px;box-shadow:0 2px 16px rgba(15,32,68,0.06);border:1px solid #edf1f8;margin-bottom:24px;">
                    <h6 style="font-size:13px;font-weight:700;color:var(--primary);margin-bottom:16px;text-transform:uppercase;letter-spacing:0.5px;">
                        <i class="fas fa-star me-2" style="color:var(--gold);"></i> Our Top Services
                    </h6>
                    @foreach($services as $svc)
                    <a href="{{ route('services.show', $svc->slug) }}"
                       style="display:flex;align-items:center;gap:12px;padding:10px 0;border-bottom:1px solid #f0f3f8;text-decoration:none;transition:all 0.2s;"
                       onmouseover="this.style.paddingLeft='6px'" onmouseout="this.style.paddingLeft='0'">
                        <div style="width:36px;height:36px;background:rgba(15,32,68,0.06);border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="{{ $svc->icon ?? 'fas fa-file-alt' }}" style="color:var(--primary);font-size:13px;"></i>
                        </div>
                        <span style="font-size:13px;font-weight:600;color:var(--primary);line-height:1.3;">{{ $svc->title }}</span>
                        <i class="fas fa-chevron-right ms-auto" style="color:var(--gold);font-size:10px;flex-shrink:0;"></i>
                    </a>
                    @endforeach
                    <a href="{{ route('services') }}" style="display:block;text-align:center;color:var(--gold);font-size:12.5px;font-weight:700;margin-top:14px;text-decoration:none;">
                        View All Services →
                    </a>
                </div>
                @endif

                <!-- Related Attestations -->
                @if($related->isNotEmpty())
                <div style="background:#fff;border-radius:16px;padding:24px;box-shadow:0 2px 16px rgba(15,32,68,0.06);border:1px solid #edf1f8;">
                    <h6 style="font-size:13px;font-weight:700;color:var(--primary);margin-bottom:16px;text-transform:uppercase;letter-spacing:0.5px;">
                        <i class="fas fa-certificate me-2" style="color:var(--gold);"></i> Related Attestations
                    </h6>
                    @foreach($related as $rel)
                    <a href="{{ route('attestations.show', $rel->slug) }}"
                       style="display:flex;align-items:center;gap:12px;padding:10px 0;border-bottom:1px solid #f0f3f8;text-decoration:none;transition:all 0.2s;"
                       onmouseover="this.style.paddingLeft='6px'" onmouseout="this.style.paddingLeft='0'">
                        <div style="width:36px;height:36px;background:rgba(201,168,76,0.1);border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="{{ $rel->icon ?? 'fas fa-certificate' }}" style="color:var(--gold);font-size:13px;"></i>
                        </div>
                        <div style="flex:1;min-width:0;">
                            <span style="font-size:13px;font-weight:600;color:var(--primary);display:block;line-height:1.3;">{{ $rel->title }}</span>
                            @if($rel->country)<span style="font-size:11px;color:#8a99b0;">{{ $rel->country }}</span>@endif
                        </div>
                        <i class="fas fa-chevron-right" style="color:var(--gold);font-size:10px;flex-shrink:0;"></i>
                    </a>
                    @endforeach
                    <a href="{{ route('attestations') }}" style="display:block;text-align:center;color:var(--gold);font-size:12.5px;font-weight:700;margin-top:14px;text-decoration:none;">
                        View All Attestations →
                    </a>
                </div>
                @endif

            </div>
        </div>
    </div>
</section>

<!-- Enquiry anchor section -->
<div id="enquire"></div>

@endsection

@push('styles')
<style>
/* Rich content styles */
.att-content h1,.att-content h2,.att-content h3{color:var(--primary);font-weight:700;margin-top:28px;margin-bottom:14px;}
.att-content h2{font-size:22px;}.att-content h3{font-size:18px;}
.att-content ul,.att-content ol{padding-left:22px;margin-bottom:18px;}
.att-content ul li,.att-content ol li{margin-bottom:8px;color:#3d4a5c;}
.att-content table{width:100%;border-collapse:collapse;margin:20px 0;}
.att-content table th{background:var(--primary);color:#fff;padding:12px 16px;text-align:left;font-size:14px;}
.att-content table td{padding:10px 16px;border-bottom:1px solid #edf1f8;font-size:14px;}
.att-content table tr:hover td{background:#f8fafc;}
.att-content blockquote{border-left:4px solid var(--gold);padding:14px 20px;background:#f8fafc;border-radius:0 8px 8px 0;margin:20px 0;color:#637082;font-style:italic;}
.att-content img{max-width:100%;border-radius:8px;margin:10px 0;}
/* Placeholder color for dark form */
#attestationForm input::placeholder,#attestationForm textarea::placeholder{color:rgba(255,255,255,0.35);}
.accordion-button:not(.collapsed){color:var(--primary);background:rgba(201,168,76,0.06);}
.accordion-button:focus{box-shadow:none;}
.accordion-button::after{filter:none;}
</style>
@endpush

@push('scripts')
<script>
function switchTab(tab) {
    var btnText = document.getElementById('btnText');
    var formType = document.getElementById('form_type');
    var applyTab = document.getElementById('tab-apply');
    var enquireTab = document.getElementById('tab-enquire');

    if (tab === 'apply') {
        applyTab.style.background = 'var(--gold)';
        applyTab.style.color = 'var(--primary)';
        enquireTab.style.background = 'transparent';
        enquireTab.style.color = 'rgba(255,255,255,0.6)';
        btnText.textContent = 'Submit Application';
        formType.value = 'apply';
    } else {
        enquireTab.style.background = 'var(--gold)';
        enquireTab.style.color = 'var(--primary)';
        applyTab.style.background = 'transparent';
        applyTab.style.color = 'rgba(255,255,255,0.6)';
        btnText.textContent = 'Send Enquiry';
        formType.value = 'enquire';
    }
}

document.addEventListener('DOMContentLoaded', function () {
    @if(session('enquiry_success'))
        var form = document.getElementById('apply');
        if (form) form.scrollIntoView({ behavior: 'smooth', block: 'start' });
    @endif
    if (window.location.hash === '#apply' || window.location.hash === '#enquire') {
        var el = document.getElementById('apply');
        if (el) setTimeout(() => el.scrollIntoView({ behavior: 'smooth', block: 'start' }), 300);
    }
});
</script>
@endpush
