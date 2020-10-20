jQuery(function()
{	
	// function untuk mengambil semua data
	
	function getAll()
	{
		$.ajax({
			url: siteUrl+'products/filter_data',
			data: 'action=show-all',
			cache : false,
			success: function(response){
				// jika berhasil 
				$("#show-product").html(response);
			}
		});			
	}
	
	 getAll(); // load ketika document ready

	// ketika ada event change
	$("#getProduct").change(function()
	{				
		var Id = $(this).find(":selected").val();
		var DataString = 'action='+ Id;
			
		$.ajax({
			url: siteUrl+'products/filter_data',
			data: DataString,
			cache : false, 
			success: function(response){
				// jika berhasil 
				
				$("#show-product").html(response);
			} 
		});
	})

	
});