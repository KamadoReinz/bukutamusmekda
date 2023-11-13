<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('logout') }}" role="button"><i class="fas fa-sign-out-alt"> </i> Log
                out</a>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="javascript:;" class="brand-link">
        <img src="{{ url('dist/img/smk.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Buku Tamu</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('dist/img/donat.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block" style="font-weight: bold">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                @if (Auth::user()->role == 1)
                    <li class="nav-item">
                        <a href="{{ url('admin/dashboard') }}"
                            class="nav-link @if (Request::segment(2) == 'dashboard') active @endif">
                            <i class="nav-icon fas fa-desktop"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">MANAJEMEN</li>

                    <li class="nav-item">
                        <a href="{{ url('admin/user/list') }}"
                            class="nav-link @if (Request::segment(2) == 'user') active @endif">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">LIST</li>

                    <li class="nav-item">
                        <a href="{{ url('admin/tamu/list') }}"
                            class="nav-link @if (Request::segment(2) == 'tamu') active @endif">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Tamu
                            </p>
                        </a>
                    </li>
                @elseif (Auth::user()->role == 2)
                    <li class="nav-item">
                        <a href="{{ url('petugas/dashboard') }}"
                            class="nav-link @if (Request::segment(2) == 'dashboard') active @endif">
                            <i class="nav-icon fas fa-desktop"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">LIST</li>

                    <li class="nav-item">
                        <a href="{{ url('petugas/tamu/list') }}"
                            class="nav-link @if (Request::segment(2) == 'tamu') active @endif">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Tamu
                            </p>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="{{ url('bulanan') }}"
                        class="nav-link
                            {{ Route::currentRouteName() == 'bulanan.index' ? 'active' : '' }}
                            {{ Route::currentRouteName() == 'bulanan.show' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Data Bulanan
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
