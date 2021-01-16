

 <!-- Begin Page Content -->
        <div class="container-fluid">

        </div>
        <!-- /.container-fluid -->

        <div class="container mx-auto">

         <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h5 mb-0 text-gray-800">Dashboard</h1>
          </div>
          <br>
          <div align="center" class="h5 mb-0 font-weight-bold text-gray-800 mb-2"><b>Selamat Datang <?= $this->fungsi->user_login()->nama?></b>
            <br> 
            (<?= $this->fungsi->user_login()->username ?>)</div><br>
          <!-- Content Row -->
          <div class="row">

           <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Wilayah Kecamatan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $wilayah  ?> Kecamatan</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-atlas fa-3x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <?php 
           $this->db->select('*');
          $this->db->from('tb_tahun');
          $this->db->where('status', 1);
          $data = $this->db->get('');
           foreach ($data->result() as $key => $value) {?>

           <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Penderita Stunting Tahun <?=$value->tahun?></div>
                      
                      <?php 
                      $this->db->select('kode_wilayah,tahun, COUNT(tahun) as total');
                      $this->db->from('tb_stunting');
                      $this->db->group_by('tahun');
                      $this->db->where('tahun', $value->tahun);
                      $this->db->order_by('total', 'desc');
                      $db = $this->db->get();
                      foreach ($db->result() as $row_2018) { ?>
            
          
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$row_2018->total?> Balita</div>
                       <?php  } ?>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-baby fa-3x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <?php } ?>
           <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Penguna Sistem</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $user  ?> User</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-circle fa-3x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          
          </div>

          <!-- Content Row -->
          </div>

      </div>
      <!-- End of Main Content -->