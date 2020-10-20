<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_modem_model extends CI_Model {

	public function get_data_modem() //dipakai
	{
		// $this->db->where('is_active','Y');
		return $this->db->get('phones');
	}

	public function get_inbox($wh) //dipakai
	{
		$this->db->where($wh);
		return $this->db->get('inbox');
	}
	public function get_data_siswa($wh) //dipakai
	{
		$this->db->select('*');
		$this->db->from('data_siswa ds');
		$this->db->join('data_ajar_siswa das','ds.id = das.siswa_id','LEFT');
		// $this->db->join('data_ajar_siswa das','ds.id = das.siswa_id','LEFT');

		if( ! empty($wh))
		{
			$this->db->where($wh);
		}
		return $this->db->get();
	}

	public function get_mapel_ruangan($where) //dipakai
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

	public function cek_data_for_reply($where,$sel)//dipakai
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


	public function get_category()
	{
		$this->db->where('is_active', 'Y');
		return $this->db->get('category');
	}

	public function get_data_for_select($table)
	{
		// $this->db->where('is_active', 'Y');
		return $this->db->get($table);
	}

	public function get_data_select($table,$order)
	{
		$this->db->order_by($order, 'ASC');
		return $this->db->get($table);
	}

	public function get_data_provinsi()
	{
		$this->db->order_by('nama_provinsi', 'ASC');
		return $this->db->get('master_provinsi');
	}

	public function select_kab_kota($id)
	{

		$this->db->where('id_provinsi', $id);
		$this->db->order_by('nama_kabkota', 'ASC');
		return $this->db->get('master_kab_kota');
	}

	public function select_kecamatan($id)
	{
		$this->db->where('id_kab_kota', $id);
		$this->db->order_by('nama_kecamatan', 'ASC');
		return $this->db->get('master_kecamatan');
	}

	public function select_kelurahan($id)
	{
		$this->db->where('id_kecamatan', $id);
		$this->db->order_by('nama_kelurahan', 'ASC');
		return $this->db->get('master_kelurahan');
	}

	public function get_alamat($id)
	{
		$this->db->where('id_relasi', $id);
		return $this->db->get('data_alamat');
	}

	public function load_data_kelurahan($q)
	{
		if($q !== "")
		{
			$this->db->like('nama_kelurahan', $q);
		}
		return $this->db->get('master_kelurahan');
	}

	public function do_upload($data = array(),$table)
	{
		$result= $this->db->insert($table,$data);
       	
       	return $result;
	}

	public function do_update($data = array(),$id,$table)
	{
		$this->db->set($data);
		$this->db->where($id);

		$update = $this->db->update($table);

		// if ($update)
		// {
		// 	$this->db->set($data);
		// 	$this->db->set('id',$id);
		// 	$this->db->set('log_userid', $this->session->userdata('username'));
		// 	$this->db->set('log_action', 'update');
		// 	$this->db->set('log_created_date', 'NOW()', FALSE);

		// 	return $this->db->insert('log_employee');
		// }
		return FALSE;
	}

	public function delete($data=array(),$id,$table)
	{
		$this->db->set($data);
		$this->db->where('id',$id);

		$update = $this->db->update($table);
		return $update;
	}

	public function del_img_berkas($id)
	{
		$del = $this->db->delete('data_berkas', $id);
		return $del;
	}

	public function get_img_berkas($id)
	{
		$this->db->where($id);
		return $this->db->get('data_berkas');
	}

	public function get_data_any_table($wh,$table)
	{
		$this->db->where($wh);
		return $this->db->get($table);
	}
}
