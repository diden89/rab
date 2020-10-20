<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_siswa_model extends CI_Model {
	
	public function get_data($limit="",$start="",$src="",$like="")
	{
		$this->db->select('ds.*,do.*,dkl.*,dj.*,ds.id as ds_id,ds.alamat as ds_alamat_siswa,do.alamat as do_alamat,ds.nisn as ds_nisn');
		$this->db->from('data_siswa ds');
		$this->db->join('data_orangtua_siswa do','ds.nisn = do.nisn','LEFT');
		$this->db->join('data_kelas dkl','ds.kelas_id = dkl.id','LEFT');
		$this->db->join('data_jurusan dj','ds.jurusan_id = dj.id','LEFT');
		$this->db->where('ds.is_active', 'Y');
		
		if( ! empty($src))
		{
			if($src == 'mm')
			{
				$this->db->where('is_admin', '');
			}
			elseif($src == 'all')
			{
				//$this->db->where('is_admin', '');
			}
			else
			{
				$this->db->where('is_admin', $src);
			}
			
		}


		if( ! empty($like))
		{
			$this->db->like('ds.nama_siswa',$like);
			$this->db->or_like('ds.nisn',$like);
			$this->db->or_like('ds.alamat',$like);
			// }
		}

		if( ! empty($limit))
		{
			$this->db->limit($limit,$start);
		}

		return $this->db->get();
	}

	public function get_data_edit($id)
	{		
		$this->db->select('ds.*,do.*,dkl.*,dj.*,dk.card_id,ds.id as ds_id,ds.alamat as ds_alamat_siswa,do.alamat as do_alamat,ds.nisn as ds_nisn,dk.id as dk_id,do.id as do_id');
		$this->db->from('data_siswa ds');
		$this->db->join('data_orangtua_siswa do','ds.nisn = do.nisn','LEFT');
		$this->db->join('data_kartu dk','dk.id_siswa = ds.id','LEFT');
		$this->db->join('data_kelas dkl','ds.kelas_id = dkl.id','LEFT');
		$this->db->join('data_jurusan dj','ds.jurusan_id = dj.id','LEFT');
		$this->db->where('ds.is_active', 'Y');
		$this->db->where('dk.is_active', 'Y');
		$this->db->where('ds.id',$id);

		return $this->db->get();
	}
	
	
	public function do_upload($data = array(),$table)
	{
		$result= $this->db->insert($table,$data);

		if($table == 'data_siswa')
       	{
       		$insert_id = $this->db->insert_id();
       		return $insert_id;
       	}
       	else
       	{
			return $result;
       	}
	}

	public function do_update($data = array(),$id,$table)
	{

		$this->db->set($data);
		$this->db->where($id);

		$update = $this->db->update($table);

		return $update;
	}

	public function delete($table,$data,$wh)
	{
		$this->db->set($data);
		$this->db->where($wh);
		$upd = $this->db->update($table);

		return $upd;
	}
	
	public function get_data_table($where = array(),$order ="",$table="")
	{
		if( ! empty($where))
		{
			$this->db->where($where);
		}
		if( ! empty($order))
		{
			$this->db->order_by($order,'ASC');
		}
		
		return $this->db->get($table);
	}

	public function get_data_kelas($where = array(),$order ="")
	{
		$this->db->select('dk.*,dj.*,dk.id as dk_id,concat(dj.nama_jurusan," ",dk.nama_kelas) as nama_kelasjur');
		$this->db->from('data_kelas dk');
		$this->db->join('data_jurusan dj','dk.jurusan_id = dj.id','left');
		if( ! empty($where))
		{
			$this->db->where($where);
		}
		if( ! empty($order))
		{
			$this->db->order_by($order,'ASC');
		}
		
		return $this->db->get();
	}

	public function get_any_data($table,$wh)
	{
		$this->db->where($wh);
		return $this->db->get($table);
	}

}
