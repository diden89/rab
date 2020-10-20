<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_guru_model extends CI_Model {
	
	public function get_data($limit="",$start="",$src="",$like="")
	{
		$this->db->select('dg.*,e.*,dm.*,da.caption as da_caption,dg.id as dg_id,e.id as e_id,dm.id as dm_id');
		$this->db->from('data_guru dg');
		$this->db->join('employee e','e.id = dg.employee_id','LEFT');
		$this->db->join('data_mapel dm','dm.id = dg.mapel_id','LEFT');
		$this->db->join('data_agama da','da.id = e.id_agama','LEFT');
		$this->db->where('dg.is_active', 'Y');
		
		if( ! empty($like))
		{
			$this->db->like('e.fullname',$like);
			$this->db->or_like('dm.mapel',$like);
			$this->db->or_like('e.nip',$like);
			// }
		}

		if( ! empty($limit))
		{
			$this->db->limit($limit,$start);
		}

		$this->db->order_by('e.fullname','ASC');
		$this->db->order_by('dm.mapel','ASC');

		return $this->db->get();
	}

	public function get_data_edit($id)
	{		
		$this->db->select('dg.*,e.*,dm.*,dg.id as dg_id,e.id as e_id,dm.id as dm_id');
		$this->db->from('data_guru dg');
		$this->db->join('employee e','e.id = dg.employee_id','LEFT');
		$this->db->join('data_mapel dm','dm.id = dg.mapel_id','LEFT');
		$this->db->where('dg.is_active', 'Y');
		$this->db->where('dg.id',$id);

		return $this->db->get();
	}
	
	public function do_upload($data = array(),$table)
	{
		$result= $this->db->insert($table,$data);

		if($table == 'data_guru')
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

	public function load_data($query,$table)
	{
		if($query !== "")
		{
			$this->db->like($query);
		}
		return $this->db->get($table);
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

	public function delete($data=array(),$id)
	{
		$this->db->set('is_active','N');
		$this->db->where('id',$id);
		$upd = $this->db->update('category');

		return $upd;
	}

}
