<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="data_ajar box">
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
								<div class="col-lg-6">		
									<div class="form-group">
										<label for="txtNamaGuru">Nama Guru:</label>
											<input type="text" class="form-control typeahead" id="txtNamaGuru" name="txt_nama_guru" placeholder="Masukan Nama Guru" value='<?php echo (isset($data->fullname)) ? $data->fullname : ""; ?>'>
											<input type="hidden" id="txtGuruId" name="txt_guru_id" value='<?php echo (isset($data->e_id)) ? $data->e_id : ""; ?>'>
											<input type="hidden" id="txtAjarId" name="txt_ajar_id" value='<?php echo (isset($data->da_id)) ? $data->da_id : ""; ?>'>
											<input type="hidden" id="txtEmpId" name="txt_emp_id" value='<?php echo (isset($data->e_id)) ? $data->e_id : ""; ?>'>
									</div>
									<div class="form-group">
										<label for="txtMapel">Bidang Studi:</label>
										<input type="text" disabled class="form-control" id="txtNamaMapel" value='<?php echo (isset($data->mapel)) ? $data->mapel : ""; ?>'>
									</div>
									<div class="form-group">
										<label for="txtMapel">Kelas / Ruangan:</label>
										<select class="form-control select2 select2-hidden-accessible reloadSelectData"  data-select2-id="1" tabindex="-1" aria-hidden="true" name="txt_kls_ruang">
											<option value="">--Pilih Kelas Ruangan--</option>
											<?php 
											$selected = "";
											foreach($kelas as $kls)
											{
												$selected = (isset($data->ruangan_id) && $data->ruangan_id == $kls['id']) ? "selected" : "";
												echo '<option value="'.$kls['dr_id'].'"'.$selected.'>'.$kls['nama_kelas_ruangan'].'</option>';
											}
											?>
										</select>
									</div>	
									<div class="form-group">
										<label for="txtMapel">Tahun Ajaran:</label>
										<select class="form-control select2 select2-hidden-accessible"  data-select2-id="1" tabindex="-1" aria-hidden="true" name="txt_tahun_ajar">
											<option value="">--Pilih Tahun Ajar--</option>
											<?php 
											$selected = "";
											foreach($tahun_ajar as $ta)
											{
												$selected = (isset($data->tahun_ajar_id) && $data->tahun_ajar_id == $ta['id']) ? "selected" : "";
												echo '<option value="'.$ta['id'].'"'.$selected.'>'.$ta['tahun_ajar'].'</option>';
											}
											?>
										</select>
									</div>								
								</div>
								<div class="col-lg-6" style="padding-left: 150px;">
									<div class="box" style="width:200px; ">
									    <img src="" id="img_siswa" alt="" width="200px" />							   
									</div>
								</div>
						</div>
					</div>
	        	</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary" id="submitcategory">Submit</button>
					<a href='<?php echo base_url("data_ajar");?>' class="btn btn-warning" id="submitcategory">Back</a>
				</div>
				</form>
	        </div>
    	</div>	
</section>
