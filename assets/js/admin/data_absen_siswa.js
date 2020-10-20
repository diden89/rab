function show_data_siswa(id,g_id)
{
    $.ajax({
        url: siteUrl+'data_absen_siswa/get_data_absen_siswa',
        data: {'id_ajar' : id,'guru_id' : g_id},            
        // dataType: "json",
        type: "POST",
        success: function (data) {
            $('#reloadTableDataAbsen').html(data);                
        }
    });

    $.ajax({
        url: siteUrl+'data_absen_siswa/load_view_absen_mapel',
        data: {'guru_id' : g_id,'dr_id' : id},            
        // dataType: "json",
        type: "POST",
        success: function (data) {
            $('#reloadTableDataAbsenMapel').html(data);                
        }
    });
}

function ambil_absen_siswa(id,abs,g_id)
{
    var jam_pel = $('#txtJamPel').val();
    if(jam_pel !== "")
    {
        if(abs == 'H')
        {
            $('#alpha'+id).hide();
            $('#izin'+id).hide();
            $('#sakit'+id).hide();
            $('#tanpa_keterangan'+id).hide();
        }
        if(abs == 'A')
        {
            $('#hadir'+id).hide();
            $('#izin'+id).hide();
            $('#sakit'+id).hide();
            $('#tanpa_keterangan'+id).hide();
        }
        if(abs == 'I')
        {
            $('#hadir'+id).hide();
            $('#alpha'+id).hide();
            $('#sakit'+id).hide();
            $('#tanpa_keterangan'+id).hide();
        }
        if(abs == 'S')
        {
            $('#hadir'+id).hide();
            $('#alpha'+id).hide();
            $('#izin'+id).hide();
            $('#tanpa_keterangan'+id).hide();
        }
        if(abs == 'TK')
        {
            $('#hadir'+id).hide();
            $('#alpha'+id).hide();
            $('#izin'+id).hide();
            $('#sakit'+id).hide();
        }
        
        $.ajax({
            url: siteUrl+'data_absen_siswa/input_absen_to_db',
            data: {'id_ajar' : id,'abs' : abs,'guru_id' : g_id,'jam_pel' : jam_pel},            
            // dataType: "json",
            type: "POST",
            success: function (data) {
                $('#reloadTableDataAbsenMapel').html(data);                
            }
        });        
    }
    else
    {
        alert('Mohon Pilih Jam Pelajaran Terlebih Dahulu !!!!')
    }
}

