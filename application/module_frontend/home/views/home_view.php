<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="home">
	<p>Selamat datang, <b><?php echo $this->session->userdata('fullname'); ?></b>!</p>
	
	<div class="row">
		<div class="col-md-6 col-sm-12 col-xs-24">
			<!-- small box -->
          	<div class="small-box bg-aqua">
           	 <div class="inner">
              <h3><?php echo $total_guru;?></h3>

              <p>Tenaga Pengajar</p>
            	</div>
	            <div class="icon">
	              <i class="ion ion-cube"></i>
	            </div>
           	 <a href="<?php echo base_url('data_pendonor');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          	</div>
		</div>
		<div class="col-md-6 col-sm-12 col-xs-24">
			<!-- small box -->
          	<div class="small-box bg-red">
           	 <div class="inner">
              <h3><?php echo $total_anak;?></h3>

              <p>Siswa</p>
            	</div>
	            <div class="icon">
	              <i class="ion ion-clipboard"></i>
	            </div>
           	 <a href="<?php echo base_url('data_penerima');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          	</div>
		</div>
	</div>

    <!-- <section class="col-lg-5 connectedSortable ui-sortable">
        
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Donatur</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger"><?php //echo $total_donatur; ?> New Donatur</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <?php //foreach($data_donatur as $dn=> $d){?>
                    <li>
                      <img src="<?php //echo front_url($d->img);?>" alt="User Image" width="100px">
                      <a class="users-list-name" href="#"><?php //echo $d->fullname; ?></a>
                      <span class="users-list-date">Today</span>
                    </li>
                    <?php //}?>
                  </ul>
               
                </div>
              
                <div class="box-footer text-center">
                  <a href="<?php //echo base_url('data_pendonor');?>" class="uppercase">View All Users</a>
                </div>
                
              </div>
             
        </section>  -->    


</section>
