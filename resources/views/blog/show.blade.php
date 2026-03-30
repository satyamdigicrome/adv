@extends('layouts.app')

@section('meta_title', ($blog->meta_title ?: $blog->title) . ' | S K Document Centre Blog')
@section('meta_description', $blog->meta_description ?: $blog->short_description)
@section('meta_keywords', $blog->meta_keywords)

@section('content')

<!-- ============ HERO ============ -->
<section style="background:linear-gradient(135deg,#0f2044 0%,#1a3460 100%);padding:70px 0 50px;position:relative;overflow:hidden;">
    <div style="position:absolute;inset:0;background:url('{{ $blog->image_url }}') center/cover no-repeat;opacity:0.08;"></div>
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="d-flex align-items-center justify-content-center gap-3 mb-4" data-aos="fade-down">
                    <a href="{{ route('blog') }}" style="color:rgba(255,255,255,0.6);font-size:13px;text-decoration:none;display:flex;align-items:center;gap:6px;"
                       onmouseover="this.style.color='var(--gold)'" onmouseout="this.style.color='rgba(255,255,255,0.6)'">
                        <i class="fas fa-arrow-left"></i> All Articles
                    </a>
                    <span style="color:rgba(255,255,255,0.3);">/</span>
                    <span style="background:rgba(201,168,76,0.2);color:var(--gold);font-size:12px;font-weight:700;padding:4px 14px;border-radius:50px;border:1px solid rgba(201,168,76,0.3);">{{ $blog->category }}</span>
                </div>
                <h1 style="font-size:clamp(26px,4.5vw,44px);font-weight:800;color:#fff;line-height:1.3;margin-bottom:20px;" data-aos="fade-up">
                    {{ $blog->title }}
                </h1>
                <div class="d-flex align-items-center justify-content-center gap-4 flex-wrap" style="font-size:13px;color:rgba(255,255,255,0.65);" data-aos="fade-up" data-aos-delay="100">
                    <span><i class="fas fa-user me-1" style="color:var(--gold);"></i> {{ $blog->author }}</span>
                    <span><i class="fas fa-calendar me-1" style="color:var(--gold);"></i> {{ $blog->published_at->format('d M Y') }}</span>
                    <span><i class="fas fa-clock me-1" style="color:var(--gold);"></i> {{ $blog->reading_time }}</span>
                    <span><i class="fas fa-folder me-1" style="color:var(--gold);"></i> {{ $blog->category }}</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ MAIN CONTENT ============ -->
