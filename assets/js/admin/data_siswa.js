
var uploadImage = function(image) {
    var data = new FormData();

    data.append("image", image);
    data.append('action', 'store_image');
    $.ajax({
        url: siteUrl+'menu/store_image',
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

function doSearch(obj)
{
    var data = $(obj);
    if(data.val().length > 2)
    {
        $.ajax({
          url: siteUrl+'data_siswa/search_data',
          method: 'POST',
          // dataType: 'json',
          data: {'searchdata' : data.val()},
          success: function(e) {
              console.log(e)
              $('div.overlay').remove();
              $('.reloadTableData').html(e);
              // alert('Data successfully saved');
          },
          error: function() {
              $('div.overlay').remove();
              // alert('Something wrong, please contact the administrators');
          }
        });   
    }
    else if(data.val().length == 0)
    {
        $.ajax({
          url: siteUrl+'data_siswa/search_data',
          method: 'POST',
          // dataType: 'json',
          data: {'searchdata' : ""},
          success: function(e) {
              console.log(e)
              $('div.overlay').remove();
              $('.reloadTableData').html(e);
              // alert('Data successfully saved');
          },
          error: function() {
              $('div.overlay').remove();
              // alert('Something wrong, please contact the administrators');
          }
        }); 
    }
}
$(document).ready(function() {
    
    $('#showEntriesData').on('change',function(){
        $('.box-body.pad').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        var val = $('#showEntriesData').val();

        if(val !== "")
        {
          $.ajax({
              url: siteUrl+'data_siswa/search_data',
              method: 'POST',
              // dataType: 'json',
              data: {'data' : val},
              success: function(e) {
                  console.log(e)
                  $('div.overlay').remove();
                  // console.log($('.reloadTableData').html(e));
                  $('.reloadTableData').html(e);
                  // alert('Data successfully saved');
              },
              error: function() {
                  $('div.overlay').remove();
                  // alert('Something wrong, please contact the administrators');
              }
          });            
        }
    });
    $('#searchdata').on('keyup',function(){
        doSearch(this);
    }); 

    $('.textarea').summernote({
        callbacks: {
            onImageUpload: function (image) {
                uploadImage(image[0]);
            }
        }
    });

    $('#formInputDataSiswa').submit(function(e){
        $('.data_siswa.box').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
            e.preventDefault(); 
         $.ajax({
             url: siteUrl+'data_siswa/input_action',
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
    $('#TxtJurusan').on('change',function(){
    var id_jurusan = $('#TxtJurusan').val();
        $.ajax({
            url: siteUrl+'data_siswa/get_select_kelas',
            data: {'id_jurusan' : id_jurusan},            
            // dataType: "json",
            type: "POST",
            success: function (data) {
                $('#TxtKelas').html(data);                

            }
        });
    });

    var id_jurusan = $('#TxtJurusan').val();
    if(id_jurusan !== "")
    {
    var id_kelas = $('#txtKelasId').val();
        $.ajax({
            url: siteUrl+'data_siswa/get_select_kelas',
            data: {'id_jurusan' : id_jurusan,'id_kelas' : id_kelas},            
            // dataType: "json",
            type: "POST",
            success: function (data) {
                $('#TxtKelas').html(data);                

            }
        });

    }
});