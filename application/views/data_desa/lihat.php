<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h5 mb-0 text-gray-800">Desa</h1>
    </div>

     <!-- DataTales Example -->
          <div class="card shadow mb-4">
           <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Data Desa</h6></a>
             <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
              <?php echo $this->session->flashdata('message'); ?>
             <div>
               <a href="<?= base_url('data_desa/tambah')?>" class="btn btn-outline-primary mb-2">
                    <span class="text">
                    <i class="fas fa-plus-circle"></i>
                    Tambah Data</span>
                  </a>

                 <button class="btn btn-outline-success mb-2" data-toggle="modal" data-target="#exampleModal">
                    <span class="text">
                    <i class="fas fa-upload"></i> Import Excel</span>
                  </button>
                  
                    <a target="BLANK" href="<?= base_url('')?>" class="btn btn-outline-info mb-2"><i class="fas fa-print"></i> PDF </a>
                  
             </div> 
            <hr class="my-0">
            <div class="table-responsive mt-2">
              <div class="table table-bordered">
                <table class="table table-sm" id="tabel1" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Desa</th>
                      <th>Nama Desa</th>
                      <th>Nama Kecamatan</th>
                      <th>Geojson</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                 
                  <tbody>

                    <?php 
                      $no=1;
                      foreach ($lihat as $key => $data) { 
                    ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $data->kode_desa ?></td>
                      <td><?= $data->nama_desa ?></td>
                      <td><?= $data->nama_wilayah ?></td>
                      <td><a href="<?=base_url('assets/filegsdesa/'.$data->de_geojson)?>" target="_BLANK"><?= $data->de_geojson?></a>
                        <?php if ($data->de_geojson == NULL) { ?>
                          <button class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#geojson<?=$data->id_desa; ?>">
                            <span class="icon text-white-50">
                              <i class="fas fa-file-upload"></i></span>
                            <span class="text">Upload File</span>
                          </button>
                      <?php  } ?>
                          
                      </td>
                      <td>
                          <a  href="<?= base_url('data_desa/edit_data/').$data->id_desa?>" class="btn btn-primary">
                          <i class="fas fa-edit"></i>
                          </a>
                         
                          <a href="<?= base_url('data_desa/hapus/').$data->id_desa?>" class="btn btn-danger" onclick="return confirm('Hapus Data')">
                          <i class="fas fa-trash"></i>
                          </a>

                      </td>
                    </tr>

                      <?php } ?>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Upload Excel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form method="post" action="<?= base_url('data_desa/import')?>" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
          <label>File Excel</label>
                  <input type="file" class="form-control-file" id="ex" name="ex" required accept=".xls, .xlsx">
        </div>
      </div>
      <div class="modal-footer">
    <button type="submit" name="simpan" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>


<?php foreach ($lihat as $key) { ?>

<!-- Modal -->
<div class="modal fade" id="geojson<?=$key->id_desa; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload File Geojson</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form method="post" action="<?=base_url('data_desa/upload_geojson')?>" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
          <label>Pilih File</label>
                  <input hidden="" type="text" id="id" name="id" value="<?= $key->id_desa ?>">
                  <input hidden="" type="text" id="kode" name="kode" value="<?= $key->kode_desa ?>">
                  <input hidden="" type="text" id="kecamatan" name="kecamatan" value="<?= $key->kode_wilayah ?>">
                  <input hidden="" type="text" id="desa" name="desa" value="<?= $key->nama_desa ?>">
                  <input hidden="" type="text" id="lat" name="lat" value="<?= $key->lat ?>">
                  <input hidden="" type="text" id="lng" name="lng" value="<?= $key->lng ?>">
                  <input hidden="" type="text" id="warna" name="warna" value="<?= $key->warna ?>">
                  <input type="file" class="form-control-file" id="file" name="file" required accept=".geojson, .Geojson">
        </div>
      </div>
      <div class="modal-footer">
    <button type="submit" name="simpan" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>

<?php } ?>