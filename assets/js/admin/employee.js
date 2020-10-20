function doSearch(obj)
{
    var data = $(obj);
    if(data.val().length > 2)
    {
        $.ajax({
          url: siteUrl+'employee/search_data',
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
          url: siteUrl+'employee/search_data',
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
	
	$('#formInputEmployee').submit(function(e){
		$('.project.box').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
            e.preventDefault(); 
                 $.ajax({
                     url: siteUrl+'employee/input_action',
                     type:"post",
                     data:new FormData(this),
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

    // funsgi pencarian dan filter
    $('#searchdata').on('keyup',function(){
        doSearch(this);
    });

    $('#showEntriesData').on('change',function(){
        $('.box-body.pad').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        var val = $('#showEntriesData').val();

        if(val !== "")
        {
          $.ajax({
              url: siteUrl+'employee/search_data',
              method: 'POST',
              // dataType: 'json',
              data: {'position_id' : val},
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
    //end fungsi pencarian

    $('.textarea').wysihtml5();
});