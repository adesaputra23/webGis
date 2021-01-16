<!DOCTYPE html>
<html>
<head>
	<title><?=$judul?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style type="text/css">
	<style type="text/css">
    #outtable{
      padding: 20px;
      border:1px solid #e3e3e3;
      width:600px;
      border-radius: 5px;
    }
 
    .short{
      width: 50px;
    }
 
    .normal{
      width: 150px;
    }
 
    table{
      border-collapse: collapse;
      font-family: arial;
      color:#5E5B5C;
    }

 
    thead th{
      text-align: left;
      padding: 10px;
      background: #EAE9F5;
    }
 
    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 10px;
    }
 
    tbody tr:nth-child(even){
      background: #ffffff;
    }
 
    tbody tr:hover{
      background: #ffffff;
    }
  </style>
	
</style>
<body>

<div class="table-responsive mt-2">
              <div class="table">
                <table class="table table-sm" id="tabel1" width="100%" cellspacing="0">
                    <tr>
                      <th width="10%"> <img style="width: 60px; height: 70px;" src="assets/templet/images/3507.png"></th>
                      <th align="center">
                      	<span style="line-height: 1.6; font-weight: bold;">PEMERINTAH KABUPATEN MALANG <br>DINAS KESEHATAN <br>Jalan Panji No. 120 Kepanjen Tlp(0341)393730 Fax.(0341)393731<br><ins>KEPANJEN</ins></span></th>
                      <th width="10%"></th>
                      
                    </tr>
                 
                </table>
              </div>
      <hr class="sidebar-divider my-0">
<br>
<?php  
$data = $this->Wilayah_model->get_kode($kode);
?>
<div class="mt-2" style="line-height: 1.6;">
	Tanggal Cetak PDF : <?= date("d F, o"); ?> <br>
  Kode Wilayah : <?= $data->kode_wilayah ?><br>
  Kecamatan : <?= $data->nama_wilayah?><br><br>
</div>
<div class="mt-2" align="center" style="line-height: 1.6;">
	DATA PENDERITA STUNTING KEC. <?=strtoupper($data->nama_wilayah);?><br>
</div>



<div class="table-responsive mt-2">
  <table style=" border-collapse: collapse; width: 100%;" class="table_i" border="1" width="100%">
                <thead>
                <tr>
                  <th align="center">Tahun</th>
                  <th width="20%" align="center">Jumlah Penderita</th>
                </tr>
              </thead>
                <tbody>
            <?php  
              foreach ($jumlah as $key => $value) { ?>
                  <tr>
                    <td><?= $value->tahun;?></td>
                    <td align="center"><b><?= $value->total;?> Balita</b></td>
                  </tr>
            <?php } ?>
                </tbody>
					
            </table>
</body>
</html>