<div style="background-color: #660066; width: 100%; height: 80px;  position: relative; top: 0px; z-index: 0;"></div>


  <!-- ***** Features Item Start ***** -->
 <div class="header-text" id="top">
    <div class="container-fluid" >
        <div>
           <div style="width: 100%; height: 560px;  position: relative; top: 10px; z-index: 0;">
           	       <div style="text-align: center; position: relative; top: 20px"><h5><b>Grafik Tahun <?=$tahun?></b></h5>
           	       </div>
                   <div style="position: absolute; top: 45px; left: 50px; z-index: 1;">
                     <button type="submit" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Pilih Tahun</button>
                   </div>
                   <div class="card-body" style="text-align: center; position: relative; top: 20px;">
                    <canvas id="myChart_h" style="width: 100%; height: 430px; "></canvas>
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
    <form action="<?= base_url("daskboard/grafik")?>" method="post">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8 offset-lg-2">
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