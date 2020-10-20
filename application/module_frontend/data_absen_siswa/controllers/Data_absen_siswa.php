<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_absen_siswa extends MY_Controller {
	function __construct()
	{
		parent::__construct(array(
			//kalau mau menghilangkan validasi ganti menjadi FALSE
			'auth' => TRUE
		));
		$this->load->model('data_absen_siswa_model','dasm');
		$this->load->library('pagination');
		date_default_timezone_set("Asia/Bangkok");
	}

	public function index($src = array())
	{
		$get_properties = $this->db_home->get_properties($this->uri->segment(1));

		if ($get_properties && $get_properties->num_rows() > 0)
		{	
			$row_properties = $get_properties->row();
			
			$this->store_params['title'] = $this->store_params['title2'] = $row_properties->caption;
			$this->store_params['page_active'] = $row_properties->caption;
			$this->store_params['page_icon'] = $row_properties->icon;
			$this->store_params['source_top'] = array(
				'<link rel="stylesheet" href="'.base_url('assets/templates/admin').'/bower_components/datatables.net-bs/css/dataTables.bootstrap.css">',
				'<link rel="stylesheet" href="'.base_url('assets/templates/admin').'/plugins/summernote/0.8.12/summernote.css">'
			);
			$this->store_params['source_bot'] = array(
				'<script src="'.base_url('assets/js/admin').'/data_absen_siswa.js"></script>',
				'<script src="'.base_url('assets/templates/admin').'/plugins/summernote/0.8.12/summernote.min.js"></script>',
				'<script src="'.base_url('assets/templates/admin').'/bower_components/datatables.net-bs/js/dataTables.bootstrap.js"></script>',
				'<script> function delete_data(delete_url){$("#deleteModal").modal("show", {backdrop: "static"});
      			document.getElementById("deletedata").setAttribute("href" , delete_url);
    			}</script>',
    			'<script>
    				function showImage(img_src){
    					$("#mymodal").modal("show", {backdrop: "static"});
    					document.getElementById("img01").setAttribute("src" , img_src);
    					// document.getElementById("img01").setAttribute("width" , "500px");
    				}
    			</script>',
    			'<script src="'.base_url('assets/templates/admin').'/bower_components/autocomplete/typeahead.js"></script>',
			);
			// $this->store_params['data'] = $get_data->result();
			$this->store_params['jurusan'] = $this->dasm->get_any_data(array('is_active' => 'Y'),'id','data_jurusan')->result();
			$this->store_params['tahun_ajar'] = $this->dasm->get_any_data(array('is_active' => 'Y'),'id','data_tahun_ajar')->result();
			$this->store_params['jam_pelajaran'] = $this->dasm->get_any_data(array('is_active' => 'Y'),'id','data_jam_mapel')->result();
			// $this->store_params['data_siswa_ajar'] = $this->dasm->get_data_siswa_ajar(array('das.is_active' => 'Y'))->result();
			// print_r($this->store_params['data']);exit;
			// $this->view('modal_projects');
			$this->view('data_absen_siswa_view');
		}
		else
		{
			show_404();
		}
	}

	public function input_action()
	{
    	$siswa_id = $this->input->post('siswa_id');	

    	for($i=0;$i < count($siswa_id);$i++)
    	{
    		$params['siswa_id'] = $siswa_id[$i];
    		$params['kelas_id'] = $this->input->post('txt_kelas_id');
    		$params['ruangan_id'] = $this->input->post('txt_ruangan');
    		$params['tahun_ajar_id'] = $this->input->post('txt_tahun_ajar');

    		$upl = $this->dasm->do_upload($params,'data_absen_siswa');
    	}	

		echo json_encode(array(
        	"status" => TRUE,
        	"url" => base_url('data_absen_siswa')
        ));
		
	}
	
	public function get_data_kelas()
	{

		$query = $this->input->post('query');
		$nama_kelas = $this->dasm->get_data_kelas($query);

		if($nama_kelas->num_rows() > 0)
		{
			foreach($nama_kelas->result_array() as $p)
			{
				$jur[] = $p;
				// $jur[]['dk'] = $p['dk_id'];
			}
		
			echo json_encode($jur);
		}
	}
	public function show_filter_data_ajar()
	{
		$wh= array();
		if(! empty($this->input->post('thn_ajar')))
		{
			$wh['da.tahun_ajar_id'] = $this->input->post('thn_ajar');
		}

		$wh['dg.employee_id'] = $this->session->userdata('emp_id');

		$data = $this->dasm->get_data_ajar($wh)->result();

		if( ! empty($data))
        {   
            $no=1;
            foreach($data as $k => $n)
            {
                echo '<tr>';
                echo '<td>'.$no.'</td>';
                echo '<td>'.$n->tahun_ajar.'</td>';
                echo '<td>'.ucwords($n->mapel).'</td>';
                echo '<td>'.ucwords($n->ruangan_kelas).'</td>';
                ?>
                <td style="text-align: center;">
                    <button type="button" onclick="show_data_siswa('<?php echo $n->da_ruang_id;?>','<?php echo $n->dg_id;?>')" class="fa btn btn-outline-secondary fa-tasks" title="Absen Siswa"></button>
                </td> 
                <?php
                echo '</tr>';
                $no++;
            }

        }
        else
        {
            echo '<tr>';
            echo '<td colspan="8">Tidak Ada Data Siswa!!!</td>';
            echo '</tr>';
        }
	}

	public function get_data_absen_siswa()
	{
		$id_ajar = $this->input->post('id_ajar');
		$guru_id = $this->input->post('guru_id');

		// $cek_input_absen = 
		$data = $this->dasm->get_data_absen_siswa(array('das.ruangan_id' => $id_ajar))->result();

		if( ! empty($data))
		{
			$no=1;
			$vis = "visible";
			foreach($data as $k => $v)
			{
				echo '<tr>';
                echo '<td>'.$no.'</td>';
                echo '<td>'.$v->nisn.'</td>';
                echo '<td>'.ucwords($v->nama_siswa).'</td>';
                echo '<td>'.ucwords($v->ruangan_kelas).'</td>';
                ?>
                <td style="text-align: center;">
                    <button type="button" onclick="ambil_absen_siswa('<?php echo $v->das_id;?>','H','<?php echo $guru_id;?>')" class="fa btn btn-success btn-sm" id="hadir<?php echo $v->das_id;?>" title="Absen Siswa" style="font-size: 8px;">H</button>
                    <button type="button" onclick="ambil_absen_siswa('<?php echo $v->das_id;?>','A','<?php echo $guru_id;?>')" class="fa btn btn-primary btn-sm" id="alpha<?php echo $v->das_id;?>" title="Absen Siswa" style="font-size: 8px;">A</button>
                    <button type="button" onclick="ambil_absen_siswa('<?php echo $v->das_id;?>','I','<?php echo $guru_id;?>')" class="fa btn btn-warning btn-sm" id="izin<?php echo $v->das_id;?>" title="Absen Siswa" style="font-size: 8px;">I</button>
                    <button type="button" onclick="ambil_absen_siswa('<?php echo $v->das_id;?>','S','<?php echo $guru_id;?>')" class="fa btn btn-info btn-sm" id="sakit<?php echo $v->das_id;?>" title="Absen Siswa" style="font-size: 8px;">S</button>
                    <button type="button" onclick="ambil_absen_siswa('<?php echo $v->das_id;?>','TK','<?php echo $guru_id;?>')" class="fa btn btn-danger btn-sm" id="tanpa_keterangan<?php echo $v->das_id;?>" title="Absen Siswa" style="font-size: 8px;">TK</button>
                </td> 
                <?php
                echo '</tr>';
                $no++;
			}
		}
	}

	public function input_absen_to_db()
	{
		$data_ajar_siswa_id = $this->input->post('id_ajar');
		$guru_id = $this->input->post('guru_id');
		$jam_mapel_id = $this->input->post('jam_pel');
		$abs = $this->input->post('abs');
		
		$data['absen_status'] = $this->input->post('abs');
		$data['tanggal_dibuat'] = date('Y-m-d');
		
		$where = array(
			'data_ajar_siswa_id' => $data_ajar_siswa_id,
			'guru_id' => $guru_id,
			// 'jam_mapel_id' => $jam_mapel_id,
			'tanggal_dibuat' => $data['tanggal_dibuat'],
		);

		
		if($abs !== 'H')
		{
			//input pesan untuk sms
			$get_modem = $this->db_home->get_data_modem()->row();
			$gds = $this->dasm->get_data_detail_siswa(array('das.id' => $data_ajar_siswa_id))->row();
			$ggm = $this->dasm->get_guru_mapel(array('dg.id' => $guru_id))->row();

			$data_pesan['DestinationNumber'] = $gds->no_telp; 
			$data_pesan['SenderID'] = $get_modem->ID; 
			$data_pesan['CreatorID'] = 'Gammu 1.28.90';
			$sts_abs = "";
			if($abs == 'S'){$sts_abs = 'Sakit';}
			if($abs == 'A'){$sts_abs = 'Alpha';}
			if($abs == 'I'){$sts_abs = 'Izin';}
			if($abs == 'TK'){$sts_abs = 'Tanpa Keterangan';}

			$date = date('d-m-Y');
			$time = date('H:i:s');
			$day = $this->day_indonesia_format(date('d-m-Y'));

			$text = 'Siswa a.n '.$gds->nama_siswa.' '.$sts_abs.' di jam pelajaran '.$ggm->mapel.' Hari '.$day.' Tanggal '.$date.' Jam '.$time;
			$data_pesan['TextDecoded'] = $text; 
       		
       		$input_pesan = $this->dasm->do_upload($data_pesan,'outbox');
		}
		
       	//end kirim pesan

		$cek_data = $this->dasm->cek_data_input_absen_mapel($where);
		if($cek_data->num_rows() > 0)
		{
			$dt = $cek_data->row();
			$id_abs_mapel = $dt->id;

			$data['data_ajar_siswa_id'] = $data_ajar_siswa_id;
			$data['guru_id'] = $guru_id;
			$data['jam_mapel_id'] = $jam_mapel_id;

			$upd = $this->dasm->do_update($data,$id_abs_mapel,'data_absen_mapel');

			return $this->load_view_absen_mapel($guru_id);
		}
		else
		{
			$data['data_ajar_siswa_id'] = $data_ajar_siswa_id;
			$data['guru_id'] = $guru_id;
			$data['jam_mapel_id'] = $jam_mapel_id;

			$upl = $this->dasm->do_upload($data,'data_absen_mapel');
			return $this->load_view_absen_mapel($guru_id);
		}
	}	
	public function load_view_absen_mapel($guru_id="")
	{
		if($guru_id == "")
		{
			$guru_id = $this->input->post('guru_id');
			$dr_id = $this->input->post('dr_id');
			$where['das.ruangan_id'] = $dr_id;
		}
		$where['dam.guru_id'] = $guru_id;
		$where['dam.tanggal_dibuat'] = date('Y-m-d');
		$data = $this->dasm->get_data_absen_mapel($where,'dam.tanggal_dibuat');
		if($data->num_rows() > 0)
		{
			$no=1;
			foreach($data->result() as $k => $v)
			{
				if($v->absen_status == 'H')
				{
					$abs_sts = 'Hadir';
				}
				elseif($v->absen_status == 'I')
				{
					$abs_sts = 'Izin';	
				}
				elseif($v->absen_status == 'A')
				{
					$abs_sts = 'Alpha';	
				}
				elseif($v->absen_status == 'S')
				{
					$abs_sts = 'Sakit';	
				}
				else
				{
					$abs_sts = 'Tanpa Keterangan';	
				}
				if(date('N',strtotime($v->tanggal_dibuat)) == '1'){$hari = 'Minggu';}
				elseif(date('N',strtotime($v->tanggal_dibuat)) == '2'){$hari = 'Senin';}
				elseif(date('N',strtotime($v->tanggal_dibuat)) == '3'){$hari = 'Selasa';}
				elseif(date('N',strtotime($v->tanggal_dibuat)) == '4'){$hari = 'Rabu';}
				elseif(date('N',strtotime($v->tanggal_dibuat)) == '5'){$hari = 'Kamis';}
				elseif(date('N',strtotime($v->tanggal_dibuat)) == '6'){$hari = 'Jum\'at';}
				elseif(date('N',strtotime($v->tanggal_dibuat)) == '7'){$hari = 'Sabtu';}

				echo '<tr>';
				echo '<td>'.$no.'</td>';
				echo '<td>'.$hari.", ".date('d-m-Y', strtotime($v->tanggal_dibuat)).'</td>';
				echo '<td>'.$v->djm_caption.'</td>';
				echo '<td>'.$v->nisn.'</td>';
				echo '<td>'.$v->nama_siswa.'</td>';
				echo '<td>'.$v->ruangan_kelas.'</td>';
				echo '<td>'.$abs_sts.'</td>';
				echo '</tr>';
				$no++;
			}
		}
		else
		{
			echo '<tr>
                  	<td colspan="7">Belum Ada Data Absen!!!</td>
                  </tr>';
		}
	}

	public function get_select_kelas()
	{

		$id_jur = $this->input->post('id_jurusan');
		$nama_kelas = $this->dasm->get_any_data(array('jurusan_id' => $id_jur),'nama_kelas','data_kelas');

		if($nama_kelas->num_rows() > 0)
		{	
			echo '<option value="">--Pilih Kelas--</option>';
			foreach($nama_kelas->result() as $nk => $n)
			{
				echo '<option value="'.$n->id.'">'.$n->nama_kelas.'</option>';
			}
	
		}
	}

	public function get_select_ruangan()
	{

		$id_kelas = $this->input->post('id_kelas');
		$nama_ruangan = $this->dasm->get_any_data(array('kelas_id' => $id_kelas),'nama_ruangan','data_ruangan');

		if($nama_ruangan->num_rows() > 0)
		{	
			echo '<option value="">--Pilih Ruangan--</option>';
			foreach($nama_ruangan->result() as $nk => $n)
			{
				echo '<option value="'.$n->id.'">'.$n->nama_ruangan.'</option>';
			}
	
		}
	}
	public function show_data_siswa()
	{

		$id_kelas = $this->input->post('id_kelas');
		$id_jur = $this->input->post('id_jurusan');

		$cek_data_absen_siswa = $this->dasm->get_any_data(array('kelas_id' => $id_kelas),"",'data_absen_siswa');
		if($cek_data_absen_siswa->num_rows() > 0)
		{
			foreach ($cek_data_absen_siswa->result() as $k => $v) 
			{
				$data_id_siswa_ajar['siswa_id'][] = $v->siswa_id;				
			}

			$get_data_siswa = $this->dasm->get_data_siswa_other($data_id_siswa_ajar,array('ds.kelas_id' => $id_kelas,'ds.jurusan_id' => $id_jur));

			if($get_data_siswa->num_rows() > 0)
			{	
				$no=1;
				foreach($get_data_siswa->result() as $nk => $n)
				{
					echo '<tr>';
					echo '<td>'.$no.'</td>';
					echo '<td>'.$n->nisn.'</td>';
					echo '<td>'.ucwords($n->nama_siswa).'</td>';
					echo '<td>'.strtoupper($n->nama_kelas).'</td>';
					echo '<td style="width:50px;text-align:center;"><input type="checkbox" value="'.$n->ds_id.'" name="siswa_id[]"></td>';
					echo '</tr>';
					$no++;
				}

			}
			else
			{
				echo '<tr>';
				echo '<td colspan="5">Tidak Ada Data Siswa!!!</td>';
				echo '</tr>';
			}
		}
		else
		{
			$data_siswa = $this->dasm->get_data_siswa(array('ds.kelas_id' => $id_kelas,'ds.jurusan_id' => $id_jur));

			if($data_siswa->num_rows() > 0)
			{	
				$no=1;
				foreach($data_siswa->result() as $nk => $n)
				{
					echo '<tr>';
					echo '<td>'.$no.'</td>';
					echo '<td>'.$n->nisn.'</td>';
					echo '<td>'.ucwords($n->nama_siswa).'</td>';
					echo '<td>'.strtoupper($n->nama_kelas).'</td>';
					echo '<td style="width:50px;text-align:center;"><input type="checkbox" value="'.$n->ds_id.'" name="siswa_id[]"></td>';
					echo '</tr>';
					$no++;
				}		
			}
			else
			{
				echo '<tr>';
				echo '<td colspan="5">Tidak Ada Data Siswa!!!</td>';
				echo '</tr>';
			}
		}
	}

	public function delete()
	{
		$id = $this->uri->segment(3);

		$del = $this->dasm->delete('data_absen_siswa',array('id' => $id));
		redirect(base_url('data_absen_siswa'), 'refresh');
	}

	public function delete_image()
	{
		$id = $this->input->post('id_berkas');
		$id_data_absen_siswa = $this->input->post('id_pendonor');

		$upload_dir = str_replace('admin'.DIRECTORY_SEPARATOR,'' , FCPATH);
		$img_path = $upload_dir."assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."berkas_pendonor";

		$get_img = $this->dasm->get_img_berkas(array('id' => $id))->row();

		$old_img = substr($get_img->path_berkas, 30);
		
      	unlink($img_path.DIRECTORY_SEPARATOR.$old_img);
	    $delete_img_berkas = $this->dasm->del_img_berkas(array('id' =>$id));

	    $berkas = $this->dasm->get_img_berkas(array('id_pendonor' => $id_data_absen_siswa));

	    if($berkas->num_rows() > 0)
	    {
	    	$j=1;
			$c = count($berkas->result_array());
			foreach ($berkas->result_array() as $f) {							
				$nama_berkas = (isset($f["nama_berkas"])) ? $f["nama_berkas"] : "";
				$id_berkas = (isset($f["id"])) ? $f["id"] : "";
				$path_berkas = (isset($f["path_berkas"])) ? base_url($f["path_berkas"]) : "";

				echo '<section class="col-lg-6 connectedSortable ui-sortable after-add-input"">';
             		echo '<div class="form-group">';
						echo '<label for="txtemail">Nama Berkas:</label>';
							echo '<input type="text" class="form-control"  name="txt_nama_berkas[]" placeholder="Nama Berkas (ex : SKTM, Surat Kematian Orangtua)...." 
							value="'.$nama_berkas.'">';
							echo '<input type="hidden" id="txtIdBerkas" name="txt_id_berkas[]" value="'.$id_berkas.'">';
					echo '</div>';
					echo '<div class="form-group">';
						echo '<label for="txtemail">Berkas:</label>';
							echo '<input type="file" id="txtFile" name="txt_file[]">';
							echo '<img onclick="showImage("'.$path_berkas.'")" src="'.$path_berkas.'" style="width:100%;max-width: 100px">';
							echo '<input type="hidden" id="txt_file_old" value="'.$path_berkas.'">';
					echo '</div>';
					if($j == $c) {
					 echo '<button class="btn btn-default fa fa-trash remove-child" type="button" onclick="removedataberkas(this,'.$id_berkas.')"></button>';
					 echo '<button class="btn btn-success add-input fa fa-plus" type="button"></button>';
					}
					else
					{
						echo '<button class="btn btn-default fa fa-trash remove-child" type="button" onclick="removedataberkas(this,'.$id_berkas.')"></button>';
					}
					
				echo '</section>';
			$j++;
			}
	    }
	    // redirect(base_url('data_absen_siswa/cu_action/edit/'.$id_data_absen_siswa), 'refresh');
	}
}