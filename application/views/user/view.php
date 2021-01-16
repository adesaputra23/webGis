<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h5 mb-0 text-gray-800">User</h1>
    </div>

     <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Data User</h6></a>
            <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
              <?php echo $this->session->flashdata('message'); ?>
              <div>
                   <a href="<?= base_url('user/tambah_data')?>" class="btn btn-success mb-2">
                    <span class="text">
                    <i class="fas fa-user-plus"></i>
                    Tambah Data</span>
                  </a>
              </div>
              <hr class="my-0">
              <div class="table-responsive mt-2">
                <div class="table table-bordered">
                <table class="table table-bordered" id="tabel1" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>User</th>
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
                      foreach ($row->result() as $key => $data) {
                    ?>

                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $data->username?></td>
                      <td><?= $data->nip ?></td>
                      <td><?= $data->nama ?></td>
                      <td><?= $data->puskesmas ?></td>
                      <td><?= $data->alamat ?></td>
                      <td><?= $data->no_hp ?></td>
                      <td><img style="display: block;  margin: 0px auto; text-align: center; width: 40px; height: 40px;" src="<?= base_url('assets/');?>img/<?= $data->gambar?>">
                      </td>
                      <td><a href="<?= base_url('User/detail_data/').$data->nip?>" class="btn 
                          btn-info">
                          <i class="fas fa-edit"></i>
                          </a>

                          <a href="<?= base_url('data_wilayah/edit_data/').$data->id_wilayah?>" class="btn 
                          btn-info">
                          <i class="fas fa-edit"></i>
                          </a>
                         
                          <a href="<?= base_url('data_wilayah/hapus/').$data->id_wilayah?>" class="btn btn-danger" onclick="return confirm('Hapus Data')">
                          <i class="fas fa-trash"></i>
                          </a>
                      </td>
                    </tr>
                     <?php 
                      }
                     ?>
                  </tbody>
                </table>
              </div>
              </div>
            </div>
          </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

