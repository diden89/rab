<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*!
 * @package Merek Dagang
 * @copyright Noobscript
 * @author Andy1t
 * @version 1.0
 * @access Public
 * @link /ahp_merekdagang_frontend/apps/module_frontend/auth/views/auth_view.php
 */
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Trademark | Log in</title>
		<link rel="shortcut icon" href="<?php echo base_url('images/favicon.png'); ?>">
		<link rel="stylesheet" href="<?php echo get_template_url(); ?>plugins/fontawesome-free/css/all.css">
		<link rel="stylesheet" href="<?php echo base_url('vendors/ionicons/2.0.1/css/ionicons.css'); ?>">
		<link rel="stylesheet" href="<?php echo get_template_url(); ?>plugins/icheck-bootstrap/icheck-bootstrap.css">
		<link rel="stylesheet" href="<?php echo get_template_url(); ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.css">
		<link rel="stylesheet" href="<?php echo get_template_url(); ?>plugins/toastr/toastr.min.css">
		<link rel="stylesheet" href="<?php echo get_template_url(); ?>dist/css/adminlte.css">
		<link rel="stylesheet" href="<?php echo base_url('styles/source_sans_pro_300_400_400i_700.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('vendors/jquery_waitme/waitMe.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('styles/styles.css'); ?>">
	</head>
	<body class="container-fluid auth-page">
		<div class="row">
			<div class="col-sm-6 application-banner">
				<div class="banner-box">
					<!-- <img class="banner-img" src="<?php echo base_url('images/big_logo.png'); ?>" alt="logo-merekdagang"> -->
					<div class="banner-text">
						<h1><?= NOOBS_TITLE_1 ?></h1>
						<!-- <small><?= NOOBS_TITLE_2 ?></small> -->
					</div>
				</div>
			</div>
			<div class="col-sm-6 login-page">
				<div class="login-box">
					<div class="card">
						<div class="card-body login-card-body">
							<!-- <div class="login-logo">
								<img src="<?php echo base_url('images/login.png'); ?>">
							</div> -->
							<p class="login-box-msg">Please Sign In to Find the Similarity</p>
							<form id="formLogin" action="#" method="post" autocomplete="off">
								<div class="input-group mb-3">
									<input type="text" class="form-control" id="txtUsername" name="txt_username" placeholder="Username" required>
									<div class="input-group-append">
										<div class="input-group-text">
											<span class="fas fa-user"></span>
										</div>
									</div>
								</div>
								<div class="input-group mb-3">
									<input type="password" class="form-control" id="txtPassword" name="txt_password" placeholder="Password" required>
									<div class="input-group-append">
										<div class="input-group-text">
											<span class="fas fa-lock"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<input type="hidden" name="action" value="do_login">
										<button type="submit" class="btn btn-primary btn-block">Sign In</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			var NOOBS_ENVIRONMENT = '<?php echo ENVIRONMENT; ?>';
			var NOOBS_LANGUAGE = '<?php echo NOOBS_LANGUAGE; ?>';
			var NOOBS_TITLE = '<?php echo NOOBS_TITLE; ?>';
			var BASE_URL = '<?php echo base_url(); ?>';
		</script>
		<script src="<?php echo get_template_url(); ?>plugins/jquery/jquery.js"></script>
		<script src="<?php echo get_template_url(); ?>plugins/bootstrap/js/bootstrap.bundle.js"></script>
		<script src="<?php echo get_template_url(); ?>plugins/sweetalert2/sweetalert2.js"></script>
		<script src="<?php echo get_template_url(); ?>plugins/toastr/toastr.js"></script>
		<script src="<?php echo get_template_url(); ?>dist/js/adminlte.js"></script>
		<script src="<?php echo base_url('scripts/custom_validity.js'); ?>"></script>
		<script src="<?php echo base_url('vendors/jquery_waitme/waitMe.js'); ?>"></script>
		<script src="<?php echo base_url('scripts/scripts.js'); ?>"></script>
		<script src="<?php echo base_url('scripts/auth/auth.js'); ?>"></script>
	</body>
</html>
