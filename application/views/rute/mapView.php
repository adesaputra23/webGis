
<div class="container-fluid">

    <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
      <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary">Rute Lokasi</h6></a>
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="collapseCardExample">
      <div class="card-body">
            <div class="row">
                         <div class="form-group col-md-2">
                                    <button  class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
                                       <span class="text">
                                         <i class="far fa-eye"></i> Lihat Data
                                       </span>
                                    </button>
                                  </div>
                        <div  class="form-group col-md-2">
                              <input class="form-control" type="text" name="latNow">
                        </div>
                        <div class="form-group col-md-2">
                              <input class="form-control" type="text" name="lngNow" >
                        </div>
                         <div class="form-group col-md-4">
                              <button type="submit" class=" dariSini btn btn-info"><i class="fa fa-map-marker"></i> Mulai dari posisi sekarang</a></button>
                        </div>
      </div>
      <div class="container-fluid" id="rute" style="height: 650px;">
      </div>
      </div>
      </div>
      </div>
      </div>
</div>


 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tampil Tahun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="<?= base_url("rute")?>" method="post">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
                  <label>Pilih Tahun</label>
                  <select class="form-control" id="tahun" name="tahun">
                             <option disabled selected>Pilih Tahun</option>
                            <?php $row = $this->Stunting_model->gettahun(); 
                            
                              foreach ($row->result() as $key => $value) { ?>
                                    <option value="<?= $value->tahun ?>"><?= $value->tahun ?></option>;
                              <?php } ?>
                  </select>
           </div>
          </div>
          
          <div class="col">
            <div class="form-group">
                  <label>Pilih Kecamatan</label>
                  <select class="form-control" id="kec" name="kec">
                             <option disabled selected>Pilih Kecamatan</option>
                             <?php
                              foreach ($kec as $key => $value) { ?>
                                    <option value="<?= $value->kode_wilayah ?>"><?= $value->nama_wilayah ?></option>;
                              <?php } ?>
                  </select>
           </div>
          </div>
          </div>
        </div>
      <div class="modal-footer">
         <button type="submit" class="btn btn-info">Tampilkan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

      </div>
    </form>
    </div>
  </div>



  

