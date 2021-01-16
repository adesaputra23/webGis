
<div class="container-fluid">

    <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
      <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary">Peta Penyebaran</h6></a>
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="collapseCardExample">
      <div class="card-body">
      <form action="<?= base_url("mapstandar")?>" method="get">
      <div>
            <div class="form-row">
                <div class="form-group col-md-2">
                       <select class="form-control" id="tahun" name="tahun">
                       <option disabled selected>Pilih Tahun</option>
                      <?php $row = $this->Stunting_model->gettahun(); 
                      
                        foreach ($row->result() as $key => $value) { ?>
                              <option value="<?= $value->tahun ?>"><?= $value->tahun ?></option>;
                        <?php } ?>
                        </select>
                </div>
                <div class="form-group col-md-4">
                  <input type="submit" class="btn btn-primary mb-2" value="Tampilkan">
                </div>
      </div>
      </form>
      <div align="center" class="container-fluid" id="mapid" style="height: 650px;">
            Tidak ada data ada tahun <?= $tahun ?><br>
            Silahkan pilih tahun untuk melihat data.
              <div><img style="width: 150px; position: relative; top: 20px;" src="<?= base_url('assets/img/error.jpg')?>"></div>
                   </div>
      </div>
      </div>
      </div>
      </div>
      </div>
</div>
<?php include 'js/mapJs.php' ?>
 

  

