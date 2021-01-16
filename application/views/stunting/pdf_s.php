<!DOCTYPE html>
<html>
<head>
	<title><?=$judul?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style type="text/css">
    @page { size: A4 }
  
    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }
  
    table {
        border-collapse: collapse;
        width: 100%;
    }
  
    .table td {
        padding: 3px 3px;
        border:1px solid #000000;
    }
  
    .text-center {
        text-align: center;
    }
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
<div class="mt-2" style="line-height: 1.6;">
	Tanggal Cetak PDF : <?= date("d F, o"); ?> <br>
  Kode Wilayah : <?= $this->fungsi->user_login()->kode_wilayah ?><br>
  Kecamatan : <?= $this->fungsi->user_login()->nama_wilayah ?><br><br>
</div>

<div class="mt-2" align="center" style="line-height: 1.6;">
	DATA PENDERITA STUNTING KEC. <?= strtoupper($this->fungsi->user_login()->nama_wilayah) ?> <br>
  Tahun <?=$tahun?><br>
</div>

<div class="table-responsive mt-2">
              <div>
                <table style=" border-collapse: collapse; width: 100%;" class="table_i" border="1" width="100%">
                  <thead>
                    <tr>
                     <th>No</th>
                      <th>Nama</th>
                      <th width="12%">Alamat</th>
                      <th>Kecamatan</th>
                      <th>Jenis Kelamin</th>
                      <th>Kategori</th>
                      <th>Tanggal</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                   <?php 
                      $no=1;
                      foreach ($row as $key => $data) { ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?=$data->nama ?></td>
                      <td><?=$data->alamat ?></td>
                      <td><?=$data->nama_wilayah ?></td>
                      <td><?=$data->jk ?></td>
                      <td><?=$data->ketegori ?></td>
                      <td><?=$data->tanggal?></td>
                    </tr>
                        <?php } ?>
                  </tbody>
                </table>
              </div>


</body>
</html>