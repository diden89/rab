<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="project box">
	<div class="box-header">
		<h3 class="box-title"><?php echo $cond; ?></h3>
	</div>
	<div class="box-body pad">
		<form id="formInputCategory">
			<div class="form-group">
				<label for="txtCategory_name">Category Name:</label>
					<input type="text" class="form-control" id="txtCategory_name" name="txt_category_name" placeholder="Enter Category Name" value='<?php echo (isset($data->category_name)) ? $data->category_name : ""; ?>'>
					<input type="hidden" name="txt_id_category" value="<?php echo (isset($data->id)) ? $data->id : ""; ?>">
			</div>
			<div class="form-group">
				<label for="txtType">Type:</label>
					<select class="form-control select2 select2-hidden-accessible" style="width: 20%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="txt_type">
						<option value="">--Please Select Type--</option>
						<?php if(isset($data->type))
						{
							foreach($cat_type as $c => $t)
							{
								$sel = ($data->type == $t->category_type) ? 'selected' : '';
								echo '<option value="'.$t->category_type.'" '.$sel.'>'.$t->category_type.'</option>';
							}
						}
						else
						{
							foreach($cat_type as $c => $t)
							{
								echo '<option value="'.$t->category_type.'">'.$t->category_type.'</option>';
							}
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
		
	</div>
	<div class="box-footer">
		<button type="submit" class="btn btn-primary" id="submitcategory">Submit</button>
		<a href='<?php echo base_url("category");?>' class="btn btn-warning" id="submitcategory">Back</a>
	</div>
		</form>
</section>
