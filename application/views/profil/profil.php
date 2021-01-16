<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h5 mb-0 text-gray-800">Profil</h1>
</div>
 <!-- Nip <?= $detail->nip ?>
 Nama <?= $detail->nama ?> -->

			  <div class="card">
                <div class="card-header">Profil
                  <div  style="float: right;">
                      <a href="<?= base_url('admin')?>" class="btn btn-secondary btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                          <i class="fas fa-long-arrow-alt-left"></i>
                        </span>
                        <span class="text">Kembali</span>
                      </a>
                  </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <table class="table table-striped">
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?= $this->fungsi->user_login()->email ?></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><?= $this->fungsi->user_login()->username?></td>
                            
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $this->fungsi->user_login()->nama?></td>
                            
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $this->fungsi->user_login()->alamat?></td>
                            
                        </tr>
                        <tr>
                            <td>No Hp</td>
                            <td>:</td>
                            <td><?= $this->fungsi->user_login()->no_hp?></td>
                            
                        </tr>
                     </table>
                        </div>
                        <div class="col-4">
                                <img class="mt-2" style="display: block;  margin: 0px auto; text-align: center; width: 200px; height: 200px;" src="<?= base_url('assets/');?>img/<?= $this->fungsi->user_login()->gambar?>"><br>
                                <div align="center">
                                    <b><?= $this->fungsi->user_login()->email ?></b><br>
                                   <?= $this->fungsi->user_login()->nama ?>
                                </div>
                        </div>
                        
                    </div>
                    <div align="center">
                     <a href="<?= base_url('admin/ubah')?>" class="btn btn-primary btn-icon-split btn-sm">
                        <span class="text">Ubah Data</span>
                      </a>
                     </div>
                      </div>
                </div>


</div>
</div>