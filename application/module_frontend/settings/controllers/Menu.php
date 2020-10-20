<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_model','db_menu');
		$this->load->library('pagination');
	}

	public function index()
	{
		$get_properties = $this->db_home->get_properties($this->uri->segment(1));

		if ($get_properties && $get_properties->num_rows() > 0)
		{	

			$row_properties = $get_properties->row();
			$this->store_params['title'] = $this->store_params['title2'] = $row_properties->m_caption;
			$this->store_params['page_active'] = $row_properties->m_caption;
			$this->store_params['page_icon'] = $row_properties->m_icon;
			// $this->store_params['data'] = $get_data->result();
			$this->store_params['source_top'] = array(
				'<link rel="stylesheet" href="'.base_url('assets/templates/admin').'/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">',
				'<link rel="stylesheet" href="'.base_url('assets/css').'/jquerysctipttop.css">'
			);
			$this->store_params['source_bot'] = array(
				'<script src="'.base_url('assets/templates/admin').'/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>',
				'<script src="'.base_url('assets/js/admin').'/menu.js"></script>',
				'<script src="'.base_url('assets/js/jquery_acollapsetable').'/jquery.aCollapTable.js"></script>'
			);
			$this->view('menu_view');
		}
		else
		{
			show_404();
		}
	}

	public function load_data_menu()
	{
		if (isset($_POST['action']) && $_POST['action'] == 'load_data_menu')
		{
			$post = $this->input->post(NULL, TRUE);
			$load_data_menu = $this->db_menu->get_data($post);

			if ($load_data_menu->num_rows() > 0) 
			{
				$result = $load_data_menu->result();
				$number = 1;

				foreach ($result as $k => $v)
				{

					$v->no = $number;
					$v->img = ( ! empty($v->m_img)) ? base_url($v->m_img) : "";
					$v->url = base_url('settings/menu/cu_action/edit/'.$v->m_id);

					$number++;
				}

				echo json_encode(array('success' => TRUE, 'data' => $result));
			}
			else echo json_encode(array('success' => FALSE, 'msg' => 'Data not found!'));
		}
		else $this->show_404();
	}

	
	public function cu_action($cond)
	{
		$get_properties = $this->db_home->get_properties($this->uri->segment(1));

		if ($get_properties && $get_properties->num_rows() > 0)
		{	
			$row_properties = $get_properties->row();

			$this->store_params['title'] = $this->store_params['title2'] = $row_properties->m_caption;
			$this->store_params['page_active'] = $row_properties->m_caption;
			$this->store_params['page_icon'] = $row_properties->m_icon;
			$this->store_params['source_top'] = array(
				'<link rel="stylesheet" href="'.base_url('assets/templates/admin').'/plugins/summernote/0.8.12/summernote.css">'
			);
			$this->store_params['source_bot'] = array(
				'<script src="'.base_url('assets/templates/admin').'/plugins/summernote/0.8.12/summernote.min.js"></script>',
				'<script src="'.base_url('assets/js/admin').'/menu.js"></script>'
			);
			
			$this->store_params['cond'] = ucwords($cond).' Menu';
			// $this->store_params['datamenu'] = $this->db_menu->get_menu()->result_array();
			
			if($cond !== 'add')
			{
				$id = $this->uri->segment(5);
				$get_data_edit = $this->db_menu->get_data_edit($id);
				$this->store_params['data'] = $get_data_edit->row();
			}
			
			$this->view('menu_input_view');
			
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

		$menu_opt = $this->db_menu->get_menu($is_admin);
		
		if($menu_opt->num_rows() > 0){ 
	        echo '<option value="">Pilih Induk</option>'; 
	        foreach($menu_opt->result_array() as $row)
	        {
	        	$sel = ($id_parent_menu == $row['id']) ? 'selected' : '';
	        	if($row['parent_id'] != "" || $row['parent_id'] != null)
	        	{
	        		$get_menu_utama = $this->db_menu->get_menu_utama($row['parent_id'])->row();
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
		$upload_dir = str_replace('admin'.DIRECTORY_SEPARATOR,'' , FCPATH);
	
		$config['upload_path'] = $upload_dir."assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."compro";
        $config['allowed_types'] ='gif|jpg|png|jpeg';

	    $datas['caption'] = $this->input->post('txt_menu_name');
	    $datas['is_admin'] = $this->input->post('txt_position');
	    $datas['as_guru'] = $this->input->post('txt_member');
	    $datas['as_kepsek'] = $this->input->post('txt_volunteer');
	    $datas['parent_id'] = ($this->input->post('txt_parent_id') == "") ? NULL : $this->input->post('txt_parent_id');
	    $datas['url'] = $this->input->post('txt_url');        
        $datas['description'] = $this->input->post('txt_desc');
        $datas['icon'] = $this->input->post('txt_icon');
        $datas['is_active'] = $this->input->post('txt_status');
      	
       	$this->load->library('upload',$config);

		if( ! empty($this->input->post('txt_id_menu')))
		{
			$old_img = substr($this->input->post('txt_img_old'), 21);

			if($this->upload->do_upload('txt_img'))
			{
				$data = array('upload_data' => $this->upload->data());

	            $image_name	 = $data['upload_data']['file_name']; 
	            $datas['img'] = 'assets/images/compro/'.$image_name; 

	            $id = $this->input->post('txt_id_menu');

	            $result = $this->db_menu->do_update($datas,$id);

	            if($old_img !== 'slider-default.jpg' && $old_img != "")
	            {
	            	unlink($config['upload_path'].DIRECTORY_SEPARATOR.$old_img);
	            }

	            echo json_encode(array(
	            	"status" => $result,
	            	"url" => base_url('settings/menu')
	            ));
			}
			else
			{
	            $id = $this->input->post('txt_id_menu');

	            $result = $this->db_menu->do_update($datas,$id);

	            echo json_encode(array(
	            	"status" => $result,
	            	"url" => base_url('settings/menu')
	            ));
			}

		}
		else
		{	        
	        if($this->upload->do_upload('txt_img')){
	            $data = array('upload_data' => $this->upload->data());	 
	            $image_name	 = $data['upload_data']['file_name']; 
	            $datas['img'] = 'assets/images/compro/'.$image_name; 

	            $result = $this->db_menu->do_upload($datas);

	            echo json_encode(array(
	            	"status" => $result,
	            	"url" => base_url('settings/menu')
	            ));
	        }
	        else
	        {
	        
	            $datas['img'] = 'assets/images/compro/slider-default.jpg';

	            $result = $this->db_menu->do_upload($datas);

	            echo json_encode(array(
	            	"status" => $result,
	            	"url" => base_url('settings/menu')
	            ));
	        }
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
	
	public function delete()
	{
		$id = $this->uri->segment(3);

		$get_category = $this->db_menu->get_data_edit($id)->row();
		
		$datas['id'] = $get_category->id;
        $datas['category_name'] = $get_category->category_name;
        $datas['is_active'] = $get_category->is_active;
        $datas['type'] = $get_category->type;
      
		$deletecategory = $this->db_menu->delete($datas,$id);
		redirect(base_url('category'), 'refresh');
	}
}