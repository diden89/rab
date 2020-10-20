<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('message_model','mm');
		$this->load->library('pagination');
	}

	public function index($id_msg="")
	{
		$get_properties = $this->db_home->get_properties($this->uri->segment(1));

		if ($get_properties && $get_properties->num_rows() > 0)
		{	
			$total_data =  $this->mm->get_data($limit = "",$start = "",$id_msg)->num_rows();

			//pagination
			//konfigurasi pagination

	        $config['base_url'] = base_url('message/index'); //site url
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
	       	$this->store_params['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
	 		$this->store_params['number_data'] = ($this->uri->segment(4)) ? $this->uri->segment(4)+1 : 1;
	       
			$row_properties = $get_properties->row();
			$get_data = $this->mm->get_data($config['per_page'],$this->store_params['page'],$id_msg);

			$this->store_params['pagination'] = $this->pagination->create_links();
			$this->store_params['title'] = $this->store_params['title2'] = $row_properties->caption;
			$this->store_params['page_active'] = $row_properties->caption;
			$this->store_params['page_icon'] = $row_properties->icon;
			$this->store_params['data'] = $get_data->result_array();

			$this->store_params['source_bot'] = array(
				'<script src="'.front_url('assets/js/admin').'/message.js"></script>',
				'<script> function delete_data(delete_url){$("#deleteModal").modal("show", {backdrop: "static"});
      			document.getElementById("deleteMessage").setAttribute("href" , delete_url);
    			}</script>'
			);
			
			// $this->view('modal_projects');
			$this->view('message_view');
		}
		else
		{
			show_404();
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
					'url' => front_url('assets/images/tmp/'.$data['file_name'])
				)));
			}
		}
		else exit('You can\'t access this page!');
	}
	
	public function reply_email($id)
	{

		$get_properties = $this->db_home->get_properties($this->uri->segment(1));

		if ($get_properties && $get_properties->num_rows() > 0)
		{	
			$row_properties = $get_properties->row();

			$this->store_params['title'] = $this->store_params['title2'] = $row_properties->caption;
			$this->store_params['page_active'] = $row_properties->caption;
			$this->store_params['page_icon'] = $row_properties->icon;
			$this->store_params['source_top'] = array(
				'<link rel="stylesheet" href="'.front_url('assets/templates/admin').'/plugins/summernote/0.8.12/summernote.css">'
			);
			$this->store_params['source_bot'] = array(
				'<script src="'.front_url('assets/templates/admin').'/plugins/summernote/0.8.12/summernote.min.js"></script>',
				'<script src="'.front_url('assets/js/admin').'/message.js"></script>'
			);
			
			$this->store_params['cond'] = ucwords('Reply Message');
			// print_r($this->store_params['datamenu']);exit;

			$get_email = $this->mm->get_data_edit($id)->row();

			$email_user = array(
				'id' => $get_email->id,
				'email' => $get_email->email,
				'subject' => 'Re : '.$get_email->subject,
				'first_name' => $get_email->first_name,
				'last_name' => $get_email->last_name,
				'text' => '<br><br>On '.$get_email->date.', '.$get_email->fullname.' wrote :<br><i>'.$get_email->text.'</i>',
			);
			$this->store_params['data'] = $email_user;
			
			$this->view('message_detail_view');
			
		}
		else
		{
			show_404();
		}
	}

	public function input_action()
	{
	    $datas['title'] = $this->input->post('txt_title');
	    $datas['category_id'] = $this->input->post('txt_category');
	    $datas['menu_id'] = $this->input->post('txt_menu');
	    $datas['content'] = $this->input->post('txt_content');
	    $datas['url'] = $this->input->post('txt_url');
        $datas['is_active'] = $this->input->post('txt_status');
      	
       	$id = $this->input->post('txt_id_articles');
       
       	if( ! empty($id))
       	{
       		$result = $this->mm->do_update($datas,$id);

   		  	echo json_encode(array(
            	"status" => $result,
            	"url" => base_url('articles')
            ));
       	}
       	else
       	{
       		$result = $this->mm->do_upload($datas);
            echo json_encode(array(
            	"status" => $result,
            	"url" => base_url('articles')
            ));
       	}
  
	}


	public function show_msg($id)
	{
		$upd_msg = $this->mm->update_message($id);
		return $this->index($id);
	}

	public function send_email()
	{
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "info@iwebebs.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "info@iwebebs.com";
		$config['smtp_pass'] = "P@ssw0rd";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";

		$this->load->library('email',$config);
		$this->email->from('info@iwebebs.com', 'PT. Iwebe Bangun Solusi');
		$email_to = explode(';', $this->input->post('txt_to'));
		$this->email->to($email_to);
		$this->email->subject($this->input->post('txt_subject'));
		$this->email->message(strip_tags($this->input->post('txt_content')));
		if ($this->email->send()) {
			 echo ('<script>
				    window.alert("Email Send..");
				    window.location.href="'.base_url('message').'";
				    </script>');
		} else {
		echo ('<script>
		    window.alert("Email Failed..");
		    window.location.href="'.base_url('message').'";
		    </script>');
		}
	}
	
	public function delete()
	{
		$id = $this->uri->segment(3);

		$get_message = $this->mm->get_data_edit($id)->row();
      
		$deletecategory = $this->mm->delete($id);
		redirect(base_url('message'), 'refresh');
	}


}