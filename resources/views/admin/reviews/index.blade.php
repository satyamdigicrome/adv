@extends('admin.layouts.app')
@section('title', 'Google Reviews')
@section('page_title', 'Google Reviews')

@section('content')
<div class="page-header">
    <div>
        <h4>Google Reviews</h4>
        <div class="page-breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a> / Reviews</div>
    </div>
    <a href="{{ route('admin.reviews.create') }}" class="btn btn-gold-admin"><i class="fas fa-plus me-2"></i> Add Review</a>
</div>

<div class="admin-table">
    <table class="table">
        <thead>
            <tr>
                <th style="width:50px;">#</th>
                <th>Reviewer</th>
                <th>Rating</th>
                <th>Review</th>
                <th>Source</th>
                <th>Sort</th>
                <th>Status</th>
                <th style="text-align:center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reviews as $review)
            <tr>
                <td style="color:#8a99b0;font-size:12px;">{{ $loop->iteration }}</td>
                <td>
                    <div class="d-flex align-items-center gap-2">
                        <div style="width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,var(--primary),#1a3460);display:flex;align-items:center;justify-content:center;color:var(--gold);font-weight:700;font-size:13px;flex-shrink:0;">
                            {{ $review->initials }}
                        </div>
                        <div>
                            <div style="font-weight:700;font-size:13.5px;color:var(--primary);">{{ $review->reviewer_name }}</div>
                            @if($review->reviewer_location)
                            <div style="font-size:11.5px;color:#8a99b0;"><i class="fas fa-map-marker-alt me-1"></i>{{ $review->reviewer_location }}</div>
                            @endif
                        </div>
                    </div>
                </td>
                <td>
                    <div style="color:#f5b301;font-size:13px;white-space:nowrap;">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star{{ $i <= $review->rating ? '' : '-o' }}" style="{{ $i <= $review->rating ? 'color:#f5b301' : 'color:#ddd' }}"></i>
                        @endfor
                    </div>
                    <div style="font-size:11px;color:#8a99b0;">{{ $review->rating }}/5</div>
                </td>
                <td style="max-width:300px;">
                    <div style="font-size:13px;color:#637082;line-height:1.6;">{{ Str::limit($review->review_text, 100) }}</div>
                </td>
                <td>
                    <span style="font-size:12px;background:rgba(66,133,244,0.1);color:#4285f4;padding:3px 10px;border-radius:50px;font-weight:600;">
                        <i class="fab fa-google me-1"></i>{{ $review->source }}
                    </span>
                </td>
                <td style="font-size:13px;color:#8a99b0;">{{ $review->sort_order }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.reviews.toggle', $review) }}">
                        @csrf @method('PATCH')
                        <button type="submit" class="status-badge {{ $review->is_active ? 'badge-active' : 'badge-inactive' }}" style="border:none;cursor:pointer;background:none;padding:4px 12px;">
                            {{ $review->is_active ? 'Active' : 'Hidden' }}
                        </button>
                    </form>
                </td>
                <td style="text-align:center;">
                    <div class="d-flex gap-2 justify-content-center">
                        <a href="{{ route('admin.reviews.edit', $review) }}" class="btn btn-sm" style="background:rgba(201,168,76,0.1);color:var(--gold);border-radius:7px;padding:5px 10px;font-size:12px;">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form method="POST" action="{{ route('admin.reviews.destroy', $review) }}" onsubmit="return confirm('Delete this review?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm" style="background:rgba(239,68,68,0.08);color:#dc2626;border-radius:7px;padding:5px 10px;font-size:12px;border:none;">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center py-5" style="color:#8a99b0;">
                    <i class="fas fa-star fa-2x mb-3 d-block" style="opacity:0.3;"></i>
                    No reviews yet. <a href="{{ route('admin.reviews.create') }}" style="color:var(--gold);">Add your first review</a>.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    @if($reviews->hasPages())
    <div style="padding:16px 18px;border-top:1px solid #f0f3f8;">{{ $reviews->links() }}</div>
    @endif
</div>
@endsection
