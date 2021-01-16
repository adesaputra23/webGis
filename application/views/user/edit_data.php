<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h5 mb-0 text-gray-800">Edit Data User</h1>
</div>

	<div class="card mb-4">
        <div class="card-header">
             Form Edit Data
             <a style="float: right;" href="<?= base_url('user/data_user')?>" class="btn btn-secondary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-long-arrow-alt-left"></i>
                    </span>
                    <span class="text">Kembali</span>
                  </a>
        </div>
        <div class="card-body">
             
              <form class="user" enctype="multipart/form-data" method="post" action="">
                    <div class="row">
                    	<div class="form-group">
							    <input hidden="" value="<?= $data->nip ?>" type="text" class="form-control" id="nip" name="nip" >
							    <?= form_error('nip')?>
							 </div>
                    	<div class="col-6">
							 <div class="form-group">
							    <input value="<?= $data->email ?>" type="Email" class="form-control" id="email" name="email" >
							    <?= form_error('email')?>
							 </div>
							   <div class="form-group">
								   <select class="form-control <?=form_error('user') ? 'is-invalid' : null?>" id="user" name="user" onchange="changeValue(this.value)">
								   	<?php $user = $data->username  ?>

								   	<?php 
								   	$data1 = $this->User_model->getanggota();
								   		$jsArray = "var prdName = new Array();\n";
								   	foreach ($data1->result() as $key => $value) { ?>
								   		<option value="<?=$value->user?>" <?=$data->username == $value->user ? "selected" : null ?> ><?=$value->user?></option>
								  <?php 	
										
										$jsArray .= "prdName['" .  $value->user . "'] = {name:'" . addslashes( $value->user) . "',desc:'".addslashes( $value->level)."'};\n";

								} ?>
								  </select>
								    <?= form_error('user')?>
							 	  </div>
							 	  <input hidden="" type="text" name="level" id="level" value="<?=$data->level?>">
							 	  <input hidden="" type="password" name="pas3" id="pas3" value="<?=$data->pasword?>">
							 <div class="form-group">
							    <input value="<?=$this->input->post('pasword');?>" placeholder="Pasword" type="password" class="form-control <?=form_error('pasword') ? 'is-invalid' : null?>" id="pasword" name="pasword">
							    <small class="text-success">Biarkan kosong jika tidak ingin diubah</small>
							    <?= form_error('pasword')?>
							 </div>

							 <div class="form-group">
							    <input value="<?=$this->input->post('pasword2');?>" placeholder="Konfirmasi pasword" type="password" class="form-control <?=form_error('pasword2') ? 'is-invalid' : null?>" id="pasword2" name="pasword2">
							    <small class="text-success">Biarkan kosong jika tidak ingin diubah</small>
							    <?= form_error('pasword2')?>
							 </div>
							  <div class="form-group">
							    <input value="<?= $data->nama ?>" type="text" class="form-control <?=form_error('nama') ? 'is-invalid' : null?>" id="nama" name="nama"  >
							    <?= form_error('nama')?>
							 </div>
							 <div class="form-group">
							    <input hidden="" value="<?= $data->puskesmas ?>" type="text" class="form-control <?=form_error('puskesmas') ? 'is-invalid' : null?>" id="puskesmas" name="puskesmas"  >
							 </div>
			                 
                    	</div>
                    	<div class="col-6">

                    		<!-- <div class="form-group">
								   <select class="form-control <?=form_error('kecamatan') ? 'is-invalid' : null?>" id="kecamatan" name="kecamatan">
								   	<option value=""></option>
								   	<option value="">-</option>
								      <?php
								      		foreach ($wilayah->result() as $key => $value) {?>
								      		<option value="<?=$data->kode_wilayah?>" <?=$data->kode_wilayah == $value->kode_wilayah ? "selected" : null ?> ><?=$value->nama_wilayah ?></option>
								   			<?php } ?>
								    </select>
								     <?= form_error('kecamatan')?>
							 	  </div> -->

                    		<div class="form-group">
								    <textarea class="form-control" id="alamat" name="alamat" ><?= $data->alamat ?></textarea>
								 </div>
								  <div class="form-group">
								    <input value="<?= $data->no_hp ?>" type="text" class="form-control" id="hp" name="hp" >
								 </div>
							 	<div class="form-group">
							 		<label for="validationTooltip01">Foto</label>
								    <input type="file" class="form-control-file" id="gambar" name="gambar" value="<?= $data->gambar ?>">
								    <small class="text-success">Biarkan kosong jika tidak ingin diubah</small>
								  </div>

							 <button class="btn btn-primary text-white mb-2">
			                    <span class="text">
			                    <i class="far fa-save"></i>
			                    Simpan</span>
			                  </button>

			                  <button type="Reset" class="btn btn-danger text-white mb-2">
			                    <span class="text"><i class="far fa-window-close"></i>
			                    Reset</span>
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