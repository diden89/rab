<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ajar_siswa extends MY_Controller {
	function __construct()
	{
		parent::__construct(array(
			//kalau mau menghilangkan validasi ganti menjadi FALSE
			'auth' => TRUE
		));
		$this->load->model('data_ajar_siswa_model','dasm');
		$this->load->library('pagination');
	}

	public function index($src = array())
	{
		$get_properties = $this->db_home->get_properties($this->uri->segment(1));

		if ($get_properties && $get_properties->num_rows() > 0)
		{	
			$total_data =  $this->dasm->get_data($limit = "",$start = "",$src)->num_rows();
			//pagination
			//konfigurasi pagination

	        $config['base_url'] = base_url('data_ajar_siswa/index'); //site url
	        $config['total_rows'] = $total_data; //total row
	        $config['per_page'] = 7;  //show record per halaman
	        $config["uri_segment"] = 3;  // uri parameter
	        $choice = $config["total_rows"] / $config["per_page"];
	        $config["num_links"] = floor($choice);

	         // Membuat Style pagination untuk BootStrap v4
	     	$config['first_link']       = 'First';
	        $config['last_link']        = 'Last';
	        $config['next_link']        = 'Next';
	        $config['prev_link']        = 'Prev';
	        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	        $config['full_tag_close']   = '</ul></nav></div>';
	        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	        $config['num_tag_close']    = '</span></li>';
	        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['prev_tagl_close']  = '</span>Next</li>';
	        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	        $config['first_tagl_close'] = '</span></li>';
	        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['last_tagl_close']  = '</span></li>';
	 
	        $this->pagination->initialize($config);
	       	$this->store_params['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	 		$this->store_params['number_data'] = ($this->uri->segment(3)) ? $this->uri->segment(3)+1 : 1;
	        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 

			$row_properties = $get_properties->row();
			$get_data = $this->dasm->get_data($config['per_page'],$this->store_params['page'],$src);

			$this->store_params['pagination'] = $this->pagination->create_links();
			// print_r($this->store_params['pagination']);exit;
			$this->store_params['title'] = $this->store_params['title2'] = $row_properties->caption;
			$this->store_params['page_active'] = $row_properties->caption;
			$this->store_params['page_icon'] = $row_properties->icon;
			$this->store_params['source_top'] = array(
				'<link rel="stylesheet" href="'.base_url('assets/templates/admin').'/bower_components/datatables.net-bs/css/dataTables.bootstrap.css">',
				'<link rel="stylesheet" href="'.base_url('assets/templates/admin').'/plugins/summernote/0.8.12/summernote.css">'
			);
			$this->store_params['source_bot'] = array(
				'<script src="'.base_url('assets/js/admin').'/data_ajar_siswa.js"></script>',
				'<script src="'.base_url('assets/templates/admin').'/plugins/summernote/0.8.12/summernote.min.js"></script>',
				'<script src="'.base_url('assets/templates/admin').'/bower_components/datatables.net-bs/js/dataTables.bootstrap.js"></script>',
				'<script> function delete_data(delete_url){$("#deleteModal").modal("show", {backdrop: "static"});
      			document.getElementById("deletedata").setAttribute("href" , delete_url);
    			}</script>',
    			'<script>
    				function showImage(img_src){
    					$("#mymodal").modal("show", {backdrop: "static"});
    					document.getElementById("img01").setAttribute("src" , img_src);
    					// document.getElementById("img01").setAttribute("width" , "500px");
    				}
    			</script>',
    			'<script src="'.base_url('assets/templates/admin').'/bower_components/autocomplete/typeahead.js"></script>',
			);
			$this->store_params['data'] = $get_data->result();
			$this->store_params['jurusan'] = $this->dasm->get_any_data(array('is_active' => 'Y'),'id','data_jurusan')->result();
			$this->store_params['tahun_ajar'] = $this->dasm->get_any_data(array('is_active' => 'Y'),'id','data_tahun_ajar')->result();
			$this->store_params['data_siswa_ajar'] = $this->dasm->get_data_siswa_ajar(array('das.is_active' => 'Y'))->result();
			// print_r($this->store_params['data']);exit;
			// $this->view('modal_projects');
			$this->view('data_ajar_siswa_view');
		}
		else
		{
			show_404();
		}
	}

	public function input_action()
	{
    	$siswa_id = $this->input->post('siswa_id');	

    	for($i=0;$i < count($siswa_id);$i++)
    	{
    		$params['siswa_id'] = $siswa_id[$i];
    		$params['kelas_id'] = $this->input->post('txt_kelas_id');
    		$params['ruangan_id'] = $this->input->post('txt_ruangan');
    		$params['tahun_ajar_id'] = $this->input->post('txt_tahun_ajar');

    		$upl = $this->dasm->do_upload($params,'data_ajar_siswa');
    	}	

		echo json_encode(array(
        	"status" => TRUE,
        	"url" => base_url('data_ajar_siswa')
        ));
		
	}
	
	public function get_data_kelas()
	{

		$query = $this->input->post('query');
		$nama_kelas = $this->dasm->get_data_kelas($query);

		if($nama_kelas->num_rows() > 0)
		{
			foreach($nama_kelas->result_array() as $p)
			{
				$jur[] = $p;
				// $jur[]['dk'] = $p['dk_id'];
			}
		
			echo json_encode($jur);
		}
	}
	public function show_filter_data_ajar()
	{
		$wh= array();
		if(! empty($this->input->post('thn_ajar')))
		{
			$wh['das.tahun_ajar_id'] = $this->input->post('thn_ajar');
		}
		if(! empty($this->input->post('id_jurusan')))
		{
			$wh['dj.id'] = $this->input->post('id_jurusan');
		}
		if(! empty($this->input->post('id_kelas')))
		{
			$wh['das.kelas_id'] = $this->input->post('id_kelas');
		}

		if(! empty($this->input->post('id_ruangan')))
		{
			$wh['das.ruangan_id'] = $this->input->post('id_ruangan');
		}
// print_r($wh);exit;
		$data = $this->dasm->get_data_siswa_ajar($wh)->result();

		if( ! empty($data))
        {   
            $no=1;
            foreach($data as $k => $n)
            {
                echo '<tr>';
                echo '<td>'.$no.'</td>';
                echo '<td>'.$n->tahun_ajar.'</td>';
                echo '<td>'.$n->nisn.'</td>';
                echo '<td>'.ucwords($n->nama_siswa).'</td>';
                echo '<td>'.ucwords($n->nama_jurusan).'</td>';
                echo '<td>'.strtoupper($n->nama_kelas).'</td>';
                echo '<td>'.strtoupper($n->nama_ruangan).'</td>';
                ?>
                <td style="text-align: center;">
                    <button type="button" onclick="delete_data('<?php echo base_url();?>data_ajar_siswa/delete/<?php echo $n->das_id;?>')" class="fa btn btn-outline-secondary fa-trash"></button>
                </td> 
                <?php
                echo '</tr>';
                $no++;
            }

        }
        else
        {
            echo '<tr>';
            echo '<td colspan="8">Tidak Ada Data Siswa!!!</td>';
            echo '</tr>';
        }
	}

	public function get_select_kelas()
	{

		$id_jur = $this->input->post('id_jurusan');
		$nama_kelas = $this->dasm->get_any_data(array('jurusan_id' => $id_jur),'nama_kelas','data_kelas');

		if($nama_kelas->num_rows() > 0)
		{	
			echo '<option value="">--Pilih Kelas--</option>';
			foreach($nama_kelas->result() as $nk => $n)
			{
				echo '<option value="'.$n->id.'">'.$n->nama_kelas.'</option>';
			}
	
		}
	}

	public function get_select_ruangan()
	{

		$id_kelas = $this->input->post('id_kelas');
		$nama_ruangan = $this->dasm->get_any_data(array('kelas_id' => $id_kelas),'nama_ruangan','data_ruangan');

		if($nama_ruangan->num_rows() > 0)
		{	
			echo '<option value="">--Pilih Ruangan--</option>';
			foreach($nama_ruangan->result() as $nk => $n)
			{
				echo '<option value="'.$n->id.'">'.$n->nama_ruangan.'</option>';
			}
	
		}
	}
	public function show_data_siswa()
	{

		$id_kelas = $this->input->post('id_kelas');
		$id_jur = $this->input->post('id_jurusan');

		$cek_data_ajar_siswa = $this->dasm->get_any_data(array('kelas_id' => $id_kelas),"",'data_ajar_siswa');
		if($cek_data_ajar_siswa->num_rows() > 0)
		{
			foreach ($cek_data_ajar_siswa->result() as $k => $v) 
			{
				$data_id_siswa_ajar['siswa_id'][] = $v->siswa_id;				
			}

			$get_data_siswa = $this->dasm->get_data_siswa_other($data_id_siswa_ajar,array('ds.kelas_id' => $id_kelas,'ds.jurusan_id' => $id_jur));

			if($get_data_siswa->num_rows() > 0)
			{	
				$no=1;
				foreach($get_data_siswa->result() as $nk => $n)
				{
					echo '<tr>';
					echo '<td>'.$no.'</td>';
					echo '<td>'.$n->nisn.'</td>';
					echo '<td>'.ucwords($n->nama_siswa).'</td>';
					echo '<td>'.strtoupper($n->nama_kelas).'</td>';
					echo '<td style="width:50px;text-align:center;"><input type="checkbox" value="'.$n->ds_id.'" name="siswa_id[]"></td>';
					echo '</tr>';
					$no++;
				}

			}
			else
			{
				echo '<tr>';
				echo '<td colspan="5">Tidak Ada Data Siswa!!!</td>';
				echo '</tr>';
			}
		}
		else
		{
			$data_siswa = $this->dasm->get_data_siswa(array('ds.kelas_id' => $id_kelas,'ds.jurusan_id' => $id_jur));

			if($data_siswa->num_rows() > 0)
			{	
				$no=1;
				foreach($data_siswa->result() as $nk => $n)
				{
					echo '<tr>';
					echo '<td>'.$no.'</td>';
					echo '<td>'.$n->nisn.'</td>';
					echo '<td>'.ucwords($n->nama_siswa).'</td>';
					echo '<td>'.strtoupper($n->nama_kelas).'</td>';
					echo '<td style="width:50px;text-align:center;"><input type="checkbox" value="'.$n->ds_id.'" name="siswa_id[]"></td>';
					echo '</tr>';
					$no++;
				}		
			}
			else
			{
				echo '<tr>';
				echo '<td colspan="5">Tidak Ada Data Siswa!!!</td>';
				echo '</tr>';
			}
		}
	}

	public function delete()
	{
		$id = $this->uri->segment(3);

		$del = $this->dasm->delete('data_ajar_siswa',array('id' => $id));
		redirect(base_url('data_ajar_siswa'), 'refresh');
	}

	public function delete_image()
	{
		$id = $this->input->post('id_berkas');
		$id_data_ajar_siswa = $this->input->post('id_pendonor');

		$upload_dir = str_replace('admin'.DIRECTORY_SEPARATOR,'' , FCPATH);
		$img_path = $upload_dir."assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."berkas_pendonor";

		$get_img = $this->dasm->get_img_berkas(array('id' => $id))->row();

		$old_img = substr($get_img->path_berkas, 30);
		
      	unlink($img_path.DIRECTORY_SEPARATOR.$old_img);
	    $delete_img_berkas = $this->dasm->del_img_berkas(array('id' =>$id));

	    $berkas = $this->dasm->get_img_berkas(array('id_pendonor' => $id_data_ajar_siswa));

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
	    // redirect(base_url('data_ajar_siswa/cu_action/edit/'.$id_data_ajar_siswa), 'refresh');
	}
}