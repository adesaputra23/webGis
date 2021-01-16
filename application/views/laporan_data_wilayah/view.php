<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h5 mb-0 text-gray-800">Laporan</h1>
    </div>

     <!-- DataTales Example -->
          <div class="card shadow mb-4">
             <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Laporan Data Kecamatan</h6></a>
              <div class="collapse show" id="collapseCardExample">

               
            <div class="card-body">
            
             <!--   <a href="laporan_wilayah/wilayah_pdf" target="_BLANK" class="btn btn-outline-info mb-2"><i class="fas fa-print"></i>  
                    <span class="text">PDF</span> 
                  </a>  -->
                <?php echo $this->session->flashdata('message'); ?>
                <button class="btn btn-outline-info mb-2" data-toggle="modal" data-target="#pdf"><i class="fas fa-print"></i>  
                    <span class="text">PDF</span> 
                  </button> 

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
                      <td><?= $no++  ?></td>
                      <td><?= $data->kode_wilayah  ?></td>
                      <td><?= $data->nama_wilayah  ?></td>
                      <td><a href="<?=base_url('assets/filegs/'.$data->geojson)?>" target="_BLANK"><?= $data->geojson?></a></td>
                      <td>
                        <table>
                          <td width="20%" height="10%" style="background: <?= $data->warna?>"> </td>
                        </table>
                      </td>
                      <td>
                          <a target="_BLANK" href="<?= base_url('laporan_wilayah/prwilayah_pdf/').$data->kode_wilayah?>" class="btn btn-info"><i class="fas fa-print"></i> PDF
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
      
    <form target="_BLANK" method="get" action="<?= base_url('laporan_wilayah/wilayah_pdf/')?>" enctype="multipart/form-data">
     
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
    <button  type="submit" class="btn btn-info"><i class="fa fa-save"></i> Export PDF</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>