<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h5 mb-0 text-gray-800">Tambah Data User</h1>
</div>

	<div class="card mb-4">
        <div class="card-header">
             Form Tambah Data User
 			<a style="float: right;" href="<?= base_url('user/data_user')?>" class="btn btn-secondary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-long-arrow-alt-left"></i>
                    </span>
                    <span class="text">Kembali</span>
            </a>

        </div>
        <div class="card-body"> 
        	<?php //echo validation_errors(); ?>
        	 <form class="user" enctype="multipart/form-data" method="post" action="">
                    <div class="row">
                    	<div class="col-6">

                    		<div class="form-group">
							    <input type="Email" class="form-control <?=form_error('email') ? 'is-invalid' : null?>" id="email" name="email" value="<?=set_value('email') ?>"
							    placeholder="Email">
							    <?= form_error('email')?>
							 </div>

							  <div class="form-group">
								   <select class="form-control <?=form_error('user') ? 'is-invalid' : null?>" name="user" onchange="changeValue(this.value)">
								      <option disabled selected>Pilih Username</option>
								      	<?php 
										   	$data1 = $this->User_model->getanggota();
										   	$jsArray = "var prdName = new Array();\n";
										   	foreach ($data1->result() as $key => $value) {
										   		if ($value->level != 1 ) {
										   			echo '<option value="' . $value->user. '">' . $value->user . '</option>';
										   		 $jsArray .= "prdName['" .  $value->user . "'] = {name:'" . addslashes( $value->user) . "',desc:'".addslashes( $value->level)."'};\n";
										   		}
										   		
										  
										} ?>
								    </select>
								    <?= form_error('user')?>
							 	  </div>

							 	  <input type="text" name="level" id="level" hidden="">

							 <div class="form-group">
							    <input type="password" class="form-control <?=form_error('pasword') ? 'is-invalid' : null?>" id="pasword" name="pasword"
							    placeholder="Pasword">
							    	<?= form_error('pasword')?>
							 </div>

							 <div class="form-group">
							    <input type="password" class="form-control <?=form_error('pasword2') ? 'is-invalid' : null?>" id="pasword2" name="pasword2"
							    placeholder="Konfirmasi pasword">
							    	<?= form_error('pasword2')?>
							 </div>

							  <div class="form-group">
							    <input type="text" class="form-control <?=form_error('nama') ? 'is-invalid' : null?>" id="nama" name="nama" value="<?=set_value('nama') ?>"
							    placeholder="Nama">
							    <?= form_error('nama')?>
							 </div>

							  <div class="form-group">
								    <input type="text" class="form-control <?=form_error('puskesmas') ? 'is-invalid' : null?>" id="puskesmas" name="puskesmas" value="<?=set_value('puskesmas') ?>"
								    placeholder="Puskesmas">
								    <small class="text-success">Biarkan kosong jika tidak ingin tambahkan</small>
								 </div>
                    	</div>

                    	<div class="col-6">

								 <div class="form-group">
								   <select class="form-control <?=form_error('kecamatan') ? 'is-invalid' : null?>" id="kecamatan" name="kecamatan">
								      <option disabled selected>Pilih Kecamatan</option>
								        <?php
								      		foreach ($wilayah->result() as $key => $value) {?>
								      		<option  value="<?= $value->kode_wilayah?>" <?=set_value('kecamatan') == $value->kode_wilayah ? "selected" : null ?>><?= $value->nama_wilayah?></option>
								     	 <?php } ?>
								     </select>
								     <small class="text-success">Biarkan kosong jika tidak ingin ditambahkan</small>
							 	  </div>

                    			<div class="form-group">
								    <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat"><?=set_value('alamat') ?></textarea>
								 </div>

                    			 <div class="form-group">
								    <input type="text" class="form-control" id="hp" name="hp" value="<?=set_value('hp') ?>"
								    placeholder="No hp">
								 </div>

							 	<div class="form-group">
							 		<label for="validationTooltip01">Foto</label>
								    <input type="file" class="form-control-file" id="gambar" name="gambar">
								  </div>

							 <button type="submit" class="btn btn-primary text-white mb-2">
			                    <span class="text">
			                    <i class="far fa-save"></i>
			                    Simpan</span>
			                  </button>

			                  <button type="Reset" class="btn btn-danger text-white mb-2">
			                    <span class="text">
			                    <i class="far fa-window-close"></i> Reset</span>
			                  </button>

                    	</div>
                    </div>
                   
            </form>

        </div>
   </div>

</div>

</div>
<script type="text/javascript">
<?php echo $jsArray; ?>
function changeValue(id){
document.getElementById('level').value = prdName[id].desc;
};
</script>