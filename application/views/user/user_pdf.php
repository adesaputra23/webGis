<!DOCTYPE html>
<html>
<head>
	<title>Laporan PDF</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="<?= base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
 <script src="<?= base_url('assets/');?>vendor/chart.js/Chart.min.js"></script>
 <script src="<?= base_url('assets/');?>/js/jspdf.min.js"></script>
  <script src="<?= base_url('assets/');?>/js/html2canvas.min.js"></script>  
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
<br>
<div class="mt-2" align="center" style="line-height: 1.6;">
	Data Pengguna Aplikasi SIG Pemetaan Penyebaran Stunting<br>
	Dinas Kesehatan Kabupaten Malang<br><br>
</div>
<div class="mt-2" style="line-height: 1.6;">
	Tanggal Cetak PDF : <?= date("d F, o"); ?> <br>
</div>
<div class="table-responsive mt-2">
  <table style=" border-collapse: collapse; width: 100%;" class="table_i" border="1" width="100%">
                <thead>
                 <tr>
                      <th>No</th>
                      <th>User</th>
                      <th>Nip</th>
                      <th width="12%">Nama</th>
                      <th>Puskesmas</th>
                      <th>Alamat</th>
                      <th>No Tlp</th>
                      <th>Foto</th>
                    </tr>
              </thead>
               <tbody>
                    <?php 
                    $no=1;
                      foreach ($row->result() as $key => $data) {
                    ?>

                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $data->username?></td>
                      <td><?= $data->nip ?></td>
                      <td><?= $data->nama ?></td>
                      <td><?= $data->puskesmas ?></td>
                      <td><?= $data->alamat ?></td>
                      <td><?= $data->no_hp ?></td>
                      <td align="center"><img style="width: 40px; height: 40px;" src="assets/img/<?=$data->gambar?>">

                      </td>
                    </tr>
                     <?php 
                      }
                     ?>
                  </tbody>
            </table>
</body>
</html>
