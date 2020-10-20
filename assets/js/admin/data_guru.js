
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
          url: siteUrl+'data_guru/search_data',
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
          url: siteUrl+'data_guru/search_data',
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
              url: siteUrl+'data_guru/search_data',
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

    $('#txtNamaGuru').typeahead({
        source: function (query, process) {
            $.ajax({
                url: siteUrl+'data_guru/autocomplete_data',
                data: 'query=' + query,            
                dataType: "json",
                type: "POST",
                success: function (data) {
                    objects = [];
                    map = {};
                    $.each(data, function(i, object) {
                        map[object.fullname] = object;
                        objects.push(object.fullname);
                    });
                    process(objects);
                }
            });
        },
        updater: function(item) {
            $('#txtEmployeeId').val(map[item].id);
            return item;
        }
    });

    $('#formInputMapel').submit(function(e){
        $('.data_guru.box').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
            e.preventDefault(); 
         $.ajax({
             url: siteUrl+'data_guru/input_action',
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