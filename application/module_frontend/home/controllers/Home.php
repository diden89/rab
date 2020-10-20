<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct()
	{
		parent::__construct(array(
			'auth' => FALSE
		));
		$this->load->model('home_model','hm');

	}

	public function index()
	{		
		$url = ( ! empty($this->uri->segment(1))) ? $this->uri->segment(1) :'home';

		$get_properties = $this->hm->get_properties($url);
		$this->store_params = array();
		if ($get_properties && $get_properties->num_rows() > 0)
		{	

			// $get_data_penerima = $this->hm->get_data_penerima(5);
			// $get_data_donasi = $this->hm->get_data_donasi(5);

			// $this->store_params = array(
			// 	'header' => $this->load_header(),
			// 	'services' => $this->load_services(),
			// 	'data_penerima' => $get_data_penerima->result_array(),
			// 	'data_donasi' => $get_data_donasi->result(),
				
			// );
			$this->store_params = array(
				'source_bot' => array(
					'<script src="'.base_url('assets/js/frontend').'/home.js"></script>',
				)
			);
			$this->view('home_view');
		}
		else
		{
			show_404();
		}
	}

	public function cek_card_id()
	{
		$card_id = $this->input->post('card_id');

		$get_data = $this->db_home->get_card_data($card_id);

		if($get_data->num_rows() > 0)
		{
			$cetak = $get_data->row();


			echo json_encode(array(
            	"nama" => $cetak->nama_siswa,
            	"id_siswa" => $cetak->ds_id,
            	"kelas" => $cetak->nama_kelas_ruangan,
            	"img" => $cetak->img,
            	"status" => TRUE
            ));

		}
		else
		{
			echo json_encode(array(
            	"status" => FALSE
            ));
		}
	}

	public function input_absen()
	{
		date_default_timezone_set("Asia/Bangkok");

		$status = $this->input->post('status');

		$data['id_siswa'] = $this->input->post('id_siswa');
		$data['tanggal'] = date('Y-m-d');
		if($status == 'masuk')
		{
			$data['jam_masuk'] = date('H:i:s');
			$dataedit['jam_masuk'] = date('H:i:s');
			$abs = "jam_masuk";
			
		}
		else
		{
			$data['jam_pulang'] = date('H:i:s');
			$dataedit['jam_pulang'] = date('H:i:s');
			$abs = "jam_pulang";
			
		}
		$cek['id_siswa'] = $this->input->post('id_siswa');
		$cek['tanggal'] = date('Y-m-d');

		$cek_abs = $this->db_home->cek_absensi($cek,$abs);
		if($cek_abs->num_rows() > 0)
		{
			echo json_encode(array(
            	"status" => FALSE
            ));	
		}
		else
		{
			$before_input = $this->db_home->cek_absensi($data);

			if($before_input->num_rows() > 0)
			{
				$bf_in = $before_input->row();

				$where['id'] = $bf_in->id;
				$where['tanggal'] = $bf_in->tanggal;
				
				// echo $id;exit;
				$update = $this->db_home->do_update($dataedit,$where,'data_absen_siswa');

				if($update)
				{
					echo json_encode(array(
		            	"status" => TRUE
		            ));			
				}
			}
			else
			{				

				$input = $this->db_home->do_upload($data,'data_absen_siswa');

				if($input)
				{
					echo json_encode(array(
		            	"status" => TRUE
		            ));			
				}
			}
		}
	}

	public function load_header()
	{
		$url = (! empty($this->uri->segment(1))) ? $this->uri->segment(1) : 'home';
		
		$get_header = $this->db_home->get_header_home($url);
		$row_header = $get_header->result();

		foreach ($row_header as $k => $v)
		{
			$v->title = ucwords(strtolower($v->title));
			$v->description = ucwords(strtolower($v->description));
		}

		return $row_header;
	}

	public function load_services()
	{
		$get_services = $this->db_home->get_services();
		$row_services = $get_services->result();

		foreach ($row_services as $k => $v)
		{
			$v->caption = ucwords(strtolower($v->caption));
			$v->short_description = ucwords(strtolower($v->short_description));
		}
		
		return $row_services;
	}

	public function load_data_penerima()
	{
		$get_data_penerima = $this->db_home->get_data_penerima();
		$row_data_penerima = $get_data_penerima->result();

		foreach ($row_data_penerima as $k => $v)
		{
			$v->fullname = ucwords(strtolower($v->fullname));
		}
		
		return $row_data_penerima;
	}

	public function load_projects()
	{
		$get_projects = $this->db_home->get_projects();
		$row_projects = $get_projects->result();

		foreach ($row_projects as $k => $v)
		{
			$v->project_name = ucwords(strtolower($v->project_name));
		}

		return $row_projects;
	}

	public function load_filter_projects()
	{
		$get_filter_projects = $this->db_home->get_filter_projects();
		$row_filter_projects = $get_filter_projects->result();

		return $row_filter_projects;
	}

	public function load_team()
	{
		$get_team = $this->db_home->get_team();
		$row_team = $get_team->result();

		foreach ($row_team as $k => $v)
		{
			$v->fullname = ucwords(strtolower($v->fullname));
			$v->position = ucwords(strtolower($v->position));
		}

		return $row_team;
	}

	public function load_news()
	{
		$get_news = $this->db_home->get_news();
		$row_news = $get_news->result();

		return $row_news;
	}

	public function load_products()
	{
		$get_prd = $this->db_home->get_products();
		$row_prd = $get_prd->result();

		// print_r($row_prd);
		// exit;
		return $row_prd;
	}

	public function load_company_legal()
	{
		$get_cmp_lgl = $this->db_home->get_company_legal();
		$row_cmp_lgl = $get_cmp_lgl->result();

		// print_r($row_prd);
		// exit;
		return $row_cmp_lgl;
	}

	public function create_transfer_donate()
	{
		$tgl_skrg = date('Y-m-d');

		$get_data_donasi = $this->db_home->get_data_donate();

		if($get_data_donasi->num_rows() > 0)
		{
			foreach($get_data_donasi->result() as $gd => $gdn)
			{
				$tgldonasi = (strlen($gdn->trf_setiap_tgl) == 2) ? $gdn->trf_setiap_tgl : '0'.$gdn->trf_setiap_tgl;

				$tgl_donasi = date('2020-m-'.$tgldonasi);
				//buat selisih hari 
				$selisih = date('Y-m-d',strtotime('+3 days',strtotime($tgl_skrg)));
				
				if($tgl_donasi == $selisih)
				{
					$data['id_data_donasi'] = $gdn->id;
					$data['tgl_mulai'] = $tgl_skrg;
					$data['tgl_jatuh_tempo'] = $tgl_donasi;

					$cek_duplikat = $this->db_home->cek_duplikat_transfer($data)->num_rows();
					if($cek_duplikat == 0)
					{
						$create = $this->db_home->do_upload($data,'transfer_donasi');
					}
				
				}
				
			}
		}
	}

	

}