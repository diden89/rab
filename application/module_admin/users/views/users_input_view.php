<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="project box">
	<div class="box-header">
		<h3 class="box-title"><?php echo $cond; ?></h3>
	</div>
	<div class="box-body pad">
		<form id="formInputUsers">
			<div class="form-group">
				<label for="txturl">Employee:</label>
					<?php 
					
					if(isset($data->ud_id) && $data->ud_id == $employee->userid){
						echo '<input type="text" class="form-control" id="txtFullname" name="txt_fullname" value="'.$employee->fullname.'" disabled="disabled">';
					}else{?>
					<select class="form-control select2 select2-hidden-accessible" style="width: 20%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="txt_fullname">
						<option value="">--Please Select Employee--</option>
						<?php 
						foreach($employee as $emp)
						{							
							echo '<option value="'.$emp['id'].'"'.$selected.'>'.$emp['fullname'].'</option>';
						}
						?>
					</select>
				<?php }?>
			</div>
			<div class="form-group">
				<label for="txtTitle">Username:</label>
					<input type="text" class="form-control" id="txtUsername" name="txt_username" placeholder="Enter Username" value='<?php echo (isset($data->username)) ? $data->username : ""; ?>'>
					<input type="hidden" name="txt_user_id" value="<?php echo (isset($data->ud_id)) ? $data->ud_id : ""; ?>">
			</div>
			<div class="form-group">
				<!-- <label for="txtpassword">Password:</label>
				<div class="row">
					<div class="col-lg-4 col-sm">
						<input type="password" class="form-control" id="txtpassword" name="txt_password" placeholder="Enter Password" value='<?php //echo (isset($data->ori_password)) ? $data->ori_password : ""; ?>'></div>
					<div class="col-lg-4 col-sm"> <span class="fa fa-eye"></span></div>
				</div> -->
				<label>Password</label>
			    <div class="input-group" id="show_hide_password">
			      <input class="form-control" type="password" name="txt_password" value='<?php echo (isset($data->ori_password)) ? $data->ori_password : ""; ?>'>
			      <div class="input-group-addon">
			        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
			      </div>
			    </div>
			</div>
			<div class="form-group">
				<label for="txturl">Sub Group:</label>
					<select class="form-control select2 select2-hidden-accessible" style="width: 20%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="txt_sub_group">
						<option value="">--Please Select Position--</option>
						<?php 
						$selected = "";
						foreach($sub_group as $ug)
						{
							$selected = (isset($data->sub_group) && $data->sub_group == $ug['id']) ? "selected" : "";
							echo '<option value="'.$ug['id'].'"'.$selected.'>'.$ug['caption'].'</option>';
						}
						?>
					</select>
			</div>
			<div class="form-group">
				<label for="txtStatus">Status:</label>
					<select class="form-control select2 select2-hidden-accessible" style="width: 20%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="txt_status">
						<option value="">--Please Select Status--</option>
						<?php if($data->ud_isactive == 'Y')
						{
							echo '<option value="Y" selected>Enable</option>';
							echo '<option value="N">Disable</option>';
						}
						else
						{
							echo '<option value="Y">Enable</option>';
							echo '<option value="N" selected>Disable</option>';
						}
							?>
						
						
					</select>
			</div>
		
	</div>
	<div class="box-footer">
		<button type="submit" class="btn btn-primary" id="submitusers">Submit</button>
		<a href='<?php echo base_url("users");?>' class="btn btn-warning" id="submitusers">Back</a>
	</div>
		</form>
</section>
