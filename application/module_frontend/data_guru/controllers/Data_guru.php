<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_guru extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('data_guru_model','dgm');
		$this->load->library('pagination');
	}

	public function index()
	{
		$get_properties = $this->db_home->get_properties($this->uri->segment(1));

		if ($get_properties && $get_properties->num_rows() > 0)
		{	
			$total_data =  $this->dgm->get_data($limit = "",$start = "")->num_rows();
			//pagination
			//konfigurasi pagination

	        $config['base_url'] = base_url('data_guru/index'); //site url
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
			$get_data = $this->dgm->get_data($config['per_page'],$this->store_params['page']);

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
				'<script src="'.base_url('assets/js/admin').'/data_guru.js"></script>'
			);
			$this->view('data_guru_view');
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

		if( ! empty($this->input->post('data')))
		{
			$start = 0;
			$limit = $this->input->post('data');
		}
		
		// print_r($like);
		// exit;
		
		$data = $this->dgm->get_data($limit,$start,$src,$like);
		
		// echo '<table id="dtHorizontalExampleWrapper" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">';
    	echo '<thead>';	
		echo '<tr role="row">';
		echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
			No
		</th>';
		echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;">
			NIP
				</th>';
		echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;">
					Nama Guru
				</th>';
		echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; ">
					Guru Bidang Studi
				</th>';
       	echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; ">
                Jenis Kelamin
                </th> ';
        echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 70px; ">
                Agama
                </th> '; 
        echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 70px; ">
                Foto
                </th> '; 
        echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; ">
                Action
                </th>    					
			</tr>
        </thead>';
       
		if( ! empty($data->result()))
		{	
		echo '<tbody>';		
			$no = $number_data;
            foreach($data->result() as $dt => $d){
                $img = ( ! empty($d->img)) ? base_url($d->img) : "";
                ?>
                <tr role="row" class="odd">
                <td><?php echo $no; ?></td>
                <td class=""><?php echo $d->nip; ?></td>
                <td class=""><?php echo $d->fullname; ?></td>
                <td class=""><?php echo $d->mapel; ?></td>
                <td class=""><?php echo (($d->jenis_kelamin == 'L') ? 'Laki-Laki' : 'Perempuan'); ?></td>
                <td class=""><?php echo $d->da_caption; ?></td>                        
                <td class=""><img src='<?php echo $img ?>' width="55px"></td>
                <td style="text-align:center;"> 
                <a href="<?php echo base_url('data_guru/cu_action/edit/'.$d->dg_id.'');?>" class="fa btn btn-success fa-pencil"></a>
                <button type="button" onclick="delete_data('<?php echo base_url();?>data_guru/delete/<?php echo $d->dg_id;?>')" class="fa btn btn-danger fa-trash"></a> 
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
				'<script src="'.base_url('assets/js/admin').'/data_guru.js"></script>',
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
			$this->store_params['mapel'] = $this->dgm->get_data_mapel(array('is_active' => 'Y'),'data_mapel')->result_array();
			
			if($cond == 'edit')
			{
				$id = $this->uri->segment(4);
				$get_data_edit = $this->dgm->get_data_edit($id);
				$this->store_params['data'] = $get_data_edit->row();
			}
			
			$this->view('data_guru_input_view');
			
		}
		else
		{
			show_404();
		}
	}

	public function get_menu_option()
	{
		$is_admin = $this->input->post('is_admin');
		$id_parent_menu = ( ! empty($this->input->post('id_parent_menu'))) ? $this->input->post('id_parent_menu') : "";

		$menu_opt = $this->dgm->get_menu($is_admin);
		
		if($menu_opt->num_rows() > 0){ 
	        echo '<option value="">Pilih Induk</option>'; 
	        foreach($menu_opt->result_array() as $row)
	        {
	        	$sel = ($id_parent_menu == $row['id']) ? 'selected' : '';
	        	if($row['parent_id'] != "" || $row['parent_id'] != null)
	        	{
	        		$get_menu_utama = $this->dgm->get_menu_utama($row['parent_id'])->row();
	            	echo '<option value="'.$row['id'].'"'.$sel.'>'.$get_menu_utama->caption.' > '.$row['caption'].'</option>'; 
	        	}
	        	else
	        	{
	        		echo '<option value="'.$row['id'].'"'.$sel.'>'.$row['caption'].'</option>'; 
	        	}
	        } 
	    }else{ 
	        echo '<option value="">No Data</option>'; 
	    } 
	}

	public function input_action()
	{
		
		$data_guru['employee_id'] = $this->input->post('txt_employee_id') ;
	    $data_guru['mapel_id'] = $this->input->post('txt_mapel') ;
	 
	    if( ! empty($this->input->post('txt_id_guru')))
		{
			$id = $this->input->post('txt_id_guru');
            $result = $this->dgm->do_update($data_guru,array('id' =>$id),'data_guru');	            
            echo json_encode(array(
            	"status" => TRUE,
            	"url" => base_url('data_guru')
            ));
		}
		else
		{	
	        $result_kartu = $this->dgm->do_upload($data_guru,'data_guru');	            
            echo json_encode(array(
            	"status" => TRUE,
            	"url" => base_url('data_guru')
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
		$data = $this->dgm->load_data(array('fullname' => $query),'employee');

		if($data->num_rows() > 0)
		{
			echo json_encode($data->result_array());
		}
	}

	public function delete()
	{
		$id = $this->uri->segment(3);

		$get_category = $this->dgm->get_data_edit($id)->row();
		
		$datas['id'] = $get_category->id;
        $datas['category_name'] = $get_category->category_name;
        $datas['is_active'] = $get_category->is_active;
        $datas['type'] = $get_category->type;
      
		$deletecategory = $this->dgm->delete($datas,$id);
		redirect(base_url('category'), 'refresh');
	}
}