<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h5 mb-0 text-gray-800">Wilayah</h1>
    </div>

     <!-- DataTales Example -->
          <div class="card shadow mb-4">
           <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Data wilayah</h6></a>
             <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
              <?php echo $this->session->flashdata('message'); ?>
             <div>
               <a href="<?= base_url('data_wilayah/tambah_data')?>" class="btn btn-outline-primary mb-2">
                    <span class="text">
                    <i class="fas fa-plus-circle"></i>
                    Tambah Data</span>
                  </a>

                 <!-- <button class="btn btn-outline-success mb-2" data-toggle="modal" data-target="#exampleModal">
                    <span class="text">
                    <i class="fas fa-upload"></i> Import Excel</span>
                  </button> -->
                  
                    <a target="BLANK" href="<?= base_url('data_wilayah/pdf_wilayah')?>" class="btn btn-outline-info mb-2"><i class="fas fa-print"></i> PDF </a>
                  
             </div> 
            <hr class="my-0">
            <div class="table-responsive mt-2">
              <div class="table table-bordered">
                <table class="table table-sm" id="tabel1" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Kecamatan</th>
                      <th>Nama Kecamatan</th>
                      <th>Geojson</th>
                      <th>Warna</th>
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
                      <td><?= $data->kode_wilayah ?></td>
                      <td><?= $data->nama_wilayah ?></td>
                      <td><a href="<?=base_url('assets/filegs/'.$data->geojson)?>" target="_BLANK"><?= $data->geojson?></a></td>
                      <td style="background: <?= $data->warna?>"></td>
                      <td>
                          <a  href="<?= base_url('data_wilayah/edit_data/').$data->id_wilayah?>" class="btn btn-primary">
                          <i class="fas fa-edit"></i>
                          </a>
                         
                          <a href="<?= base_url('data_wilayah/hapus/').$data->id_wilayah?>" class="btn btn-danger" onclick="return confirm('Hapus Data')">
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
        <h5 class="modal-title" id="exampleModalLabel">Form Import Excel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form method="post" action="<?= base_url('data_wilayah/import_csv')?>" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
          <label>File Excel</label>
                  <input type="file" class="form-control-file" id="csv" name="csv" required accept=".xls, .xlsx">
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
