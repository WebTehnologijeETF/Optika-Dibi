
function Load(link)
    {
	 
       var ajax = new XMLHttpRequest();
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200 )
			{
				//document.getElementById('main').innerHTML = changeMain(ajax.responseText);
                document.getElementById('main').innerHTML = ajax.responseText;
				window.scrollTo(0,200)
			}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					alert("Greška učitavanja");
				}
		}
	
			ajax.open("GET", link, true);
			ajax.send();

    }
	
	
	
	
	
function changeMain(tijelo) 
{ 
   var x = tijelo.indexOf("<body");
  
   x = tijelo.indexOf(">", x);    

   var y = tijelo.lastIndexOf("</body>"); 
   
   
   return tijelo.slice(x + 1, y);
}

function posaljiMail(){

	var ime=document.getElementById('name').value;
	var email=document.getElementById('email').value;
	var telefon =document.getElementById('telefon').value;
	var komentar=document.getElementById('poruka').value;
	
	var ajax = new XMLHttpRequest();
	var s;
        ajax.onreadystatechange = function() 
        {
         
            if (ajax.readyState == 4 && ajax.status == 200)
            {
			
              	var tekst = ajax.responseText;
					var kom = JSON.parse(tekst);
			
				 if (kom.ok == "ok") {
					s="<div class='login'><h2>Uspjesno ste poslali mail <a href='Kontakt.php'>Natrag</a></h2></div>"
					document.getElementById("kontaktForma").innerHTML=s;
				 }
            }
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }
	  ajax.open("POST", "phpSkripte/slanjeMaila.php",true);
	 ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.send("ime="+ime + "&email=" + email+ "&telefon=" + telefon+ "&komentar=" + komentar );
}


