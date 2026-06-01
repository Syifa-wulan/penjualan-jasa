<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">

        <div class="sidebar-brand">
            <a href="{{ route('pages.beranda.index') }}">ARCLINE STUDIO</a>
        </div>

        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('pages.beranda.index') }}">AS</a>
        </div>

        <ul class="sidebar-menu">

            <li class="menu-header">Dashboard</li>

            <li class="{{ request()->routeIs('pages.beranda.index') ? 'active' : '' }}">
                <a href="{{ route('pages.beranda.index') }}" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Management</li>

            <li class="{{ request()->routeIs('pages.products.index') ? 'active' : '' }}">
                <a href="{{ route('pages.products.index') }}" class="nav-link">
                    <i class="fas fa-box"></i>
                    <span>Products</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('pages.orders.index') ? 'active' : '' }}">
                <a href="{{ route('pages.orders.index') }}" class="nav-link">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Orders</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('pages.customers.index') ? 'active' : '' }}">
                <a href="{{ route('pages.customers.index') }}" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span>Customers</span>
                </a>
            </li>
        </ul>

    </aside>
</div>