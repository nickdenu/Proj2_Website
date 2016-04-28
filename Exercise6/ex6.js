(function($){
	var regex = /[Cc][Ss][0-3][0-9][0-9][0-9]/g;
	
	$('.myform').submit(function(){
		if(regex.test($('#course').val()))
		{
			$('#hidden').val('correct');
			console.log("correct.");
			return true;
		}
		else
		{
			alert("You must first complete the field correctly.\nEx: CS0449");
			console.log("incorrect.");
			$('#course').val("");
			return false;
		}
	});
})(jQuery);