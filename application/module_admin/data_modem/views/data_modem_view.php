<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="data_modem box">
    <div class="box-header">
    <h3 class="box-title"></h3>
    </div>
    <div class="box-body pad">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-12 reloadData table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info" style="font-size: 12px;" width="1000px">	
                        <thead>
                            <tr role="row">
                                <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px; ">
                                No
                                </th>
                                <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;">
                                Phone ID
                                </th>
                                <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;">
                                Port
                                </th>
                                <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;">
                                Connection
                                </th>
                                <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;">
                                Send
                                </th>
                                <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200px;">
                                Receive
                                </th>
                                <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 250px;display:<?php echo $display; ?>; ">
                                Action
                                </th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php
                        // print_r($data);exit;
                        if( ! empty($data)){
                        $no = 1;
                        foreach($data as $dt){

                        ?>
                            <tr role="row" class="odd">
                                <td><?php echo $no; ?></td>
                                <td class="sorting_1"><?php echo $dt['phone_id']; ?></td>
                                <td class=""><?php echo $dt['port']; ?></td>
                                <td class=""><?php echo $dt['connection']; ?></td>
                                <td class=""><?php echo $dt['send']; ?></td>
                                <td class=""><?php echo $dt['receive']; ?></td>
                                <td style="display:<?php echo $display; ?>;"> 
                                <a href="<?php echo base_url('data_modem/cek_koneksi/'.$dt["id"].'');?>" class="fa btn btn-success fa-wifi"></a>
                                <a href="<?php echo base_url('data_modem/do_service/'.$dt["id"].'');?>" class="fa btn btn-warning fa-gear"></a>
                                <a href="<?php echo base_url('data_modem/del_service/'.$dt["id"].'');?>" class="fa btn btn-danger fa-trash-o"></a>
                                <a href="" class="fa btn btn-info fa-send" data-toggle="modal" data-target="#modalSendMsg"></a>
                                </td>
                            </tr>
                        <?php 
                        $no++;
                        }
                        }
                        else
                        {
                        ?>
                            <tr role="row" class="odd">
                                <td colspan="10">Data Tidak Ada !!!</td>
                            </tr>
                        <?php  
                        } ?>
                    </tbody>
                    <!-- <tfoot>
                    <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
                    </tfoot> -->
                    </table>
                    *Pastikan sebelum menghapus modem, service Gammu untuk modem tersebut harus dimatikan dahulu
                </div>
            </div>         
        </div>
        <div class="box-footer">
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalAddModem" style="display:<?php echo $display; ?>;">Tambah</a>
        </div>
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
        <a class="btn btn-primary" id="deletebarang">Ya</a>
      </div>
    </div>
  </div>
</div>

<!-- Add Modem modal -->

<div class="modal fade" id="modalAddModem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Modem</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" id="inputModem">
            <div class="modal-body">
                <div class="container">
                <div class="row">
                    <div class="form-group">
                        <label for="TxtPhoneId">Phone ID:</label>
                        <input type="text" class="form-control" name="txt_id" style="width:550px;" required>
                        <input type="hidden" name="smsdrc" value="<?php echo $smsdrc;?>" style="width:550px;">
                    </div>
                   <!--  <div class="form-group">
                        <label for="TxtPort">IMEI</label>
                        <input type="text" class="form-control" name="txt_imei" style="width:550px;" required>
                    </div> -->
                    <div class="form-group">
                        <label for="TxtPort">Port</label>
                        <input type="text" class="form-control" name="txt_port" style="width:550px;" required>
                    </div>
                    <div class="form-group">
                        <label for="TxtPort">Connection</label>
                        <select name="connection" class="form-control" style="width:550px;" required>
                            <option value="at300">at300</option>
                            <option value="at1200">at1200</option>
                            <option value="at2400">at2400</option>
                            <option value="at4800">at4800</option>
                            <option value="at9600">at9600</option>
                            <option value="at19200">at19200</option>
                            <option value="at38400">at38400</option>
                            <option value="at57600">at57600</option>
                            <option value="at115200">at115200</option>
                            <option value="at230400">at230400</option>
                            <option value="at460800">at460800</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="TxtPort">Send SMS</label>
                        <select name="send_sms" class="form-control" style="width:550px;" required>
                            <option value="yes">yes</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="TxtPort">Receive SMS</label>
                        <select name="receive_sms" class="form-control" style="width:550px;" required>
                            <option value="yes">yes</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="box-title"><h3>Setting Koneksi Database</h3></div>
                    <div class="form-group">
                        <label for="TxtPhoneId">Username:</label>
                        <input type="text" class="form-control" name="txt_user" style="width:550px;" required>
                    </div>
                    <div class="form-group">
                        <label for="TxtPort">Password</label>
                        <input type="password" class="form-control" name="txt_pass" style="width:550px;">
                    </div>
                    <div class="form-group">
                        <label for="TxtPort">Nama Database</label>
                        <input type="text" class="form-control" name="txt_db_name" style="width:550px;" required>
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="submit">Save</button>
                <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalSendMsg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kirim Pesan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" id="kirimpesan">
            <div class="modal-body">
                <div class="container">
                <div class="row">
                    <div class="form-group">
                        <label for="TxtPhoneId">No Tujuan:</label>
                        <input type="text" class="form-control" name="txt_no_tujuan" style="width:550px;" required>
                    </div> 
                    <div class="form-group">
                        <label for="TxtPort">Send SMS</label>
                        <select name="phone_id" class="form-control create-phoneid" style="width:550px;" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="TxtPhoneId">Pesan:</label>
                        <textarea class="form-control" name="txt_pesan" style="width:550px;" ></textarea>
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="submit">Kirim</button>
                <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:400px;margin-left: 150px;background-color: #66ccff;">
      <!-- <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div> -->
      <div class="modal-body"><img id="img01" style="width: 100%;max-width: 400px"></div>
     <!--  <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">close</button>
      </div> -->
    </div>
  </div>
</div>

