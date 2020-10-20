<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="data_mapel box">
    <section class="col-lg-12 connectedSortable ui-sortable">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Jurusan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">No</th>
                  <th>Mata Pelajaran</th>
                  <th style="width: 10px">Aksi</th>
                  </tr>

                <?php $no=1 ;
                    foreach($data as $dt => $d){ ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $d->mapel; ?></td>
                          <td>
                            <a href="" class="fa fa-pencil btn btn-primary" data-toggle="modal" data-target="#modalTambahMapel" data-m_id="<?php echo $d->id; ?>" data-mapel="<?php echo $d->mapel; ?>"></a>
                          </td>
                        </tr> 
                <?php   $no++;
                    } ?>            
                </tbody>
            </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <?php echo $pagination?>
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahMapel">Tambah</a>
            </div>
          </div>
          <!-- /.box -->
    </section> 
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
        <a class="btn btn-primary" id="deleteemployee">Ya</a>
      </div>
    </div>
  </div>
</div>

<!-- View modal-->
  <div class="modal fade" id="modalTambahMapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label>Mata Pelajaran</label>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
         <form action="" id="inputMapel" method="post" autocomplete="off">
        <div class="modal-body">
            <div class="form-group">
                <label>Mata Pelajaran :</label>
                <input type="text" name="txt_nama_mapel" class="form-control" id="txtNamaMapel" required>        
                <input type="hidden" name="txt_mapel_id" id="txtMapelId">           
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

