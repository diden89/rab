<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Services_model extends CI_Model {
	
	public function get_data($limit,$start)
	{
		$this->db->select('a.*,b.url');
		$this->db->from('services a');
		$this->db->join('menu b', 'a.menu_id = b.id','left');
		if( ! empty($limit))
		{
			$this->db->limit($limit,$start);
		}

		return $this->db->get();
	}

	public function get_data_edit($id)
	{	
		$this->db->select('a.*');	
		$this->db->from('services a');
		$this->db->join('menu b', 'a.menu_id = b.id','left');
		$this->db->where('a.id', $id);
		return $this->db->get();
	}
	
	public function get_category()
	{
		$this->db->where('is_active', 'Y');
		$this->db->where('type', 'services');
		return $this->db->get('category');
	}
	
	public function get_data_menu()
	{
		// $this->db->where('is_active', 'Y');
		// $this->db->where('is_active', 'Y');
		// $this->db->where('is_admin', 'N');
		// return $this->db->get('menu');

		return $this->db->query('select * from menu where parent_id = (select id from menu where url = "services" and is_admin = "N" and is_active = "Y") and is_admin = "N" and is_active = "Y" ');
	}
	public function get_data_icon()
	{
		$this->db->where('is_active', 'Y');
		return $this->db->get('icon');
	}

	public function do_upload($data = array())
	{
		$result= $this->db->insert('services',$data);
       	
       	$insert_id = $this->db->insert_id();

	}

	public function do_update($data = array(),$id)
	{

		$this->db->set($data);
		$this->db->where('id',$id);

		$update = $this->db->update('services');

		return $update;
	}

}
