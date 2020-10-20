<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="menu box">
	<div class="box-header">
		<h3 class="box-title"><?php echo $cond; ?></h3>
	</div>
	<div class="box-body pad">
		<form id="formInputMenu">
			<div class="form-group">
				<label for="txtCategory_name">Nama Menu:</label>
					<input type="text" class="form-control" id="txtMenu_name" name="txt_menu_name" placeholder="Enter Nama Menu" value='<?php echo (isset($data->caption)) ? $data->caption : ""; ?>'>
					<input type="hidden" name="txt_id_menu" id="txt_id_menu" value="<?php echo (isset($data->id)) ? $data->id : ""; ?>">
					<input type="hidden" name="txt_id_parent" id="txt_id_parent" value="<?php echo (isset($data->parent_id)) ? $data->parent_id : ""; ?>">
			</div>
			<div class="form-group">
				<label for="txtStatus">Position:</label>
					<select class="form-control select2 select2-hidden-accessible" style="width: 20%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="txt_position" id="txt_position">
						<option value="">--Please Select Status--</option>
						
						<?php 
						echo $data->is_admin;
						if(isset($data->is_admin))
						{
							if($data->is_admin == 'Y')
							{
								echo '<option value="Y" selected>Backend</option>';
								echo '<option value="N">Frontend</option>';
							}
							else
							{
								echo '<option value="Y">Backend</option>';
								echo '<option value="N" selected>Frontend</option>';
							}
						}
						else
						{
							echo '<option value="Y">Backend</option>';
							echo '<option value="N">Frontend</option>';
						}
						
							?>
						
						
					</select>
			</div>
			<div class="form-group">
				<label for="txtType">Induk:</label>
					<select class="form-control select2 select2-hidden-accessible" style="width: 20%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="txt_parent_id" id="txt_parent_id">
						<option value="">--Please Select Induk--</option>
					</select>
			</div>
			<div class="form-group">
				<label for="txtUrl">URL Menu:</label>
					<input type="text" class="form-control" id="txtUrl" name="txt_url" placeholder="Enter URL Menu" value='<?php echo (isset($data->url)) ? $data->url : ""; ?>'>
			</div>
			<div class="form-group">
				<label for="txtContent">Description:</label>
				<textarea id="txtContent" name="txt_desc" class="textarea" placeholder="Enter content" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo (isset($data->description)) ? $data->description : ""; ?></textarea>
			</div>
			<div class="form-group">
				<label for="txtIcon">Icon Menu:</label>
					<input type="text" class="form-control" id="txtIcon" name="txt_icon" placeholder="Enter Icon Menu Ex : fa fa-plus" value='<?php echo (isset($data->icon)) ? $data->icon : ""; ?>'>
			</div>
			<div class="form-group">
				<label for="txtMember">Guru Menu:</label>
					<select class="form-control select2 select2-hidden-accessible" style="width: 20%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="txt_member" id="txt_member">
						<option value="">--Please Select--</option>
						
						<?php 
						if(isset($data->as_guru))
						{
							if($data->as_guru == 'Y')
							{
								echo '<option value="Y" selected>Yes</option>';
								echo '<option value="N">No</option>';
							}
							else
							{
								echo '<option value="Y">Yes</option>';
								echo '<option value="N" selected>No</option>';
							}
						}
						else
						{
							echo '<option value="Y">Yes</option>';
							echo '<option value="N">No</option>';
						}
						
							?>
						
						
					</select>
			</div>
			<div class="form-group">
				<label for="txtMember">Kepala Sekolah Menu:</label>
					<select class="form-control select2 select2-hidden-accessible" style="width: 20%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="txt_volunteer" id="txt_volunteer">
						<option value="">--Please Select--</option>
						
						<?php 
						if(isset($data->as_kepsek))
						{
							if($data->as_kepsek == 'Y')
							{
								echo '<option value="Y" selected>Yes</option>';
								echo '<option value="N">No</option>';
							}
							else
							{
								echo '<option value="Y">Yes</option>';
								echo '<option value="N" selected>No</option>';
							}
						}
						else
						{
							echo '<option value="Y">Yes</option>';
							echo '<option value="N">No</option>';
						}
						
							?>
						
						
					</select>
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
		<a href='<?php echo base_url("menu");?>' class="btn btn-warning" id="submitcategory">Back</a>
	</div>
		</form>
</section>
