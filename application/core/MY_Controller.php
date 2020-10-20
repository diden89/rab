<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	protected $store_params = array();
	protected $menu = '';
	protected $auth = TRUE;

	function __construct($config = array())
	{
		parent::__construct();

		$this->encryption->initialize(array('driver' => 'openssl'));
		$this->load->model('home/home_model', 'db_home');

		if (count($config) > 0)
		{
			foreach ($config as $k => $v)
			{
				$this->$k = $v;
			}
		}

		if (MODULE == 'module_admin')
		{
			if ($this->auth !== FALSE)
			{
				$this->validate_login();
			}
		}

		if (MODULE == 'module_frontend')
		{
			if ($this->auth !== FALSE)
			{
				$this->validate_login();
			}

		}

	}

	protected function validate_login($params = array())
	{
		
		$this->load->model('auth/auth_model', 'db_auth');

		if (count($params) > 0)
		{
			$result = array('success' => FALSE);
			$validate_login = $this->db_auth->validate_login($params);

			if ($validate_login !== FALSE && $validate_login->num_rows() > 0)
			{
				$row = $validate_login->row();
				if($row->sub_group == '2')
				{
					$kopen =  $row->kode_pendonor;
				}
				else
				{
					$kopen = $row->kode_penerima;
				}
				$this->session->set_userdata(array(
					'token' => $this->encryption->encrypt($row->ud_id.':'.$row->username.':'.$row->sub_group),
					'username' => $row->username,
					'fullname' => $row->fullname,
					'sub_group' => $row->sub_group,
					'userid' => $row->ud_id,
					'emp_id' => $row->e_id,
					'kopen' => $kopen
				));

				$result['success'] = TRUE;
			}

			return $result;
		}
		
		if ($this->session->userdata('token') == TRUE) {
			$token = $this->encryption->decrypt($this->session->userdata('token'));
			$exp_token = explode(':', $token);
			$new_params = array('id' => $exp_token[0], 'username' => $exp_token[1], 'sub_group' => $exp_token[2]);
			$validate_login = $this->db_auth->validate_login($new_params);
			
			if ($validate_login !== FALSE && $validate_login->num_rows() > 0)
			{
				return TRUE;
			}
		}

		$this->session->set_userdata(array('_reDir' => current_url()));
		redirect('auth');
	}

	

	protected function do_logout()
	{
		$this->session->set_userdata(array('token' => ''));
		$this->session->unset_userdata(array('token' => ''));
		$this->session->sess_destroy();

		redirect('auth');
	}

	protected function view($body)
	{
		$this->store_params['title'] = isset($this->store_params['title']) ? TITLE.' - '.$this->store_params['title'] : TITLE;
		$this->store_params['title2'] = isset($this->store_params['title2']) ? TITLE2.' - '.$this->store_params['title2'] : TITLE2;
		$this->store_params['page_active'] = isset($this->store_params['page_active']) ? $this->store_params['page_active'] : 'Home';
		$this->store_params['page_icon'] = isset($this->store_params['page_icon']) ? $this->store_params['page_icon'] : 'fa fa-home';

		if (MODULE == 'module_frontend')
		{
			$this->store_params['menu'] = $this->_menu_build();
			$this->store_params['footer'] = $this->load_footer();

			$view = 'views';
		}
		elseif (MODULE == 'module_admin')
		{
			if($this->session->userdata('sub_group') == '2')
			{
				$where = array('as_kepsek' => 'Y');
			}
			elseif($this->session->userdata('sub_group') == '3')
			{
				$where = array('as_guru' => 'Y');
			}
			else
			{
				$where = array('is_admin' => 'Y');
			}
			
			
			$this->store_params['menu'] = $this->_generate_admin_menu($where);
			$this->store_params['message'] = $this->_load_message();
			$view = 'admin_view';
		}

		$this->store_params['body'] = $this->load->view($body, $this->store_params, TRUE);
		
		$this->load->view($view, $this->store_params);
	}

	private function _generate_admin_menu($where)
	{
		$get_menu = $this->db_home->get_menu($where);
		$tree_menu = $this->_generate_tree_menu($get_menu->result());

		return $tree_menu;
	}

	private function _generate_tree_menu($datas, $parent_id = NULL, $idx = 0)
	{
		$str_menu = FALSE;

		if ($parent_id == '' || $parent_id == ' ' || $parent_id == NULL || $parent_id == 0 || empty($parent_id))
		{
			$parent_id = NULL;
		}

		$idx++;

		foreach ($datas as $data)
		{
			if ($data->parent_id == $parent_id)
			{
				$children = $this->_generate_tree_menu($datas, $data->id, $idx);

				if ($children !== FALSE)
				{
					$str_menu .= '<li class="treeview"><a href="'.site_url($data->url).'"><i class="'.$data->icon.'"></i> <span>'.$data->caption.'</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>';

					if ($idx > 0)
					{
						$str_menu .= '<ul class="treeview-menu">';
					}

					$str_menu .= $children;

					if ($idx > 0)
					{
						$str_menu .= '</ul>';
					}

					$str_menu .= '</li>';
				}
				else
				{
					$str_menu .= '<li class="'.($this->store_params['page_active'] == $data->caption ? 'active' : '').'"><a href="'.site_url($data->url).'"><i class="'.$data->icon.'"></i> '.$data->caption.'</a></li>';
				}
			}
		}

		return $str_menu;
	}

	private function _menu_build()
	{
		$menu_build_raw = $this->_menu_build_raw();
		$menu_build_style = $this->_menu_build_style($menu_build_raw);

		return $this->menu;
	}

	private function _menu_build_style($datas = array(), $idx = 0)
	{
		foreach ($datas as $data)
		{
			if (isset($data->html_start) || isset($data->html_end))
			{
				$this->menu .= $data->html_start;
				$this->_menu_build_style($data->data, $data->idx);
				$this->menu .= $data->html_end;
			}
			else
			{
				$this->menu .= $data->html;
			}
		}
	}

	private function _menu_build_raw($datas = array(), $parent_id = NULL, $idx = -1)
	{
		$menu = array();

		if (count($datas) < 1)
		{
			$get_menu = $this->db_home->get_menu(array('is_admin' => 'N'));
			$menu_build = $this->_menu_build_raw($get_menu->result());

			return $menu_build;
		}

		$idx++;

		foreach ($datas as $data)
		{
			if ($data->parent_id == $parent_id)
			{
				$children = $this->_menu_build_raw($datas, $data->id, $idx);

				if ($children)
				{
					if ($idx == 0)
					{
						$html_start = '<li class="drop-down"><a href="'.$data->url.'">'.ucwords(strtolower($data->caption)).'</a><ul>';
						$html_end = '</ul></li>';
					}
					elseif ($idx > 0)
					{
						$html_start = '<li class="drop-down"><a href="'.$data->url.'">'.ucwords(strtolower($data->caption)).'</a><ul>';
						$html_end = '</ul></li>';
					}

					$data->idx = $idx;
					$data->html_start = $html_start;
					$data->data = $children;
					$data->html_end = $html_end;
				}
				else
				{
					if ($idx == 0)
					{
						$html = '<li><a href="'.$data->url.'">'.ucwords(strtolower($data->caption)).'</a></li>';
					}
					elseif ($idx == 1)
					{
						$html = '<li><a href="'.$data->url.'">'.ucwords(strtolower($data->caption)).'</a></li>';
					}
					elseif ($idx > 1)
					{
						$html = '<li><a href="'.$data->url.'">'.ucwords(strtolower($data->caption)).'</a></li>';
					}

					$data->idx = $idx;
					$data->html = $html;
				}
				$menu[] = $data;
				
			}
		}
		// exit;
	
		// $html = '<a href="'.site_url("auth/logout").'"><i class="fa fa-sign-out"></i> Logout</a>';
		// $data->html = $html;
		
		// $menu[] = $data;
		return $menu;
	}
	
	protected function load_footer()
	{
		$get_company = $this->db_home->get_company();
		$row_company = $get_company->result();
		
		foreach ($row_company as $k => $v)
		{
			$get_email = $this->db_home->get_email($v->id,'email');
			$v->email = array();

			foreach ($get_email->result() as $k1 => $v1)
			{
				$v->email[] = $v1->c_detail;
			}
			 
			$get_contact = $this->db_home->get_contact($v->id);
			$v->contact = array();

			foreach ($get_contact->result() as $k1 => $v1)
			{
				$temp = array(
					'c_type' => $v1->c_type,
					'c_detail' => $v1->c_detail,
					'c_url' => $v1->c_url,
					'c_message' => $v1->c_message
				);

				$v->contact[] = $temp;
			}
		}
		
		return $row_company;
	}

	protected function _load_message()
	{
		$get_total_msg = $this->db_home->get_total_message(array('is_read' => 'N'))->row();
		
		return $get_total_msg;
	}

	protected function day_indonesia_format($data)
	{
		$day = date('N',strtotime($data));
		$hari = "";
		if($day == 1){$hari = 'Minggu';}
		if($day == 2){$hari = 'Senin';}
		if($day == 3){$hari = 'Selasa';}
		if($day == 4){$hari = 'Rabu';}
		if($day == 5){$hari = 'Kamis';}
		if($day == 6){$hari = 'Jumat';}
		if($day == 7){$hari = 'Sabtu';}
		return $hari;
	}
}