<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="data_siswa box">
	<div class="row">
		<form id="formInputDataSiswa" autocomplete="off">
	        <div class="col-lg-12 col-md-24">
	        	<div class="nav-tabs-custom">
	        		<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_1" data-toggle="tab">Data Siswa</a></li>
						<li><a href="#tab_2" data-toggle="tab">Data Orang Tua</a></li>
						<li><a href="#tab_3" data-toggle="tab">Data Kartu Absen</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_1">
							<div class="box-body pad">
								<div class="form-group">
									<label for="txtNisn">NISN:</label>
										<input type="text" class="form-control" id="txtNisn" name="txt_nisn" placeholder="Masukan NISN Siswa" value='<?php echo (isset($data->ds_nisn)) ? $data->ds_nisn : ""; ?>' required>
										<input type="hidden" id="txtIdSiswa" name="txt_id_siswa" value='<?php echo (isset($data->ds_id)) ? $data->ds_id : ""; ?>'>
										<input type="hidden" id="txtIdOrtu" name="txt_id_ortu" value='<?php echo (isset($data->do_id)) ? $data->do_id : ""; ?>' >
										<input type="hidden" id="txtKelasId" name="txt_kelas_id" value='<?php echo (isset($data->kelas_id)) ? $data->kelas_id : ""; ?>' >
								</div>
								<div class="form-group">
									<label for="txtNamaSiswa">Nama Siswa:</label>
										<input type="text" class="form-control" id="txtNamaSiswa" name="txt_nama_siswa" placeholder="Masukan Nama Siswa" value='<?php echo (isset($data->nama_siswa)) ? $data->nama_siswa : ""; ?>'>
								</div>
								<div class="form-group">
									<label for="txtTempatLahir">Tempat Lahir:</label>
										<input type="text" class="form-control" id="txtTempatLahir" name="txt_tempat_lahir" placeholder="Masukan Tempat Lahir" value='<?php echo (isset($data->tempat_lahir)) ? $data->tempat_lahir : ""; ?>'>
								</div>
								<div class="form-group">
									<label for="txtTanggalLahir">Tanggal Lahir:</label>
										<input type="text" class="form-control datepicker" id="txtTanggalLahir" name="txt_tanggal_lahir" placeholder="Masukan Tempat Lahir" value='<?php echo (isset($data->tanggal_lahir)) ? date("d-m-Y",strtotime($data->tanggal_lahir))  : ""; ?>'>
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
									<label for="txtTanggalLahir">Agama:</label>
										<select name="agama" class="form-control" style="width:200px;">
											<?php if(isset($data->jenis_kelamin))
											{
												if($data->agama == 'islam')
												{
													echo '<option value="" >--Pilih--</option>';
													echo '<option value="islam" selected>Islam</option>';
													echo '<option value="kristen_protestan">Kristen Protestan</option>';
													echo '<option value="kristen_katolik">Kristen Katolik</option>';
													echo '<option value="hindu">Hindu</option>';
													echo '<option value="budha">Budha</option>';
												}
												elseif($data->agama == 'kristen_protestan')
												{
													echo '<option value="" >--Pilih--</option>';
													echo '<option value="islam" >Islam</option>';
													echo '<option value="kristen_protestan" selected>Kristen Protestan</option>';
													echo '<option value="kristen_katolik">Kristen Katolik</option>';
													echo '<option value="hindu">Hindu</option>';
													echo '<option value="budha">Budha</option>';
												}
												elseif($data->agama == 'kristen_katolik')
												{
													echo '<option value="" >--Pilih--</option>';
													echo '<option value="islam" >Islam</option>';
													echo '<option value="kristen_protestan" >Kristen Protestan</option>';
													echo '<option value="kristen_katolik" selected>Kristen Katolik</option>';
													echo '<option value="hindu">Hindu</option>';
													echo '<option value="budha">Budha</option>';
												}
												elseif($data->agama == 'hindu')
												{
													echo '<option value="" >--Pilih--</option>';
													echo '<option value="islam" >Islam</option>';
													echo '<option value="kristen_protestan" >Kristen Protestan</option>';
													echo '<option value="kristen_katolik" >Kristen Katolik</option>';
													echo '<option value="hindu" selected>Hindu</option>';
													echo '<option value="budha">Budha</option>';
												}
												elseif($data->agama == 'budha')
												{
													echo '<option value="" >--Pilih--</option>';
													echo '<option value="islam" >Islam</option>';
													echo '<option value="kristen_protestan" >Kristen Protestan</option>';
													echo '<option value="kristen_katolik" >Kristen Katolik</option>';
													echo '<option value="hindu" >Hindu</option>';
													echo '<option value="budha" selected>Budha</option>';
												}
												else
												{
													echo '<option value="" >--Pilih--</option>';
													echo '<option value="islam" >Islam</option>';
													echo '<option value="kristen_protestan" >Kristen Protestan</option>';
													echo '<option value="kristen_katolik" >Kristen Katolik</option>';
													echo '<option value="hindu" >Hindu</option>';
													echo '<option value="budha">Budha</option>';
												}
											}
											else
											{
												echo '<option value="" >--Pilih--</option>';
												echo '<option value="islam" >Islam</option>';
												echo '<option value="kristen_protestan" >Kristen Protestan</option>';
												echo '<option value="kristen_katolik" >Kristen Katolik</option>';
												echo '<option value="hindu" >Hindu</option>';
												echo '<option value="budha">Budha</option>';
											}
											?>
										</select>
								</div>
								<div class="form-group">
									<label for="txtAlamat">Alamat Lengkap:</label>
									<textarea name="txt_alamat" class="textarea" placeholder="Masukan content" style="width: 100%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ><?php echo (isset($data->ds_alamat_siswa)) ? $data->ds_alamat_siswa : ""; ?></textarea>
								</div>
								<div class="form-group">
				                    <label>Jurusan :</label>
				                    <select class="form-control select2 select2-hidden-accessible"  data-select2-id="1" tabindex="-1" aria-hidden="true" id="TxtJurusan" name="txt_jurusan" style="width: auto;">
				                        <option value="">--Pilih Jurusan--</option>
				                        <?php foreach($jurusan as $k => $v)
				                        {
				                        	$selected = "";
				                        	if($data->jurusan_id == $v->id)
				                        	{
				                        		$selected = 'selected';
				                        	}
				                            echo '<option value="'.$v->id.'" '.$selected.'>'.$v->nama_jurusan.'</option>';
				                        }?>
				                    </select>
				                    
				                </div>
				                <div class="form-group">
				                    <label>Kelas :</label>
				                    <select class="form-control select2 select2-hidden-accessible"  data-select2-id="1" tabindex="-1" aria-hidden="true" id="TxtKelas" name="txt_kelas" style="width: auto;">
				                        <option value="">--Pilih Kelas--</option>
				                    </select>
				                    
				                </div>
								<div class="form-group">
									<label for="txtImg">Foto:</label>
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
						</div>
						<div class="tab-pane" id="tab_2">
							<div class="box-body pad">
								<div class="form-group">
									<label for="txtNamaAyah">Nama Ayah:</label>
										<input type="text" class="form-control" id="txtNamaAyah" name="txt_nama_ayah" placeholder="Masukan Nama Ayah" value='<?php echo (isset($data->nama_ayah)) ? $data->nama_ayah : ""; ?>'>
								</div>
								<div class="form-group">
									<label for="txtNamaIbu">Nama Ibu:</label>
										<input type="text" class="form-control" id="txtNamaIbu" name="txt_nama_ibu" placeholder="Masukan Nama Ibu" value='<?php echo (isset($data->nama_ibu)) ? $data->nama_ibu : ""; ?>'>
								</div>
								<div class="form-group">
									<label for="TxtNoTelp">No Telp:</label>
										<input type="text" class="form-control" id="TxtNoTelp" name="txt_no_telp" placeholder="Masukan No Telp" value='<?php echo (isset($data->no_telp)) ? $data->no_telp : ""; ?>'>
								</div>
								<div class="form-group">
									<label for="txtAlamat">Alamat Lengkap:</label>
									<textarea name="txt_alamat_orangtua" class="textarea" placeholder="Masukan content" style="width: 100%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ><?php echo (isset($data->do_alamat)) ? $data->do_alamat : ""; ?></textarea>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="tab_3">
							<div class="box-body pad">
								<div class="form-group">
									<label for="txtNoKartu">Nomor Kartu:</label>
										<input type="text" class="form-control" id="txtNoKartu" name="txt_card_id" placeholder="Scan Kartu Anda" value='<?php echo (isset($data->card_id)) ? $data->card_id : ""; ?>'>
										<input type="hidden" id="txtNoKartu" name="txt_kartu_id" value='<?php echo (isset($data->dk_id)) ? $data->dk_id : ""; ?>'>
								</div>
							</div>
						</div>
					</div>
	        	</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary" id="submitcategory">Submit</button>
					<a href='<?php echo base_url("data_siswa");?>' class="btn btn-warning" id="submitcategory">Back</a>
				</div>
				</form>
	        </div>
    	</div>	
</section>
