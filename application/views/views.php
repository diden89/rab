<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<base href="<?php echo base_url(); ?>" />
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/templates/aid/images/favicon.ico">
		<title><?php echo $title; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">		
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/aid/css/flaticon.css">
        <!-- Vendor CSS Files -->
        <link href="<?php echo base_url('assets/templates/eBusiness'); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <?php
        if (isset($source_top) && is_array($source_top) && count($source_top) > 0)
        {
            echo implode("\n\t", $source_top)."\n";
        }
        ?>
	</head>
	<body>
	 
	<!-- start Content -->
		<?php
		print $body."\n"; 
		?>
	<!-- end Content -->
  </body>
   <!-- ======= Footer ======= -->
  <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>Presensi</strong>. All Rights Reserved
              </p>
            </div>
          </div>
        </div>
      </div>
  </footer><!-- End  Footer -->

<!-- Vendor JS Files -->
<script src="<?php echo base_url('assets/templates/eBusiness'); ?>/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/templates/eBusiness'); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('assets/templates/eBusiness'); ?>/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?php echo base_url('assets/templates/eBusiness'); ?>/assets/vendor/php-email-form/validate.js"></script>
<script src="<?php echo base_url('assets/templates/eBusiness'); ?>/assets/vendor/appear/jquery.appear.js"></script>
<script src="<?php echo base_url('assets/templates/eBusiness'); ?>/assets/vendor/knob/jquery.knob.js"></script>
<script src="<?php echo base_url('assets/templates/eBusiness'); ?>/assets/vendor/parallax/parallax.js"></script>
<script src="<?php echo base_url('assets/templates/eBusiness'); ?>/assets/vendor/wow/wow.min.js"></script>
<script src="<?php echo base_url('assets/templates/eBusiness'); ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url('assets/templates/eBusiness'); ?>/assets/vendor/nivo-slider/js/jquery.nivo.slider.js"></script>
<script src="<?php echo base_url('assets/templates/eBusiness'); ?>/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url('assets/templates/eBusiness'); ?>/assets/vendor/venobox/venobox.min.js"></script>

<!-- Template Main JS File -->
<script src="<?php echo base_url('assets/templates/eBusiness'); ?>/assets/js/main.js"></script>
<!-- <script src="<?php //echo base_url('assets/js/goskul.js'); ?>"></script> -->

    <?php
        if (isset($source_bot) && is_array($source_bot) && count($source_bot) > 0)
        {
            echo implode("\n\t", $source_bot)."\n";
        }
    ?>
<script type="text/javascript">
    var siteUrl = '<?php echo base_url(); ?>';
    var frontUrl = '<?php echo front_url(); ?>';
</script>
<script type="text/javascript">
    $('#loginUser').submit(function(e){
        // $('.ftco-section.box').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
            e.preventDefault(); 
         $.ajax({
             url: siteUrl+'home/do_login',
             type:"post",
             data :new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
             dataType :'json',
             success: function(response){
                if(response.status)
                {
                    $('div.overlay').remove();
                  alert("Input Data Berhasil.");
                  window.location.replace(response.url);
                }
                else
                {
                    $('div.overlay').remove();
                    alert("Input Data Gagal.");
                }

           }
         });
    });
</script>
<script type="text/javascript">
    $('input.number').keyup(function(event) {

    // skip for arrow keys
    if(event.which >= 37 && event.which <= 40) return;

    // format number
    $(this).val(function(index, value) {
      return value
      .replace(/\D/g, "")
      .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
      ;
    });
    });

    $.ajaxSetup({ cache: false });
    
</script>
  </body>
</html>
	