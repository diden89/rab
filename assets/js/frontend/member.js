
function removedata(obj){
    var self = $(obj);
    self.parent().remove();
    // console.log(self.parent().parent());
}

function removedataberkas(id,idP){
   
    $('.data_pendonor.box').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
    $.ajax({
			url: siteUrl +'data_pendonor/delete_image',
			method: 'POST',
			// dataType: 'json',
			data: {"id_berkas" : id,"id_pendonor": idP},
			success: function(e) {
				console.log(e)
				$('div.overlay').remove();
				$('.multipleadd').html(e);
				// alert('Data successfully saved');
			},
			error: function() {
				$('div.overlay').remove();
				// alert('Something wrong, please contact the administrators');
			}
		});
}

var uploadImage = function(image) {
	var data = new FormData();

	data.append("image", image);
	data.append('action', 'store_image');
	$.ajax({
		url: './about_us/store_image',
		cache: false,
		contentType: false,
		processData: false,
		data: data,
		type: 'post',
		dataType: 'json',
		success: function (url) {
			if (url.success) {
				var image = $('<img>').attr('src', url.url);
			
				$('.textarea').summernote("insertNode", image[0]);
			} else {
				alert('The image you are attempting to upload exceedes the maximum height or width');
			}
		}
	});
};

$(document).ready(function() {
	// $('.textarea').summernote({
	// 	callbacks: {
	// 		onImageUpload: function (image) {
	// 			uploadImage(image[0]);
	// 		}
	// 	}
	// });
	
    $('#txtProv').ready(function(){
        var id_prov = $('#txtProv').val();
        var id_relasi = $('#txtKdPen').val();
        if(id_prov != "")
        {
             $.ajax({
                type:'POST',
                url: siteUrl+'member/get_kab_kota',
                data:{'id_provinsi' : id_prov,'id_relasi' : id_relasi},
                success:function(html){
                    $('#txtKabKota').html(html);
                    var id_kab_kota = $('#txtKabKota').val();

                    $.ajax({
                        type:'POST',
                        url: siteUrl+'member/get_kecamatan',
                        data:{'id_kecamatan' : id_kab_kota,'id_relasi' : id_relasi},
                        success:function(html){
                            $('#txtKec').html(html);3
                            var id_kecamatan = $('#txtKec').val();
                            $.ajax({
                                type:'POST',
                                url: siteUrl+'member/get_kelurahan',
                                data:{'id_kelurahan' : id_kecamatan,'id_relasi' : id_relasi},
                                success:function(html){
                                    $('#txtKel').html(html);
                                    
                                }
                            }); 
                        }
                    });
                }
            });
        }
    });
	$('#txtProv').on('change', function(){
        var provId = $(this).val();
        if(provId){
            $.ajax({
                type:'POST',
                url: siteUrl+'member/get_kab_kota',
                data:'id_provinsi='+provId,
                success:function(html){
                    $('#txtKabKota').html(html);
                    
                }
            }); 
        }else{
            $('#txtKabKota').html('<option value="">Pilih Provinsi Terlebih Dahulu</option>');
           
        }
    });

    $('#txtKabKota').on('change', function(){
       
        var kecId = $(this).val();
        if(kecId){
            $.ajax({
                type:'POST',
                url: siteUrl+'member/get_kecamatan',
                data:'id_kecamatan='+kecId,
                success:function(html){
                    $('#txtKec').html(html);
                    
                }
            }); 
        }else{
            $('#txtKec').html('<option value="">Pilih Kab / Kota Terlebih Dahulu</option>');
           
        }
    }); 

    $('#txtKec').on('change', function(){
       
        var kelId = $(this).val();
        if(kelId){
            $.ajax({
                type:'POST',
                url: siteUrl+'member/get_kelurahan',
                data:'id_kelurahan='+kelId,
                success:function(html){
                    $('#txtKel').html(html);
                    
                }
            }); 
        }else{
            $('#txtKel').html('<option value="">Pilih Kelurahan Terlebih Dahulu</option>');
           
        }
    });


	$('#formInputPendonor').submit(function(e){
        $('.data_pendonor.box').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
            e.preventDefault(); 
         $.ajax({
             url: siteUrl+'member/input_action_pendonor',
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

    $('#formInputPenerima').submit(function(e){
        $('.single-blog').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
            e.preventDefault(); 
         $.ajax({
             url: siteUrl+'member/input_action_penerima',
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
		var url = siteUrl +'data_pendonor';

		$.ajax({
			url: './data_pendonor/search_data',
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

	 $(".add-input").click(function(){ 
       
        var inner = '<section class="col-lg-12 connectedSortable ui-sortable">';
        inner += '<div class="form-group">';
        // var inner = '<div class="form-group">';
        inner += '<label for="txtemail">Nama Berkas:</label>';
        inner += '<input type="text" class="form-control"  name="txt_nama_berkas[]" placeholder="Nama Berkas (KTP & Satu Berkas Pendukung...)....">';
        inner += '</div>';
        inner += '<div class="form-group">';
        inner += '<label for="txtemail">Berkas:</label>';
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