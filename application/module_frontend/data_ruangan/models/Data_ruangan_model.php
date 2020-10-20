<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ruangan_model extends CI_Model {
	public function get_data($limit,$start,$search)
	{
		$this->db->select('dk.*,dr.*,dk.id as dk_id,dr.id as dr_id,concat(dk.id,"|",dk.nama_kelas," ",dj.nama_jurusan) as id_kelas_jurusan,concat(dk.nama_kelas," ",dj.nama_jurusan) as nama_kelas_jurusan');
		$this->db->from('data_ruangan dr');
		$this->db->join('data_kelas dk','dr.kelas_id = dk.id','LEFT');
		$this->db->join('data_jurusan dj','dj.id = dk.jurusan_id','LEFT');

		if( ! empty($limit))
		{
			$this->db->limit($limit,$start);
		}
		
		if( ! empty($search))
		{
			$this->db->like($search);
		}

		$this->db->where('dr.is_active','Y');

		$this->db->order_by('dj.nama_jurusan', 'ASC');
		$this->db->order_by('dk.nama_kelas', 'ASC');
		$this->db->order_by('dr.nama_ruangan', 'ASC');

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

	public function get_data_kelas($query)
	{
		$this->db->select('dk.*,dj.*,dk.id as dk_id,dj.id as dj_id,concat(dk.nama_kelas," ",dj.nama_jurusan) as nama_kelas_jurusan');
		$this->db->from('data_kelas dk');
		$this->db->join('data_jurusan dj','dk.jurusan_id = dj.id','LEFT');

		$this->db->like('dj.nama_jurusan',$query);

		return $this->db->get();
	}

	public function get_data_kelas_for_id($wh)
	{
		$this->db->select('dk.*,dj.*,dk.id as dk_id,dj.id as dj_id,concat(dk.nama_kelas," ",dj.nama_jurusan) as nama_kelas_jurusan');
		$this->db->from('data_kelas dk');
		$this->db->join('data_jurusan dj','dk.jurusan_id = dj.id','LEFT');

		if( ! empty($wh)){
			$this->db->where($wh);
		}

		return $this->db->get();
	}

	public function delete($data=array(),$id,$table)
	{
		$this->db->set($data);
		$this->db->where('id',$id);

		$update = $this->db->update($table);
		return $update;
	}
}
