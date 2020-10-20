function showImage(img_src){
    console.log(img_src)
    $("#mymodal").modal("show", {backdrop: "static"});
    document.getElementById("img01").setAttribute("src" , img_src);
    // document.getElementById("img01").setAttribute("width" , "500px");
}
$(document).ready(function() {

	$('#nominalTrf').on('keyup',function(ob){
		
	});

	$('#formGoBantu').submit(function(e){
		$('.modal-body').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        e.preventDefault(); 
        $.ajax({
             url: siteUrl+'data_penerima/input_action',
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

    $('#comment_form').on('submit', function(event){
        var url = $('#url').val();
        
        event.preventDefault();
        if($('#fname').val() != '' && $('#email').val() != '' && $('#subject').val() != '' && $('#captcha').val() != '' && $('#message').val() != ''&& $('#lname').val() != '')
        {
            var form_data = $(this).serialize();
            $.ajax({
                url: siteUrl+url+"/send_message",
                method:"POST",
                data:form_data,
                dataType : 'json',
                success:function(response)
                {
                    if(response.status)
                    {
                        alert(response.msg);
                        $('#comment_form')[0].reset();
                        $.ajax({
                            dataType :'text',
                            cache : false,
                            url:siteUrl+url+'/get_captcha',
                            success:function(data){
                                console.log(data)
                             $('.captcha-img').html(data);
                            }
                        }); 
                        // window.location.replace(response.url);
                    }
                    else
                    {
                        alert(response.msg);
                        $.ajax({
                            dataType :'text',
                            cache : false,
                            url:siteUrl+url+'/get_captcha',
                            success:function(data){
                                console.log(data)
                             $('.captcha-img').html(data);
                            }
                        }); 
                    }
                }
            });
        }
        else
        {
        alert("Both Fields are Required");
        }
    });
});