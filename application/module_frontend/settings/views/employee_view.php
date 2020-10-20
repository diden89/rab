<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style type="text/css">
    #dtHorizontalExampleWrapper {
    max-width: 800px;
    margin: 0 auto;
    }
    #dtHorizontalExampleWrapper th, td {
    white-space: nowrap;
    }
}

</style>

<section class="services box">
	<div class="box-header">
		<h3 class="box-title">Content</h3>
	</div>
    	<div class="box-body pad">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">    
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-xl-6">
                        <div class="dataTables_length" id="example1_length">
                            <label>
                                Filter Jabatan : 
                                    <select name="is_admin" id="showEntriesData" aria-controls="example1" class="form-control input-sm" style="width: auto;">
                                        <option>--Pilih--</option>
                                        <?php 
                                            foreach ($position as $pos => $p) {
                                                echo '<option value="'.$p->id.'">'.$p->caption.'</option>';
                                            }
                                        ?>
                                    </select> 
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xl-6" style="text-align: right;">
                        <div id="example1_filter" class="dataTables_filter">
                            <form id="filterdata">
                                <label>
                                    Search:
                                        <input class="form-control input-sm" type="text" id="searchdata" name="srcdt" placeholder="Search Data...." required>
                                        <button type="button" class="form-control input-sm btn-primary fa fa-search filter-data-aa "></button>
                                </label>
                            </form>
                        </div>
                    </div>
                </div>        
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                            <table id="dtHorizontalExampleWrapper" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info" width="3000px">	
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                        No
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                        NIP
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                        Nama Lengkap
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 500px;" aria-label="Browser: activate to sort column ascending">
                                        Tempat, Tanggal Lahir
                                        </th>
                                        <!-- 	<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;" aria-label="Platform(s): activate to sort column ascending">
                                        Address
                                        </th> -->
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; " aria-label="Platform(s): activate to sort column ascending">
                                        Pendidikan
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; " aria-label="Platform(s): activate to sort column ascending">
                                        Jabatan
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; " aria-label="Platform(s): activate to sort column ascending">
                                        No Telpon
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; " aria-label="Platform(s): activate to sort column ascending">
                                        Email
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; " aria-label="Platform(s): activate to sort column ascending">
                                        Foto
                                        </th> 
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px; " aria-label="Platform(s): activate to sort column ascending">
                                        Aksi
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="reloadTableData">
                                    <?php 
                                    if( ! empty($data))
                                    {
                                        $no = $number_data;
                                        foreach($data as $dt){
                                        $url_img = $dt['img'];
                                        ?>
                                            <tr role="row" class="odd">
                                                <td><?php echo $no; ?></td>
                                                <td class="sorting_1"><?php echo $dt['nip']; ?></td>
                                                <td ><?php echo $dt['fullname']; ?></td>
                                                <td class=""><?php echo $dt['pob'].", ".date('d-m-Y',strtotime($dt['dob'])); ?></td>
                                                <!-- <td class=""><?php //echo $dt['address']; ?></td> -->
                                                <td class=""><?php echo $dt['e_caption']; ?></td>
                                                <td class=""><?php echo $dt['p_caption']; ?></td>
                                                <td class=""><?php echo $dt['phone']; ?></td>
                                                <td class=""><?php echo $dt['email']; ?></td>
                                                <td style="text-align: center;"><img onclick="showImage('<?php echo base_url().$url_img;?>')" style="width:100%;max-width:300px" src='<?php echo base_url().$url_img;?>'>
                                                </td> 
                                                <td> 
                                                <a href="<?php echo base_url('employee/cu_action/edit/'.$dt["e_id"].'');?>" class="fa btn btn-success fa-pencil"></a>
                                                <button type="button" onclick="delete_data('<?php echo base_url();?>employee/delete/<?php echo $dt['e_id'];?>')" class="fa btn btn-danger fa-trash"></button>
                                                </td>
                                            </tr>
                                        <?php 
                                        $no++;
                                        }
                                    } 
                                    else
                                    {
                                        echo '<tr role="row" class="odd">';
                                        echo '<td colspan="9" style="text-align:center;">Data Tidak Ditemukan !!!</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                                <!-- <tfoot>
                                <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
                                </tfoot> -->
                            </table>
                        </div>
                        <nav aria-label="Page navigation">
                        <?php echo $pagination; ?>
                        </nav>
                    </div>
                </div>
            </div>             
    	</div>
	<div class="box-footer">
		<a href="<?php echo base_url('employee/cu_action/add');?>" class="btn btn-primary">Add</a>
	</div>
</section>

<!-- delete modal -->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Data?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Yakin akan menghapus data ini?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
        <a class="btn btn-primary" id="deleteemployee">Ya</a>
      </div>
    </div>
  </div>
</div>

<!-- modal untuk menampilkan foto ukuran besar-->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"><img id="img01" style="width: 100%;"></div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">close</button>
      </div>
    </div>
  </div>
</div>
