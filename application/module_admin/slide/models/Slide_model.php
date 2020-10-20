<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Slide_model extends CI_Model {
	public function get_data($limit,$start)
	{
		$this->db->select('*');
		$this->db->from('header');
		$this->db->where('is_active', 'Y');
		$this->db->order_by('id', 'ASC');

		if( ! empty($limit))
		{
			$this->db->limit($limit,$start);
		}

		return $this->db->get();
	}

	public function get_data_edit($id)
	{
		$this->db->select('*');
		$this->db->from('header');
		$this->db->where('is_active', 'Y');
		$this->db->where('id',$id);

		return $this->db->get();
	}

	public function get_category()
	{
		$this->db->where('is_active', 'Y');
		return $this->db->get('category');
	}

	public function do_upload($data = array())
	{
		$result= $this->db->insert('header',$data);
       	
       	return $insert_id = $this->db->insert_id();
	}

	public function do_update($data = array(),$id)
	{
		$this->db->set($data);
		$this->db->where('id',$id);

		return $update = $this->db->update('header');

	}

	public function delete($data=array(),$id)
	{
		return $del = $this->db->delete('header', array('id' => $id));
	}
}
