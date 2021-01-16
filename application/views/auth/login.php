<body style="background-image: url(../assets/img/Featured-Image.jpg);">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-6">

        <div class="card o-hidden border-0 shadow-lg my-5" style="opacity: 0.9;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                     <img style="width: 70px; height: 80px;" src="<?= base_url('assets/');?>templet/images/3507.png" alt="waves" >
                    <h2 class="h5 text-gray-900 mb-4 mt-2 "><strong> Dinas Kesehatan Kabupaten Malang</strong></h2>
                  </div>
                  <form class="user" action="<?= base_url('auth/proses_login');?>" method="post">
                    <div class="form-group">
                      <input type="Email" class="form-control form-control-user" name="email" id="email" aria-describedby="email" placeholder="Masukan Email" required="">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukan pasword" required="">
                    </div>
                    
                    <button class="btn btn-primary btn-user btn-block" name="login">
                      Login
                    </button>

                    <a href="<?= base_url('daskboard?tahun=2019');?>" class="btn btn-danger btn-user btn-block">
                      Kembali ke home
                    </a>
                    <hr>
                    <div align="center" style="font-size: 10px; position: relative; top: 30px;">
                      <p>Copyright &copy; Dinas Kesehatan Kab.Malang <?=date('Y')?>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

 
