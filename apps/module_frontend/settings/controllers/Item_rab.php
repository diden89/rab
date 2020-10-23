<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*!
 * @package RAB
 * @copyright Noobscript
 * @author Sikelopes
 * @edit Diden89
 * @version 1.0
 * @access Public
 * @path /rab/apps/module_frontend/settings/controllers/Item_rab.php
 */

class Item_rab extends NOOBS_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('settings/item_rab_model', 'db_item_rab');
	}

	public function index()
	{
		$this->store_params['header_title'] = 'Item RAB';
		$this->store_params['breadcrumb'] = array(
			array('', 'Home'),
			array('settings/item_rab', 'Item RAB')
		);

		$this->store_params['source_bot'] = array(
			'<script src="'.base_url('vendors/jquery-number-master/jquery.number.js').'"></script>',
			'<script src="'.base_url('scripts/settings/item_rab.js').'"></script>',
		);

		$this->store_params['item'] = [];

		$load_data_item_rab = $this->db_item_rab->load_data_item_rab();

		if ($load_data_item_rab->num_rows() > 0)
		{
			$num = 0;
			$result = $load_data_item_rab->result();

			foreach ($result as $k => $v)
			{
				$num++;

				$v->num = $num;
			}

			$this->store_params['item'] = $result;
		}

		$this->view('item_rab_view');
	}

	public function load_item_form()
	{
		if (isset($_POST['action']) && $_POST['action'] == 'load_item_form')
		{
			$post = $this->input->post(NULL, TRUE);

			$post['option'] = $this->db_item_rab->get_option_unit()->result();
			if($post['mode'] == 'edit')
			{
				$post['data'] = $this->db_item_rab->load_data_item_rab($post['txt_id'])->row();
			}

			$this->_view('item_rab_form_view', $post);
		}
		else $this->show_404();
	}

	public function load_data_item_rab()
	{
		if (isset($_POST['action']) && $_POST['action'] == 'load_data_item_rab')
		{
			$post = $this->input->post(NULL, TRUE);
			$load_data_item_rab = $this->db_item_rab->load_data_item_rab($post);

			if ($load_data_item_rab->num_rows() > 0) 
			{
				$result = $load_data_item_rab->result();
				$number = 1;

				foreach ($result as $k => $v)
				{
					$v->no = $number;

					$number++;
				}

				echo json_encode(array('success' => TRUE, 'data' => $result));
			}
			else echo json_encode(array('success' => FALSE, 'msg' => 'Data not found!'));
		}
		else $this->show_404();
	}

	public function store_data_item()
	{
		if (isset($_POST['action']) && $_POST['action'] == 'store_data_item')
		{
			$post = $this->input->post(NULL, TRUE);
			$store_data_item = $this->db_item_rab->store_data_item($post);

			if ($store_data_item->num_rows() > 0) 
			{
				$result = $store_data_item->result();
				$number = 1;

				foreach ($result as $k => $v)
				{
					$v->no = $number;

					$number++;
				}

				echo json_encode(array('success' => TRUE, 'data' => $result));
			}
			else echo json_encode(array('success' => FALSE, 'msg' => 'Data not found!'));
		}
		else $this->show_404();
	}

	public function delete_data_item()
	{
		if (isset($_POST['action']) && $_POST['action'] == 'delete_data_item')
		{
			$post = $this->input->post(NULL, TRUE);
			$delete_data_item = $this->db_item_rab->delete_data_item($post);

			if ($delete_data_item->num_rows() > 0) 
			{
				$result = $delete_data_item->result();
				$number = 1;

				foreach ($result as $k => $v)
				{
					$v->no = $number;

					$number++;
				}
				
				echo json_encode(array('success' => TRUE, 'data' => $result));
			}
			else echo json_encode(array('success' => FALSE, 'msg' => 'Data not found!'));
		}
		else $this->show_404();
	}
}