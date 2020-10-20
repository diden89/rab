<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {
	function __construct()
	{
		parent::__construct(array(
			'auth' => FALSE
		));
		$this->load->model("contact_model","cm");

	}

	public function index()
	{
		$url =  $this->uri->segment(1);

		$this->store_params = array(
			"contact" => $this->load_footer(),
			"header" => $this->load_header(),
			"image" => $this->get_captcha('idx'),
		);

		$this->view('contact_view');
	}

	public function load_header($url="")
	{
		$url = (! empty($this->uri->segment(1))) ? $this->uri->segment(1) : 'home';
		
		$get_header = $this->db_home->get_header($url);
		$row_header = $get_header->result();

		foreach ($row_header as $k => $v)
		{
			$v->caption = ucwords(strtolower($v->caption));
			$v->description = ucwords(strtolower($v->description));
		}

		return $row_header;
	}

	public function send_message()
	{
		date_default_timezone_set("Asia/Jakarta");

		$captcha = strtoupper($this->input->post('captcha'));
		if($captcha === strtoupper($this->session->userdata('contactcaptcha')))
		{
			$msg = array(
			"first_name" => $this->input->post('fname'),
			"last_name" => $this->input->post('lname'),
			"email" => $this->input->post('email'),
			"subject" => $this->input->post('subject'),
			"text" => $this->input->post('message')
			);
			// print_r($msg);
			// exit;

			$insert = $this->cm->input_data('message',$msg);

			if($insert)
			{
				echo json_encode(array(
            	"status" => $insert,
            	"url" => base_url('contact'),
            	"msg" => 'Message Has Been Send'
           	));
			}
		}
		else
		{
			echo json_encode(array(
	            	"status" => FALSE,
	            	"url" => base_url('contact'),
	            	"msg" => 'Wrong Captcha'
	            ));
		}
		
	}

	public function get_captcha($idx = "")
	{
		$vals = array(
            'img_path'	 => './assets/captcha/',
            'img_url'	 => base_url().'assets/captcha/',
            'img_width'	 => '180',
            // 'img_height' => '50',
            // 'font_size' => '100',
            'word_length' => 5,
            'border' => 0, 
            'expiration' => 7200,
            'colors'     => array(
                'background' => array(180, 230, 131),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(200, 140, 40)
        	)
        );

        // create captcha image
        $cap = create_captcha($vals);
       	
       	$this->session->set_userdata('contactcaptcha', $cap['word']);

       	if($idx === 'idx')
       	{
       		return $cap['image'];
       	}
       	else
       	{
       		echo $cap['image'];
       	}
	}
}