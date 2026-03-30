@extends('admin.layouts.app')
@section('title', 'Blog Posts')
@section('page_title', 'Blog Posts')

@section('content')
<div class="page-header">
    <div>
        <h4>Blog Posts</h4>
        <div class="page-breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a> / Blog Posts</div>
    </div>
    <a href="{{ route('admin.blogs.create') }}" class="btn btn-gold-admin"><i class="fas fa-plus me-2"></i> New Post</a>
</div>

<!-- Filter -->
<div class="form-card mb-4" style="padding:16px 20px;">
    <form method="GET" class="d-flex gap-3 flex-wrap align-items-end">
        <div style="flex:1;min-width:200px;">
            <label class="form-label" style="font-size:12px;">Search</label>
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Title, category...">
        </div>
        <div style="min-width:140px;">
            <label class="form-label" style="font-size:12px;">Status</label>
            <select name="status" class="form-select">
                <option value="">All</option>
                <option value="active"   {{ request('status')==='active'   ? 'selected':'' }}>Published</option>
                <option value="inactive" {{ request('status')==='inactive' ? 'selected':'' }}>Draft</option>
            </select>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary-admin">Filter</button>
            <a href="{{ route('admin.blogs.index') }}" class="btn" style="border:1.5px solid #e2e8f0;border-radius:8px;padding:10px 18px;font-weight:600;color:#555;font-size:13.5px;">Reset</a>
        </div>
    </form>
</div>

<div class="admin-table">
    <table class="table">
        <thead>
            <tr>
                <th style="width:70px;">Image</th>
                <th>Title & Category</th>
                <th>Author</th>
                <th>Published</th>
                <th>Status</th>
                <th style="text-align:center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($blogs as $blog)
            <tr>
                <td>
                    <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}"
                         style="width:56px;height:44px;object-fit:cover;border-radius:8px;border:1px solid #edf1f8;"
                         onerror="this.src='https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=120&q=60'">
                </td>
                <td style="max-width:280px;">
                    <div style="font-weight:700;font-size:13.5px;color:var(--primary);">{{ Str::limit($blog->title, 60) }}</div>
                    <div class="mt-1">
                        <span style="font-size:11px;background:rgba(201,168,76,0.12);color:#a8893a;padding:2px 8px;border-radius:50px;font-weight:600;">{{ $blog->category }}</span>
                    </div>
                </td>
                <td style="font-size:13px;color:#637082;">{{ $blog->author }}</td>
                <td style="font-size:12.5px;color:#8a99b0;white-space:nowrap;">
                    {{ $blog->published_at ? $blog->published_at->format('d M Y') : '—' }}
                </td>
                <td>
                    <form method="POST" action="{{ route('admin.blogs.toggle', $blog) }}">
                        @csrf @method('PATCH')
                        <button type="submit" class="status-badge {{ $blog->is_active ? 'badge-active' : 'badge-inactive' }}" style="border:none;cursor:pointer;background:none;padding:4px 12px;">
                            {{ $blog->is_active ? 'Published' : 'Draft' }}
                        </button>
                    </form>
                </td>
                <td style="text-align:center;">
                    <div class="d-flex gap-2 justify-content-center">
                        <a href="{{ route('blog.show', $blog->slug) }}" target="_blank" class="btn btn-sm" style="background:rgba(34,197,94,0.1);color:#16a34a;border-radius:7px;padding:5px 10px;font-size:12px;">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm" style="background:rgba(201,168,76,0.1);color:var(--gold);border-radius:7px;padding:5px 10px;font-size:12px;">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form method="POST" action="{{ route('admin.blogs.destroy', $blog) }}" onsubmit="return confirm('Delete this post?')">
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
                <td colspan="6" class="text-center py-5" style="color:#8a99b0;">
                    <i class="fas fa-newspaper fa-2x mb-3 d-block" style="opacity:0.3;"></i>
                    No blog posts yet. <a href="{{ route('admin.blogs.create') }}" style="color:var(--gold);">Write your first post</a>.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    @if($blogs->hasPages())
    <div style="padding:16px 18px;border-top:1px solid #f0f3f8;">{{ $blogs->links() }}</div>
    @endif
</div>
@endsection
