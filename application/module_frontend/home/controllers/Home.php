<?php
// echo phpinfo();
// exit;

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('home_model','hm');
		
	}

	public function index()
	{		
		$total_guru = $this->db_home->get_total_guru('data_guru')->row();
		$total_siswa = $this->db_home->get_total_siswa('data_siswa')->row();
		
		$this->store_params['total_guru'] = ( ! empty($total_guru) ? $total_guru->total : 0);	
		$this->store_params['total_anak'] = ( ! empty($total_siswa) ? $total_siswa->total : 0);	
		
		
		$this->store_params['source_bot'] = array(
				'<script src="'.base_url('assets/templates/admin').'/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>',
				'<script src="'.base_url('assets/js/admin').'/home.js"></script>',
				
			);
		
		$this->view('home_view');
	}

	public function send_email()
	{
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "info@iwebebs.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "info@iwebebs.com";
		$config['smtp_pass'] = "P@ssw0rd";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";

		$this->load->library('email',$config);
		$this->email->from('info@iwebebs.com', 'PT. Iwebe Bangun Solusi');
		$email_to = explode(';', $this->input->post('emailto'));
		$this->email->to($email_to);
		$this->email->subject($this->input->post('subject'));
		$this->email->message(strip_tags($this->input->post('txt_content')));
		if ($this->email->send()) {
			 echo ('<script>
				    window.alert("Email Send..");
				    window.location.href="'.base_url().'";
				    </script>');
		} else {
		echo ('<script>
		    window.alert("Email Failed..");
		    window.location.href="'.base_url().'";
		    </script>');
		}
	}

	public function get_new_notif()
	{
		$view = $this->input->post('view');
		echo $view;
		$output = "";
		if($view != '')
		{
			$upd = $this->hm->update_notif();
		}
		else
		{
			$get_notif = $this->hm->get_notif('data');
			// echo $get_notif->num_rows()."asdjkasjkd";exit;
			if($get_notif->num_rows() > 0)
			{
				$total_notif = $this->hm->get_notif('total')->num_rows();
				$output .= '<li class="header">You have '.$total_notif.' Notification</li>';
				$limit = 0;
				foreach($get_notif->result() as $g => $m)
				{
					date_default_timezone_set("Asia/Jakarta");
					$awal1  = date('Y-m-d h:i:sa',strtotime($m->create_date)); //waktu awal
					$akhir2 = date('Y-m-d h:i:sa',strtotime(date('Y-m-d h:i:sa'))); //waktu akhir
					$awal = strtotime($awal1);
					$akhir = strtotime($akhir2);
					$diff  = $akhir - $awal;
					$jam   = floor($diff / (60 * 60));
					$menit = $diff - $jam * (60 * 60);
					
					if($jam > 24)
					{
						$time = 'Yesterday';
					}
					elseif($diff / (60 * 60) > 1)
					{
						$time = 'Today';
					}
					else
					{
						$time = $jam .' jam, ' . floor( $menit / 60 ) . ' menit';
					}

						$output .= '
								   <li>
								   <ul class="menu">
								   <li>
				                    <a href="'.base_url($m->url).'">
				                      <div class="pull-left">
				                        <img src="'.base_url($m->img).'" class="img-circle" alt="User Image">
				                      </div>
				                      <h4>
				                        '.$m->title.'
				                        <small><i class="fa fa-clock-o"></i> '.$time.'</small>
				                      </h4>
				                      	'.$m->content.'
				                    </a>
				                  </li>
				                  </ul>
				                  </li>
								   ';
					
				}
				$output   .= '<li class="footer"><a href="'.base_url('/notification').'">See All Data</a></li>';
			}
			else
			{
				 $output .= '
   						  <li class="footer"><a href="#">Tidak ada data terbaru</a></li>
   						  <li class="footer"><a href="'.base_url('/notification').'"><b>See All Data</b></a></li>';
				// $output   .= '<li class="footer"><a href="'.base_url('/report_donasi').'">See All Messages</a></li>';
			}
			
			$data = array(
			    'notification' => $output,
			    'unseen_notification'  => $total_notif
			);
			// print_r($data);exit;
			echo json_encode($data);
		}
	}

	public function get_new_notif2()
	{
		$view = $this->input->post('view');
		$output = "";
		if($view != '')
		{
			// $upd = $this->pm->update_message();
		}
		else
		{
			$get_notif = $this->hm->get_notif();
			// echo $get_notif->num_rows()."asdjkasjkd";exit;
			if($get_notif->num_rows() > 0)
			{
				$total_notif = $this->hm->get_notif()->num_rows();
				$output .= '<li class="header">You have '.$total_notif.' Notification</li>';
				$limit = 0;
				foreach($get_notif->result() as $g => $m)
				{
					date_default_timezone_set("Asia/Jakarta");
					$awal1  = date('Y-m-d h:i:sa',strtotime($m->tgl_dibuat)); //waktu awal
					$akhir2 = date('Y-m-d h:i:sa',strtotime(date('Y-m-d h:i:sa'))); //waktu akhir
					$awal = strtotime($awal1);
					$akhir = strtotime($akhir2);
					$diff  = $akhir - $awal;
					$jam   = floor($diff / (60 * 60));
					$menit = $diff - $jam * (60 * 60);
					
					if($jam > 24)
					{
						$time = 'Yesterday';
					}
					elseif($diff / (60 * 60) > 1)
					{
						$time = 'Today';
					}
					else
					{
						$time = $jam .' jam, ' . floor( $menit / 60 ) . ' menit';
					}

						$output .= '
								   <li>
								   <ul class="menu">
								   <li>
				                    <a href="'.base_url('report_donasi/show_detail/'.$m->dd_id).'">
				                      <div class="pull-left">
				                        <img src="'.base_url($m->dpn_img).'" class="img-circle" alt="User Image">
				                      </div>
				                      <h4>
				                        '.$m->dpn_fullname.'
				                        <small><i class="fa fa-clock-o"></i> '.$time.'</small>
				                      </h4>
				                      <p> Transfer di Tanggal <b>'.$m->trf_setiap_tgl.'</b> Setiap Bulan</p>
				                      <p>Donatur <b>'.$m->dpd_fullname.'</b></p>
				                    </a>
				                  </li>
				                  </ul>
				                  </li>
								   ';
					
				}
				$output   .= '<li class="footer"><a href="'.base_url('/report_donasi').'">See All Data</a></li>';
			}
			else
			{
				 $output .= '
   						  <li class="footer"><a href="#">Tidak ada data terbaru</a></li>
   						  <li class="footer"><a href="'.base_url('/report_donasi').'"><b>See All Data</b></a></li>';
				// $output   .= '<li class="footer"><a href="'.base_url('/report_donasi').'">See All Messages</a></li>';
			}
			
			$data = array(
			    'notification' => $output,
			    'unseen_notification'  => $get_notif->num_rows()
			);
			// print_r($data);exit;
			echo json_encode($data);
		}
	}

	public function get_new_donatur()
	{
		// return $this->hm->get_new_donatur();
	}
}