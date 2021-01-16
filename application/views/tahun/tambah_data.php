<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h5 mb-0 text-gray-800">Tambah Data Tahun</h1>
</div>

	<div class="card mb-4">
        <div class="card-header">
             Form Tambah Data
              <a style="float: right;" href="<?= base_url('data_wilayah/wilayah')?>" class="btn btn-secondary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-long-arrow-alt-left"></i>
                    </span>
                    <span class="text">Kembali</span>
                  </a>
        </div>
        <div class="card-body">
             
        	 <form class="user" method="post" action="">
                   
                   			<input type="text" class="form-control" id="id_wilayah" name="id_wilayah" hidden="">
                    		<div class="form-group">
                    			<div class="col-md-4">
							    <input type="text" value="<?=set_value('kode') ?>" class="form-control" id="kode" name="kode" placeholder="Kode Kecamatan">
							    <?= form_error('kode')?>
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