<div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h5 mb-0 text-gray-800">Tahun</h1>
    </div>
     <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Data Tahun</h6></a>
            <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
              <?php echo $this->session->flashdata('message'); ?>
              <button class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#ModalTambah">
                    <span class="text">
                    <i class="fas fa-plus-circle"></i>
                    Tambah Data</span>
                  </button>

                   <a target="_BLANK" href="<?= base_url('tahun/tahun_pdf')?>" class="btn btn-outline-info mb-2"><i class="fas fa-print"></i> PDF </a>
                  
              <hr class="my-0">
              <div class="table-responsive mt-2">
              <div class="table table-bordered">
                <table class="table table-sm" id="tabel1" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tahun</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    
                   <?php 
                   $no=1;
                        foreach ($tahun->result() as $key => $value) {

                    ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?=$value->tahun?></td>
                      <td><?php 
                      $status = $value->status;
                      if ($value->status == 1) { ?>
                        <a href="<?= base_url('tahun/aktifasi/')?>?id=<?=$value->id?>&val=<?=$value->status?>" class="btn btn-primary btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                            </span>
                            <span class="text">Aktif</span>
                  </a>
                     <?php }else{ ?>
                              <a href="<?= base_url('tahun/aktifasi/')?>?id=<?=$value->id?>&val=<?=$value->status?>" class="btn btn-danger btn-icon-split btn-sm">
                                <span class="icon text-white-50">
                                </span>
                                <span class="text">Tidak Aktif</span>
                              </a>
                    <?php  } ?></td>
                      <td width="13%">
                        <button class="btn btn-info" data-toggle="modal" data-target="#ModalUbah<?=$value->id; ?>">
                          <i class="fas fa-edit"></i>
                          </button>
                          <a href="<?= base_url('tahun/hapus/').$value->id?>" class="btn btn-danger" onclick="return confirm('Hapus Data')">
                          <i class="fas fa-trash"></i>
                          </a>
                      </td>
                   <?php } ?>
                    </tr>
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

<!-- Modal -->
<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="ModalTambah" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalTambah">Tambah Data Tahun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('tahun/tambah_data')?>" method="post">
        <div class="form-group">
                <div>
                   <input value="" type="text" class="form-control" id="id" name="id" hidden="">
                    <label for="exampleFormControlFile1">Tahun</label>
                    <input value="<?=set_value('tahun') ?>" type="text" class="form-control <?=form_error('tahun') ? 'is-invalid' : null?>" id="tahun" name="tahun">
                     <?= form_error('tahun')?>
                  </div>
                </div>
      </div>
      <div class="modal-footer simpanData">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- End Modal Tambah Data -->

<!-- Modal Ubah -->

<?php  foreach ($tahun->result() as $key) { ?>

<div class="modal fade" id="ModalUbah<?=$key->id ?>" tabindex="-1" role="dialog" aria-labelledby="ModalUbah" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalUbah">Ubah Data Tahun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('tahun/ubah')?>" method="post">
        <div class="form-group">
                <div>
                   <input value="<?= $key->id ?>" type="text" class="form-control" id="id" name="id" hidden="">
                    <label for="exampleFormControlFile1">Tahun</label>
                    <input value="<?= $key->tahun ?>" type="text" class="form-control <?=form_error('tahun') ? 'is-invalid' : null?>" id="tahun" name="tahun">
                     <?= form_error('tahun')?>
                  </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ubah</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </form>
    </div>
  </div>
</div>
<?php } ?>
<!-- End Modal Ubah Data -->