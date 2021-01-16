<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <div class="ml-4">
            <img class="mt-1" style="width: 40px; height: 50px;" src="<?= base_url('assets/');?>templet/images/3507.png" alt="waves">
          </div>   
        <div class="text-dark font-weight-bold my-0">
          <p class="h7 ml-2 mt-3 "><strong>DINAS KESEHATAN <br>KABUPATEN MALANG </strong></p>
        </div>
           <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-3 mt-1 d-none d-lg-inline text-gray-600 small"><?=$this->fungsi->user_login()->nama?></span>
                 
                <img class="img-profile rounded-circle" src="<?= base_url('assets/');?>img/<?= $this->fungsi->user_login()->gambar?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('Admin/profil')?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('auth/logut');?>">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>

    </nav>
        <!-- End of Topbar -->