$(document).ready(function() {
	
   $('#modalTambahRuangan').on('show.bs.modal', function (e) {
        var modal = $(this);
        var btn = $(e.relatedTarget);
        var n_k = btn.data('n_k');
        var k_id = btn.data('k_id');
        var dr_id = btn.data('dr_id');
        var n_r = btn.data('n_r');
        
        $('#txtNamaKelas').val(k_id);
        $('#txtKelasId').val(k_id);
        $('#txtNamaRuangan').val(n_r);
        $('#txtRuanganId').val(dr_id);
               
    });

    $('#TxtJurusan').on('change',function(){
    var id_jurusan = $('#TxtJurusan').val();
        $.ajax({
            url: siteUrl+'data_absen_siswa/get_select_kelas',
            data: {'id_jurusan' : id_jurusan},            
            // dataType: "json",
            type: "POST",
            success: function (data) {
                $('#TxtKelas').html(data);
                
                //get select ruangan
                $('#TxtKelas').on('change',function(){
                    var id_kelas = $('#TxtKelas').val();
                    $.ajax({
                        url: siteUrl+'data_absen_siswa/get_select_ruangan',
                        data: {'id_kelas': id_kelas},            
                        // dataType: "json",
                        type: "POST",
                        success: function (data) {
                            $('#TxtRuangan').html(data);
                            //show data siswa
                            $.ajax({
                                url: siteUrl+'data_absen_siswa/show_data_siswa',
                                data: {'id_kelas' : id_kelas,'id_jurusan' : id_jurusan},            
                                // dataType: "json",
                                type: "POST",
                                success: function (data) {
                                    $('#txtKelasId').val($('#TxtKelas').val());
                                    $('#txtJurId').val($('#TxtJurusan').val());
                                    $('#reloadTableData').html(data);
                                   
                                }
                            });
                           
                        }
                    });
                });

            }
        });
    });



    $('#TxtTahunAjar').on('change',function(){
    var thn_ajar = $('#TxtTahunAjar').val();
        $.ajax({
            url: siteUrl+'data_absen_siswa/show_filter_data_ajar',
            data: {'thn_ajar' : thn_ajar},            
            // dataType: "json",
            type: "POST",
            success: function (data) {
                $('#reloadTableData').html(data);                
            }
        });
    });
    $('#TxtJurusan2').on('change',function(){
    var id_jurusan = $('#TxtJurusan2').val();
        $.ajax({
            url: siteUrl+'data_absen_siswa/get_select_kelas',
            data: {'id_jurusan' : id_jurusan},            
            // dataType: "json",
            type: "POST",
            success: function (data) {
                $('#TxtKelas2').html(data);

                $.ajax({
                    url: siteUrl+'data_absen_siswa/show_filter_data_ajar',
                    data: {'id_jurusan' : id_jurusan},            
                    // dataType: "json",
                    type: "POST",
                    success: function (data) {
                        $('#reloadTableData2').html(data);
                    }
                });                
            }
        });
    });

    //get select ruangan
    $('#TxtKelas2').on('change',function(){
        var id_kelas = $('#TxtKelas2').val();
        var id_jurusan = $('#TxtJurusan2').val();
        $.ajax({
            url: siteUrl+'data_absen_siswa/get_select_ruangan',
            data: {'id_kelas': id_kelas},            
            // dataType: "json",
            type: "POST",
            success: function (data) {
                $('#TxtRuangan2').html(data);

                $.ajax({
                    url: siteUrl+'data_absen_siswa/show_filter_data_ajar',
                    data: {'id_jurusan' : id_jurusan,'id_kelas' : id_kelas},            
                    // dataType: "json",
                    type: "POST",
                    success: function (data) {
                        $('#reloadTableData2').html(data);
                    }
                });               
            }
        });
    });

    $('#TxtRuangan2').on('change',function(){
        var id_ruangan = $('#TxtRuangan2').val();
        var id_kelas = $('#TxtKelas2').val();
        var id_jurusan = $('#TxtJurusan2').val();
        $.ajax({
            url: siteUrl+'data_absen_siswa/show_filter_data_ajar',
            data: {'id_jurusan' : id_jurusan,'id_kelas' : id_kelas,'id_ruangan': id_ruangan},            
            // dataType: "json",
            type: "POST",
            success: function (data) {
                $('#reloadTableData2').html(data);
            }
        });
    });
   // $('#txtNamaKelas').typeahead({
   //      source: function (query, result) {
   //          $.ajax({
   //              url: siteUrl+'data_ruangan/get_data_kelas',
   //              data: 'query=' + query,            
   //              dataType: "json",
   //              type: "POST",
   //              success: function (data) {
                    
   //                  result($.map(data, function (item) {
   //                      return item.nama;
   //                  }));
                   
   //              }
   //          });
   //      },
   //      afterSelect : function(){
   //          $('.typeahead').on('typeahead:selected', function (e, datum) {
   //              console.log(datum);
   //              $('#item_code').val(datum.item_code);
   //          });
   //      }
   //  });
   $('#txtNamaKelas').typeahead({
        minLength: 3,
        source: function (query, process) {
            $.ajax({
                url: 'data_ruangan/get_data_kelas',
                type: 'POST',
                dataType: 'JSON',
                data: 'query=' + query,
                success: function (data) {                    
                    var newData = [];
                    $.each(data, function(){
                        newData.push(this.nama_kelas_jurusan);
                        newData.push(this.dk_id);
                        });

                    return process(newData);
                }
            });
        },
        afterSelect : function(data){
            console.log(data)
            $('#txtKelasId').val(data);
            // $('.typeahead').bind('typeahead:selected', function (e, datum) {
            //     console.log(datum);
            // });
        }
    });

	$('#submitKelasAjar').submit(function(e){
        $('.data-siswa-ajar.box-body').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        e.preventDefault(); 
         $.ajax({
             url: siteUrl+'data_absen_siswa/input_action',
             type:"post",
             data :new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
             dataType :'json',
             success: function(response){
                if(response.status)
                {
                    $('div.overlay').remove();
                  alert("Input Data Berhasil.");
                  window.location.replace(response.url);
                }
                else
                {
                    $('div.overlay').remove();
                    alert("Input Data Gagal.");
                }

           }
         });
    });

    $('#inputAbsenToDb').submit(function(e){
        $('.data-absen-siswa.box-body').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        e.preventDefault(); 
         $.ajax({
             url: siteUrl+'data_absen_siswa/input_action',
             type:"post",
             data :new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
             dataType :'json',
             success: function(response){
                if(response.status)
                {
                    $('div.overlay').remove();
                  alert("Input Data Berhasil.");
                  window.location.replace(response.url);
                }
                else
                {
                    $('div.overlay').remove();
                    alert("Input Data Gagal.");
                }

           }
         });
    });

});