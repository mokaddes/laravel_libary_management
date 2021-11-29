
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome5-overrides.min.css')}}">

</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="{{ route('admin') }}">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('admin') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('users') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <i class="fas fa-user"></i>
                            <span>Members</span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('books') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('books.index') }}">
                            <i class="fas fa-table"></i>
                            <span>Books</span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('rents') ? 'active' : '' }} ">
                        <a class="nav-link" href=" {{ route('rents.index') }} ">
                            <i class="far fa-user-circle"></i>
                            <span>Rent Books</span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('bookreturn') ? 'active' : '' }}">
                        <a class="nav-link" href=" {{ route('book_return') }} ">
                            <i class="fas fa-user-circle"></i>
                            <span>Retern Books</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ route('home') }} ">
                            <i class="fas fa-power-off"></i>
                            <span>Back Home</span>
                        </a>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input class="bg-light form-control border-0 small" type="text" name="search" placeholder="Search for ...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary py-0" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ml-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#">

                                        <span class="d-none d-lg-inline mr-2 text-gray-600 small">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <span class="d-none d-lg-inline mr-2 text-gray-600 small">
                                            {{ Auth::user()->name }}
                                        </span>
                                    </a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in">
                                        <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            &nbsp;Profile
                                        </a>
                                        <a class="dropdown-item" href="{{ route('users.edit', Auth::user()->id) }}">
                                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                            &nbsp;Settings
                                        </a>
                                        <div class="dropdown-divider">
                                        </div>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            &nbsp;Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                @yield('content')
            </div>
            <div class="content-wrapper">


                <!-- Main content -->
                <section class="container">

                </section>
              </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Mokaddes Hosain {{date('Y')}}</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/chart.min.js')}}"></script>
    <script src="{{asset('assets/js/bs-init.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="{{asset('assets/js/theme.js')}}"></script>
    @yield('script')
</body>

</html>
