<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  {{-- <a href="{{route('product.index')}}" class="brand-link">
    <img src="/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <img src=" {{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  </a> --}}
  
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div> 
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      @can('superadmin.users.index')
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{route('product.index')}}" class="nav-link {{ Request::is('product*') ? 'active' : '' }}">
            <i class="fa-solid fa-shirt"></i>
            <p> 
              Lista Productos
            </p>
          </a>
        </li>
      </ul> 
    @endcan
      @can('superadmin.users.index')
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('superadmin.users.index')}}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
              <i class="fa-solid fa-users"></i>
              <p> 
                Lista Usuarios
              </p>
            </a>
          </li>
        </ul> 
      @endcan
      @can('superadmin.roles.index')
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('superadmin.roles.index')}}" class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
              <i class="fa-solid fa-users-cog"></i>
              <p> 
                Lista De Roles
              </p>
            </a>
          </li>
        </ul> 
      @endcan

      @can('superadmin.permisos.index')
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('superadmin.permissions.index')}}" class="nav-link {{ Request::is('permissions*') ? 'active' : '' }}">
              <i class="fa-solid fa-people-line"></i>
              <p> 
                Lista De Permisos
              </p>
            </a>
          </li>
        </ul> 
      @endcan
      @auth
        <form action="{{route('logout')}}" method="POST">
          @csrf
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a class="nav-link" onclick="this.closest('form').submit()">
                <i class="fa-solid fa-right-to-bracket"></i>
                <p>
                  Cerrar Sesión
                </p>
              </a>
            </li>
          </ul>
        </form>
      @endauth
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>