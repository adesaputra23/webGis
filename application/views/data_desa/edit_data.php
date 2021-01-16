<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h5 mb-0 text-gray-800">Ubah Desa</h1>
</div>

	<div class="card mb-4">
        <div class="card-header">
             Form Ubah Data
              <a style="float: right;" href="<?= base_url('data_desa/lihat')?>" class="btn btn-secondary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-long-arrow-alt-left"></i>
                    </span>
                    <span class="text">Kembali</span>
                  </a>
        </div>
        <div class="card-body">
             
        	 <form class="user" enctype="multipart/form-data" method="post" action="">
                   
                   			<input type="text" class="form-control" id="id_desa" name="id_desa" hidden="" value="<?=$lihat->id_desa?>">
                    		<div class="form-group">
                    			<div class="col-md-4">
							    <input value="<?=$lihat->kode_desa?>" type="text" class="form-control <?=form_error('kode') ? 'is-invalid' : null?>" id="kode" name="kode" placeholder="Kode desa">
							    <?= form_error('kode')?>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-4">
								   <select class="form-control <?=form_error('kecamatan') ? 'is-invalid' : null?>" id="kecamatan" name="kecamatan">
								   	<option>Pilih Kecamatan</option>
								   	<?php foreach ($kec as $key => $value) { ?>
								   		<option value="<?=$value->kode_wilayah?>" <?= $lihat->kode_wilayah == $value->kode_wilayah ? "selected" : null ?> ><?=$value->nama_wilayah?></option>
								   <?php	}  ?>
								    </select>
								    <?= form_error('kecamatan')?>
								</div>
							 	  </div>
							  <div class="form-group">
							  	<div class="col-md-6">
							    <input type="text" value="<?=$lihat->nama_desa ?>" class="form-control <?=form_error('desa') ? 'is-invalid' : null?>" id="desa" name="desa" placeholder="Nama desa">
							    <?= form_error('desa')?>
							    </div>
							 </div>
							 <div class="form-group">
							 	<div class="col-md-6">
								 	<div class="row">
	                    			<div class="col-6">
								    <input value="<?=$lihat->lat ?>" type="text" class="form-control" id="lat" name="lat" placeholder="Lat">
								    <?= form_error('lat')?>
									</div>
									 
									<div class="col-6">
								    <input type="text" value="<?=$lihat->lng ?>" class="form-control" id="lng" name="lng" placeholder="Lng">
								    
									 <?= form_error('lng')?>
									</div>
									</div>
								</div>
							</div>
							 <div class="form-group">
							 	  <div class="col-md-4">
							 	  	<input hidden="" type="text" class="form-control" id="name_g" name="name_g" value="<?=$lihat->de_geojson?>">
								  <input type="file" class="form-control-file" id="geojson" name="geojson">
								  <small class="text-danger">Biarkan kosong jika tidak ingin di ubah</small>
								  </div>
							 </div>
							  <div class="form-group">
							  	<div class="col-md-3">
							    <input type="color" value="<?=$lihat->warna ?>" class="form-control" name="warna">
							    </div>
							 </div>
							 <div class="col-md-3">
							  <button class="btn btn-primary text-white mb-2">
			                    <span class="text">
			                    <i class="far fa-save"></i>
			                    Simpan</span>
			                  </button>

			                  <button type="reset" class="btn btn-danger text-white mb-2">
			                    <span class="text">
			                    <i class="far fa-window-close"></i>
			                    Resest</span>
			                  </a>
			                 </button>
            	</form>

        </div>
   </div>
</div>

</div>

</div>