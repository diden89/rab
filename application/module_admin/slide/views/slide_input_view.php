<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="project box">
	<div class="box-header">
		<h3 class="box-title"><?php echo $cond; ?></h3>
	</div>
	<div class="box-body pad">
		<form id="formInputSlide">
			<div class="form-group">
				<label for="txtTitle">Title:</label>
					<input type="text" class="form-control" id="txtTitle" name="txt_title" placeholder="Enter Title" value='<?php echo (isset($data->title)) ? $data->title : ""; ?>'>
					<input type="hidden" name="txt_slide_id" value="<?php echo (isset($data->id)) ? $data->id : ""; ?>">
			</div>
			<div class="form-group">
				<label for="txturl">Url:</label>
					<input type="text" class="form-control" id="txtUrl" name="txt_url" placeholder="Enter URL" value='<?php echo (isset($data->url)) ? $data->url : ""; ?>'>
			</div>
			<div class="form-group">
				<label for="txtDesc">Description:</label>
				<textarea id="txtDesc" name="txt_desc" class="textarea" placeholder="Enter content" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo (isset($data->description)) ? $data->description : ""; ?></textarea>
			</div>
			<div class="form-group">
				<label for="txtSort">Sort:</label>
					<input type="text" class="form-control" id="txtsort" name="txt_sort" placeholder="sort" value='<?php echo (isset($data->seq)) ? $data->seq : ""; ?>' style="width: 50px;">
			</div>
			<div class="form-group">
				<label for="txtImg">Image:</label>
					<input type="file" id="txtImg" name="txt_img" value='<?php echo (isset($data->img)) ? $data->img : ""; ?>'> <b>*Min 1920px x 975px</b></br>
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
		<button type="submit" class="btn btn-primary" id="submitSlide">Submit</button>
		<a href='<?php echo base_url("slide");?>' class="btn btn-warning" id="submitSlide">Back</a>
	</div>
		</form>
</section>
