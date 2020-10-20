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

<section class="menu box">
    <div class="box-header">
        <h3 class="box-title">Content</h3>
    </div>
    <div class="box-body pad">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-xl-6">
                    <div class="dataTables_length" id="example1_length">
                        <label>
                            Filter : 
                                <select name="is_admin" id="showEntriesData" aria-controls="example1" class="form-control input-sm" style="width: 100px">
                                    <option value="all">-- select --</option>
                                    <option value="10">10</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> 
                        </label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-xl-6">
                    <div id="example1_filter" class="dataTables_filter">
                        <form id="filterdata">
                            <label>
                                Search:
                                    <input class="form-control input-sm" type="text" id="searchdata" name="srcdt" placeholder="Search Data...." required>
                                    <!-- <button type="button" class="form-control input-sm btn-primary fa fa-search filter-data-aa "></button> -->
                            </label>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                        <table id="dtHorizontalExampleWrapper" class="table table-bordered table-striped dataTable reloadTableData" role="grid" aria-describedby="example1_info" width="3000px">	

                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                        No
                                    </th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                        NISN Siswa
                                    </th> 
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                        Nama Siswa
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  aria-label="Browser: activate to sort column ascending">
                                        Tempat, Tanggal Lahir
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  aria-label="Platform(s): activate to sort column ascending">
                                        Alamat
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  aria-label="Platform(s): activate to sort column ascending">
                                        Jenis Kelamin
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  aria-label="Platform(s): activate to sort column ascending">
                                        Agama
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  aria-label="Platform(s): activate to sort column ascending">
                                        Jurusan
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  aria-label="Platform(s): activate to sort column ascending">
                                        Kelas
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  aria-label="Platform(s): activate to sort column ascending">
                                        Foto
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  text-align:center;" aria-label="Platform(s): activate to sort column ascending">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                        <tbody>
                            <?php 
                            if( ! empty($data))
                            {
                                $no = $number_data;
                                foreach($data as $dt => $d){
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
                                    <td class=""><?php echo $d->nama_jurusan; ?></td>                        
                                    <td class=""><?php echo $d->nama_kelas; ?></td>                        
                                    <td class=""><img src='<?php echo $img ?>' width="55px"></td>
                                    <td style="text-align:center;"> 
                                    <a href="<?php echo base_url('data_siswa/cu_action/edit/'.$d->ds_id.'');?>" class="fa btn btn-success fa-pencil"></a>
                                    <button type="button" onclick="delete_data('<?php echo base_url();?>data_siswa/delete/<?php echo $d->ds_id;?>')" class="fa btn btn-danger fa-trash"></button> 
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
                            ?>
                        </tbody>
                        </table>
                        
                    </div>
                </div>
                <nav aria-label="Page navigation">
                        <?php echo $pagination; ?>
                        </nav>
            </div>

        </div>
    </div>
    <div class="box-footer">
        <a href="<?php echo base_url('data_siswa/cu_action/add');?>" class="btn btn-primary">Add</a>
    </div>
</section>
<!-- delete modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Transaksi?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Apakah anda akan menghapus transaksi ini?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
        <a class="btn btn-primary" id="deletedata">Ya</a>
      </div>
    </div>
  </div>
</div>