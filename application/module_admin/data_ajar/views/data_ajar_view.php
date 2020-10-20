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

<section class="data_ajar box">
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
                                <select name="tahun_ajar" id="showEntriesData" aria-controls="example1" class="form-control input-sm" style="width: auto">
                                    <option value="all">--Pilih Tahun Ajar--</option>
                                            <?php 
                                            $selected = "";
                                            foreach($tahun_ajar as $ta)
                                            {
                                                $selected = (isset($data->tahun_ajar_id) && $data->tahun_ajar_id == $ta['id']) ? "selected" : "";
                                                echo '<option value="'.$ta['id'].'"'.$selected.'>'.$ta['tahun_ajar'].'</option>';
                                            }
                                            ?>
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
                                    <th>No</th>
                                    <th>Tahun Ajaran</th>
                                    <th>NIP</th>
                                    <th>Nama Guru</th>
                                    <th>Nama Kelas / Ruangan</th> 
                                    <th>Bidang Studi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                            <?php 
                            if( ! empty($data))
                            {
                                $no = $number_data;
                                foreach($data as $dt => $d){
                                    ?>
                                    <tr role="row" class="odd">
                                    <td><?php echo $no; ?></td>
                                    <td class=""><?php echo $d->tahun_ajar; ?></td>
                                    <td class=""><?php echo $d->nip; ?></td>
                                    <td class=""><?php echo $d->fullname; ?></td>
                                    <td class=""><?php echo $d->nama_kelas_ruangan; ?></td>
                                    <td class=""><?php echo $d->mapel; ?></td>
                                    <td style="text-align:center;"> 
                                    <a href="<?php echo base_url('data_ajar/cu_action/edit/'.$d->da_id.'');?>" class="fa btn btn-success fa-pencil"></a>
                                    <button type="button" onclick="delete_data('<?php echo base_url();?>data_ajar/delete/<?php echo $d->da_id;?>')" class="fa btn btn-danger fa-trash"></a> 
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
                                echo '<td colspan="7" style="text-align:center;">Data Tidak Ditemukan !!!</td>';
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
        <a href="<?php echo base_url('data_ajar/cu_action/add');?>" class="btn btn-primary">Add</a>
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