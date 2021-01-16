<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h5 mb-0 text-gray-800">Detail Data User</h1>
</div>
 <!-- Nip <?= $detail->nip ?>
 Nama <?= $detail->nama ?> -->

			  <div class="card">
                <div class="card-header">Informasi
                  <div  style="float: right;">
                      <a href="<?= base_url('user/data_user')?>" class="btn btn-secondary btn-icon-split btn-sm">
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
                            <td><?= $detail->email ?></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><?= $detail->username ?></td>
                            
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $detail->nama ?></td>
                            
                        </tr>
                        <tr>
                            <td>Puskesmas</td>
                            <td>:</td>
                            <td><?= $detail->puskesmas ?></td>
                            
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $detail->alamat ?></td>
                            
                        </tr>
                        <tr>
                            <td>No Hp</td>
                            <td>:</td>
                            <td><?= $detail->no_hp ?></td>
                            
                        </tr>
                     </table>
                        </div>
                        <div class="col-4">
                                <img class="mt-2" style="display: block;  margin: 0px auto; text-align: center; width: 200px; height: 200px;" src="<?= base_url('assets/');?>img/<?= $detail->gambar?>"><br>
                                <div align="center">
                                    <b><?= $detail->email ?></b><br>
                                    <?= $detail->nama ?>
                                </div>
                            
                        </div>
                        
                    </div>
                     
                     
                      </div>
                </div>


</div>
</div>