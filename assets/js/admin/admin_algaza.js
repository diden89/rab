
$(document).ready(function(){
 // lagi ngerjain ini
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#fname').val() != '' && $('#lname').val() != '' && $('#email').val() != '' && $('#message').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url: siteUrl+"contact/send_message",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     alert('Send Message Success');
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }


 });

function get_notification(view = "")
{
    $.ajax({
        url: siteUrl+'home/get_new_notif',
        method:"POST",
        data:{view:view},
        dataType:"json",
        success:function(data)
        {
            $('.notif-baru').html(data.notification);
            if(data.unseen_notification > 0)
            {
             $('.jml-notif').html(data.unseen_notification);
            }
        }
    });
}

function get_new_inbox()
{
    $.ajax({
        url: siteUrl+'data_modem/get_new_inbox',
        method:"POST",
        dataType:"json",
        success:function(data)
        {

        }
    });
}

get_new_inbox();
get_notification();

$(document).on('click', '.klik-notif', function(){
  $('.jml-notif').html('');
  get_notification('yes');
 });
 
 setInterval(function(){ 
  get_notification(); 
  get_new_inbox(); 
 }, 100000); 

// var intDonate = 1000 * 60 * 60 * 24;
//  setInterval(function(){ 
//   create_transfer_donate(); 
//  }, intDonate);

function load_unseen_notification(view = '')
 {
    $.ajax({
        url: siteUrl+'home/get_new_message',
        method:"POST",
        data:{view:view},
        dataType:"json",
        success:function(data)
        {
            $('.pesan-masuk').html(data.notification);
            if(data.unseen_notification > 0)
            {
             $('.jumlah-pesan').html(data.unseen_notification);
            }
        }
    });
}
 
 // load_unseen_notification();

 // $(document).on('click', '.klik-pesan', function(){
 //  $('.jumlah-pesan').html('');
 //  load_unseen_notification('yes');
 // });
 
 // setInterval(function(){ 
 //  load_unseen_notification();; 
 // }, 50000);
 

 function hasOneDayPassed()
 {
  // get today's date. eg: "7/37/2007"
  var date = new Date().toLocaleDateString();
  // if there's a date in localstorage and it's equal to the above: 
  // inferring a day has yet to pass since both dates are equal.
  if( localStorage.yourapp_date == date ) 
      return false;

  // this portion of logic occurs when a day has passed
  localStorage.yourapp_date = date;
  return true;
}
 
});
