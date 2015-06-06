
function Load(link)
    {
	 
       var ajax = new XMLHttpRequest();
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200 )
			{
				

				//document.getElementById('main').innerHTML = changeMain(ajax.responseText);
                document.getElementById('main').innerHTML = ajax.responseText;
				if (link=="Usluge.html")
					KreirajTabelu();
				if (link=="Kontakt.php" )
					pozovi();
				
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

function dodaj()
{
    var s = '<br>' 
            +'<div>Odaberite opciju: </div>'
            +'<select id="akcija" onchange="izvrsi()">'
            +'<option value = "Dodavanje">Dodavanje</option>'
            +'<option value = "Promjena">Promjena</option>'
            +'<option value = "Brisanje">Brisanje</option>'
            +'</select><br><br>'
            +'<label>Naziv: </label><br>'
            +'<input type="text" id="inaziv"><br>'
            +'<label>Cijena: </label><br>'
            +'<textarea id="cijena"></textarea><br>'
            +'<label>Opis: </label><br>'
            +'<textarea id="op"></textarea><br>'
			+'<label>Količina: </label><br>'
			+'<textarea id="kol"></textarea><br>'
          
            +'<input class="dodaj" type="button" value="Dodaj" onClick="change()">';
    
    return s;
}
function staviPrazno(){
	
	  var obj = document.getElementById('komentari') ;
	  obj.innerHTML="";
	
}

function novosti(ID)
{
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() 
        {
            var obj = document.getElementById('komentari') ;
            if (ajax.readyState == 4 && ajax.status == 200)
            {
				  var tekst = ajax.responseText;
				kom = JSON.parse(tekst);
				 var p = kom.novosti[0];
				var s='<br>'+ p.Detaljnije +'<br>'
				+ '<input class="my-stylish-button" value="sakrij detaljnije" type="submit" onclick = "staviPrazno();">';
			//\" s = " .. " \"
                obj.innerHTML = s;
					
            }
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }
         ajax.open("GET", "REST_detaljnije.php?ID="+ID,true);
	 
	ajax.send();

}

setInterval(function() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
         if (request.readyState == 4 && request.status == 200) {
         }
      }
    request.open('GET', 'Naslovnica.php', true);
    request.send();

}, 5000);



function postaviKomentar(){
	
	var ajax = new XMLHttpRequest();
	var s;
        ajax.onreadystatechange = function() 
        {
         
			 s= document.getElementById('poruka').value;
			
            if (ajax.readyState == 4 && ajax.status == 200)
            {
                var tekst = ajax.responseText;
				kom = JSON.parse(tekst);
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }
	  ajax.open("POST", "tut10.php",true);
	 ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.send("tekst="+s);
}


function komentari(ID)
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
				
				//ne treba mi vise nista, samo poruka
				s=s+'<form   method="post" action="Naslovnica.php" >'
				+'<textarea id ="poruka" value="" name="comment" value="">'
				+'</textarea><br><br>'
				+'&nbsp;&nbsp;<input class="my-stylish-button" type="submit" value="Pošalji poruku" id ="dugme" onclick="postaviKomentar();">'
				+'<input class="my-stylish-button" name="action" type="reset" value="Reset"><br><br>'
				+'</form>';
				
				var dugme = document.getElementById('komentari').innerHTML=s;
				
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }
        
		

	  ajax.open("GET", "tut10.php?ID="+ID,true);
	 
	ajax.send();
		
}


