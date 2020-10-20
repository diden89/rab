<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('news_model','nm');
		$this->load->library('pagination');
	}

	public function index()
	{
		$get_properties = $this->db_home->get_properties($this->uri->segment(1));

		if ($get_properties && $get_properties->num_rows() > 0)
		{	
			$total_data =  $this->nm->get_data($limit = "",$start = "")->num_rows();
			//pagination
			//konfigurasi pagination

	        $config['base_url'] = base_url('news/index'); //site url
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
			$get_data = $this->nm->get_data($config['per_page'],$this->store_params['page']);

			$this->store_params['pagination'] = $this->pagination->create_links();
			// print_r($this->store_params['pagination']);exit;
			$this->store_params['title'] = $this->store_params['title2'] = $row_properties->caption;
			$this->store_params['page_active'] = $row_properties->caption;
			$this->store_params['page_icon'] = $row_properties->icon;
			$this->store_params['source_bot'] = array(
				'<script src="'.front_url('assets/js/admin').'/news.js"></script>',
				'<script> function deletenews(delete_url){$("#deleteModal").modal("show", {backdrop: "static"});
      			document.getElementById("deleteNews").setAttribute("href" , delete_url);
    			}</script>',
			);
			$this->store_params['data'] = $get_data->result_array();

			// $this->view('modal_projects');
			$this->view('news_view');
		}
		else
		{
			show_404();
		}
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
				'<link rel="stylesheet" href="'.front_url('assets/templates/admin').'/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">'
			);
			$this->store_params['source_bot'] = array(
				'<script src="'.front_url('assets/templates/admin').'/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>',
				'<script src="'.front_url('assets/js/admin').'/news.js"></script>'
			);
			
			if($cond !== 'add')
			{
				$id = $this->uri->segment(4);
				
				$this->store_params['category'] = $this->nm->get_category()->result_array();

				$get_data_edit = $this->nm->get_data_edit($id);
				$this->store_params['data'] = $get_data_edit->row();
		
				$this->store_params['cond'] = ucwords($cond).' News';
			}
			else
			{
				$this->store_params['cond'] = ucwords($cond).' News';
				$this->store_params['category'] = $this->nm->get_category()->result_array();
			}


			$this->view('news_input_view');
			
		}
		else
		{
			show_404();
		}
	}

	public function input_action()
	{
		$upload_dir = str_replace('admin'.DIRECTORY_SEPARATOR,'' , FCPATH);
	
		$config['upload_path'] = $upload_dir."assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."news";
        $config['allowed_types'] ='gif|jpg|png';
        $config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);

		$datas['title'] = $this->input->post('txt_title');
        $datas['author'] =  $this->session->userdata('username');
        $datas['date'] = date('Y-m-d H:i:s');
        $datas['category_id'] = $this->input->post('cat_id');
        $datas['description'] = $this->input->post('txt_desc');
        $datas['is_active'] = $this->input->post('txt_status');

		if( ! empty($this->input->post('txt_news_id')))
		{
			$old_img = substr($this->input->post('txt_img_old'), 19);
			// unlink($config['upload_path'].DIRECTORY_SEPARATOR.$old_img);

			if($this->upload->do_upload('txt_img'))
			{
				$data = array('upload_data' => $this->upload->data());
	 
	            $image_name	 = $data['upload_data']['file_name']; 
	            $datas['image'] = 'assets/images/news/'.$image_name; 

	            $id = $this->input->post('txt_news_id');

	            $result = $this->nm->do_update($datas,$id);

	            unlink($config['upload_path'].DIRECTORY_SEPARATOR.$old_img);

	            echo json_encode(array(
	            	"status" => $result,
	            	"url" => base_url('news')
	            ));
			}
			else
			{
	            $id = $this->input->post('txt_news_id');

	            $result = $this->nm->do_update($datas,$id);

	            echo json_encode(array(
	            	"status" => $result,
	            	"url" => base_url('news')
	            ));
			}

		}
		else
		{	        
	        if($this->upload->do_upload('txt_img')){
	            $data = array('upload_data' => $this->upload->data());

	            $image_name	 = $data['upload_data']['file_name']; 
	            $datas['image'] = 'assets/images/news/'.$image_name; 

	            $result = $this->nm->do_upload($datas);

	            echo json_encode(array(
	            	"status" => $result,
	            	"url" => base_url('news')
	            ));
	        }
	        else
	        {
	        	$datas['project_name'] = $this->input->post('txt_pro_name');
	            $datas['location'] = $this->input->post('txt_loc');
	            $datas['category_id'] = $this->input->post('cat_id');
	            $datas['description'] = $this->input->post('txt_desc');
	            $datas['front'] = ( ! empty($this->input->post('txt_front'))) ? $this->input->post('txt_front') : '0';

	            // $datas['img'] = 'assets/images/news/default.jpg';

	            $result = $this->nm->do_upload($datas);

	            echo json_encode(array(
	            	"status" => $result,
	            	"url" => base_url('news')
	            ));
	        }
		}
  
	}

	public function delete()
	{
		$id = $this->uri->segment(3);

		$upload_dir = str_replace('admin'.DIRECTORY_SEPARATOR,'' , FCPATH);
		$img_path = $upload_dir."assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."news";

		$get_news = $this->nm->get_data_edit($id)->row();

        $old_img = substr($get_news->image, 19);

       	unlink($img_path.DIRECTORY_SEPARATOR.$old_img);
       
		$deleteNews = $this->nm->delete($id);
		
		 redirect(base_url('news'), 'refresh');
	}
}