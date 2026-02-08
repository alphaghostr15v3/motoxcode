<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUPERBIKE COMMUNITY | Admin Dashboard</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-logomark" style="width: 38px; height: 32px; background: var(--primary-red); clip-path: polygon(0 0, 100% 0, 80% 100%, 0% 100%); display: flex; align-items: center; justify-content: center; color: white;">
                <i class="fas fa-motorcycle" style="font-size: 14px; margin-left: -4px;"></i>
            </div>
            <h4 class="fw-black m-0 italic" style="letter-spacing: -1px; line-height: 1;">SUPERBIKE <br><span class="text-red fs-6">COMMUNITY</span></h4>
        </div>
        
        <ul class="sidebar-menu custom-scrollbar">
            <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.members') ? 'active' : '' }}">
                <a href="{{ route('admin.members') }}" class="sidebar-link">
                    <i class="fas fa-users"></i> Members
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.events') ? 'active' : '' }}">
                <a href="{{ route('admin.events') }}" class="sidebar-link">
                    <i class="fas fa-calendar-alt"></i> Events
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.gallery') ? 'active' : '' }}">
                <a href="{{ route('admin.gallery') }}" class="sidebar-link">
                    <i class="fas fa-images"></i> Gallery
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.blogs') ? 'active' : '' }}">
                <a href="{{ route('admin.blogs') }}" class="sidebar-link">
                    <i class="fas fa-newspaper"></i> Blog / News
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.testimonials') ? 'active' : '' }}">
                <a href="{{ route('admin.testimonials') }}" class="sidebar-link">
                    <i class="fas fa-quote-left"></i> Testimonials
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.leaderboard') ? 'active' : '' }}">
                <a href="{{ route('admin.leaderboard') }}" class="sidebar-link">
                    <i class="fas fa-trophy"></i> Leaderboard
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.safety') ? 'active' : '' }}">
                <a href="{{ route('admin.safety') }}" class="sidebar-link">
                    <i class="fas fa-shield-alt"></i> Safety Rules
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.messages') ? 'active' : '' }}">
                <a href="{{ route('admin.messages') }}" class="sidebar-link">
                    <i class="fas fa-envelope"></i> Messages
                </a>
            </li>
            
            <li class="mt-4 mb-2 px-4 text-muted small fw-bold text-uppercase" style="font-size: 0.7rem; letter-spacing: 1px;">System</li>
            
            <li class="sidebar-item {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                <a href="{{ route('admin.settings') }}" class="sidebar-link">
                    <i class="fas fa-cog"></i> Settings
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                <a href="{{ route('admin.users') }}" class="sidebar-link">
                    <i class="fas fa-user-shield"></i> Admin Users
                </a>
            </li>
        </ul>
        
        <div class="p-3">
             <div style="background: rgba(255,255,255,0.02); border-radius: 4px; padding: 1rem; border: 1px solid rgba(255,255,255,0.05);">
                <p class="text-muted small mb-2"><i class="fas fa-circle text-red me-2" style="font-size: 8px;"></i>System Status</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-white small fw-bold italic">LIVE</span>
                    <span class="text-muted small">v3.0.0</span>
                </div>
             </div>
        </div>
    </aside>

    <!-- Top Nav -->
    <nav class="top-nav">
        <!-- Search -->
        <div class="search-container">
            <i class="fas fa-search text-muted"></i>
            <input type="text" class="search-input" placeholder="Search data...">
        </div>

        <div class="d-flex align-items-center gap-4">
            <!-- Theme Toggle -->
            <div class="dropdown">
                <div class="cursor-pointer" data-bs-toggle="dropdown">
                    <i class="fas fa-adjust fs-5 text-muted transition-opacity" id="theme-icon"></i>
                </div>
                <ul class="dropdown-menu dropdown-menu-end mt-2 shadow-lg">
                    <li><h6 class="dropdown-header text-uppercase small">Select Theme</h6></li>
                    <li><button class="dropdown-item py-2 d-flex align-items-center gap-2" onclick="setTheme('light')"><i class="fas fa-sun text-warning"></i> Light Mode</button></li>
                    <li><button class="dropdown-item py-2 d-flex align-items-center gap-2" onclick="setTheme('dark')"><i class="fas fa-moon text-primary"></i> Dark Mode</button></li>
                    <li><button class="dropdown-item py-2 d-flex align-items-center gap-2" onclick="setTheme('night')"><i class="fas fa-star text-header-aware"></i> Night Mode</button></li>
                </ul>
            </div>

            <!-- Notifications -->
            <div class="position-relative cursor-pointer">
                <i class="far fa-bell fs-5 text-muted transition-opacity"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border border-dark" style="font-size: 0.5rem; padding: 0.25em 0.4em;">5</span>
            </div>
            
            <!-- Profile Dropdown -->
            <div class="dropdown">
                <div class="d-flex align-items-center gap-3 cursor-pointer" data-bs-toggle="dropdown">
                    <div class="text-end d-none d-md-block">
                        <p class="m-0 small fw-bold text-header-aware ls-1 italic">Admin User</p>
                        <p class="m-0 text-red extra-small text-uppercase fw-bold italic">Super Admin</p>
                    </div>
                    <div class="position-relative">
                        <img src="https://i.pravatar.cc/150?u=admin" class="rounded-circle border border-2 border-dark" width="40" height="40">
                        <div class="position-absolute bottom-0 end-0 bg-success rounded-circle border border-dark" style="width: 10px; height: 10px;"></div>
                    </div>
                </div>
                <ul class="dropdown-menu dropdown-menu-end mt-2 shadow-lg">
                    <li><a class="dropdown-item py-2" href="#"><i class="fas fa-user-circle me-2 text-cyan"></i> My Profile</a></li>
                    <li><a class="dropdown-item py-2" href="{{ route('admin.settings') }}"><i class="fas fa-cog me-2 text-muted"></i> Account Settings</a></li>
                    <li><hr class="dropdown-divider border-secondary opacity-25"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item py-2 text-danger"><i class="fas fa-sign-out-alt me-2"></i> Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Theme Toggle Script -->
    <script>
        // Check local storage or default to dark
        const currentTheme = localStorage.getItem('theme') || 'dark';
        document.body.setAttribute('data-theme', currentTheme);
        updateThemeIcon(currentTheme);

        function setTheme(theme) {
            document.body.setAttribute('data-theme', theme);
            localStorage.setItem('theme', theme);
            updateThemeIcon(theme);
        }

        function updateThemeIcon(theme) {
            const icon = document.getElementById('theme-icon');
            icon.className = 'fas fs-5 hover-white transition-opacity'; // Reset base classes
            if (theme === 'light') {
                icon.classList.add('fa-sun', 'text-warning');
            } else if (theme === 'night') {
                icon.classList.add('fa-star', 'text-white');
            } else {
                icon.classList.add('fa-moon', 'text-primary');
            }
        }
    </script>
</body>
</html>
