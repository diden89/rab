<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_laporan_absen_siswa_model extends CI_Model {

	public function get_any_data($where,$order,$table)
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
	public function get_data_kelas($where,$order) 
	{
		$this->db->select('dk.*,dj.*,dk.id as dk_id,dj.id as dj_id,concat(dk.nama_kelas," ",dj.nama_jurusan) as nama_kelas_jurusan');
		$this->db->from('data_kelas dk');
		$this->db->join('data_jurusan dj','dk.jurusan_id = dj.id','LEFT');	

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

	public function get_data_kelas_ruangan($where,$order) 
	{
		$this->db->select('dr.*,dr.id as dr_id,dk.*,dj.*,dk.id as dk_id,dj.id as dj_id,concat(dk.nama_kelas," ",dj.nama_jurusan," ",dr.nama_ruangan) as nama_kelas_ruangan,(select count(id) from data_ajar_siswa where ruangan_id = dr.id) as jml_siswa');
		$this->db->from('data_ruangan dr');
		$this->db->join('data_kelas dk','dk.id = dr.kelas_id','LEFT');
		$this->db->join('data_jurusan dj','dk.jurusan_id = dj.id','LEFT');	

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


	public function get_data_ajar($where)
	{
		$this->db->select('*,da.ruangan_id as da_ruang_id,da.id as da_id ,concat(dj.nama_jurusan," ",dk.nama_kelas," ",dr.nama_ruangan) as ruangan_kelas,dg.id as dg_id,dr.id as dr_id');
		$this->db->from('data_ajar da');
		$this->db->join('data_guru dg','da.guru_id = dg.id','LEFT');
		$this->db->join('data_ruangan dr','dr.id = da.ruangan_id','LEFT');
		$this->db->join('data_tahun_ajar dta','dta.id = da.tahun_ajar_id','LEFT');
		$this->db->join('data_kelas dk','dr.kelas_id = dk.id','LEFT');
		$this->db->join('data_jurusan dj','dj.id = dk.jurusan_id','LEFT');
		$this->db->join('employee e','e.id = dg.employee_id','LEFT');
		$this->db->join('data_mapel dm','dm.id = dg.mapel_id','LEFT');

	
		if( ! empty($where))
		{
			$this->db->where($where);			
		}

		return $this->db->get();
	}

	public function get_mapel_ruangan($where) 
	{
		$this->db->select('*,dm.id as dm_id');
		$this->db->from('data_absen_mapel dam');
		$this->db->join('data_jam_mapel djm','djm.id = dam.jam_mapel_id','LEFT');
		$this->db->join('data_guru dg','dg.id = dam.guru_id','LEFT');
		$this->db->join('data_mapel dm','dm.id = dg.mapel_id','LEFT');
		$this->db->join('data_ajar_siswa das','das.id = dam.data_ajar_siswa_id','LEFT');
	
		if( ! empty($where))
		{
			$this->db->where($where);			
		}

		$this->db->group_by('dam.guru_id');			
		
		return $this->db->get();
	}

	public function get_data_siswa_ajar($where,$sel) 
	{
		$this->db->select($sel);
		$this->db->from('data_ajar_siswa das');
		$this->db->join('data_siswa ds','ds.id = das.siswa_id','LEFT');
		$this->db->join('data_absen_mapel dam','dam.data_ajar_siswa_id = das.id','LEFT');
		$this->db->join('data_absen_siswa dass','dass.id_siswa = ds.id','LEFT');
	
		if( ! empty($where))
		{
			$this->db->where($where);			
		}
		$this->db->group_by('ds.id');	
	
		return $this->db->get();
	}

}
