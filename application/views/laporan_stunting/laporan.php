<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h5 mb-0 text-gray-800">Laporan</h1>
    </div>

     <!-- DataTales Example -->
          <div class="card shadow mb-4">
             <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Laporan Data Stunting</h6></a>
              <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
              <div class="table-responsive">
                <div class="table table-bordered">
                <table class="table table-sm" id="tabel1" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th width="10%">No</th>
                      <th>Kode Kecamatan</th>
                      <th width="40%">Kecamatan</th>
                      <th width="20%">Aksi</th>
                    </tr>
                  </thead>
          
                  <tbody>
                     <?php 
                     $no=1;
                      foreach ($row->result() as $key => $data) {
                    ?>
                    <tr>
                      <td><?= $no++  ?></td>
                      <td><?= $data->kode_wilayah  ?></td>
                      <td><?= $data->nama_wilayah  ?></td>
                      <td align="center">
                          <a  href="<?= base_url('Laporan_stunting/data/').$data->kode_wilayah?>" class="btn btn-outline-warning"><i class="fas fa-eye"></i> Lihat
                      </td>
                    </tr>
              <?php 
                      }
                     ?>
                  </tbody>
                </table>
              </div>
              </div>
            </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
