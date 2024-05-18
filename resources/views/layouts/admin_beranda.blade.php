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
        .content-layout{
        background-color: #EDFCF2;
        }
        
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: white;
            padding-top: 20px;
            border-radius:20px /* Height of navbar */
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 8px 16px;
            color: #9AA4B2;
            width:85%;
            border-radius:20px;
            margin-left:16px;
        }
        .sidebar ul li a {
            color: #9AA4B2; /* Ubah warna ikon saat dihover */
        }
        
        .sidebar ul li i {
            color: #9AA4B2; /* Ubah warna ikon saat dihover */
        }

        .sidebar ul li:hover {
            background-color: #EDFCF2;
            color:#9AA4B2;
        }

        .sidebar ul li:hover a {
            color: #099250; /* Ubah warna ikon saat dihover */
        }
        
        .sidebar ul li:hover i {
            color: #099250; /* Ubah warna ikon saat dihover */
        }

        .sidebar ul li:active {
            background-color: #EDFCF2;
            color: #9AA4B2;
        }
        .sidebar ul li.active a {
            color: #099250;
        }
        .sidebar ul li.active i {
            color: #099250;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" style ="">
        <ul>
            <li><img src="/IMG/Logo_Bimo_Property.png" alt="" class="img-nav"></li>
            <li ><a class="nav-link {{ Request::is('/admin/dashboard') ? 'active' : '' }}" href="/admin/dashboard" "><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>

            <li><a class="nav-link {{ Request::is('/rental') ? 'active' : '' }}"href="#" ><i class="fas fa-question-circle" ></i> Tambah FAQ</a></li>
            <li><a class="nav-link {{ Request::is('/rental') ? 'active' : '' }}" href="#" ><i class="fas fa-newspaper" ></i> Tambah Berita</a></li>
            <li><a class="nav-link {{ Request::is('/admin/tambahagen') ? 'active' : '' }}" href="/admin/tambahagen" ><i class="fas fa-user-plus" ></i> Agen</a></li>
            <li><a class="nav-link {{ Request::is('/rental') ? 'active' : '' }}" href="#" ><i class="fas fa-couch" ></i> Tambah Furniture</a></li>
            <li><a class="nav-link {{ Request::is('/rental') ? 'active' : '' }}" href="#" ><i class="fas fa-trophy" ></i> Award</a></li>
            <li><a class="nav-link {{ Request::is('/rental') ? 'active' : '' }}" href="#" ><i class="fas fa-home" ></i> Tambah Rumah</a></li>
            <li><a class="nav-link {{ Request::is('/rental') ? 'active' : '' }}" href="{{ route('admin.ruko') }}" ><i class="fas fa-home" ></i> Tambah Ruko</a></li>

            <li ><a class="nav-link {{ Request::is('/admin/profile') ? 'active' : '' }}" href="/admin/profile" ><i class="fas fa-user" ></i> Profile</a></li>
            <li style=" margin-left:20px"><a class="btn2" style="; color:#9AA4B2" href="{{ route('logout') }}"
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
    <div id="content" class="content-layout">
        @yield('content')
    </div>

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        // Toggle sidebar
        

        $(document).ready(function () {
            var current_url = window.location.href;
            $('.sidebar ul li a').each(function () {
                if ($(this).attr('href') == current_url) {
                    $(this).closest('li').addClass('active');
                }
            });
        });
    </script>
</body>
</html>
