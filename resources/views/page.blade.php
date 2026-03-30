@extends('layouts.app')

@section('meta_title', (isset($page) && $page ? ($page->meta_title ?: $page->title) : 'Page') . ' | S K Document Centre')
@section('meta_description', isset($page) && $page ? $page->meta_description : '')
@section('meta_keywords',    isset($page) && $page ? $page->meta_keywords : '')

@section('content')

<!-- Page Hero -->
<div style="background:linear-gradient(135deg,#0f2044 0%,#1a3460 100%);padding:80px 0 60px;position:relative;overflow:hidden;">
    @if(isset($page) && $page && $page->banner_image_url)
    <div style="position:absolute;inset:0;background-image:url('{{ $page->banner_image_url }}');background-size:cover;background-position:center;opacity:0.15;"></div>
    @endif
    <div style="position:absolute;top:-80px;right:-80px;width:350px;height:350px;border-radius:50%;background:rgba(201,168,76,0.06);pointer-events:none;"></div>
    <div class="container position-relative text-center" data-aos="fade-up">
        <div style="display:inline-flex;align-items:center;gap:8px;background:rgba(201,168,76,0.12);border:1px solid rgba(201,168,76,0.25);border-radius:50px;padding:6px 16px;margin-bottom:16px;">
            <i class="fas fa-file-alt" style="color:var(--gold);font-size:12px;"></i>
            <span style="color:var(--gold);font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:1px;">S K Document Centre</span>
        </div>
        <h1 style="font-family:'Playfair Display',serif;color:#fff;font-size:clamp(28px,5vw,48px);font-weight:700;margin-bottom:12px;">
            {{ isset($page) && $page ? $page->title : 'Page Not Found' }}
        </h1>
        @if(isset($page) && $page && $page->subtitle)
        <p style="color:rgba(255,255,255,0.65);font-size:15px;max-width:520px;margin:0 auto;">{{ $page->subtitle }}</p>
        @endif
        <!-- Breadcrumb -->
        <nav style="margin-top:20px;">
            <ol style="list-style:none;padding:0;margin:0;display:flex;flex-wrap:wrap;gap:8px;font-size:12.5px;color:rgba(255,255,255,0.5);justify-content:center;">
                <li><a href="{{ url('/') }}" style="color:rgba(255,255,255,0.5);text-decoration:none;" onmouseover="this.style.color='var(--gold)'" onmouseout="this.style.color='rgba(255,255,255,0.5)'">Home</a></li>
                <li style="margin:0 4px;">/</li>
                <li style="color:var(--gold);">{{ isset($page) && $page ? $page->title : 'Page' }}</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Page Content -->
<section style="padding:80px 0;background:#f8fafc;">
    <div class="container">
        @if(isset($page) && $page && $page->content)
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="page-content" style="background:#fff;border-radius:20px;padding:48px;box-shadow:0 4px 24px rgba(15,32,68,0.07);border:1px solid #edf1f8;font-size:15.5px;line-height:1.9;color:#3d4a5c;" data-aos="fade-up">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
        @else
        <!-- No Content State -->
        <div class="text-center py-5" data-aos="fade-up">
            <div style="width:80px;height:80px;background:rgba(201,168,76,0.1);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;">
                <i class="fas fa-file-alt" style="font-size:32px;color:var(--gold);opacity:0.6;"></i>
            </div>
            <h3 style="font-size:22px;font-weight:700;color:var(--primary);margin-bottom:10px;">
                {{ isset($page) && $page ? 'Content Coming Soon' : 'Page Not Found' }}
            </h3>
            <p style="font-size:15px;color:#8a99b0;margin-bottom:28px;max-width:400px;margin-left:auto;margin-right:auto;">
                {{ isset($page) && $page ? 'We are currently updating this page. Please check back soon or contact us for more information.' : 'The page you are looking for does not exist or has been removed.' }}
            </p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="{{ url('/') }}"
                   style="background:var(--primary);color:#fff;font-weight:700;font-size:14px;padding:13px 30px;border-radius:50px;text-decoration:none;transition:all 0.2s;"
                   onmouseover="this.style.background='var(--gold)';this.style.color='var(--primary)'"
                   onmouseout="this.style.background='var(--primary)';this.style.color='#fff'">
                    <i class="fas fa-home me-2"></i> Back to Home
                </a>
                <a href="{{ route('contact') }}"
                   style="background:rgba(15,32,68,0.08);color:var(--primary);font-weight:600;font-size:14px;padding:13px 26px;border-radius:50px;text-decoration:none;border:1.5px solid #e2e8f0;transition:all 0.2s;"
                   onmouseover="this.style.borderColor='var(--gold)'"
                   onmouseout="this.style.borderColor='#e2e8f0'">
                    <i class="fas fa-headset me-2"></i> Contact Us
                </a>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- CTA -->
<section style="padding:60px 0;background:#fff;">
    <div class="container">
        <div style="background:linear-gradient(135deg,#0f2044,#1a3460);border-radius:20px;padding:48px 40px;text-align:center;position:relative;overflow:hidden;" data-aos="fade-up">
            <div style="position:absolute;top:-40px;right:-40px;width:200px;height:200px;border-radius:50%;background:rgba(201,168,76,0.08);pointer-events:none;"></div>
            <h3 style="font-family:'Playfair Display',serif;color:#fff;font-size:clamp(22px,4vw,34px);font-weight:700;margin-bottom:12px;">
                Need Document Attestation Services?
            </h3>
            <p style="color:rgba(255,255,255,0.65);font-size:14.5px;max-width:500px;margin:0 auto 28px;">
                Contact our experts for a free consultation. We handle all document types for all countries.
            </p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="{{ route('contact') }}"
                   style="background:var(--gold);color:var(--primary);font-weight:700;font-size:14.5px;padding:13px 32px;border-radius:50px;text-decoration:none;transition:all 0.2s;"
                   onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform=''">
                    <i class="fas fa-phone me-2"></i> Contact Us
                </a>
                <a href="{{ route('services') }}"
                   style="background:rgba(255,255,255,0.1);color:#fff;font-weight:600;font-size:14px;padding:13px 28px;border-radius:50px;text-decoration:none;border:1.5px solid rgba(255,255,255,0.2);">
                    <i class="fas fa-concierge-bell me-2"></i> Our Services
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
.page-content h1,.page-content h2,.page-content h3{color:var(--primary);font-weight:700;margin-top:32px;margin-bottom:14px;}
.page-content h2{font-size:24px;border-bottom:2px solid rgba(201,168,76,0.3);padding-bottom:8px;}
.page-content h3{font-size:19px;}
.page-content ul,.page-content ol{padding-left:24px;margin-bottom:18px;}
.page-content ul li,.page-content ol li{margin-bottom:8px;}
.page-content a{color:var(--gold);font-weight:600;}
.page-content a:hover{color:var(--primary);}
.page-content table{width:100%;border-collapse:collapse;margin:20px 0;}
.page-content table th{background:var(--primary);color:#fff;padding:12px 16px;text-align:left;}
.page-content table td{padding:10px 16px;border-bottom:1px solid #edf1f8;}
.page-content blockquote{border-left:4px solid var(--gold);padding:14px 20px;background:#f8fafc;border-radius:0 8px 8px 0;margin:20px 0;color:#637082;font-style:italic;}
.page-content img{max-width:100%;border-radius:10px;margin:12px 0;}
</style>
@endpush
