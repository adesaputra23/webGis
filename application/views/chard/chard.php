<div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h5 mb-0 text-gray-800">Gafik</h1>
    </div>
     <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Grafik Tahun</h6></a>
            <div class="collapse show" id="collapseCardExample">
            <div class="card-body">

              <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
                  Pilih Tahun
                </button>
                <!-- <button onclick="saveAsPDF();" class="btn btn-outline-info mb-2"><i class="fas fa-print"></i> PDF </button> -->
             
               <a target="BLANK" href="<?= base_url('chard/pdf/?tahun1=').$tahun1?>&tahun2=<?=$tahun2?>" class="btn btn-outline-info mb-2">
                  <i class="fas fa-print"></i>  
                  <span class="text">PDF</span> 
                  </a>

                  <div align="center"><h4> Laporan Grafik Perbandingan Tahun</h4></div>
                  <?php if ($tahun1 == null) { ?>
                    <div align="center"><h4>Tidak Ada Tahun Yang DiPilih</h4></div>
                <?php  } else{ ?>
                    <div align="center"><h4>Tahun <?=$tahun1?> dan Tahun <?=$tahun2?></h4></div>
               <?php } ?>
                
            
              <!-- Bar Chart -->
                  <div  id="chart-container">
                    <canvas id="myChart"></canvas>
                  </div>
              <!-- End Bard  -->

              <?php if ($tahun1 == null) { ?>
                 <p>Data tahun belum dipilih</p>   
            <?php  } else { ?>
                <p>Hasil Laporan perbandingan tahun <?=$tahun1?> dengan <?=$tahun2?> didapatkan populasi penderita stunting yang mengalami kenaikan pada tahun <?=$tahun1?> diantaranya Kecamatan :
                  <?php foreach ($chard1 as $dev1 ) {
                    $dev1->nama_wilayah;
                  

                  foreach ($chard2 as $dev2 ) {
                    $dev2->nama_wilayah;
                  } 

                  if ($dev1->total >= $dev2->total ) { 
                     $dev1->nama_wilayah;
                     if ($dev1->total >= 600) {
                      echo "<b>";
                       echo ucfirst($dev1->nama_wilayah);
                       echo " = ";
                        echo $dev1->total;
                        echo " Balita, ";
                       echo "</b>";
                     }
                    }
                  
                   }
                
                  } ?> </p>
            </div>
            

          </div>
          </div>

          <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
               <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Grafik Kategori</h6></a>
            <div class="collapse show" id="collapseCardExample2">
                <!-- Card Body -->
                <div class="card-body">
                  <div align="center"><h4>Laporan Grafik Menampilkan Kategori Pendek dan Sangat Pendek</h4></div>
                  <?php if ($tahun1 == null) { ?>
                    <div align="center"><h4>Tidak Ada Tahun Yang DiPilih</h4></div>
                 <?php }else{ ?>
                  <div class="font-weight-bold text-bg-gray-900" align="center"><b><h4>Tahun <?=$tahun1?></h4></b></div>
                <?php } ?>
                  
                    <!-- Bar Chart -->
                  <div  id="chart-container">
                    <canvas id="Chart_k"></canvas>
                  </div>
              <!-- End Bard  -->

                  <?php if ($tahun1 == null) { ?>
                    <p>Tidak Ada Tahun Yang dipilih</p>
                  <?php } else { ?>
                   <p>Hasil Laporan Grafik pada tahun <?=$tahun1?> menampilkan Kategori Pendek dan Sangat Pendek. </p>
                  <p><b>Kategori Pendek</b> yang memiliki jumlah penderita lebih dari 500 Balita ada di Kecamatan:<br>  
                     <b>
                      <?php  foreach ($pendek as $data) {
                            if ($data->total >= 500) {
                              echo $data->nama_wilayah;
                              echo " = ";
                              echo $data->total;
                              echo " Balita, ";
                            }
                          }  ?>
                  </b></p>

                   <p><b>Kategori Sangat Pendek</b> jumlah penderita lebih dari 200 Balita ada di Kecamatan:<br>  
                     <b>
                      <?php  foreach ($s_pendek as $data1) {
                            if ($data1->total >= 200) {
                              echo $data1->nama_wilayah;
                              echo " = ";
                              echo $data1->total;
                              echo " Balita, ";
                            }
                          }  ?>
                  </b></p>
                  <?php } ?>
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
        <h5 class="modal-title" id="exampleModalLabel">Data Tahun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url("chard")?>" method="get">  
      <div class="form-row">
      <div class="col">
       <select class="form-control" id="tahun1" name="tahun1">
       <option disabled selected>Pilih Tahun 1</option>
                      <?php $row = $this->Stunting_model->gettahun(); 
                        foreach ($row->result() as $key => $value) { ?>
                              <option value="<?= $value->tahun ?>"><?= $value->tahun ?></option>;
                        <?php } ?>
      </select>
    </div>
    <div class="col">
      <select class="form-control" id="tahun2" name="tahun2">
       <option disabled selected>Pilih Tahun 2</option>
                      <?php $row = $this->Stunting_model->gettahun(); 
                        foreach ($row->result() as $key => $value) { ?>
                              <option value="<?= $value->tahun ?>"><?= $value->tahun ?></option>;
                        <?php } ?>
      </select>
    </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tampilkan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
      </form>
    </div>
  </div>
</div>