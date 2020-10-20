<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {
	private $_header = array();

	function __construct()
	{
		parent::__construct(array(
			'auth' => FALSE
		));

		$this->load->model("auth_model","am");
	}

	public function index()
	{
		$type = $this->uri->segment(1);
		$this->store_params = array(
			"header" => $this->load_header($type)
		);

		$this->view('auth_view');
	}

	public function login()
	{

		if (isset($_POST['action']) && $_POST['action'] == 'login')
		{
			$post = $this->input->post(NULL, TRUE);
			
			$login = $this->validate_login($post);
			
			$result = array();
			
			if ($login['success'] !== FALSE)
			{
				redirect('member/home_member');
			}
			else
			{
				$this->_header['msg'] = 'Data is invalid';

				$type = $this->uri->segment(1);
				$this->store_params = array(
					"header" => $this->load_header($type)
				);
				$this->view('auth_view');
			}
		}
		else
		{
			show_404();
		}
	}

	public function logout()
	{
		$this->do_logout();
	}

	private function _view($view)
	{
		$this->_header['title'] = isset($this->_header['title']) ? $this->_header['title'] : TITLE;
		
		$this->load->view($view, $this->_header);
	}

	public function load_header($type="")
	{
		$url = 'home';
		
		$get_header = $this->db_home->get_header($url);
		$row_header = $get_header->result();

		foreach ($row_header as $k => $v)
		{
			$v->caption = "Login Member";
			$v->description = "Silahkan Login Disini";
		}

		return $row_header;
	}
}