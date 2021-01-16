<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h5 mb-0 text-gray-800">Laporan</h1>
    </div>

     <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header">Lihat Data User
              <div  style="float: right;">
                      <a href="<?= base_url('User/data_user')?>" class="btn btn-secondary btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                          <i class="fas fa-long-arrow-alt-left"></i>
                        </span>
                        <span class="text">Kembali</span>
                      </a>
                      <a href="<?= base_url('#')?>" class="btn btn-primary btn-icon-split btn-sm">
                        <span class="text">
                        <i class="fas fa-print"></i> Cetak</span>
                      </a>
                  </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="tabel1" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nip</th>
                      <th>Nama</th>
                      <th>Puskesmas</th>
                      <th>Alamat</th>
                      <th>No Tlp</th>
                      <th>Foto</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

<?php 
          $no=1;
         foreach ($detail->result() as $key => $data) {
 ?>         

                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $data->nip ?></td>
                      <td><?= $data->nama ?></td>
                      <td><?= $data->puskesmas ?></td>
                      <td><?= $data->alamat ?></td>
                      <td><?= $data->no_hp ?></td>
                      <td><?= $data->gambar ?></td>
                      <td>info|ubah|hapus</td>
                    </tr>
              
                  </tbody>
              
              <?php 
                }
               ?>
                </table>
              </div>
            </div>
            </div>
      

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->