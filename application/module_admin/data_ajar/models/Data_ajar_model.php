<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ajar_model extends CI_Model {
	
	public function get_data($limit="",$start="",$src="",$like="")
	{
		$this->db->select('da.*,dg.*,e.*,dm.*,dr.*,dk.*,ta.*,ta.id as ta_id,dr.id as dr_id,dk.id as dk_id,da.id as da_id,e.id as e_id,dg.id as dg_id,concat(dk.nama_kelas," ",dj.nama_jurusan," ",dr.nama_ruangan) as nama_kelas_ruangan');
		$this->db->from('data_ajar da');
		$this->db->join('data_guru dg','dg.id = da.guru_id','LEFT');
		$this->db->join('employee e','e.id = dg.employee_id','LEFT');
		$this->db->join('data_mapel dm','dm.id = dg.mapel_id','LEFT');
		$this->db->join('data_ruangan dr','dr.id = da.ruangan_id','LEFT');
		$this->db->join('data_kelas dk','dk.id = dr.kelas_id','LEFT');
		$this->db->join('data_jurusan dj','dj.id = dk.jurusan_id','LEFT');
		$this->db->join('data_tahun_ajar ta','ta.id = da.tahun_ajar_id','LEFT');

		$this->db->where('da.is_active', 'Y');
		
		if( ! empty($like))
		{
			$this->db->like('e.fullname',$like);
			$this->db->or_like('dm.mapel',$like);
			$this->db->or_like('dr.nama_ruangan',$like);
			// }
		}

		if( ! empty($limit))
		{
			$this->db->limit($limit,$start);
		}

		if( ! empty($src))
		{
			$this->db->where($src);
		}

		$this->db->order_by('dj.nama_jurusan','ASC');
		$this->db->order_by('dr.nama_ruangan','ASC');
		$this->db->order_by('dk.nama_kelas','ASC');
		return $this->db->get();
	}

	public function get_data_edit($id)
	{		
		$this->db->select('da.*,dg.*,e.*,dm.*,dr.*,dk.*,ta.*,dm.id as dm_id,ta.id as ta_id,dr.id as dr_id,dk.id as dk_id,da.id as da_id,e.id as e_id,dg.id as dg_id,concat(dk.nama_kelas," ",dj.nama_jurusan," ",dr.nama_ruangan) as nama_kelas_ruangan');
		$this->db->from('data_ajar da');
		$this->db->join('data_guru dg','dg.id = da.guru_id','LEFT');
		$this->db->join('employee e','e.id = dg.employee_id','LEFT');
		$this->db->join('data_mapel dm','dm.id = dg.mapel_id','LEFT');
		$this->db->join('data_ruangan dr','dr.id = da.ruangan_id','LEFT');
		$this->db->join('data_kelas dk','dk.id = dr.kelas_id','LEFT');
		$this->db->join('data_jurusan dj','dj.id = dk.jurusan_id','LEFT');
		$this->db->join('data_tahun_ajar ta','ta.id = da.tahun_ajar_id','LEFT');
		
		$this->db->where('da.is_active', 'Y');
		$this->db->where('da.id',$id);

		return $this->db->get();
	}
	
	public function do_upload($data = array(),$table)
	{
		$result= $this->db->insert($table,$data);

		if($table == 'data_ajar')
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

	public function load_data($query)
	{
		$this->db->select('dg.*,e.*,dm.*,dm.id as dm_id,dg.id as dg_id,e.id as e_id,concat(e.fullname," >> ",dm.mapel) as guru_ajar');
		$this->db->from('data_guru dg');
		$this->db->join('employee e','e.id = dg.employee_id','LEFT');	
		$this->db->join('data_mapel dm','dm.id = dg.mapel_id','LEFT');	

		if($query !== "")
		{
			$this->db->like($query);
		}

		// $this->db->group_by('e.id');

		return $this->db->get();
	}

	public function get_data_mapel($where,$table)
	{
		if( ! empty($where))
		{
			$this->db->where($where);
		}
		$this->db->order_by('mapel','ASC');

		return $this->db->get($table);
	}

	public function get_data_select_mapel($where)
	{	
		$this->db->select('dg.*,dm.*,dm.id as dm_id,dg.id as dg_id');
		$this->db->from('data_guru dg');
		$this->db->join('data_mapel dm','dm.id = dg.mapel_id','INNER');	
		
		if( ! empty($where))
		{
			$this->db->where($where);
		}
		$this->db->order_by('dm.mapel','ASC');

		return $this->db->get();
	}

	public function get_any_data($where,$table)
	{
		if( ! empty($where))
		{
			$this->db->where($where);
		}
		
		return $this->db->get($table);
	}
	public function get_data_kelas($where="",$where_not="")
	{	
		$this->db->select('dr.*,dk.*,dr.id as dr_id, dk.id as dk_id,concat(dk.nama_kelas," ",dj.nama_jurusan," ",dr.nama_ruangan) as nama_kelas_ruangan');
		$this->db->from('data_ruangan dr');
		$this->db->join('data_kelas dk','dr.kelas_id = dk.id');
		$this->db->join('data_jurusan dj','dk.jurusan_id = dj.id');
		
		if( ! empty($where))
		{
			$this->db->where($where);
		}
		if( ! empty($where_not))
		{
			foreach($where_not as $wh)
			{
				$this->db->where_not_in('dr.id',$wh);
			}
		}
		$this->db->order_by('dj.nama_jurusan','ASC');
		$this->db->order_by('dr.nama_ruangan','ASC');
		$this->db->order_by('dk.nama_kelas','ASC');

		return $this->db->get();
	}

	public function get_data_kelas_ajar($where="")
	{	
		$this->db->select('dr.*,dk.*,dr.id as dr_id, dk.id as dk_id,concat(dk.nama_kelas," ",dj.nama_jurusan," ",dr.nama_ruangan) as nama_kelas_ruangan');
		$this->db->from('data_ruangan dr');
		$this->db->join('data_kelas dk','dr.kelas_id = dk.id');
		$this->db->join('data_jurusan dj','dk.jurusan_id = dj.id');
		
		if( ! empty($where))
		{
			foreach($where as $wh)
			{
				$this->db->where_not_in('dr.id',$wh);
			}
		}
		$this->db->order_by('dj.nama_jurusan','ASC');
		$this->db->order_by('dr.nama_ruangan','ASC');
		$this->db->order_by('dk.nama_kelas','ASC');

		return $this->db->get();
	}
	public function get_data_ajar_where_in($where="")
	{	
		if( ! empty($where))
		{
			foreach($where as $wh)
			{
				$this->db->where_in('guru_id',$wh);
			}
		}
		
		return $this->db->get('data_ajar');
	}

	public function get_data_kelas_other()
	{	
		$this->db->select('*,dg.id as dg_id,da.id as da_id');
		$this->db->from('data_guru dg');
		$this->db->join('data_ajar da','da.guru_id = dg.id');
		
		return $this->db->get();
	}

	public function delete($table,$id)
	{
		$del = $this->db->delete($table, $id);
		return $del;
	}

}
