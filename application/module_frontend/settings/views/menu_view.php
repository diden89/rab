<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="menu box">
    <div class="box-header">
        <h3 class="box-title">Menu List Data</h3>
    </div>
    <div class="box-body pad">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-md-12">
                        <table class="collaptable table table-striped" id="example1">
                            <thead style="background-color: #605ca8;color:white">
                                <th scope="col"><a href="javascript:void(0);" class="act-button-expand" style="color: white;"><i class="fa fa-angle-double-down"></i></a></th>
                                <th scope="col">Caption</th>
                                <th scope="col">URL</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Description</th>
                                <th scope="col" style="text-align:center;">Action</th>
                            </thead>
                            <tbody></tbody>
                        </table>                        
                </div>
            </div>

        </div>
    </div>
    <div class="box-footer">
        <a href="<?php echo base_url('settings/menu/cu_action/add');?>" class="btn btn-primary">Add</a>
    </div>
</section>
