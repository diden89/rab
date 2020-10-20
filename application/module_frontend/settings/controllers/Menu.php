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
					
					$number++;
				}

				echo json_encode(array('success' => TRUE, 'data' => $result));
			}
			else echo json_encode(array('success' => FALSE, 'msg' => 'Data not found!'));
		}
		else $this->show_404();
	}

	public function popup_modal()
	{
		$post = $this->input->post(NULL, TRUE);

		if (isset($post['action']) && ! empty($post['action']) && $post['action'] == 'popup_modal')
		{
			unset($post['action']);
			$data = $this->db_menu->get_data(array('m_id' => $post['id']));			

			if($data->num_rows() > 0)
			{
				$data2 = $data->row();
				$parent_id = ($data2->m_parent_id !== "") ? $data2->m_parent_id : "";
				$post['data'] = $data2;
			}
			else
			{
				$parent_id = "";
			}
			$post['option'] = $this->_build_data($parent_id);
			
			$this->_view('menu_popup_modal_view', $post);
		}
		else $this->show_404();
	}

	public function _build_data($id = "")
	{
		$get_menu_list = $this->db_menu->get_menu(array('m_is_active' => 'Y'));
		$tree_menu_list = $this->_buildTree($get_menu_list->result(),$id);

		return $tree_menu_list;
	}

	public function _buildTree($datas, $sel_id = "", $parent_id = NULL, $idx = 0) 
	{
	    $str_menu = FALSE;

		if ($parent_id == '' || $parent_id == ' ' || $parent_id == NULL || $parent_id == 0 || empty($parent_id))
		{
			$parent_id = NULL;
		}

		$idx++;

		foreach ($datas as $data)
		{
			$dash = ($parent_id !== NULL) ? str_repeat('>', $idx) .' ' :'';
			$sel = ($data->m_id == $sel_id) ? 'selected' : '';
			if ($data->m_parent_id == $parent_id)
			{
				$children = $this->_buildTree($datas, $sel_id, $data->m_id, $idx);

				if ($children !== FALSE)
				{

					$str_menu .= '
							<option value="'.$data->m_id.'" '.$sel.'>'.$dash.$data->m_caption.'</option>
						';	

					if ($idx > 0)
					{
						$str_menu .= $children;
					}
				
				}
				else
				{
					
					if($parent_id != NULL)
					{
						$str_menu .= '
							<option value="'.$data->m_id.'" '.$sel.'>'.$dash.$data->m_caption.'</option>
						';	
					}
					else
					{

						$str_menu .= '
							<option value="'.$data->m_id.'" '.$sel.'>'.$data->m_caption.'</option>
						';	

					}	
				}
			}
		}

		return $str_menu;
	}

	public function store_data()
	{

	    $datas['m_caption'] = $this->input->post('m_caption');
	    $datas['m_parent_id'] = ($this->input->post('txt_parent_id') == "") ? NULL : $this->input->post('txt_parent_id');
	    $datas['m_url'] = $this->input->post('m_url');        
        $datas['m_description'] = $this->input->post('m_description');
        $datas['m_icon'] = $this->input->post('m_icon');
      	

		if( ! empty($this->input->post('txt_id_menu')))
		{		
            $id = $this->input->post('txt_id_menu');

            $result = $this->db_menu->do_update($datas,$id);
            echo json_encode(array(
            	"status" => $result,
            	"url" => base_url('settings/menu')
            ));
		}
		else
		{	 
			$result = $this->db_menu->do_upload($datas);
            echo json_encode(array(
            	"status" => $result,
            	"url" => base_url('settings/menu')
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