function obrisi(ID){
	alert(ID);
	var ajax = new XMLHttpRequest();
	 
        ajax.onreadystatechange = function() 
        {
			 var obj = document.getElementById('prikaz') ;
            if (ajax.readyState == 4 && ajax.status == 200)
            {
				
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }	
	  ajax.open("DELETE", "tut10.php?ID="+ID,true); 
	ajax.send();	
}




function prikaziSve()
{
        var ajax = new XMLHttpRequest();
		
        ajax.onreadystatechange = function() 
        {
			var kom;
            var obj = document.getElementById('prikaz') ;
			var s= '<script> function obrisi(ID){ alert(ID); } </script> ';

            if (ajax.readyState == 4 && ajax.status == 200)
            {
                var tekst = ajax.responseText;
				kom = JSON.parse(tekst);
				s=s+'<br><br><br>'
				+'<table> <tr><th>ID:</th><th>Autor:</th><th>Email:</th><th>Datum objave:</th>'
				+'<th>Tekst:</th><th>Dugme</th> </tr>';
               
                for(var i=0; i<kom.komentari.length; i++)
                {	
			
	var p = kom.komentari[i];
	var datum=new Date(p.Datum_Vrijeme);
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
	  ajax.open("GET", "tut10.php?ID="+ID,true);
	 
	ajax.send();
	
}


function insertNovost(){
		
			var autor=document.getElementById(autorNovosti2).value;
			var naslov=document.getElementById(naslovNovosti2).value;
			var tekst=document.getElementById(tekstNovosti2).value;
			var detaljnije=document.getElementById(detaljnije2).value;
			var slika=document.getElementById(slika2).value;
	var ajax = new XMLHttpRequest();
	var obj;
        ajax.onreadystatechange = function() 
        {
         
			 obj= document.getElementById('prikaz').value;
			
            if (ajax.readyState == 4 && ajax.status == 200)
            {
                var tekst = ajax.responseText;
				var kom = JSON.parse(tekst);
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }
	  ajax.open("POST", "REST_novosti.php",true);
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
				
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }	
	  ajax.open("DELETE", "REST_novosti.php?ID="+ID,true); 
	ajax.send();	
}
var br=0;

function promijeniNovost(){
	var ajax = new XMLHttpRequest();
		var ID=br;
		alert(br);
		if (br!=0){
	
			var autor=document.getElementById(ID+'autorNovosti').value;
			alert(autor);
			var naslov=document.getElementById(ID+"naslovNovosti").value;
			var tekst=document.getElementById(ID+"tekstNovosti").value;
			var detaljnije=document.getElementById(ID+"detaljnije").value;
			var slika=document.getElementById(ID+"slika").value;
			br=0;
        ajax.onreadystatechange = function() 
        {
			 var obj = document.getElementById('prikaz') ;
            if (ajax.readyState == 4 && ajax.status == 200)
            {
				
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }	
/*  ajax.open("PUT", "REST_novosti.php?tekst=" + tekst + "&autor=" + autor +"&detaljnije=" + detaljnije +"&naslov=" + naslov +"&slika=" + slika+"&ID="+ID,true);
	   ajax.send();	*/
	   
	    ajax.open("PUT", "REST_novosti.php",true);
	
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
		 	s=s+'<table> <tr><th>ID:</th><th>Autor:</th><th>Naslov:</th><th>Datum objave:</th>'
				+'<th>Tekst:</th><th>Detaljnije:</th><th>Slika:</th><th>Dugme</th> </tr>';
		   for(var i=0; i<kom.novosti.length; i++)
                {	
			
	var p = kom.novosti[i];
	 var ID=p.IDNovosti;
	 var autor=p.Autor;
	 var datum=new Date(p.Datum_Vrijeme);
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
				s=s+'<table> <tr><th>ID:</th><th>Autor:</th><th>Naslov:</th><th>Datum objave:</th>'
				+'<th>Tekst:</th><th>Detaljnije:</th><th>Slika:</th><th>Dugme</th> </tr>';
			  for(var i=0; i<kom.novosti.length; i++)
                {	
			
	var p = kom.novosti[i];
	 var ID=p.IDNovosti;
	 var autor=p.Autor;
	 var datum=new Date(p.Datum_Vrijeme);
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
		s=s+'<table> <tr><th>ID:</th><th>Autor:</th><th>Naslov:</th><th>Datum objave:</th>'
		+'<th>Tekst:</th><th>Detaljnije:</th><th>Slika:</th><th>Dugme</th> </tr>';
		
		for(var i=0; i<kom.novosti.length; i++)
               {	
			
			var p = kom.novosti[i];
			var IDej=p.IDNovosti;
			var autor=p.Autor;
			var datum=new Date(p.Datum_Vrijeme);
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
					
				}
				
		if (broj==3){
				
			s=s+'<tr><td><input type="text"  id ="idNovosti2" name="idNovosti2" disabled=true > </td>'
			+'<td>	<input type="text"   id ="autorNovosti2" name="autorNovosti2"   ></td>'
			+'<td><input type="text"   id ="naslovNovosti2" name="naslovNovosti2"   ></td>'
			+'<td><input type="text"  id ="datumObjaveNovosti2" name="datumObjaveNovosti2"  disabled=true ></td>'
			+'<td><input type="text"   id ="tekstNovosti2" name="tekstNovosti2"   ></td>'
			+'<td><input type="text"   id ="detaljnije" name="detaljnije2"   ></td>'
			+'<td><input type="text"   id ="slika" name="slika2"  ></td>';
			s=s+'<td>	&nbsp;&nbsp;<input class="my-stylish-button" type="button" value="Dodaj" id ="Dodaj"  onClick="insertNovost(); return false;" ></td></tr>'
			+'</table><br><br>';		 
				}
					document.getElementById('prikaz').innerHTML=s;

            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }	
		ID=1000;
	  ajax.open("GET", "REST_novosti.php?ID="+ID,true);
	 
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

               alert(kom.komentari[0].Autor);
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
        
		

	  ajax.open("GET", "REST_detaljnije.php?ID="+ID,true);
	 
	ajax.send();
		
}




function ebrisanje()
{
    var id = document.getElementById('tablica').value;
    var nazivp = document.getElementById('inaziv');
    var cijenap = document.getElementById('cijena');
    var opisp = document.getElementById('op');
       var kolicina = document.getElementById('kol');
	
	 
    var dugme = document.getElementById('obrisi');
    
    var proizvodi=[];
    var usluge = document.getElementsByClassName("usluge-opis")[0];
    var ajax = new XMLHttpRequest();
    var tekst = "";
    ajax.onreadystatechange = function() {// Anonimna funkcija
        if (ajax.readyState == 4 && ajax.status == 200)
        {
            if (tekst!==ajax.responseText)
            {
                tekst = ajax.responseText;
                proizvodi = JSON.parse(tekst);
               
                for(var i=0; i<proizvodi.length; i++)
                {
                     var p = proizvodi[i];
                    if(id == p.id && id.length > 0)
                    {
                        nazivp.value =  p.naziv;
                        cijenap.value = p.cijena;
                        opisp.value = p.opis;
						kolicina.value=p.kolicina;
                       
                        
                        dugme.disabled = false;
                        break;
                    }
                    else
                        dugme.disabled = true;
                }      
            }
        }
        if (ajax.readyState == 4 && ajax.status == 404)
            alert("Nepostojeći proizvod!");
        if (ajax.readyState == 4 && ajax.status == 400)
            alert("Neispravni podaci!");
    };
    ajax.open("GET", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16264", true);
    ajax.send();
            
}

function brisanje()
{
        var s = '<br>' 
            +'<div>Odaberite opciju: </div>'
            +'<select id="akcija" onchange="izvrsi()">'
            +'<option value = "Brisanje">Brisanje</option>'
            +'<option value = "Promjena">Promjena</option>'
            +'<option value = "Dodavanje">Dodavanje</option>'
            +'</select><br><br>'
            +'<label>ID: </label><br>'
            +'<input type="text" id="tablica" onchange="ebrisanje()"><br>'
            +'<label>Naziv: </label><br>'
            +'<input type="text" id="inaziv" disabled><br>'
            +'<label>Cijena: </label><br>'
            +'<textarea id="cijena" disabled></textarea><br>'
            +'<label>Opis: </label><br>'
            +'<textarea id="op" disabled></textarea><br>'
			+'<label>Količina: </label><br>'
			+'<textarea id="kol"></textarea><br>'
        
            +'<input class="dodaj" id="obrisi" type="button" value="Brisanje" onClick="change()" disabled>';
    
    return s;
}

function edodaj()
{
    var id = document.getElementById('tablica').value;
    var nazivp = document.getElementById('inaziv');

    var cijenap = document.getElementById('cijena');
    var opisp = document.getElementById('op');
	   var kolicina = document.getElementById('kol');
   
    var dugme = document.getElementById('promijeni');
    
      var proizvodi=[];
    var usluge = document.getElementsByClassName("usluge-opis")[0];
    var ajax = new XMLHttpRequest();
    var tekst = "";
    ajax.onreadystatechange = function() {// Anonimna funkcija
        if (ajax.readyState == 4 && ajax.status == 200)
        {
            if (tekst!==ajax.responseText)
            {
                tekst = ajax.responseText;
                proizvodi = JSON.parse(tekst);
               
                for(var i=0; i<proizvodi.length; i++)
                {
                     var p = proizvodi[i];
                    if(id == p.id && id.length > 0)
                    {
                        nazivp.disabled = false;
                        cijenap.disabled = false;
                        opisp.disabled = false;
                        
						kolicina.disabled=false;
                        dugme.disabled = false;
                       
                        nazivp.value =  p.naziv;
                        cijenap.value = p.cijena;
                        opisp.value = p.opis;
						kolicina.value=p.kolicina;
                       
                        
                        break;
                    }
                    else
                    {
                        nazivp.disabled = true;
                        cijenap.disabled = true;
                        opisp.disabled = true;
                        
						kolicina.disabled=true;
                        dugme.disabled = true;
                    }
                }      
            }
        }
        if (ajax.readyState == 4 && ajax.status == 404)
            alert("Nepostojeći proizvod!");
        if (ajax.readyState == 4 && ajax.status == 400)
            alert("Neispravni podaci!");
    };
    ajax.open("GET", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16264", true);
    ajax.send();
            
}

function promjena()
{
    var s = '<br>' 
            +'<div>Odaberite opciju: </div>'
            +'<select id="akcija" onchange="izvrsi()">'
            +'<option value = "Promjena">Promjena</option>'
            +'<option value = "Dodavanje">Dodavanje</option>'
            +'<option value = "Brisanje">Brisanje</option>'
            +'</select><br><br>'
            +'<label>ID: </label><br>'
            +'<input type="text" id="tablica" onchange="edodaj()"><br>'
            +'<label>Naziv: </label><br>'
            +'<input type="text" id="inaziv" disabled><br>'
            +'<label>Cijena: </label><br>'
            +'<textarea id="cijena" disabled></textarea><br>'
            +'<label>Opis: </label><br>'
            +'<textarea id="op" disabled></textarea><br>'
			+'<label>Količina: </label><br>'
			+'<textarea id="kol"></textarea><br>'
            
            +'<input class="dodaj" id="promijeni" type="button" value="Promijeni" onClick="change()" disabled>';
    
    return s;
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

//USLUGE
function izvrsi()
{
    var izbor = document.getElementById("akcija").value.toLowerCase();
    switch(izbor)
    {
            case "dodavanje": 
                document.getElementsByClassName('usluge')[0].innerHTML = dodaj();
            break;
            case "brisanje": 
                document.getElementsByClassName('usluge')[0].innerHTML = brisanje();
            break;
            case "promjena":
                document.getElementsByClassName('usluge')[0].innerHTML = promjena();
            break;
    }
}

function change()
{
        var ajax = new XMLHttpRequest();
        
        ajax.onreadystatechange = function() {// Anonimna funkcija
            if (ajax.readyState == 4 && ajax.status == 200)
            {
                    alert("Uspješno dodani/promijenjeni podaci proizvoda!");
            }
            if (ajax.readyState == 4 && ajax.status == 404)
                alert("Nepostojeći proizvod!");
            if (ajax.readyState == 4 && ajax.status == 400)
                alert("Neispravni podaci!");
        };

        ajax.open("POST", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16264", true);
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
         var akcija = document.getElementById('akcija').value.toLowerCase();
         var nazivp = document.getElementById('inaziv').value;
         var cijenap = String(document.getElementById('cijena').value);
         var opisp = document.getElementById('op').value;
		  var kolicina = document.getElementById('kol').value;
      
    
        var A={};
        if(akcija == "promjena")
        {
            var tablica = document.getElementById('tablica').value;
            A = {"id":tablica,"naziv": nazivp, "cijena": cijenap, "opis": opisp,"kolicina": kol};
        }
        else if(akcija == "brisanje")
        {
           var tablica = document.getElementById('tablica').value;
           A = {"id":tablica};  
        }
        else
        {
            A = {"naziv": nazivp, "cijena": cijenap, "opis": opisp,"kolicina": kol};
        }
         
         console.log("akcija=" + akcija);
         ajax.send("akcija=" + akcija + "&proizvod=" + JSON.stringify(A,censor(A)));
}



function KreirajTabelu(proizvodi)
{
    var s="";
    if (undefined!==proizvodi ){
    for(var i = 0; i< proizvodi.length; i++)
    {
        var p = proizvodi[i];
        s+= "<tr><td class='margina'>ID: "+p.id+"</td></tr>";
        s+="<tr><th class='naziv'>"+p.naziv+"</th></tr>";
        s+="<tr><td class='podnaslov'>Cijena</td></tr>";
        s+="<tr><td class='cijena'>"+p.cijena+"</td></tr>";
        s+="<tr><td class='podnaslov'>Opis</td></tr>";
        s+="<tr><td class='opis'>"+p.opis+"</td></tr>";
		 s+="<tr><td class='kolicina'>"+p.kolicina+"</td></tr>";

    } 
    console.log(s)
    return s;}
    else return;
}

function podesiVelicine(proizvodi)
{
    for(var i = 0; i<proizvodi.length; i++)
    {
        var p = proizvodi[i];
      
       document.getElementsByClassName('margina')[i].style.paddingTop="20px"; 
       document.getElementsByClassName("usluge-opis")[i].style.width="50%";     
    } 
    
}

function prikazi()
{
    var proizvodi=[];
    var usluge = document.getElementsByClassName("usluge-opis")[0];
    var ajax = new XMLHttpRequest();
    var tekst = "";
    ajax.onreadystatechange = function() {// Anonimna funkcija
        if (ajax.readyState == 4 && ajax.status == 200)
        {
            if (tekst!==ajax.responseText)
            {
                tekst = ajax.responseText;
         
                proizvodi = JSON.parse(tekst);
          
              usluge.innerHTML = KreirajTabelu(proizvodi);
                podesiVelicine(proizvodi);
            }
        }
        if (ajax.readyState == 4 && ajax.status == 404)
            alert("Nepostojeći proizvod!");
        if (ajax.readyState == 4 && ajax.status == 400)
            alert("Neispravni podaci!");
    };

    ajax.open("GET", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16264", true);
        ajax.send();
    
        return false;
}