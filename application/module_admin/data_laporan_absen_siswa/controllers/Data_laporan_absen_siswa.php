<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_laporan_absen_siswa extends MY_Controller {
	function __construct()
	{
		parent::__construct(array(
			//kalau mau menghilangkan validasi ganti menjadi FALSE
			'auth' => TRUE
		));
		$this->load->model('data_laporan_absen_siswa_model','dlasm');
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
				'<link rel="stylesheet" href="'.front_url('assets/templates/admin').'/bower_components/datatables.net-bs/css/dataTables.bootstrap.css">',
				'<link rel="stylesheet" href="'.front_url('assets/templates/admin').'/plugins/summernote/0.8.12/summernote.css">',
				'<link rel="stylesheet" href="'.front_url('assets/templates/admin').'/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">',
				'<style>
					.datepicker{z-index:-1151;}
				</style>'
			);
			$this->store_params['source_bot'] = array(
				'<script src="'.front_url('assets/js/admin').'/data_laporan_absen_siswa.js"></script>',
				'<script src="'.front_url('assets/templates/admin').'/plugins/summernote/0.8.12/summernote.min.js"></script>',
				'<script src="'.front_url('assets/templates/admin').'/bower_components/datatables.net-bs/js/dataTables.bootstrap.js"></script>',
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
    			'<script src="'.front_url('assets/templates/admin').'/bower_components/autocomplete/typeahead.js"></script>',
    			'<script src="'.front_url('assets/templates/admin').'/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>',
				'<script type="text/javascript">
					 $(function(){
					  $("#datepicker").datepicker({
					      format: "dd-mm-yyyy",
					      autoclose: true,
					      todayHighlight: true,

					  });
					 });
					</script>',
			);
			// $this->store_params['data'] = $get_data->result();
			$this->store_params['jurusan'] = $this->dlasm->get_any_data(array('is_active' => 'Y'),'id','data_jurusan')->result();
			$this->store_params['tahun_ajar'] = $this->dlasm->get_any_data(array('is_active' => 'Y'),'id','data_tahun_ajar')->result();
			$this->store_params['jam_pelajaran'] = $this->dlasm->get_any_data(array('is_active' => 'Y'),'id','data_jam_mapel')->result();
			// $this->store_params['data_siswa_ajar'] = $this->dlasm->get_data_siswa_ajar(array('das.is_active' => 'Y'))->result();
			// print_r($this->store_params['data']);exit;
			// $this->view('modal_projects');
			$this->view('data_laporan_absen_siswa_view');
		}
		else
		{
			show_404();
		}
	}
	public function get_select_kelas() //dipakai
	{

		$id_jur = $this->input->post('id_jurusan');
		$nama_kelas = $this->dlasm->get_data_kelas(array('jurusan_id' => $id_jur),'dk.nama_kelas');

		if($nama_kelas->num_rows() > 0)
		{	
			$no=1;
			foreach($nama_kelas->result() as $nk => $n)
			{
				echo "<tr>";
				echo "<td>".$no."</td>";
				echo "<td>".$n->nama_kelas_jurusan."</td>";
				?>
				<td style="text-align:center;">
					<button class="btn btn-primary btn-sm fa fa-bars" onclick="show_ruangan_kelas('<?php echo $n->dk_id;?>')"></button>
				</td>
				<?php
				echo "</tr>";

				$no++;
			}
	
		}
	}

	public function get_select_ruangan()//dipakai	
	{

		$id_kelas = $this->input->post('id_kelas');
		$nama_ruangan = $this->dlasm->get_data_kelas_ruangan(array('kelas_id' => $id_kelas),'dr.nama_ruangan');

		if($nama_ruangan->num_rows() > 0)
		{	
			$no=1;
			foreach($nama_ruangan->result() as $nk => $n)
			{
				echo "<tr>";
				echo "<td>".$no."</td>";
				echo "<td>".$n->nama_kelas_ruangan."</td>";
				echo "<td style='text-align:center;width:105px;'>".$n->jml_siswa."</td>";
				?>
				<td style="text-align:center;">
					<button class="btn btn-primary btn-sm fa fa-bars" onclick="show_data_absen_siswa('<?php echo $n->dr_id;?>')"></button>
				</td>
				<?php
				echo "</tr>";

				$no++;
			}
	
		}
	}
	public function load_report_absen_siswa() //dipakai
	{
		$id_ruangan = $this->input->post('ruangan_id');
		$date = ( ! empty($this->input->post('tanggal')) ? $this->input->post('tanggal') : date('Y-m-d'));
		$get_mapel = $this->dlasm->get_mapel_ruangan(array('das.ruangan_id' => $id_ruangan,'dam.tanggal_dibuat' => $date))->result();	
			echo '<thead >';
            echo '<tr role="row">';
                echo '<th rowspan="2">No</th>';
                echo '<th rowspan="2">Hari / Tanggal</th>';
                echo '<th rowspan="2">NISN</th>';
                echo '<th rowspan="2">Nama Siswa</th>';
                echo '<th rowspan="2">Masuk</th>';
                echo '<th rowspan="2">Pulang</th>';
                echo '<th colspan="'.count($get_mapel).'" style="text-align:center;">Mata Pelajaran</th>';
                		echo '<tr>';
                	$sel = 'ds.nisn,ds.nama_siswa,dam.tanggal_dibuat,dass.jam_masuk,dass.jam_pulang,';
                	$a=0;
                	foreach($get_mapel as $k => $v)
                	{
                		echo '<th style="text-align:center;">'.$v->mapel.'</th>';
                		$sel .= '(select absen_status from data_absen_mapel dam  
								left join data_guru dg on dg.id = dam.guru_id 
								where dam.data_ajar_siswa_id = das.id and dg.mapel_id = "'.$v->dm_id.'" and tanggal_dibuat = "'.$date.'")  as mp'.$a.',';
								$a++;
                	}                                 
                		echo '</tr>';
            echo '</thead>';
               $sel .= 'ds.is_active';
               
			$get_data_siswa = $this->dlasm->get_data_siswa_ajar(array('das.ruangan_id' => $id_ruangan,'dam.tanggal_dibuat' => $date,'dass.tanggal' => $date),$sel)->result_array();
			echo '<tbody>';
			// print_r($get_data_siswa);exit;
			// echo count($get_mapel).'asdasdasd';exit;
			$no=1;
			if( ! empty($get_data_siswa))
			{
				foreach($get_data_siswa as $v)
				{
					echo '<tr>';
					echo '<td>'.$no.'</td>';
					echo '<td>'.$this->day_indonesia_format($v["tanggal_dibuat"]).', '.date('d-m-Y',strtotime($v["tanggal_dibuat"])).'</td>';
					echo '<td>'.$v["nisn"].'</td>';
					echo '<td>'.$v["nama_siswa"].'</td>';
					echo '<td>'.$v["jam_masuk"].'</td>';
					echo '<td>'.$v["jam_pulang"].'</td>';
					for($i=0;$i < count($get_mapel);$i++)
					{
						echo '<td style="text-align:center;">'.$v["mp".$i].'</td>';
					}
					echo '</tr>';
					$no++;
				}

			}
			else
			{
				echo '<tr>';
				echo '<td colspan="7" style="text-align:center;">Tidak Ada Data!!!</td>';
				echo '</tr>';
			}
			echo '</tbody>';
	}

	
}