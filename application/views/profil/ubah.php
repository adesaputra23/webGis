<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h5 mb-0 text-gray-800">Edit Data User</h1>
</div>

	<div class="card mb-4">
        <div class="card-header">
             Form Edit Data
             <a style="float: right;" href="<?= base_url('admin/profil')?>" class="btn btn-secondary btn-icon-split btn-sm">
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
                    		<div class="form-group">
							    <input readonly value="<?= $this->fungsi->user_login()->email ?>" type="text" class="form-control" id="nip" name="nip" >
							    <?= form_error('nip')?>
							 </div>
							   <div class="form-group">
							    <input readonly value="<?= $this->fungsi->user_login()->username ?>" type="text" class="form-control" id="username" name="username" >
							    <?= form_error('username')?>
							 </div>
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
							    <input value="<?= $this->fungsi->user_login()->nama ?>" type="text" class="form-control <?=form_error('nama') ? 'is-invalid' : null?>" id="nama" name="nama"  >
							    <?= form_error('nama')?>
							 </div>
                    	</div>
                    	<div class="col-6">

                    		<div class="form-group">
								    <textarea class="form-control" id="alamat" name="alamat" ><?= $this->fungsi->user_login()->alamat ?></textarea>
								 </div>
								  <div class="form-group">
								    <input value="<?= $this->fungsi->user_login()->no_hp ?>" type="text" class="form-control" id="hp" name="hp" >
								 </div>
							 	<div class="form-group">
							 		<label for="validationTooltip01">Foto</label>
								    <input type="file" class="form-control-file" id="gambar" name="gambar" value="<?= $this->fungsi->user_login()->gambar ?>">
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