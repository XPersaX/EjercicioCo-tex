<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('product.index')}}" class="brand-link">
      <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Productos</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        @auth
          <div class="info">
            <a href="#" class="d-block">{{Auth::user()->name}}</a>
          </div> 
        @endauth

        @guest
        <div class="info">
          <a href="#" class="d-block">Inicia Sesión</a>
        </div>
        @endguest
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
        @auth
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="{{route('product.create')}}" class="nav-link">
              <i class="fa-solid fa-plus"></i>
                <p>
                  Registrar Producto
                </p>
              </a>
            </li>
          </ul> 
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="{{ route('register')}}" class="nav-link">
                <i class="fa-solid fa-user-plus"></i>
                <p>
                  Registrar Usuario
                </p>
              </a>
            </li>
          </ul>
        @endauth

        @guest

          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="{{ route('login')}}" class="nav-link">
                <i class="fa-solid fa-address-card"></i>
                <p>
                  Login
                </p>
              </a>
            </li>
          </ul>
            
        @endguest
        @auth
            <form action="{{'logout'}}" method="POST">
              @csrf
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                  <a class="nav-link">
                    <i class="fa-solid fa-right-to-bracket" onclick="this.closest('form').submit()"></i>
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