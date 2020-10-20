<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Company_model extends CI_Model {
	public function get_data($limit,$start)
	{
		$this->db->from('company');
		$this->db->where('is_active', 'Y');
		$this->db->order_by('id', 'ASC');

		if( ! empty($limit))
		{
			$this->db->limit($limit,$start);
		}

		return $this->db->get();
	}

	public function get_contact($id)
	{
		$this->db->from('contact');
		$this->db->where('company_id', $id);
		$this->db->order_by('id', 'ASC');

		return $this->db->get();
	}
	
	public function get_contact_type()
	{
		$this->db->from('contact_type');
		$this->db->order_by('id', 'ASC');

		return $this->db->get();
	}

	public function do_upload($data = array())
	{
		$result= $this->db->insert('company',$data);
       	
       	$insert_id = $this->db->insert_id();
	}

	public function do_update($data = array(),$id)
	{
		$this->db->set($data);
		$this->db->where('id',$id);

		return $update = $this->db->update('company');

	}
	
	public function insert_contact($data = array())
	{
		return $result= $this->db->insert('contact',$data);
	}
	
	public function update_contact($data = array(),$id)
	{
		$this->db->set($data);
		$this->db->where('id',$id);

		$update = $this->db->update('contact');
	}

	public function delete($data=array(),$id)
	{
		$del = $this->db->delete('company', array('id' => $id));

		return $del;
	}

	public function delete_contact($id)
	{
		$del = $this->db->delete('contact', array('id' => $id));

		return $del;
	}
}
