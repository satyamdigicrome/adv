@extends('layouts.app')

@section('meta_title', 'Attestation Services | S K Document Centre')
@section('meta_description', 'Explore our comprehensive attestation services — Embassy Attestation, MEA, Apostille, HRD & more. Fast, reliable and affordable for UAE, Saudi Arabia, Qatar and all countries.')
@section('meta_keywords', 'attestation services India, embassy attestation, MEA apostille, UAE attestation, Saudi Arabia attestation, document legalization')
@section('canonical', route('attestations'))

@section('content')

<!-- Hero Section -->
<div style="background:linear-gradient(135deg,#0f2044 0%,#1a3460 60%,#0f2044 100%);padding:100px 0 80px;position:relative;overflow:hidden;">
    <!-- Decorative circles -->
    <div style="position:absolute;top:-80px;right:-80px;width:400px;height:400px;border-radius:50%;background:rgba(201,168,76,0.06);pointer-events:none;"></div>
    <div style="position:absolute;bottom:-60px;left:-60px;width:300px;height:300px;border-radius:50%;background:rgba(201,168,76,0.04);pointer-events:none;"></div>
    <div style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:700px;height:700px;border-radius:50%;border:1px solid rgba(201,168,76,0.05);pointer-events:none;"></div>

    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-7" data-aos="fade-right">
                <div style="display:inline-flex;align-items:center;gap:8px;background:rgba(201,168,76,0.12);border:1px solid rgba(201,168,76,0.25);border-radius:50px;padding:6px 16px;margin-bottom:20px;">
                    <i class="fas fa-certificate" style="color:var(--gold);font-size:12px;"></i>
                    <span style="color:var(--gold);font-size:12px;font-weight:600;text-transform:uppercase;letter-spacing:1px;">Attestation Services</span>
                </div>
                <h1 style="font-family:'Playfair Display',serif;color:#fff;font-size:clamp(32px,5vw,52px);font-weight:700;line-height:1.2;margin-bottom:20px;">
                    Document Attestation<br><span style="color:var(--gold);">for Every Country</span>
                </h1>
                <p style="color:rgba(255,255,255,0.7);font-size:16px;line-height:1.8;max-width:520px;margin-bottom:30px;">
                    From UAE to Saudi Arabia, Qatar to Oman — we handle all your international document attestation needs with precision, speed and complete transparency.
                </p>

                <!-- Search Bar -->
                <div style="background:rgba(255,255,255,0.08);border:1.5px solid rgba(255,255,255,0.15);border-radius:50px;padding:8px 8px 8px 20px;display:flex;align-items:center;max-width:460px;backdrop-filter:blur(10px);">
                    <i class="fas fa-search" style="color:rgba(255,255,255,0.4);margin-right:12px;"></i>
                    <input type="text" id="attSearch" placeholder="Search by country or attestation type..."
                           style="background:transparent;border:none;outline:none;color:#fff;font-size:13.5px;flex:1;font-family:inherit;"
                           oninput="filterAttestations(this.value)">
                    <button style="background:var(--gold);border:none;color:var(--primary);border-radius:50px;padding:8px 20px;font-size:13px;font-weight:700;cursor:pointer;white-space:nowrap;">
                        Search
                    </button>
                </div>

                <div class="d-flex gap-3 mt-4 flex-wrap">
                    <div style="display:flex;align-items:center;gap:8px;">
                        <div style="width:32px;height:32px;background:rgba(201,168,76,0.15);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-check" style="color:var(--gold);font-size:12px;"></i>
                        </div>
                        <span style="color:rgba(255,255,255,0.7);font-size:13px;">100% Genuine</span>
                    </div>
                    <div style="display:flex;align-items:center;gap:8px;">
                        <div style="width:32px;height:32px;background:rgba(201,168,76,0.15);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-bolt" style="color:var(--gold);font-size:12px;"></i>
                        </div>
                        <span style="color:rgba(255,255,255,0.7);font-size:13px;">Fast Processing</span>
                    </div>
                    <div style="display:flex;align-items:center;gap:8px;">
                        <div style="width:32px;height:32px;background:rgba(201,168,76,0.15);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-globe" style="color:var(--gold);font-size:12px;"></i>
                        </div>
                        <span style="color:rgba(255,255,255,0.7);font-size:13px;">All Countries</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 d-none d-lg-block" data-aos="fade-left" data-aos-delay="100">
                <div style="position:relative;">
                    <!-- Floating stat cards -->
                    <div style="background:rgba(255,255,255,0.06);backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,0.12);border-radius:16px;padding:28px;text-align:center;">
                        <div style="font-size:48px;font-weight:800;color:var(--gold);font-family:'Playfair Display',serif;">50+</div>
                        <div style="color:rgba(255,255,255,0.8);font-size:14px;font-weight:600;margin-bottom:16px;">Countries Covered</div>
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
                            @foreach(['UAE', 'Saudi Arabia', 'Qatar', 'Oman', 'Kuwait', 'Bahrain'] as $c)
                            <div style="background:rgba(201,168,76,0.1);border:1px solid rgba(201,168,76,0.2);border-radius:8px;padding:8px;font-size:12px;color:rgba(255,255,255,0.75);font-weight:500;">
                                <i class="fas fa-flag me-1" style="color:var(--gold);font-size:10px;"></i> {{ $c }}
                            </div>
                            @endforeach
                        </div>
                        <div style="margin-top:16px;padding-top:16px;border-top:1px solid rgba(255,255,255,0.08);font-size:12px;color:rgba(255,255,255,0.5);">
                            + 44 more countries available
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Strip -->
<div style="background:var(--gold);padding:18px 0;">
    <div class="container">
        <div class="row g-0 text-center">
            @foreach(['10,000+|Documents Processed', '15+|Years Experience', '50+|Countries Covered', '99%|Success Rate'] as $stat)
            @php [$num, $label] = explode('|', $stat); @endphp
            <div class="col-6 col-md-3" style="border-right:1px solid rgba(15,32,68,0.15);">
                <div style="padding:8px 16px;">
                    <div style="font-size:22px;font-weight:800;color:var(--primary);font-family:'Playfair Display',serif;">{{ $num }}</div>
                    <div style="font-size:12px;color:rgba(15,32,68,0.7);font-weight:600;">{{ $label }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Attestation Listing -->
<section style="padding:80px 0;background:#f8fafc;">
    <div class="container">

        @if($attestations->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-certificate fa-3x mb-3" style="color:var(--gold);opacity:0.3;"></i>
            <h4 style="color:var(--primary);">No Attestation Services Yet</h4>
            <p class="text-muted">Please check back soon. We're adding services.</p>
        </div>
        @else

        <div class="row mb-5 align-items-center">
            <div class="col-lg-7">
                <div style="display:inline-block;background:rgba(201,168,76,0.1);border-radius:4px;padding:4px 14px;margin-bottom:10px;">
                    <span style="color:var(--gold);font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:1.5px;">All Services</span>
                </div>
                <h2 style="font-family:'Playfair Display',serif;color:var(--primary);font-size:clamp(26px,4vw,36px);font-weight:700;margin:0;">
                    {{ $attestations->total() }} Attestation Services Available
                </h2>
            </div>
            <div class="col-lg-5 text-lg-end mt-3 mt-lg-0">
                <a href="{{ route('services') }}" class="btn" style="border:2px solid var(--primary);color:var(--primary);border-radius:50px;padding:10px 24px;font-weight:600;font-size:13.5px;transition:all 0.2s;" onmouseover="this.style.background='var(--primary)';this.style.color='#fff'" onmouseout="this.style.background='transparent';this.style.color='var(--primary)'">
                    <i class="fas fa-concierge-bell me-2"></i> View All Services
                </a>
            </div>
        </div>

        <div class="row g-4" id="attestationGrid">
            @foreach($attestations as $att)
            <div class="col-lg-4 col-md-6 att-card-wrap" data-title="{{ strtolower($att->title) }}" data-country="{{ strtolower($att->country ?? '') }}" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
                <div class="att-card" style="background:#fff;border-radius:18px;overflow:hidden;box-shadow:0 4px 20px rgba(15,32,68,0.06);border:1px solid #edf1f8;height:100%;display:flex;flex-direction:column;transition:all 0.3s;"
                     onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 40px rgba(15,32,68,0.12)'"
                     onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(15,32,68,0.06)'">

                    <!-- Card Image/Header -->
                    <div style="position:relative;height:200px;overflow:hidden;">
                        @if($att->main_image)
                            <img src="{{ asset('storage/'.$att->main_image) }}" alt="{{ $att->title }}"
                                 style="width:100%;height:100%;object-fit:cover;"
                                 onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                            <div style="display:none;width:100%;height:100%;background:linear-gradient(135deg,#0f2044,#1a3460);align-items:center;justify-content:center;">
                                <i class="{{ $att->icon ?? 'fas fa-certificate' }}" style="font-size:48px;color:var(--gold);opacity:0.5;"></i>
                            </div>
                        @else
                            <div style="width:100%;height:100%;background:linear-gradient(135deg,#0f2044,#1a3460);display:flex;align-items:center;justify-content:center;">
                                <i class="{{ $att->icon ?? 'fas fa-certificate' }}" style="font-size:48px;color:var(--gold);opacity:0.5;"></i>
                            </div>
                        @endif

                        <!-- Country Badge -->
                        @if($att->country)
                        <div style="position:absolute;top:14px;left:14px;">
                            <span style="background:rgba(15,32,68,0.85);backdrop-filter:blur(10px);color:#fff;font-size:11px;font-weight:700;padding:4px 12px;border-radius:50px;border:1px solid rgba(201,168,76,0.3);">
                                <i class="fas fa-map-marker-alt me-1" style="color:var(--gold);"></i> {{ $att->country }}
                            </span>
                        </div>
                        @endif

                        <!-- Overlay gradient -->
                        <div style="position:absolute;bottom:0;left:0;right:0;height:80px;background:linear-gradient(transparent,rgba(15,32,68,0.7));"></div>
                    </div>

                    <!-- Card Body -->
                    <div style="padding:24px;flex:1;display:flex;flex-direction:column;">
                        <div style="display:flex;align-items:flex-start;gap:12px;margin-bottom:12px;">
                            <div style="width:40px;height:40px;background:rgba(201,168,76,0.1);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:2px;">
                                <i class="{{ $att->icon ?? 'fas fa-certificate' }}" style="color:var(--gold);font-size:16px;"></i>
                            </div>
                            <h3 style="font-size:16px;font-weight:700;color:var(--primary);line-height:1.3;margin:0;">{{ $att->title }}</h3>
                        </div>

                        @if($att->short_description)
                        <p style="font-size:13.5px;color:#637082;line-height:1.7;flex:1;margin-bottom:20px;">{{ Str::limit($att->short_description, 120) }}</p>
                        @endif

                        <!-- Features row -->
                        <div style="display:flex;gap:16px;margin-bottom:20px;padding:12px;background:#f8fafc;border-radius:10px;">
                            <div style="text-align:center;flex:1;">
                                <div style="font-size:11px;color:#8a99b0;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Processing</div>
                                <div style="font-size:12.5px;font-weight:700;color:var(--primary);margin-top:2px;">3-7 Days</div>
                            </div>
                            <div style="width:1px;background:#e2e8f0;"></div>
                            <div style="text-align:center;flex:1;">
                                <div style="font-size:11px;color:#8a99b0;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Support</div>
                                <div style="font-size:12.5px;font-weight:700;color:var(--primary);margin-top:2px;">Door-to-Door</div>
                            </div>
                        </div>

                        <a href="{{ route('attestations.show', $att->slug) }}"
                           style="display:block;background:var(--primary);color:#fff;text-align:center;padding:12px;border-radius:10px;font-weight:700;font-size:13.5px;text-decoration:none;transition:all 0.2s;"
                           onmouseover="this.style.background='var(--gold)';this.style.color='var(--primary)'"
                           onmouseout="this.style.background='var(--primary)';this.style.color='#fff'">
                            Apply Now <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- No Results Message -->
        <div id="noResults" style="display:none;" class="text-center py-5">
            <i class="fas fa-search fa-2x mb-3" style="color:#ccc;"></i>
            <p style="color:#8a99b0;font-size:15px;">No attestation services found matching your search.</p>
        </div>

        @if($attestations->hasPages())
        <div class="mt-5 d-flex justify-content-center">{{ $attestations->links() }}</div>
        @endif

        @endif
    </div>
</section>

<!-- Process Steps -->
<section style="padding:80px 0;background:#fff;">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span style="color:var(--gold);font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:2px;">How It Works</span>
            <h2 style="font-family:'Playfair Display',serif;color:var(--primary);font-size:clamp(24px,4vw,36px);font-weight:700;margin-top:8px;">Attestation in 4 Simple Steps</h2>
        </div>
        <div class="row g-4">
            @foreach([
                ['fas fa-upload','Submit Documents','Upload or courier your documents to us. We verify and process them.'],
                ['fas fa-cogs','Processing Begins','Our experts handle notary, HRD, MEA and embassy attestation.'],
                ['fas fa-stamp','Attestation Done','Your documents get officially attested by relevant authorities.'],
                ['fas fa-truck','Delivery','We courier back your attested documents anywhere in India.']
            ] as $i => $step)
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div style="text-align:center;padding:32px 24px;border-radius:16px;background:#f8fafc;border:1px solid #edf1f8;height:100%;position:relative;">
                    <div style="width:64px;height:64px;background:var(--primary);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;">
                        <i class="{{ $step[0] }}" style="color:var(--gold);font-size:24px;"></i>
                    </div>
                    <div style="position:absolute;top:20px;right:20px;width:28px;height:28px;background:var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:800;color:var(--primary);">{{ $i+1 }}</div>
                    <h5 style="font-size:16px;font-weight:700;color:var(--primary);margin-bottom:10px;">{{ $step[1] }}</h5>
                    <p style="font-size:13.5px;color:#637082;line-height:1.7;margin:0;">{{ $step[2] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Banner -->
<section style="padding:80px 0;background:linear-gradient(135deg,#0f2044 0%,#1a3460 100%);position:relative;overflow:hidden;">
    <div style="position:absolute;top:0;right:0;width:400px;height:400px;border-radius:50%;background:rgba(201,168,76,0.05);transform:translate(150px,-150px);pointer-events:none;"></div>
    <div class="container position-relative text-center" data-aos="fade-up">
        <h2 style="font-family:'Playfair Display',serif;color:#fff;font-size:clamp(24px,4vw,40px);font-weight:700;margin-bottom:16px;">
            Need Attestation for a Specific Country?
        </h2>
        <p style="color:rgba(255,255,255,0.7);font-size:15px;max-width:560px;margin:0 auto 32px;">
            Contact our experts for a free consultation. We handle all countries, all document types.
        </p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="{{ url('/contact') }}"
               style="background:var(--gold);color:var(--primary);font-weight:700;font-size:15px;padding:14px 36px;border-radius:50px;text-decoration:none;transition:all 0.2s;"
               onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 8px 24px rgba(201,168,76,0.35)'"
               onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">
                <i class="fas fa-phone me-2"></i> Get Free Consultation
            </a>
            <a href="{{ route('services') }}"
               style="background:rgba(255,255,255,0.1);color:#fff;font-weight:600;font-size:15px;padding:14px 36px;border-radius:50px;text-decoration:none;border:1.5px solid rgba(255,255,255,0.2);transition:all 0.2s;"
               onmouseover="this.style.background='rgba(255,255,255,0.18)'"
               onmouseout="this.style.background='rgba(255,255,255,0.1)'">
                <i class="fas fa-concierge-bell me-2"></i> View All Services
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
function filterAttestations(query) {
    query = query.toLowerCase().trim();
    var cards = document.querySelectorAll('.att-card-wrap');
    var visible = 0;
    cards.forEach(function(card) {
        var title = card.dataset.title || '';
        var country = card.dataset.country || '';
        if (!query || title.includes(query) || country.includes(query)) {
            card.style.display = '';
            visible++;
        } else {
            card.style.display = 'none';
        }
    });
    document.getElementById('noResults').style.display = visible === 0 ? 'block' : 'none';
}
</script>
@endpush
