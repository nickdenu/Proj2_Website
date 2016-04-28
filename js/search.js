(function($){
	$('#search_button').on('click', function(){
		$.ajax({
			   type: "POST",
			   url: "../visible/posts.php",
			   dataType: "html",
			   data: {search : $('#search_text').val()},
			   success: function(data)
			   {
				   console.log(data);
				   $('body').empty();
				   $('body').html(data);
			   }
			 });
	});
})(jQuery)