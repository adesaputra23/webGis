 <div style="background-color: #660066; width: 100%; height: 80px;  position: relative; top: 0px; z-index: 0;"></div>


<?php 
      $SUM=0;
          foreach ($k_desa->result() as $key => $value) {
            $SUM++;
          }

      $SUM_S=0;
          foreach ($s_desa->result() as $key => $value) {
            $SUM_S++;
          }

      $total = $SUM + $SUM_S;
       ?>

  <!-- ***** Features Item Start ***** -->
  <div class="header-text" id="top">
  
    <div class="container-fluid" >
        <div>
          <button data-toggle="modal" data-target="#exampleModal" style="position: absolute; top: 170px; left: 25px; z-index: 1; background: white; border-radius: 4px; border-color: #C2BFBA;">
                        <i class="fas fa-map"></i>
          </button>
          <button data-toggle="modal" data-target="#exampleModal_desa" style="position: absolute; top: 205px; left: 25px; z-index: 1; background: white; border-radius: 4px; border-color: #C2BFBA;">
                        <i class="fas fa-map-marked-alt"></i>
          </button>

          <div class="card shadow mb-4 card-sm" style="width: 20%; position: absolute; top: 105px; right: 30px; z-index: 1;">
                <!-- Card Header - Accordion -->
                <a href="#kategori" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="kategori">
                  <h6 class="m-0 font-weight-bold text-dark ">KEC. <?=$v_wilayah->nama_wilayah?> <br>DESA <?=$m_desa?></h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="kategori" style="">
                  <div class="card-body">
                      <table class="table table-bordered table-sm">
                          <thead>
                            <tr align="center" class="table-primary">
                              <th scope="col">Kategori</th>
                              <th scope="col">Jumlah</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Pendek</td>
                              <td align="center"><?=$SUM?></td>
                            </tr>
                            <tr>
                              <td>Sangat Pendek</td>
                              <td align="center"><?=$SUM_S?></td>
                            </tr>
                          </tbody>
                          <thead>
                            <tr align="center" class="table-primary">
                              <th scope="col">Total</th>
                              <th scope="col" align="center"><?=$total?></th>
                            </tr>
                          </thead>
                        </table>
                  </div>
                </div>
      </div>

           <div id="mapDesa"  style="width: 100%; height: 560px;  position: relative; top: 10px; z-index: 0;">
           </div>
      </div>
    </div>

  </div>
    <!-- ***** Features Item End ***** -->


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
    <form action="<?= base_url("daskboard/wilayah")?>" method="post">
      <div class="modal-body">
        <div class="row">
            <div class="col-4">
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
                             <?php $kec = $this->Wilayah_model->get();
                              foreach ($kec->result() as $key => $value) { ?>
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

  <!-- Modal Desa-->
<div class="modal fade" id="exampleModal_desa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel_desa" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel_desa">Desa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="<?= base_url("daskboard/desa/").$v_wilayah->kode_wilayah?>" method="post">
      <div class="modal-body">
        <div class="row">
          <div class="col">
              <div>
              <input hidden="" type="text" name="tahun" id="tahun" value="<?=$tahun?>">
            </div>
            <div class="form-group">
                  <label>Pilih Desa</label>
                  <select class="form-control" id="desa" name="desa">
                             <option disabled selected>Pilih Desa</option>
                             <?php
                              foreach ($desa->result() as $key => $value) { ?>
                                    <option value="<?= $value->nama_desa ?>"><?= $value->nama_desa ?></option>;
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