<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bimo Property Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #05603A;
            padding-top: 20px; /* Height of navbar */
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 8px 16px;
            color: white;
        }
        .sidebar ul li:hover {
            background-color: #054F31;
        }

        .sidebar ul li:active {
            background-color: #054F31;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <ul>
            <div class="profile-admin" style="margin-left:20px">
                <li><img style="width:60px; border-radius:50%" src="{{ asset('photo/' . auth()->user()->photo) }}" alt="User Profile Picture"></li>
                <li><a class="btn2" style="color: white ; font-size:24px;" href="/admin/profile">{{ Auth::user()->name }}</a></li>
            </div>
            <li ><a class="nav-link {{ Request::is('/admin/dashboard') ? 'active' : '' }}" href="/admin/dashboard" style="color:white"><i class="fas fa-tachometer-alt" style="color:#D0D5DD"></i> Dashboard</a></li>

            <li><a class="nav-link {{ Request::is('/rental') ? 'active' : '' }}" href="#" style="color:white"><i class="fas fa-home" style="color:#D0D5DD"></i> Tambah Rumah</a></li>
            <li><a class="nav-link {{ Request::is('/rental') ? 'active' : '' }}" href="#" style="color:white"><i class="fas fa-home" style="color:#D0D5DD"></i> Tambah Ruko</a></li>
            <li><a class="nav-link {{ Request::is('/rental') ? 'active' : '' }}" href="#" style="color:white"><i class="fas fa-couch" style="color:#D0D5DD"></i> Tambah Furniture</a></li>
            <li><a class="nav-link {{ Request::is('/rental') ? 'active' : '' }}" href="#" style="color:white"><i class="fas fa-newspaper" style="color:#D0D5DD"></i> Tambah Berita</a></li>
            <li><a class="nav-link {{ Request::is('/rental') ? 'active' : '' }}"href="#" style="color:white"><i class="fas fa-question-circle" style="color:#D0D5DD"></i> Tambah FAQ</a></li>
            <li><a class="nav-link {{ Request::is('/rental') ? 'active' : '' }}" href="#" style="color:white"><i class="fas fa-user-plus" style="color:#D0D5DD"></i> Agen</a></li>
            <li><a class="nav-link {{ Request::is('/rental') ? 'active' : '' }}" href="#" style="color:white"><i class="fas fa-trophy" style="color:#D0D5DD"></i> Award</a></li>

            <li ><a class="nav-link {{ Request::is('/admin/profile') ? 'active' : '' }}" href="/admin/profile" style="color:white"><i class="fas fa-user" style="color:white"></i> Profile</a></li>
            <li style=" margin-left:20px"><a class="btn2" style="; color:white" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}

                    <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none">
                        @csrf
                    </form>
                </a>
            </li>
            <!-- Add more sidebar items as needed -->
        </ul>
    </div>
    </div>

    <!-- Page content -->
    <div id="content">
        @yield('content')
    </div>

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        // Toggle sidebar
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('.sidebar').toggleClass('active');
                $('.nav-link').removeClass('active'); // Hapus kelas active dari semua navbar
                $(this).addClass('active'); 
            });
        });
    </script>
</body>
</html>
