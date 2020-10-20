<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('company_model','sm');
		$this->load->library('pagination');
	}

	public function index()
	{
		$get_properties = $this->db_home->get_properties($this->uri->segment(1));

		if ($get_properties && $get_properties->num_rows() > 0)
		{	
			$total_data =  $this->sm->get_data($limit = "",$start = "")->num_rows();
			//pagination
			//konfigurasi pagination

	        $config['base_url'] = base_url('company/index'); //site url
	        $config['total_rows'] = $total_data; //total row
	        $config['per_page'] = 5;  //show record per halaman
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
	        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 

			$row_properties = $get_properties->row();
			$get_data = $this->sm->get_data($config['per_page'],$this->store_params['page']);

			$this->store_params['pagination'] = $this->pagination->create_links();
			// print_r($this->store_params['pagination']);exit;
			$this->store_params['title'] = $this->store_params['title2'] = $row_properties->caption;
			$this->store_params['page_active'] = $row_properties->caption;
			$this->store_params['page_icon'] = $row_properties->icon;
			$this->store_params['source_top'] = array(
				'<link rel="stylesheet" href="'.base_url('assets/templates/admin').'/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">'
			);
			$this->store_params['source_bot'] = array(
				'<script src="'.base_url('assets/js/admin').'/company.js"></script>',
				'<script src="'.base_url('assets/templates/admin').'/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>',
			);
			$company = $get_data->row();
			$this->store_params['data'] = $get_data->row();
			$this->store_params['contact'] = $this->sm->get_contact($company->id)->result();
			$this->store_params['contact_type'] = $this->sm->get_contact_type()->result();

			// $this->view('modal_projects');
			$this->view('company_view');
		}
		else
		{
			show_404();
		}
	}

	public function input_action()
	{
		$upload_dir = str_replace('admin'.DIRECTORY_SEPARATOR,'' , FCPATH);
	
		$config['upload_path'] = $upload_dir."assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."compro";
        // $config['allowed_types'] ='gif|jpg|png';

        $datas['fullname'] = $this->input->post('txt_fullname');
        $datas['owner'] = $this->input->post('txt_owner');
        $datas['address'] = $this->input->post('txt_address');
        
        $id = $this->input->post('id_company');

        $post['c_type'] = $this->input->post('c_type');
        $post['c_detail'] = $this->input->post('c_detail');
        $post['c_url'] = $this->input->post('c_url');
        $post['c_message'] = $this->input->post('c_message');
        $post['c_id'] = $this->input->post('c_id');

        for($i=0;$i < count($post['c_type']);$i++)
        {
        	if( ! empty($post['c_id'][$i]))
        	{
        		$new_array = array(
        			'c_type' => $post['c_type'][$i],
        			'company_id' => $id,
        			'c_detail' => $post['c_detail'][$i],
        			'c_url' => $post['c_url'][$i],
        			'c_message' => $post['c_message'][$i],
        		);
        		$upd_contact = $this->sm->update_contact($new_array,$post['c_id'][$i]);
        	}
        	else
        	{
        		if( ! empty($post['c_type'][$i]))
        		{
	        		$new_array = array(
	        			'c_type' => $post['c_type'][$i],
	        			'company_id' => $id,
	        			'c_detail' => $post['c_detail'][$i],
	        			'c_url' => $post['c_url'][$i],
	        			'c_message' => $post['c_message'][$i],
	        		);
        			$ins_contact = $this->sm->insert_contact($new_array);
        		}
        	}
        }
        
		$this->load->library('upload',$config);

		if( ! empty($this->input->post('id_company')))
		{
			$old_img = substr($this->input->post('txt_img_old'), 21);
			// unlink($config['upload_path'].DIRECTORY_SEPARATOR.$old_img);

			if($this->upload->do_upload('txt_img'))
			{

				$data = array('upload_data' => $this->upload->data());

	            $image_name	 = $data['upload_data']['file_name']; 
	            $datas['img'] = 'assets/images/compro/'.$image_name; 

	            // $id = $this->input->post('id_company');

	            $result = $this->sm->do_update($datas,$id);

	            if($old_img !== 'favicon-default.ico')
	            {
	            	unlink($config['upload_path'].DIRECTORY_SEPARATOR.$old_img);
	            }
	            
	            echo json_encode(array(
	            	"status" => $result,
	            	"url" => base_url('company')
	            ));
			}
			else
			{
	            // $id = $this->input->post('id_company');

	            $result = $this->sm->do_update($datas,$id);

	            // foreach($)
	            echo json_encode(array(
	            	"status" => $result,
	            	"url" => base_url('company')
	            ));
			}

		}
  
	}

	public function delete_contact()
	{
		$id = $this->input->post('id');
		$delete = $this->sm->delete_contact($id);

		if($delete)
		{
			echo json_encode(array(
            	"status" => $delete,
            	"url" => base_url('company')
            ));
		}
		else
		{
			echo json_encode(array(
            	"status" => $delete,
            	"url" => base_url('company')
            ));
		}
	}
}