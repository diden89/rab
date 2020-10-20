<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="message box">
	<div class="box-header">
		<h3 class="box-title"><?php echo $cond; ?></h3>
	</div>
	<div class="box-body pad">
		<form action="<?php echo base_url();?>message/send_email" method="post">
			<!-- <div class="form-group">
				<label for="txtFrom">From:</label>
					<input type="email" class="form-control" id="txtFrom" name="txt_from" placeholder="Enter Your Email">
					<input type="hidden" name="txt_id_message" value="<?php //echo (isset($data["id"])) ? $data["id"] : ""; ?>">
			</div> -->
			<div class="form-group">
				<label for="txtTo">To:</label>
					<input type="email" class="form-control" id="txtTo" name="txt_to" placeholder="Enter Title Articles" value='<?php echo (isset($data["email"])) ? $data["email"] : ""; ?>'>
			</div>
			<div class="form-group">
				<label for="txtFrom">Subject:</label>
					<input type="text" class="form-control" id="subject" name="txt_subject" placeholder="Enter You Subject" value='<?php echo (isset($data["subject"])) ? $data["subject"] : ""; ?>'>
			</div>
			<div class="form-group">
				<label for="txtContent">Content:</label>
				<textarea id="txtContent" name="txt_content" id="txt_content" class="textarea" placeholder="Enter content" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo (isset($data["text"])) ? $data["text"] : ''; ?></textarea>
			</div>		
	</div>
	<div class="box-footer">
		<button type="submit" class="btn btn-primary" id="submitcategory">Submit</button>
		<a href='<?php echo base_url("message");?>' class="btn btn-warning" id="submitcategory">Back</a>
	</div>
		</form>
</section>
