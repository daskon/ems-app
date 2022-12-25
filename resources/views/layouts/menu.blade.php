<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
    <a href="{{ route('companies') }}" class="nav-link {{ Request::is('companies') ? 'active' : '' }}">
        <i class="nav-icon fas fa-building"></i>
        <p>Company</p>
    </a>
    <a href="{{ route('employees') }}" class="nav-link {{ Request::is('employees') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Employee</p>
    </a>
</li>
