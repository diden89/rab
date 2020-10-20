
function removedata(obj){
    var self = $(obj);
    self.parent().parent().remove();
    // console.log(self.parent().parent());
}

function deletedata(id){
    $('.company.box').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
    $.ajax({
         url: siteUrl+'company/delete_contact',
         type:"post",
         data: 'id='+id,
         dataType :'json',
         success: function(response){
            if(response.status)
            {
                $('div.overlay').remove();
              alert("Berhasil.");
              window.location.replace(response.url);
            }
            else
            {
                $('div.overlay').remove();
                alert("Gagal.");
            }

       }
    });
}

$(document).ready(function() {
	$('.textarea').wysihtml5();
	$('#formInputCompany').submit(function(e){
		$('.company.box').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
            e.preventDefault(); 
                 $.ajax({
                     url: siteUrl+'company/input_action',
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

    // dynamically form
    $(".add-input").click(function(){ 
       
        var inner = '<div class="row">';
        inner += '<div class="col-sm-2">';
        inner += '<select name="c_type[]" class="form-control">';
        inner += '<option value="">-- Select Contact Type --</option>';
        inner += '<option value="p">Phone</option>';
        inner += '<option value="hp">Handphone</option>';
        inner += '<option value="wa">Whatsapp</option>';
        inner += '<option value="email">Email</option>';
        inner += '<option value="other">Other</option>';
        inner += '</select></div>';
        inner += '<input type="hidden" name="c_id[]" id="c_id" value="">';
        inner += '<div class="col-sm-2"><input type="text" class="form-control" placeholder="Contact Number" name="c_detail[]" id="c_detail"></div>';
        inner += '<div class="col-sm-3"><input type="text" class="form-control" placeholder="URL" name="c_url[]" id="c_url"></div>';
        inner += '<div class="col-sm-4"><input type="text" class="form-control" placeholder="Message" name="c_message[]" id="c_message"></div> ';
        inner += '<div class="col-sm-1"><button class="btn btn-default fa fa-trash remove-child" type="button" onclick="removedata(this)"></button></div>';
        inner += '</div>';
        

        $('#multipleAdd').append(inner);
    });

});