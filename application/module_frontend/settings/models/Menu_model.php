<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {
	public function get_data($params = array())
	{
		$this->db->where('m_is_active', 'Y');

		if( ! empty($params['like']) && isset($params['like']))
		{
			$this->db->like('m_caption',$params['like']);
			$this->db->or_like('m_url',$params['like']);
			$this->db->or_like('m_description',$params['like']);
		}

		if( ! empty($params['limit']) && isset($params['limit']))
		{
			$this->db->limit($params['limit'],$params['start']);
		}

		if( ! empty($params['m_id']) && isset($params['m_id']))
		{
			$this->db->where('m_id',$params['m_id']);
		}

		return $this->db->get('menu');
	}

	public function get_data_edit($id)
	{		
		$this->db->where('m_is_active', 'Y');
		$this->db->where('m_id',$id);

		return $this->db->get('menu');
	}
	
	public function get_menu($cond)
	{
		$this->db->where($cond);
		return $this->db->get('menu');
	}
	
	public function get_menu_utama($id)
	{
		$this->db->where('m_is_active', 'Y');
		$this->db->where('m_id', $id);
		return $this->db->get('menu');
	}
	
	public function do_upload($data = array())
	{
		return $result= $this->db->insert('menu',$data);
	}

	public function do_update($data = array(),$id)
	{

		$this->db->set($data);
		$this->db->where('m_id',$id);

		$update = $this->db->update('menu');

		return $update;
	}

	public function delete($data=array(),$id)
	{
		$this->db->set('is_active','N');
		$this->db->where('id',$id);
		$upd = $this->db->update('category');

		return $upd;
	}

}
