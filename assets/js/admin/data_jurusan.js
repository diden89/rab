
$(document).ready(function() {
	
   $('#modalTambahJurusan').on('show.bs.modal', function (e) {
        var modal = $(this);
        var btn = $(e.relatedTarget);
        var jurusan_id = btn.data('jur_id');
        var n_jur = btn.data('n_jur');
        
        $('#txtJurusanId').val(jurusan_id);
        $('#txtNamaJurusan').val(n_jur);
               
    });

	$('#inputJurusan').submit(function(e){
        e.preventDefault(); 
         $.ajax({
             url: siteUrl+'data_jurusan/input_action',
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