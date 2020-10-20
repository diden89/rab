
$(document).ready(function() {

	$('#inputModem').submit(function(e){
        e.preventDefault(); 
        $.ajax({
             url: siteUrl+'data_modem/input_action',
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

    $('#modalSendMsg').on('show.bs.modal', function (e) {
        var modal = $(this);
        var btn = $(e.relatedTarget);
       
        $.ajax({
            type:'POST',
            url: siteUrl+'data_modem/get_data_phone',
            success:function(html){
                $('.create-phoneid').html(html);
                
            }
        });       
    });

    $('#kirimpesan').submit(function(e){
        e.preventDefault(); 
        $.ajax({
             url: siteUrl+'data_modem/kirim_pesan',
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

    $('#formInputBarangMasuk').submit(function(e){
        $('.data_barang_masuk.box').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
            e.preventDefault(); 
         $.ajax({
             url: siteUrl+segment+'/input_action',
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

	$('.filter-data').click(function(){
		$('.box-body.pad').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
		
		var form = $('#filterdata');
		var data = form.serializeArray();
		// var url = siteUrl;

		$.ajax({
			url: siteUrl+segment+'/search_data',
			method: 'POST',
			// dataType: 'json',
			data: data,
			success: function(e) {
				console.log(e)
				$('div.overlay').remove();
				$('.reloadData').html(e);
				// alert('Data successfully saved');
			},
			error: function() {
				$('div.overlay').remove();
				// alert('Something wrong, please contact the administrators');
			}
		});
	});


    
    $('#showEntries').on('change',function(){
        $('.box-body.pad').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        
        var val = $('#showEntries').val();

        if(val !== "")
        {
            $.ajax({
                url: siteUrl+segment+'/search_data',
                method: 'POST',
                // dataType: 'json',
                data: {'limit' : val},
                success: function(e) {
                    console.log(e)
                    $('div.overlay').remove();
                    $('.reloadData').html(e);
                    // alert('Data successfully saved');
                },
                error: function() {
                    $('div.overlay').remove();
                    // alert('Something wrong, please contact the administrators');
                }
            });            
        }
    });

	 $(".add-input").click(function(){ 
       
        var inner = '<section class="col-lg-4 connectedSortable ui-sortable">';
        // inner += '<div class="form-group">';
        // var inner = '<div class="form-group">';
        // inner += '<label for="txtemail">Nama Berkas:</label>';
        // inner += '<input type="text" class="form-control"  name="txt_nama_berkas[]" placeholder="Nama Berkas (ex : SKTM, Surat Kematian Orangtua)....">';
        // inner += '</div>';
        inner += '<div class="form-group">';
        inner += '<label for="txtemail">Foto Barang:</label>';
        inner += '<input type="file" id="txtFile" name="txt_file[]">';
        inner += '</div>';
        inner += '<button class="btn btn-default fa fa-trash remove-child" type="button" onclick="removedata(this)"></button>';
        inner += '</section>';     

        $('.multipleadd').append(inner);
    });

    $('input.number').keyup(function(event) {

	  // skip for arrow keys
	  if(event.which >= 37 && event.which <= 40) return;

	  // format number
	  $(this).val(function(index, value) {
	    return value
	    .replace(/\D/g, "")
	    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
	    ;
	  });
	});

	$.ajaxSetup({ cache: false });
});