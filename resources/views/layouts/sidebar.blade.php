<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{ asset("adminlte/dist/img/AdminLTELogo.png") }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link loadscreen active">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/version') }}" class="nav-link loadscreen">
                        <i class="nav-icon fas fa-microchip"></i>
                        <p>Version</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/docs/3.1//dependencies.html" class="nav-link">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>
                            Dependencies & Plugins

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/docs/3.1//layout.html" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Layout

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/docs/3.1//components" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Components
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/docs/3.1//components/main-header.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Main Header</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/docs/3.1//components/main-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Main Sidebar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/docs/3.1//components/control-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Control Sidebar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/docs/3.1//layout.html" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Layout

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                        <a class="nav-link loadscreen" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-power-off"></i>
                            <p>Logout</p>
                        </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>


<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>