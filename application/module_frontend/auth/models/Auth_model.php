<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
	public function validate_login($params = array())
	{
		
		if (isset($params['txt_username']) && isset($params['txt_password']))
		{
			$this->db->select('*,a.id as ud_id,dp.id as dp_id');
			$this->db->from('user_detail a');
			if($params['login_as'] == '2')
			{
				$this->db->join('data_pendonor dp','a.id = dp.userid','left');
			}
			else
			{
				$this->db->join('data_penerima dp','a.id = dp.userid','left');
			}

			$this->db->where('a.is_active', 'Y');
			$this->db->where('dp.is_active', 'Y');
			$this->db->where('a.username', $params['txt_username']);
			$this->db->where('a.password', sha1(strtoupper($params['txt_username'].':'.$params['txt_password'])));

			return $this->db->get();
		}
		elseif (isset($params['id']) && isset($params['username']))
		{
			$this->db->select('*,a.id as ud_id,dp.id as dp_id');
			$this->db->from('user_detail a');
			if($params['sub_group'] == '2')
			{
				$this->db->join('data_pendonor dp','a.id = dp.userid','left');
			}
			else
			{
				$this->db->join('data_penerima dp','a.id = dp.userid','left');
			}
			$this->db->where('a.is_active', 'Y');
			$this->db->where('dp.is_active', 'Y');
			$this->db->where('a.id', $params['id']);
			$this->db->where('a.username', $params['username']);

			return $this->db->get();
		}

		return FALSE;
	}

	public function load_header($table,$type)
	{
		$this->db->from($table);
		$this->db->where('is_active', 'Y');
		$this->db->where('type', $type);
		
		return $this->db->get();
	}
}
