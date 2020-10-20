<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {
	public function get_data($limit,$start)
	{
		// $this->db->where('is_active', 'Y');
		$this->db->order_by('type', 'ASC');

		if( ! empty($limit))
		{
			$this->db->limit($limit,$start);
		}

		return $this->db->get('category');
	}

	public function get_data_edit($id)
	{
		
		// $this->db->where('is_active', 'Y');
		$this->db->order_by('type', 'ASC');
		$this->db->where('id',$id);

		return $this->db->get('category');
	}
	
	public function get_cat_type()
	{
		$this->db->where('is_active', 'Y');

		return $this->db->get('category_type');
	}
	
	public function do_upload($data = array())
	{
		$result= $this->db->insert('category',$data);
       	
       	$insert_id = $this->db->insert_id();

	}

	public function do_update($data = array(),$id)
	{

		$this->db->set($data);
		$this->db->where('id',$id);

		return $update = $this->db->update('category');

	}

	public function delete($data=array(),$id)
	{
		$this->db->set('is_active','N');
		$this->db->where('id',$id);
		
		return $upd = $this->db->update('category');
	}

}
