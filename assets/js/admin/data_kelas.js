
$(document).ready(function() {
	
   $('#modalTambahKelas').on('show.bs.modal', function (e) {
        var modal = $(this);
        var btn = $(e.relatedTarget);
        var jurusan_id = btn.data('jur_id');
        var n_k = btn.data('n_k');
        var k_id = btn.data('k_id');
        var n_j = btn.data('n_j');
        
        $('#txtJurusanId').val(jurusan_id);
        $('#txtKelasId').val(k_id);
        $('#txtNamaJurusan').val(n_j);
        $('#txtNamaKelas').val(n_k);
               
    });

	$('#inputKelas').submit(function(e){
        e.preventDefault(); 
         $.ajax({
             url: siteUrl+'data_kelas/input_action',
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