@extends('admin.layouts.app')
@section('title', 'Enquiry — ' . $enquiry->name)
@section('page_title', 'Enquiry Detail')

@section('content')

<div class="page-header">
    <div>
        <h4>Enquiry #{{ $enquiry->id }}</h4>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a> /
            <a href="{{ route('admin.enquiries.index') }}">Enquiries</a> / Detail
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.enquiries.index') }}" class="btn btn-sm"
           style="border:1.5px solid #e2e8f0; font-size:13px; font-weight:600; color:#555; border-radius:8px; padding:8px 16px;">
            <i class="fas fa-arrow-left me-1"></i> Back
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="form-card">
            <!-- Header -->
            <div class="d-flex align-items-center gap-3 mb-4 pb-3" style="border-bottom:1px solid #f0f3f8;">
                <div style="width:56px; height:56px; background:var(--primary); border-radius:12px; display:flex; align-items:center; justify-content:center; color:var(--gold); font-size:22px; font-weight:700; flex-shrink:0;">
                    {{ strtoupper(substr($enquiry->name, 0, 1)) }}
                </div>
                <div>
                    <div style="font-size:18px; font-weight:700; color:var(--primary);">{{ $enquiry->name }}</div>
                    <div style="font-size:13px; color:#8a99b0;">Received: {{ $enquiry->created_at->format('d M Y, h:i A') }}</div>
                </div>
                <div class="ms-auto">
                    <span class="status-badge badge-{{ $enquiry->status }}" style="font-size:12px; padding:6px 14px;">{{ ucfirst($enquiry->status) }}</span>
                </div>
            </div>

            <!-- Details grid -->
            <div class="row g-3">
                <div class="col-sm-6">
                    <div style="background:#f8fafc; border-radius:10px; padding:16px;">
                        <div style="font-size:11px; color:#8a99b0; text-transform:uppercase; letter-spacing:1px; font-weight:600; margin-bottom:6px;">Email</div>
                        <a href="mailto:{{ $enquiry->email }}" style="font-size:14px; font-weight:600; color:var(--primary);">{{ $enquiry->email }}</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div style="background:#f8fafc; border-radius:10px; padding:16px;">
                        <div style="font-size:11px; color:#8a99b0; text-transform:uppercase; letter-spacing:1px; font-weight:600; margin-bottom:6px;">Phone</div>
                        <a href="tel:{{ $enquiry->phone }}" style="font-size:14px; font-weight:600; color:var(--primary);">{{ $enquiry->phone }}</a>
                    </div>
                </div>
                <div class="col-12">
                    <div style="background:#f8fafc; border-radius:10px; padding:16px;">
                        <div style="font-size:11px; color:#8a99b0; text-transform:uppercase; letter-spacing:1px; font-weight:600; margin-bottom:6px;">Address</div>
                        <div style="font-size:14px; color:var(--primary);">{{ $enquiry->address }}</div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div style="background:#f8fafc; border-radius:10px; padding:16px;">
                        <div style="font-size:11px; color:#8a99b0; text-transform:uppercase; letter-spacing:1px; font-weight:600; margin-bottom:6px;">Enquired For</div>
                        <div style="font-size:14px; font-weight:600; color:var(--primary);">{{ $enquiry->page_name ?? 'General Enquiry' }}</div>
                        @if($enquiry->service)
                            <a href="{{ route('services.show', $enquiry->service->slug) }}" target="_blank" style="font-size:12px; color:var(--gold);">
                                View Service <i class="fas fa-external-link-alt ms-1"></i>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div style="background:#f8fafc; border-radius:10px; padding:16px;">
                        <div style="font-size:11px; color:#8a99b0; text-transform:uppercase; letter-spacing:1px; font-weight:600; margin-bottom:6px;">Received</div>
                        <div style="font-size:14px; color:var(--primary);">{{ $enquiry->created_at->format('d M Y') }}</div>
                        <div style="font-size:12px; color:#8a99b0;">{{ $enquiry->created_at->format('h:i A') }} · {{ $enquiry->created_at->diffForHumans() }}</div>
                    </div>
                </div>

                @if($enquiry->message)
                <div class="col-12">
                    <div style="background:#f8fafc; border-radius:10px; padding:16px;">
                        <div style="font-size:11px; color:#8a99b0; text-transform:uppercase; letter-spacing:1px; font-weight:600; margin-bottom:8px;">Message</div>
                        <p style="font-size:14px; color:var(--primary); margin:0; line-height:1.7;">{{ $enquiry->message }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Change Status -->
        <div class="form-card mb-4">
            <h6 class="fw-bold mb-3" style="color:var(--primary); font-size:15px; border-bottom:1px solid #f0f3f8; padding-bottom:12px;">
                <i class="fas fa-tag me-2" style="color:var(--gold);"></i> Update Status
            </h6>
            <form method="POST" action="{{ route('admin.enquiries.status', $enquiry) }}">
                @csrf @method('PATCH')
                <div class="mb-3">
                    <select name="status" class="form-select">
                        <option value="new"     {{ $enquiry->status==='new'     ? 'selected' : '' }}>New</option>
                        <option value="read"    {{ $enquiry->status==='read'    ? 'selected' : '' }}>Read</option>
                        <option value="replied" {{ $enquiry->status==='replied' ? 'selected' : '' }}>Replied</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary-admin w-100">Update Status</button>
            </form>
        </div>

        <!-- Actions -->
        <div class="form-card">
            <h6 class="fw-bold mb-3" style="color:var(--primary); font-size:15px; border-bottom:1px solid #f0f3f8; padding-bottom:12px;">
                <i class="fas fa-bolt me-2" style="color:var(--gold);"></i> Quick Actions
            </h6>
            <div class="d-grid gap-2">
                <a href="mailto:{{ $enquiry->email }}" class="btn btn-primary-admin text-start">
                    <i class="fas fa-envelope me-2"></i> Send Email Reply
                </a>
                <a href="tel:{{ $enquiry->phone }}" class="btn btn-gold-admin text-start">
                    <i class="fas fa-phone me-2"></i> Call Now
                </a>
                <a href="https://wa.me/{{ preg_replace('/\D/', '', $enquiry->phone) }}" target="_blank"
                   class="btn text-start" style="background:rgba(37,211,102,0.1); color:#16a34a; border:1px solid rgba(37,211,102,0.2); border-radius:8px; padding:10px 16px; font-size:13.5px; font-weight:600;">
                    <i class="fab fa-whatsapp me-2"></i> WhatsApp
                </a>
                <div class="section-divider"></div>
                <form method="POST" action="{{ route('admin.enquiries.destroy', $enquiry) }}"
                      onsubmit="return confirm('Delete this enquiry permanently?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn w-100"
                            style="background:rgba(239,68,68,0.08); color:#dc2626; border:1.5px solid rgba(239,68,68,0.2); font-size:13.5px; border-radius:8px; padding:10px; font-weight:600;">
                        <i class="fas fa-trash me-2"></i> Delete Enquiry
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
