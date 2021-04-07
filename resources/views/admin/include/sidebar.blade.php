<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('dashboard') }}" class="brand-link">
        <img src="{{ asset('newheader/dist/img/AdminLTELogo.png') }}" alt="Community" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Community App</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('dashboard') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    </ul>
                    
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('fetch_users') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('create_user') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-list-alt nav-icon" aria-hidden="true"></i>
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('categories') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('subcategories') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub - Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ url('news') }}" class="nav-link">
                        <i class="fas fa-newspaper nav-icon"></i>
                        <p>
                            News
                            <i class="fas fa-angle-left right"></i>
                           
                        </p>
                    </a>
                    {{-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('newsList') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>News List</p>
                            </a>
                        </li>
                        
                    </ul> --}}
                </li>
                <li class="nav-item">
                    <a href="{{ url('event_list') }}" class="nav-link">
                        <i class="fas fa-calendar-week nav-icon"></i>
                        <p>
                            Event
                            <i class="fas fa-angle-left right"></i>
                           
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
