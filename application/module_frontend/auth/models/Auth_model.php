<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
	public function validate_login($params = array())
	{
		

		if (isset($params['txt_username']) && isset($params['txt_password']))
		{
			$this->db->select('*,a.id as ud_id,b.id as e_id');
			$this->db->from('user_detail a');
			$this->db->join('employee b','a.id = b.userid','left');
			$this->db->where('a.is_active', 'Y');
			$this->db->where('b.is_active', 'Y');
			$this->db->where('a.username', $params['txt_username']);
			$this->db->where('a.password', sha1(strtoupper($params['txt_username'].':'.$params['txt_password'])));

			return $this->db->get();
		}
		elseif (isset($params['id']) && isset($params['username']))
		{
			$this->db->select('*,a.id as ud_id,b.id as e_id');
			$this->db->from('user_detail a');
			$this->db->join('employee b','a.id = b.userid','left');
			$this->db->where('a.is_active', 'Y');
			$this->db->where('b.is_active', 'Y');
			$this->db->where('a.id', $params['id']);
			$this->db->where('a.username', $params['username']);

			return $this->db->get();
		}

		return FALSE;
	}
}
