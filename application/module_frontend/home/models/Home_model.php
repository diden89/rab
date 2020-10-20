<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
	public function get_menu($where)
	{
		$this->db->where('m_is_active', 'Y');
		if( ! empty($where))
		{
			$this->db->where($where);
		}
		$this->db->order_by('m_caption', 'ASC');
		
		return $this->db->get('menu');
	}

	public function get_total_siswa($table)
	{
		$this->db->select('count(id) as total');
		$this->db->from($table);
		$this->db->where('is_active','Y');

		return $this->db->get();
	}

	public function get_total_guru($table)
	{
		$this->db->select('count(distinct(employee_id)) as total');
		$this->db->from($table);
		$this->db->where('is_active','Y');

		return $this->db->get();
	}

	public function get_total_oth($table)
	{
		$this->db->select('count(id) as total');
		$this->db->from($table);

		return $this->db->get();
	}

	public function get_properties($url = '')
	{
		$this->db->where('m_url', $url);
		$this->db->where('m_is_active', 'Y');

		return $this->db->get('menu');
	}

	public function get_total_message($wh)
	{
		$this->db->select('count(id) as total');
		$this->db->where($wh);

		return $this->db->get('message');
	}

	public function get_notif($type)
	{
		date_default_timezone_set("Asia/Bangkok");

		$today = date('Y-m-d H:i:s');
		$yesterday = date('Y-m-d',strtotime('-1 days',strtotime($today)));

		$this->db->where('create_date >= ',$yesterday);
		$this->db->where('create_date <= ',$today);
		$this->db->where('is_active','Y');
		if($type == 'total')
		{
			$this->db->where('is_view','N');
		}

		return $this->db->get('notification');
	}

	public function update_notif()
	{
		$this->db->set('is_view', 'Y');

		$update = $this->db->update('notification');

		// if ($update)
		// {
		// 	$this->db->set($data);
		// 	$this->db->set('id',$id);
		// 	$this->db->set('log_userid', $this->session->userdata('username'));
		// 	$this->db->set('log_action', 'update');
		// 	$this->db->set('log_created_date', 'NOW()', FALSE);

		// 	return $this->db->insert('log_employee');
		// }
		return $update;
	}

	public function get_new_donatur()
	{

		$this->db->where('is_active','Y');
		$this->db->where('status','verify');
		$this->db->order_by('id','ASC');
		$this->db->limit(8,0);

		return $this->db->get('data_pendonor');
	}

	public function get_data_modem()
	{
		return $this->db->get('phones');
	}

}
