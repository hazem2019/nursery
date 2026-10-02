<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | @yield('title', 'Parent Portal')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --light-bg: #f5f7fa;
            --border-color: #e1e8ed;
            --sidebar-width: 260px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--light-bg);
            font-family: 'Segoe UI', Tahoma, sans-serif;
            color: #333;
        }

        .parent-shell {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Navigation */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%);
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        [dir="rtl"] .sidebar {
            right: 0;
            left: auto;
        }

        [dir="ltr"] .sidebar {
            left: 0;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .sidebar-header h5 {
            font-size: 16px;
            font-weight: 700;
            margin: 0;
        }

        .sidebar-header p {
            font-size: 12px;
            opacity: 0.8;
            margin: 5px 0 0 0;
        }

        .sidebar-nav {
            list-style: none;
            padding: 20px 0;
            margin: 0;
        }

        .sidebar-nav li {
            margin: 0;
        }

        .sidebar-nav a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .sidebar-nav a:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            padding-left: 25px;
        }

        [dir="rtl"] .sidebar-nav a:hover {
            padding-left: 20px;
            padding-right: 25px;
        }

        .sidebar-nav a.active {
            background: var(--secondary-color);
            color: white;
            border-left: 4px solid white;
        }

        [dir="rtl"] .sidebar-nav a.active {
            border-left: none;
            border-right: 4px solid white;
        }

        .sidebar-nav a i {
            margin-right: 12px;
            font-size: 18px;
        }

        [dir="rtl"] .sidebar-nav a i {
            margin-right: 0;
            margin-left: 12px;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            display: flex;
            flex-direction: column;
        }

        [dir="rtl"] .main-content {
            margin-left: 0;
            margin-right: var(--sidebar-width);
        }

        /* Top Navigation */
        .topbar {
            background: white;
            border-bottom: 1px solid var(--border-color);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .topbar-left h3 {
            color: var(--primary-color);
            font-weight: 700;
            margin: 0;
            font-size: 20px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .language-switch {
            display: flex;
            gap: 10px;
        }

        .language-switch a {
            padding: 8px 15px;
            border-radius: 5px;
            background: var(--light-bg);
            color: var(--primary-color);
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .language-switch a.active {
            background: var(--secondary-color);
            color: white;
        }

        .language-switch a:hover {
            background: var(--secondary-color);
            color: white;
        }

        .user-menu {
            position: relative;
        }

        .user-menu button {
            background: none;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--primary-color);
            font-weight: 600;
            font-size: 14px;
            padding: 0;
        }

        .user-menu button:hover {
            color: var(--secondary-color);
        }

        .dropdown-menu-user {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 5px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            min-width: 200px;
            display: none;
            z-index: 999;
        }

        [dir="rtl"] .dropdown-menu-user {
            right: auto;
            left: 0;
        }

        .dropdown-menu-user.show {
            display: block;
        }

        .dropdown-menu-user a,
        .dropdown-menu-user form button {
            display: block;
            width: 100%;
            padding: 12px 20px;
            text-align: left;
            text-decoration: none;
            color: #555;
            border: none;
            background: none;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        [dir="rtl"] .dropdown-menu-user a,
        [dir="rtl"] .dropdown-menu-user form button {
            text-align: right;
        }

        .dropdown-menu-user a:hover,
        .dropdown-menu-user form button:hover {
            background: var(--light-bg);
            color: var(--secondary-color);
        }

        .dropdown-menu-user hr {
            margin: 10px 0;
        }

        /* Main Content Area */
        .content-area {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }

        /* Alerts */
        .alert {
            border-radius: 5px;
            border: none;
            margin-bottom: 20px;
            padding: 15px;
        }

        .alert-success {
            background: #d4edda;
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }

        [dir="rtl"] .alert-success {
            border-left: none;
            border-right: 4px solid var(--success-color);
        }

        .alert-danger {
            background: #f8d7da;
            color: var(--danger-color);
            border-left: 4px solid var(--danger-color);
        }

        [dir="rtl"] .alert-danger {
            border-left: none;
            border-right: 4px solid var(--danger-color);
        }

        /* Cards */
        .card {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .card:hover {
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: white;
            border-bottom: 1px solid var(--border-color);
            padding: 20px;
            font-weight: 600;
            color: var(--primary-color);
        }

        .card-body {
            padding: 20px;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 200px;
            }

            [dir="rtl"] .main-content {
                margin-left: 0;
                margin-right: 200px;
            }

            :root {
                --sidebar-width: 200px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                width: 250px;
                height: 100vh;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            [dir="rtl"] .sidebar {
                transform: translateX(100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            [dir="rtl"] .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            [dir="rtl"] .main-content {
                margin-right: 0;
            }

            .topbar {
                padding: 15px;
            }

            .topbar-left h3 {
                font-size: 16px;
            }

            .topbar-right {
                gap: 10px;
            }

            .language-switch {
                display: none;
            }

            .content-area {
                padding: 15px;
            }
        }

        @media (max-width: 576px) {
            .topbar {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .topbar-right {
                justify-content: center;
                width: 100%;
            }

            .content-area {
                padding: 10px;
            }
        }
    </style>
    @yield('styles')
</head>
<body dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <div class="parent-shell">
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h5>{{ config('app.name') }}</h5>
                <p>Parent Portal</p>
            </div>

            <nav>
                <ul class="sidebar-nav">
                    <li>
                        <a href="{{ route('parent.dashboard') }}" class="{{ request()->routeIs('parent.dashboard') ? 'active' : '' }}">
                            <i class="bi bi-house-door"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('parent.children') ?? '#' }}" class="{{ request()->routeIs('parent.children') ? 'active' : '' }}">
                            <i class="bi bi-people"></i>
                            <span>My Children</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('parent.attendance') ?? '#' }}" class="{{ request()->routeIs('parent.attendance') ? 'active' : '' }}">
                            <i class="bi bi-calendar-check"></i>
                            <span>Attendance</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('parent.invoices') ?? '#' }}" class="{{ request()->routeIs('parent.invoices') ? 'active' : '' }}">
                            <i class="bi bi-file-earmark-text"></i>
                            <span>Invoices</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('parent.payments') ?? '#' }}" class="{{ request()->routeIs('parent.payments') ? 'active' : '' }}">
                            <i class="bi bi-credit-card"></i>
                            <span>Payments</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('announcements.index') ?? '#' }}" class="{{ request()->routeIs('announcements.index') ? 'active' : '' }}">
                            <i class="bi bi-megaphone"></i>
                            <span>Announcements</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Navigation Bar -->
            <div class="topbar">
                <div class="topbar-left">
                    <h3>@yield('page-title', 'Parent Portal')</h3>
                </div>
                <div class="topbar-right">
                    <div class="user-menu">
                        <button onclick="toggleUserMenu()">
                            <i class="bi bi-person-circle"></i>
                            {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu-user" id="userDropdown">
                            <a href="{{ route('parent.profile') ?? '#' }}">
                                <i class="bi bi-person"></i> Profile
                            </a>
                            <hr>
                            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                                @csrf
                                <button type="submit">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="content-area">
                @include('layouts.partials.alerts')
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle user menu
        function toggleUserMenu() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('show');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            const userMenu = document.querySelector('.user-menu');
            if (userMenu && !userMenu.contains(e.target)) {
                document.getElementById('userDropdown').classList.remove('show');
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
