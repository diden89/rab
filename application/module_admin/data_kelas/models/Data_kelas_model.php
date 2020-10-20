<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_kelas_model extends CI_Model {
	public function get_data($limit,$start,$search)
	{
		$this->db->select('dj.*,dk.*,dj.id as dj_id,dk.id as dk_id');
		$this->db->from('data_kelas dk');
		$this->db->join('data_jurusan dj','dk.jurusan_id = dj.id','LEFT');

		if( ! empty($limit))
		{
			$this->db->limit($limit,$start);
		}
		
		if( ! empty($search))
		{
			$this->db->like($search);
		}

		$this->db->where('dk.is_active','Y');

		$this->db->order_by('jurusan_id', 'ASC');
		$this->db->order_by('nama_kelas', 'ASC');

		return $this->db->get();
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

	public function get_data_jurusan()
	{
		$this->db->where('is_active','Y');

		return $this->db->get('data_jurusan');
	}

	public function delete($data=array(),$id,$table)
	{
		$this->db->set($data);
		$this->db->where('id',$id);

		$update = $this->db->update($table);
		return $update;
	}
}
