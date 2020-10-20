<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_absen_siswa_model extends CI_Model {
	public function get_data($limit,$start,$search)
	{
		$this->db->select('dk.*,das.*,dk.id as dk_id,das.id as das_id,concat(dk.id,"|",dk.nama_kelas," ",dj.nama_jurusan) as id_kelas_jurusan,concat(dk.nama_kelas," ",dj.nama_jurusan) as nama_kelas_jurusan');
		$this->db->from('data_ajar da');
		$this->db->join('data_siswa ds','ds.id = das.siswa_id','LEFT');
		$this->db->join('data_ruangan dr','das.ruangan_id = dr.id','LEFT');
		$this->db->join('data_kelas dk','dk.id = dr.kelas_id','LEFT');
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
		$this->db->order_by('ds.nama_siswa', 'ASC');

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

	public function cek_data_input_absen_mapel($where)
	{
		if( ! empty($where))
		{
			$this->db->where($where);
		}
		return $this->db->get('data_absen_mapel');
	}

	public function get_data_kelas($query)
	{
		$this->db->select('dk.*,dj.*,dk.id as dk_id,dj.id as dj_id,concat(dk.id,"|",dk.nama_kelas," ",dj.nama_jurusan) as nama_kelas_jurusan');
		$this->db->from('data_kelas dk');
		$this->db->join('data_jurusan dj','dk.jurusan_id = dj.id','LEFT');

		$this->db->like('dj.nama_jurusan',$query);

		return $this->db->get();
	}

	public function get_data_siswa($where)
	{
		$this->db->select('ds.*,dk.*,ds.id as ds_id, dk.id as dk_id');
		$this->db->from('data_siswa ds');
		$this->db->join('data_kelas dk','ds.kelas_id = dk.id','LEFT');

		if( ! empty($where))
		{
			$this->db->where($where);
		}

		return $this->db->get();
	}
	public function get_data_detail_siswa($where)
	{
		$this->db->select('*,das.id as das_id,ds.id as ds_id,dos.id as dos_id');
		$this->db->from('data_ajar_siswa das');
		$this->db->join('data_siswa ds','ds.id = das.siswa_id','LEFT');
		$this->db->join('data_orangtua_siswa dos','dos.nisn = ds.nisn','LEFT');

		if( ! empty($where))
		{
			$this->db->where($where);
		}

		return $this->db->get();
	}
	public function get_guru_mapel($where)
	{
		$this->db->select('*,dg.id as dg_id,dm.id as dm_id');
		$this->db->from('data_guru dg');
		$this->db->join('data_mapel dm','dm.id = dg.mapel_id','LEFT');
		
		if( ! empty($where))
		{
			$this->db->where($where);
		}

		return $this->db->get();
	}

	public function get_data_siswa_other($where,$dt)
	{
		$this->db->select('ds.*,dk.*,ds.id as ds_id, dk.id as dk_id');
		$this->db->from('data_siswa ds');
		$this->db->join('data_kelas dk','ds.kelas_id = dk.id','LEFT');
		$this->db->join('data_jurusan dj','dj.id = dk.jurusan_id','LEFT');

		if( ! empty($where))
		{
			foreach($where as $wh)
			{
				$this->db->where_not_in('ds.id',$wh);
			}
		}
		if( ! empty($dt))
		{
			$this->db->where($dt);			
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

	public function get_data_absen_siswa($where)
	{
		$this->db->select('*,das.id as das_id,concat(dj.nama_jurusan," ",dk.nama_kelas," ",dr.nama_ruangan) as ruangan_kelas');
		$this->db->from('data_ajar_siswa das');
		$this->db->join('data_siswa ds','ds.id = das.siswa_id','LEFT');
		$this->db->join('data_ruangan dr','dr.id = das.ruangan_id','LEFT');
		$this->db->join('data_tahun_ajar dta','dta.id = das.tahun_ajar_id','LEFT');
		$this->db->join('data_kelas dk','dr.kelas_id = dk.id','LEFT');
		$this->db->join('data_jurusan dj','dj.id = dk.jurusan_id','LEFT');
	
		if( ! empty($where))
		{
			$this->db->where($where);			
		}

		return $this->db->get();
	}

	public function get_data_absen_mapel($where,$order)
	{
		$this->db->select('*,concat(dj.nama_jurusan," ",dk.nama_kelas," ",dr.nama_ruangan) as ruangan_kelas,dam.id as dam_id,djm.caption as djm_caption');
		$this->db->from('data_absen_mapel dam');
		$this->db->join('data_jam_mapel djm','djm.id = dam.jam_mapel_id','LEFT');
		$this->db->join('data_guru dg','dg.id = dam.guru_id','LEFT');
		$this->db->join('data_mapel dm','dm.id = dg.mapel_id','LEFT');
		$this->db->join('data_ajar_siswa das','das.id = dam.data_ajar_siswa_id','LEFT');
		$this->db->join('data_siswa ds','ds.id = das.siswa_id','LEFT');
		$this->db->join('data_ruangan dr','dr.id = das.ruangan_id','LEFT');
		$this->db->join('data_tahun_ajar dta','dta.id = das.tahun_ajar_id','LEFT');
		$this->db->join('data_kelas dk','dr.kelas_id = dk.id','LEFT');
		$this->db->join('data_jurusan dj','dj.id = dk.jurusan_id','LEFT');
	
		if( ! empty($where))
		{
			$this->db->where($where);			
		}

		if( ! empty($order))
		{
			$this->db->order_by($order,'DESC');			
		}

		return $this->db->get();
	}
	public function cek_data_absen_siswa($where)
	{			
		if( ! empty($where))
		{
			$this->db->where($where);			
		}
		return $this->db->get('data_absen_mapel');
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

	public function delete($table,$id)
  	{
 		$del = $this->db->delete($table, $id);
   		return $del;
 	}

}
