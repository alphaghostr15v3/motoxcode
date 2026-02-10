<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOTOXCODE | Member Panel</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        :root {
            --primary-red: #ff0000;
        }
        .text-red { color: var(--primary-red) !important; }
        .bg-gradient-red { background: linear-gradient(45deg, #ff0000, #cc0000) !important; }
        .italic { font-style: italic; }
        .fw-black { font-weight: 900; }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-logomark" style="width: 38px; height: 32px; background: var(--primary-red); clip-path: polygon(0 0, 100% 0, 80% 100%, 0% 100%); display: flex; align-items: center; justify-content: center; color: #ffffff;">
                <i class="fas fa-motorcycle" style="font-size: 14px; margin-left: -4px;"></i>
            </div>
            <h4 class="fw-black m-0 italic" style="letter-spacing: -1px; line-height: 1;">MOTO<span class="text-red">X</span><br><span class="text-red fs-6">CODE</span></h4>
        </div>
        
        <ul class="sidebar-menu custom-scrollbar">
            <li class="sidebar-item {{ request()->routeIs('member.dashboard') ? 'active' : '' }}">
                <a href="{{ route('member.dashboard') }}" class="sidebar-link">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('member.profile') ? 'active' : '' }}">
                <a href="{{ route('member.profile') }}" class="sidebar-link">
                    <i class="fas fa-user"></i> My Profile
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('home') }}" class="sidebar-link">
                    <i class="fas fa-home"></i> Back to Website
                </a>
            </li>
        </ul>
        
        <div class="p-3 mt-auto">
             <div style="background: rgba(0,0,0,0.02); border-radius: 4px; padding: 1rem; border: 1px solid rgba(0,0,0,0.05);">
                <p class="text-muted small mb-2"><i class="fas fa-shield-alt text-red me-2" style="font-size: 8px;"></i>Member Access</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-red small fw-bold italic">ACTIVE</span>
                    <span class="text-muted small">v3.0.0</span>
                </div>
             </div>
        </div>
    </aside>

    <!-- Top Nav -->
    <nav class="top-nav">
        <div class="ms-auto d-flex align-items-center gap-4">
            <!-- Profile Dropdown -->
            <div class="dropdown">
                <div class="d-flex align-items-center gap-3 cursor-pointer" data-bs-toggle="dropdown">
                    <div class="text-end d-none d-md-block">
                        <p class="m-0 small fw-bold text-header-aware ls-1 italic">{{ auth()->guard('members')->user()->name }}</p>
                        <p class="m-0 text-red extra-small text-uppercase fw-bold italic">Member</p>
                    </div>
                    <div class="position-relative">
                        @if(auth()->guard('members')->user()->image)
                            <img src="{{ asset(auth()->guard('members')->user()->image) }}" class="rounded-circle border border-2 border-secondary" width="40" height="40" style="object-fit: cover;">
                        @else
                            <div class="rounded-circle border border-2 border-secondary bg-light d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="fas fa-user text-muted"></i>
                            </div>
                        @endif
                        <div class="position-absolute bottom-0 end-0 bg-success rounded-circle border border-white" style="width: 10px; height: 10px;"></div>
                    </div>
                </div>
                <ul class="dropdown-menu dropdown-menu-end mt-2 shadow-lg">
                    <li><a class="dropdown-item py-2" href="{{ route('member.profile') }}"><i class="fas fa-user-circle me-2 text-red"></i> My Profile</a></li>
                    <li><hr class="dropdown-divider border-secondary opacity-25"></li>
                    <li>
                        <form action="{{ route('member.logout') }}" method="POST">
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
</body>
</html>
