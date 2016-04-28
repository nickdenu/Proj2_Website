(function($){
	
	var file_info = null;
	var div = $('#divTastic');
	var c_answers = {};
	var c_question = [0,0,0];
	var counter = 0;
	var correct = 0;
	var but_pressed = 0;
	$('#button').on('click', function(){
		but_pressed = 1;
		var xmlhttprequest = new XMLHttpRequest();
		$('#button').hide();
		$('.quiz').show();
		xmlhttprequest.onreadystatechange = function(){
			if(xmlhttprequest.readyState == 4)
			{
				var xml_data = xmlhttprequest.responseXML;
				var problem = xml_data.getElementsByTagName("problem");
				for(i = 0 ; i < problem.length ; i++)
				{
					var question = problem[i].getElementsByTagName("question")[0];
					if(i == 0)
					{
						$('#q1').append(question.innerHTML);
						menu = $('#menu1');
					}
					if(i == 1)
					{
						$('#q2').append(question.innerHTML);
						menu = $('#menu2');
					}
					if(i == 2)
					{
						$('#q3').append(question.innerHTML);
						menu = $('#menu3');
					}
					var answers = problem[i].getElementsByTagName("answer")[0];
					while(answers != null)
					{
						counter++;
						menu.append("<option value=\"" + answers.innerHTML + "\">" + answers.innerHTML + "<//option>");
						answers = problem[i].getElementsByTagName("answer")[counter];
					}
					c_answers[i] = problem[i].getElementsByTagName("correct")[0].innerHTML;
					counter = 0;
				}
			}
		}
				xmlhttprequest.open("GET", "data.xml", true);
				xmlhttprequest.send();
	});
	
	$('#menu1').on('click', function(){
		if($(this).val() == c_answers[0] && c_question[0] != 1)
		{
			correct++;
			c_question[0] = 1;
			$('#result1').empty();
			$('#result1').append("Correct!!!");
			$('#total').empty();
			$('#total').append(correct);
		}
		else if($(this).val() != c_answers[0] && c_question[0] == 1)
		{
			correct--;
			c_question[0] = 0;
			$('#result1').empty();
			$('#result1').append("Wrongo");
			$('#total').empty();
			$('#total').append(correct);
		}
		else
		{
			$('#result1').empty();
			$('#result1').append("Wrongo");
			$('#total').empty();
			$('#total').append(correct);
		}
		
	});
	
	$('#menu2').on('click', function(){
		if($(this).val() == c_answers[1] && c_question[1] != 1)
		{
			correct++;
			c_question[1] = 1;
			$('#result2').empty();
			$('#result2').append("Correct!!!");
			$('#total').empty();
			$('#total').append(correct);
		}
		else if($(this).val() != c_answers[1] && c_question[1] == 1)
		{
			correct--;
			c_question[1] = 0;
			$('#result2').empty();
			$('#result2').append("Wrongo");
			$('#total').empty();
			$('#total').append(correct);
		}
		else
		{
			$('#result2').empty();
			$('#result2').append("Wrongo");
			$('#total').empty();
			$('#total').append(correct);
		}
	});
	
	$('#menu3').on('click', function(){
		if($(this).val() == c_answers[2] && c_question[2] != 1)
		{
			correct++;
			c_question[2] = 1;
			$('#result3').empty();
			$('#result3').append("Correct!!!");
			$('#total').empty();
			$('#total').append(correct);
		}
		else if($(this).val() != c_answers[2] && c_question[2] == 1)
		{
			correct--;
			c_question[2] = 0;
			$('#result3').empty();
			$('#result3').append("Wrongo");
			$('#total').empty();
			$('#total').append(correct);
		}
		else
		{
			$('#result3').empty();
			$('#result3').append("Wrongo");
			$('#total').empty();
			$('#total').append(correct);
		}
	});
	
})(jQuery);