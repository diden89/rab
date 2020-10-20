function delete_data(delete_url)
{
    $("#deleteModal").modal("show", {backdrop: "static"});
    document.getElementById("deletedata").setAttribute("href" , delete_url);
}

function doSearch(obj)
{
    var data = $(obj);
    if(data.val().length > 2)
    {
        $.ajax({
          url: siteUrl+'data_ajar/search_data',
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
          url: siteUrl+'data_ajar/search_data',
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
              url: siteUrl+'data_ajar/search_data',
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
                url: siteUrl+'data_ajar/autocomplete_data',
                data: 'query=' + query,            
                dataType: "json",
                type: "POST",
                success: function (data) {
                    objects = [];
                    map = {};
                    $.each(data, function(i, object) {
                        map[object.guru_ajar] = object;
                        objects.push(object.guru_ajar);
                    });
                    process(objects);
                }
            });
        },
        updater: function(item) {
            $('#txtGuruId').val(map[item].dg_id);
            $('#txtNamaMapel').val(map[item].mapel);
            $('#img_siswa').attr('src',frontUrl+map[item].img);
            var mapel_id = $('#txt_bidang_studi').val();
            $.ajax({
                url: siteUrl+'data_ajar/reload_select_option',
                method: 'POST',
                // dataType: 'json',
                data: {'guru_id' : map[item].dg_id,'mapel_id' :  map[item].mapel_id},
                success: function(e) {
                  console.log(e)
                  $('div.overlay').remove();
                  $('.reloadSelectData').html(e);
                },
                error: function() {
                  $('div.overlay').remove();
                }
            }); 

            $.ajax({
                url: siteUrl+'data_ajar/reload_select_mapel',
                method: 'POST',
                // dataType: 'json',
                data: {'txt_emp_id' : map[item].e_id,'mapel_id' : mapel_id},
                success: function(e) {
                  console.log(e)
                  $('div.overlay').remove();
                  $('.reloadSelectMapel').html(e);
                },
                error: function() {
                  $('div.overlay').remove();
                }
            }); 

            return item;
        }
    });

    $('#formInputMapel').submit(function(e){
        $('.data_ajar.box').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
            e.preventDefault(); 
         $.ajax({
             url: siteUrl+'data_ajar/input_action',
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