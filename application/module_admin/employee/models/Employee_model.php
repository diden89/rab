<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {
	public function get_data($limit,$start,$src= "",$like="")
	{
		$this->db->select('e.*,da.*,e.id as e_id,ed.caption as e_caption,p.caption as p_caption,da.id as da_id,da.caption as da_caption');
		$this->db->from('employee e');
		$this->db->join('education ed','e.education_id = ed.id','left');
		$this->db->join('position p','e.position_id = p.id','left');
		$this->db->join('data_agama da','da.id = e.id_agama','left');
		// $this->db->where('e.is_active', 'Y');
		// $this->db->where('ed.is_active', 'Y');
		$this->db->where('p.is_active', 'Y');
		$this->db->order_by('e.id', 'ASC');
		$this->db->order_by('e.fullname', 'ASC');

		if( ! empty($limit))
		{
			$this->db->limit($limit,$start);
		}

		if( ! empty($src))
		{
			$this->db->where($src);
		}

		if( ! empty($like))
		{
			$this->db->like('e.fullname',$like);
			$this->db->or_like('p.caption',$like);
			$this->db->or_like('e.address',$like);
		}

		return $this->db->get();
	}

	public function get_data_edit($id)
	{
		
		$this->db->select('e.*,ud.*,ud.id as ud_id,e.id as e_id,ed.id as ed_id,p.id as p_id,ed.caption as ed_caption,p.caption as p_caption');
		$this->db->from('employee e');
		$this->db->join('education ed','e.education_id = ed.id','left');
		$this->db->join('position p','e.position_id = p.id','left');
		$this->db->join('user_detail ud','ud.id = e.userid','left');
		$this->db->join('user_sub_group usg','ud.sub_group = usg.id','left');
		$this->db->where('e.is_active', 'Y');
		$this->db->where('ed.is_active', 'Y');
		$this->db->where('p.is_active', 'Y');
		$this->db->where('e.id',$id);

		return $this->db->get();
	}

	public function get_category()
	{
		$this->db->where('is_active', 'Y');
		return $this->db->get('category');
	}

	public function get_data_sub_group()
	{
		$this->db->select("ug.*,usg.*,ug.id as ug_id,usg.id as usg_id,usg.caption as usg_caption");
		$this->db->from('user_sub_group usg');
		$this->db->join('user_group ug','usg.group_id = ug.id','LEFT');
		$this->db->where('usg.is_active', 'Y');
		return $this->db->get();
	}

	public function get_data_for_select($table)
	{
		$this->db->where('is_active', 'Y');
		return $this->db->get($table);
	}

	public function do_upload($data = array(),$table)
	{
		$result= $this->db->insert($table,$data);
       	
       	if($table == 'user_detail')
       	{
       		return $insert_id = $this->db->insert_id();
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

		return $update = $this->db->update($table);

	}

	public function delete($data=array(),$id)
	{
		return $del = $this->db->delete('employee', array('id' => $id));

	}
}
