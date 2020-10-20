<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="project box">
	<div class="row">
	<form id="formInputEmployee" autocomplete="off">
	    <div class="col-lg-12 col-md-24">
	    	<div class="nav-tabs-custom">
	    		<ul class="nav nav-tabs">
					<li class="active"><a href="#tab_1" data-toggle="tab">Data Karyawan</a></li>
					<li><a href="#tab_2" data-toggle="tab">Data Login</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tab_1">
						<div class="box-body pad">
							<div class="form-group">
								<label for="txtNip">NIP:</label>
								<input type="text" class="form-control" id="txtNip" name="txt_nip" placeholder="Masukan NIP" value='<?php echo (isset($data->nip)) ? $data->nip : ""; ?>'>
								<input type="hidden" name="txt_employee_id" value="<?php echo (isset($data->e_id)) ? $data->e_id : ""; ?>">
							</div>
							<div class="form-group">
								<label for="txtTitle">Nama Lengkap:</label>
								<input type="text" class="form-control" id="txtFullname" name="txt_fullname" placeholder="Masukan Nama Lengkap" value='<?php echo (isset($data->fullname)) ? $data->fullname : ""; ?>'>
							</div>
							<div class="form-group">
								<label for="txturl">Tempat Lahir:</label>
								<input type="text" class="form-control"  id="txtpob" name="txt_pob" placeholder="Tempat Lahir" value='<?php echo (isset($data->pob)) ? $data->pob : ""; ?>'>
							</div>
							<div class="form-group">
								<label for="txturl">Tanggal Lahir:</label>
								<input type="text" class="form-control datepicker" style="width:200px;" id="txtUrl" name="txt_dob" placeholder="Tanggal Lahir ex 01-01-1970" value='<?php echo (isset($data->dob)) ? date('d-m-Y', strtotime($data->dob)) : ""; ?>'>
							</div>
							<div class="form-group">
									<label for="txtTanggalLahir">Jenis Kelamin:</label>
										<select name="jenis_kelamin" class="form-control" style="width:200px;">
											<?php if(isset($data->jenis_kelamin))
											{
												if($data->jenis_kelamin == 'L')
												{
													echo '<option value="" >--Pilih--</option>';
													echo '<option value="L" selected>Laki-laki</option>';
													echo '<option value="P">Perempuan</option>';
												}
												elseif($data->jenis_kelamin == 'P')
												{
													echo '<option value="" >--Pilih--</option>';
													echo '<option value="L" >Laki-laki</option>';
													echo '<option value="P" selected>Perempuan</option>';
												}
												else
												{
													echo '<option value="" >--Pilih--</option>';
													echo '<option value="L" >Laki-laki</option>';
													echo '<option value="P">Perempuan</option>';
												}
											}
											else
											{
												echo '<option value="" >--Pilih--</option>';
												echo '<option value="L" >Laki-laki</option>';
												echo '<option value="P">Perempuan</option>';
											}
											?>
										</select>
								</div>
							<div class="form-group">
								<label for="txtDesc">Alamat:</label>
								<textarea id="txtAdd" name="txt_add" class="textarea" placeholder="Masukan Alamat" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo (isset($data->address)) ? $data->address : ""; ?></textarea>
							</div>
							<div class="form-group">
								<label for="txtSort">Pendidikan:</label>
								<select class="form-control select2 select2-hidden-accessible" style="width: 20%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="txt_edu">
									<option value="">--Pilih Pendidikan--</option>
									<?php 
									$selected = "";
									foreach($education as $ed)
									{
										$selected = (isset($data->ed_caption) && $data->ed_id == $ed['id']) ? "selected" : "";
										echo '<option value="'.$ed['id'].'"'.$selected.'>'.$ed['caption'].'</option>';
									}
									?>
									
								</select>
							</div>
							<div class="form-group">
								<label for="txtSort">Jabatan:</label>
								<select class="form-control select2 select2-hidden-accessible" style="width: 20%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="txt_pos">
									<option value="">--Pilih Jabatan--</option>
									<?php 
									$selected = "";
									foreach($position as $pos)
									{
										$selected = (isset($data->p_caption) && $data->p_id == $pos['id']) ? "selected" : "";
										echo '<option value="'.$pos['id'].'"'.$selected.'>'.$pos['caption'].'</option>';
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="txtSort">Agama:</label>
								<select class="form-control select2 select2-hidden-accessible" style="width: 20%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="txt_agama">
									<option value="">--Pilih Agama--</option>
									<?php 
									$selected = "";
									foreach($agama as $ag)
									{
										$selected = (isset($data->id_agama) && $data->id_agama == $ag['id']) ? "selected" : "";
										echo '<option value="'.$ag['id'].'"'.$selected.'>'.$ag['caption'].'</option>';
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="txtphone">No Telp:</label>
								<input type="text" class="form-control"  id="txtPhone" name="txt_phone" placeholder="Masukan Nomor Telpon" value='<?php echo (isset($data->phone)) ? $data->phone : ""; ?>'>
							</div>
							<div class="form-group">
								<label for="txtemail">Email:</label>
								<input type="text" class="form-control"  id="txtEmail" name="txt_email" placeholder="Masukan Email" value='<?php echo (isset($data->email)) ? $data->email : ""; ?>'>
							</div>
							<div class="form-group">
								<label for="txtImg">Foto:</label>
								<input type="file" id="txtImg" name="txt_img" value='<?php echo (isset($data->img)) ? $data->img : ""; ?>'>
								<?php 
								if (isset($data->img)) { 
									$url_img = $data->img;
				              		?>
									<img src="<?php echo base_url().$url_img;?>" width="300px">
								<?php } ?>
								<input type="hidden" name="txt_img_old" value="<?php echo (isset($data->img)) ? $data->img : ""; ?>">
							</div>
						</div>
					</div>
					<div class="tab-pane" id="tab_2">
						<div class="box-body pad">
							<div class="form-group">
								<label for="txtUsername">Username:</label>
								<input type="text" class="form-control" id="txtUsername" name="txt_username" placeholder="Masukan Username.." value='<?php echo (isset($data->username)) ? $data->username : ""; ?>'>
								<input type="hidden" name="txt_ud_id" value='<?php echo (isset($data->ud_id)) ? $data->ud_id : ""; ?>'>
							</div>
							<div class="form-group">
								<label for="txtPassword">Password:</label>
								<input type="password" class="form-control" id="txtPassword" name="txt_password" placeholder="Masukan Password .." value='<?php echo (isset($data->ori_password)) ? $data->ori_password : ""; ?>'>
							</div>
							<div class="form-group">
								<label for="txtSubGroup">Sub Group:</label>
								<select class="form-control select2 select2-hidden-accessible" style="width: 20%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="txt_sub_group">
									<option value="">--Pilih Sub Group--</option>
									<?php 
									$selected = "";
									foreach($sub_group as $sg)
									{
										$selected = (isset($data->sub_group) && $data->sub_group == $sg['id']) ? "selected" : "";
										echo '<option value="'.$sg['id'].'"'.$selected.'>'.$sg['usg_caption'].'</option>';
									}
									?>
								</select>
							</div>
						</div>
					</div>
				</div>
	    	</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-primary" id="submitemployee">Submit</button>
				<a href='<?php echo base_url("employee");?>' class="btn btn-warning" id="submitemployee">Back</a>
			</div>
		</form>
    </div>
</section>
