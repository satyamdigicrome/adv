<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') — SK Document Centre CMS</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @stack('styles')

    <style>
        :root {
            --primary: #0f2044;
            --primary-light: #1a3460;
            --gold: #c9a84c;
            --gold-light: #e2c47a;
            --sidebar-w: 260px;
        }
        * { box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: #f4f6fb; color: #333; margin: 0; }

        /* Sidebar */
        .admin-sidebar {
            width: var(--sidebar-w);
            height: 100vh;
            background: var(--primary);
            position: fixed;
            top: 0; left: 0;
            z-index: 1050;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
            overflow-y: auto;
        }
        .sidebar-brand {
            padding: 20px 22px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .sidebar-brand .brand-sk {
            background: var(--gold);
            color: var(--primary);
            width: 44px; height: 44px;
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 18px;
        }
        .sidebar-brand .brand-info { line-height: 1.2; }
        .sidebar-brand .brand-name { color: #fff; font-size: 14px; font-weight: 700; display: block; }
        .sidebar-brand .brand-sub  { color: var(--gold); font-size: 10px; display: block; text-transform: uppercase; letter-spacing: 1px; }
        .sidebar-nav { padding: 14px 0; flex: 1; }
        .sidebar-label {
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(255,255,255,0.35);
            padding: 16px 22px 6px;
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 22px;
            color: rgba(255,255,255,0.7);
            font-size: 13.5px;
            font-weight: 500;
            text-decoration: none;
            border-left: 3px solid transparent;
            transition: all 0.2s;
        }
        .sidebar-link i { width: 18px; font-size: 14px; color: rgba(255,255,255,0.45); }
        .sidebar-link:hover,
        .sidebar-link.active {
            background: rgba(255,255,255,0.06);
            color: #fff;
            border-left-color: var(--gold);
        }
        .sidebar-link:hover i,
        .sidebar-link.active i { color: var(--gold); }
        .sidebar-link .badge-count {
            margin-left: auto;
            background: var(--gold);
            color: var(--primary);
            font-size: 10px;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 50px;
        }

        /* Topbar */
        .admin-topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-w);
            right: 0;
            height: 64px;
            background: #fff;
            border-bottom: 1px solid #e8edf3;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
            z-index: 900;
            box-shadow: 0 1px 6px rgba(0,0,0,0.05);
        }
        .topbar-title { font-size: 17px; font-weight: 700; color: var(--primary); }
        .topbar-right { display: flex; align-items: center; gap: 14px; }
        .topbar-right .admin-name { font-size: 13.5px; font-weight: 600; color: var(--primary); }
        .topbar-right .admin-role { font-size: 11px; color: #8a99b0; }
        .avatar-circle {
            width: 38px; height: 38px;
            background: var(--primary);
            color: var(--gold);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-weight: 700; font-size: 15px;
        }

        /* Main Content */
        .admin-main {
            margin-left: var(--sidebar-w);
            margin-top: 64px;
            padding: 28px;
            min-height: calc(100vh - 64px);
        }

        /* Cards */
        .stat-card {
            background: #fff;
            border-radius: 14px;
            padding: 22px 24px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 2px 12px rgba(15,32,68,0.06);
            border: 1px solid #edf1f8;
            transition: box-shadow 0.2s;
        }
        .stat-card:hover { box-shadow: 0 4px 20px rgba(15,32,68,0.1); }
        .stat-icon {
            width: 56px; height: 56px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }
        .stat-icon.blue   { background: rgba(15,32,68,0.08); color: var(--primary); }
        .stat-icon.gold   { background: rgba(201,168,76,0.12); color: var(--gold); }
        .stat-icon.green  { background: rgba(34,197,94,0.1); color: #16a34a; }
        .stat-icon.red    { background: rgba(239,68,68,0.1); color: #dc2626; }
        .stat-num { font-size: 28px; font-weight: 800; color: var(--primary); line-height: 1; }
        .stat-label { font-size: 13px; color: #8a99b0; margin-top: 3px; }

        /* Tables */
        .admin-table { background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(15,32,68,0.06); overflow: hidden; }
        .admin-table .table { margin: 0; }
        .admin-table .table thead th {
            background: var(--primary);
            color: rgba(255,255,255,0.85);
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
            padding: 13px 16px;
        }
        .admin-table .table tbody td { padding: 13px 16px; vertical-align: middle; font-size: 13.5px; border-color: #f0f3f8; }
        .admin-table .table tbody tr:hover { background: #f9fbff; }

        /* Badges */
        .badge-new    { background: rgba(239,68,68,0.1);  color: #dc2626; }
        .badge-read   { background: rgba(99,102,241,0.1); color: #4f46e5; }
        .badge-replied{ background: rgba(34,197,94,0.1); color: #16a34a; }
        .badge-active  { background: rgba(34,197,94,0.1); color: #16a34a; }
        .badge-inactive{ background: rgba(239,68,68,0.1); color: #dc2626; }
        .status-badge { padding: 4px 12px; border-radius: 50px; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; }

        /* Form card */
        .form-card { background: #fff; border-radius: 14px; padding: 28px; box-shadow: 0 2px 12px rgba(15,32,68,0.06); }
        .form-card .form-label { font-size: 13px; font-weight: 600; color: var(--primary); margin-bottom: 5px; }
        .form-card .form-control, .form-card .form-select {
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 13.5px;
            transition: all 0.2s;
        }
        .form-card .form-control:focus, .form-card .form-select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(201,168,76,0.12);
        }
        .section-divider { height: 1px; background: #f0f3f8; margin: 24px 0; }

        /* Btn overrides */
        .btn-primary-admin {
            background: var(--primary);
            color: #fff !important;
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13.5px;
        }
        .btn-primary-admin:hover { background: var(--primary-light); }
        .btn-gold-admin {
            background: var(--gold);
            color: var(--primary) !important;
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13.5px;
        }
        .btn-gold-admin:hover { background: #a8893a; }

        /* Page header */
        .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 22px; flex-wrap: wrap; gap: 12px; }
        .page-header h4 { font-size: 20px; font-weight: 700; color: var(--primary); margin: 0; }
        .page-breadcrumb { font-size: 12.5px; color: #8a99b0; margin-top: 3px; }
        .page-breadcrumb a { color: var(--gold); }

        /* Toggle sidebar for mobile */
        .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 1040; }
        .sidebar-toggle { display: none; background: none; border: none; font-size: 20px; color: var(--primary); cursor: pointer; }

        @media (max-width: 991.98px) {
            .admin-sidebar { transform: translateX(-100%); }
            .admin-sidebar.open { transform: translateX(0); }
            .admin-topbar { left: 0; }
            .admin-main { margin-left: 0; padding: 20px 16px; }
            .sidebar-toggle { display: block; }
            .sidebar-overlay.open { display: block; }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-brand">
            <div class="brand-sk">SK</div>
            <div class="brand-info">
                <span class="brand-name">Document Centre</span>
                <span class="brand-sub">Admin Panel</span>
            </div>
        </div>

        <nav class="sidebar-nav">
            <span class="sidebar-label">Main</span>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i> Dashboard
            </a>

            <span class="sidebar-label">Content</span>
            <a href="{{ route('admin.services.index') }}" class="sidebar-link {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                <i class="fas fa-concierge-bell"></i> Services
            </a>
            <a href="{{ route('admin.attestations.index') }}" class="sidebar-link {{ request()->routeIs('admin.attestations*') ? 'active' : '' }}">
                <i class="fas fa-certificate"></i> Attestations
            </a>
            <a href="{{ route('admin.faqs.index') }}" class="sidebar-link {{ request()->routeIs('admin.faqs*') ? 'active' : '' }}">
                <i class="fas fa-question-circle"></i> FAQs
            </a>

            <a href="{{ route('admin.blogs.index') }}" class="sidebar-link {{ request()->routeIs('admin.blogs*') ? 'active' : '' }}">
                <i class="fas fa-newspaper"></i> Blog Posts
            </a>
            <a href="{{ route('admin.reviews.index') }}" class="sidebar-link {{ request()->routeIs('admin.reviews*') ? 'active' : '' }}">
                <i class="fas fa-star"></i> Reviews
            </a>

            <span class="sidebar-label">Content / CMS</span>
            <a href="{{ route('admin.pages.index') }}" class="sidebar-link {{ request()->routeIs('admin.pages*') ? 'active' : '' }}">
                <i class="fas fa-file-alt"></i> Content Pages
            </a>

            <span class="sidebar-label">Leads</span>
            <a href="{{ route('admin.enquiries.index') }}" class="sidebar-link {{ request()->routeIs('admin.enquiries*') ? 'active' : '' }}">
                <i class="fas fa-inbox"></i> Enquiries
                @php $newEnq = \App\Models\Enquiry::where('status','new')->count(); @endphp
                @if($newEnq > 0)
                    <span class="badge-count">{{ $newEnq }}</span>
                @endif
            </a>
            <a href="{{ route('admin.contacts.index') }}" class="sidebar-link {{ request()->routeIs('admin.contacts*') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i> Contact Messages
                @php $newContact = \App\Models\Contact::where('status','new')->count(); @endphp
                @if($newContact > 0)
                    <span class="badge-count">{{ $newContact }}</span>
                @endif
            </a>

            <span class="sidebar-label">Account</span>
            <a href="{{ url('/') }}" target="_blank" class="sidebar-link">
                <i class="fas fa-external-link-alt"></i> View Website
            </a>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="sidebar-link w-100 text-start" style="background:none;border:none;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </nav>
    </aside>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Topbar -->
    <header class="admin-topbar">
        <div class="d-flex align-items-center gap-3">
            <button class="sidebar-toggle" id="sidebarToggle"><i class="fas fa-bars"></i></button>
            <div>
                <div class="topbar-title">@yield('page_title', 'Dashboard')</div>
            </div>
        </div>
        <div class="topbar-right">
            <a href="{{ url('/') }}" target="_blank" class="btn btn-sm" style="border:1.5px solid #e2e8f0; font-size:12px; font-weight:600; color:#555; border-radius:7px;">
                <i class="fas fa-eye me-1"></i> View Site
            </a>
            <div class="avatar-circle">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
            <div>
                <div class="admin-name">{{ auth()->user()->name }}</div>
                <div class="admin-role">Administrator</div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="admin-main">
        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4 border-0 rounded-3" style="background:rgba(34,197,94,0.1); color:#16a34a; font-size:13.5px;" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4 border-0 rounded-3" style="background:rgba(239,68,68,0.1); color:#dc2626; font-size:13.5px;" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        /**
         * adminDelete — submit a DELETE request without a nested form.
         * Use this on any page that already has an update <form> wrapping
         * the layout, so we never nest forms (invalid HTML).
         */
        function adminDelete(url, message) {
            if (!confirm(message || 'Delete this item? This cannot be undone.')) return;
            var form    = document.createElement('form');
            form.method = 'POST';
            form.action = url;
            var token   = document.createElement('input');
            token.type  = 'hidden';
            token.name  = '_token';
            token.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var method  = document.createElement('input');
            method.type  = 'hidden';
            method.name  = '_method';
            method.value = 'DELETE';
            form.appendChild(token);
            form.appendChild(method);
            document.body.appendChild(form);
            form.submit();
        }

        // Sidebar toggle
        const sidebar  = document.getElementById('adminSidebar');
        const overlay  = document.getElementById('sidebarOverlay');
        const toggler  = document.getElementById('sidebarToggle');
        if (toggler) {
            toggler.addEventListener('click', () => {
                sidebar.classList.toggle('open');
                overlay.classList.toggle('open');
            });
            overlay.addEventListener('click', () => {
                sidebar.classList.remove('open');
                overlay.classList.remove('open');
            });
        }
    </script>

    @stack('scripts')
</body>
</html>
