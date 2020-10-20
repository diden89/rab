<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style type="text/css">
    .left-posisi {
        /*position: absolute;*/
        text-align: center;
        /*bottom: 1px;*/
    }
    .bodybuilder {
        position: static;
        /*text-align: center;*/
        bottom: 500px;
    }
    .login{
		width:auto;
		min-height:350px;
		border:#CCC solid 1px;
		background:#f9f9f9;
		padding:20px;
		margin:20px auto;
		box-shadow: 0 2px 7px rgba(0, 0, 0, 0.1);
	}
	.login h1{
        font-size:28px;
        color:#000;
        text-align:center;
	}
	.box{
		background-color:#fff;
		overflow: hidden;
		height:350px;
		width: 300px;
		/*-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		-ms-border-radius: 5px;
		-o-border-radius: 5px;
		border-radius:5px;*/
		-webkit-box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.3);
		-moz-box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.3);
		box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.3);
	}
	.box img{
	  width:100%;
	  height:100%;
	  

	}
	.box h3{
	  padding:15px;
	  margin:0px;
	}
	.box p{
	    overflow:hidden;
	    height:100px;
	    padding-left:15px;
	    padding-right:15px;
	    margin:0px;
	}
	#tanggalku {
		color:  #1e1a1a;
		font-size: 25px;
	}
	
</style>   
<script type="text/javascript">
	// 1 detik = 1000
	window.setTimeout("waktu()",1000);
	function waktu() {
		var tanggal = new Date();
		setTimeout("waktu()",1000);
		document.getElementById("tanggalku").innerHTML
		= tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
	}
</script> 

<!-- ======= Slider Section ======= -->
<div class="bodybuilder">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="login">
					 <h1><i class="fa fa-key fa-fw"></i> AMBIL ABSEN</h1>
	                   <hr>
	                   <div class="row" style="margin-bottom: 20px">
	                		<div class="col-lg-12" style="text-align: center;">
	                			<div class="btn-group btn-group-toggle" data-toggle="buttons">
								  <label class="btn btn-outline-secondary active">
								    <input type="radio" name="absen" value="masuk" autocomplete="off" checked> Masuk
								  </label>
								  <label class="btn btn-outline-secondary">
								    <input type="radio" name="absen" value="pulang"autocomplete="off"> Pulang
								  </label>
								</div>
	                		</div>
	                	</div>
	                	<div class="row" style="margin-bottom: 20px">
	                		<div class="col-lg-12" style="text-align: center;">
	                			<div id="tanggalku" class="btn btn-sm btn-primary"></div>
	                		</div>
	                	</div>
	                	<div class="row">
	                		<div class="col-md-6" style="padding-left: 125px;">
	                			<div class="box" style="text-align: center;">
								    <img src="<?php echo base_url('assets/images/data_pendonor/no_image.jpg'); ?>" id="img_siswa" alt="" />							   
								</div>
	                		</div>
	                		
	                		<div class="col-md-6">
	                			<form action="" method="post">
								<div class="form-group"><!--start form-group-->
								    <label>Scan Card</label>
								    <div class="input-group input-group-sm">
								    	<input type="text" id="card_id" name="card_id" placeholder="Scan Disini" class="form-control" autofocus>
								    </div>
								</div><!--/form-group-->            

			                   	<div class="form-group"><!--start form-group-->
			                        <label>Nama</label>
			                        <div class="input-group  input-group-sm">
			                        	<input id="nama" readOnly type="text" name="nama" placeholder="Nama" class="form-control">
			                        </div>
		                        </div>
		                        <div class="form-group"><!--start form-group-->
			                        <label>Kelas</label>
			                        <div class="input-group  input-group-sm">
			                        	<input id="kelas" readOnly type="text" name="kelas" placeholder="Kelas" class="form-control">
			                        </div>
		                        </div>
		     
		                   		<!-- <hr>
		                   			<button class="btn btn-primary btn-sm btn-block" type="submit" name="login">Log In
		                   			</button> -->
		                  		</form>
	                		</div>
	                	</div>
	                 
				</div>
			</div>
		</div>
	</div>	
</div>

    