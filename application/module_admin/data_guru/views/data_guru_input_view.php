<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="data_guru box">
	<div class="row">
		<form id="formInputMapel" autocomplete="off">
	        <div class="col-lg-12 col-md-24">
	        	<div class="nav-tabs-custom">
	        		<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_1" data-toggle="tab">Data Guru</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_1">
							<div class="box-body pad">
								<div class="form-group">
		
								<div class="form-group">
									<label for="txtNamaGuru">Nama Guru:</label>
										<input type="text" class="form-control typeahead" id="txtNamaGuru" name="txt_nama_guru" placeholder="Masukan Nama Guru" value='<?php echo (isset($data->fullname)) ? $data->fullname : ""; ?>'>
										<input type="hidden" id="txtEmployeeId" name="txt_employee_id" value='<?php echo (isset($data->e_id)) ? $data->e_id : ""; ?>'>
								</div>
								<div class="form-group">
								<label for="txtMapel">Bidang Studi:</label>
								<select class="form-control select2 select2-hidden-accessible" style="width: 20%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="txt_mapel">
									<option value="">--Pilih Bidang Studi--</option>
									<?php 
									$selected = "";
									foreach($mapel as $map)
									{
										$selected = (isset($data->mapel_id) && $data->mapel_id == $map['id']) ? "selected" : "";
										echo '<option value="'.$map['id'].'"'.$selected.'>'.$map['mapel'].'</option>';
									}
									?>
								</select>
							</div>
								
							</div>
						</div>
					</div>
	        	</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary" id="submitcategory">Submit</button>
					<a href='<?php echo base_url("data_guru");?>' class="btn btn-warning" id="submitcategory">Back</a>
				</div>
				</form>
	        </div>
    	</div>	
</section>
