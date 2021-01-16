<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h5 mb-0 text-gray-800">Edit Data Wilayah</h1>
</div>

	<div class="card mb-4">
        <div class="card-header">
              Form Edit Data
             <a style="float: right;" href="<?= base_url('data_wilayah/wilayah')?>" class="btn btn-secondary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-long-arrow-alt-left"></i>
                    </span>
                    <span class="text">Kembali</span>
                  </a>
        </div>
        <div class="card-body">
             
        	 <form class="user" enctype="multipart/form-data" method="post" action="">
                   
                   			<input value="<?= $data->id_wilayah ?>" type="text" class="form-control" id="id_wilayah" name="id_wilayah" hidden="">
                    		<div class="form-group">
                    			<div class="col-md-4">
							    <input type="text" readonly="" class="form-control" id="kode" name="kode" value="<?= $data->kode_wilayah ?>">	
								</div>
							</div>
							  <div class="form-group">
							  	<div class="col-md-6">
							    <input type="text" class="form-control <?=form_error('nama_kecamatan') ? 'is-invalid' : null?>" id="nama_kecamatan" name="nama_kecamatan" value="<?= $data->nama_wilayah ?>">
							    <?= form_error('nama_kecamatan')?>
							    </div>
							 </div>

							 <div class="form-group">
							 	<div class="col-md-6">
								 	<div class="row">
	                    			<div class="col-6">
								    <input value="<?= $data->lat ?>" type="text" class="form-control" id="lat" name="lat" placeholder="Lat">
									</div>
									<div class="col-6">
								    <input type="text" value="<?= $data->lng ?>" class="form-control" id="lng" name="lng" placeholder="Lng">
									</div>
									</div>
								</div>
							</div>

							 <input type="text" hidden="" class="form-control" id="gs" name="gs" value="<?= $data->geojson ?>">

							 <div class="form-group">
							 	  <div class="col-md-4">
								  <input value="$data->geojson" type="file" class="form-control-file" id="geojson" name="geojson" >
								  <small class="text-success">Biarkan kosong jika tidak ingin diubah</small>
								  </div>

							 </div>
							  <div class="form-group">
							  	<div class="col-md-3">
							    <input type="color" class="form-control" id="warna" name="warna" value="<?= $data->warna ?>" >
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
			                    Reset</span>
			                  </button>
			                 </div>
            	</form>

        </div>
   </div>

</div>

</div>