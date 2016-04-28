(function($){
	
	var file_info = null;
	var div = $('#divTastic');
	
	$('#button').on('click', function(){
		if(file_info == null)
		{	
			$.ajax({
				url: "file1.txt",
				async: false,
				success: function(in_file_info)
				{
					file_info = in_file_info;
				}
			})
			div.append(file_info);
		}
		else if(div.is(':visible'))
		{
			div.hide();
		}
		else
		{
			div.show();
		}
	});
})(jQuery);