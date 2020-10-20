<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_model extends CI_Model {
	public function load_services($id)
	{

		$this->db->select('a.*,b.*');
		$this->db->from('services a');
		$this->db->join('category b', 'a.category_id = b.id');
		// $this->db->where('a.is_active', 'Y');
		$this->db->where('a.menu_id', $id);
		
		return $this->db->get();
	}
	
	public function load_slider($table,$id)
	{
		// $this->db->where('is_active', 'Y');
		$this->db->where('id', $id);
		
		return $this->db->get($table);
	}

	public function get_menu($url)
	{
		$this->db->where('url',$url);   
		
		return $this->db->get('menu');
	}

	public function load_initcap($table, $data)
	{
		$this->db->select($data['select']);
		$this->db->from($table);
		
		if (isset($data['where']))
		{
			$this->db->where($data['where']);   
		}

		return $this->db->get();
	}
}
