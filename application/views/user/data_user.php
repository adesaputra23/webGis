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
                   <a href="<?= base_url('user/tambah_data')?>" class="btn btn-outline-primary mb-2">
                    <span class="text">
                    <i class="fas fa-user-plus"></i>
                    Tambah Data</span>
                  </a>
                  <a target="_BLANK" href="<?= base_url('user/user_pdf')?>" class="btn btn-outline-info mb-2"><i class="fas fa-print"></i> PDF </a>
              </div>
              

              <hr class="my-0">
              <div class="table-responsive mt-2">
                <div class="table table-bordered">
                <table class="table table-sm" id="tabel1" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Email</th>
                      <th>alamat</th>
                      <th>No Tlp</th>
                      <th>level (Puskesmas)</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
          
                  <tbody>
                    <?php 
                    $no=1;
                      foreach ($row->result() as $key => $data) {
                        if ($data->level > 1) { ?>
                      <tr>
                        <td align="center"><?= $no++ ?></td>
                        <td><?= $data->email ?></td>
                        <td><?= $data->alamat ?></td>
                        <td><?= $data->no_hp ?></td>
                        <td><?php if ($data->level == 6) {
                          echo "Staf ";
                          echo "(".$data->puskesmas.")";
                        }else{
                          echo $data->username;
                        }?></td>
                        <td align="center"><?php 
                      $status = $data->status;
                      if ($status == 1) { ?>
                       <a href="<?= base_url('User/aktifasi/')?>?nip=<?=$data->nip?>&val=<?=$data->status?>" class="btn btn-success btn-sm">
                              <i class="fas fa-lock-open"></i>
                            </a>
                     <?php }else{ ?>
                             <a href="<?= base_url('User/aktifasi/')?>?nip=<?=$data->nip?>&val=<?=$data->status?>" class="btn btn-danger btn-sm">
                              <i class="fas fa-lock"></i>
                            </a>
                    <?php  } ?></td>
                        <td align="center"><a href="<?= base_url('User/detail_data/').$data->nip?>" class="btn btn-warning btn-sm">
                              <i class="fas fa-info-circle"></i>
                            </a>

                            <a href="<?= base_url('User/edit_data/').$data->nip?>" class="btn 
                            btn-info btn-sm">
                            <i class="fas fa-edit"></i>
                            </a>
                           
                            <a href="<?= base_url('User/hapus/').$data->nip?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus Data')">
                            <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                     <?php 
                      } 
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

