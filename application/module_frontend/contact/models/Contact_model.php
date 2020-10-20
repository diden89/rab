<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {
	
	public function load_header($table,$type)
	{
		$this->db->from($table);
		$this->db->where('is_active', 'Y');
		$this->db->where('type', $type);
		
		return $this->db->get();
	}
	
	public function input_data($table,$data)
	{
		$this->db->set('date','NOW()',FALSE);
		return $this->db->insert($table,$data);
	}
}
