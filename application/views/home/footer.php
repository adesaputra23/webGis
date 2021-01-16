  
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Dinas Kesehatan Kab.Malang <?=date('Y')?>
                    
                    
                    <!-- You shall support us a little via PayPal to info@templatemo.com -->
                    
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?= base_url('assets/');?>templet/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="<?= base_url('assets/');?>templet/js/popper.js"></script>
    <script src="<?= base_url('assets/');?>templet/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="<?= base_url('assets/');?>templet/js/scrollreveal.min.js"></script>
    <script src="<?= base_url('assets/');?>templet/js/waypoints.min.js"></script>
    <script src="<?= base_url('assets/');?>templet/js/jquery.counterup.min.js"></script>
    <script src="<?= base_url('assets/');?>templet/js/imgfix.min.js"></script> 
    <script src="<?= base_url('assets/');?>templet/js/mixitup.js"></script> 
    <script src="<?= base_url('assets/');?>templet/js/accordions.js"></script>
    <script src="<?= base_url('assets/');?>vendor/chart.js/Chart.min.js"></script>
    
    <!-- Global Init -->
    <script src="<?= base_url('assets/');?>templet/js/custom.js"></script>

    <script type="text/javascript">
         $(document).on("click",".dariSini",function(){
                let latLng=[$("[name=latNow]").val(),$("[name=lngNow]").val()];
                    control.spliceWaypoints(0, 1, latLng);
                    map.panTo(latLng);
              });
    </script>