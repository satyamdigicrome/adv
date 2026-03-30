@extends('admin.layouts.app')
@section('title', 'FAQs')
@section('page_title', 'FAQs')

@section('content')
<div class="page-header">
    <div>
        <h4>All FAQs</h4>
        <div class="page-breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a> / FAQs</div>
    </div>
    <a href="{{ route('admin.faqs.create') }}" class="btn btn-gold-admin"><i class="fas fa-plus me-2"></i> Add FAQ</a>
</div>

<div class="admin-table">
    <div style="padding:14px 18px;border-bottom:1px solid #f0f3f8;">
        <span style="font-size:13px;color:#8a99b0;">{{ $faqs->total() }} FAQs found</span>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Linked To</th>
                    <th>Type</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th style="text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($faqs as $faq)
                <tr>
                    <td>{{ $faq->id }}</td>
                    <td style="max-width:300px;">
                        <div style="font-weight:600;font-size:13.5px;">{{ Str::limit($faq->question, 80) }}</div>
                        <div style="font-size:12px;color:#8a99b0;margin-top:3px;">{{ Str::limit(strip_tags($faq->answer), 60) }}</div>
                    </td>
                    <td style="max-width:260px;">
                        @forelse($faq->services as $s)
                            <span style="display:inline-block;font-size:11px;background:rgba(99,102,241,0.1);color:#4f46e5;padding:3px 9px;border-radius:50px;font-weight:600;margin:2px;">
                                <i class="fas fa-concierge-bell me-1" style="font-size:9px;"></i>{{ Str::limit($s->title,25) }}
                            </span>
                        @empty @endforelse
                        @forelse($faq->attestations as $a)
                            <span style="display:inline-block;font-size:11px;background:rgba(201,168,76,0.1);color:#a8893a;padding:3px 9px;border-radius:50px;font-weight:600;margin:2px;">
                                <i class="fas fa-certificate me-1" style="font-size:9px;"></i>{{ Str::limit($a->title,25) }}
                            </span>
                        @empty @endforelse
                        @if($faq->services->isEmpty() && $faq->attestations->isEmpty())
                            <span style="color:#bbb;font-size:12px;font-style:italic;">General</span>
                        @endif
                    </td>
                    <td>
                        @if($faq->services->isNotEmpty() && $faq->attestations->isNotEmpty())
                            <span class="status-badge" style="background:rgba(16,185,129,0.1);color:#059669;font-size:10px;">Both</span>
                        @elseif($faq->services->isNotEmpty())
                            <span class="status-badge" style="background:rgba(99,102,241,0.1);color:#4f46e5;font-size:10px;">Service</span>
                        @elseif($faq->attestations->isNotEmpty())
                            <span class="status-badge" style="background:rgba(201,168,76,0.1);color:#a8893a;font-size:10px;">Attestation</span>
                        @else
                            <span class="status-badge" style="background:#f0f3f8;color:#8a99b0;font-size:10px;">General</span>
                        @endif
                    </td>
                    <td>{{ $faq->sort_order }}</td>
                    <td>
                        <span class="status-badge badge-{{ $faq->is_active ? 'active' : 'inactive' }}">
                            {{ $faq->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td style="text-align:center;">
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-sm btn-primary-admin" style="padding:5px 10px;font-size:12px;"><i class="fas fa-edit"></i></a>
                            <form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}" onsubmit="return confirm('Delete this FAQ?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm" style="background:rgba(239,68,68,0.1);color:#dc2626;border:none;border-radius:7px;padding:5px 10px;font-size:12px;"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5 text-muted">
                        <i class="fas fa-question-circle fa-2x mb-2 opacity-25 d-block"></i>
                        No FAQs yet. <a href="{{ route('admin.faqs.create') }}" style="color:var(--gold);">Add your first FAQ</a>.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($faqs->hasPages())
        <div style="padding:16px 18px;border-top:1px solid #f0f3f8;">{{ $faqs->links() }}</div>
    @endif
</div>
@endsection
