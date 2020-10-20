<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<base href="<?php echo base_url(); ?>" />
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/templates/aid/images/favicon.ico">
		<title><?php echo $title; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
				
		<!-- aid template -->
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/aid/css/open-iconic-bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/aid/css/animate.css">
	    
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/aid/css/owl.carousel.min.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/aid/css/owl.theme.default.min.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/aid/css/magnific-popup.css">

	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/aid/css/aos.css">

	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/aid/css/ionicons.min.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/aid/css/jquery.timepicker.css">

	    
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/aid/css/flaticon.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/aid/css/icomoon.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/aid/css/style.css">
	    <!-- end aid template -->
        <link rel="stylesheet" href="<?php echo base_url('assets/templates/admin'); ?>/bower_components/font-awesome/css/font-awesome.min.css">
        
        <?php
        if (isset($source_top) && is_array($source_top) && count($source_top) > 0)
        {
            echo implode("\n\t", $source_top)."\n";
        }
        ?>
	</head>
	<body>
    
	 <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="#">Go School</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<!-- <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="about.html" class="nav-link">Who we are</a></li>
	        	<li class="nav-item"><a href="causes.html" class="nav-link">Causes</a></li>
	        	<li class="nav-item"><a href="blog.html" class="nav-link">Stories</a></li>
	          	<li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
	          	<?php echo $menu; ?> 
                <!-- <li class="nav-item"><a href='<?php//echo base_url("auth/logout");?>' class="nav-link">Login Member</a></li>
 -->
                <?php if( ! empty($this->session->userdata('username')) AND $this->session->userdata('sub_group') !== '1'){?>
                    <li class="dropdown nav-item">
                        <a class="dropdown-toggle nav-link" href="" id="menuDropdown" data-toggle="dropdown" aria-expanded="false">
                            Hi <?php echo $this->session->userdata('fullname');?> <b class="caret"></b>
                        </a>
                        
                        <ul class="dropdown-menu nav-item">
                            <li class="nav-item">
                               <a href="<?php echo base_url("member/view_profile");?>"class="nav-link" style="cursor: pointer;">View Profile</a></li>
                            <li class="nav-item"><a href='<?php echo base_url("auth/logout");?>' class="nav-link">Logout</a></li>
                        </ul>                    
                    </li> 

                <?php }
                else{ ?>
                <li class="dropdown nav-item">
                    <a class="dropdown-toggle nav-link" href="" id="menuDropdown" data-toggle="dropdown" aria-expanded="false">
                        Login Member<b class="caret"></b>
                    </a>
                    
                    <ul class="dropdown-menu nav-item">
                        <li class="nav-item">
                           <a href="" data-toggle="modal" data-target="#mymodallogin" class="nav-link" style="cursor: pointer;">Login</a></li>
                        <li class="nav-item"><a href='<?php echo base_url("daftar/new_member");?>' class="nav-link">Daftar</a></li>
                    </ul>                    
                </li> 
                <?php } ?>
	        </ul>


	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
	<!-- start Content -->
		<?php
		print $body."\n"; 
		?>
	<!-- end Content -->
	<footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Go School</h2>
              <p>Jangan biarkan mereka putus sekolah, mari kita bersama membantu mereka untuk mencapai cita-citanya</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Donasi</a></li>
                <li><a href="#" class="py-2 d-block">Kerahasiaan</a></li>
                <li><a href="#" class="py-2 d-block">Peraturan</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="<?php echo base_url();?>" class="py-2 d-block">Home</a></li>
                <li><a href="<?php echo base_url("about_us");?>" class="py-2 d-block">About Us</a></li>
                <li><a href='<?php echo base_url("visi_misi");?>' class="py-2 d-block">Visi dan Misi</a></li>
                <li><a href="#" class="py-2 d-block">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Ada pertanyaan?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Ketapang</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+62 896-1256-2019</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@goschool.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <!-- login modal-->
  <div class="modal fade" id="mymodallogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:100%;margin-left: 80px;margin-top: 200px;background-color: #e9f2f7;color: #0b161c">
      <div class="modal-header">
        <label>Form Login</label>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
         <form action="<?php echo site_url('auth/login'); ?>" method="post" autocomplete="off">
        <div class="modal-body">
            <div class="form-group">
                <label for="txturl">Username</label>
                <input type="text" class="form-control"  id="txtusername" name="txt_username" placeholder="Username" value=''>
            </div>
            <div class="form-group">
                <label for="txturl">Password</label>
                <input type="password" class="form-control"  id="txtPassword" name="txt_password" placeholder="Password" value=''>
            </div>
        </div>
          <div class="modal-footer">
            <input type="hidden" name="action" value="login">   
           <a href='<?php echo base_url("daftar/new_member");?>' class="btn btn-primary">Daftar</a> ? 
            <button type="submit" class="btn btn-primary submit-data" id="submitpendonor">Login</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">close</button>
        </div>
        </form>
    </div>
  </div>
</div>


<script src="<?php echo base_url(); ?>assets/templates/aid/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templates/aid/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templates/aid/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templates/aid/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templates/aid/js/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url(); ?>assets/templates/aid/js/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templates/aid/js/jquery.stellar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templates/aid/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templates/aid/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templates/aid/js/aos.js"></script>
<script src="<?php echo base_url(); ?>assets/templates/aid/js/jquery.animateNumber.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templates/aid/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="<?php echo base_url(); ?>assets/templates/aid/js/google-map.js"></script>
<script src="<?php echo base_url(); ?>assets/templates/aid/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/js/frontend/all_cond.js"></script>

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
	