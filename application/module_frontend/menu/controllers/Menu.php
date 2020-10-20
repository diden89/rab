<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_model','mm');
		$this->load->library('pagination');
	}

	public function index()
	{
		$get_properties = $this->db_home->get_properties($this->uri->segment(1));

		if ($get_properties && $get_properties->num_rows() > 0)
		{	
			$total_data =  $this->mm->get_data($limit = "",$start = "")->num_rows();
			//pagination
			//konfigurasi pagination

	        $config['base_url'] = base_url('menu/index'); //site url
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
			$get_data = $this->mm->get_data($config['per_page'],$this->store_params['page']);

			$this->store_params['pagination'] = $this->pagination->create_links();
			$this->store_params['title'] = $this->store_params['title2'] = $row_properties->caption;
			$this->store_params['page_active'] = $row_properties->caption;
			$this->store_params['page_icon'] = $row_properties->icon;
			$this->store_params['data'] = $get_data->result_array();
			$this->store_params['source_top'] = array(
				'<link rel="stylesheet" href="'.base_url('assets/templates/admin').'/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">'
			);
			$this->store_params['source_bot'] = array(
				'<script src="'.base_url('assets/templates/admin').'/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>',
				'<script src="'.base_url('assets/js/admin').'/menu.js"></script>'
			);
			$this->view('menu_view');
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
			// $like = array(
			// 	'caption' => $this->input->post('searchdata'),
			// 	'url' => $this->input->post('searchdata'),
			// 	'description' => $this->input->post('searchdata'),
			// );
			$like = $this->input->post('searchdata');
		}

		if( ! empty($this->input->post('is_admin')))
		{
			$src = $this->input->post('is_admin');
		}
		
		// print_r($like);
		// exit;
		
		$data = $this->mm->get_data($limit,$start,$src,$like)->result_array();
		
		// echo '<table id="dtHorizontalExampleWrapper" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">';
    	echo '<thead>';
		echo '<tr role="row">';
		echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
			No
		</th>';
		echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;">
			Nama Menu
				</th>';
		echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;">
					Url
				</th>';
		echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; ">
					Description
				</th>';
        echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; ">
                Image
                 </th>';
        echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; ">
                Status
                </th> ';
        echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 70px; ">
                Postion
                </th> '; 
        echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 70px; ">
                Donatur Menu
                </th> '; 
        echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 70px; ">
                Anak Asuh Menu
                </th> ';
        echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 70px; ">
                Icon
                </th> ';
        echo '<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; ">
                Action
                </th>    					
			</tr>
        </thead>';
        // print_r($data);
		if( ! empty($data))
		{			
			$no = 1;
	        foreach($data as $dt){
	            $img = ( ! empty($dt['img'])) ? base_url($dt['img']) : "";
	            ?>
	            <tr role="row" class="odd">
	            <td><?php echo $no; ?></td>
	            <td class=""><?php echo $dt['caption']; ?></td>
	            <td><?php echo substr($dt['url'], 0,30); ?></td>
	            <td class=""><?php  echo strip_tags(substr($dt['description'], 0,50)); ?></td>
	            <td class=""><img src='<?php echo $img ?>' width="75px"></td>
	            <td class=""><?php echo ($dt['is_active'] == 'Y') ? '<span style="color:green;">Enable</span>':'<span style="color:red;">Disable</span>'; ?></td>
	            <td class=""><?php 
	                if($dt['is_admin'] == 'Y')
	                {
	                    echo '<span style="color:green;">Backend</span>';
	                }
	                elseif($dt['is_admin'] == 'N')
	                {
	                    echo '<span style="color:red;">Frontend</span>';
	                }
	                else
	                {
	                    echo '<span style="color:blue;">Member Menu</span>';
	                }
	                ?></td>
	            <td class=""><?php echo ($dt['as_guru'] == 'Y') ? '<span style="color:green;">Yes</span>':'<span style="color:red;">No</span>'; ?></td>
	            <td class=""><?php echo ($dt['as_kepsek'] == 'Y') ? '<span style="color:green;">Yes</span>':'<span style="color:red;">No</span>'; ?></td>
	            <td class=""><?php echo $dt['icon']; ?></td>
	            <td style="text-align:center;"> 
	            <a href="<?php echo base_url('menu/cu_action/edit/'.$dt["id"].'');?>" class="fa btn btn-success fa-pencil"></a>
	            <!-- <button type="button" onclick="delete_data('<?php// echo base_url();?>category/delete/<?php //echo $dt['id'];?>')" class="fa btn btn-danger fa-trash"></a>  -->
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
			echo '<td colspan="11" style="text-align:center;">Data Tidak Ditemukan !!!</td>';
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
				'<link rel="stylesheet" href="'.base_url('assets/templates/admin').'/plugins/summernote/0.8.12/summernote.css">'
			);
			$this->store_params['source_bot'] = array(
				'<script src="'.base_url('assets/templates/admin').'/plugins/summernote/0.8.12/summernote.min.js"></script>',
				'<script src="'.base_url('assets/js/admin').'/menu.js"></script>'
			);
			
			$this->store_params['cond'] = ucwords($cond).' Menu';
			// $this->store_params['datamenu'] = $this->mm->get_menu()->result_array();
			
			if($cond !== 'add')
			{
				$id = $this->uri->segment(4);
				$get_data_edit = $this->mm->get_data_edit($id);
				$this->store_params['data'] = $get_data_edit->row();
			}
			
			$this->view('menu_input_view');
			
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

		$menu_opt = $this->mm->get_menu($is_admin);
		
		if($menu_opt->num_rows() > 0){ 
	        echo '<option value="">Pilih Induk</option>'; 
	        foreach($menu_opt->result_array() as $row)
	        {
	        	$sel = ($id_parent_menu == $row['id']) ? 'selected' : '';
	        	if($row['parent_id'] != "" || $row['parent_id'] != null)
	        	{
	        		$get_menu_utama = $this->mm->get_menu_utama($row['parent_id'])->row();
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
		$upload_dir = str_replace('admin'.DIRECTORY_SEPARATOR,'' , FCPATH);
	
		$config['upload_path'] = $upload_dir."assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."compro";
        $config['allowed_types'] ='gif|jpg|png|jpeg';

	    $datas['caption'] = $this->input->post('txt_menu_name');
	    $datas['is_admin'] = $this->input->post('txt_position');
	    $datas['as_guru'] = $this->input->post('txt_member');
	    $datas['as_kepsek'] = $this->input->post('txt_volunteer');
	    $datas['parent_id'] = ($this->input->post('txt_parent_id') == "") ? NULL : $this->input->post('txt_parent_id');
	    $datas['url'] = $this->input->post('txt_url');        
        $datas['description'] = $this->input->post('txt_desc');
        $datas['icon'] = $this->input->post('txt_icon');
        $datas['is_active'] = $this->input->post('txt_status');
      	
       	$this->load->library('upload',$config);

		if( ! empty($this->input->post('txt_id_menu')))
		{
			$old_img = substr($this->input->post('txt_img_old'), 21);

			if($this->upload->do_upload('txt_img'))
			{
				$data = array('upload_data' => $this->upload->data());

	            $image_name	 = $data['upload_data']['file_name']; 
	            $datas['img'] = 'assets/images/compro/'.$image_name; 

	            $id = $this->input->post('txt_id_menu');

	            $result = $this->mm->do_update($datas,$id);

	            if($old_img !== 'slider-default.jpg' && $old_img != "")
	            {
	            	unlink($config['upload_path'].DIRECTORY_SEPARATOR.$old_img);
	            }

	            echo json_encode(array(
	            	"status" => $result,
	            	"url" => base_url('menu')
	            ));
			}
			else
			{
	            $id = $this->input->post('txt_id_menu');

	            $result = $this->mm->do_update($datas,$id);

	            echo json_encode(array(
	            	"status" => $result,
	            	"url" => base_url('menu')
	            ));
			}

		}
		else
		{	        
	        if($this->upload->do_upload('txt_img')){
	            $data = array('upload_data' => $this->upload->data());	 
	            $image_name	 = $data['upload_data']['file_name']; 
	            $datas['img'] = 'assets/images/compro/'.$image_name; 

	            $result = $this->mm->do_upload($datas);

	            echo json_encode(array(
	            	"status" => $result,
	            	"url" => base_url('menu')
	            ));
	        }
	        else
	        {
	        
	            $datas['img'] = 'assets/images/compro/slider-default.jpg';

	            $result = $this->mm->do_upload($datas);

	            echo json_encode(array(
	            	"status" => $result,
	            	"url" => base_url('menu')
	            ));
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

		$get_category = $this->mm->get_data_edit($id)->row();
		
		$datas['id'] = $get_category->id;
        $datas['category_name'] = $get_category->category_name;
        $datas['is_active'] = $get_category->is_active;
        $datas['type'] = $get_category->type;
      
		$deletecategory = $this->mm->delete($datas,$id);
		redirect(base_url('category'), 'refresh');
	}
}