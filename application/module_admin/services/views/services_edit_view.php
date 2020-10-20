<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="services box">
	<div class="box-header">
		<h3 class="box-title"><?php echo $cond; ?></h3>
	</div>
	<div class="box-body pad">
		<form id="formInputServices">
			<div class="form-group">
				<label for="txtCaption">Services Name:</label>
					<input type="text" class="form-control" id="txtCaption" name="txt_caption" placeholder="Enter Services Name" value='<?php echo (isset($data->caption)) ? $data->caption : ""; ?>'>
					<input type="hidden" name="txt_id_services" id="txt_id_services" value="<?php echo (isset($data->id)) ? $data->id : ""; ?>">
			</div>
			<div class="form-group">
				<label for="txtSDesc">Short Description:</label>
				<textarea name="txt_s_desc" class="textarea" placeholder="Enter content" style="width: 100%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo (isset($data->short_description)) ? $data->short_description : ""; ?></textarea>
			</div>
			<div class="form-group">
				<label for="txtContent">Description:</label>
				<textarea id="txtContent" name="txt_desc" class="textarea" placeholder="Enter content" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo (isset($data->description)) ? $data->description : ""; ?></textarea>
			</div>
			<div class="form-group">
				<label for="txtIcon">Icon:</label>
					<select class="form-control select2" style="width: 20%;"  name="txt_icon" id="txt_icon" >
						<option value="">--Please Select Icon--</option>
						<?php 

						if(isset($data->icon))
						{
							foreach($dataicon as $di)
							{
								$sel = ($data->icon == $di['icon_name']) ? 'selected' : '';
								echo '<option value="'.$di['icon_name'].'" '.$sel.'>'.$di['icon_name'].'</option>';
							}
						}
						else
						{
							foreach($dataicon as $di)
							{
								echo '<option value="'.$di['icon_name'].'">'.$di['icon_name'].'</option>';
							}
						}
						// echo '<option value="'.$di['icon_name'].'>'.$di['icon_name'].'</option>';
						?>
						
					</select>
					<span id="selOpt" style="font-size: 50px;"></span>
			</div>
			<div class="form-group">
				<label for="txtCategory">Category:</label>
					<select class="form-control select2 select2-hidden-accessible" style="width: 20%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="txt_category">
						<option value="">--Please Select Category--</option>
						<?php 
						if(isset($data->category_id))
						{
							foreach($category as $cat)
							{
								$sel = ($data->category_id == $cat['id']) ? 'selected' : '';
								echo '<option value="'.$cat['id'].'"'.$sel.' >'.$cat['category_name'].'</option>';
							}
						}
						else
						{
							foreach($category as $cat)
							{
								echo '<option value="'.$cat['id'].'">'.$cat['category_name'].'</option>';
							}
						}
						
							?>
						
						
					</select>
			</div>
			<div class="form-group">
				<label for="txtMenu">Menu:</label>
					<select class="form-control select2 select2-hidden-accessible" style="width: 20%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="txt_menu">
						<option value="">--Please Select Menu--</option>
						<?php 
						if(isset($data->menu_id))
						{
							foreach($datamenu as $dm)
							{
								$sel = ($data->menu_id == $dm['id']) ? 'selected' : '';
								echo '<option value="'.$dm['id'].'"'.$sel.' >'.$dm['caption'].'</option>';
							}
						}
						else
						{
							foreach($datamenu as $dm)
							{
								echo '<option value="'.$dm['id'].'">'.$dm['caption'].'</option>';
							}
						}
						
							?>
						
						
					</select>
			</div>
			<?php if(isset($data->is_active)) { ?>
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
			<?php } ?>
			
			<div class="form-group">
				<label for="txtImg">Image:</label>
					<input type="file" id="txtImg" name="txt_img" value='<?php echo (isset($data->img)) ? $data->img : ""; ?>'>
					<?php 
					if (isset($data->img)) { 
						$url_img = $data->img;
	              		?>
						<img src="<?php echo front_url().$url_img;?>" width="300px">
					<?php } ?>
					<input type="hidden" name="txt_img_old" value="<?php echo (isset($data->img)) ? $data->img : ""; ?>">
			</div>

		
	</div>
	<div class="box-footer">
		<button type="submit" class="btn btn-primary" id="submitcategory">Submit</button>
		<a href='<?php echo base_url("services");?>' class="btn btn-warning" id="submitcategory">Back</a>
	</div>
		</form>
</section>
