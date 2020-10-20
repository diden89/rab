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

<section class="data_guru box">
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
                                    <th>No</th>
                                    <th>NIP</th> 
                                    <th>Nama Guru</th>
                                    <th>Guru Bidang Studi</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Foto</th>
                                    <th>Action</th>
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
                                    <td class=""><?php echo $d->nip; ?></td>
                                    <td class=""><?php echo $d->fullname; ?></td>
                                    <td class=""><?php echo $d->mapel; ?></td>
                                    <td class=""><?php echo (($d->jenis_kelamin == 'L') ? 'Laki-Laki' : 'Perempuan'); ?></td>
                                    <td class=""><?php echo $d->da_caption; ?></td>                        
                                    <td class=""><img src='<?php echo $img ?>' width="55px"></td>
                                    <td style="text-align:center;"> 
                                    <a href="<?php echo base_url('data_guru/cu_action/edit/'.$d->dg_id.'');?>" class="fa btn btn-success fa-pencil"></a>
                                    <button type="button" onclick="delete_data('<?php echo base_url();?>data_guru/delete/<?php echo $d->dg_id;?>')" class="fa btn btn-danger fa-trash"></a> 
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
                                echo '<td colspan="8" style="text-align:center;">Data Tidak Ditemukan !!!</td>';
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
        <a href="<?php echo base_url('data_guru/cu_action/add');?>" class="btn btn-primary">Add</a>
    </div>
</section>
