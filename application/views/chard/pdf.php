<title><?=$judul?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="<?= base_url('assets/');?>vendor/chart.js/Chart.min.js"></script>
  <script src="<?= base_url('assets/');?>/js/jspdf.min.js"></script>
  <script src="<?= base_url('assets/');?>/js/html2canvas.min.js"></script>  

 
     <!-- DataTales Example -->
    <div class="container">
          <div class="card shadow mb-4">
            <a href="#" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">CETAK GRAFIK</h6></a>
              <button onclick="saveAsPDF();" class="btn btn-outline-info mb-2"><i class="fas fa-print"></i> Download PDF </button>
            <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
           
              <!-- Bar Chart -->
                  <div style="width: 67%; height: 70%; margin: 0 auto;" id="chart-container">
                  	<div>
			                <table " width="100%" cellspacing="0">
			                    <tr>
			                      <th width="10%"> <img style="width: 60px; height: 70px; margin: 0 auto;" src="<?= base_url('assets/templet/images/3507.png')?>"></th>
			                      <th style="text-align: center;">
			                      	<span style="line-height: 1.6; font-weight: bold;">PEMERINTAH KABUPATEN MALANG <br>DINAS KESEHATAN <br>Jalan Panji No. 120 Kepanjen Tlp(0341)393730 Fax.(0341)393731<br><ins>KEPANJEN</ins></span></th>
			                      <th width="10%"></th>
			                    </tr>
			                </table>
			              </div>
			              <hr class="sidebar-divider" style="border: 1px solid black;">
			              <div class="mt-4">
			              	<div class="mt-2" style="line-height: 1.6;">
								Tanggal Cetak PDF : <?= date("d F, o"); ?> <br>
							</div>
							<div class="mt-2" align="center" style="line-height: 1.6;">
								Data Grafik Penyebaran Stunting Per-Kecamatan<br>
								Tahun <?=$tahun1?> dan Tahun <?=$tahun2?>. 
							</div>
			              	<div class="mt-4">
                   			 <canvas id="myChart"></canvas>
                   			 </div>
                      <div class="mt-4">
                        <div align="center">
                          Tahun <?=$tahun1?>
                        </div>
                         <canvas id="Chart_k"></canvas>
                         </div>
                  		</div>
              <!-- End Bard  -->

            </div>
          </div>
          </div>

        </div>
        <!-- /.container-fluid -->


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>