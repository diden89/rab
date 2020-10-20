$(document).ready(function(){
	function create_transfer_donate()
	{
	  // if( !hasOneDayPassed() ) return false;

	  $.ajax({
	      url: siteUrl+'/home/create_transfer_donate',
	      method:"POST",
	      dataType:"json",
	      success:function(data) { }
	  });
	}

	// var setInt = 1000;
	var setInt = 6000;
	setInterval(function(){ 
	  create_transfer_donate();
	 }, setInt);

});