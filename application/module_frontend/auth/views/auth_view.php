<?php defined('BASEPATH') OR exit('No direct script access allowed');

?>
<main id="main">
    <?php foreach ($header as $k => $v) { ?>
    <!-- ======= Blog Header ======= -->
        <div class="header-bg page-area" style="background:url(<?php echo base_url($v->img) ?>)">
          <div class="home-overly"></div>
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="slider-content text-center">
                  <div class="header-bottom">
                    <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                      <h1 class="title2"><?php echo $v->caption;?></h1>
                    </div>
                    <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                      <h2 class="title3"><?php echo strip_tags($v->description);?></h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Blog Header -->
    <?php } ?>      

    <!-- ======= Blog Page ======= -->
    <div class="blog-page area-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="page-head-blog">
                        <div class="single-blog-page">
                            <!-- recent start -->
                            <div class="left-blog">
                                <h4>Menu</h4>
                                <ul>
                                    <li><a href="<?php echo base_url("daftar/new_member");?>">Daftar</a></li>
                                    <li><a href="<?php echo base_url("auth");?>">Login</a></li>
                                </ul>                                
                            </div>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->

                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="single-blog">
                                <div class="single-blog-img">
                                    <form action="<?php echo site_url('auth/login'); ?>" method="post" autocomplete="off">
                                        <div class="tab-content">
                                            <h2>Login Member</h2>
                                            <div class="box-body pad">
                                                <div class="form-group">
                                                    <label for="txtUsername">Username :</label>
                                                    <input type="text" class="form-control" id="txtUsername" name="txt_username" placeholder="Username...." value='' required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txtEmail">Password :</label>
                                                    <input type="password" class="form-control" id="txtPassword" name="txt_password" placeholder="Password Anda...." value='' required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txtEmail">Login Sebagai :</label>
                                                    <select name=login_as class="form-control">
                                                        <option value="">--Pilih--</option>
                                                        <option value="2">Donatur</option>
                                                        <option value="4">Anak Asuh</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.tab-content -->
                                        <div class="box-footer">
                                            <input type="hidden" name="action" value="login">    
                                            <button type="submit" class="btn btn-primary submit-data" id="submitmember">Login</button>

                                            <a href='<?php echo base_url();?>' class="btn btn-warning" >Cancel</a>
                                        </div>
                                    </form>        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Blog Page -->

  </main><!-- End #main -->        
