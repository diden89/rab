
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

    $('#txtNamaKelas').typeahead({
        source: function (query, process) {
            $.ajax({
                url: siteUrl+'data_ruangan/get_data_kelas',
                data: 'query=' + query,            
                dataType: "json",
                type: "POST",
                success: function (data) {
                    objects = [];
                    map = {};
                    $.each(data, function(i, object) {
                        map[object.nama_kelas_jurusan] = object;
                        objects.push(object.nama_kelas_jurusan);
                    });
                    process(objects);
                }
            });
        },
        updater: function(item) {
            $('#txtKelasId').val(map[item].dk_id);
            return item;
        }
    });

	$('#inputRuangan').submit(function(e){
        e.preventDefault(); 
         $.ajax({
             url: siteUrl+'data_ruangan/input_action',
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