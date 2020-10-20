<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model("services_model","sm");
	}

	public function index($id)
	{
		$this->store_params = array(
			"services" => $this->load_services($id),
			"slider" => $this->load_slider($id)
		);

		$this->view('services_view');
	}

	public function load_services($id)
	{
		$services = $this->sm->load_services($id)->result();
		return $services;
	}
	
	public function load_slider($id)
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

	public function service()
	{
		$url =  $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
		
		$get_menu_id = $this->sm->get_menu($url)->row();
		
		$this->index($get_menu_id->id);
	}

}