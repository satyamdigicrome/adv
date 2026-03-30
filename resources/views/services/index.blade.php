@extends('layouts.app')

@section('meta_title', 'Our Services | Document Attestation & Legalization — S K Document Centre')
@section('meta_description', 'Explore all document attestation services by S K Document Centre — Notary, HRD, MEA, Embassy Attestation, Apostille, Translation & more. Pan India service.')

@section('content')

<!-- Page Banner -->
<div class="page-banner">
    <div class="container position-relative">
        <div class="row">
            <div class="col-lg-8" data-aos="fade-right">
                <span class="section-tag" style="color:var(--gold-light);">What We Offer</span>
                <h1>Our <span style="color:var(--gold);">Services</span></h1>
                <p>Comprehensive document attestation and legalization services across India</p>
                <div class="breadcrumb-custom">
                    <a href="{{ url('/') }}"><i class="fas fa-home me-1"></i> Home</a>
                    <span class="separator">/</span>
                    <span class="current">Services</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Services Grid -->
<section style="padding:80px 0; background:var(--light-bg);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-tag">All Services</span>
            <h2 class="section-title">Professional <span>Attestation Services</span></h2>
            <div class="section-divider"></div>
            <p class="section-subtitle">We handle all types of document attestation with 100% authenticity and on-time delivery.</p>
        </div>

        @if($services->isEmpty())
            <div class="text-center py-5">
                <i class="fas fa-concierge-bell fa-3x mb-3" style="color:var(--gold); opacity:0.4;"></i>
                <p style="color:var(--text-muted);">Services coming soon. Please check back later.</p>
            </div>
        @else
        <div class="row g-4">
            @foreach($services as $index => $service)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 80 }}">
                <div class="service-card h-100">
                    @if($service->main_image)
                        <img src="{{ $service->main_image_url }}" alt="{{ $service->title }}"
                             style="width:100%; height:180px; object-fit:cover; border-radius:10px; margin-bottom:20px;">
                    @else
                        <div class="service-icon">
                            <i class="{{ $service->icon ?? 'fas fa-file-alt' }}"></i>
                        </div>
                    @endif
                    <h5>{{ $service->title }}</h5>
                    @if($service->short_description)
                        <p>{{ $service->short_description }}</p>
                    @endif
                    <div class="d-flex gap-3 mt-auto flex-wrap">
                        <a href="{{ route('services.show', $service->slug) }}" class="read-more">
                            Learn More <i class="fas fa-chevron-right"></i>
                        </a>
                        <a href="{{ route('services.show', $service->slug) }}#enquire" class="read-more" style="color:var(--primary);">
                            <i class="fas fa-paper-plane me-1"></i> Enquire Now
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="container text-center">
        <h2>Can't Find What You're Looking For?</h2>
        <p>Contact us and we'll help you with your specific document attestation requirements.</p>
        <a href="{{ url('/contact') }}" class="btn-primary-dark">
            <i class="fas fa-headset me-2"></i> Contact Us
        </a>
    </div>
</section>

@endsection
