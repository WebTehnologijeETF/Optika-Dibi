
function poziv1(){
var ajax = new XMLHttpRequest();
			var param = "https://restcountries.eu/rest/v1/currency/" + c.value;
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
			
				var country = document.getElementById('drzava').value;
			
				var data = JSON.parse(ajax.responseText);
				if(data[0].name != country)
				{
					setError(id[2], "The currency you entered doesnt't match the country");
					valid = false;
				
				}
				else
				resolveError(id[2]);
				
				}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					setError(id[2], "The currency you entered doesnt't exist");
					valid = false;
				
				
				}
		}
			ajax.open("GET", param, true);
			ajax.send();
			
}



function poziv2(){
var ajax = new XMLHttpRequest();
			var param = "https://restcountries.eu/rest/v1/currency/" + c.value;
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
			
				var country = document.getElementById('drzava').value;
			
				var data = JSON.parse(ajax.responseText);
				if(data[0].name != country)
				{
					setError(id[2], "The currency you entered doesnt't match the country");
					valid = false;
				
				}
				else
				resolveError(id[2]);
				
				}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					setError(id[2], "The currency you entered doesnt't exist");
					valid = false;
				
				
				}
		}
			ajax.open("GET", param, true);
			ajax.send();
			
}