
$(document).ready(function() {
    console.log("asdasd")
	$('.textarea').wysihtml5();
	$('#formInputSlide').submit(function(e){
		$('.project.box').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
            e.preventDefault(); 
                 $.ajax({
                     url: siteUrl+'slide/input_action',
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
});