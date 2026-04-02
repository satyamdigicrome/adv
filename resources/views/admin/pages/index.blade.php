@extends('admin.layouts.app')
@section('title', 'Content Pages')
@section('page_title', 'Content Pages')

@section('content')
<div class="page-header">
    <div>
        <h4>Content Pages</h4>
        <div class="page-breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a> / Content Pages</div>
    </div>
    {{-- <a href="{{ route('admin.pages.create') }}" class="btn btn-gold-admin">
        <i class="fas fa-plus me-2"></i> Add Page
    </a> --}}
</div>

<!-- Quick Create Shortcuts -->
@php
    $existingSlugs = $pages->pluck('slug')->toArray();
    $quickPages = [
        ['slug' => 'about-us',         'title' => 'About Us',          'icon' => 'fas fa-users',        'url' => route('about')],
        ['slug' => 'privacy-policy',   'title' => 'Privacy Policy',    'icon' => 'fas fa-shield-alt',   'url' => route('privacy.policy')],
        ['slug' => 'terms-conditions', 'title' => 'Terms & Conditions','icon' => 'fas fa-file-contract', 'url' => route('terms.conditions')],
    ];
@endphp
<div class="row g-3 mb-4">
    @foreach($quickPages as $qp)
    @if(!in_array($qp['slug'], $existingSlugs))
    <div class="col-md-4">
        <div style="background:rgba(201,168,76,0.06);border:1.5px dashed rgba(201,168,76,0.4);border-radius:12px;padding:16px 20px;display:flex;align-items:center;justify-content:space-between;">
            <div style="display:flex;align-items:center;gap:10px;">
                <i class="{{ $qp['icon'] }}" style="color:var(--gold);font-size:18px;"></i>
                <div>
                    <div style="font-size:13.5px;font-weight:700;color:var(--primary);">{{ $qp['title'] }}</div>
                    <div style="font-size:11.5px;color:#8a99b0;">Not created yet</div>
                </div>
            </div>
            <a href="{{ route('admin.pages.create') }}?slug={{ $qp['slug'] }}&title={{ urlencode($qp['title']) }}"
               style="background:var(--primary);color:#fff;font-size:12px;font-weight:700;padding:6px 14px;border-radius:7px;text-decoration:none;">
                <i class="fas fa-plus me-1"></i> Create
            </a>
        </div>
    </div>
    @endif
    @endforeach
</div>

<div class="admin-table">
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Slug (URL)</th>
                <th>Status</th>
                <th>Last Updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pages as $page)
            <tr>
                <td>
                    <div style="font-weight:700;color:var(--primary);">{{ $page->title }}</div>
                    @if($page->subtitle)<div style="font-size:12px;color:#8a99b0;">{{ Str::limit($page->subtitle, 60) }}</div>@endif
                </td>
                <td>
                    <code style="font-size:12.5px;background:#f0f3f8;padding:3px 8px;border-radius:5px;">{{ $page->slug }}</code>
                </td>
                <td>
                    <span class="status-badge {{ $page->is_active ? 'badge-active' : 'badge-inactive' }}">
                        {{ $page->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td style="font-size:12.5px;color:#8a99b0;">{{ $page->updated_at->format('d M Y') }}</td>
                <td>
                    <div class="d-flex gap-2 flex-wrap">
                        @php
                            $frontendUrl = match($page->slug) {
                                'about-us'         => route('about'),
                                'privacy-policy'   => route('privacy.policy'),
                                'terms-conditions' => route('terms.conditions'),
                                default            => route('page.show', $page->slug),
                            };
                        @endphp
                        <a href="{{ $frontendUrl }}" target="_blank" class="btn btn-sm" style="background:rgba(34,197,94,0.1);color:#16a34a;border-radius:7px;padding:5px 10px;font-size:12px;font-weight:600;">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm" style="background:rgba(201,168,76,0.1);color:var(--gold);border-radius:7px;padding:5px 10px;font-size:12px;font-weight:600;">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form method="POST" action="{{ route('admin.pages.destroy', $page) }}" onsubmit="return confirm('Delete this page?')">
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
                <td colspan="5" class="text-center py-5" style="color:#8a99b0;">
                    <i class="fas fa-file-alt fa-2x mb-3 d-block" style="opacity:0.3;"></i>
                    No pages created yet. Add About Us, Privacy Policy, etc.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