function kontaktValidacija(){

	var ime=document.getElementById('name').value;
	var email=document.getElementById('email').value;
	var telefon =document.getElementById('telefon').value;
	var adresa=document.getElementById('adresa').value;
	var komentar=document.getElementById('poruka').value;
	
	var ajax = new XMLHttpRequest();
	var obj;
        ajax.onreadystatechange = function() 
        {
			

            if (ajax.readyState == 4 && ajax.status == 200)
            {
				
				var tekst = ajax.responseText;
				var kom = JSON.parse(tekst);
				var validnost=kom.validnost;
				var nameErr=kom.nameErr;
				var emailErr=kom.emailErr;
				var telErr=kom.telErr;
				var adresaErr=kom.adresaErr;
				
				if(validnost=="T"){
				
					posaljiMail();
				}
			
				else {
				
				
					document.getElementById('name').value=ime;
				
					if(nameErr=="Morate unijeti ime" || nameErr=="Samo znakovi i blanko znakovi su dozvoljeni" )
						document.getElementById('name').style.backgroundColor="#FF8080";
					else 
						document.getElementById('name').style.backgroundColor="#80FF80";
					if(nameErr=="Morate unijeti ime" || nameErr=="Samo znakovi i blanko znakovi su dozvoljeni")
						document.getElementById('name').class="NOTOK";
				 document.getElementById("error1").innerHTML=nameErr;
				 
				 document.getElementById('email').value=email;
					
					if(emailErr=="Morate unijeti email" || emailErr=="Nije validan email formata" )
						document.getElementById('email').style.backgroundColor="#FF8080";
					else 
						document.getElementById('email').style.backgroundColor="#80FF80";
					if(emailErr=="Morate unijeti email" || emailErr=="Nije validan email formata")
						document.getElementById('email').class="NOTOK";
				document.getElementById("error2").innerHTML=emailErr;
					
					document.getElementById('telefon').value=telefon;
					
					if(telErr=="Morate unijeti telefon" || telErr=="Nije validan format telefona" )
						document.getElementById('telefon').style.backgroundColor="#FF8080";
					else 
						document.getElementById('telefon').style.backgroundColor="#80FF80";
					if(telErr=="Morate unijeti telefon" || telErr=="Nije validan format telefona")
						document.getElementById('telefon').class="NOTOK";
				  document.getElementById("error3").innerHTML=telErr;

				
				document.getElementById('adresa').value=adresa;
					
					if(adresaErr=="Morate unijeti adresu stanovanja")
						document.getElementById('adresa').style.backgroundColor="#FF8080";
					else 
						document.getElementById('adresa').style.backgroundColor="#80FF80";
					if(adresaErr=="Morate unijeti adresu stanovanja")
						document.getElementById('adresa').class="NOTOK";
					
				  document.getElementById("error4").innerHTML=adresaErr;

			
				}
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }
	  ajax.open("GET", "phpSkripte/kontaktValidiranje.php?ime=" + ime + "&email=" + email +"&telefon=" + telefon +"&adresa=" + adresa,true);
	ajax.send();
	
}


function staviPrazno(ID){
	
	if (ID>0 && ID <1000){
	  var obj = document.getElementById(ID) ;
	  obj.innerHTML="";
	}
}



var upamti=0;
function novosti(ID)
{
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() 
        {
            var obj = document.getElementById(ID) ;
            if (ajax.readyState == 4 && ajax.status == 200)
            {
				if (upamti==0){
				  var tekst = ajax.responseText;
				kom = JSON.parse(tekst);
				 var p = kom.novosti[0];
				var s='<br>'+ p.Detaljnije +'<br>';
		
                obj.innerHTML = s;
				upamti=1;
				}
				else {
					staviPrazno(ID);
					upamti=0;
					
				}
            }
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }
         ajax.open("GET", "phpSkripte/REST_detaljnije.php?ID="+ID,true);
	 
	ajax.send();

}




function postaviKomentar(ID){
	
	var ajax = new XMLHttpRequest();
	var s;
        ajax.onreadystatechange = function() 
        {
         
			 s= document.getElementById('poruka').value;
			
            if (ajax.readyState == 4 && ajax.status == 200)
            {
              	var tekst = ajax.responseText;
					var kom = JSON.parse(tekst);
			
				 if (kom.ok == "ok") {
					Load("../Naslovnica.php");
				
				 }
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }
	  ajax.open("POST", "phpSkripte/tut10.php",true);
	 ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.send("tekst="+s + "&ID=" + ID );
}

var klik=0;
function komentari(ID)
{
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() 
        {

			var s="";
            if (ajax.readyState == 4 && ajax.status == 200)
            {
                var tekst = ajax.responseText;
				 kom = JSON.parse(tekst);

             if (klik==0){
                for(var i=0; i<kom.komentari.length; i++)
                {	
			
			  var p = kom.komentari[i];
                    var datum=new Date(p.Datum_Vrijeme);
					var datum=datum.toDateString();
					
                        if (p.Autor!=null){
								 s = s+'<br>' 
								+'<div>Datum pisanja komentara: </div>'
								+datum +'<br>'
								+'<div> Autor je :'+'<a href="mailto: '+p.Email+'">' + p.Autor
								+'</a>'+'<br>'
								+p.Email +'<br>'
								+'<br><br>'
								+p.Tekst+'<br><br>';			
						}
						else {
							
								 s = s+'<br>' 
								+'<div>Datum pisanja komentara: </div>'
								+datum+'<br>'
								+'<div> Autor je anonimus</div>'
								+'<br><br>'
								+p.Tekst+'<br><br>';
						}					
				}
				if (s==""){
				s='<br><br>Unesite poruku : <br><textarea id ="poruka" value="" name="comment" value="">'
				+'</textarea><br><br>'
				+'&nbsp;&nbsp;<input class="my-stylish-button" type="button" value="Pošalji poruku" id ="dugme" onclick="postaviKomentar('+ID+');"><br><br>';
					
				}
				else{
				
				//ne treba mi vise nista, samo poruka
				s=s+'<textarea id ="poruka" value="" name="comment" value="">'
				+'</textarea><br><br>'
				+'&nbsp;&nbsp;<input class="my-stylish-button" type="button" value="Pošalji poruku" id ="dugme" onclick="postaviKomentar('+ID+');"><br><br>';
				
				}
				if (ID>0 && ID <1000){
					
				document.getElementById(ID).innerHTML=s;
			 }
			 klik=1;
			 }
			 else {
				 staviPrazno(ID);
				 klik=0;
			 }
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }
        
		

	  ajax.open("GET", "phpSkripte/tut10.php?ID="+ID,true);
	 
	ajax.send();
		
}


function obrisi(ID){
	
	var ajax = new XMLHttpRequest();
	 
        ajax.onreadystatechange = function() 
        {
			 var obj = document.getElementById('prikaz') ;
            if (ajax.readyState == 4 && ajax.status == 200)
            {
					var tekst = ajax.responseText;
					var kom = JSON.parse(tekst);
			
				 if (kom.ok == "ok") 
               prikaziSve();
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }	
	  ajax.open("DELETE", "phpSkripte/tut10.php?ID="+ID,true); 
	ajax.send();	
}




function prikaziSve()
{
        var ajax = new XMLHttpRequest();
		
        ajax.onreadystatechange = function() 
        {
			var kom;
            var obj = document.getElementById('prikaz') ;
		var s;

            if (ajax.readyState == 4 && ajax.status == 200)
            {
                var tekst = ajax.responseText;
				kom = JSON.parse(tekst);
				s='<br><br><br>'
				+'<table> <tr><th>ID:</th><th>Autor:</th><th>Email:</th><th>Datum objave:</th>'
				+'<th>Tekst:</th><th>Dugme</th> </tr>';
               
                for(var i=0; i<kom.komentari.length; i++)
                {	
			
	var p = kom.komentari[i];
	 var datum=new Date(p.Datum_Vrijeme);
	 datum=datum.toDateString();
	 
	var ID=p.IDKomentar; 
	s=s+'<tr><td><input type="text"  title="prvi znak mora biti slovo" id ="IDKomentar" name="IDKomentar"  value="'+p.IDKomentar+'" disabled=true >  </td>'
	+ ' <td>	<input type="text"   id ="autorNovosti" name="autorNovosti"  value="'+p.Autor+'" disabled=true > </td>'
	+' <td><input type="text"   id ="email" name="email"  value="'+p.Email+'" disabled=true ></td>'
	+ '<td><input type="text" id ="datumObjaveNovosti" name="datumObjaveNovosti" value="'+datum+'" disabled=true ></td>'
	+' <td><input type="text"   id ="tekstNovosti" name="tekstNovosti"  value="'+p.Tekst+'" disabled=true > </td>'
	+'	<input  name="dajID" id="dajID" value ="'+p.IDKomentar+'" type="hidden">'
	+' <td>	&nbsp;&nbsp;'
	+'<input class="my-stylish-button" type="button" name="obrisi" id ="ObrisiDugme" onclick="obrisi('+ID+'); return false;">'
	+'</td> </tr>';
				}
				
	s=s+'	 </table>  <br><br>';
			
				var dugme = document.getElementById('prikaz').innerHTML=s;
				
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }	
		ID=1000;
	  ajax.open("GET", "phpSkripte/tut10.php?ID="+ID,true);
	 
	ajax.send();
	
}



function prikaziNovosti()
{
        var ajax = new XMLHttpRequest();		
        ajax.onreadystatechange = function() 
        {
			var kom;
            var obj = document.getElementById('prikaz') ;
			var s;
            if (ajax.readyState == 4 && ajax.status == 200)
            {
                var tekst = ajax.responseText;
				kom = JSON.parse(tekst);
					s='<table> <tr><th>ID:</th><th>Autor:</th><th>Naslov:</th><th>Datum objave:</th>'
				+'<th>Tekst:</th><th>Detaljnije:</th><th>Slika:</th><th>Dugme</th> </tr>';
			  for(var i=0; i<kom.novosti.length; i++)
                {	
			
	var p = kom.novosti[i];
	 var ID=p.IDNovosti;
	 var autor=p.Autor;
	
	  var datum=new Date(p.Datum);
	 datum=datum.toDateString();
	  var naslov=p.Naslov;
	 var tekst=p.Tekst;
	 var detaljnije=p.Detaljnije;
	 var slika=p.Slika;
		 			s=s+'<tr> <td><input type="text" name="idNovosti"  value="'+ID +'" disabled=true > </td>'
	 +'<td>	<input type="text"   name="autorNovosti"  value="'+autor+'" disabled=true > </td>'
	+' <td><input type="text" name="naslovNovosti"  value="'+naslov+'" disabled=true > </td>'
	+' <td><input type="text"  name="datumObjaveNovosti"  value="'+datum+'" disabled=true > </td>'
	+' <td><input type="text" name="tekstNovosti"  value="'+naslov+'" disabled=true ></td>'
	+'<td><input type="text" name="detaljnije"  value="'+detaljnije+'"  disabled=true></td>'
	+'<td><input type="text" name="slika"  value="'+slika+'"  disabled=true></td> '
	+'<td><input class="my-stylish-button" type="button" value="obrisi" id ="Dodaj"  onClick="deleteNovost('+ID+'); return false;" ></td></tr>';
			
		
				}
					s=s+'</table><br><br>';
			
			document.getElementById('prikaz').innerHTML=s;
				
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }	
		ID=1000;
	  ajax.open("GET", "phpSkripte/REST_novosti.php?ID="+ID,true);
	 
	ajax.send();
	
}


function prikaziUnosNovosti()
{
        var ajax = new XMLHttpRequest();		
        ajax.onreadystatechange = function() 
        {
			var kom;
            var obj = document.getElementById('prikaz') ;
			var s;
            if (ajax.readyState == 4 && ajax.status == 200)
            {
				  var tekst = ajax.responseText;
				kom = JSON.parse(tekst);
                s='<table> <tr><th>ID:</th><th>Autor:</th><th>Naslov:</th><th>Datum objave:</th>'
				+'<th>Tekst:</th><th>Detaljnije:</th><th>Slika:</th><th>Dugme</th> </tr>';
		   for(var i=0; i<kom.novosti.length; i++)
                {	
			
	var p = kom.novosti[i];
	 var ID=p.IDNovosti;
	 var autor=p.Autor;

	var datum=new Date(p.Datum);
	 datum=datum.toDateString();
	
	 var naslov=p.Naslov;
	 var tekst=p.Tekst;
	 var detaljnije=p.Detaljnije;
	 var slika=p.Slika;
	s=s+'<tr> <td><input type="text" name="idNovosti"  value="'+ID +'" disabled=true > </td>'
	 +'<td>	<input type="text"   name="autorNovosti"  value="'+autor+'" disabled=true > </td>'
	+' <td><input type="text" name="naslovNovosti"  value="'+naslov+'" disabled=true > </td>'
	+' <td><input type="text"  name="datumObjaveNovosti"  value="'+datum+'" disabled=true > </td>'
	+' <td><input type="text" name="tekstNovosti"  value="'+naslov+'" disabled=true ></td>'
	+'<td><input type="text" name="detaljnije"  value="'+detaljnije+'"  disabled=true></td>'
	+'<td><input type="text" name="slika"  value="'+slika+'"  disabled=true></td> </tr>';
				}
				
				s=s+'<tr><td><input type="text"  id ="idNovosti2" name="idNovosti2" disabled=true > </td>'
			+'<td>	<input type="text"   id ="autorNovosti2" name="autorNovosti2"   ></td>'
			+'<td><input type="text"   id ="naslovNovosti2" name="naslovNovosti2"   ></td>'
			+'<td><input type="text"  id ="datumObjaveNovosti2" name="datumObjaveNovosti2"  disabled=true ></td>'
			+'<td><input type="text"   id ="tekstNovosti2" name="tekstNovosti2"   ></td>'
			+'<td><input type="text"   id ="detaljnije2" name="detaljnije2"   ></td>'
			+'<td><input type="text"   id ="slika2" name="slika2"  ></td>';
			s=s+'<td>	&nbsp;&nbsp;<input class="my-stylish-button" type="button" value="Dodaj" id ="Dodaj"  onClick="insertNovost(); return false;" ></td></tr>'
			+'</table><br><br>';		 
			
			document.getElementById('prikaz').innerHTML=s;
				
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }	
		ID=1000;
	  ajax.open("GET", "phpSkripte/REST_novosti.php?ID="+ID,true);
	 
	ajax.send();
	
}




function prikaziPromjenuNovosti()
{
        var ajax = new XMLHttpRequest();		
        ajax.onreadystatechange = function() 
        {
			var kom;
            var obj = document.getElementById('prikaz') ;
			var s;
            if (ajax.readyState == 4 && ajax.status == 200)
            {
				  var tekst = ajax.responseText;
				kom = JSON.parse(tekst);
               s='<table> <tr><th>ID:</th><th>Autor:</th><th>Naslov:</th><th>Datum objave:</th>'
		+'<th>Tekst:</th><th>Detaljnije:</th><th>Slika:</th><th>Dugme</th> </tr>';
		
		for(var i=0; i<kom.novosti.length; i++)
               {	
			
			var p = kom.novosti[i];
			var IDej=p.IDNovosti;
			var autor=p.Autor;
			var datum=new Date(p.Datum);
			 datum=datum.toDateString();
			var naslov=p.Naslov;
			var tekst=p.Tekst;
			var detaljnije=p.Detaljnije;
			var slika=p.Slika;
			s=s+'<tr> <td><input type="text"  id='+IDej+'  value="'+IDej +'" disabled=true > </td>'
			+' <td><input type="text" id="'+IDej+'autorNovosti"  value="'+autor+'"  > </td>'
			+' <td><input type="text" id="'+IDej+'naslovNovosti"  value="'+naslov+'"  > </td>'
			+' <td><input type="text"  name="datumObjaveNovosti"  value="'+datum+'" disabled=true > </td>'
			+' <td><input type="text" id="'+IDej+'tekstNovosti"  value="'+tekst+'"  ></td>'
			+'<td><input type="text" id="'+IDej+'detaljnije"  value="'+detaljnije+'" ></td>'
			+'<td><input type="text" id="'+IDej+'slika"  value="'+slika+'"></td>'
			+'<td><input class="my-stylish-button" type="button" value="promijeni" id ="Dodaj"  OnClick="br = ' + IDej + '; return false;" ></td></tr>';

				}
					s=s+'</table><br><br>';
				
					if (br!=0)
					promijeniNovost();	 
			
			document.getElementById('prikaz').innerHTML=s;
				
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }	
		ID=1000;
	  ajax.open("GET", "phpSkripte/REST_novosti.php?ID="+ID,true);
	 
	ajax.send();
	
}



function insertNovost(){
		
			var autor=document.getElementById("autorNovosti2").value;
			var naslov=document.getElementById("naslovNovosti2").value;
			var tekst=document.getElementById("tekstNovosti2").value;
			var detaljnije=document.getElementById("detaljnije2").value;
			var slika=document.getElementById("slika2").value;
	var ajax = new XMLHttpRequest();
	var obj;
        ajax.onreadystatechange = function() 
        {
         
			 obj= document.getElementById('prikaz').value;
			
            if (ajax.readyState == 4 && ajax.status == 200)
            {
				var tekst = ajax.responseText;
					var kom = JSON.parse(tekst);
			
				 if (kom.ok == "ok") 
               prikaziUnosNovosti();
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }
	  ajax.open("POST", "phpSkripte/REST_novosti.php",true);
	 ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	   ajax.send("tekst=" + tekst + "&autor=" + autor +"&detaljnije=" + detaljnije +"&naslov=" + naslov +"&slika=" + slika );
	
}

function deleteNovost(ID){
	var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() 
        {
			 var obj = document.getElementById('prikaz') ;
            if (ajax.readyState == 4 && ajax.status == 200)
            {
				var tekst = ajax.responseText;
					var kom = JSON.parse(tekst);
			
				 if (kom.ok == "ok") 
				prikaziNovosti();
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }	
	  ajax.open("DELETE", "phpSkripte/REST_novosti.php?ID="+ID,true); 
	ajax.send();	
}
var br=0;

function promijeniNovost(){
	if (br!=0){
		var ID=br;
			var autor=document.getElementById(ID+"autorNovosti").value;
		
			var naslov=document.getElementById(ID+"naslovNovosti").value;
			var tekst=document.getElementById(ID+"tekstNovosti").value;
			var detaljnije=document.getElementById(ID+"detaljnije").value;
			var slika=document.getElementById(ID+"slika").value;
			br=0;
	var ajax = new XMLHttpRequest();
	
		
		
        ajax.onreadystatechange = function() 
        {	
			 var obj = document.getElementById('prikaz') ;
            if (ajax.readyState == 4 && ajax.status == 200)
            {
				var tekst = ajax.responseText;
					var kom = JSON.parse(tekst);
			
				 if (kom.ok == "ok") 
				prikaziPromjenuNovosti();
			
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }	
/*  ajax.open("PUT", "REST_novosti.php?tekst=" + tekst + "&autor=" + autor +"&detaljnije=" + detaljnije +"&naslov=" + naslov +"&slika=" + slika+"&ID="+ID,true);
	   ajax.send();	*/
	   
	    ajax.open("PUT", "phpSkripte/REST_novosti.php",true);
	
	   ajax.send("tekst=" + tekst + "&autor=" + autor +"&detaljnije=" + detaljnije +"&naslov=" + naslov +"&slika=" + slika+"&ID="+ID );
}}


function dodajNovost(broj){
		
	  var ajax = new XMLHttpRequest();
		var s;
        ajax.onreadystatechange = function() 
        {
			var kom;
            var obj = document.getElementById('prikaz') ;
            if (ajax.readyState == 4 && ajax.status == 200)
            {
                var tekst = ajax.responseText;
				kom = JSON.parse(tekst);
			
               
              
	 if (broj==3){
		 	s='<table> <tr><th>ID:</th><th>Autor:</th><th>Naslov:</th><th>Datum objave:</th>'
				+'<th>Tekst:</th><th>Detaljnije:</th><th>Slika:</th><th>Dugme</th> </tr>';
		   for(var i=0; i<kom.novosti.length; i++)
                {	
			
	var p = kom.novosti[i];
	 var ID=p.IDNovosti;
	 var autor=p.Autor;

	var datum=new Date(p.Datum);
	 datum=datum.toDateString();
	
	 var naslov=p.Naslov;
	 var tekst=p.Tekst;
	 var detaljnije=p.Detaljnije;
	 var slika=p.Slika;
	s=s+'<tr> <td><input type="text" name="idNovosti"  value="'+ID +'" disabled=true > </td>'
	 +'<td>	<input type="text"   name="autorNovosti"  value="'+autor+'" disabled=true > </td>'
	+' <td><input type="text" name="naslovNovosti"  value="'+naslov+'" disabled=true > </td>'
	+' <td><input type="text"  name="datumObjaveNovosti"  value="'+datum+'" disabled=true > </td>'
	+' <td><input type="text" name="tekstNovosti"  value="'+naslov+'" disabled=true ></td>'
	+'<td><input type="text" name="detaljnije"  value="'+detaljnije+'"  disabled=true></td>'
	+'<td><input type="text" name="slika"  value="'+slika+'"  disabled=true></td> </tr>';
				}
	 }
		else if (broj==2){
				s='<table> <tr><th>ID:</th><th>Autor:</th><th>Naslov:</th><th>Datum objave:</th>'
				+'<th>Tekst:</th><th>Detaljnije:</th><th>Slika:</th><th>Dugme</th> </tr>';
			  for(var i=0; i<kom.novosti.length; i++)
                {	
			
	var p = kom.novosti[i];
	 var ID=p.IDNovosti;
	 var autor=p.Autor;
	
	  var datum=new Date(p.Datum);
	 datum=datum.toDateString();
	  var naslov=p.Naslov;
	 var tekst=p.Tekst;
	 var detaljnije=p.Detaljnije;
	 var slika=p.Slika;
		 			s=s+'<tr> <td><input type="text" name="idNovosti"  value="'+ID +'" disabled=true > </td>'
	 +'<td>	<input type="text"   name="autorNovosti"  value="'+autor+'" disabled=true > </td>'
	+' <td><input type="text" name="naslovNovosti"  value="'+naslov+'" disabled=true > </td>'
	+' <td><input type="text"  name="datumObjaveNovosti"  value="'+datum+'" disabled=true > </td>'
	+' <td><input type="text" name="tekstNovosti"  value="'+naslov+'" disabled=true ></td>'
	+'<td><input type="text" name="detaljnije"  value="'+detaljnije+'"  disabled=true></td>'
	+'<td><input type="text" name="slika"  value="'+slika+'"  disabled=true></td> '
	+'<td><input class="my-stylish-button" type="button" value="obrisi" id ="Dodaj"  onClick="deleteNovost('+ID+'); return false;" ></td></tr>';
			
		
				}
					s=s+'</table><br><br>';
				}
				
				
				
		else if (broj==1){
		s='<table> <tr><th>ID:</th><th>Autor:</th><th>Naslov:</th><th>Datum objave:</th>'
		+'<th>Tekst:</th><th>Detaljnije:</th><th>Slika:</th><th>Dugme</th> </tr>';
		
		for(var i=0; i<kom.novosti.length; i++)
               {	
			
			var p = kom.novosti[i];
			var IDej=p.IDNovosti;
			var autor=p.Autor;
			var datum=new Date(p.Datum);
			 datum=datum.toDateString();
			var naslov=p.Naslov;
			var tekst=p.Tekst;
			var detaljnije=p.Detaljnije;
			var slika=p.Slika;
			s=s+'<tr> <td><input type="text"  id='+IDej+'  value="'+IDej +'" disabled=true > </td>'
			+' <td><input type="text" id="'+IDej+'autorNovosti"  value="'+autor+'"  > </td>'
			+' <td><input type="text" id="'+IDej+'naslovNovosti"  value="'+naslov+'"  > </td>'
			+' <td><input type="text"  name="datumObjaveNovosti"  value="'+datum+'" disabled=true > </td>'
			+' <td><input type="text" id="'+IDej+'tekstNovosti"  value="'+tekst+'"  ></td>'
			+'<td><input type="text" id="'+IDej+'detaljnije"  value="'+detaljnije+'" ></td>'
			+'<td><input type="text" id="'+IDej+'slika"  value="'+slika+'"></td>'
			+'<td><input class="my-stylish-button" type="button" value="promijeni" id ="Dodaj"  OnClick="br = ' + IDej + '; return false;" ></td></tr>';

				}
					s=s+'</table><br><br>';
				
					if (br!=0){
						//	alert(br);
						//alert(document.getElementById(ID+"autorNovosti").value);
					promijeniNovost();
					}
			
				}
				
		if (broj==3){
				
			s=s+'<tr><td><input type="text"  id ="idNovosti2" name="idNovosti2" disabled=true > </td>'
			+'<td>	<input type="text"   id ="autorNovosti2" name="autorNovosti2"   ></td>'
			+'<td><input type="text"   id ="naslovNovosti2" name="naslovNovosti2"   ></td>'
			+'<td><input type="text"  id ="datumObjaveNovosti2" name="datumObjaveNovosti2"  disabled=true ></td>'
			+'<td><input type="text"   id ="tekstNovosti2" name="tekstNovosti2"   ></td>'
			+'<td><input type="text"   id ="detaljnije2" name="detaljnije2"   ></td>'
			+'<td><input type="text"   id ="slika2" name="slika2"  ></td>';
			s=s+'<td>	&nbsp;&nbsp;<input class="my-stylish-button" type="button" value="Dodaj" id ="Dodaj"  onClick="insertNovost(); return false;" ></td></tr>'
			+'</table><br><br>';		 
				}
					document.getElementById('prikaz').innerHTML=s;

            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }	
		ID=1000;
	  ajax.open("GET", "phpSkripte/REST_novosti.php?ID="+ID,true);
	 
	ajax.send();
		
}



function prikaziPromjenuKorisnika()
{
        var ajax = new XMLHttpRequest();		
        ajax.onreadystatechange = function() 
        {
			var kom;
            var obj = document.getElementById('prikaz') ;
			var s;
            if (ajax.readyState == 4 && ajax.status == 200)
            {
				  var tekst = ajax.responseText;
				kom = JSON.parse(tekst);
              	s='<table> <tr><th>Username:</th><th>Password:</th><th>Email:</th><th>Dugme</th> </tr>';
		
		for(var i=0; i<kom.korisnici.length; i++)
               {	
			
			var p = kom.korisnici[i];
			var usernejm=p.Username;
			var pass=p.Password;
			var mejl=p.Email;
		
			s=s+'<tr> <td><input type="text"  id="'+usernejm+'"  value="'+usernejm +'" disabled=true > </td>'
			+' <td><input type="password" id="'+usernejm+'password"  value="'+pass+'"  > </td>'
			+' <td><input type="email" id="'+usernejm+'email"  value="'+mejl+'"  > </td>'
			+'<td><input class="my-stylish-button" type="button" value="promijeni" id ="Dodaj"  OnClick="brojac = ' + usernejm + '; return false;" ></td></tr>';
				}
					s=s+'</table><br><br>';
				
					if (brojac!=""){
						//alert(brojac.value);
					promijeniKorisnika();}
			
			document.getElementById('prikaz').innerHTML=s;
				
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }	
		username="lap";
	  ajax.open("GET", "phpSkripte/REST_korisnici.php?username="+username,true);
	 
	ajax.send();
	
}






function prikaziUnosKorisnika()
{	
        var ajax = new XMLHttpRequest();		
        ajax.onreadystatechange = function() 
        {
			var kom;
            var obj = document.getElementById('prikaz') ;
			var s;
            if (ajax.readyState == 4 && ajax.status == 200)
            {
				  var tekst = ajax.responseText;
				kom = JSON.parse(tekst);
               	s='<table> <tr><th>Username:</th><th>Password:</th><th>Email:</th><th>Privilegije:</th><th>Dugme</th> </tr>';
		   for(var i=0; i<kom.korisnici.length; i++)
                {	
			
		var p = kom.korisnici[i];
			var usernejm=p.Username;
			var pass=p.Password;
			var mejl=p.Email;
			var privilegije=p.privilegije;
	s=s+'<tr> <td><input type="text" name="idNovosti"  value="'+usernejm +'" disabled=true > </td>'
	 +'<td>	<input type="password"   name="autorNovosti"  value="'+pass+'" disabled=true > </td>'
	+' <td><input type="email" name="naslovNovosti"  value="'+mejl+'" disabled=true > </td>'
	+' <td><input type="number" min="0" max="1" name="naslovNovosti"  value="'+privilegije+'" disabled=true > </td>';
				}
				
					s=s+'<tr><td><input type="text"  id ="username2" name="username2" > </td>'
			+'<td>	<input type="password"   id ="password2" name="password2"   ></td>'
			+'<td><input type="email"   id ="email2" name="email2"   ></td>'
			+' <td><input type="number" min="0" max="1"  id ="privilegije2"name="naslovNovosti"  value="'+privilegije+'"></td>';
			s=s+'<td>	&nbsp;&nbsp;<input class="my-stylish-button" type="button" value="Dodaj" id ="Dodaj"  onClick="insertKorisnika(); return false;" ></td></tr>'
			+'</table><br><br>';		 
			
			document.getElementById('prikaz').innerHTML=s;
				
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }	
		username="lap";
	  ajax.open("GET", "phpSkripte/REST_korisnici.php?username="+username,true);
	 
	ajax.send();
}




function prikaziBrisanjeKorisnika()
{
        var ajax = new XMLHttpRequest();		
        ajax.onreadystatechange = function() 
        {
			var kom;
            var obj = document.getElementById('prikaz') ;
			var s;
            if (ajax.readyState == 4 && ajax.status == 200)
            {
				  var tekst = ajax.responseText;
				kom = JSON.parse(tekst);
				var brojacAdmina=0;
			for(var i=0; i<kom.korisnici.length; i++)
				{	
				var p = kom.korisnici[i];
				var privilegije=p.privilegije;
				if (privilegije==0)brojacAdmina++;
				}
	
               s='<table> <tr><th>Username:</th><th>Password:</th><th>Email:</th><th>Dugme</th> </tr>';
			  for(var i=0; i<kom.korisnici.length; i++)
                {	
			
			var p = kom.korisnici[i];
			var usernejm=p.Username;
			var pass=p.Password;
			var mejl=p.Email;
			var privilegije=p.privilegije;
		 s=s+'<tr> <td><input type="text" name="username"  value="'+usernejm +'" disabled=true > </td>'
	+'<td>	<input type="password"   name="password"  value="'+pass+'" disabled=true > </td>'
	+' <td><input type="email" name="email"  value="'+mejl+'" disabled=true > </td>';
	
				
			if (brojacAdmina>1 || privilegije=="1"){
			s=s+'<td><input class="my-stylish-button" type="button" value="obrisi" id ="deletiraj"  onClick="deleteKorisnika(\'' + usernejm + '\'); return false;" ></td></tr>';
			}
			else {
				s=s+'<td><input class="my-stylish-button" type="button" value="obrisi" id ="deletiraj"  disabled =true onClick="deleteKorisnika(\'' + usernejm + '\'); return false;" ></td></tr>';
		
			}	
				
				}
					s=s+'</table><br><br>';	
			
			document.getElementById('prikaz').innerHTML=s;
				
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }	
		username="lap";
	  ajax.open("GET", "phpSkripte/REST_korisnici.php?username="+username,true);
	 
	ajax.send();
	
}






function insertKorisnika(){
		
			var username=document.getElementById("username2").value;
			var password=document.getElementById("password2").value;
			var email=document.getElementById("email2").value;
			var privilegije=document.getElementById("privilegije2").value;
			
	var ajax = new XMLHttpRequest();
	var obj;
        ajax.onreadystatechange = function() 
        {
         
			 obj= document.getElementById('prikaz').value;
			
            if (ajax.readyState == 4 && ajax.status == 200)
            {
              var tekst = ajax.responseText;
					var kom = JSON.parse(tekst);
			
				 if (kom.ok == "ok") 
				prikaziUnosKorisnika();
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }
	  ajax.open("POST", "phpSkripte/REST_korisnici.php",true);
	 ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	   ajax.send("username=" + username + "&password=" + password +"&email=" + email +"&privilegije="+privilegije );
	
}



function deleteKorisnika(username){
	var vrijednost=username.value;
		
	var ajax = new XMLHttpRequest();
	
        ajax.onreadystatechange = function() 
        {
			 var obj = document.getElementById('prikaz') ;
            if (ajax.readyState == 4 && ajax.status == 200)
            {
				var tekst = ajax.responseText;
					var kom = JSON.parse(tekst);
			
				 if (kom.ok == "ok") 
				prikaziBrisanjeKorisnika();
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }	
	  ajax.open("DELETE", "phpSkripte/REST_korisnici.php?username="+username,true); 
	ajax.send();	
}

var brojac="";

function promijeniKorisnika(){
//	alert(brojac);
	
		var ID=brojac.value;
	
		if (brojac.value!=""){
	
			var pass=document.getElementById(ID+"password").value;
			var email=document.getElementById(ID+"email").value;
		
			brojac="";
			var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() 
        {
			 var obj = document.getElementById('prikaz') ;
            if (ajax.readyState == 4 && ajax.status == 200)
            {
				var tekst = ajax.responseText;
					var kom = JSON.parse(tekst);
			
				 if (kom.ok == "ok") 
				prikaziPromjenuKorisnika();
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }	
	    ajax.open("PUT", "phpSkripte/REST_korisnici.php",true);
	   ajax.send("password=" + pass + "&email=" + email +"&username=" + ID);
}}






function dodajKorisnika(broj){
		
	  var ajax = new XMLHttpRequest();
		var s;
        ajax.onreadystatechange = function() 
        {
			var kom;
            var obj = document.getElementById('prikaz') ;
            if (ajax.readyState == 4 && ajax.status == 200)
            {
                var tekst = ajax.responseText;
				kom = JSON.parse(tekst);
			
               
              
	 if (broj==3){
		 		s='<table> <tr><th>Username:</th><th>Password:</th><th>Email:</th><th>Privilegije</th><th>Dugme</th> </tr>';
		   for(var i=0; i<kom.korisnici.length; i++)
                {	
			
		var p = kom.korisnici[i];
			var usernejm=p.Username;
			var pass=p.Password;
			var mejl=p.Email;
			var privilegije=p.privilegije;
	s=s+'<tr> <td><input type="text" name="idNovosti"  value="'+usernejm +'" disabled=true > </td>'
	 +'<td>	<input type="password"   name="autorNovosti"  value="'+pass+'" disabled=true > </td>'
	+' <td><input type="email" name="naslovNovosti"  value="'+mejl+'" disabled=true > </td>'
		+' <td><input type="number" min="0" max="1"  id ="privilegije5"  value="'+privilegije+'" name="naslovNovosti" disabled=true > </td>';
				}
	 }
		else if (broj==2){
	s='<table> <tr><th>Username:</th><th>Password:</th><th>Email:</th><th>Dugme</th> </tr>';
	var brojacAdmina=0;
	for(var i=0; i<kom.korisnici.length; i++)
      {	
  	var p = kom.korisnici[i];
				var privilegije=p.privilegije;
				if (privilegije==0)brojacAdmina++;
	}
	
			  for(var i=0; i<kom.korisnici.length; i++)
                {	
			
			var p = kom.korisnici[i];
			var usernejm=p.Username;
			var pass=p.Password;
			var mejl=p.Email;
		 s=s+'<tr> <td><input type="text" name="username"  value="'+usernejm +'" disabled=true > </td>'
	+'<td>	<input type="password"   name="password"  value="'+pass+'" disabled=true > </td>'
	+' <td><input type="email" name="email"  value="'+mejl+'" disabled=true > </td>';
	if (brojacAdmina>1 || privilegije==1){
	s=s+'<td><input class="my-stylish-button" type="button" value="obrisi" id ="deletiraj"  onClick="deleteKorisnika(\'' + usernejm + '\'); return false;" ></td></tr>';
	}
	else {
		s=s+'<td><input class="my-stylish-button" type="button" value="obrisi" id ="deletiraj"  disabled =true onClick="deleteKorisnika(\'' + usernejm + '\'); return false;" ></td></tr>';
		
	}
			}
					s=s+'</table><br><br>';	
				}
				
				
				
		else if (broj==1){
			
		s='<table> <tr><th>Username:</th><th>Password:</th><th>Email:</th><th>Dugme</th> </tr>';
		
		for(var i=0; i<kom.korisnici.length; i++)
               {	
			
			var p = kom.korisnici[i];
			var usernejm=p.Username;
			var pass=p.Password;
			var mejl=p.Email;
		
			s=s+'<tr> <td><input type="text"  id="'+usernejm+'"  value="'+usernejm +'" disabled=true > </td>'
			+' <td><input type="password" id="'+usernejm+'password"  value="'+pass+'"  > </td>'
			+' <td><input type="email" id="'+usernejm+'email"  value="'+mejl+'"  > </td>'
			+'<td><input class="my-stylish-button" type="button" value="promijeni" id ="Dodaj"  OnClick="brojac = ' + usernejm + '; return false;" ></td></tr>';
				}
					s=s+'</table><br><br>';
					if (brojac!=""){
						//alert(brojac.value);
					promijeniKorisnika();}
					
				}
				
		if (broj==3){
				
			s=s+'<tr><td><input type="text"  id ="username2" name="username2" > </td>'
			+'<td>	<input type="password"   id ="password2" name="password2"   ></td>'
			+'<td><input type="email"   id ="email2" name="email2"   ></td>'
			+' <td><input type="number" min="0" max="1"  id ="privilegije2" name="privilegks"></td>';
			s=s+'<td>	&nbsp;&nbsp;<input class="my-stylish-button" type="button" value="Dodaj" id ="Dodaj"  onClick="insertKorisnika(); return false;" ></td></tr>'
			+'</table><br><br>';		 
				}
					document.getElementById('prikaz').innerHTML=s;

            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }	
		username="lap";
	  ajax.open("GET", "phpSkripte/REST_korisnici.php?username="+username,true);
	 
	ajax.send();
		
}




function detalji(ID)
{
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() 
        {
            var obj = document.getElementById('main') ;
			var s;
            if (ajax.readyState == 4 && ajax.status == 200)
            {
                var tekst = ajax.responseText;
				kom = JSON.parse(tekst);

         
                for(var i=0; i<kom.komentari.length; i++)
                {	
			
			  var p = kom.komentari[i];
                    var datum=new Date(p.Datum_Vrijeme);
                        if (p.Email!=""){
								 s = s+'<br>' 
								+'<div>Datum pisanja komentara: </div>'
								+datum +'<br>'
								+'<div> Autor je :'+'<a href="mailto: p.Email">' + p.Autor
								+'</a>'+'<br>'
								+p.Email +'<br>'
								+'<br><br>'
								+p.Tekst+'<br><br>';			
							
						}
						else {
							
								 s = s+'<br>' 
								+'<div>Datum pisanja komentara: </div>'
								+datum+'<br>'
								+p.Autor+'</a>'+'<br>'
								+'<div> Autor je :'+ p.Autor+'</div>'
								+'<br><br>'
								+p.Tekst+'<br><br>';
						}
								
				}
				
				var dugme = document.getElementById('komentari').innerHTML=s;
            }
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }
        
		

	  ajax.open("GET", "phpSkripte/REST_detaljnije.php?ID="+ID,true);
	 
	ajax.send();
		
}



function censor(censor) {
  var i = 0;

  return function(key, value) {
    if(i !== 0 && typeof(censor) === 'object' && typeof(value) == 'object' && censor == value) 
      return '[Circular]'; 

    if(i >= 29) // seems to be a harded maximum of 30 serialized objects?
      return '[Unknown]';

    ++i; // so we know we aren't using the original object anymore

    return value;  
  }
}

