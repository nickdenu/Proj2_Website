var used = [];
var freq = [];

function buttonPush(){
	var xmlhttprequest;
	xmlhttprequest = new XMLHttpRequest();
	xmlhttprequest.onreadystatechange = function() 
	{
		if(xmlhttprequest.readyState == 4 && xmlhttprequest.status == 200)
		{
			var xml_text = xmlhttprequest.responseXML;
			var seen_index;
			word = $(xml_text).find('Word').find('value').text();
			var i; 
			var bool = false;
			for(i = 0; i < used.length; i++)
			{
				if(used[i] == word){
					bool = true;
					seen_index = i;
					break;
				}else{
					bool = false;
				}
			}
			if(bool)
			{
				freq[seen_index]++;
			}
			else
			{
				freq.push(1);
				used.push(word);
			}
			$('#table tbody').empty();
			for(i = 0; i < used.length; i++)
			{
				$('#table tbody:last-child').append("<tr><td>" + used[i] + "</td><td>" + freq[i] + "</td></tr>");
			}
		}
	}
	xmlhttprequest.open("GET","getWords.php",true);
	xmlhttprequest.send();
};