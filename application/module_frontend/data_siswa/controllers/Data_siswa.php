<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_siswa extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('data_siswa_model','dsm');
		$this->load->library('pagination');
	}

	public function index()
	{
		$get_properties = $this->db_home->get_properties($this->uri->segment(1));

		if ($get_properties && $get_properties->num_rows() > 0)
		{	
			$total_data =  $this->dsm->get_data($limit = "",$start = "")->num_rows();
			//pagination
			//konfigurasi pagination

	        $config['base_url'] = base_url('data_siswa/index'); //site url
	        $config['total_rows'] = $total_data; //total row
	        $config['per_page'] = 10;  //show record per halaman
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
	       
			$row_properties = $get_properties->row();
			$get_data = $this->dsm->get_data($config['per_page'],$this->store_params['page']);

			$this->store_params['pagination'] = $this->pagination->create_links();
			$this->store_params['title'] = $this->store_params['title2'] = $row_properties->caption;
			$this->store_params['page_active'] = $row_properties->caption;
			$this->store_params['page_icon'] = $row_properties->icon;
			$this->store_params['data'] = $get_data->result();
			$this->store_params['source_top'] = array(
				'<link rel="stylesheet" href="'.base_url('assets/templates/admin').'/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">'
			);
			$this->store_params['source_bot'] = array(
				'<script src="'.base_url('assets/templates/admin').'/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>',
				'<script src="'.base_url('assets/js/admin').'/data_siswa.js"></script>',
				'<script> function delete_data(delete_url){$("#deleteModal").modal("show", {backdrop: "static"});
      			document.getElementById("deletedata").setAttribute("href" , delete_url);
    			}</script>',
			);
			$this->view('data_siswa_view');
		}
		else
		{
			show_404();
		}
	}

	public function search_data()
	{
		$src = "";
		$like = array();
		$start = "";
		$limit = "";

		if( ! empty($this->input->post('searchdata')))
		{
			$like = $this->input->post('searchdata');
		}

		if( ! empty($this->input->post('data')))
		{
			$start = 0;
			$limit = $this->input->post('data');
		}
		
		// print_r($like);
		// exit;
		
		$data = $this->dsm->get_data($limit,$start,$src,$like);
		
		// echo '<table id="dtHorizontalExampleWrapper" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">';
    	echo '<thead>';	
		echo '<tr role="row">';
		echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
			No
		</th>';
		echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;">
			NISN Siswa
				</th>';
		echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;">
					Nama Siswa
				</th>';
		echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; ">
					Tempat, Tanggal Lahir
				</th>';
        echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; ">
                Alamat
                 </th>';
        echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; ">
                Jenis Kelamin
                </th> ';
        echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 70px; ">
                Agama
                </th> '; 
        echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 70px; ">
                Foto
                </th> '; 
        echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; ">
                Action
                </th>    					
			</tr>
        </thead>';
       
		if( ! empty($data))
		{			
			$no = $number_data;
            foreach($data->result() as $dt => $d){
                $img = ( ! empty($d->img)) ? base_url($d->img) : "";
                ?>
                <tr role="row" class="odd">
                <td><?php echo $no; ?></td>
                <td class=""><?php echo $d->ds_nisn; ?></td>
                <td class=""><?php echo $d->nama_siswa; ?></td>
                <td><?php echo $d->tempat_lahir.', '.date('d-m-Y',strtotime($d->tanggal_lahir)) ; ?></td>
                <td class=""><?php echo $d->ds_alamat_siswa; ?></td>
                <td class=""><?php echo (($d->jenis_kelamin == 'L') ? 'Laki-Laki' : 'Perempuan'); ?></td>
                <td class=""><?php echo $d->agama; ?></td>                        
                <td class=""><img src='<?php echo $img ?>' width="55px"></td>
                <td style="text-align:center;"> 
                <a href="<?php echo base_url('data_siswa/cu_action/edit/'.$d->ds_id.'');?>" class="fa btn btn-success fa-pencil"></a>
                <button type="button" onclick="delete_data('<?php echo base_url();?>data_siswa/delete/<?php echo $d->ds_id;?>')" class="fa btn btn-danger fa-trash"></a> 
                </td>
                </tr>
                <?php 
                $no++;
            } 
		}
		else
		{
			echo '<tbody>';
			echo '<tr role="row" class="odd">';
			echo '<td colspan="9" style="text-align:center;">Data Tidak Ditemukan !!!</td>';
			echo '</tr>';
			echo '</tbody>';
		}
		
		// echo '</table>';

		// $this->index($src);
	}


	public function cu_action($cond)
	{
		$get_properties = $this->db_home->get_properties($this->uri->segment(1));

		if ($get_properties && $get_properties->num_rows() > 0)
		{	
			$row_properties = $get_properties->row();

			$this->store_params['title'] = $this->store_params['title2'] = $row_properties->caption;
			$this->store_params['page_active'] = $row_properties->caption;
			$this->store_params['page_icon'] = $row_properties->icon;
			$this->store_params['source_top'] = array(
				'<link rel="stylesheet" href="'.base_url('assets/templates/admin').'/plugins/summernote/0.8.12/summernote.css">',
				'<link rel="stylesheet" href="'.base_url('assets/templates/admin').'/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">',
				'<style>
					.datepicker{z-index:-1151;}
				</style>'
			);
			$this->store_params['source_bot'] = array(
				'<script src="'.base_url('assets/templates/admin').'/plugins/summernote/0.8.12/summernote.min.js"></script>',
				'<script src="'.base_url('assets/js/admin').'/data_siswa.js"></script>',
				'<script src="'.base_url('assets/templates/admin').'/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>',
				'<script type="text/javascript">
					 $(function(){
					  $("#txtTanggalLahir").datepicker({
					      format: "dd-mm-yyyy",
					      autoclose: true,
					      todayHighlight: true,

					  });
					 });
					</script>',

			);
			$this->store_params['kelas'] = $this->dsm->get_data_table(array(),'nama_kelas','data_kelas')->result();
			$this->store_params['jurusan'] = $this->dsm->get_data_table(array(),'nama_jurusan','data_jurusan')->result();			
			
			$this->store_params['cond'] = ucwords($cond).' Data Siswa';
			// $this->store_params['datamenu'] = $this->dsm->get_menu()->result_array();
			
			if($cond == 'edit')
			{
				$id = $this->uri->segment(4);
				$get_data_edit = $this->dsm->get_data_edit($id);
				$this->store_params['data'] = $get_data_edit->row();
			}
			
			$this->view('data_siswa_input_view');
			
		}
		else
		{
			show_404();
		}
	}

	public function get_menu_option()
	{
		$is_admin = $this->input->post('is_admin');
		$id_parent_menu = ( ! empty($this->input->post('id_parent_menu'))) ? $this->input->post('id_parent_menu') : "";

		$menu_opt = $this->dsm->get_menu($is_admin);
		
		if($menu_opt->num_rows() > 0){ 
	        echo '<option value="">Pilih Induk</option>'; 
	        foreach($menu_opt->result_array() as $row)
	        {
	        	$sel = ($id_parent_menu == $row['id']) ? 'selected' : '';
	        	if($row['parent_id'] != "" || $row['parent_id'] != null)
	        	{
	        		$get_menu_utama = $this->dsm->get_menu_utama($row['parent_id'])->row();
	            	echo '<option value="'.$row['id'].'"'.$sel.'>'.$get_menu_utama->caption.' > '.$row['caption'].'</option>'; 
	        	}
	        	else
	        	{
	        		echo '<option value="'.$row['id'].'"'.$sel.'>'.$row['caption'].'</option>'; 
	        	}
	        } 
	    }else{ 
	        echo '<option value="">No Data</option>'; 
	    } 
	}

	public function input_action()
	{
		
		$data_siswa['nisn'] = $this->input->post('txt_nisn') ;
	    $data_siswa['nama_siswa'] = $this->input->post('txt_nama_siswa') ;
	    $data_siswa['tempat_lahir'] = $this->input->post('txt_tempat_lahir') ;
	    $data_siswa['tanggal_lahir'] = date('Y-m-d',strtotime($this->input->post('txt_tanggal_lahir'))) ;
	    $data_siswa['jenis_kelamin'] = $this->input->post('jenis_kelamin') ;
	    $data_siswa['agama'] = $this->input->post('agama') ;
	    $data_siswa['alamat'] = $this->input->post('txt_alamat') ;
	    $data_siswa['kelas_id'] = $this->input->post('txt_kelas') ;
	    $data_siswa['jurusan_id'] = $this->input->post('txt_jurusan') ;
	    // print_r($data_siswa);exit;
	    //data oarngtua
		$data_ortu_siswa['nisn'] = $this->input->post('txt_nisn') ;
	    $data_ortu_siswa['nama_ayah'] = $this->input->post('txt_nama_ayah') ;
	    $data_ortu_siswa['nama_ibu'] = $this->input->post('txt_nama_ibu') ;
	    $data_ortu_siswa['no_telp'] = $this->input->post('txt_no_telp') ;
	    $data_ortu_siswa['alamat'] = $this->input->post('txt_alamat_orangtua') ;
	    $data_kartu['card_id'] = $this->input->post('txt_card_id') ;

	    $img_old = $this->input->post('txt_img_old') ;

		$upload_dir = str_replace('admin'.DIRECTORY_SEPARATOR,'' , FCPATH);
	
		$config['upload_path'] = $upload_dir."assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."data_siswa";
        $config['allowed_types'] ='gif|jpg|png|jpeg';

       	$this->load->library('upload',$config);

		if( ! empty($this->input->post('txt_id_siswa')))
		{
			$old_img = substr($this->input->post('txt_img_old'), 24);

			if($this->upload->do_upload('txt_img'))
			{
				$data = array('upload_data' => $this->upload->data());

	            $image_name	 = $data['upload_data']['file_name']; 
	            $data_siswa['img'] = 'assets/images/data_siswa/'.$image_name; 

	            $id = $this->input->post('txt_id_siswa');
	            $id_ortu = $this->input->post('txt_id_ortu');
	            $id_kartu = $this->input->post('txt_kartu_id');

	            $result = $this->dsm->do_update($data_siswa,array('id' =>$id),'data_siswa');
	            $result_ortu = $this->dsm->do_update($data_ortu_siswa,array('id' =>$id_ortu),'data_orangtua_siswa');
	            $result_kartu = $this->dsm->do_update($data_kartu,array('id' =>$id_kartu),'data_kartu');

	            if($old_img !== 'no_image.jpg' && $old_img != "")
	            {
	            	unlink($config['upload_path'].DIRECTORY_SEPARATOR.$old_img);
	            }

	            echo json_encode(array(
	            	"status" => TRUE,
	            	"url" => base_url('data_siswa')
	            ));
			}
			else
			{
	            $id = $this->input->post('txt_id_siswa');
	            $id_ortu = $this->input->post('txt_id_ortu');
	            $id_kartu = $this->input->post('txt_kartu_id');

	            $result = $this->dsm->do_update($data_siswa,array('id' =>$id),'data_siswa');
	            $result_ortu = $this->dsm->do_update($data_ortu_siswa,array('id' => $id_ortu),'data_orangtua_siswa');
	            $result_kartu = $this->dsm->do_update($data_kartu,array('id' => $id_kartu),'data_kartu');

	            echo json_encode(array(
	            	"status" => TRUE,
	            	"url" => base_url('data_siswa')
	            ));
			}

		}
		else
		{	        
	        if($this->upload->do_upload('txt_img')){
	            $data = array('upload_data' => $this->upload->data());	 
	            $image_name	 = $data['upload_data']['file_name']; 
	            $data_siswa['img'] = 'assets/images/data_siswa/'.$image_name; 

	            $result = $this->dsm->do_upload($data_siswa,'data_siswa');
	            $result_ortu = $this->dsm->do_upload($data_ortu_siswa,'data_orangtua_siswa');

	            $data_kartu['id_siswa'] = $result;
	            $result_kartu = $this->dsm->do_upload($data_kartu,'data_kartu');
	            
	            echo json_encode(array(
	            	"status" => TRUE,
	            	"url" => base_url('data_siswa')
	            ));
	        }
	        else
	        {
	        
	            $datas['img'] = 'assets/images/compro/no_image.jpg';

	            $result = $this->dsm->do_upload($data_siswa,'data_siswa');
	            $result_ortu = $this->dsm->do_upload($data_ortu_siswa,'data_orangtua_siswa');

	            $data_kartu['id_siswa'] = $result;
	            $result_kartu = $this->dsm->do_upload($data_kartu,'data_kartu');

	            echo json_encode(array(
	            	"status" => TRUE,
	            	"url" => base_url('data_siswa')
	            ));
	        }
		}
  
	}

	public function get_select_kelas()
	{

		$id_jur = $this->input->post('id_jurusan');
		$id_kelas = "";
		if( ! empty($this->input->post('id_kelas')))
		{
			$id_kelas = $this->input->post('id_kelas');
		}
		$nama_kelas = $this->dsm->get_data_kelas(array('dk.jurusan_id' => $id_jur),'dk.nama_kelas');

		if($nama_kelas->num_rows() > 0)
		{	
			echo '<option value="">--Pilih Kelas--</option>';
			foreach($nama_kelas->result() as $nk => $n)
			{	
				$sel="";
				if($id_kelas == $n->dk_id)
				{
					$sel = 'selected';
				}
				echo '<option value="'.$n->dk_id.'" '.$sel.'>'.$n->nama_kelasjur.'</option>';
			}
	
		}
	}

	public function store_image()
	{
		if ($this->input->post('action') !== FALSE && $this->input->post('action') == 'store_image')
		{
			$config['upload_path'] = UPLOADPATH.'images'.DS.'tmp'.DS;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['remove_spaces']  = TRUE;
			$config['encrypt_name']  = TRUE;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('image'))
			{
				print(json_encode(array(
					'success' => false,
					'msg' => $this->upload->display_errors()
				)));
			}
			else
			{
				$data = $this->upload->data();

				print(json_encode(array(
					'success' => true,
					'url' => base_url('assets/images/tmp/'.$data['file_name'])
				)));
			}
		}
		else exit('You can\'t access this page!');
	}
	
	public function delete()
	{
		$id = $this->uri->segment(3);

		$get_nisn = $this->dsm->get_any_data('data_siswa',array('id' => $id))->row();
		
		$update_siswa = $this->dsm->do_update(array('is_active' => 'N'),array('id' => $id),'data_siswa');
		$update_ortu = $this->dsm->do_update(array('is_active' => 'N'),array('nisn' => $get_nisn->nisn),'data_orangtua_siswa');
		$update_kartu = $this->dsm->do_update(array('is_active' => 'N'),array('id_siswa' => $id),'data_kartu');
		redirect(base_url('data_siswa'), 'refresh');
	}
}