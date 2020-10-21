<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {
	private $_header = array();

	function __construct()
	{
		parent::__construct(array(
			'auth' => FALSE
		));
	}

	public function index()
	{
		$this->_view('auth_view');
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
				redirect('');
			}
			else
			{
				$this->_header['msg'] = 'Data is invalid';

				$this->_view_auth('auth_view');
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

	private function _view_auth($view)
	{
		$this->_header['title'] = isset($this->_header['title']) ? $this->_header['title'] : TITLE;
		
		$this->load->view($view, $this->_header);
	}
}