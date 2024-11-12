<li
    {{-- ternary operator -> variable = condition ? true : false --}}
    class="sidebar-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
    <a href="{{ route('admin.index') }}" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
    </a>
</li>

<li
    class="sidebar-item has-sub">
    <a href="index.html" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Track Semua Pengaduan</span>
    </a>


    <ul class="submenu submenu-closed" style="--submenu-height:215px;">
        <li class="subnemu-item">
            < href"" class="submenu-link">Semua Pengaduan</a>
        </li>
        <li class="submenu-item">
            < href="" class="submenu-link">pending</a>
        </li>
        <li class="submenu-item">
            <a href="" class="submenu-link">proses</a>
        </li
        <li class="submenu-item">
            <a href="" class="submenu-link">selesai</a>
        </li>
    </ul>

</li>
<li class="submenu-item
    <a href
<li
    class="sidebar-item {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
    <a href="{{ route('admin.users.index') }}" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Master User</span>
    </a>
</li>
