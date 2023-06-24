<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - AdminLTE</title>
    <link rel="stylesheet" href="{{ asset('css/admin/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/summernote/summernote-bs4.min.css">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE JS -->
    <script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js?v=3.2.0"></script>

    <!-- Summernote JS -->
    <script src="https://adminlte.io/themes/v3/plugins/summernote/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Auto fadeout the success alert after 1 seconds (1000 milliseconds)
            $('.alert-success,.alert-danger').delay(1000).fadeOut('slow');
        });
    </script>
</head>
<body class="hold-transition sidebar-mini">
    <div class="{{ (!auth()->check()) ? 'login-page' : 'wrapper' }}">
        <!-- Navbar -->
        @if (auth()->check())
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Navbar content goes here -->
            </nav>
        @endif

        <!-- Sidebar -->
        @if (auth()->check())
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Sidebar content goes here -->
                <div class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <!-- User panel content -->
                        <div class="info">
                            <!-- User information -->
                            <a href="#" class="d-block">Welcome, {{ Auth::user()->name }}</a>
                        </div>
                    </div>

                    <!-- Sidebar menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Other sidebar menu items -->
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin/menus') ? 'active' : '' }}" href="{{ route('admin.menus.index') }}">
                                    <p>Menus</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin/categories') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                                    <p>Categories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin/about_us') ? 'active' : '' }}" href="{{ route('admin.about_us.edit') }}">
                                    <p>About us</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <p>Logout</p>
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>

        @endif

        <!-- Content Wrapper -->
        <div class="{{ auth()->check() ? 'content-wrapper' : 'login-box' }}">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                </div>
            @endif

            <section class="content">
                @yield('content')
            </section>
        </div>

        <!-- Footer -->
        @if (auth()->check())
            <footer class="main-footer">
                <!-- Footer content goes here -->
            </footer>
        @endif
    </div>
</body>
@yield('js')
</html>
