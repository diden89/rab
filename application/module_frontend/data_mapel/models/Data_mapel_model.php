<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_mapel_model extends CI_Model {
	public function get_data($limit,$start,$search)
	{
		if( ! empty($limit))
		{
			$this->db->limit($limit,$start);
		}
		
		if( ! empty($search))
		{
			$this->db->like($search);
		}

		$this->db->where('is_active','Y');

		$this->db->order_by('mapel', 'ASC');
		return $this->db->get('data_mapel');
	}	

	public function do_update($data = array(),$id,$table)
	{
		$this->db->set($data);
		$this->db->where('id',$id);

		$update = $this->db->update($table);
		return $update;
	}

	public function do_upload($data = array(),$table)
	{
		$result= $this->db->insert($table,$data);       	
       	return $result;
	}

	public function delete($data=array(),$id,$table)
	{
		$this->db->set($data);
		$this->db->where('id',$id);

		$update = $this->db->update($table);
		return $update;
	}
}
