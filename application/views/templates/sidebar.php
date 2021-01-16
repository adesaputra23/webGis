<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class=" fas fa-globe "></i>
        </div>
        <div class="sidebar-brand-text mx-2"> WEB SIG</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

       <!-- Heading -->
      <div class="sidebar-heading">
        Tampilan
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

       <!-- Divider -->
      <hr class="sidebar-divider my-0">


      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('mapspoint')?>">
          <i class="fas fa-map-marked-alt"></i>
          <span>Peta Persebaran</span></a>
      </li>

      <?php if($this->session->userdata('level') == '1' ){?>

      <!-- Divider -->
         <hr class="sidebar-divider my-0">

        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('rute')?>">
          <i class="fas fa-location-arrow"></i>
          <span>Rute Lokasi</span></a>
        </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

       <!-- Heading -->
      <div class="sidebar-heading">
        Mastering
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-database"></i>
          <span>Master</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data master:</h6>
            <a class="collapse-item" href="<?=base_url('tahun')?>">Data Tahun</a>
            <a class="collapse-item" href="<?=base_url('data_wilayah/wilayah')?>">Data Kecamatan</a>
            <a class="collapse-item" href="<?=base_url('data_desa/lihat')?>">Data Desa</a>
            <a class="collapse-item" href="<?=base_url('data_stunting')?>">Data Stunting</a>
          </div>
        </div>
      </li>

       <!-- Divider -->
      <hr class="sidebar-divider">

       <!-- Heading -->
      <div class="sidebar-heading">
        Reporting
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseToo" aria-expanded="true" aria-controls="collapseToo">
          <i class="fas fa-book"></i>
          <span>Laporan</span>
        </a>
        <div id="collapseToo" class="collapse" aria-labelledby="headingToo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Laporan:</h6>
            <a class="collapse-item" href="<?= base_url('Laporan_Wilayah')?>">Laporan Data Wilayah</a>
            <a class="collapse-item" href="<?= base_url('Laporan_stunting/laporan')?>">Laporan Data Stunting</a>
            <a class="collapse-item" href="<?=base_url('mapstandar?tahun=2019')?>">Persebaran Stunting</a>
            <a class="collapse-item" href="<?=base_url('chard')?>">Laporan Grafik</a>
          </div>
        </div>
      </li>

       <!-- Divider -->
         <hr class="sidebar-divider my-0">

         <!-- Nav Item - Grafik -->
        <li class="nav-item">
          <a class="nav-link mb-10" href="<?= base_url('User/data_user')?>">
          <i class="fas fa-users"></i>
          <span>User</span></a>
        </li>

      <?php } ?>

      <?php if($this->session->userdata('level') == '2' ){?>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Grafik -->
        <li class="nav-item">
        <a class="nav-link mb-10" href="<?=base_url('mapstandar?tahun=2019')?>">
          <i class="fas fa-globe-asia"></i>
          <span>Persebaran Stunting</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Grafik -->
        <li class="nav-item">
        <a class="nav-link mb-10" href="<?=base_url('chard')?>">
          <i class="fas fa-chart-area"></i>
          <span>Laporan Grafik</span></a>
        </li>

      <?php } ?>

     <?php if($this->session->userdata('level') == '6' ){?>

         <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Grafik -->
        <li class="nav-item">
        <a class="nav-link mb-10" href="<?=base_url('mapstandar?tahun=2019')?>">
          <i class="fas fa-globe-asia"></i>
          <span>Persebaran Stunting</span></a>
        </li>

        <!-- Divider -->
         <hr class="sidebar-divider my-0">

        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('data_stunting/staf/').$this->fungsi->user_login()->kode_wilayah?>">
          <i class="fas fa-database"></i>
          <span>Data Stunting</span></a>
        </li>

    <?php } ?>

     <?php if($this->session->userdata('level') == '3' ){?>

        <!-- Divider -->
         <hr class="sidebar-divider my-0">

        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('tahun')?>">
          <i class="far fa-calendar-plus"></i>
          <span>Tahun</span></a>
        </li>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('data_desa/lihat')?>">
          <i class="fas fa-atlas"></i>
          <span>Desa</span></a>
        </li>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('data_stunting')?>">
          <i class="fas fa-user-injured"></i>
          <span>Stunting</span></a>
        </li>

    <?php } ?>

    <?php if($this->session->userdata('level') == '4' ){?>

        <!-- Divider -->
         <hr class="sidebar-divider my-0">

        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('rute')?>">
          <i class="fas fa-location-arrow"></i>
          <span>Rute Lokasi</span></a>
        </li>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('Laporan_Wilayah')?>">
          <i class="fas fa-atlas"></i>
          <span>Laporan Data Wilayah</span></a>
        </li>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('Laporan_stunting/laporan')?>">
          <i class="fas fa-atlas"></i>
          <span>Laporan Data Stunting</span></a>
        </li>

    <?php } ?>

     <?php if($this->session->userdata('level') == '5' ){?>

        <!-- Divider -->
         <hr class="sidebar-divider my-0">

        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('rute')?>">
          <i class="fas fa-location-arrow"></i>
          <span>Rute Lokasi</span></a>
        </li>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('Laporan_Wilayah')?>">
          <i class="fas fa-atlas"></i>
          <span>Laporan Data Wilayah</span></a>
        </li>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('Laporan_stunting/laporan')?>">
          <i class="fas fa-atlas"></i>
          <span>Laporan Data Stunting</span></a>
        </li>

    <?php } ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->