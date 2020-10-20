
var uploadImage = function(image) {
    var data = new FormData();

    data.append("image", image);
    data.append('action', 'store_image');
    $.ajax({
        url: siteUrl+'settings/menu/store_image',
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
          url: siteUrl+'settings/menu/load_data_menu',
          method: 'POST',
          dataType: 'JSON',
          data: {
            action : 'load_data_menu',
            'searchdata' : data.val(),
        },
          success: function(result) {
              $('div.overlay').remove();
              $('.reloadTableData').html(e);
          },
          error: function() {
              $('div.overlay').remove();
          }
        });   
    }
}

function generateDataTable(data)
{
    const $this = $('.reloadTableData tbody');

        $this.html('');

        let body = '';

        $.each(data, (idx, item) => {
            body += '<tr>';
            body += '<td>' + item.no + '</td>';
            body += '<td>' + item.bp_brm_num + '</td>';
            body += '<td>' + item.bp_caption + '</td>';
            body += '<td>' + item.bp_website + '</td>';
            body += '<td>' + item.bp_link + '</td>';
            body += '<td>' + item.bp_month + '</td>';
            body += '<td>' + item.bp_year + '</td>';
            body += '<td>' + item.start_date + '</td>';
            body += '<td>' + item.end_date + '</td>';
            body += '</tr>';
        });

        $this.html(body);
}
$(document).ready(function() {
    
    $('#showEntriesData').on('change',function(){
        $('.box-body.pad').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        var val = $('#showEntriesData').val();

        if(val !== "")
        {
          $.ajax({
              url: siteUrl+'settings/menu/search_data',
              method: 'POST',
              // dataType: 'json',
              data: {'is_admin' : val},
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
    // $('#searchdata').on('keypress',function(){
    //     doSearch(this);
    // });
    $('#filterdata').submit(function(e){
        $('.box-body.pad').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
            e.preventDefault(); 
         $.ajax({
             url: siteUrl+'settings/menu/input_action',
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

    if($('#txt_id_menu').val() !== '')
    {
         var id_parent_menu = $('#txt_id_parent').val();
         var is_admin = $('#txt_position').val();
        
         if(is_admin){
            $.ajax({
                type:'POST',
                url: siteUrl+'settings/menu/get_menu_option',
                data:{'is_admin':is_admin,'id_parent_menu':id_parent_menu},
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
                url: siteUrl+'settings/menu/get_menu_option',
                data:'is_admin='+id_pos,
                success:function(html){
                    $('#txt_parent_id').html(html);
                    
                }
            }); 
        }else{
            $('#txt_parent_id').html('<option value="">Pilih Position Terlebih Dahulu</option>');
           
        }
    });

    $('#is_admin').on('change',function(){
       //  var new_href = window.location.href + "?is_admin="+ $('#is_admin').val();
       location.reload(true);
       // if(window.location.hostname == "localhost"){
       //     window.location.href = window.location.href + "?single";
       //  } 
       // window.history.replaceState(null, null, "/another-new-url");
    });

    $('.textarea').summernote({
        callbacks: {
            onImageUpload: function (image) {
                uploadImage(image[0]);
            }
        }
    });

    $('#formInputMenu').submit(function(e){
        $('.menu.box').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
            e.preventDefault(); 
         $.ajax({
             url: siteUrl+'settings/menu/input_action',
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


    $('.filter-data-aa').click(function(){
        console.log('fasd')
      $('.box-body.pad').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
      
      var form = $('#filterdata');
      var data = form.serializeArray();
      var url = siteUrl +'data_penerima';

          if($('#showEntries').val() !== "")
          {
              data.push({name: 'is_admin', value:$('#showEntries').val()});
          }
         
      $.ajax({
        url: './settings/menu/search_data',
        method: 'POST',
        // dataType: 'json',
        data: data,
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
    });

    
    $('#showEntries').on('change',function(){
      $('.box-body.pad').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
      var val = $('#showEntries').val();

      if(val !== "")
      {
          $.ajax({
              url: './settings/menu/search_data',
              method: 'POST',
              // dataType: 'json',
              data: {'is_admin' : val},
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
    });
});