<section style="background:var(--light-bg,#f8fafc);padding:60px 0 80px;">
    <div class="container">
        <div class="row g-5">

            <!-- Article -->
            <div class="col-lg-8">

                <!-- Featured Image -->
                <div style="border-radius:20px;overflow:hidden;box-shadow:0 8px 40px rgba(15,32,68,0.12);margin-bottom:44px;" data-aos="fade-up">
                    <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}"
                         style="width:100%;height:auto;display:block;max-height:500px;object-fit:cover;"
                         onerror="this.src='https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=900&q=80'">
                </div>

                <!-- Content -->
                <div style="background:#fff;border-radius:20px;padding:44px 40px;box-shadow:0 4px 20px rgba(15,32,68,0.05);border:1.5px solid #edf1f8;" data-aos="fade-up">
                    @if($blog->short_description)
                    <div style="background:rgba(201,168,76,0.08);border-left:4px solid var(--gold);border-radius:0 10px 10px 0;padding:18px 22px;margin-bottom:32px;">
                        <p style="font-size:16px;color:#4a5568;line-height:1.8;font-style:italic;margin:0;font-weight:500;">{{ $blog->short_description }}</p>
                    </div>
                    @endif

                    <div class="blog-content" style="font-size:15.5px;line-height:1.9;color:#374151;">
                        {!! $blog->long_description !!}
                    </div>

                    <!-- Author & Share -->
                    <div style="border-top:1.5px solid #f0f3f8;margin-top:44px;padding-top:28px;">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-3">
                                    <div style="width:52px;height:52px;background:linear-gradient(135deg,var(--primary),#1a3460);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--gold);font-weight:800;font-size:18px;flex-shrink:0;">
                                        {{ strtoupper(substr($blog->author, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div style="font-weight:700;color:var(--primary);font-size:14px;">{{ $blog->author }}</div>
                                        <div style="font-size:12px;color:#8a99b0;">S K Document Centre</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3 mt-md-0">
                                <div class="d-flex align-items-center gap-2 justify-content-md-end flex-wrap">
                                    <span style="font-size:13px;font-weight:600;color:#637082;">Share:</span>
                                    <a href="https://wa.me/?text={{ urlencode($blog->title . ' - ' . request()->url()) }}" target="_blank"
                                       style="width:36px;height:36px;background:#25d366;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#fff;text-decoration:none;font-size:14px;">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank"
                                       style="width:36px;height:36px;background:#1877f2;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#fff;text-decoration:none;font-size:14px;">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($blog->title) }}&url={{ urlencode(request()->url()) }}" target="_blank"
                                       style="width:36px;height:36px;background:#1da1f2;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#fff;text-decoration:none;font-size:14px;">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <button onclick="copyLink()" style="width:36px;height:36px;background:#e2e8f0;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#555;border:none;cursor:pointer;font-size:14px;" title="Copy Link">
                                        <i class="fas fa-link" id="copyIcon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Posts -->
                @if($related->isNotEmpty())
                <div style="margin-top:50px;">
                    <h3 style="font-size:22px;font-weight:800;color:var(--primary);margin-bottom:28px;">Related Articles</h3>
                    <div class="row g-4">
                        @foreach($related as $rel)
                        <div class="col-md-4">
                            <article style="background:#fff;border-radius:16px;overflow:hidden;border:1.5px solid #edf1f8;box-shadow:0 4px 16px rgba(15,32,68,0.06);height:100%;display:flex;flex-direction:column;transition:all 0.3s;"
                                     onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 32px rgba(15,32,68,0.1)'"
                                     onmouseout="this.style.transform='';this.style.boxShadow='0 4px 16px rgba(15,32,68,0.06)'">
                                <div style="height:160px;overflow:hidden;">
                                    <img src="{{ $rel->image_url }}" alt="{{ $rel->title }}"
                                         style="width:100%;height:100%;object-fit:cover;transition:transform 0.4s;"
                                         onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform=''"
                                         onerror="this.src='https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&q=70'">
                                </div>
                                <div style="padding:18px;flex:1;display:flex;flex-direction:column;">
                                    <span style="background:rgba(201,168,76,0.12);color:#a8893a;font-size:10px;font-weight:700;padding:2px 8px;border-radius:50px;width:fit-content;margin-bottom:8px;">{{ $rel->category }}</span>
                                    <h5 style="font-size:13.5px;font-weight:700;color:var(--primary);line-height:1.4;margin-bottom:12px;flex:1;">
                                        <a href="{{ route('blog.show', $rel->slug) }}" style="color:inherit;text-decoration:none;"
                                           onmouseover="this.style.color='var(--gold)'" onmouseout="this.style.color='var(--primary)'">
                                            {{ Str::limit($rel->title, 65) }}
                                        </a>
                                    </h5>
                                    <div style="font-size:11.5px;color:#8a99b0;"><i class="fas fa-calendar me-1"></i>{{ $rel->published_at->format('d M Y') }}</div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">

                <!-- CTA -->
                <div style="background:linear-gradient(135deg,var(--primary),#1a3460);border-radius:16px;padding:28px;text-align:center;margin-bottom:28px;position:sticky;top:20px;">
                    <i class="fas fa-certificate" style="font-size:38px;color:var(--gold);margin-bottom:14px;display:block;"></i>
                    <h5 style="color:#fff;font-size:17px;font-weight:700;margin-bottom:10px;">Need Document Attestation?</h5>
                    <p style="color:rgba(255,255,255,0.7);font-size:13px;line-height:1.7;margin-bottom:20px;">Get expert help for MEA, Embassy, Apostille & more. Fast turnaround guaranteed.</p>
                    <a href="{{ route('contact') }}"
                       style="display:block;background:var(--gold);color:var(--primary);padding:12px;border-radius:10px;font-weight:700;font-size:13.5px;text-decoration:none;margin-bottom:10px;"
                       onmouseover="this.style.background='#e2c47a'" onmouseout="this.style.background='var(--gold)'">
                        <i class="fas fa-headset me-2"></i> Get Free Quote
                    </a>
                    <a href="https://wa.me/919310624082" target="_blank"
                       style="display:block;background:rgba(255,255,255,0.1);color:#fff;padding:11px;border-radius:10px;font-weight:600;font-size:13px;text-decoration:none;"
                       onmouseover="this.style.background='rgba(255,255,255,0.15)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">
                        <i class="fab fa-whatsapp me-2"></i> Chat on WhatsApp
                    </a>
                </div>

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
                            <div style="font-size:13px;font-weight:600;color:var(--primary);line-height:1.4;"
                                 onmouseover="this.style.color='var(--gold)'" onmouseout="this.style.color='var(--primary)'">
                                {{ Str::limit($r->title, 55) }}
                            </div>
                            <div style="font-size:11px;color:#8a99b0;margin-top:4px;"><i class="fas fa-calendar me-1"></i>{{ $r->published_at->format('d M Y') }}</div>
                        </div>
                    </a>
                    @endforeach
                </div>
                @endif

                <!-- Services Quick Links -->
                <div style="background:#fff;border-radius:16px;padding:28px;border:1.5px solid #edf1f8;box-shadow:0 4px 20px rgba(15,32,68,0.05);">
                    <h5 style="font-size:16px;font-weight:700;color:var(--primary);margin-bottom:18px;padding-bottom:12px;border-bottom:1px solid #f0f3f8;">
                        <i class="fas fa-concierge-bell me-2" style="color:var(--gold);"></i> Our Services
                    </h5>
                    @foreach(\App\Models\Service::active()->ordered()->limit(6)->get() as $srv)
                    <a href="{{ route('services.show', $srv->slug) }}"
                       style="display:flex;align-items:center;gap:8px;padding:9px 0;border-bottom:1px solid #f8fafc;text-decoration:none;font-size:13px;font-weight:600;color:var(--primary);transition:color 0.2s;"
                       onmouseover="this.style.color='var(--gold)'" onmouseout="this.style.color='var(--primary)'">
                        <i class="fas fa-chevron-right" style="font-size:9px;color:var(--gold);"></i>
                        {{ $srv->title }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
.blog-content h1,.blog-content h2,.blog-content h3,.blog-content h4,.blog-content h5{color:var(--primary);font-weight:700;margin-top:32px;margin-bottom:14px;}
.blog-content h2{font-size:24px;}
.blog-content h3{font-size:20px;}
.blog-content h4{font-size:17px;}
.blog-content p{margin-bottom:20px;color:#374151;}
.blog-content ul,.blog-content ol{padding-left:24px;margin-bottom:20px;}
.blog-content li{margin-bottom:8px;color:#374151;line-height:1.8;}
.blog-content a{color:var(--gold);text-decoration:underline;}
.blog-content a:hover{color:var(--primary);}
.blog-content blockquote{border-left:4px solid var(--gold);background:rgba(201,168,76,0.06);padding:16px 22px;border-radius:0 10px 10px 0;margin:24px 0;font-style:italic;color:#4a5568;}
.blog-content img{max-width:100%;height:auto;border-radius:12px;margin:16px 0;}
.blog-content table{width:100%;border-collapse:collapse;margin-bottom:24px;}
.blog-content table th,.blog-content table td{border:1px solid #e2e8f0;padding:10px 14px;font-size:14px;}
.blog-content table th{background:var(--primary);color:#fff;font-weight:600;}
.blog-content table tr:nth-child(even){background:#f8fafc;}
.blog-content pre{background:#1e293b;color:#e2e8f0;padding:20px;border-radius:10px;overflow-x:auto;margin-bottom:20px;}
.blog-content code{background:#f1f5f9;color:#dc2626;padding:2px 6px;border-radius:4px;font-size:14px;}
.blog-content pre code{background:none;color:inherit;padding:0;}
.blog-content strong{color:var(--primary);}
.blog-content hr{border:none;border-top:2px solid #f0f3f8;margin:36px 0;}
</style>
@endpush

@push('scripts')
<script>
function copyLink() {
    navigator.clipboard.writeText(window.location.href).then(function() {
        var icon = document.getElementById('copyIcon');
        icon.className = 'fas fa-check';
        icon.parentElement.style.background = 'rgba(34,197,94,0.15)';
        icon.parentElement.style.color = '#16a34a';
        setTimeout(function() {
            icon.className = 'fas fa-link';
            icon.parentElement.style.background = '#e2e8f0';
            icon.parentElement.style.color = '#555';
        }, 2000);
    });
}
</script>
@endpush
