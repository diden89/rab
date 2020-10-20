<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row">
    <div class="col-lg-3 col-md-3">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Jurusan & Kelas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                <div class="form-group">
                    <label>Jurusan :</label>
                    <select class="form-control select2 select2-hidden-accessible"  data-select2-id="1" tabindex="-1" aria-hidden="true" id="TxtJurusan" name="txt_jurusan" style="width: 100%;">
                        <option value="">--Pilih Jurusan--</option>
                        <?php foreach($jurusan as $k => $v)
                        {
                            echo '<option value="'.$v->id.'">'.$v->nama_jurusan.'</option>';
                        }?>
                    </select>
                    
                </div>
                <div class="form-group">
                    <label>Kelas :</label>
                    <select class="form-control select2 select2-hidden-accessible"  data-select2-id="1" tabindex="-1" aria-hidden="true" id="TxtKelas" name="txt_kelas" style="width: 100%;">
                        <option value="">--Pilih Kelas--</option>
                    </select>
                    
                </div>
            </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-lg-9 col-md-9">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data Siswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="data-siswa-ajar box-body">
                <form action="" method="post" id="submitKelasAjar">
                <div class="form-group">
                    <label>Tahun Ajaran :</label>
                    <select class="form-control select2 select2-hidden-accessible"  data-select2-id="1" tabindex="-1" aria-hidden="true" id="TxtTahunAjar" name="txt_tahun_ajar" style="width: auto;">
                        <option value="">--Pilih Tahun Ajaran--</option>
                        <?php foreach($tahun_ajar as $k => $v)
                        {
                            echo '<option value="'.$v->id.'">'.$v->tahun_ajar.'</option>';
                        }?>
                    </select>
                    <input type="hidden" name="txt_kelas_id" id="txtKelasId" value="">  
                    <input type="hidden" name="txt_jur_id" id="txtJurId">
                </div>
                <div class="form-group">
                    <label>Ruangan :</label>
                    <select class="form-control select2 select2-hidden-accessible"  data-select2-id="1" tabindex="-1" aria-hidden="true" id="TxtRuangan" name="txt_ruangan" style="width: auto;">
                        <option value="">--Pilih Ruangan--</option>
                    </select>
                   
                </div>
                <table id="dtHorizontalExampleWrapper" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info" width="3000px">
                    <thead>
                        <tr role="row">
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="reloadTableData">
                    </tbody>        
                    
                </table>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-outline-secondary">Simpan</button>
            </div>
            </form>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12">
         <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data Siswa</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <label>Tahun Ajaran :</label>
                        <select class="form-control select2 select2-hidden-accessible"  data-select2-id="1" tabindex="-1" aria-hidden="true" id="TxtTahunAjar2" name="txt_tahun_ajar2" style="width: auto;">
                            <option value="">--Pilih Tahun Ajaran--</option>
                            <?php foreach($tahun_ajar as $k => $v)
                            {
                                echo '<option value="'.$v->id.'">'.$v->tahun_ajar.'</option>';
                            }?>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <label>Jurusan :</label>
                        <select class="form-control select2 select2-hidden-accessible"  data-select2-id="1" tabindex="-1" aria-hidden="true" id="TxtJurusan2" name="txt_jurusan2" style="width: 100%;">
                            <option value="">--Pilih Jurusan--</option>
                            <?php foreach($jurusan as $k => $v)
                            {
                                echo '<option value="'.$v->id.'">'.$v->nama_jurusan.'</option>';
                            }?>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <label>Kelas :</label>
                        <select class="form-control select2 select2-hidden-accessible"  data-select2-id="1" tabindex="-1" aria-hidden="true" id="TxtKelas2" name="txt_kelas2" style="width: 100%;">
                            <option value="">--Pilih Kelas--</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <label>Ruangan :</label>
                        <select class="form-control select2 select2-hidden-accessible"  data-select2-id="1" tabindex="-1" aria-hidden="true" id="TxtRuangan2" name="txt_ruangan2" style="width: auto;">
                            <option value="">--Pilih Ruangan--</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <table id="dtHorizontalExampleWrapper" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info" width="3000px">
                        <thead>
                            <tr role="row">
                                <th>No</th>
                                <th>Tahun Ajaran</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Jurusan</th>
                                <th>Kelas</th>
                                <th>Ruangan</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="reloadTableData2">
                            <?php 
                            if( ! empty($data_siswa_ajar))
                            {   
                                $no=1;
                                foreach($data_siswa_ajar as $nk => $n)
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
                                echo '<td colspan="5">Tidak Ada Data Siswa!!!</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>        
                        
                    </table>
                </div>
                
            </div>
         </div>
    </div>
</div>
  
<!-- delete modal -->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enable/Disable Status?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Yakin akan enable/disable data ini?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
        <a class="btn btn-primary" id="deletedata">Ya</a>
      </div>
    </div>
  </div>
</div>

<!-- View modal-->
  <div class="modal fade" id="modalTambahRuangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label>Kelas</label>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
         <form action="" id="inputRuangan" method="post" autocomplete="off">
        <div class="modal-body">
            <div class="card">                
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Kelas :</label>
                        <input type="text" name="txt_nama_kelas" class="form-control typeahead" id="txtNamaKelas" required>
                        <input type="hidden" name="txt_kelas_id" id="txtKelasId" value="">  
                        
                    </div>
                    <div class="form-group">
                        <label>Ruangan :</label>
                        <input type="text" name="txt_nama_ajar_siswa" class="form-control" id="txtNamaRuangan" required>  
                        <input type="hidden" name="txt_ajar_siswa_id" id="txtRuanganId">
                    </div>       
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="submit">Simpan</button>
            <a class="btn btn-primary" data-dismiss="modal">Close</a>
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

