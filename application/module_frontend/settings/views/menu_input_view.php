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
					<input type="text" class="form-control" id="txtMenu_name" name="txt_menu_name" placeholder="Enter Nama Menu" value='<?php echo (isset($data->m_caption)) ? $data->m_caption : ""; ?>'>
					<input type="hidden" name="txt_id_menu" id="txt_id_menu" value="<?php echo (isset($data->m_id)) ? $data->m_id : ""; ?>">
					<input type="hidden" name="txt_id_parent" id="txt_id_parent" value="<?php echo (isset($data->m_parent_id)) ? $data->m_parent_id : ""; ?>">
			</div>
			<div class="form-group">
				<label for="txtType">Induk:</label>
					<select class="form-control select2 select2-hidden-accessible" style="width: 20%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="txt_parent_id" id="txt_parent_id">
						<option value="">--Please Select Induk--</option>
					</select>
			</div>
			<div class="form-group">
				<label for="txtUrl">URL Menu:</label>
					<input type="text" class="form-control" id="txtUrl" name="txt_url" placeholder="Enter URL Menu" value='<?php echo (isset($data->m_url)) ? $data->m_url : ""; ?>'>
			</div>
			<div class="form-group">
				<label for="txtContent">Description:</label>
				<textarea id="txtContent" name="txt_desc" class="textarea" placeholder="Enter content" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo (isset($data->m_description)) ? $data->m_description : ""; ?></textarea>
			</div>
			<div class="form-group">
				<label for="txtIcon">Icon Menu:</label>
					<input type="text" class="form-control" id="txtIcon" name="txt_icon" placeholder="Enter Icon Menu Ex : fa fa-plus" value='<?php echo (isset($data->m_icon)) ? $data->m_icon : ""; ?>'>
			</div>
			<div class="form-group">
				<label for="txtImg">Image:</label>
					<input type="file" id="txtImg" name="txt_img" value='<?php echo (isset($data->m_img)) ? $data->m_img : ""; ?>'>
					<?php 
					if (isset($data->m_img)) { 
						$url_img = $data->m_img;
	              		?>
						<img src="<?php echo base_url().$url_img;?>" width="300px">
					<?php } ?>
					<input type="hidden" name="txt_img_old" value="<?php echo (isset($data->m_img)) ? $data->m_img : ""; ?>">
			</div>
		
	</div>
	<div class="box-footer">
		<button type="submit" class="btn btn-primary" id="submitcategory">Submit</button>
		<a href='<?php echo base_url("settings/menu");?>' class="btn btn-warning" id="submitcategory">Back</a>
	</div>
		</form>
</section>
