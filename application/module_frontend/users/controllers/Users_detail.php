<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users_detail extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('users_model','um');
		$this->load->library('pagination');
	}

	public function index()
	{
		$get_properties = $this->db_home->get_properties($this->uri->segment(1));

		if ($get_properties && $get_properties->num_rows() > 0)
		{	
			$total_data =  $this->um->get_data($limit = "",$start = "")->num_rows();
			//pagination
			//konfigurasi pagination

	        $config['base_url'] = base_url('users/index'); //site url
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
			$get_data = $this->um->get_data($config['per_page'],$this->store_params['page']);

			$this->store_params['pagination'] = $this->pagination->create_links();
			$this->store_params['title'] = $this->store_params['title2'] = $row_properties->caption;
			$this->store_params['page_active'] = $row_properties->caption;
			$this->store_params['page_icon'] = $row_properties->icon;
			$this->store_params['source_top'] = array(
				'<link rel="stylesheet" href="'.base_url('assets/templates/admin').'/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">'
			);
			$this->store_params['source_bot'] = array(
				'<script src="'.base_url('assets/js/admin').'/users.js"></script>',
				'<script> function delete_data(delete_url){$("#deleteModal").modal("show", {backdrop: "static"});
      			document.getElementById("deleteusers").setAttribute("href" , delete_url);
    			}</script>',
    			'<script>
    				function showImage(img_src){
    					$("#mymodal").modal("show", {backdrop: "static"});
    					document.getElementById("img01").setAttribute("src" , img_src);
    					// document.getElementById("img01").setAttribute("width" , "500px");
    				}
    			</script>'
			);
			$this->store_params['data'] = $get_data->result_array();

			// $this->view('modal_projects');
			$this->view('users_view');
		}
		else
		{
			show_404();
		}
	}


	
}