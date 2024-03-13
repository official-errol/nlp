<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="/images/admin_logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">WBMDASMP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->




      <!-- Sidebar Menu -->
      <nav class="mt-2" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="/home" class="nav-link @if(Request::path() == 'home'  ) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dataset

              </p>
            </a>
          </li>

          



          <li class="nav-header">USER</li>

         <!--  <li class="nav-item">
            <a href="/admin/staff" class="nav-link @if(Request::path() == 'admin/staff'  ) active @endif">


              <i class="nav-icon fas fa-users"></i>
              <p>
                Staff

              </p>
            </a>
          </li> -->

          <li class="nav-item">
            <a  class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit(); ">

              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout

              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
