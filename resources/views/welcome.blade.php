@extends('layouts.app')

@section('meta_title', 'S K Document Centre | Document Attestation & Legalization Services India')
@section('meta_description',
    'S K Document Centre – India\'s trusted attestation agency. Notary, SDM, HRD, MEA, Embassy
    Attestation, Apostille & Translation. 50,000+ documents processed. Pan India service.')
@section('meta_keywords',
    'document attestation, apostille india, MEA attestation, embassy attestation, notary services,
    SDM attestation, HRD attestation, certificate legalization, translation services india, attestation services delhi')

@section('content')

    <!-- ============ HERO SECTION ============ -->
    <section class="hero-section">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7" data-aos="fade-right">
                    <span class="hero-badge">ISO 9001:2015 Certified Company</span>
                    <h1 class="hero-title">
                        SK Document<br>
                        <span>Attestation</span><br>
                        Services
                    </h1>
                    <p class="hero-subtitle">Trusted. Reliable. Pan India.</p>
                    <p class="hero-desc">
                        A leading provider of specialised document services — Notary, SDM, Apostille, MEA Attestation,
                        Embassy Legalization & Translation services, founded by <strong style="color: var(--gold);">Sushant
                            Poddar</strong>.
                    </p>
                    <div class="hero-actions">
                        <a href="{{ url('/contact') }}" class="btn-gold">
                            <i class="fas fa-file-alt me-2"></i> Get A Free Quote
                        </a>
                        <a href="{{ url('/services') }}" class="btn-outline-gold">
                            Our Services <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>

                    <div class="d-flex align-items-center gap-4 flex-wrap">
                        <div class="d-flex align-items-center gap-2">
                            <div style="color:#f5b301; font-size:14px;">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <span style="color:rgba(255,255,255,0.85); font-size:13px; font-weight:600;">4.9 / 5.0
                                Rating</span>
                        </div>
                        <div style="color:rgba(255,255,255,0.55); font-size:13px;">
                            <i class="fas fa-users me-1" style="color:var(--gold);"></i> 10,000+ Happy Clients
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-5" data-aos="fade-left" data-aos-delay="150">
                    <div class="hero-image-wrap">
                        <img src="{{ asset('images/hero.jpeg') }}"
                            alt="Document Attestation Services - S K Document Centre" class="hero-main-img"
                            onerror="this.src='https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=600&q=80'; this.onerror=null;">

                        <div class="hero-rating-badge">
                            <div>
                                <div class="stars">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                        class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                                </div>
                                <div class="rating-num">4.9</div>
                                <div class="rating-text">Google Rating</div>
                            </div>
                            <div style="color:#f5b301;">
                                <i class="fab fa-google fa-2x"></i>
                            </div>
                        </div>

                        <div class="hero-cert-badge">
                            <span>100%</span>
                            Satisfaction<br>Guaranteed
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ STATS BAR ============ -->
    <div class="stats-bar">
        <div class="container">
            <div class="row g-0 justify-content-center">
                <div class="col-6 col-md-3">
                    <div class="stat-item" data-aos="zoom-in" data-aos-delay="0">
                        <div class="stat-number counter" data-target="50000">50,000</div>
                        <div class="stat-label"><i class="fas fa-file-alt me-1"></i> Documents Processed</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item" data-aos="zoom-in" data-aos-delay="100">
                        <div class="stat-number counter" data-target="10000">10,000</div>
                        <div class="stat-label"><i class="fas fa-users me-1"></i> Happy Clients</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item" data-aos="zoom-in" data-aos-delay="200">
                        <div class="stat-number counter" data-target="100">100</div>
                        <div class="stat-label"><i class="fas fa-globe me-1"></i> Countries Covered</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item" data-aos="zoom-in" data-aos-delay="300">
                        <div class="stat-number counter" data-target="15">15</div>
                        <div class="stat-label"><i class="fas fa-trophy me-1"></i> Years Experience</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ ABOUT / WELCOME SECTION ============ -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="about-img-wrap">
                        <img src="{{ asset('images/afterhero.jpeg') }}" alt="S K Document Centre Team"
                            class="about-main-img"
                            onerror="this.src='https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=600&q=80'; this.onerror=null;">
                        <div class="about-exp-badge">
                            <div class="exp-num">15+</div>
                            <div class="exp-label">Years of<br>Excellence</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <span class="section-tag">Welcome to</span>
                    <h2 class="section-title">S K <span>Document Centre</span></h2>
                    <div class="section-divider left"></div>
                    <p style="color: var(--text-muted); font-size: 15px; line-height: 1.85; margin-bottom: 16px;">
                        S K Document Centre is a leading provider of specialised document services, dedicated to ensuring
                        that your legal and administrative needs are met with precision and efficiency.
                    </p>
                    <p style="color: var(--text-muted); font-size: 15px; line-height: 1.85; margin-bottom: 28px;">
                        Founded by <strong style="color:var(--primary);">Sushant Poddar</strong>, our company has
                        established itself as a trusted name, offering a wide range of services including Notary
                        Attestation, SDM Attestation, Apostille, MEA Attestation, Embassy Legalization & Translation
                        services with unmatched credibility.
                    </p>

                    <div class="row g-3 mb-3">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-check-circle text-success"></i>
                                <span style="font-size:14px; font-weight:500;">Educational Documents</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-check-circle text-success"></i>
                                <span style="font-size:14px; font-weight:500;">Non-Education Documents</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-check-circle text-success"></i>
                                <span style="font-size:14px; font-weight:500;">Commercial Documents</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-check-circle text-success"></i>
                                <span style="font-size:14px; font-weight:500;">Personal Documents</span>
                            </div>
                        </div>
                    </div>

                    <div class="about-features">
                        <div class="about-feature-item">
                            <div class="icon"><i class="fas fa-shield-alt"></i></div>
                            <div>
                                <h6>100% Authentic</h6>
                                <p>Government authorized and verified attestation process</p>
                            </div>
                        </div>
                        <div class="about-feature-item">
                            <div class="icon"><i class="fas fa-map-marked-alt"></i></div>
                            <div>
                                <h6>Pan India Service</h6>
                                <p>We serve clients across all major cities in India</p>
                            </div>
                        </div>
                        <div class="about-feature-item">
                            <div class="icon"><i class="fas fa-award"></i></div>
                            <div>
                                <h6>15+ Years Experience</h6>
                                <p>Over a decade of specialized document expertise</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ url('/about') }}" class="btn-primary-dark">
                            Read More <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ SERVICES SECTION (Dynamic) ============ -->
    <section class="services-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-tag">What We Offer</span>
                <h2 class="section-title">Our Professional <span>Services</span></h2>
                <div class="section-divider"></div>
                <p class="section-subtitle">
                    We proudly deliver 100% authentic solutions in Education, Non-Education, and Commercial Document
                    Attestation or MEA Apostille.
                </p>
            </div>

            @if (isset($latestServices) && $latestServices->isNotEmpty())
                <div class="row g-4">
                    @foreach ($latestServices as $index => $service)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 80 }}">
                            <div class="service-card h-100">
                                @php
                                    $serviceImgs = [
                                        'notary-attestation' =>
                                            'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=500&q=80',
                                        'hrd-attestation' =>
                                            'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=500&q=80',
                                        'mea-attestation' =>
                                            'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=500&q=80',
                                        'mea-apostille' =>
                                            'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=500&q=80',
                                        'embassy-attestation' =>
                                            'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=500&q=80',
                                        'translation-services' =>
                                            'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=500&q=80',
                                    ];
                                    $imgUrl = $service->main_image
                                        ? $service->main_image_url
                                        : $serviceImgs[$service->slug] ??
                                            'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=500&q=80';
                                @endphp
                                <div
                                    style="position:relative;height:180px;border-radius:12px;overflow:hidden;margin-bottom:20px;">
                                    <img src="{{ $imgUrl }}" alt="{{ $service->title }}"
                                        style="width:100%;height:100%;object-fit:cover;"
                                        onerror="this.src='https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=500&q=80'">
                                    <div
                                        style="position:absolute;inset:0;background:linear-gradient(transparent 40%,rgba(15,32,68,0.6));">
                                    </div>
                                    <div
                                        style="position:absolute;bottom:12px;left:12px;width:36px;height:36px;background:var(--gold);border-radius:8px;display:flex;align-items:center;justify-content:center;">
                                        <i class="{{ $service->icon ?? 'fas fa-file-alt' }}"
                                            style="color:var(--primary);font-size:15px;"></i>
                                    </div>
                                </div>
                                <h5>{{ $service->title }}</h5>
                                @if ($service->short_description)
                                    <p>{{ Str::limit($service->short_description, 100) }}</p>
                                @endif
                                <div class="d-flex gap-3 flex-wrap mt-auto">
                                    <a href="{{ route('services.show', $service->slug) }}" class="read-more">
                                        Learn More <i class="fas fa-chevron-right"></i>
                                    </a>
                                    <a href="{{ route('services.show', $service->slug) }}#enquire" class="read-more"
                                        style="color:var(--primary);">
                                        <i class="fas fa-paper-plane me-1"></i> Enquire Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                {{-- Fallback static cards when no services in DB yet --}}
                <div class="row g-4">
                    @php
                        $staticServices = [
                            [
                                'icon' => 'fas fa-stamp',
                                'title' => 'Notary Attestation',
                                'desc' => 'Official notarization services for all types of legal documents.',
                                'slug' => 'notary-attestation',
                            ],
                            [
                                'icon' => 'fas fa-certificate',
                                'title' => 'MEA Apostille',
                                'desc' => 'Apostille certification for Hague Convention countries worldwide.',
                                'slug' => 'mea-apostille',
                            ],
                            [
                                'icon' => 'fas fa-building',
                                'title' => 'Embassy Attestation',
                                'desc' => 'Embassy & Consulate attestation for all foreign country documents.',
                                'slug' => 'embassy-attestation',
                            ],
                        ];
                    @endphp
                    @foreach ($staticServices as $index => $svc)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 80 }}">
                            <div class="service-card">
                                <div class="service-icon"><i class="{{ $svc['icon'] }}"></i></div>
                                <h5>{{ $svc['title'] }}</h5>
                                <p>{{ $svc['desc'] }}</p>
                                <a href="{{ route('services') }}" class="read-more">Learn More <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="text-center mt-5" data-aos="fade-up">
                <a href="{{ route('services') }}" class="btn-primary-dark">
                    View All Services <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- ============ ATTESTATION SERVICES SECTION (Dynamic) ============ -->
    <section style="padding:80px 0; background:linear-gradient(180deg,#f8fafc 0%,#fff 100%);">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-tag">Country-wise Attestation</span>
                <h2 class="section-title">Attestation <span style="color:var(--gold);">Services</span></h2>
                <p style="color:var(--text-muted); font-size:15px; max-width:560px; margin:0 auto;">
                    We provide official attestation for all countries — UAE, Saudi Arabia, Qatar, Oman and 50+ more. Fast,
                    genuine and affordable.
                </p>
            </div>

            @if ($latestAttestations->isEmpty())
                {{-- Fallback static cards --}}
                <div class="row g-4">
                    @foreach ([['fas fa-flag', 'UAE Embassy Attestation', 'Official attestation for UAE visa and employment documents.', 'ae'], ['fas fa-flag', 'Saudi Arabia Attestation', 'Complete attestation service for Saudi Embassy requirements.', 'sa'], ['fas fa-certificate', 'MEA Apostille', 'Ministry of External Affairs Apostille for Hague Convention countries.', 'in']] as $i => $item)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                            <div style="background:#fff;border-radius:18px;padding:32px 28px;border:1.5px solid #edf1f8;box-shadow:0 4px 20px rgba(15,32,68,0.05);height:100%;text-align:center;transition:all 0.3s;"
                                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 16px 40px rgba(15,32,68,0.1)';this.style.borderColor='var(--gold)'"
                                onmouseout="this.style.transform='';this.style.boxShadow='0 4px 20px rgba(15,32,68,0.05)';this.style.borderColor='#edf1f8'">
                                <div
                                    style="width:64px;height:64px;background:linear-gradient(135deg,var(--primary),#1a3460);border-radius:16px;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;">
                                    <i class="{{ $item[0] }}" style="color:var(--gold);font-size:24px;"></i>
                                </div>
                                <h4 style="font-size:17px;font-weight:700;color:var(--primary);margin-bottom:12px;">
                                    {{ $item[1] }}</h4>
                                <p style="font-size:13.5px;color:#637082;line-height:1.7;margin-bottom:20px;">
                                    {{ $item[2] }}</p>
                                <a href="{{ route('attestations') }}"
                                    style="display:inline-flex;align-items:center;gap:6px;background:var(--primary);color:#fff;padding:10px 24px;border-radius:50px;font-size:13px;font-weight:700;text-decoration:none;transition:all 0.2s;"
                                    onmouseover="this.style.background='var(--gold)';this.style.color='var(--primary)'"
                                    onmouseout="this.style.background='var(--primary)';this.style.color='#fff'">
                                    Apply Now <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row g-4">
                    @foreach ($latestAttestations as $att)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <div style="background:#fff;border-radius:18px;overflow:hidden;border:1.5px solid #edf1f8;box-shadow:0 4px 20px rgba(15,32,68,0.05);height:100%;display:flex;flex-direction:column;transition:all 0.3s;"
                                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 16px 40px rgba(15,32,68,0.1)';this.style.borderColor='rgba(201,168,76,0.4)'"
                                onmouseout="this.style.transform='';this.style.boxShadow='0 4px 20px rgba(15,32,68,0.05)';this.style.borderColor='#edf1f8'">

                                <!-- Image header -->
                                <div style="height:180px;position:relative;overflow:hidden;">
                                    @if ($att->main_image)
                                        <img src="{{ asset('storage/' . $att->main_image) }}" alt="{{ $att->title }}"
                                            style="width:100%;height:100%;object-fit:cover;"
                                            onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                                        <div
                                            style="display:none;height:100%;background:linear-gradient(135deg,#0f2044,#1a3460);align-items:center;justify-content:center;">
                                            <i class="{{ $att->icon ?? 'fas fa-certificate' }}"
                                                style="font-size:48px;color:var(--gold);opacity:0.4;"></i>
                                        </div>
                                    @else
                                        <div
                                            style="height:100%;background:linear-gradient(135deg,#0f2044,#1a3460);display:flex;align-items:center;justify-content:center;">
                                            <i class="{{ $att->icon ?? 'fas fa-certificate' }}"
                                                style="font-size:48px;color:var(--gold);opacity:0.4;"></i>
                                        </div>
                                    @endif
                                    @if ($att->country)
                                        <div
                                            style="position:absolute;top:12px;right:12px;background:rgba(15,32,68,0.8);backdrop-filter:blur(8px);color:#fff;font-size:11px;font-weight:700;padding:3px 10px;border-radius:50px;border:1px solid rgba(201,168,76,0.3);">
                                            {{ $att->country }}
                                        </div>
                                    @endif
                                </div>

                                <div style="padding:24px;flex:1;display:flex;flex-direction:column;">
                                    <div style="display:flex;align-items:center;gap:10px;margin-bottom:10px;">
                                        <div
                                            style="width:36px;height:36px;background:rgba(201,168,76,0.1);border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                            <i class="{{ $att->icon ?? 'fas fa-certificate' }}"
                                                style="color:var(--gold);font-size:14px;"></i>
                                        </div>
                                        <h4
                                            style="font-size:15.5px;font-weight:700;color:var(--primary);margin:0;line-height:1.3;">
                                            {{ $att->title }}</h4>
                                    </div>
                                    @if ($att->short_description)
                                        <p
                                            style="font-size:13.5px;color:#637082;line-height:1.7;flex:1;margin-bottom:18px;">
                                            {{ Str::limit($att->short_description, 100) }}</p>
                                    @endif
                                    <a href="{{ route('attestations.show', $att->slug) }}"
                                        style="display:flex;align-items:center;justify-content:center;gap:8px;background:var(--primary);color:#fff;padding:11px;border-radius:10px;font-size:13.5px;font-weight:700;text-decoration:none;transition:all 0.2s;"
                                        onmouseover="this.style.background='var(--gold)';this.style.color='var(--primary)'"
                                        onmouseout="this.style.background='var(--primary)';this.style.color='#fff'">
                                        Apply Now <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="text-center mt-5" data-aos="fade-up">
                <a href="{{ route('attestations') }}" class="btn-primary-dark">
                    View All Attestation Services <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- ============ PROCESS SECTION ============ -->
    <section class="process-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-tag">How It Works</span>
                <h2 class="section-title">Our <span style="color:var(--gold);">Attestation</span> Process</h2>
                <div class="section-divider"></div>
                <p class="section-subtitle" style="color:rgba(255,255,255,0.65);">
                    We follow a streamlined, transparent process to ensure your documents are attested quickly and
                    accurately.
                </p>
            </div>

            <div class="row g-4 justify-content-center">
                @php
                    $steps = [
                        [
                            'num' => '01',
                            'title' => 'Submit Documents',
                            'desc' =>
                                'Send us your documents to our office or visit us. We collect and verify your documents for attestation.',
                        ],
                        [
                            'num' => '02',
                            'title' => 'Verification',
                            'desc' =>
                                'We verify and prepare your documents to ensure they meet all requirements for the attestation process.',
                        ],
                        [
                            'num' => '03',
                            'title' => 'Attestation Process',
                            'desc' =>
                                'Notary -> SDM/HRD -> MEA -> Embassy/Apostille. Each stamp is applied at the correct authority.',
                        ],
                        [
                            'num' => '04',
                            'title' => 'Delivery',
                            'desc' =>
                                'Receive your fully attested documents at your doorstep via courier or collect from our office.',
                        ],
                    ];
                @endphp

                @foreach ($steps as $index => $step)
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="process-step">
                            <div class="process-num">
                                <span>{{ $step['num'] }}</span>
                            </div>
                            <h5>{{ $step['title'] }}</h5>
                            <p>{{ $step['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                <a href="{{ url('/attestation-process') }}" class="btn-gold">
                    Start Your Attestation <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- ============ HOW IT WORKS ============ -->
    <section style="background:#fff; padding: 80px 0;">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-tag">{{ $siteSettings->how_it_works_title ?? 'How It Works' }}</span>
                <h2 class="section-title">{{ $siteSettings->how_it_works_title ?? 'Our Process' }}</h2>
                <p style="color:#7a8296; max-width:680px; margin:8px auto 0;">
                    {{ $siteSettings->how_it_works_subtitle ?? 'Follow our smooth 4-step process to get documents attested and delivered.' }}
                </p>
                <div class="section-divider"></div>
            </div>
            <div class="row g-4">
                @php
                    $workItems = $siteSettings->how_it_works_items ?? [
                        [
                            'step' => '1',
                            'title' => 'Submit Documents',
                            'desc' => 'Upload your documents through our secure portal or visit our office.',
                        ],
                        [
                            'step' => '2',
                            'title' => 'Document Verification',
                            'desc' => 'Our experts verify and prepare your documents for attestation.',
                        ],
                        [
                            'step' => '3',
                            'title' => 'Attestation Process',
                            'desc' => 'We handle notary, SDM, MEA, and embassy attestation as required.',
                        ],
                        [
                            'step' => '4',
                            'title' => 'Delivery',
                            'desc' => 'Receive your attested documents via courier or pickup.',
                        ],
                    ];
                @endphp

                @foreach ($workItems as $index => $item)
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 80 }}">
                        <div class="how-it-card p-4 text-center"
                            style="border-radius:10px; background:#f8fafc; border:1px solid #e8edf6; min-height:250px;">
                            <div class="how-it-step"
                                style="width:54px; height:54px; margin:0 auto 14px; border-radius:50%; background:linear-gradient(135deg, var(--primary), var(--primary-light)); color:#fff; display:flex; align-items:center; justify-content:center; font-size:20px; font-weight:700;">
                                {{ $item['step'] ?? $index + 1 }}</div>
                            <h5 style="font-size:16px; font-weight:700; color:var(--primary);">
                                {{ $item['title'] ?? 'Step ' . ($index + 1) }}</h5>
                            <p style="color:#7a8296; font-size:14px; margin-top:8px;">{{ $item['desc'] ?? '' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ============ WHY CHOOSE US ============ -->
    <section style="background: var(--light-bg); padding: 80px 0;">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-tag">{{ $siteSettings->why_choose_title ?? 'Why Choose Us' }}</span>
                <h2 class="section-title">{{ $siteSettings->why_choose_title ?? 'Your Trusted Partner' }}</h2>
                <p style="color:#7a8296; max-width:680px; margin:8px auto 0;">
                    {{ $siteSettings->why_choose_subtitle ?? 'We provide expert guidance through every step of document processing.' }}
                </p>
                <div class="section-divider"></div>
            </div>
            <div class="row g-4">
                @php
                    $reasons = $siteSettings->why_choose_items ?? [
                        [
                            'icon' => 'fas fa-shield-alt',
                            'title' => 'Safe & Reliable Service',
                            'desc' =>
                                'Your documents are handled with utmost care and security throughout the entire attestation process.',
                        ],
                        [
                            'icon' => 'fas fa-certificate',
                            'title' => 'Certified Translation',
                            'desc' =>
                                'All translations are certified by professional linguists and accepted by government authorities.',
                        ],
                        [
                            'icon' => 'fas fa-map-marked-alt',
                            'title' => 'Embassy & Apostille Experts',
                            'desc' =>
                                'Specialized in embassy attestation for UAE, Saudi Arabia, Kuwait, Qatar, Bahrain, Oman and more.',
                        ],
                        [
                            'icon' => 'fas fa-tag',
                            'title' => 'Competitive Pricing',
                            'desc' =>
                                'Transparent pricing with no hidden charges. Quality service at the most affordable rates.',
                        ],
                        [
                            'icon' => 'fas fa-headset',
                            'title' => 'Dedicated Support',
                            'desc' =>
                                'Our expert team is available Monday to Saturday to assist you at every step of the process.',
                        ],
                        [
                            'icon' => 'fas fa-globe',
                            'title' => '100% Genuine Services',
                            'desc' =>
                                'All our services are government-approved and 100% genuine with verifiable stamp authenticity.',
                        ],
                    ];
                @endphp

                @foreach ($reasons as $index => $reason)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 80 }}">
                        <div class="d-flex gap-3 p-4 bg-white rounded-3" style="box-shadow: var(--shadow); height:100%;">
                            <div
                                style="width:50px; height:50px; background:linear-gradient(135deg,var(--primary),var(--primary-light)); border-radius:10px; display:flex; align-items:center; justify-content:center; color:var(--gold); font-size:20px; flex-shrink:0;">
                                <i class="{{ $reason['icon'] }}"></i>
                            </div>
                            <div>
                                <h6 style="font-size:15px; font-weight:700; color:var(--primary); margin-bottom:6px;">
                                    {{ $reason['title'] }}</h6>
                                <p style="font-size:13.5px; color:var(--text-muted); margin:0; line-height:1.7;">
                                    {{ $reason['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ============ BLOG SECTION ============ -->
    <section class="blog-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-tag">Latest Updates</span>
                <h2 class="section-title">From Our <span>Blog</span></h2>
                <div class="section-divider"></div>
                <p class="section-subtitle">Stay informed with the latest news and guides on document attestation and
                    legalization services.</p>
            </div>

            @if (isset($latestBlogs) && $latestBlogs->isNotEmpty())
                <div class="row g-4">
                    @foreach ($latestBlogs as $index => $post)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div class="blog-card">
                                <div class="blog-img-wrap">
                                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}"
                                        onerror="this.src='https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=500&q=80'">
                                    <span class="blog-category">{{ $post->category }}</span>
                                </div>
                                <div class="blog-body">
                                    <div class="blog-meta">
                                        <span><i class="fas fa-calendar-alt"></i>
                                            {{ $post->published_at->format('d M Y') }}</span>
                                        <span><i class="fas fa-user"></i> {{ $post->author }}</span>
                                    </div>
                                    <h5><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h5>
                                    <p>{{ Str::limit($post->short_description, 100) }}</p>
                                    <a href="{{ route('blog.show', $post->slug) }}" class="read-more-link">
                                        Read More <i class="fas fa-long-arrow-alt-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row g-4">
                    @php
                        $staticPosts = [
                            [
                                'category' => 'Apostille',
                                'title' => 'Certificate Apostille & Attestation Services – Complete Guide',
                                'excerpt' =>
                                    'An Apostille is a form of authentication issued to documents for use in countries that participate in the Hague Convention.',
                                'date' => 'June 10, 2025',
                                'slug' => 'certificate-apostille-attestation-services',
                                'img' => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=500&q=80',
                            ],
                            [
                                'category' => 'Embassy',
                                'title' => 'Diploma Certificate Attestation Services – UAE, Saudi & GCC Countries',
                                'excerpt' =>
                                    'Planning to work in UAE or Saudi Arabia? Get your diploma attested through the proper channels – HRD, MEA and Embassy attestation explained.',
                                'date' => 'June 18, 2025',
                                'slug' => 'diploma-certificate-attestation-services',
                                'img' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=500&q=80',
                            ],
                            [
                                'category' => 'Marriage',
                                'title' => 'Marriage Certificate Attestation Services – Process & Requirements',
                                'excerpt' =>
                                    'Marriage certificate attestation is required for dependent visa, family visa, and many other immigration processes.',
                                'date' => 'March 10, 2025',
                                'slug' => 'marriage-certificate-attestation-services',
                                'img' => 'https://images.unsplash.com/photo-1606800052052-a08af7148866?w=500&q=80',
                            ],
                        ];
                    @endphp
                    @foreach ($staticPosts as $index => $post)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div class="blog-card">
                                <div class="blog-img-wrap">
                                    <img src="{{ $post['img'] }}" alt="{{ $post['title'] }}">
                                    <span class="blog-category">{{ $post['category'] }}</span>
                                </div>
                                <div class="blog-body">
                                    <div class="blog-meta">
                                        <span><i class="fas fa-calendar-alt"></i> {{ $post['date'] }}</span>
                                        <span><i class="fas fa-user"></i> Admin</span>
                                    </div>
                                    <h5><a href="{{ url('/blog/' . $post['slug']) }}">{{ $post['title'] }}</a></h5>
                                    <p>{{ Str::limit($post['excerpt'], 100) }}</p>
                                    <a href="{{ url('/blog/' . $post['slug']) }}" class="read-more-link">
                                        Read More <i class="fas fa-long-arrow-alt-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="text-center mt-5" data-aos="fade-up">
                <a href="{{ url('/blog') }}" class="btn-primary-dark">
                    View All Articles <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- ============ TIED UP COMPANIES SECTION ============ -->
    <section style="padding: 80px 0;">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-tag">Our Tied-up Companies</span>
                <h2 class="section-title">Trusted Partners</h2>
                <div class="section-divider"></div>
                <p class="section-subtitle">We are proud to collaborate with top companies across the globe.</p>
            </div>

            @if (isset($tiedUpCompanies) && $tiedUpCompanies->isNotEmpty())
                <div class="swiper companies-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($tiedUpCompanies as $company)
                            <div class="swiper-slide">
                                <div class="company-card"
                                    style="background:#fff; border:1px solid #e6eaf3; border-radius:12px; padding:16px; text-align:center; box-shadow:0 4px 12px rgba(0,0,0,0.06); height:100%;">
                                    <div
                                        style="height:110px; display:flex; align-items:center; justify-content:center; margin-bottom:12px;">
                                        @if ($company->image_url)
                                            <img src="{{ $company->image_url }}" alt="{{ $company->name }}"
                                                style="max-width:150px; max-height:100px; object-fit:contain;">
                                        @else
                                            <i class="fas fa-building" style="font-size:42px; color:#c9a84c;"></i>
                                        @endif
                                    </div>
                                    <h5 style="font-size:16px; margin-bottom:8px;">{{ $company->name }}</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            @else
                <div class="text-center" style="color:#7a8296;">No tied-up companies yet. Add some from admin panel.</div>
            @endif
        </div>
    </section>

    <!-- ============ TESTIMONIALS SECTION ============ -->
    <section class="testimonials-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-tag">Client Reviews</span>
                <h2 class="section-title">What Our <span>Clients Say</span></h2>
                <div class="section-divider"></div>
                <p class="section-subtitle">Thousands of satisfied customers trust S K Document Centre for their
                    attestation needs.</p>
            </div>

            @if (isset($latestReviews) && $latestReviews->isNotEmpty())
                <div class="row g-4">
                    @foreach ($latestReviews as $index => $review)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div class="testimonial-card">
                                <div class="testimonial-stars">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star"
                                            style="{{ $i <= $review->rating ? '' : 'opacity:0.25;' }}"></i>
                                    @endfor
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg"
                                        alt="Google" class="testimonial-google-logo" />
                                </div>
                                <p>"{{ $review->review_text }}"</p>
                                <div class="testimonial-author">
                                    <div class="testimonial-avatar-placeholder">
                                        {{ $review->initials }}
                                    </div>
                                    <div>
                                        <h6>{{ $review->reviewer_name }}</h6>
                                        @if ($review->reviewer_location)
                                            <span><i class="fas fa-map-marker-alt me-1"
                                                    style="color:var(--gold);"></i>{{ $review->reviewer_location }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row g-4">
                    @php
                        $staticReviews = [
                            [
                                'name' => 'Rahul Sharma',
                                'location' => 'Delhi',
                                'rating' => 5,
                                'text' =>
                                    'Excellent service! They helped me get my degree certificate attested for UAE in record time. The team was professional, responsive and the pricing was transparent. Highly recommend!',
                                'initial' => 'R',
                            ],
                            [
                                'name' => 'Priya Gupta',
                                'location' => 'Mumbai',
                                'rating' => 5,
                                'text' =>
                                    'SK Document Centre handled my marriage certificate attestation for a Kuwait visa. They guided me through every step and delivered the attested documents on time. Best attestation service in India.',
                                'initial' => 'P',
                            ],
                            [
                                'name' => 'Ahmed Khan',
                                'location' => 'Hyderabad',
                                'rating' => 5,
                                'text' =>
                                    'Best attestation service in India. They guided me through Apostille process for my documents and got it done quickly. Very professional staff and excellent customer support.',
                                'initial' => 'A',
                            ],
                        ];
                    @endphp
                    @foreach ($staticReviews as $index => $review)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div class="testimonial-card">
                                <div class="testimonial-stars">
                                    @for ($i = 0; $i < $review['rating']; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg"
                                        alt="Google" class="testimonial-google-logo" />
                                </div>
                                <p>"{{ $review['text'] }}"</p>
                                <div class="testimonial-author">
                                    <div class="testimonial-avatar-placeholder">{{ $review['initial'] }}</div>
                                    <div>
                                        <h6>{{ $review['name'] }}</h6>
                                        <span><i class="fas fa-map-marker-alt me-1"
                                                style="color:var(--gold);"></i>{{ $review['location'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- ============ CONTACT SECTION ============ -->
    <section class="contact-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-tag">Get In Touch</span>
                <h2 class="section-title">Contact <span>Us Today</span></h2>
                <div class="section-divider"></div>
            </div>

            <div class="row g-4 align-items-stretch">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="contact-info-box">
                        <h3>S K Document Centre</h3>
                        <p>Your Trusted Attestation Partner</p>

                        <div class="contact-info-item">
                            <div class="ci-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <h6>Office Address</h6>
                                <p>C-260, Ground Floor, New Ashok Nagar,<br>New Delhi, Delhi - 110096</p>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="ci-icon"><i class="fas fa-phone-alt"></i></div>
                            <div>
                                <h6>Phone Number</h6>
                                <a href="tel:+919354234462">+91-9354234462</a>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="ci-icon"><i class="fas fa-envelope"></i></div>
                            <div>
                                <h6>Email Address</h6>
                                <a href="mailto:info@skdocumentcentre.in">info@skdocumentcentre.in</a>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="ci-icon"><i class="fas fa-clock"></i></div>
                            <div>
                                <h6>Working Hours</h6>
                                <p>Mon – Sat: 9:00 AM – 6:00 PM<br><span
                                        style="font-size:12px; color:rgba(255,255,255,0.5);">Sunday: Closed</span></p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="https://wa.me/919354234462" target="_blank" rel="noopener noreferrer"
                                class="btn-gold d-inline-flex align-items-center gap-2">
                                <i class="fab fa-whatsapp fa-lg"></i> Chat on WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-left">
                    <div class="contact-form-box">
                        <h3>Send Us a Message</h3>
                        <p>Fill out the form below and our team will get back to you within 24 hours.</p>

                        <form id="contactForm" action="{{ url('/contact/send') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Your Name <span style="color:red;">*</span></label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter your full name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email Address <span style="color:red;">*</span></label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Enter your email" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" name="phone" class="form-control"
                                        placeholder="+91 XXXXX XXXXX">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Service Required</label>
                                    <select name="service" class="form-select">
                                        <option value="">-- Select Service --</option>
                                        <option>Notary Attestation</option>
                                        <option>HRD Attestation</option>
                                        <option>MEA Attestation</option>
                                        <option>MEA Apostille</option>
                                        <option>Embassy Attestation</option>
                                        <option>Translation Services</option>
                                        <option>MOFA Attestation</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Your Message</label>
                                    <textarea name="message" class="form-control" placeholder="Describe your document attestation requirement..."
                                        rows="4"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-gold w-100 text-center py-3">
                                        <i class="fas fa-paper-plane me-2"></i> Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ CTA SECTION ============ -->
    <section class="cta-section" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-7">
                    <h2>Need Document Attestation? We're Here to Help!</h2>
                    <p>Get expert guidance on your document attestation requirements. Fast, reliable & affordable service
                        across India.</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                    <a href="tel:+919354234462" class="btn-primary-dark me-2 mb-2 d-inline-block">
                        <i class="fas fa-phone-alt me-2"></i> Call Us Now
                    </a>
                    <a href="{{ url('/contact') }}" class="btn-outline-gold mb-2 d-inline-block"
                        style="border-color: var(--primary); color: var(--primary) !important;">
                        Get Free Quote
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <style>
        .hero-section .btn-outline-gold {
            color: var(--white) !important;
            border-color: rgba(255, 255, 255, 0.5);
            background: rgba(255, 255, 255, 0.08);
        }

        .hero-section .btn-outline-gold:hover {
            background: var(--gold);
            color: var(--primary) !important;
            border-color: var(--gold);
        }

        .testimonial-stars {
            display: inline-flex;
            align-items: center;
            gap: 0.2rem;
        }

        .testimonial-google-logo {
            width: 18px;
            height: 18px;
            margin-left: 0.35rem;
            display: inline-block;
            vertical-align: middle;
        }

        /* Swiper Custom Styles */
        .companies-swiper {
            padding-bottom: 60px;
            overflow: visible;
        }

        .companies-swiper .swiper-wrapper {
            padding-bottom: 20px;
        }

        .companies-swiper .swiper-slide {
            height: auto;
            display: flex;
        }

        .companies-swiper .swiper-button-next,
        .companies-swiper .swiper-button-prev {
            color: var(--gold);
            background: rgba(201, 168, 76, 0.1);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-top: -20px;
            transition: all 0.3s ease;
        }

        .companies-swiper .swiper-button-next:hover,
        .companies-swiper .swiper-button-prev:hover {
            background: var(--gold);
            color: var(--primary);
            transform: scale(1.1);
        }

        .companies-swiper .swiper-button-next::after,
        .companies-swiper .swiper-button-prev::after {
            font-size: 16px;
            font-weight: bold;
        }

        .companies-swiper .swiper-pagination {
            bottom: -40px;
        }

        .companies-swiper .swiper-pagination-bullet {
            background: var(--gold);
            opacity: 0.3;
            width: 8px;
            height: 8px;
        }

        .companies-swiper .swiper-pagination-bullet-active {
            opacity: 1;
            transform: scale(1.2);
        }

        .company-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 100%;
        }

        .company-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
        }

        @media (max-width: 768px) {

            .companies-swiper .swiper-button-next,
            .companies-swiper .swiper-button-prev {
                display: none;
            }

            .companies-swiper {
                padding-bottom: 40px;
            }
        }
    </style>
@endpush

@push('scripts')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Initialize Swiper for tied-up companies
        const companiesSwiper = new Swiper('.companies-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            breakpoints: {
                480: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                992: {
                    slidesPerView: 4,
                    spaceBetween: 25,
                },
                1200: {
                    slidesPerView: 5,
                    spaceBetween: 30,
                }
            },
            navigation: {
                nextEl: '.companies-swiper .swiper-button-next',
                prevEl: '.companies-swiper .swiper-button-prev',
            },
            pagination: {
                el: '.companies-swiper .swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            grabCursor: true,
            speed: 800,
            effect: 'slide',
        });
    </script>
@endpush
