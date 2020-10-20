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
    <!-- ======= Contact Section ======= -->
    <div id="contact" class="contact-area">
      <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center">
                <h2>Contact us</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Start contact icon column -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="fa fa-mobile"></i>
                  <p>
                    Call: +62 896-1256-2019<br>
                    <span>Senin - Jum'at (08:00 - 17:00 WIB)</span>
                  </p>
                </div>
              </div>
            </div>
            <!-- Start contact icon column -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="fa fa-envelope-o"></i>
                  <p>
                    Email: info@goschool.com<br>
                    <span>Web: www.goschool.com</span>
                  </p>
                </div>
              </div>
            </div>
            <!-- Start contact icon column -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="fa fa-map-marker"></i>
                  <p>
                    Location: Ketapang<br>
                    <span>Kalimantan Barat, Indonesia</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- Start Google Map -->
            <div class="col-md-6 col-sm-6 col-xs-12">
              <!-- Start Map -->
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2041909.6230798762!2d109.46326557601573!3d-1.6793058136932857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e044cf6da61153f%3A0x201126c1f8e4178!2sKetapang%20Regency%2C%20West%20Kalimantan!5e0!3m2!1sen!2sid!4v1585623164374!5m2!1sen!2sid" width="100%" height="380" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              <!-- End Map -->
            </div>
            <!-- End Google Map -->

            <!-- Start  contact -->
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form contact-form">
                <form method="post" id="comment_form">
					<div class="row">
						<div class="col-md-6 form-group">
							<label for="fname">Nama Depan</label>
							<input type="text" name="fname" class="form-control" id="fname">
							<input name='url' id="url" type='hidden' value="contact" />
						</div>
						<div class="col-md-6 form-group">
							<label for="lname">Nama Belakang</label>
							<input type="text" name="lname" class="form-control" id="name">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group">
							<label for="email">Email</label>
							<input type="email" name="email" id="email" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group">
							<label for="email">Judul</label>
							<input type="text" name="subject" id="subject" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group">
							<label for="message">Tulis Pesan</label>
							<textarea name="message" id="message" class="form-control" cols="30" rows="8"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group captcha-img">
							<?php echo $image; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group">
							<input type="text" name="captcha" id="captcha" placeholder="Enter Captcha" class="form-control ">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 form-group">
							<button type="submit" class="btn btn-primary btn-circle">Kirim Pesan</button>
						</div>
					</div>
				</form>  
              </div>
            </div>
            <!-- End Left contact -->
          </div>
        </div>
      </div>
    </div><!-- End Contact Section -->
    

  </main><!-- End #main -->    