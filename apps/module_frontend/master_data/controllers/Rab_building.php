<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*!
 * @package RAB
 * @copyright Noobscript
 * @author diden89
 * @version 1.0
 * @access Public
 * @link /ahp_merekdagang_frontend/apps/module_frontend/master_data/controllers/Rab_building.php
 */

class Rab_building extends NOOBS_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('master_data/rab_building_model', 'db_r_building');
	}

	public function index()
	{
		$this->store_params['page_active'] = isset($this->store_params['page_active']) ? $this->store_params['page_active'] : 'Home';
		$this->store_params['header_title'] = 'RAB Building Configuration';
		$this->store_params['pages_title'] = 'RAB Building';
		$this->store_params['breadcrumb'] = array(
			array('', 'Home'),
			array('master_data/rab_building', 'RAB Building')
		);
		
		$this->store_params['source_top'] = array(
			'<link rel="stylesheet" href="'.base_url('styles/jquerysctipttop.css').'">'
		);

		$this->store_params['source_bot'] = array(
			'<script src="'.base_url('scripts/master_data/rab_building.js').'"></script>',
			'<script src="'.base_url('vendors/jquery_acollapsetable/jquery.aCollapTable.js').'"></script>'
		);

		$this->view('rab_building_view');
	}

	public function get_data()
	{
		if (isset($_POST['action']) && $_POST['action'] == 'get_data')
		{
			$success = FALSE;
			$get_data = $this->db_r_building->get_data(array('bt_is_active' => 'Y'));

			if ($get_data && $get_data->num_rows() > 0) echo json_encode(array('success' => TRUE, 'data' => $get_data->result()));
			else echo json_encode(array('success' => TRUE));
		} else $this->show_404();
	}

	public function get_rab_data()
	{
		if (isset($_POST['action']) && $_POST['action'] == 'get_rab_data')
		{
			$success = FALSE;
			
			$get_rab_building = $this->db_r_building->get_rab_building($_POST['bt_id']);
			$get_all_rab = $this->db_r_building->get_all_rab()->result();

			$rab_list = array();

			foreach ($get_all_rab as $k => $v) 
			{
				// if ($get_rab_building !== FALSE && in_array($v->id, $get_rab_building)) 
				// {
				// 	$rab_list[] = $v;
				// }
				// else
				// {
					$rab_list[] = $v;
				// }
			}

			// print_r($rab_list);exit;

			if (count($rab_list) > 0) echo json_encode(array('success' => TRUE, 'data' => $rab_list));
			else echo json_encode(array('success' => TRUE));
		} else $this->show_404();
	}

	public function store_data()
	{
		$post = $this->input->post(NULL, TRUE);
		
		if (isset($post['action']) && ! empty($post['action']) && $post['action'] == 'store_data')
		{
			unset($post['action']);

			if(isset($post['mag_id']))
			{
				$delete = $this->db_r_building->delete_access_group($post);

				$params = array();
				$store_data = TRUE;
				if(isset($post['rm_id'])){
					foreach ($post['rm_id'] as $k => $v) {
						$params = array(
							'mag_ug_id' => $post['ug_id'],
							'mag_rm_id' => $v,
						);
						$cek_ag = $this->db_r_building->cek_access_group($params);
						if($cek_ag->num_rows() > 0)
						{
							$get_ag = $cek_ag->row();
							$params['mode'] = 'edit';
							$params['mag_id'] = $get_ag->mag_id;
							
							// print_r($params);
							$store_data = $this->db_r_building->store_data($params);
						}
						else
						{
							$params['mode'] = 'add';
							$store_data = $this->db_r_building->store_data($params);
						}
					}
				}
			}
			else
			{
				foreach ($post['rm_id'] as $k => $v) {
					$params = array(
						'mag_ug_id' => $post['ug_id'],
						'mag_rm_id' => $v,
						'mode' => 'add',
					);
					
					$params['mode'] = 'add';
					$store_data = $this->db_r_building->store_data($params);	
				}
			}

			echo json_encode(array('success' => $store_data,'ug_id' => $post['ug_id']));
		}
		else $this->show_404();
	}

}