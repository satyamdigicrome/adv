@extends('layouts.app')

@section('meta_title', 'Blog – Attestation Tips, Country Guides & News | S K Document Centre')
@section('meta_description', 'Read our latest blog posts on document attestation, apostille, embassy attestation, country guides, translation tips and more from S K Document Centre.')
@section('meta_keywords', 'document attestation blog, apostille guide, embassy attestation tips, MEA attestation, attestation news india')

@section('content')

<!-- ============ HERO ============ -->
<section style="background:linear-gradient(135deg,#0f2044 0%,#1a3460 100%);padding:80px 0 60px;position:relative;overflow:hidden;">
    <div style="position:absolute;top:-80px;right:-80px;width:400px;height:400px;background:rgba(201,168,76,0.05);border-radius:50%;"></div>
    <div style="position:absolute;bottom:-120px;left:-60px;width:300px;height:300px;background:rgba(255,255,255,0.03);border-radius:50%;"></div>
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-7" data-aos="fade-right">
                <span style="display:inline-block;background:rgba(201,168,76,0.2);color:var(--gold);font-size:12px;font-weight:700;letter-spacing:2px;text-transform:uppercase;padding:6px 16px;border-radius:50px;border:1px solid rgba(201,168,76,0.3);margin-bottom:16px;">Knowledge Hub</span>
                <h1 style="font-size:clamp(32px,5vw,52px);font-weight:800;color:#fff;line-height:1.2;margin-bottom:16px;">
                    Attestation <span style="color:var(--gold);">Insights</span><br>& Expert Guides
                </h1>
                <p style="font-size:16px;color:rgba(255,255,255,0.7);line-height:1.8;max-width:520px;">
                    Stay informed with the latest news, tips and guides on document attestation, apostille, embassy processes and more.
                </p>
            </div>
            <div class="col-lg-5 mt-4 mt-lg-0" data-aos="fade-left">
                <div class="row g-3">
                    <div class="col-6">
                        <div style="background:rgba(255,255,255,0.07);backdrop-filter:blur(10px);border-radius:16px;padding:20px;border:1px solid rgba(255,255,255,0.1);text-align:center;">
                            <div style="font-size:32px;font-weight:800;color:var(--gold);">{{ \App\Models\Blog::active()->published()->count() }}+</div>
                            <div style="font-size:12px;color:rgba(255,255,255,0.6);margin-top:4px;">Articles Published</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div style="background:rgba(255,255,255,0.07);backdrop-filter:blur(10px);border-radius:16px;padding:20px;border:1px solid rgba(255,255,255,0.1);text-align:center;">
                            <div style="font-size:32px;font-weight:800;color:var(--gold);">{{ $categories->count() }}+</div>
                            <div style="font-size:12px;color:rgba(255,255,255,0.6);margin-top:4px;">Topics Covered</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ FEATURED POST ============ -->
@if($featured)
<section style="background:#fff;padding:50px 0 0;">
    <div class="container">
        <div class="row g-0 align-items-stretch" style="border-radius:20px;overflow:hidden;box-shadow:0 8px 40px rgba(15,32,68,0.12);border:1px solid #edf1f8;" data-aos="fade-up">
            <div class="col-lg-6" style="min-height:380px;">
                <img src="{{ $featured->image_url }}" alt="{{ $featured->title }}"
                     style="width:100%;height:100%;object-fit:cover;display:block;"
                     onerror="this.src='https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=800&q=80'">
            </div>
            <div class="col-lg-6" style="padding:44px 40px;display:flex;flex-direction:column;justify-content:center;">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <span style="background:var(--gold);color:var(--primary);font-size:11px;font-weight:700;padding:4px 14px;border-radius:50px;text-transform:uppercase;letter-spacing:1px;">Featured</span>
                    <span style="background:rgba(201,168,76,0.1);color:#a8893a;font-size:12px;font-weight:600;padding:4px 12px;border-radius:50px;">{{ $featured->category }}</span>
                </div>
                <h2 style="font-size:clamp(20px,3vw,28px);font-weight:800;color:var(--primary);line-height:1.3;margin-bottom:14px;">
                    <a href="{{ route('blog.show', $featured->slug) }}" style="color:inherit;text-decoration:none;"
                       onmouseover="this.style.color='var(--gold)'" onmouseout="this.style.color='var(--primary)'">
                        {{ $featured->title }}
                    </a>
                </h2>
                <p style="font-size:15px;color:#637082;line-height:1.8;margin-bottom:22px;">{{ Str::limit($featured->short_description, 180) }}</p>
                <div class="d-flex align-items-center gap-4 mb-4" style="font-size:13px;color:#8a99b0;">
                    <span><i class="fas fa-user me-1" style="color:var(--gold);"></i> {{ $featured->author }}</span>
                    <span><i class="fas fa-calendar me-1" style="color:var(--gold);"></i> {{ $featured->published_at->format('d M Y') }}</span>
                    <span><i class="fas fa-clock me-1" style="color:var(--gold);"></i> {{ $featured->reading_time }}</span>
                </div>
                <a href="{{ route('blog.show', $featured->slug) }}"
                   style="display:inline-flex;align-items:center;gap:8px;background:var(--primary);color:#fff;padding:12px 28px;border-radius:10px;font-weight:700;font-size:14px;text-decoration:none;width:fit-content;transition:all 0.2s;"
                   onmouseover="this.style.background='var(--gold)';this.style.color='var(--primary)'"
                   onmouseout="this.style.background='var(--primary)';this.style.color='#fff'">
                    Read Full Article <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@endif

