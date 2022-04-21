<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">Perpusku</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($nav == 'dashboard' ? 'active' : ''); ?>">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
            <!-- Dashboard -->
        </a>
    </li>
    <!-- bg-gradient-success -->
    <li class="nav-item <?= ($nav == 'user' ? 'active' : ''); ?>">
        <a class="nav-link" href="/user">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>User</span></a>
    </li>

    <li class="nav-item <?= ($nav == 'book_collection' ? 'active' : ''); ?>">
        <a class="nav-link" href="/daftar-buku">
            <i class="fas fa-fw fa-book"></i>
            <span>Daftar Buku</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->