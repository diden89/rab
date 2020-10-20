<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model {
	public function get_data($limit,$start,$id)
	{
		$this->db->select('*,concat(first_name," ",last_name) as fullname');
		if( ! empty($id))
		{
			$this->db->where('id',$id);
		}
		if( ! empty($limit))
		{
			$this->db->limit($limit,$start);
		}

		return $this->db->get('message');
	}

	public function get_data_edit($id)
	{
		
		$this->db->select('*,concat(first_name," ",last_name) as fullname');
		$this->db->where('id',$id);

		return $this->db->get('message');
	}

	public function get_category()
	{
		$this->db->where('is_active', 'Y');

		return $this->db->get('category');
	}

	public function get_menu($cond)
	{
		$this->db->where('is_admin', $cond);
		$this->db->where('is_active', 'Y');

		return $this->db->get('menu');
	}
	
	public function do_upload($data = array())
	{
		$result= $this->db->insert('articles',$data);
       	
       	$insert_id = $this->db->insert_id();

	}

	public function do_update($data = array(),$id)
	{

		$this->db->set($data);
		$this->db->where('id',$id);

		$update = $this->db->update('articles');

		return $update;
	}

	public function delete($id)
	{
		$this->db->where('id',$id);
		$del = $this->db->delete('message');

		return $del;
	}

	public function update_message($id)
	{
		$this->db->set('is_read','Y');
		$this->db->where('id',$id);
		return $this->db->update('message');
	
	}


}
