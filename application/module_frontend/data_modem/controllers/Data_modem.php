<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_modem extends MY_Controller {
	function __construct()
	{
		parent::__construct(array(
			//kalau mau menghilangkan validasi ganti menjadi FALSE
			'auth' => TRUE
		));
		$this->load->model('data_modem_model','dmm');
		$this->load->library('pagination');
	}

	public function index($src = array())
	{
		$get_properties = $this->db_home->get_properties($this->uri->segment(1));

		$bs =  explode("/",base_url());

		$upload_dir = str_replace($bs[4].DIRECTORY_SEPARATOR,'' , FCPATH);
	
		$file_path = $upload_dir."assets".DIRECTORY_SEPARATOR."gammu".DIRECTORY_SEPARATOR;
		
		// echo $upload_dir;exit;
		$display = "";
		$data = array();
		if ($get_properties && $get_properties->num_rows() > 0)
		{	

			$row_properties = $get_properties->row();
			$this->store_params['title'] = $this->store_params['title2'] = $row_properties->caption;
			$this->store_params['page_active'] = $row_properties->caption;
			$this->store_params['page_icon'] = $row_properties->icon;
			$this->store_params['source_top'] = array(
				'<link rel="stylesheet" href="'.base_url('assets/templates/admin').'/bower_components/datatables.net-bs/css/dataTables.bootstrap.css">'
			);
			$this->store_params['source_bot'] = array(
				'<script src="'.base_url('assets/js/admin').'/data_modem.js"></script>',
				'<script src="'.base_url('assets/templates/admin').'/bower_components/datatables.net-bs/js/dataTables.bootstrap.js"></script>',
				'<script> function delete_data(delete_url){$("#deleteModal").modal("show", {backdrop: "static"});
      			document.getElementById("deleteemployee").setAttribute("href" , delete_url);
    			}</script>'

			);
			$maxmodem = 8;
			$sum = 0;
			for($i=1; $i<=$maxmodem; $i++)
			{
				if (is_file($file_path.'smsdrc'.$i))
				{
					$sum++;
				}	
			}

			if($sum == 0)
			{
				$data = array();
			}
			else
			{
				$count = 0;
				for($i=1; $i<=$maxmodem; $i++)
				{
					if (is_file($file_path.'smsdrc'.$i))
					{
							$count++;
							$handle = @fopen($file_path."smsdrc".$i, "r");
							if ($handle) 
							{
								while (!feof($handle)) 
								{
									$buffer = fgets($handle);
									if (substr_count($buffer, 'port = ') > 0)
									{
										$split = explode("port = ", $buffer);
										$port = $split[1];
									}
									if (substr_count($buffer, 'phoneid = ') > 0)
									{
										$split = explode("phoneid = ", $buffer);
										$phone = $split[1];
									}
									if (substr_count($buffer, 'connection = ') > 0)
									{
										$split = explode("connection = ", $buffer);
										$conn = $split[1];
									}
								}
							}
						
						$data[$sum]['id'] = $count;
						$data[$sum]['phone_id'] = $phone;
						$data[$sum]['port'] = $port;
						$data[$sum]['connection'] = $conn;
						$data[$sum]['send'] = $this->getParam('send', $i);
						$data[$sum]['receive'] = $this->getParam('receive', $i);
						$sum++;
						
					}	
				}
			}
			// echo $sum;exit;
			// print_r($data);exit;
			if($sum == 0) {$sum = 1;}
			else
				{$sum = $sum;}
			$this->store_params['data'] = $data;
			$this->store_params['smsdrc'] = 'smsdrc'.$sum;
			$this->store_params['display'] = $display;

			$this->view('data_modem_view');
		}
		else
		{
			show_404();
		}
	}

	function getParam($x, $i)
	{
		$bs =  explode("/",base_url());
		$upload_dir = str_replace($bs[4].DIRECTORY_SEPARATOR,'' , FCPATH);	
		$file_path = $upload_dir."assets".DIRECTORY_SEPARATOR."gammu".DIRECTORY_SEPARATOR;
		

		$handle = @fopen($file_path."smsdrc".$i, "r");
		if ($handle) 
		{
			while (!feof($handle)) 
			{
				$buffer = fgets($handle);
				if (substr_count($buffer, $x.' = ') > 0)
				{
					$split = explode($x." = ", $buffer);
					$param = str_replace(chr(13).chr(10), "", $split[1]);
				}
			}
		}		
		fclose($handle);
		return $param;
	}

	public function input_action()
	{
		$maxmodem = 8;
		$bs =  explode("/",base_url());
		$upload_dir = str_replace($bs[4].DIRECTORY_SEPARATOR,'' , FCPATH);	
		$file_path = $upload_dir."assets".DIRECTORY_SEPARATOR."gammu".DIRECTORY_SEPARATOR;

		$dbuser = $this->input->post('txt_user');
		$dbpass = $this->input->post('txt_pass');
		$dbname = $this->input->post('txt_db_name');
		// $imei = $this->input->post('txt_imei');

		$id = str_replace(" ","-",$this->input->post('txt_id'));
		$smsdrc = $this->input->post('smsdrc');
		$port = strtolower(str_replace(" ","", $this->input->post('txt_port')));
		$connection = strtolower(str_replace(" ","", $this->input->post('connection')));
		$send = 'yes';
		$receive = 'yes';
		$path = str_replace('admin/index.php', 'assets/gammu/', $_SERVER['SCRIPT_FILENAME']);
		// echo $path;exit;
		$handle = @fopen($file_path.$smsdrc, "w");
		$text = "[gammu]
			# isikan no port di bawah ini
			port = ".$port.":
			# isikan jenis connection di bawah ini
			connection = ".$connection."

			[smsd]
			service = mysql
			logfile = ".$path."log".$smsdrc."
			debuglevel = 0
			phoneid = ".$id."
			commtimeout = 30
			sendtimeout = 600
			send = ".$send."
			receive = ".$receive."
			checksecurity = 0
			#PIN = 1234

			# -----------------------------
			# Konfigurasi koneksi ke MySQL
			# -----------------------------
			pc = localhost

			# isikan user untuk akses ke MySQL
			user = ".$dbuser."
			# isikan password user untuk akses ke MySQL
			password = ".$dbpass."
			# isikan nama database untuk Gammu
			database = ".$dbname."\n";

		fwrite($handle, $text);
		fclose($handle);

		$string = "";
		$j = 0;
		for($i=1; $i<=$maxmodem; $i++)
		{
			if (is_file($file_path.'smsdrc'.$i))
			{
				$handle = @fopen($file_path."smsdrc".$i, "r");
				if ($handle) 
				{
					while (!feof($handle)) 
					{
						$buffer = fgets($handle);
						if (substr_count($buffer, 'port = ') > 0)
						{
							$split = explode("port = ", $buffer);
							$port = $split[1];
						}
						if (substr_count($buffer, 'connection = ') > 0)
						{
							$split = explode("connection = ", $buffer);
							$connection = $split[1];
					}
					}
				}		
				fclose($handle);
				if ($j==0) $string .= "[gammu]\nport = ".$port."connection = ".$connection."\n";
				else $string .= "[gammu".($j)."]\nport = ".$port."connection = ".$connection."\n";
				$j++;
			}	
		}
		$handle = @fopen($file_path."gammurc", "w");
		fwrite($handle, $string);
		fclose($handle); 

        // $data_phone['ID'] = $id;
        // $data_phone['IMEI'] = $imei;

        // $input_phone_detail = $this->dmm->do_upload($data_phone,'phones');

        echo json_encode(array(
        	"status" => TRUE,
        	"url" => base_url('data_modem')
        ));	
	}  
	
	public function cek_koneksi($idDrc)
	{
		$bs =  explode("/",base_url());
		$upload_dir = str_replace($bs[4].DIRECTORY_SEPARATOR,'' , FCPATH);	
		$file_path = $upload_dir."assets".DIRECTORY_SEPARATOR."gammu".DIRECTORY_SEPARATOR;
		
		$id = (($idDrc-1) == 0) ? 0 : ($idDrc-1);
		// echo "gammu -s ".$id." -c gammurc identify";exit;
		// var_dump($idDrc);exit;
		echo "<p><b>Status Koneksi Phone/Modem ".$idDrc."</b></p>";
		echo "<pre>";
	    passthru($file_path."gammu -s ".$id." -c ".$file_path."gammurc identify", $hasil);
	    echo "</pre>";
	}

	public function do_service($idDrc)
	{
		$bs =  explode("/",base_url());
		$upload_dir = str_replace($bs[4].DIRECTORY_SEPARATOR,'' , FCPATH);	
		$file_path = $upload_dir."assets".DIRECTORY_SEPARATOR."gammu".DIRECTORY_SEPARATOR;
		
		$idphone = preg_replace("/[^a-zA-Z0-9]+/", '', $this->getParam('id', $idDrc));
		echo "<p><b>Status Service Phone/Modem: ".$idphone."</b></p>";
		echo "<pre>";
		// var_dump($idphone); exit;
	    exec($file_path."gammu-smsd -n ".$idphone." -k", $hasil);
		exec($file_path."gammu-smsd -n ".$idphone." -u", $hasil);
		// echo $file_path."gammu-smsd -c ".$file_path."smsdrc".$idDrc." -n ".$idphone." -i"; exit;
		passthru($file_path."gammu-smsd -c ".$file_path."smsdrc".$idDrc." -n ".$idphone." -i");
		exec("sc config ".$idphone." start= demand");
	    echo "</pre>";
	}

	public function del_service($id)
	{
		$maxmodem = 8;
		$bs =  explode("/",base_url());
		$upload_dir = str_replace($bs[4].DIRECTORY_SEPARATOR,'' , FCPATH);	
		$file_path = $upload_dir."assets".DIRECTORY_SEPARATOR."gammu".DIRECTORY_SEPARATOR;

		if(is_file($file_path."logsmsdrc".$id)) unlink($file_path."logsmsdrc".$id);
		exec($file_path."gammu-smsd -n ".$this->getParam('id', $id)." -k", $hasil);
		exec($file_path."gammu-smsd -n ".$this->getParam('id', $id)." -u", $hasil);
		unlink($file_path."smsdrc".$id);
		
		$string = "";
		$j = 0;
		for($i=1; $i<=$maxmodem; $i++)
		{
			if (is_file($file_path.'smsdrc'.$i))
			{
				$handle = @fopen($file_path."smsdrc".$i, "r");
				if ($handle) 
				{
					while (!feof($handle)) 
					{
						$buffer = fgets($handle);
						if (substr_count($buffer, 'port = ') > 0)
						{
							$split = explode("port = ", $buffer);
							$port = $split[1];
						}
						if (substr_count($buffer, 'connection = ') > 0)
						{
							$split = explode("connection = ", $buffer);
							$connection = $split[1];
						}
					}
				}		
				fclose($handle);
				if ($j==0) $string .= "[gammu]\nport = ".$port."connection = ".$connection."\n";
				else $string .= "[gammu".($j)."]\nport = ".$port."connection = ".$connection."\n";
				$j++;
			}	
		}
		$handle = @fopen($file_path."gammurc", "w");
		fwrite($handle, $string);
		fclose($handle);
	}

	public function get_new_inbox()
	{
		// get new data from inbox
		$get_inbox = $this->dmm->get_inbox(array('Processed' => 'false'));
		// print_r($get_inbox->result_array());exit;
		$get_data_modem = $this->dmm->get_data_modem()->row();
		if($get_inbox->num_rows() > 0)
		{
			foreach($get_inbox->result() as $get => $gi)
			{
				$id = $gi->ID;
				$data_send['DestinationNumber'] = $gi->SenderNumber;   
				$data_send['SenderID'] = $get_data_modem->ID;   
				// membaca pesan SMS dan mengubahnya menjadi kapital
				$pesan = strtoupper($gi->TextDecoded);
				// $pesan = "ABSEN 8754548";
				$pecah = explode(" ",$pesan);
				
				if($pecah[0] == 'ABSEN')
				{
					$nisn = $pecah[1];
					$get_data_siswa = $this->dmm->get_data_siswa(array('ds.nisn' => $nisn));
					if($get_data_siswa->num_rows() > 0)
					{						
						$cek = $get_data_siswa->row();
						$date = ( ! empty($this->input->post('tanggal')) ? $this->input->post('tanggal') : date('Y-m-d'));
						$get_mapel = $this->dmm->get_mapel_ruangan(array('das.ruangan_id' => $cek->ruangan_id,'dam.tanggal_dibuat' => $date))->result();
						if( ! empty($get_mapel))
						{
							$sel = 'ds.nisn,ds.nama_siswa,dam.tanggal_dibuat,dass.jam_masuk,dass.jam_pulang,';
                			$a=0;
							foreach($get_mapel as $k => $v)
		                	{
		                		$sel .= '(select absen_status from data_absen_mapel dam  
										left join data_guru dg on dg.id = dam.guru_id 
										where dam.data_ajar_siswa_id = das.id and dg.mapel_id = "'.$v->dm_id.'" and tanggal_dibuat = "'.$date.'")  as mp'.$a.',';
										$a++;
		                	}   
		                	$get_data_siswa = $this->dmm->cek_data_for_reply(array('das.ruangan_id' => $cek->ruangan_id,'dam.tanggal_dibuat' => $date,'dass.tanggal' => $date),$sel)->result_array(); 
		                	$no=1;
							if( ! empty($get_data_siswa))
							{
								foreach($get_data_siswa as $v)
								{
									$msg = 'Rekap Absen:'.$v["nama_siswa"].' masuk:'.$v["jam_masuk"].',Pulang:'.$v["jam_pulang"];
									$i=0;
									foreach($get_mapel as $k => $m)
									{
										$msg .= ','.$m->kode_mapel.':'.$v["mp".$i];
										$i++;
									}
									
									$no++;
								}

							}
							
							$data_send['TextDecoded'] = $msg;
						}
					
						else
						{
							$data_send['TextDecoded'] = "No Transaksi anda tidak ditemukan.";
						}						
						
					}
					else
					{
						$data_send['TextDecoded'] = 'NISN Tidak Ditemukan, mohon periksa kembali';
					}
				}
				else
				{
					$data_send['TextDecoded'] = 'Format anda salah mohon ketik format ex : ABSEN NISN';
				}

				$data_send['CreatorID'] = "Gammu 1.28.90";
				// echo var_dump($msg);exit;
				$send_msg = $this->dmm->do_upload($data_send,'outbox');
				$upd_inbox = $this->dmm->do_update(array('Processed' => 'true'),array('ID' => $id),'inbox');
					
			}
		}
	}

	public function get_data_phone()
	{
		$get_phone = $this->dmm->get_data_modem()->result();
		foreach($get_phone as $gp =>$ph)
		{
			echo '<option value="'.$ph->ID.'">'.$ph->ID.'</option>';
		}
	}

	public function kirim_pesan()
	{
		$data_out['DestinationNumber'] = $this->input->post('txt_no_tujuan');
		$data_out['SenderID'] = $this->input->post('phone_id');
		$data_out['TextDecoded'] = $this->input->post('txt_pesan');
		$data_out['CreatorID'] = 'Gammu 1.28.90';

		$inpu_data = $this->dmm->do_upload($data_out,'outbox');
		
		echo json_encode(array(
        	"status" => TRUE,
        	"url" => base_url('data_modem')
        ));	
	}

	public function delete()
	{
		$id = $this->uri->segment(3);

		$get_before_update = $this->dbkm->get_data_any_table(array('id'=>$id),'data_barang_keluar')->row();
		$status = ($get_before_update->is_active == 'Y') ? 'N' : 'Y';
		$delete_barang_keluar = $this->dbkm->delete(array('is_active' => $status),$id,'data_barang_keluar');
		
		//update data stok
		$get_data_stok = $this->dbkm->get_data_any_table(array('kode_barang'=>$get_before_update->kode_barang),'data_barang')->row();
		$new_stok = $get_data_stok->stok + $get_before_update->jml_barang;

		$update_stok_barang_keluar = $this->dbkm->do_update(array('stok' => $new_stok),array('kode_barang' => $get_data_stok->kode_barang),'data_barang');

		 redirect(base_url('data_barang_keluar'), 'refresh');
	}

	public function delete_image()
	{
		$id = $this->input->post('id_berkas');
		$id_data_barang_keluar = $this->input->post('id_barang_keluar');

		$upload_dir = str_replace('admin'.DIRECTORY_SEPARATOR,'' , FCPATH);
		$img_path = $upload_dir."assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."berkas_barang_keluar";

		$get_img = $this->dbkm->get_img_berkas(array('id' => $id))->row();

		$old_img = substr($get_img->path_berkas, 30);
		
      	unlink($img_path.DIRECTORY_SEPARATOR.$old_img);
	    $delete_img_berkas = $this->dbkm->del_img_berkas(array('id' =>$id));

	    $berkas = $this->dbkm->get_img_berkas(array('id_barang_keluar' => $id_data_barang_keluar));

	    if($berkas->num_rows() > 0)
	    {
	    	$j=1;
			$c = count($berkas->result_array());
			foreach ($berkas->result_array() as $f) {							
				$nama_berkas = (isset($f["nama_berkas"])) ? $f["nama_berkas"] : "";
				$id_berkas = (isset($f["id"])) ? $f["id"] : "";
				$path_berkas = (isset($f["path_berkas"])) ? base_url($f["path_berkas"]) : "";

				echo '<section class="col-lg-6 connectedSortable ui-sortable after-add-input"">';
             		echo '<div class="form-group">';
						echo '<label for="txtemail">Nama Berkas:</label>';
							echo '<input type="text" class="form-control"  name="txt_nama_berkas[]" placeholder="Nama Berkas (ex : SKTM, Surat Kematian Orangtua)...." 
							value="'.$nama_berkas.'">';
							echo '<input type="hidden" id="txtIdBerkas" name="txt_id_berkas[]" value="'.$id_berkas.'">';
					echo '</div>';
					echo '<div class="form-group">';
						echo '<label for="txtemail">Berkas:</label>';
							echo '<input type="file" id="txtFile" name="txt_file[]">';
							echo '<img onclick="showImage("'.$path_berkas.'")" src="'.$path_berkas.'" style="width:100%;max-width: 100px">';
							echo '<input type="hidden" id="txt_file_old" value="'.$path_berkas.'">';
					echo '</div>';
					if($j == $c) {
					 echo '<button class="btn btn-default fa fa-trash remove-child" type="button" onclick="removedataberkas(this,'.$id_berkas.')"></button>';
					 echo '<button class="btn btn-success add-input fa fa-plus" type="button"></button>';
					}
					else
					{
						echo '<button class="btn btn-default fa fa-trash remove-child" type="button" onclick="removedataberkas(this,'.$id_berkas.')"></button>';
					}
					
				echo '</section>';
			$j++;
			}
	    }
	    // redirect(base_url('data_barang_keluar/cu_action/edit/'.$id_data_barang_keluar), 'refresh');
	}
}