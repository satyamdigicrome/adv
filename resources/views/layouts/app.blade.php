<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    {{-- SEO Meta Tags --}}
    <title>@yield('meta_title', config('app.name', 'S K Document Centre') . ' | Document Attestation & Legalization Services')</title>
    <meta name="description" content="@yield('meta_description', 'S K Document Centre – Trusted document attestation services across India. Notary, SDM, Apostille, MEA, Embassy Attestation & Translation. Serving 10,000+ happy clients.')">
    <meta name="keywords" content="@yield('meta_keywords', 'document attestation, apostille, MEA attestation, embassy attestation, notary, SDM attestation, HRD attestation, certificate legalization, India')">
    <meta name="author" content="S K Document Centre">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="@yield('canonical', url()->current())">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', 'S K Document Centre | Document Attestation Services')">
    <meta property="og:description" content="@yield('og_description', 'Trusted document attestation services across India – Notary, Apostille, MEA, Embassy Attestation & Translation.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">
    <meta property="og:site_name" content="S K Document Centre">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'S K Document Centre | Attestation Services')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Trusted document attestation services across India.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/og-image.jpg'))">

    {{-- Google AdSense Verification --}}
    <meta name="google-site-verification" content="f08c47fec0942fa0" />

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;600;700&display=swap"
        rel="stylesheet">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- AOS Animations --}}
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    {{-- Custom Styles --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- Page specific styles --}}
    @stack('styles')

    {{-- Google AdSense Script --}}
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9835659731888816"
        crossorigin="anonymous"></script>

    {{-- Structured Data --}}
    @verbatim
        <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {
            "@type": "LegalService",
            "@id": "https://skdocumentcentre.com/#business",
            "name": "S K Document Centre",
            "url": "https://skdocumentcentre.com/",
            "description": "S K Document Centre provides document attestation, apostille, MEA attestation, embassy legalization, notary attestation, SDM attestation, MOFA attestation, PCC, and translation services across India.",
            "telephone": "+91-9310970010",
            "email": "info@skdocumentcentre.in",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "C-260, Ground Floor, New Ashok Nagar",
                "addressLocality": "New Delhi",
                "addressRegion": "Delhi",
                "postalCode": "110096",
                "addressCountry": "IN"
            },
            "areaServed": {
                "@type": "Country",
                "name": "India"
            },
            "openingHoursSpecification": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": [
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday"
                ],
                "opens": "09:00",
                "closes": "18:00"
            },
            "priceRange": "$$"
            },
            {
            "@type": "WebSite",
            "@id": "https://skdocumentcentre.com/#website",
            "url": "https://skdocumentcentre.com/",
            "name": "S K Document Centre",
            "publisher": {
                "@id": "https://skdocumentcentre.com/#business"
            },
            "inLanguage": "en-IN"
            },
            {
            "@type": "WebPage",
            "@id": "https://skdocumentcentre.com/#webpage",
            "url": "https://skdocumentcentre.com/",
            "name": "S K Document Centre | Document Attestation & Legalization Services India",
            "description": "Trusted document attestation, apostille, MEA attestation, embassy legalization, notary, SDM, MOFA, PCC, and translation services across India.",
            "isPartOf": {
                "@id": "https://skdocumentcentre.com/#website"
            },
            "about": {
                "@id": "https://skdocumentcentre.com/#business"
            },
            "mainEntity": {
                "@id": "https://skdocumentcentre.com/#business"
            },
            "inLanguage": "en-IN"
            }
        ]
    }
    </script>
    @endverbatim
</head>

