<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h5 mb-0 text-gray-800">Tambah Data Stunting</h1>
</div>

	<div class="card mb-4">
        <div class="card-header">
             Form Tambah Data
               <a href="<?=base_url('')?>" style="float: right;"  class="btn btn-secondary btn-icon-split btn-sm">
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
        	 						<input type="text" class="form-control" id="id" name="id" hidden="" >
	                    		<div class="form-group">
	                    			<div>
								    <input value="<?=set_value('nama') ?>" type="text" class="form-control <?=form_error('nama') ? 'is-invalid' : null?>" id="nama" name="nama" placeholder="Nama">
								     <?= form_error('nama')?>
									</div>
								</div>
								  <div>
								  	<div>
								    <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"><?=set_value('alamat') ?></textarea>
								    </div>
								 </div>
								  <div class="form-group">
	                    			<div>
								    <input type="text" class="form-control <?=form_error('kecamatan') ? 'is-invalid' : null?>" id="kecamatan" name="kecamatan" value="<?= $data->kecamatan ?>">
								    <?= form_error('kecamatan')?>
									</div>
								</div>
								 <div class="form-group">
								 	<div class="row">
	                    			<div class="col-6">
								    <input value="<?=set_value('lat') ?>" type="text" class="form-control" id="lat" name="lat" placeholder="Lat">
									</div>
									<div class="col-6">
								    <input type="text" value="<?=set_value('lng') ?>" class="form-control" id="lng" name="lng" placeholder="Lng">
									</div>
									</div>
								</div>
								<div class="form-group">
	                    			<div>
								    <input type="date" value="<?=set_value('tanggal') ?>" class="form-control <?=form_error('tanggal') ? 'is-invalid' : null?>" id="tanggal" name="tanggal">
								    <?= form_error('tanggal')?>
									</div>
								</div>
        	 				</div>

        	 				<div class="col-6">
        	 					<div class="form-group">
								   <select class="form-control <?=form_error('jk') ? 'is-invalid' : null?>" id="jk" name="jk">
								      <option disabled selected>Pilih Jenis Kelamin</option>
								      <option value="Laki-Laki" <?=set_value('jk') == 'Laki-Laki' ? "selected" : null ?>>Laki-Laki</option>
								      <option value="Perempuan" <?=set_value('jk') == 'Perempuan' ? "selected" : null ?>>Perempuan</option>
								    </select>
								    <?= form_error('jk')?>
							 	  </div>
							 	 <div class="form-group">
								 	<div class="row">
	                    			<div class="col-6">
								    <input type="text" value="<?=set_value('umur') ?>" class="form-control <?=form_error('umur') ? 'is-invalid' : null?>" id="umur" name="umur" placeholder="Umur">
								    <?= form_error('umur')?>
									</div>
									<div class="col-6">
								    <input type="text" value="<?=set_value('tb') ?>" class="form-control <?=form_error('tb') ? 'is-invalid' : null?>" id="tb" name="tb" placeholder="TB/U">
								    <?= form_error('tb')?>
									</div>
									</div>
								</div>
								<div class="form-group">
								   <select class="form-control <?=form_error('kategori') ? 'is-invalid' : null?>" id="kategori" name="kategori">
								      <option disabled selected>Pilih Kategori</option>
								      <option value="Pendek" <?=set_value('kategori') == 'Pendek' ? "selected" : null ?>>Pendek</option>
								      <option value="Sangat Pendek" <?=set_value('kategori') == 'Sangat Pendek' ? "selected" : null ?>>Sangat Pendek</option>
								    </select>
								    <?= form_error('kategori')?>
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

				                  <button type="reset" class="btn btn-danger text-white">
				                    <span class="text">
				                    <i class="far fa-window-close"></i>
				                    Reset</span>
				                  </button>
				                 </div>
				     

        	 				</div>
        	 			</div>	
            	</form>

        </div>
   </div>

</div>

</div>