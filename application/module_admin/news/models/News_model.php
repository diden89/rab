<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {
	
	public function get_data($limit,$start)
	{
		$this->db->select('*,n.id as news_id,c.id as cat_id,c.category_name', FALSE);
		$this->db->from('news n');
		$this->db->join('category c', 'c.id = n.category_id');
		$this->db->where('n.is_active', 'Y');
		$this->db->where('c.is_active', 'Y');
		$this->db->order_by('n.date', 'ASC');

		if( ! empty($limit))
		{
			$this->db->limit($limit,$start);
		}

		return $this->db->get();
	}

	public function get_data_edit($id)
	{
		$this->db->select('*,n.id as news_id,c.id as cat_id,c.category_name', FALSE);
		$this->db->from('news n');
		$this->db->join('category c', 'c.id = n.category_id');
		$this->db->where('n.is_active', 'Y');
		$this->db->where('c.is_active', 'Y');
		$this->db->where('n.id',$id);

		return $this->db->get();
	}

	public function get_category()
	{
		$this->db->where('type', 'news');
		$this->db->where('is_active', 'Y');
		return $this->db->get('category');
	}

	public function do_upload($data = array())
	{
		$result= $this->db->insert('news',$data);
       	
      	return $result;
	}

	public function do_update($data = array(),$id)
	{
		$this->db->set($data);
		$this->db->where('id',$id);

		$update = $this->db->update('news');

		return $update;
	}

	public function delete($id)
	{
		$del = $this->db->delete('news', array('id' => $id));

		return $del;
	}
}