<body>

    {{-- Top Info Bar --}}
    <div class="top-bar d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="top-bar-left">
                        <a href="tel:{{ preg_replace('/\\D/', '', $siteSettings->phone ?? '+91-9310970010') }}"><i
                                class="fas fa-phone-alt"></i> {{ $siteSettings->phone ?? '+91-9310970010' }}</a>
                        <a href="mailto:{{ $siteSettings->email ?? 'info@skdocumentcentre.in' }}"><i
                                class="fas fa-envelope"></i>
                            {{ $siteSettings->email ?? 'info@skdocumentcentre.in' }}</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 text-end">
                    <div class="top-bar-right">
                        <a href="#"><i class="fas fa-map-marker-alt"></i>
                            {{ $siteSettings->address ?? 'C-260, New Ashok Nagar, New Delhi-110096' }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Navigation --}}
    <nav class="navbar navbar-expand-lg main-navbar sticky-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <div class="brand-logo">
                    <span class="brand-sk">SK</span>
                    <div class="brand-text">
                        <span class="brand-name">Document Centre</span>
                        <span class="brand-tagline">ISO 9001:2015 Certified</span>
                    </div>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                            href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about*') ? 'active' : '' }}"
                            href="{{ url('/about') }}">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('services*') ? 'active' : '' }}"
                            href="{{ route('services') }}" id="servicesDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu mega-menu" aria-labelledby="servicesDropdown">
                            @php $navServices = \App\Models\Service::active()->ordered()->get(); @endphp
                            @forelse($navServices as $navSvc)
                                <li>
                                    <a class="dropdown-item" href="{{ route('services.show', $navSvc->slug) }}">
                                        <i class="{{ $navSvc->icon ?? 'fas fa-file-alt' }}"></i> {{ $navSvc->title }}
                                    </a>
                                </li>
                            @empty
                                <li><a class="dropdown-item" href="{{ route('services') }}"><i
                                            class="fas fa-list"></i> All Services</a></li>
                            @endforelse
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('services') }}"
                                    style="color:var(--gold); font-weight:600;"><i class="fas fa-th me-1"></i> View
                                    All Services</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('attestation-services*') ? 'active' : '' }}"
                            href="{{ route('attestations') }}" id="attestationsDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Embassy Attestations
                        </a>
                        <ul class="dropdown-menu mega-menu" aria-labelledby="attestationsDropdown">
                            @php $navAttestations = \App\Models\Attestation::active()->ordered()->get(); @endphp
                            @forelse($navAttestations as $navAtt)
                                <li>
                                    <a class="dropdown-item" href="{{ route('attestations.show', $navAtt->slug) }}">
                                        <i class="{{ $navAtt->icon ?? 'fas fa-certificate' }}"></i>
                                        {{ $navAtt->title }}
                                        @if ($navAtt->country)
                                            <small style="color:#8a99b0;font-size:11px;">
                                                ({{ $navAtt->country }})
                                            </small>
                                        @endif
                                    </a>
                                </li>
                            @empty
                                <li><a class="dropdown-item" href="{{ route('attestations') }}"><i
                                            class="fas fa-list"></i> All Attestations</a></li>
                            @endforelse
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('attestations') }}"
                                    style="color:var(--gold); font-weight:600;"><i class="fas fa-th me-1"></i> View
                                    All Attestations</a></li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ url('/attestation-process') }}">Attestation Procedure</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('blog*') ? 'active' : '' }}"
                            href="{{ url('/blog') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact*') ? 'active' : '' }}"
                            href="{{ url('/contact') }}">Contact</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-gold" href="{{ url('/contact') }}">Get A Quote</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Page Content --}}
    <main>
        @yield('content')
    </main>

    <!-- Pickup & Drop Facility Section -->
    <section class="pickup-drop-section">
        <div class="container">
            <div class="pickup-card">
                <div class="pickup-icon">
                    <i class="fas fa-truck"></i>
                </div>

                <div class="pickup-content">
                    <h3>Pickup & Drop Facility Available</h3>
                    <p>
                        We provide convenient doorstep pickup and delivery of your
                        documents across India. No need to visit our office —
                        simply schedule a pickup and our team will handle the rest
                        safely and securely.
                    </p>

                    <div class="pickup-features">
                        <div class="feature-item">
                            ✅ Doorstep Pickup
                        </div>
                        <div class="feature-item">
                            ✅ Safe Document Handling
                        </div>
                        <div class="feature-item">
                            ✅ Fast Processing
                        </div>
                        <div class="feature-item">
                            ✅ Doorstep Delivery
                        </div>
                    </div>
                </div>

                <div class="pickup-icon secondary">
                    <i class="fas fa-file-alt"></i>
                </div>
            </div>
        </div>
    </section>
    {{-- Footer --}}
    <footer class="site-footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="footer-brand">
                            <div class="brand-logo mb-3">
                                <span class="brand-sk">SK</span>
                                <div class="brand-text">
                                    <span class="brand-name">Document Centre</span>
                                    <span class="brand-tagline">ISO 9001:2015 Certified</span>
                                </div>
                            </div>
                            <p class="footer-desc">S K Document Centre is a leading provider of specialised document
                                services, dedicated to ensuring that your legal and administrative needs are met with
                                precision and efficiency.</p>
                            <div class="footer-social">
                                <a href="{{ $siteSettings->facebook_url ?: '#' }}" aria-label="Facebook"
                                    target="_blank"><i class="fab fa-facebook-f"></i></a>
                                {{-- <a href="{{ $siteSettings->twitter_url ?: '#' }}" aria-label="Twitter"
                                    target="_blank"><i class="fab fa-twitter"></i></a> --}}
                                <a href="{{ $siteSettings->linkedin_url ?: '#' }}" aria-label="LinkedIn"
                                    target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                <a href="{{ $siteSettings->instagram_url ?: '#' }}" aria-label="Instagram"
                                    target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="{{ $siteSettings->youtube_url ?: '#' }}" aria-label="Youtube"
                                    target="_blank"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 mb-5">
                        <h5 class="footer-heading">Quick Links</h5>
                        <ul class="footer-links">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/about') }}">About Us</a></li>
                            <li><a href="{{ url('/services') }}">Services</a></li>
                            <li><a href="{{ route('attestations') }}">Embassy Attestations</a></li>
                            <li><a href="{{ url('/blog') }}">Blog</a></li>
                            <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-5">
                        <h5 class="footer-heading">Our Services</h5>
                        <ul class="footer-links">
                            @foreach (App\Models\Service::active()->ordered()->limit(6)->get() as $svc)
                                <li><a href="{{ route('services.show', $svc->slug) }}"><i
                                            class="{{ $svc->icon ?? 'fas fa-check' }} me-1"></i>
                                        {{ $svc->title }}</a></li>
                            @endforeach
                            {{-- <li><a href="{{ url('/services/notary-attestation') }}">Notary Attestation</a></li>
                            <li><a href="{{ url('/services/hrd-attestation') }}">HRD Attestation</a></li>
                            <li><a href="{{ url('/services/mea-attestation') }}">MEA Attestation</a></li>
                            <li><a href="{{ url('/services/mea-apostille') }}">MEA Apostille</a></li>
                            <li><a href="{{ url('/services/embassy-attestation') }}">Embassy Attestation</a></li>
                            <li><a href="{{ url('/services/translation-services') }}">Translation Services</a></li>
                            <li><a href="{{ url('/services/mofa-attestation') }}">MOFA Attestation</a></li>
                            <li><a href="{{ url('/services/chamber-of-commerce') }}">Chamber of Commerce</a></li> --}}
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-5">
                        <h5 class="footer-heading">Contact Us</h5>
                        <ul class="footer-contact">
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{ $siteSettings->address ?? 'C-260, Ground Floor, New Ashok Nagar, New Delhi, Delhi-110096' }}</span>
                            </li>
                            <li>
                                <i class="fas fa-phone-alt"></i>
                                <span><a
                                        href="tel:{{ preg_replace('/\\D/', '', $siteSettings->phone ?? '+91-9310970010') }}">{{ $siteSettings->phone ?? '+91-9310970010' }}</a>,
                                    <a href="tel:01149392112">011-49392112</a></span>
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <span><a
                                        href="mailto:{{ $siteSettings->email ?? 'info@skdocumentcentre.in' }}">{{ $siteSettings->email ?? 'info@skdocumentcentre.in' }}</a></span>
                            </li>
                            <li>
                                <i class="fas fa-clock"></i>
                                <span>Mon – Sat: 9:00 AM – 6:00 PM</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p>&copy; {{ date('Y') }} S K Document Centre. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <ul class="footer-bottom-links">
                            <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
                            <li><a href="{{ url('/terms-conditions') }}">Terms & Conditions</a></li>
                            <li><a href="{{ url('/sitemap.xml') }}">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    {{-- Back to Top Button --}}
    <a href="#" class="back-to-top" id="backToTop" aria-label="Back to top">
        <i class="fas fa-chevron-up"></i>
    </a>

    {{-- Call Float Button --}}
    <a href="tel:{{ preg_replace('/\\D/', '', $siteSettings->phone ?? '+91-9310970010') }}" class="call-float"
        aria-label="Call Us">
        <i class="fas fa-phone-alt"></i>
    </a>

    {{-- WhatsApp Float Button --}}
    <a href="https://wa.me/{{ preg_replace('/\\D/', '', $siteSettings->phone ?? '919310970010') }}"
        class="whatsapp-float" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    {{-- Enquiry Modal --}}
    <div class="modal fade" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="enquiryModalLabel">Quick Enquiry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (session('enquiry_success'))
                        <div class="alert alert-success">
                            {{ session('enquiry_success') }}
                        </div>
                    @endif
                    @if ($errors->any() && old('enquiry_form'))
                        <div class="alert alert-danger">
                            Please correct the highlighted fields and submit again.
                        </div>
                    @endif

                    <form id="enquiryForm" action="{{ route('enquiry.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="enquiry_form" value="1">
                        <input type="hidden" name="page_name"
                            value="{{ trim($__env->yieldContent('enquiryPageName', 'Website Enquiry')) }}">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" placeholder="Enter your name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" placeholder="Enter your email" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone') }}" placeholder="Enter your phone number">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Address</label>
                                <input type="text" name="address"
                                    class="form-control @error('address') is-invalid @enderror"
                                    value="{{ old('address') }}" placeholder="City, state or address">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Message</label>
                                <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror"
                                    placeholder="Tell us what you need">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">Send Enquiry</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- AOS Animations --}}
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    {{-- Counter Up --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>

    {{-- Custom JS --}}
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var enquiryModalEl = document.getElementById('enquiryModal');
            if (!enquiryModalEl) {
                return;
            }
            var pageHasEnquiryModal = @json(View::hasSection('enquiryPageName'));
            var shouldOpen = pageHasEnquiryModal ||
                {{ session('enquiry_success') ? 'true' : 'false' }} ||
                {{ old('enquiry_form') ? 'true' : 'false' }};
            if (shouldOpen) {
                var enquiryModal = new bootstrap.Modal(enquiryModalEl);
                enquiryModal.show();
            }
        });
    </script>

    {{-- Page specific scripts --}}
    @stack('scripts')
</body>

</html>
