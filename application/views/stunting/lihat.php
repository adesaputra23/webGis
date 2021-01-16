<div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h5 mb-0 text-gray-800">Stunting</h1>
    </div>

     <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Data Stunting</h6></a>
            <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
              <?php echo $this->session->flashdata('message'); ?>
              <button type="button" class="btn btn-outline-secondary mb-2" data-toggle="modal" data-target="#lihat">
               <span class="text">
                    <i class="far fa-eye"></i> Lihat Data</span>
              </button>
              <a href="<?= base_url('data_stunting/tambah_s')?>" class="btn btn-outline-primary mb-2">
                    <span class="text">
                    <i class="fas fa-plus-circle"></i>
                    Tambah Data</span>
                  </a>
                   <button class="btn btn-outline-success mb-2" data-toggle="modal" data-target="#exampleModal">
                    <span class="text">
                    <i class="fas fa-upload"></i> Import Excel</span>
                  </button>

                  <button class="btn btn-outline-info mb-2" data-toggle="modal" data-target="#pdf"><i class="fas fa-print"></i>  
                    <span class="text">PDF</span> 
                  </button> 
                  
              <hr class="my-0">
              <div class="table-responsive mt-2">
              <div class="table table-bordered">
                <table class="table table-sm" id="tabel1" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Kecamatan</th>
                      <th>Jenis Kelamin</th>
                      <th>Kategori</th>
                      <th>Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                   <?php 
                      $no=1;
                      foreach ($v_tampil as $key => $data) { ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?=$data->nama; ?></td>
                      <td><?=$data->alamat ?></td>
                      <td><?=$data->nama_wilayah ?></td>
                      <td><?=$data->jk?></td>
                      <td><?=$data->ketegori?></td>
                      <td width="12%"><?=$data->tanggal?></td>
                      <td width="13%">
                        
                        <a  href="<?= base_url('data_stunting/edit/').$data->id?>" class="btn btn-info">
                          <i class="fas fa-edit"></i>
                          </a>
                          <a href="<?= base_url('data_stunting/hapus/').$data->id?>" class="btn btn-danger" onclick="return confirm('Hapus Data')">
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
    <form method="post" action="<?= base_url('data_stunting/exel')?>" enctype="multipart/form-data">
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


<!-- Modal pdf -->
<div class="modal fade" id="pdf" tabindex="-1" role="dialog" aria-labelledby="pdf" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pdf">Form Cetak PDF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form target="_BLANK" method="get" action="<?= base_url('data_stunting/pdf')?>" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
          <div class="col-4">
            <select class="form-control" name="tahun" id="tahun" required>
            <option>Pilih Tahun</option>
            <?php foreach ($tahun->result() as $key) { ?>
              <option value="<?=$key->tahun?>"><?=$key->tahun?></option>    
            <?php } ?>
                
            </select>
          </div>

          <div class="col">
            <select class="form-control" name="kec" id="kec" required>
              <option>Pilih Kecamatan</option>
              <?php foreach ($kec->result() as $value) { ?>
                <option value="<?=$value->kode_wilayah?>"><?=$value->nama_wilayah?></option>
              <?php } ?>

            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Export PDF</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal lihat data -->
<div class="modal fade" id="lihat" tabindex="-1" role="dialog" aria-labelledby="lihat" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lihat">Form Lihat Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="<?= base_url('data_stunting/') ?>" method="post">
        <div class="row">
          <div class="col-4">
            <select class="form-control" name="tahun" id="tahun" required>
            <option>Pilih Tahun</option>
            <?php foreach ($tahun->result() as $key) { ?>
              <option value="<?=$key->tahun?>"><?=$key->tahun?></option>    
            <?php } ?>
                
            </select>
          </div>

          <div class="col">
            <select class="form-control" name="kec" id="kec" required>
              <option>Pilih Kecamatan</option>
              <?php foreach ($kec->result() as $value) { ?>
                <option value="<?=$value->kode_wilayah?>"><?=$value->nama_wilayah?></option>
              <?php } ?>

            </select>
          </div>
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tampilkan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
    </form>
  </div>
</div>