<!-- ============ MAIN CONTENT ============ -->
<section style="background:var(--light-bg,#f8fafc);padding:60px 0 80px;">
    <div class="container">
        <div class="row g-5">

            <!-- Blog Grid -->
            <div class="col-lg-8">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h3 style="font-size:20px;font-weight:700;color:var(--primary);margin:0;">
                        Latest Articles
                        <span style="font-size:13px;font-weight:500;color:#8a99b0;margin-left:8px;">({{ $blogs->total() }} posts)</span>
                    </h3>
                </div>

                @forelse($blogs as $blog)
                <article style="background:#fff;border-radius:18px;overflow:hidden;border:1.5px solid #edf1f8;box-shadow:0 4px 20px rgba(15,32,68,0.05);margin-bottom:28px;display:flex;flex-direction:column;transition:all 0.3s;"
                         onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 12px 40px rgba(15,32,68,0.1)'"
                         onmouseout="this.style.transform='';this.style.boxShadow='0 4px 20px rgba(15,32,68,0.05)'">
                    <div class="row g-0">
                        <div class="col-md-4" style="min-height:200px;">
                            <a href="{{ route('blog.show', $blog->slug) }}" style="display:block;height:100%;">
                                <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}"
                                     style="width:100%;height:100%;object-fit:cover;display:block;"
                                     onerror="this.src='https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&q=80'">
                            </a>
                        </div>
                        <div class="col-md-8" style="padding:28px 28px 28px 24px;display:flex;flex-direction:column;">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span style="background:rgba(201,168,76,0.12);color:#a8893a;font-size:11px;font-weight:700;padding:3px 10px;border-radius:50px;">{{ $blog->category }}</span>
                                <span style="font-size:12px;color:#8a99b0;"><i class="fas fa-clock me-1"></i>{{ $blog->reading_time }}</span>
                            </div>
                            <h4 style="font-size:17px;font-weight:700;color:var(--primary);line-height:1.4;margin-bottom:10px;flex:1;">
                                <a href="{{ route('blog.show', $blog->slug) }}" style="color:inherit;text-decoration:none;"
                                   onmouseover="this.style.color='var(--gold)'" onmouseout="this.style.color='var(--primary)'">
                                    {{ $blog->title }}
                                </a>
                            </h4>
                            <p style="font-size:13.5px;color:#637082;line-height:1.7;margin-bottom:16px;">{{ Str::limit($blog->short_description, 120) }}</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <div style="font-size:12px;color:#8a99b0;">
                                    <i class="fas fa-user me-1"></i> {{ $blog->author }}
                                    <span class="ms-3"><i class="fas fa-calendar me-1"></i> {{ $blog->published_at->format('d M Y') }}</span>
                                </div>
                                <a href="{{ route('blog.show', $blog->slug) }}"
                                   style="display:inline-flex;align-items:center;gap:6px;color:var(--gold);font-size:13px;font-weight:700;text-decoration:none;"
                                   onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--gold)'">
                                    Read More <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
                @empty
                <div style="text-align:center;padding:80px 20px;background:#fff;border-radius:18px;border:1.5px solid #edf1f8;">
                    <i class="fas fa-newspaper" style="font-size:48px;color:#ddd;margin-bottom:16px;display:block;"></i>
                    <h4 style="color:var(--primary);margin-bottom:8px;">No Articles Yet</h4>
                    <p style="color:#8a99b0;">Check back soon for the latest attestation tips and guides.</p>
                </div>
                @endforelse

                <!-- Pagination -->
                @if($blogs->hasPages())
                <div class="mt-4">
                    {{ $blogs->links() }}
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">

                <!-- Categories -->
                @if($categories->isNotEmpty())
                <div style="background:#fff;border-radius:16px;padding:28px;border:1.5px solid #edf1f8;box-shadow:0 4px 20px rgba(15,32,68,0.05);margin-bottom:28px;">
                    <h5 style="font-size:16px;font-weight:700;color:var(--primary);margin-bottom:18px;padding-bottom:12px;border-bottom:1px solid #f0f3f8;">
                        <i class="fas fa-tags me-2" style="color:var(--gold);"></i> Categories
                    </h5>
                    @foreach($categories as $cat)
                    <a href="{{ route('blog') }}?category={{ urlencode($cat->category) }}"
                       style="display:flex;align-items:center;justify-content:space-between;padding:10px 0;border-bottom:1px solid #f8fafc;text-decoration:none;transition:all 0.2s;"
                       onmouseover="this.style.paddingLeft='6px'" onmouseout="this.style.paddingLeft='0'">
                        <span style="font-size:13.5px;font-weight:600;color:var(--primary);">
                            <i class="fas fa-chevron-right me-2" style="color:var(--gold);font-size:10px;"></i>{{ $cat->category }}
                        </span>
                        <span style="background:rgba(201,168,76,0.12);color:#a8893a;font-size:11px;font-weight:700;padding:2px 9px;border-radius:50px;">{{ $cat->count }}</span>
                    </a>
                    @endforeach
                </div>
                @endif

                <!-- Recent Posts -->
                @if($recent->isNotEmpty())
                <div style="background:#fff;border-radius:16px;padding:28px;border:1.5px solid #edf1f8;box-shadow:0 4px 20px rgba(15,32,68,0.05);margin-bottom:28px;">
                    <h5 style="font-size:16px;font-weight:700;color:var(--primary);margin-bottom:18px;padding-bottom:12px;border-bottom:1px solid #f0f3f8;">
                        <i class="fas fa-clock me-2" style="color:var(--gold);"></i> Recent Posts
                    </h5>
                    @foreach($recent as $r)
                    <a href="{{ route('blog.show', $r->slug) }}" style="display:flex;gap:12px;padding:10px 0;border-bottom:1px solid #f8fafc;text-decoration:none;">
                        <img src="{{ $r->image_url }}" alt="{{ $r->title }}"
                             style="width:64px;height:52px;object-fit:cover;border-radius:8px;flex-shrink:0;"
                             onerror="this.src='https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=120&q=60'">
                        <div>
                            <div style="font-size:13px;font-weight:600;color:var(--primary);line-height:1.4;transition:color 0.2s;"
                                 onmouseover="this.style.color='var(--gold)'" onmouseout="this.style.color='var(--primary)'">
                                {{ Str::limit($r->title, 55) }}
                            </div>
                            <div style="font-size:11px;color:#8a99b0;margin-top:4px;"><i class="fas fa-calendar me-1"></i>{{ $r->published_at->format('d M Y') }}</div>
                        </div>
                    </a>
                    @endforeach
                </div>
                @endif

                <!-- CTA -->
                <div style="background:linear-gradient(135deg,var(--primary),#1a3460);border-radius:16px;padding:28px;text-align:center;">
                    <i class="fas fa-file-alt" style="font-size:36px;color:var(--gold);margin-bottom:14px;display:block;"></i>
                    <h5 style="color:#fff;font-size:17px;font-weight:700;margin-bottom:10px;">Need Attestation Help?</h5>
                    <p style="color:rgba(255,255,255,0.7);font-size:13px;line-height:1.7;margin-bottom:20px;">Our experts are ready to help you with all document attestation requirements.</p>
                    <a href="{{ route('contact') }}"
                       style="display:block;background:var(--gold);color:var(--primary);padding:12px;border-radius:10px;font-weight:700;font-size:13.5px;text-decoration:none;transition:all 0.2s;"
                       onmouseover="this.style.background='#e2c47a'" onmouseout="this.style.background='var(--gold)'">
                        <i class="fas fa-headset me-2"></i> Get Free Consultation
                    </a>
                    <a href="https://wa.me/919310624082" target="_blank"
                       style="display:block;background:rgba(255,255,255,0.1);color:#fff;padding:11px;border-radius:10px;font-weight:600;font-size:13px;text-decoration:none;margin-top:10px;"
                       onmouseover="this.style.background='rgba(255,255,255,0.15)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">
                        <i class="fab fa-whatsapp me-2"></i> WhatsApp Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
