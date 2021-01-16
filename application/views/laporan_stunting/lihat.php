<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h5 mb-0 text-gray-800">Laporan</h1>
    </div>

     <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header">Lihat Data Stunting
              <div  style="float: right;">
                      <a href="<?= base_url('laporan_stunting/laporan')?>" class="btn btn-secondary btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                          <i class="fas fa-long-arrow-alt-left"></i>
                        </span>
                        <span class="text">Kembali</span>
                      </a>
                      <button data-toggle="modal" data-target="#pdf" class="btn btn-primary btn-icon-split btn-sm">
                        <span class="text">
                        <i class="fas fa-print"></i> PDF</span>
                      </button>
                  </div>
            </div>

            <div class="card-body">
                <h6 class="font-weight-bold"><?= $pos->kode_wilayah  ?></h6>
                <h6 class=" font-weight">Kecamatan : <?= $pos->nama_wilayah  ?></h6>
                 <hr class="my-0">
                 <div class="table-responsive">
                 <div class="table table-bordered mt-2">
               <table class="table table-sm" id="tabel1" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Jenis Kelamin</th>
                      <th>Umur</th>
                      <th>TB/U</th>
                      <th>Kategori</th>
                      <th>Tanggal</th>
                    </tr>
                  </thead>
          
                  <tbody>

          <?php 
          $no=1;
         foreach ($detail->result() as $key => $data) { ?>         
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $data->nama ?></td>
                      <td><?= $data->alamat ?></td>
                      <td><?= $data->jk ?></td>
                      <td><?= $data->umur ?></td>
                      <td><?= $data->tb ?></td>
                      <td><?= $data->ketegori ?></td>
                      <td><?= $data->tanggal ?></td>
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



<!-- Modal -->
<div class="modal fade" id="pdf" tabindex="-1" role="dialog" aria-labelledby="pdf" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pdf">Form Cetak PDF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
    <form target="_BLANK" method="get" action="<?= base_url('laporan_stunting/stunting_pdf/').$pos->kode_wilayah?>/" enctype="multipart/form-data">
     
      <div class="modal-body">
        <div class="form-group">
                             <select class="form-control" id="tahun" name="tahun">
                             <option disabled selected>Pilih Tahun</option>
                            <?php $row = $this->Stunting_model->gettahun(); 
                            
                              foreach ($row->result() as $key => $value) { ?>
                                    <option value="<?= $value->tahun ?>"><?= $value->tahun?></option>;
                              <?php } ?>
                              </select>
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