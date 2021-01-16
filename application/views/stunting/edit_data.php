<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h5 mb-0 text-gray-800">Edit Data Stunting</h1>
</div>

	<div class="card mb-4">
       <div class="card-header">
             Form Edit Data
             <a style="float: right;" href="<?= base_url('data_stunting')?>" class="btn btn-secondary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-long-arrow-alt-left"></i>
                    </span>
                    <span class="text">Kembali</span>
                  </a>
        </div>
        <div class="card-body">
        	 <form class="user" enctype="multipart/form-data" method="post" action="">
                   
        	 			<div class="row">
        	 				<div class="col-6">
        	 						<input value="<?= $data->id ?>" type="text" class="form-control" id="id" name="id" hidden="" >
	                    		<div class="form-group">
	                    			<div>
								    <input type="text" class="form-control <?=form_error('nama') ? 'is-invalid' : null?>" id="nama" name="nama" placeholder="Nama" value="<?= $data->nama ?>">
								    <?= form_error('nama')?>
									</div>
								</div>
								  <div>
								  	<div>
								    <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"><?= $data->alamat ?></textarea>
								    <small class="text-success">Biarkan kosong jika tidak ingin di ubah</small>
								    </div>
								 </div>
								  <div class="form-group mt-3">
								   <select class="form-control <?=form_error('kecamatan') ? 'is-invalid' : null?>" id="kecamatan" name="kecamatan">
								      <?php
								      		foreach ($row->result() as $key => $value) {?>
								      		<option value="<?=$value->kode_wilayah?>" <?=$data->kode_wilayah == $value->kode_wilayah ? "selected" : null ?> ><?=$value->nama_wilayah ?></option>
								   			<?php } ?>
								    </select>
								     <?= form_error('kecamatan')?>
							 	  </div>
								 <div class="form-group">
								 	<div class="row">
	                    			<div class="col-6">
								    <input type="text" class="form-control" id="lat" name="lat" placeholder="Lat" value="<?= $data->lat?>">
								     <small class="text-success">Biarkan kosong jika tidak ingin di ubah</small>
									</div>
									<div class="col-6">
								    <input type="text" class="form-control" id="lng" name="lng" placeholder="Lng" value="<?= $data->lng?>">
								     <small class="text-success">Biarkan kosong jika tidak ingin di ubah</small>
									</div>
									</div>
								</div>
								<div class="form-group">
	                    			<div>
								    <input type="date" class="form-control <?=form_error('tanggal') ? 'is-invalid' : null?>" id="tanggal" name="tanggal" value="<?= $data->tanggal?>">
								    <?= form_error('tanggal')?>
									</div>
								</div>
        	 				</div>

        	 				<div class="col-6">
        	 					<div class="form-group">
								   <select class="form-control <?=form_error('jk') ? 'is-invalid' : null?>" id="jk" name="jk">
								   	<?php $jk = $data->jk  ?>
								      <option value="Laki-laki">Laki-laki</option>
								      <option value="Perempuan" <?=$jk == 'Perempuan' ? 'selected' : null ?> >Perempuan</option>
								    </select>
								    <?= form_error('jk')?>
							 	  </div>
							 	 <div class="form-group">
								 	<div class="row">
	                    			<div class="col-6">
								    <input type="text" class="form-control <?=form_error('umur') ? 'is-invalid' : null?>" id="umur" name="umur" placeholder="Umur" value="<?= $data->umur?>">
								    <?= form_error('umur')?>
									</div>
									<div class="col-6">
								    <input type="text" class="form-control <?=form_error('tb') ? 'is-invalid' : null?>" id="tb" name="tb" placeholder="TB/U" value="<?= $data->tb?>">
								    <?= form_error('tb')?>
									</div>
									</div>
								</div>
								<div class="form-group">
								   <select class="form-control <?=form_error('kategori') ? 'is-invalid' : null?>" id="kategori" name="kategori">
								      <?php $kategori = $data->ketegori  ?>
								      <option value="Pendek">Pendek</option>
								      <option value="Sangat Pendek" <?=$kategori == 'Sangat Pendek' ? 'selected' : null ?> >Sangat pendek</option>
								    </select>
								    <?=form_error('kategori') ? 'is-invalid' : null?>
							 	  </div>
								<div class="form-group">
	                    			<div>
								    <input type="text" class="form-control" id="marker" name="marker" hidden="">
									</div>
								</div>

								<div class="mt-4">
								  <button class="btn btn-primary text-white">
				                    <span class="text">
				                    <i class="far fa-save"></i>
				                    Simpan</span>
				                  </button>

				                  <button type="Reset" class="btn btn-danger text-white">
				                    <span class="text">
				                    <i class="far fa-window-close"></i> Reset</span>
				                  </button>
				                 </div>
				     

        	 				</div>
        	 			</div>	
            	</form>

        </div>
   </div>

</div>

</div>