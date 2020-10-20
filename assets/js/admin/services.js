
var uploadImage = function(image) {
    var data = new FormData();

    data.append("image", image);
    data.append('action', 'store_image');
    $.ajax({
        url: siteUrl+'services/store_image',
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: 'post',
        dataType: 'json',
        success: function (url) {
            if (url.success) {
                var image = $('<img>').attr('src', url.url);
            
                $('#txtContent').summernote("insertNode", image[0]);
            } else {
                alert('The image you are attempting to upload exceedes the maximum height or width');
            }
        }
    });
};

$(document).ready(function() {
    if($('#txt_id_menu').val() !== '')
    {

         var id_menu = $('#txt_id_menu').val();
         var is_admin = $('#txt_position').val();

         if(id_menu){
            $.ajax({
                type:'POST',
                url: siteUrl+'menu/get_menu_option',
                data:{'is_admin':is_admin,'id_menu':id_menu},
                success:function(html){
                    $('#txt_parent_id').html(html);
                    
                }
            }); 
        }else{
            $('#txt_parent_id').html('<option value="">Pilih Position Terlebih Dahulu</option>');
           
        }
    }

    $('#txt_position').on('change',function(){
        var id_pos = $(this).val();
       
        if(id_pos){
            $.ajax({
                type:'POST',
                url: siteUrl+'menu/get_menu_option',
                data:'is_admin='+id_pos,
                success:function(html){
                    $('#txt_parent_id').html(html);
                    
                }
            }); 
        }else{
            $('#txt_parent_id').html('<option value="">Pilih Position Terlebih Dahulu</option>');
           
        }
    });

    $('#txt_icon').on('change',function(){
       $('#selOpt').attr('class',$('#txt_icon').val());
    });

    $('#txtContent').summernote({
        callbacks: {
            onImageUpload: function (image) {
                uploadImage(image[0]);
            }
        }
    });

    // $('.btn.btn-primary').click(function(){
    //     $('.about_us.box').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        
    //     var form = $('#formAboutUs');
    //     var data = form.serializeArray();
        
    //     $.ajax({
    //         url: './menu/store_data',
    //         method: 'POST',
    //         dataType: 'json',
    //         data: data,
    //         success: function(json) {
    //             $('div.overlay').remove();
    //             alert('Data successfully saved');
    //         },
    //         error: function() {
    //             $('div.overlay').remove();
    //             alert('Something wrong, please contact the administrators');
    //         }
    //     });
    // });

    $('#formInputServices').submit(function(e){
        $('.services.box').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
            e.preventDefault(); 
         $.ajax({
             url: siteUrl+'services/input_action',
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