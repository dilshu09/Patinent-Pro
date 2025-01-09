<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Management</title>

    <!-- This is your main styling for the side nav, main content, etc. -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @auth
    <!-- ========== Sidebar for Authenticated Users ========== -->
    <aside class="sidebar">
        <!-- Brand/Logo Section -->
        <div class="sidebar-brand">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="sidebar-logo">
            <!-- <h2 class="sidebar-brand-name">Enelys</h2> -->
        </div>

        <!-- Main Menu -->
        <div class="sidebar-section">
            <h4 class="sidebar-section-title">MAIN MENU</h4>
            <ul class="sidebar-menu">


                @if(auth()->user()->isAdmin)
                <li class="sidebar-menu-item">
                    <a href="{{ route('admin.users') }}"
                        class="sidebar-menu-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                        <span class="sidebar-menu-icon">&#128101;</span>
                        <span class="sidebar-menu-text">Manage Users</span>
                    </a>
                </li>
                @endif

                @if(auth()->user()->isNurse)
                <li class="sidebar-menu-item">
                    <a href="{{ route('nurse.patients') }}"
                        class="sidebar-menu-link {{ request()->routeIs('nurse.patients*') ? 'active' : '' }}">
                        <span class="sidebar-menu-icon">&#128137;</span>
                        <span class="sidebar-menu-text">Manage Patients (Nurse)</span>
                    </a>
                </li>
                @endif

                @if(auth()->user()->isDoctor)
                <li class="sidebar-menu-item">
                    <a href="{{ route('doctor.patients') }}"
                        class="sidebar-menu-link {{ request()->routeIs('doctor.patients*') ? 'active' : '' }}">
                        <span class="sidebar-menu-icon">&#128300;</span>
                        <span class="sidebar-menu-text">Manage Patients (Doctor)</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <!-- Other Section -->
        <div class="sidebar-section">
            <h4 class="sidebar-section-title">OTHER</h4>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <span class="sidebar-menu-icon">&#9881;</span>
                        <span class="sidebar-menu-text">Setting</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <!-- Updated link for Help Center -->
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="sidebar-menu-link" target="_blank">
                        <!-- target="_blank" will open a new tab -->
                        <span class="sidebar-menu-icon">&#x2753;</span>
                        <span class="sidebar-menu-text">Help Center</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Logout Button -->
        <form action="{{ route('logout') }}" method="POST" class="sidebar-logout-form">
            @csrf
            <button type="submit" class="sidebar-logout-button">Logout</button>
        </form>
    </aside>
    @endauth

    <!-- ========== Main Content ========== -->
    <div class="main-content">
        @if(session('message'))
        <div class="alert success">{{ session('message') }}</div>
        @endif
        @if(session('error'))
        <div class="alert error">{{ session('error') }}</div>
        @endif

        @yield('content')
    </div>
</body>

</html>