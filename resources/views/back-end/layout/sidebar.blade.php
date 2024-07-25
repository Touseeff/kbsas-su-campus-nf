  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{ url('back-end/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">KBSAS</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                {{-- <h1>User</h1> --}}
                  {{-- <img src="{{ url('back-end\uploads\profile-image\s') }}" class="img-circle elevation-2" alt="User Image"> --}}
              </div>
              <div class="info">
                  <h1 class="text-center text-white">User</h1>
              </div>
          </div>

          <!-- SidebarSearch Form -->


          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item menu-open">
                      <a href="#" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          @if (!(Session::get('user_id')))
                              {
                              <li class="nav-item">
                                  <a href="{{ url('/user/show') }}" class="nav-link active">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Student View</p>
                                  </a>
                              </li>
                              }
                          @endif
                          <li class="nav-item">
                            @php
                            //    echo  $user_id = Session::get('user_id');
                            @endphp
                              <a href="{{ url('/user/view', ['id' => Session::get('user_id')]) }}" class="nav-link active">

                                  <i class="far fa-circle nav-icon"></i>
                                  <p> View Profile</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('/academic/create') }}" class="nav-link active">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Academic Record</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('/academic/view') }}" class="nav-link active">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Academic Record View</p>
                              </a>
                          </li>

                      </ul>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
