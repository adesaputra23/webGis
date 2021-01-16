   <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo"><i class=" fas fa-globe "></i> Web<em class="text-primary"> SIG</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class=""><a href="<?=base_url('daskboard')?>">Home</a></li>
                            <li class=""> <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Peta</a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php 
                                    $this->db->select('*');
                                    $this->db->where("status", 1);
                                   $db = $this->db->get("tb_tahun");

                                    foreach ($db->result() as $key => $value) { ?>
                                   
                                            <a class="dropdown-item" href="<?=base_url('daskboard/standar')?>?tahun=<?=$value->tahun?>">Penyebaran</a>
                                <?php   }

                                   ?>
                                  <a class="dropdown-item" href="<?=base_url('daskboard/lokasi')?>">Lokasi</a>
                                </div>
                            </li>
                            <li class=""><a href="<?=base_url('daskboard/rute')?>">Rute</a></li>
                            <li class=""><a href="<?=base_url('daskboard/grafik')?>">Grafik</a></li>
                            <li class=""><a href="<?=base_url('daskboard/')?>#trainers">Galery</a></li>
                            <li class=""><a href="<?=base_url('daskboard/')?>#contact-us">Kontak</a></li> 
                            <li class="main-button"><a href="<?= base_url('auth')?>/login">Login</a></li>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

   