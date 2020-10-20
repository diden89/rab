<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="project box">
	<div class="box-header">
		<h3 class="box-title"><?php echo $cond; ?></h3>
	</div>
	<div class="box-body pad">
		<form id="formInputNews">
			<div class="form-group">
				<label for="txtTitle">Title:</label>
					<input type="text" class="form-control" id="txtTitle" name="txt_title" placeholder="Enter Title" value='<?php echo (isset($data->title)) ? $data->title : ""; ?>'>
					<input type="hidden" name="txt_news_id" value="<?php echo (isset($data->news_id)) ? $data->news_id : ""; ?>">
			</div>
			<div class="form-group">
				<label for="txtCatId">Category:</label>
					<select name="cat_id" id="txtCatId" class="form-control">
					<option value="">--Please Select Category--</option> 
						<?php foreach($category as $cat){
							if(isset($data->category_id))
							{
								if($data->category_id == $cat['id'])
								{
									echo '<option value="'.$cat["id"].'" selected>'.$cat["category_name"].'</option>';
								}
								else
								{
									echo '<option value="'.$cat["id"].'">'.$cat["category_name"].'</option>';
								}
							}
							else
							{
								if($data->category_id == $cat['id'])
								{
									echo '<option value="'.$cat["id"].'">'.$cat["category_name"].'</option>';
								}
							}
						}?>	
					</select>
			</div>
			<div class="form-group">
				<label for="txtDesc">Description:</label>
				<textarea id="txtDesc" name="txt_desc" class="textarea" placeholder="Enter content" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo (isset($data->description)) ? $data->description : ""; ?></textarea>
			</div>
			<div class="form-group">
				<label for="txtImg">Image:</label>
					<input type="file" id="txtImg" name="txt_img" value='<?php echo (isset($data->img)) ? $data->img : ""; ?>'>
					<?php 
					if (isset($data->img)) { 
						$url_img = $data->image;
	                	$new_url = str_replace('admin/', "", site_url());?>
						<img src="<?php echo $new_url.$url_img;?>" width="75px">
					<?php } ?>
					<input type="hidden" name="txt_img_old" value="<?php echo (isset($data->image)) ? $data->image : ""; ?>">
			</div>
			<div class="form-group">
				<label for="txtStatus">Status:</label>
					<select class="form-control select2 select2-hidden-accessible" style="width: 20%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="txt_status">
						<option value="">--Please Select Status--</option>
						
						<?php 
						if(isset($data->is_active))
						{
							if($data->is_active == 'Y')
							{
								echo '<option value="Y" selected>Enable</option>';
								echo '<option value="N">Disable</option>';
							}
							else
							{
								echo '<option value="Y">Enable</option>';
								echo '<option value="N" selected>Disable</option>';
							}
						}
						else
						{
							echo '<option value="Y">Enable</option>';
							echo '<option value="N">Disable</option>';
						}
						
							?>
						
						
					</select>
			</div>
	</div>
	<div class="box-footer">
		<button type="submit" class="btn btn-primary" id="submitProject">Submit</button>
		<a href='<?php echo base_url("news");?>' class="btn btn-warning" id="submitnews">Back</a>
	</div>
		</form>
</section>
