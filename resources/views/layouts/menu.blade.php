<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Proyecto</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Panel de administración</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">ACL</div>    

    <!-- Nav Item - Roles -->
    <li class="nav-item">
        <a class="nav-link" href=" {{ url('/admin/roles') }} ">
            <i class="fas fa-fw fa-user-secret"></i>
            <span>Roles</span>
        </a>
    </li>

    <!-- Nav Item - Usuarios -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/usuarios') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Usuarios</span>
        </a>
    </li>

    {{-- <!-- Nav Item - Permisos -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/permisos') }}">
            <i class="fas fa-fw fa-lock"></i>
            <span>Permisos</span>
        </a>
    </li> --}}

    <!-- Nav Item - Categorías -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/categorias') }}">
            <i class="fas fa-tv"></i>
            <span>Categorías</span>
        </a>
    </li>

    <!-- Nav Item - Materias -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/materias') }}">
            <i class="fas fa-user-graduate"></i>
            <span>Materias</span>
        </a>
    </li>

    <!-- Nav Item - Escuelas -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/escuelas') }}">
            <i class="fas fa-school"></i>
            <span>Escuelas</span>
        </a>
    </li>

    <!-- Nav Item - Videojuegos -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/videojuegos') }}">
            <i class="fas fa-gamepad"></i>
            <span>Videojuegos</span>
        </a>
    </li>

    {{-- <!-- Nav Item - Ventas -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/ventas') }}">
            <i class="fas fa-dollar-sign"></i>
            <span>Ventas</span>
        </a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->