<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php foreach ($header as $k => $v) { ?>
<div class="hero-wrap" style="background-image: url(<?php echo base_url($v->img);?>);" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
      <div class="col-md-6 order-md-last ftco-animate mt-5" data-scrollax=" properties: { translateY: '70%' }">
        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?php echo $v->description;?></h1>       
      </div>
    </div>
  </div>
</div>
<?php } ?> 
 <section class="section">

      <div class="container">
      	<div class="row justify-content-center mb-5 element-animate">
	          <div class="col-md-8 text-center mb-5">
	            <h2 class="text-uppercase heading border-bottom mb-4"><?php echo $slider->caption; ?></h2>
	            <p class="mb-0 lead"><?php echo $slider->description; ?></p>
	          </div>
	        </div>
        <div class="row">
	        <?php foreach($services as $srv => $v):?>
	           <div class="col-lg-4 col-md-6 col-12 mb-3 element-animate">
	            <div class="media d-block media-feature text-center">
	              <span class="<?php echo $v->icon;?> icon"></span>
	              <div class="media-body">
	                <h3 class="mt-0 text-black"><?php echo $v->caption;?></h3>
	                <p><?php echo $v->short_description;?></p>
	                <p><a href="https://api.whatsapp.com/send?phone=628118606060&text=Halo%20Admin,%20Saya%20Membutuhkan%20Informasi%20di%20Perusahaan%20anda" target="_blank"class="btn btn-primary btn-sm">Call Us</a></p>
	              </div>
	            </div>
	          </div>
	     	 <?php endforeach; ?>
          <!-- <div class="col-lg-4 col-md-6 col-12 mb-3 element-animate">
            <div class="media d-block media-feature text-center">
              <span class="flaticon-building-1 icon"></span>
              <div class="media-body">
                <h3 class="mt-0 text-black">Construction Consultant</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <p><a href="#" class="btn btn-outline-primary btn-sm">Learn More</a></p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-12 mb-3 element-animate">
            <div class="media d-block media-feature text-center">
              <span class="flaticon-crane icon"></span>
              <div class="media-body">
                <h3 class="mt-0 text-black">General Contracting</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <p><a href="#" class="btn btn-outline-primary btn-sm">Learn More</a></p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-12 mb-3 element-animate">
            <div class="media d-block media-feature text-center">
              <span class="flaticon-helmet icon"></span>
              <div class="media-body">
                <h3 class="mt-0 text-black">Laminate Flooring</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <p><a href="#" class="btn btn-outline-primary btn-sm">Learn More</a></p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-12 mb-3 element-animate">
            <div class="media d-block media-feature text-center">
              <span class="flaticon-building icon"></span>
              <div class="media-body">
                <h3 class="mt-0 text-black">Metal Roofing</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <p><a href="#" class="btn btn-outline-primary btn-sm">Learn More</a></p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-12 mb-3 element-animate">
            <div class="media d-block media-feature text-center">
              <span class="flaticon-engineer icon"></span>
              <div class="media-body">
                <h3 class="mt-0 text-black">General Contracting</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <p><a href="#" class="btn btn-outline-primary btn-sm">Learn More</a></p>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </section>
    <!-- END section -->