<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
	public function get_data($limit,$start)
	{
		$this->db->select('*,ud.id as ud_id,usg.id as usg_id,ug.id as ug_id,usg.caption as usg_caption,ug.caption as ug_caption,ud.is_active as ud_isactive');
		$this->db->from('user_detail ud');
		$this->db->join('user_sub_group usg','ud.sub_group = usg.id','left');
		$this->db->join('user_group ug','usg.group_id = ug.id','left');
		// $this->db->where('ud.is_active', 'Y');
		$this->db->order_by('ud.id', 'ASC');

		if( ! empty($limit))
		{
			$this->db->limit($limit,$start);
		}

		return $this->db->get();
	}

	public function get_data_edit($id)
	{
		
		$this->db->select('*,ud.id as ud_id,usg.id as usg_id,ug.id as ug_id,usg.caption as usg_caption,ug.caption as ug_caption,ud.is_active as ud_isactive');
		$this->db->from('user_detail ud');
		$this->db->join('user_sub_group usg','ud.sub_group = usg.id','left');
		$this->db->join('user_group ug','usg.group_id = ug.id','left');
		$this->db->where('ud.id',$id);

		return $this->db->get();
	}

	public function get_data_for_select($table)
	{
		$this->db->where('is_active', 'Y');
		if($table == 'employee')
		{
			$this->db->where('userid is null');
			$this->db->or_where('userid = ""');
		}
		return $this->db->get($table);
	}
	
	public function get_data_employee($id)
	{
		$this->db->where('is_active', 'Y');
		$this->db->where('userid',$id);
		
		return $this->db->get('employee');
	}

	public function get_data_users($table,$id)
	{
		$this->db->where('is_active', 'Y');
		$this->db->where('userid',$id);
		
		return $this->db->get($table);
	}

	public function do_upload($data = array())
	{
		$datas['username'] = $data['username'];
		$datas['password'] = $data['password'];
		$datas['ori_password'] = $data['ori_password'];
		$datas['sub_group'] = $data['sub_group'];
		$datas['is_active'] = $data['is_active'];
	  
		$result= $this->db->insert('user_detail',$datas);
       	
       	$insert_id = $this->db->insert_id();

       	$this->db->set('userid',$insert_id);
       	$this->db->where('id',$data['fullname']);
       	$update = $this->db->update('employee');

	}

	public function do_update($data = array(),$id)
	{
		$datas['username'] = $data['username'];
		$datas['password'] = $data['password'];
		$datas['ori_password'] = $data['ori_password'];
		$datas['sub_group'] = $data['sub_group'];
		$datas['is_active'] = $data['is_active'];

		$this->db->set($datas);
		$this->db->where('id',$id);

		$update = $this->db->update('user_detail');

		return $update;
	}

	public function delete($data=array(),$id)
	{
		$del = $this->db->delete('user_detail', array('id' => $id));

		return $del;
	}

	public function do_update_employee($data = array())
	{
		$datas['id'] = $data->id;
		$datas['userid'] = $data->userid;
		$datas['position_id'] = $data->position_id;
		$datas['education_id'] = $data->education_id;
		$datas['seq'] = $data->seq;
		$datas['fullname'] = $data->fullname;
		$datas['pob'] = $data->pob;
		$datas['dob'] = $data->dob;
		$datas['phone'] = $data->phone;
		$datas['email'] = $data->email;
		$datas['address'] = $data->address;
		$datas['is_active'] = $data->is_active;
		$datas['img'] = $data->img;
       
		$this->db->set('userid',"");
		$this->db->where('id',$data->id);

		$update = $this->db->update('employee');

		return $update;
	}
}
