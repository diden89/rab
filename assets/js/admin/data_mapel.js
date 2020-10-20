
$(document).ready(function() {
	
   $('#modalTambahMapel').on('show.bs.modal', function (e) {
        var modal = $(this);
        var btn = $(e.relatedTarget);
        var m_id = btn.data('m_id');
        var mapel = btn.data('mapel');
        
        $('#txtMapelId').val(m_id);
        $('#txtNamaMapel').val(mapel);
               
    });

	$('#inputMapel').submit(function(e){
        e.preventDefault(); 
         $.ajax({
             url: siteUrl+'data_mapel/input_action',
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