<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="news box">
	<div class="box-header">
		<h3 class="box-title">Content</h3>
	</div>
	<div class="box-body pad">
              
              	<div class="row">
              		<div class="col-sm-12">
              		<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">	
              			<thead>
              				<tr role="row">
              					<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
              						No
              					</th>
              					
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                          Title
                        </th>
              					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 500px;" aria-label="Browser: activate to sort column ascending">
              						Description
              					</th>
              					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;" aria-label="Platform(s): activate to sort column ascending">
              						Author
              					</th>
              					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; " aria-label="Platform(s): activate to sort column ascending">
              						Date
              					</th>
              					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px; " aria-label="Platform(s): activate to sort column ascending">
              						Read
              					</th>
              					<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
              						Category Name
              					</th>
              					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; " aria-label="Platform(s): activate to sort column ascending">
              						Status
              					</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; " aria-label="Platform(s): activate to sort column ascending">
                          Image
                        </th>
              					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; " aria-label="Platform(s): activate to sort column ascending">
              						Action
              					</th>
              					
              				</tr>
	                </thead>
	                <tbody>
	                	<?php 
	                		$no = $number_data;
	                		foreach($data as $dt){
	                		$url_img = $dt['image'];
	                		$new_url = str_replace('admin/', "", site_url());
	                	 ?>
	                		<tr role="row" class="odd">
			                <td><?php echo $no; ?></td>
			                <td class="sorting_1"><?php echo $dt['title']; ?></td>
                      <td class=""><?php echo substr(strip_tags($dt['description']),0,50); ?></td>
			                <td class=""><?php echo $dt['author']; ?></td>
							       <td class=""><?php echo date('d-m-Y H:i:s' , strtotime($dt['date'])); ?></td>
                     <td class=""><?php echo $dt['count_read']; ?></td>
			                <td ><?php echo $dt['category_name']; ?></td>
							       <td class=""><?php echo ($dt['is_active'] == 'Y') ? 'Yes' : 'No'; ?></td>
			                <td style="text-align: center;"><img onclick="showImage('<?php echo front_url().$url_img;?>')" src='<?php echo $new_url.$url_img;?>' style="width:100%;max-width:300px"></td>
			                <td>
			                  	<a href="<?php echo base_url('news/cu_action/edit/'.$dt["news_id"].'');?>" class="fa btn btn-success fa-pencil"></a>
			                  	<button type="button" onclick="deletenews('<?php echo base_url();?>news/delete/<?php echo $dt['news_id'];?>')" class="fa btn btn-danger fa-trash"></a> 
			                </td>
			                </tr>
	                	<?php 
	                	$no++;
	                } ?>
	               </tbody>
	                <!-- <tfoot>
	                <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
	                </tfoot> -->
	              </table>
	              <nav aria-label="Page navigation">
	              <?php echo $pagination; ?>
	          		</nav>
         		</div>
      		</div>
         
	</div>
	<div class="box-footer">
		<a href="<?php echo base_url('news/cu_action/add');?>" class="btn btn-primary">Add</a>
	</div>
</section>

<!-- delete modal -->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Data?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Yakin akan menghapus data ini?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
        <a class="btn btn-primary" id="deleteNews">Ya</a>
      </div>
    </div>
  </div>
</div>