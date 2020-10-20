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
                                    <option value="Y">Backend</option>
                                    <option value="N">Frontend</option>
                                    <option value="mm">Member Menu</option>
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
                                    <button type="button" class="form-control input-sm btn-primary fa fa-search filter-data-aa "></button>
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
                                        Nama Menu
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  aria-label="Browser: activate to sort column ascending">
                                        Url
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  aria-label="Platform(s): activate to sort column ascending">
                                        Description
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  aria-label="Platform(s): activate to sort column ascending">
                                        Image
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  aria-label="Platform(s): activate to sort column ascending">
                                        Status
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  aria-label="Platform(s): activate to sort column ascending">
                                        Position
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  aria-label="Platform(s): activate to sort column ascending">
                                        Guru Menu
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  aria-label="Platform(s): activate to sort column ascending">
                                        Kepala Sekolah Menu
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  aria-label="Platform(s): activate to sort column ascending">
                                        Icon
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  text-align:center;" aria-label="Platform(s): activate to sort column ascending">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                        <tbody>
                            <?php 
                                $no = $number_data;
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
                                    <a href="<?php echo base_url('settings/menu/cu_action/edit/'.$dt["id"].'');?>" class="fa btn btn-success fa-pencil"></a>
                                    <!-- <button type="button" onclick="delete_data('<?php// echo base_url();?>category/delete/<?php //echo $dt['id'];?>')" class="fa btn btn-danger fa-trash"></a>  -->
                                    </td>
                                    </tr>
                                    <?php 
                                    $no++;
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
        <a href="<?php echo base_url('settings/menu/cu_action/add');?>" class="btn btn-primary">Add</a>
    </div>
</section>
