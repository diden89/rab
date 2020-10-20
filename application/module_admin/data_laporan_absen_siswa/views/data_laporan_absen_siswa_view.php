<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row">
    <div class="col-lg-5 col-md-5">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data Jurusan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">                
                <div class="form-group">
                    <select class="form-control select2 select2-hidden-accessible"  data-select2-id="1" tabindex="-1" aria-hidden="true" id="TxtTahunAjar" name="txt_tahun_ajar" style="width: 100%;">
                        <option value="">--Pilih Tahun Ajaran--</option>
                        <?php foreach($tahun_ajar as $k => $v)
                        {
                            echo '<option value="'.$v->id.'">'.$v->tahun_ajar.'</option>';
                        }?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control select2 select2-hidden-accessible"  data-select2-id="1" tabindex="-1" aria-hidden="true" id="TxtJurusan" name="txt_jurusan_id" style="width: 100%;">
                        <option value="">--Pilih Jurusan--</option>
                        <?php foreach($jurusan as $k => $v)
                        {
                            echo '<option value="'.$v->id.'">'.$v->nama_jurusan.'</option>';
                        }?>
                    </select>
                    <input type="hidden" name="txt_kelas_id" id="txtKelasId" value="">  
                    <input type="hidden" name="txt_jur_id" id="txtJurId">
                </div>
                <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                    <table id="dtHorizontalExampleWrapper" class="table table-bordered table-striped dataTable " role="grid" aria-describedby="example1_info" width="3000px">
                        <tbody id="reloadTableDataKelas">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-lg-7 col-md-7">
        <div class="box box-solid data-absen-siswa">
            <div class="box-header with-border">
                <h3 class="box-title">Data Kelas & Ruangan</h3>
            </div>
            <!-- /.box-header -->
            <div class="data-siswa-ajar box-body">
                <!-- <form method="post" id="inputAbsenToDb"> -->
                <table id="dtHorizontalExampleWrapper" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info" width="3000px" style="font-size: 12px;">
                    <thead>
                        <tr role="row">
                            <th>No</th>
                            <th>Nama Ruangan</th>
                            <th style='text-align:center;width:105px;'>Jumlah Siswa</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="reloadTableDataKelasRuangan">
                        <tr>
                            <td colspan="4">Pilih Jurusan !!!</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <!-- <button type="submit" class="btn btn-outline-secondary">Simpan</button> -->
            </div>
            <!-- </form> -->
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12">
         <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data Absen Siswa</h3>
            </div>
            <div class="box-body">
                <div class="col-lg-12 col-md-12">
                    <table id="dtHorizontalExampleWrapper" class="table table-bordered table-striped dataTable reloadTableDataRekapAbsen" role="grid" aria-describedby="example1_info" width="3000px" style="font-size: 12px;">
                        <!-- <thead >
                            <tr role="row">
                                <th rowspan="2">No</th>
                                <th rowspan="2">Hari / Tanggal</th>
                                <th rowspan="2">NISN</th>
                                <th rowspan="2">Nama Siswa</th>
                                <th rowspan="2">Masuk</th>
                                <th rowspan="2">Pulang</th>
                                <th colspan="3">Mata Pelajaran</th>                                    
                            </tr>
                            <tr>
                                <th>Status Absen</th>
                                <th>Status Absen</th>
                                <th>Status Absen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="7">Belum Ada Data Absen!!!</td>
                            </tr>
                           
                        </tbody>    -->     
                        
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

