<aside class="main-sidebar elevation-4 sidebar-light-success">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard', $shop->id) }}" class="brand-link bg-success">
        <img src="{{ asset('img/logo/logo_2.png')}}" alt="{{ config('app.name') }}" class="brand-image img-circle elevation-3"
            style="opacity: .8; background-color: #fff;">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    {{ $shop->name }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class  with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard', $shop->id) }}" class="nav-link {{ Route::is('dashboard', $shop->id) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ Route::is('percels.send.percel', $shop->id) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('percels.send.percel', $shop->id) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            Percels
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('percels.send.percel', $shop->id) }}" class="nav-link {{ Route::is('percels.send.percel', $shop->id) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Send Percel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Receive Return</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index', $shop->id) }}" class="nav-link {{ Route::is('products.index', $shop->id) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('customers.index', $shop->id) }}" class="nav-link {{ Route::is('customers.index', $shop->id) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Customers &amp; leads
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>
                            Employees
                        </p>
                    </a>
                </li>
                <li class="nav-header">SHOPS</li>
                <li class="nav-item">
                    <a href="{{ route('shops.index', $shop->id) }}" class="nav-link  {{ Route::is('shops.index', $shop->id) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            My Shops
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>