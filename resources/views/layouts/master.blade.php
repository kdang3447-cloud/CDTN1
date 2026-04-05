<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Hệ thống quản lý sản phẩm và danh mục">
    <title>@yield('title', 'Quản Lý Sản Phẩm') — ShopAdmin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ============================
           DESIGN TOKENS – LIGHT THEME
        ============================ */
        :root {
            --bg-page:       #f0f2f8;
            --bg-sidebar:    #ffffff;
            --bg-card:       #ffffff;
            --bg-header:     #ffffff;

            --accent:        #6c63ff;
            --accent-dark:   #5046e5;
            --accent-light:  #ede9fe;
            --accent-text:   #4f46e5;

            --success:       #10b981;
            --success-light: #d1fae5;
            --danger:        #ef4444;
            --danger-light:  #fee2e2;
            --warning:       #f59e0b;
            --warning-light: #fef3c7;

            --text-primary:  #1e1b4b;
            --text-secondary:#4b5563;
            --text-muted:    #9ca3af;
            --border:        #e5e7eb;

            --sidebar-w:     240px;
            --header-h:      64px;

            --shadow-sm:     0 1px 3px rgba(0,0,0,.08), 0 1px 2px rgba(0,0,0,.05);
            --shadow-md:     0 4px 16px rgba(0,0,0,.10), 0 2px 6px rgba(0,0,0,.06);
            --shadow-lg:     0 8px 30px rgba(108,99,255,.18), 0 2px 8px rgba(0,0,0,.06);
            --shadow-card:   0 2px 20px rgba(0,0,0,.09);

            --radius-sm:     8px;
            --radius-md:     12px;
            --radius-lg:     16px;
            --transition:    .2s cubic-bezier(.4,0,.2,1);
        }

        /* ============================
           RESET
        ============================ */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { font-size: 15px; scroll-behavior: smooth; }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-page);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
        }
        a { text-decoration: none; color: inherit; }
        ul { list-style: none; }
        img { max-width: 100%; }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--bg-page); }
        ::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--accent); }

        /* ============================
           SIDEBAR
        ============================ */
        .sidebar {
            width: var(--sidebar-w);
            min-height: 100vh;
            background: var(--bg-sidebar);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0;
            z-index: 100;
            box-shadow: var(--shadow-md);
        }

        .sidebar-logo {
            height: var(--header-h);
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 20px;
            border-bottom: 1px solid var(--border);
        }

        .logo-icon {
            width: 38px; height: 38px;
            background: linear-gradient(135deg, var(--accent), #818cf8);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
            box-shadow: 0 4px 12px rgba(108,99,255,.35);
        }

        .logo-text {
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--accent-text);
            letter-spacing: -.3px;
        }

        .sidebar-nav { flex: 1; padding: 14px 10px; overflow-y: auto; }

        .nav-section-title {
            font-size: .68rem;
            font-weight: 700;
            letter-spacing: 1.4px;
            text-transform: uppercase;
            color: var(--text-muted);
            padding: 8px 12px 4px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: var(--radius-sm);
            color: var(--text-secondary);
            font-size: .88rem;
            font-weight: 500;
            transition: all var(--transition);
            margin-bottom: 2px;
            position: relative;
        }

        .nav-link:hover {
            background: var(--accent-light);
            color: var(--accent-text);
        }

        .nav-link.active {
            background: var(--accent-light);
            color: var(--accent-text);
            font-weight: 700;
        }

        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0; top: 18%; bottom: 18%;
            width: 3px;
            background: var(--accent);
            border-radius: 0 3px 3px 0;
        }

        .nav-icon { font-size: 1.05rem; width: 20px; text-align: center; }

        .sidebar-footer {
            padding: 14px 20px;
            border-top: 1px solid var(--border);
            font-size: .72rem;
            color: var(--text-muted);
        }

        /* ============================
           MAIN WRAPPER
        ============================ */
        .main-wrapper {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ============================
           HEADER
        ============================ */
        .header {
            height: var(--header-h);
            background: var(--bg-header);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            position: sticky;
            top: 0;
            z-index: 90;
            box-shadow: var(--shadow-sm);
        }

        .header-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .header-breadcrumb {
            font-size: .78rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 2px;
        }

        .header-badge {
            background: var(--accent-light);
            color: var(--accent-text);
            border-radius: 20px;
            padding: 5px 14px;
            font-size: .78rem;
            font-weight: 700;
            border: 1px solid rgba(108,99,255,.2);
        }

        /* ============================
           PAGE CONTENT
        ============================ */
        .page-content {
            flex: 1;
            padding: 28px;
            max-width: 1200px;
            width: 100%;
        }

        /* ============================
           CARD  — nổi lên khỏi nền
        ============================ */
        .card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-card);
            transition: box-shadow var(--transition);
        }

        .card:hover { box-shadow: var(--shadow-lg); }

        .card-header {
            padding: 18px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        .card-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .card-body { padding: 24px; }

        /* ============================
           STAT CARDS
        ============================ */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 18px;
            margin-bottom: 26px;
        }

        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 22px 24px;
            display: flex;
            align-items: center;
            gap: 18px;
            box-shadow: var(--shadow-card);
            transition: transform var(--transition), box-shadow var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .stat-icon {
            width: 56px; height: 56px;
            border-radius: var(--radius-md);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.6rem;
            flex-shrink: 0;
        }

        .stat-icon.purple { background: var(--accent-light); }
        .stat-icon.green  { background: var(--success-light); }
        .stat-icon.orange { background: var(--warning-light); }

        .stat-label {
            font-size: .74rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .5px;
            color: var(--text-muted);
            margin-bottom: 4px;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            color: var(--text-primary);
            line-height: 1;
        }

        /* ============================
           BUTTONS
        ============================ */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 18px;
            border-radius: var(--radius-sm);
            font-size: .85rem;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: all var(--transition);
            white-space: nowrap;
            font-family: 'Inter', sans-serif;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent), #818cf8);
            color: #fff;
            box-shadow: 0 4px 14px rgba(108,99,255,.35);
        }
        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(108,99,255,.45); }

        .btn-secondary {
            background: #f9fafb;
            color: var(--text-secondary);
            border: 1px solid var(--border);
        }
        .btn-secondary:hover { background: #f3f4f6; color: var(--text-primary); }

        .btn-success {
            background: linear-gradient(135deg, var(--success), #059669);
            color: #fff;
            box-shadow: 0 4px 12px rgba(16,185,129,.3);
        }
        .btn-success:hover { transform: translateY(-1px); }

        .btn-danger {
            background: linear-gradient(135deg, var(--danger), #b91c1c);
            color: #fff;
            box-shadow: 0 4px 12px rgba(239,68,68,.3);
        }
        .btn-danger:hover { transform: translateY(-1px); }

        .btn-warning {
            background: linear-gradient(135deg, var(--warning), #d97706);
            color: #fff;
            box-shadow: 0 4px 12px rgba(245,158,11,.3);
        }
        .btn-warning:hover { transform: translateY(-1px); }

        .btn-ghost {
            background: transparent;
            color: var(--text-secondary);
            border: 1.5px solid var(--border);
        }
        .btn-ghost:hover { background: var(--accent-light); color: var(--accent-text); border-color: var(--accent); }

        .btn-active-sort {
            background: var(--accent-light);
            color: var(--accent-text);
            border-color: var(--accent);
        }

        .btn-sm { padding: 6px 13px; font-size: .80rem; }

        /* ============================
           FORM ELEMENTS
        ============================ */
        .form-group { margin-bottom: 20px; }

        .form-label {
            display: block;
            font-size: .80rem;
            font-weight: 700;
            color: var(--text-secondary);
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: .4px;
        }

        .form-control, .form-select {
            width: 100%;
            background: #f9fafb;
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            color: var(--text-primary);
            padding: 10px 14px;
            font-size: .9rem;
            font-family: 'Inter', sans-serif;
            transition: all var(--transition);
            outline: none;
            appearance: none;
        }

        .form-control:focus, .form-select:focus {
            background: #fff;
            border-color: var(--accent);
            box-shadow: 0 0 0 4px rgba(108,99,255,.12);
        }

        .form-control::placeholder { color: var(--text-muted); }

        .form-select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2.5'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
        }

        .form-text { font-size: .76rem; color: var(--text-muted); margin-top: 5px; }

        .invalid-feedback { font-size: .79rem; color: var(--danger); margin-top: 4px; font-weight: 500; }
        .is-invalid { border-color: var(--danger) !important; background: #fff5f5 !important; }

        /* File upload */
        .file-upload-wrapper {
            border: 2px dashed var(--border);
            border-radius: var(--radius-md);
            padding: 26px;
            text-align: center;
            cursor: pointer;
            transition: all var(--transition);
            background: #fafbff;
        }
        .file-upload-wrapper:hover {
            border-color: var(--accent);
            background: var(--accent-light);
        }
        .file-upload-icon { font-size: 2.2rem; margin-bottom: 8px; }
        .file-upload-label { font-size: .85rem; color: var(--text-secondary); }
        .file-upload-label span { color: var(--accent); font-weight: 700; }

        /* ============================
           TABLE
        ============================ */
        .table-wrapper { overflow-x: auto; }

        table { width: 100%; border-collapse: separate; border-spacing: 0; font-size: .88rem; }

        thead th {
            background: #f8f9fc;
            color: var(--text-muted);
            font-weight: 700;
            font-size: .71rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 12px 16px;
            border-bottom: 1px solid var(--border);
            text-align: left;
        }

        tbody tr { transition: background var(--transition); }
        tbody tr:hover { background: #f8f7ff; }
        tbody td {
            padding: 13px 16px;
            color: var(--text-primary);
            vertical-align: middle;
            border-bottom: 1px solid #f3f4f6;
        }
        tbody tr:last-child td { border-bottom: none; }

        /* ============================
           PRODUCT THUMB
        ============================ */
        .product-thumb {
            width: 54px; height: 54px;
            border-radius: var(--radius-sm);
            object-fit: cover;
            border: 2px solid var(--border);
            box-shadow: var(--shadow-sm);
        }

        .product-thumb-placeholder {
            width: 54px; height: 54px;
            border-radius: var(--radius-sm);
            background: #f3f4f6;
            border: 1.5px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem;
            color: var(--text-muted);
        }

        /* ============================
           BADGES
        ============================ */
        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: .74rem;
            font-weight: 700;
        }

        .badge-category {
            background: var(--accent-light);
            color: var(--accent-text);
            border: 1px solid rgba(108,99,255,.2);
        }

        /* ============================
           PAGINATION
        ============================ */
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
            padding: 18px 24px;
            border-top: 1px solid var(--border);
        }

        .pagination-wrapper a,
        .pagination-wrapper span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px; height: 36px;
            border-radius: var(--radius-sm);
            font-size: .85rem;
            font-weight: 600;
            transition: all var(--transition);
            color: var(--text-secondary);
            border: 1.5px solid var(--border);
            background: #fff;
        }

        .pagination-wrapper a:hover { background: var(--accent-light); color: var(--accent-text); border-color: var(--accent); }
        .pagination-wrapper span.active { background: var(--accent); color: #fff; border-color: var(--accent); box-shadow: 0 4px 12px rgba(108,99,255,.35); }

        /* ============================
           FILTER BAR
        ============================ */
        .filter-bar { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
        .filter-bar .form-control { max-width: 260px; }

        /* ============================
           ALERT
        ============================ */
        .alert {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 18px;
            border-radius: var(--radius-md);
            margin-bottom: 20px;
            font-size: .88rem;
            font-weight: 600;
            animation: slideDown .3s ease;
            box-shadow: var(--shadow-sm);
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .alert-success { background: var(--success-light); border: 1px solid #6ee7b7; color: #065f46; }
        .alert-danger  { background: var(--danger-light);  border: 1px solid #fca5a5; color: #991b1b; }

        .alert-icon { font-size: 1.1rem; }
        .alert-close {
            margin-left: auto; cursor: pointer; opacity: .5;
            font-size: 1rem; background: none; border: none;
            color: inherit; transition: opacity var(--transition);
            padding: 0;
        }
        .alert-close:hover { opacity: 1; }

        /* ============================
           IMAGE PREVIEW
        ============================ */
        .img-preview {
            max-width: 160px; max-height: 160px;
            border-radius: var(--radius-md);
            object-fit: cover;
            border: 2px solid var(--border);
            margin-top: 10px;
            box-shadow: var(--shadow-sm);
        }

        /* ============================
           EMPTY STATE
        ============================ */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--text-muted);
        }
        .empty-state-icon { font-size: 3.5rem; margin-bottom: 14px; }
        .empty-state h3 { font-size: 1.05rem; font-weight: 700; color: var(--text-secondary); margin-bottom: 6px; }

        /* ============================
           UTILITIES
        ============================ */
        .price-text   { color: var(--success); font-weight: 700; }
        .qty-text     { color: var(--warning); font-weight: 700; }
        .text-muted   { color: var(--text-muted); }
        .d-flex       { display: flex; }
        .gap-2        { gap: 8px; }
        .gap-3        { gap: 12px; }
        .align-center { align-items: center; }
        .mt-1         { margin-top: 6px; }
        .mt-2         { margin-top: 14px; }
        .mb-1         { margin-bottom: 6px; }
    </style>
</head>
<body>

<!-- ===== SIDEBAR ===== -->
<aside class="sidebar">
    <div class="sidebar-logo">
        <div class="logo-icon">🛒</div>
        <span class="logo-text">ShopAdmin</span>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-section-title">Tổng quan</div>
        <a href="{{ route('dashboard') }}"
           class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <span class="nav-icon">📊</span> Dashboard
        </a>

        <div class="nav-section-title" style="margin-top:14px;">Quản lý</div>
        <a href="{{ route('products.index') }}"
           class="nav-link {{ request()->routeIs('products.index') ? 'active' : '' }}">
            <span class="nav-icon">📦</span> Sản phẩm
        </a>
        <a href="{{ route('products.create') }}"
           class="nav-link {{ request()->routeIs('products.create') ? 'active' : '' }}">
            <span class="nav-icon">➕</span> Thêm sản phẩm
        </a>
    </nav>

    <div class="sidebar-footer">© {{ date('Y') }} ShopAdmin v1.0</div>
</aside>

<!-- ===== MAIN ===== -->
<div class="main-wrapper">

    <!-- HEADER -->
    <header class="header">
        <div>
            <div class="header-title">@yield('header-title', 'Dashboard')</div>
            <div class="header-breadcrumb">
                🏠 <span>ShopAdmin</span> › <span>@yield('breadcrumb', 'Tổng quan')</span>
            </div>
        </div>
        <div style="display: flex; align-items: center; gap: 16px;">
            @auth
            <div style="display: flex; align-items: center; gap: 8px;">
                <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--accent-light); color: var(--accent-text); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px;">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <span style="font-weight: 600; font-size: .9rem;">{{ Auth::user()->name }}</span>
            </div>
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn btn-ghost btn-sm" style="border: none; padding: 6px 10px; background: transparent;">
                    Đăng xuất
                </button>
            </form>
            @endauth
            <div class="header-badge">⚡ Laravel Admin</div>
        </div>
    </header>

    <!-- CONTENT -->
    <main class="page-content">
        <x-alert />
        @yield('content')
    </main>
</div>

<script>
    document.querySelectorAll('.alert-close').forEach(btn => {
        btn.addEventListener('click', () => {
            btn.closest('.alert').style.transition = 'opacity .35s';
            btn.closest('.alert').style.opacity = '0';
            setTimeout(() => btn.closest('.alert').remove(), 350);
        });
    });
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(a => {
            a.style.transition = 'opacity .4s';
            a.style.opacity = '0';
            setTimeout(() => a.remove(), 400);
        });
    }, 5000);
</script>

@yield('scripts')
</body>
</html>
