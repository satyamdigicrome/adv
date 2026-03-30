@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')

<!-- Stat Cards Row 1 -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon blue"><i class="fas fa-concierge-bell"></i></div>
            <div>
                <div class="stat-num">{{ $totalServices }}</div>
                <div class="stat-label">Total Services</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon gold"><i class="fas fa-certificate"></i></div>
            <div>
                <div class="stat-num">{{ $totalAttestations }}</div>
                <div class="stat-label">Attestation Services</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon green"><i class="fas fa-inbox"></i></div>
            <div>
                <div class="stat-num">{{ $totalEnquiries }}</div>
                <div class="stat-label">Total Enquiries</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon red"><i class="fas fa-bell"></i></div>
            <div>
                <div class="stat-num">{{ $newEnquiries + $newContacts }}</div>
                <div class="stat-label">New Leads</div>
            </div>
        </div>
    </div>
</div>

<!-- Stat Cards Row 2 -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <a href="{{ route('admin.blogs.index') }}" style="text-decoration:none;">
            <div class="stat-card">
                <div class="stat-icon blue"><i class="fas fa-newspaper"></i></div>
                <div>
                    <div class="stat-num">{{ $publishedBlogs }}</div>
                    <div class="stat-label">Published Posts</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6">
        <a href="{{ route('admin.reviews.index') }}" style="text-decoration:none;">
            <div class="stat-card">
                <div class="stat-icon gold"><i class="fas fa-star"></i></div>
                <div>
                    <div class="stat-num">{{ $totalReviews }}</div>
                    <div class="stat-label">Reviews</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6">
        <a href="{{ route('admin.contacts.index') }}" style="text-decoration:none;">
            <div class="stat-card">
                <div class="stat-icon green"><i class="fas fa-envelope"></i></div>
                <div>
                    <div class="stat-num">{{ $totalContacts }}</div>
                    <div class="stat-label">Contact Messages</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6">
        <a href="{{ route('admin.faqs.index') }}" style="text-decoration:none;">
            <div class="stat-card">
                <div class="stat-icon blue"><i class="fas fa-question-circle"></i></div>
                <div>
                    <div class="stat-num">{{ $totalFaqs }}</div>
                    <div class="stat-label">FAQs</div>
                </div>
            </div>
        </a>
    </div>
</div>

<!-- Quick Actions + Recent Enquiries -->
<div class="row g-4">
    <!-- Quick Actions -->
    <div class="col-lg-4">
        <div class="form-card h-100">
            <h6 class="fw-bold mb-3" style="color:var(--primary); font-size:15px;">Quick Actions</h6>
            <div class="d-grid gap-2">
                <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary-admin text-start">
                    <i class="fas fa-plus me-2"></i> New Blog Post
                </a>
                <a href="{{ route('admin.reviews.create') }}" class="btn btn-gold-admin text-start">
                    <i class="fas fa-star me-2"></i> Add Review
                </a>
                <a href="{{ route('admin.enquiries.index') }}" class="btn text-start" style="border:1.5px solid #e2e8f0; font-size:13.5px; border-radius:8px; padding:10px 16px; font-weight:600; color:#555;">
                    <i class="fas fa-inbox me-2"></i> View Enquiries
                    @if($newEnquiries > 0)
                        <span class="badge bg-danger ms-1">{{ $newEnquiries }}</span>
                    @endif
                </a>
                <a href="{{ route('admin.contacts.index') }}" class="btn text-start" style="border:1.5px solid #e2e8f0; font-size:13.5px; border-radius:8px; padding:10px 16px; font-weight:600; color:#555;">
                    <i class="fas fa-envelope me-2"></i> Contact Messages
                    @if($newContacts > 0)
                        <span class="badge bg-danger ms-1">{{ $newContacts }}</span>
                    @endif
                </a>
                <a href="{{ url('/') }}" target="_blank" class="btn text-start" style="border:1.5px solid #e2e8f0; font-size:13.5px; border-radius:8px; padding:10px 16px; font-weight:600; color:#555;">
                    <i class="fas fa-external-link-alt me-2"></i> View Website
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Enquiries -->
    <div class="col-lg-8">
        <div class="form-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h6 class="fw-bold mb-0" style="color:var(--primary); font-size:15px;">Recent Enquiries</h6>
                <a href="{{ route('admin.enquiries.index') }}" style="font-size:13px; color:var(--gold); font-weight:600;">View All</a>
            </div>

            @if($recentEnquiries->isEmpty())
                <div class="text-center py-4 text-muted">
                    <i class="fas fa-inbox fa-2x mb-2 opacity-25"></i>
                    <p class="mb-0 fs-6">No enquiries yet</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover" style="font-size:13.5px;">
                        <thead style="background:#f8fafc;">
                            <tr>
                                <th style="border:none; padding:10px 12px; color:#8a99b0; font-size:11px; font-weight:600; text-transform:uppercase;">Name</th>
                                <th style="border:none; padding:10px 12px; color:#8a99b0; font-size:11px; font-weight:600; text-transform:uppercase;">Phone</th>
                                <th style="border:none; padding:10px 12px; color:#8a99b0; font-size:11px; font-weight:600; text-transform:uppercase;">Service</th>
                                <th style="border:none; padding:10px 12px; color:#8a99b0; font-size:11px; font-weight:600; text-transform:uppercase;">Status</th>
                                <th style="border:none; padding:10px 12px; color:#8a99b0; font-size:11px; font-weight:600; text-transform:uppercase;">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentEnquiries as $enq)
                            <tr>
                                <td style="border-color:#f0f3f8; padding:11px 12px; font-weight:600;">
                                    <a href="{{ route('admin.enquiries.show', $enq) }}" style="color:inherit; text-decoration:none;">{{ $enq->name }}</a>
                                </td>
                                <td style="border-color:#f0f3f8; padding:11px 12px;">{{ $enq->phone }}</td>
                                <td style="border-color:#f0f3f8; padding:11px 12px;">
                                    <span style="font-size:12px; color:#8a99b0;">{{ $enq->page_name ?? '—' }}</span>
                                </td>
                                <td style="border-color:#f0f3f8; padding:11px 12px;">
                                    <span class="status-badge badge-{{ $enq->status }}">{{ ucfirst($enq->status) }}</span>
                                </td>
                                <td style="border-color:#f0f3f8; padding:11px 12px; color:#8a99b0; font-size:12px;">{{ $enq->created_at->format('d M, H:i') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
