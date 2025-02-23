<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Event Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="p-3 text-white col-md-3 bg-dark vh-100">
                <h4 class="text-center">Admin Dashboard</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="text-white nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="text-white nav-link" href="{{ route('events.index') }}">
                            <i class="fa fa-calendar" aria-hidden="true"></i> Manajemen Acara
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="text-white nav-link" href="{{ route('profile.edit') }}">
                            <i class="fa fa-user" aria-hidden="true"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="text-white nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="p-4 col-md-9">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
