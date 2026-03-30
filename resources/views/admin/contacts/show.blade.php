@extends('admin.layouts.app')
@section('title', 'Contact Message')
@section('page_title', 'View Contact Message')

@section('content')
<div class="page-header">
    <div>
        <h4>Message from {{ $contact->name }}</h4>
        <div class="page-breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a> / <a href="{{ route('admin.contacts.index') }}">Contacts</a> / View</div>
    </div>
    <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm" style="border:1.5px solid #e2e8f0;font-size:13px;font-weight:600;color:#555;border-radius:8px;padding:8px 18px;">
        <i class="fas fa-arrow-left me-1"></i> Back
    </a>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="form-card">
            <div style="display:flex;align-items:center;gap:16px;margin-bottom:24px;padding-bottom:20px;border-bottom:1px solid #f0f3f8;">
                <div style="width:56px;height:56px;background:var(--primary);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:22px;font-weight:700;flex-shrink:0;">
                    {{ strtoupper(substr($contact->name, 0, 1)) }}
                </div>
                <div>
                    <div style="font-size:18px;font-weight:700;color:var(--primary);">{{ $contact->name }}</div>
                    <div style="font-size:13px;color:#8a99b0;">{{ $contact->created_at->format('d M Y, h:i A') }}</div>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <div style="font-size:12px;color:#8a99b0;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:5px;">Email</div>
                    <a href="mailto:{{ $contact->email }}" style="font-size:14px;font-weight:600;color:var(--primary);text-decoration:none;">{{ $contact->email }}</a>
                </div>
                @if($contact->phone)
                <div class="col-md-6">
                    <div style="font-size:12px;color:#8a99b0;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:5px;">Phone</div>
                    <a href="tel:{{ $contact->phone }}" style="font-size:14px;font-weight:600;color:var(--primary);text-decoration:none;">{{ $contact->phone }}</a>
                </div>
                @endif
                @if($contact->subject)
                <div class="col-12">
                    <div style="font-size:12px;color:#8a99b0;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:5px;">Subject</div>
                    <div style="font-size:14px;font-weight:600;color:var(--primary);">{{ $contact->subject }}</div>
                </div>
                @endif
            </div>

            @if($contact->message)
            <div>
                <div style="font-size:12px;color:#8a99b0;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:10px;">Message</div>
                <div style="background:#f8fafc;border-radius:12px;padding:20px;font-size:14.5px;color:#3d4a5c;line-height:1.8;border:1px solid #edf1f8;">
                    {{ $contact->message }}
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Status Update -->
        <div class="form-card mb-4">
            <h6 class="fw-bold mb-4" style="color:var(--primary);font-size:14px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">Update Status</h6>
            <form method="POST" action="{{ route('admin.contacts.status', $contact) }}">
                @csrf @method('PATCH')
                <div class="mb-3">
                    <select name="status" class="form-select">
                        <option value="new"     {{ $contact->status === 'new'     ? 'selected' : '' }}>New</option>
                        <option value="read"    {{ $contact->status === 'read'    ? 'selected' : '' }}>Read</option>
                        <option value="replied" {{ $contact->status === 'replied' ? 'selected' : '' }}>Replied</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary-admin w-100">Update Status</button>
            </form>
        </div>

        <!-- Quick Actions -->
        <div class="form-card mb-4">
            <h6 class="fw-bold mb-4" style="color:var(--primary);font-size:14px;border-bottom:1px solid #f0f3f8;padding-bottom:12px;">Quick Actions</h6>
            <div class="d-grid gap-2">
                <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}"
                   class="btn btn-gold-admin text-center">
                    <i class="fas fa-reply me-2"></i> Reply via Email
                </a>
                @if($contact->phone)
                <a href="tel:{{ $contact->phone }}" class="btn btn-primary-admin text-center">
                    <i class="fas fa-phone me-2"></i> Call Now
                </a>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}"
                   target="_blank"
                   class="btn text-center" style="background:#25D366;color:#fff;border-radius:8px;padding:10px;font-weight:600;font-size:13.5px;">
                    <i class="fab fa-whatsapp me-2"></i> WhatsApp
                </a>
                @endif
            </div>
        </div>

        <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" onsubmit="return confirm('Delete this message permanently?')">
            @csrf @method('DELETE')
            <button type="submit" class="btn w-100" style="background:rgba(239,68,68,0.08);color:#dc2626;border:1.5px solid rgba(239,68,68,0.2);font-size:13.5px;border-radius:8px;padding:10px;font-weight:600;">
                <i class="fas fa-trash me-2"></i> Delete Message
            </button>
        </form>
    </div>
</div>
@endsection
