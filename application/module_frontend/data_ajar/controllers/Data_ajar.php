<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ajar extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('data_ajar_model','dam');
		$this->load->library('pagination');
	}

	public function index()
	{
		$get_properties = $this->db_home->get_properties($this->uri->segment(1));

		if ($get_properties && $get_properties->num_rows() > 0)
		{	
			$total_data =  $this->dam->get_data($limit = "",$start = "")->num_rows();
			//pagination
			//konfigurasi pagination

	        $config['base_url'] = base_url('data_ajar/index'); //site url
	        $config['total_rows'] = $total_data; //total row
	        $config['per_page'] = 10;  //show record per halaman
	        $config["uri_segment"] = 3;  // uri parameter
	        $choice = $config["total_rows"] / $config["per_page"];
	        $config["num_links"] = floor($choice);

	         // Membuat Style pagination untuk BootStrap v4
	     	$config['first_link']       = 'First';
	        $config['last_link']        = 'Last';
	        $config['next_link']        = 'Next';
	        $config['prev_link']        = 'Prev';
	        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	        $config['full_tag_close']   = '</ul></nav></div>';
	        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	        $config['num_tag_close']    = '</span></li>';
	        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['prev_tagl_close']  = '</span>Next</li>';
	        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	        $config['first_tagl_close'] = '</span></li>';
	        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['last_tagl_close']  = '</span></li>';
	 
	        $this->pagination->initialize($config);
	       	$this->store_params['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	 		$this->store_params['number_data'] = ($this->uri->segment(3)) ? $this->uri->segment(3)+1 : 1;
	       
			$row_properties = $get_properties->row();
			$get_data = $this->dam->get_data($config['per_page'],$this->store_params['page']);

			$this->store_params['pagination'] = $this->pagination->create_links();
			$this->store_params['title'] = $this->store_params['title2'] = $row_properties->caption;
			$this->store_params['page_active'] = $row_properties->caption;
			$this->store_params['page_icon'] = $row_properties->icon;
			$this->store_params['data'] = $get_data->result();
			$this->store_params['source_top'] = array(
				'<link rel="stylesheet" href="'.base_url('assets/templates/admin').'/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">'
			);
			$this->store_params['source_bot'] = array(
				'<script src="'.base_url('assets/templates/admin').'/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>',
				'<script src="'.base_url('assets/js/admin').'/data_ajar.js"></script>',
				'<script> function delete_data(delete_url){$("#deleteModal").modal("show", {backdrop: "static"});
      			document.getElementById("deletedata").setAttribute("href" , delete_url);
    			}</script>',
			);
			$this->store_params['tahun_ajar'] = $this->dam->get_any_data("",'data_tahun_ajar')->result_array();
			$this->view('data_ajar_view');
		}
		else
		{
			show_404();
		}
	}

	public function search_data()
	{
		$src = "";
		$like = array();
		$start = "";
		$limit = "";

		if( ! empty($this->input->post('searchdata')))
		{
			$like = $this->input->post('searchdata');
		}

		if( ! empty($this->input->post('data')) && $this->input->post('data') !== 'all')
		{
			$src['ta.id'] = $this->input->post('data');
		}
		
		// print_r($like);
		// exit;
		
		$data = $this->dam->get_data($limit,$start,$src,$like);
		
		// echo '<table id="dtHorizontalExampleWrapper" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">';
    	echo '<thead>';	
		echo '<tr role="row">';
		echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
			No
		</th>';
		echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;">
			Tahun Ajaran
				</th>';
		echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;">
			NIP
				</th>';
		echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;">
					Nama Guru
				</th>';
		echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; ">
					Nama Kelas / Ruangan
				</th>';
		echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; ">
					Bidang Studi
				</th>';
        echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; ">
                Action
                </th>    					
			</tr>
        </thead>';
       
		if( ! empty($data->num_rows() > 0))
		{	
		echo '<tbody>';		
			$no = 1;
            foreach($data->result() as $dt => $d){
                ?>
                <tr role="row" class="odd">
                <td><?php echo $no; ?></td>
                <td class=""><?php echo $d->tahun_ajar; ?></td>
                <td class=""><?php echo $d->nip; ?></td>
                <td class=""><?php echo $d->fullname; ?></td>
                <td class=""><?php echo $d->nama_kelas_ruangan; ?></td>
                <td class=""><?php echo $d->mapel; ?></td>
                <td style="text-align:center;"> 
                <a href="<?php echo base_url('data_ajar/cu_action/edit/'.$d->da_id.'');?>" class="fa btn btn-success fa-pencil"></a>
                <button type="button" onclick="delete_data('<?php echo base_url();?>data_ajar/delete/<?php echo $d->da_id;?>')" class="fa btn btn-danger fa-trash"></a> 
                </td>
                </tr>
                <?php 
                $no++;
            }
            echo '</tbody>';
		}
		else
		{
			echo '<tbody>';
			echo '<tr role="row" class="odd">';
			echo '<td colspan="8" style="text-align:center;">Data Tidak Ditemukan !!!</td>';
			echo '</tr>';
			echo '</tbody>';
		}
		
		// echo '</table>';

		// $this->index($src);
	}


	public function cu_action($cond)
	{
		$get_properties = $this->db_home->get_properties($this->uri->segment(1));

		if ($get_properties && $get_properties->num_rows() > 0)
		{	
			$row_properties = $get_properties->row();

			$this->store_params['title'] = $this->store_params['title2'] = $row_properties->caption;
			$this->store_params['page_active'] = $row_properties->caption;
			$this->store_params['page_icon'] = $row_properties->icon;
			$this->store_params['source_top'] = array(
				'<link rel="stylesheet" href="'.base_url('assets/templates/admin').'/plugins/summernote/0.8.12/summernote.css">',
				'<link rel="stylesheet" href="'.base_url('assets/templates/admin').'/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">',
				'<style>
					.datepicker{z-index:-1151;}
				</style>'
			);
			$this->store_params['source_bot'] = array(
				'<script src="'.base_url('assets/templates/admin').'/plugins/summernote/0.8.12/summernote.min.js"></script>',
				'<script src="'.base_url('assets/js/admin').'/data_ajar.js"></script>',
				'<script src="'.base_url('assets/templates/admin').'/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>',
				'<script type="text/javascript">
					 $(function(){
					  $("#txtTanggalLahir").datepicker({
					      format: "dd-mm-yyyy",
					      autoclose: true,
					      todayHighlight: true,

					  });
					 });
				</script>',
				'<script src="'.base_url('assets/templates/admin').'/bower_components/autocomplete/typeahead.js"></script>',

			);
			
			$this->store_params['cond'] = ucwords($cond).' Data Siswa';
			$this->store_params['mapel'] = $this->dam->get_data_mapel(array('is_active' => 'Y'),'data_mapel')->result_array();
			$this->store_params['kelas'] = $this->dam->get_data_kelas(array('dr.is_active' => 'Y'))->result_array();
			$this->store_params['tahun_ajar'] = $this->dam->get_any_data("",'data_tahun_ajar')->result_array();
			
			if($cond == 'edit')
			{
				$id = $this->uri->segment(4);
				$get_data_edit = $this->dam->get_data_edit($id);
				$this->store_params['data'] = $get_data_edit->row();
			}
			
			$this->view('data_ajar_input_view');
			
		}
		else
		{
			show_404();
		}
	}

	public function input_action()
	{
		// print_r($_POST);exit;
		$data_ajar['guru_id'] = $this->input->post('txt_guru_id') ;
	    $data_ajar['ruangan_id'] = $this->input->post('txt_kls_ruang') ;
	    $data_ajar['tahun_ajar_id'] = $this->input->post('txt_tahun_ajar') ;
	 
	    if( ! empty($this->input->post('txt_ajar_id')))
		{
			$id = $this->input->post('txt_ajar_id');
            $result = $this->dam->do_update($data_ajar,array('id' =>$id),'data_ajar');	            
            echo json_encode(array(
            	"status" => TRUE,
            	"url" => base_url('data_ajar')
            ));
		}
		else
		{	
	        $result = $this->dam->do_upload($data_ajar,'data_ajar');	            
            echo json_encode(array(
            	"status" => TRUE,
            	"url" => base_url('data_ajar')
            ));
        }
	}

	public function store_image()
	{
		if ($this->input->post('action') !== FALSE && $this->input->post('action') == 'store_image')
		{
			$config['upload_path'] = UPLOADPATH.'images'.DS.'tmp'.DS;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['remove_spaces']  = TRUE;
			$config['encrypt_name']  = TRUE;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('image'))
			{
				print(json_encode(array(
					'success' => false,
					'msg' => $this->upload->display_errors()
				)));
			}
			else
			{
				$data = $this->upload->data();

				print(json_encode(array(
					'success' => true,
					'url' => base_url('assets/images/tmp/'.$data['file_name'])
				)));
			}
		}
		else exit('You can\'t access this page!');
	}
	
	public function autocomplete_data()
	{
		$query = $this->input->post('query');
		$data = $this->dam->load_data(array('e.fullname' => $query));

		if($data->num_rows() > 0)
		{
			echo json_encode($data->result_array());
		}
	}

	public function reload_select_option()
	{
		$guru_id = $this->input->post('guru_id');
		$mapel_id = $this->input->post('mapel_id');

		$data = $this->dam->get_any_data(array('guru_id' => $guru_id),'data_ajar');

		if($data->num_rows() > 0)
		{
			$data_guru = $this->dam->get_any_data(array('mapel_id' => $mapel_id),'data_guru')->result();

			foreach ($data_guru as $key => $value) 
			{
				$data_guru_mapel['guru_id'][] = $value->id;
			}
			$data_ajar = $this->dam->get_data_ajar_where_in($data_guru_mapel);

			if($data_ajar->num_rows() > 0)
			{
				foreach ($data_ajar->result() as $k => $v) 
				{
					$data_ajar_ruangan['ruangan_id'][] = $v->ruangan_id;
				}

				$kelas = $this->dam->get_data_kelas_ajar($data_ajar_ruangan)->result_array();

				echo '<option value="">--Pilih Kelas Ruangan--</option>';
				foreach($kelas as $kel)
				{
					echo '<option value="'.$kel["dr_id"].'">'.$kel["nama_kelas_ruangan"].'</option>';
				}	
			}
			// else
			// {
			// 	$kelas = $this->dam->get_data_kelas("","")->result();
			// 	echo '<option value="">--Pilih Kelas Ruangan--</option>';
			// 	foreach ($kelas as $k => $v) 
			// 	{
			// 		echo '<option value="'.$v->dr_id.'">'.$v->nama_kelas_ruangan.'</option>';
			// 	}				
			// }
		}
		else
		{
			$data_guru = $this->dam->get_any_data(array('mapel_id' => $mapel_id),'data_guru')->result();
			foreach ($data_guru as $key => $value) 
			{
				$data_guru_mapel['guru_id'][] = $value->id;
			}
			$data_ajar = $this->dam->get_data_ajar_where_in($data_guru_mapel);

			if($data_ajar->num_rows() > 0)
			{
				foreach ($data_ajar->result() as $k => $v) 
				{
					$data_ajar_ruangan['ruangan_id'][] = $v->ruangan_id;
				}

				$kelas = $this->dam->get_data_kelas_ajar($data_ajar_ruangan)->result_array();

				echo '<option value="">--Pilih Kelas Ruangan--</option>';
				foreach($kelas as $kel)
				{
					echo '<option value="'.$kel["dr_id"].'">'.$kel["nama_kelas_ruangan"].'</option>';
				}	
			}
			else
			{
				$kelas = $this->dam->get_data_kelas_ajar($data_ajar_ruangan)->result_array();

				echo '<option value="">--Pilih Kelas Ruangan--</option>';
				foreach($kelas as $kel)
				{
					echo '<option value="'.$kel["dr_id"].'">'.$kel["nama_kelas_ruangan"].'</option>';
				}
			}
		}
	}

	public function reload_select_mapel()
	{
		$emp_id = $this->input->post('txt_emp_id');

		$data = $this->dam->get_data_select_mapel(array('dg.employee_id' => $emp_id));

		if($data->num_rows() > 0)
		{
			echo '<option value="">--Pilih Bidang Studi--</option>';
			foreach ($data->result() as $k => $v) 
			{
				echo '<option value="'.$v->dg_id.'">'.$v->mapel.'</option>';
			}
		}
		else
		{
			$data = $this->dam->get_data_select_mapel();
			echo '<option value="">--Pilih Bidang Studi--</option>';
			foreach ($data->result() as $k => $v) 
			{
				echo '<option value="'.$v->dg_id.'">'.$v->mapel.'</option>';
			}
		}
	}

	public function delete()
	{
		$id = $this->uri->segment(3);
      
		$deletecategory = $this->dam->delete('data_ajar',array('id' =>$id));
		redirect(base_url('data_ajar'), 'refresh');
	}
}