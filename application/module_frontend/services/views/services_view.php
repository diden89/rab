<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="services box">
	<div class="box-header">
		<h3 class="box-title">Content</h3>
	</div>
	<div class="box-body pad">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              	<div class="row">
              		<div class="col-sm-6">
              			<div class="dataTables_length" id="example1_length">
              				<label>
              					Show 
              					<select name="example1_length" aria-controls="example1" class="form-control input-sm">
              						<option value="10">10</option>
              						<option value="25">25</option>
              						<option value="50">50</option>
              						<option value="100">100</option>
              					</select> 
              					entries
              				</label>
              			</div>
              		</div>
              		<div class="col-sm-6">
              			<div id="example1_filter" class="dataTables_filter">
              				<label>
              					Search:
              					<input class="form-control input-sm" placeholder="" aria-controls="example1" type="search">
              					<button type="submit" class="form-control input-sm btn-primary"><i class="fa fa-search"></i></button>
              				</label>
              			</div>
              		</div>
              	</div>
              	<div class="row">
              		<div class="col-sm-12">
              		<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">	
              			<thead>
              				<tr role="row">
              					<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
              						No
              					</th>
              					
              					<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
              						Caption
              					</th>
              					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 300px;" aria-label="Browser: activate to sort column ascending">
              						Short Description
              					</th>
              					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;text-align: center;" aria-label="Platform(s): activate to sort column ascending">
              						Image
              					</th>
                                                 <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;" aria-label="Platform(s): activate to sort column ascending">
                                                        Menu Kategori
                                                 </th>
              					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">
              						Status
              					</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px; text-align: center;" aria-label="Platform(s): activate to sort column ascending">
                          Icon
                        </th>
              					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px; text-align: center;" aria-label="Platform(s): activate to sort column ascending">
              						Action
              					</th>
              					
              				</tr>
	                </thead>
	                <tbody>
	                	<?php 
	                		$no = 1;
	                		foreach($data as $dt){
	                		$url_img = $dt['img'];
	                		$new_url = str_replace('admin/', "", site_url());
	                	 ?>
	                		<tr role="row" class="odd">
			                 <td><?php echo $no; ?></td>
			                 <td class="sorting_1"><?php echo $dt['caption']; ?></td>
			                 <td class=""><?php echo $dt['short_description']; ?></td>

			                 <td style="text-align: center;"><img src='<?php echo $new_url.$url_img;?>' width="50px"></td>
                             <td ><?php echo $dt['url'] ;?></td>
			                   <td ><?php echo ($dt['is_active'] == 'Y') ? '<span style="color:green;">Enable</span>':'<span style="color:red;">Disable</span>';?></td>
                        <td class="sorting_1" style="text-align: center;"><span class="<?php echo $dt['icon'];?> icon" style="font-size: 30px;"></span></td>
			                  <td style="text-align: center;">
			                  	<a href="<?php echo base_url('services/cu_action/edit/'.$dt["id"].'');?>" class="fa btn btn-success fa-pencil"></a>
			                  	
			                  </td>
			                </tr>
	                	<?php 
	                	$no++;
	                } ?>
	               </tbody>
	               </table>
         		</div>
      		</div>
      
         
	</div>
	<div class="box-footer">
		<a href="<?php echo base_url('services/cu_action/add');?>" class="btn btn-primary">Add</a>
	</div>
</section>
