jQuery(function()
{

// filter data untuk halaman services
	function getAllProject()
	{
		$.ajax({
			url: siteUrl+'project/filter_data',
			data: 'action=show-all',
			cache : false,
			success: function(response){
				// jika berhasil 
				$("#show-project").html(response);
			}
		});		
	}

	getAllProject();

	$("#getProject").change(function()
	{				
		var Id = $(this).find(":selected").val();
		var DataString = 'action='+ Id;
			
		$.ajax({
			url: siteUrl+'project/filter_data',
			data: DataString,
			cache : false, 
			success: function(response){
				// jika berhasil 
				
				$("#show-project").html(response);
			} 
		});
	})

});