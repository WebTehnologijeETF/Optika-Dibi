
function Load(link)
    {
	 
       var ajax = new XMLHttpRequest();
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200 )
			{
			
				//document.getElementById('main').innerHTML = changeMain(ajax.responseText);
                document.getElementById('main').innerHTML = ajax.responseText;
				if (link=="Usluge.php")
					KreirajTabelu();
				//if (link=="Kontakt.php" )
					//pozovi();
				
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
	var godiste= document.getElementById('godiste').value;
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
					s="Uspjesno ste poslali mail <a href='Kontakt.php'>Natrag</a>"
					document.getElementById("kontaktForma").innerHTML=s;
				 }
            }
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }
	  ajax.open("POST", "phpSkripte/slanjeMaila.php",true);
	 ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.send("ime="+ime + "&email=" + email+ "&telefon=" + telefon+ "&godiste=" + godiste+ "&komentar=" + komentar );
	
	
	
}


function poziv1(drzava,valuta){
var ajax = new XMLHttpRequest();
			var param = "https://restcountries.eu/rest/v1/currency/" + valuta;
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
			
				var country = drzava;
			
				var data = JSON.parse(ajax.responseText);
				if(data[0].name != country)
				{
					return 0;
					// "The currency you entered doesnt't match the country");
				
				}
				else
				return 1; // dobar
				
				}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					return 2; // ne postoji valuta ta
				
				
				}
				else return 3;
		}
			ajax.open("GET", param, true);
			ajax.send();
			
}



function kontaktValidacija(){

	var ime=document.getElementById('name').value;
	var email=document.getElementById('email').value;
	var telefon =document.getElementById('telefon').value;
	var godiste= document.getElementById('godiste').value;
	var pass=document.getElementById('pass').value;
	var pass2 =document.getElementById('pass2').value;
	var drzava =document.getElementById('drzava').value;
	var valuta=document.getElementById('valuta').value;
	var komentar=document.getElementById('poruka').value;
	//var slika1=document.getElementById('slika1').value;
	

	var ajax = new XMLHttpRequest();
	var obj;
        ajax.onreadystatechange = function() 
        {
			

            if (ajax.readyState == 4 && ajax.status == 200)
            {
					var valutaErr;
				var tekst = ajax.responseText;
				kom = JSON.parse(tekst);
				var validnost=kom.validnost;
				var nameErr=kom.nameErr;
				var emailErr=kom.emailErr;
				var telErr=kom.telErr;
				var godErr=kom.godErr;
				if (drzava!="" ||valuta!=""){
				
				valutaErr=poziv1(drzava,valuta);
				alert(valutaErr);
				}
				var passErr2=kom.passErr2;
				if(validnost=="T"){
					
					s='<br><br><h4>Provjerite da li ste ispravno popunili kontakt formu:</h4>'
					+'<br> Da li ste sigurni da zelite poslati ove podatke?<br>'
					+'<table id ="proslijedi" name= "proslijedi"> <tr>'
					+'<td class="table-header" >Ime</td> <td class="table-header" >Email</td>'
					+'<td class="table-header">Broj telefon</td> <td class="table-header">Godiste</td>'
					+'<td class="table-header">Poruka</td></tr>'
					+'<tr> <td>'+ime+'</td> <td>'+email+'</td> <td>'+telefon+'</td>'
					+' <td>'+godiste+'</td><td>'+komentar+'</td></tr>'
					+'<input type="hidden" name="siguran" value="da"><input type="hidden" name="name" value="'+ime+'">'
					+'<input type="hidden" name="email" value="'+email+'">'
					+'<input type="hidden" name="telefon" value="'+telefon+'">'
					+' <input type="hidden" name="godiste" value="'+godiste+'">'
					+' <input type="hidden" name="comment" value="'+komentar+'">'
					+'<tr><td colspan ="5"><input class="my-stylish-button" name="action" type="button" onclick="posaljiMail(); return false;" value="Siguran sam">'
					+'</td> </tr> </table>'
					
					+'<br><br><br>'
					+'<div id ="kontaktForma"><label title="prvi znak mora biti slovo" >Ime *</label><br>  '                                                                
					+'<input type="text" value="'+ime+'" title="prvi znak mora biti slovo" id ="name" name="name"  > <span class="error" id="error1">'
		+'<img alt="slika5"  class="NOTOK" id="slika1" src="https://zamger.etf.unsa.ba/images/16x16/zad_ok.png" style="visibility:"hidden"/></span><br>'
		+'<label title="unesite validan email" >E-mail *</label><br>'
		+'<input type="email" value="'+email+'" title="unesite validan email" id ="email" name="email"  > <span class="error" id="error2">'
		+'<img alt="slika6"  class="NOTOK" id="slika2" ></span><br>'
		
	
		+'<label title="Telefon mora biti u obliku xxx-xxx">Telefon *</label><br>'
		+'<input type="text"  title="Telefon mora biti u obliku xxx-xxx" id ="telefon" value="'+telefon+'" name="telefon" > <span class="error" id="error3">'
		+'<img alt="slika7"  class="NOTOK" id="slika3" ></span><br>'
			
			
		+'<label>Godište </label><br>'
		+'<input type="number" name="godiste" min="1910" value="'+godiste+'" max="1997" id ="godiste"> <span class="error" id="error4">'
		+'<img alt="slika8"  class="NOTOK" id="slika4"></span><br><br>'
			+'<label>Password: </label><br>'
		+'<input type="password" name="pass"   id ="pass" > <br><br>'
		
		
		+'<label>Ponovi password: </label><br>'
		+'<input type="password" name="pass2"  id ="pass2" > <span class="error" id="error5">'
		+'<img alt="slika9"  class="NOTOK" id="slika5"></span><br><br>'
		
		+'<label title="država" >Država</label><br>'
		+'<input type="text" value="'+drzava+'" title="Unesite državu" id ="drzava" name="drzava" ><img alt="slika9" src="https://zamger.etf.unsa.ba/images/16x16/zad_ok.png" class="NOTOK" id="slika5"><label title="drzava" class="not" id="upozorenje5" >Unesite validnu državu</label><br>'
		+'<label title="valuta"  >Valuta</label><br>'
		+'<input type="text" value="'+valuta+'" title="Unesite valutu" id ="valuta" name="valuta" ><img alt="slika10" src="https://zamger.etf.unsa.ba/images/16x16/zad_ok.png" class="NOTOK" id="slika6"><label title="tri slova" class="not" id="upozorenje6" >Unesite odgovarajuću valutu za državu</label><br>'
		+'<label title="Morate unijeti validno ime">Poruka </label><br>'
		+'<textarea title="Morate unijeti validno ime" id ="poruka"  name="comment" value="'+komentar+'" ></textarea><br><br>'
	
		+'&nbsp;&nbsp;<input class="my-stylish-button" type="button" value="Pošalji poruku" onClick="kontaktValidacija(); return false;" id ="dugme">'
			   +'  <input class="my-stylish-button" name="action" type="reset" value="Reset"><br><br></div>';	
					
					
					
					document.getElementById("kontaktForma").innerHTML=s;
					
					
				}
			
				else {
					document.getElementById('name').value=ime;
				if(nameErr=="Morate unijeti ime" || nameErr=="Samo znakovi i blanko znakovi su dozvoljeni" ||  nameErr=="Validno ime") 
							document.getElementById('slika1').style.visibility="visible";
					else
					slika1.style.visibility="hidden";
					if(nameErr=="Morate unijeti ime" || nameErr=="Samo znakovi i blanko znakovi su dozvoljeni" )
						document.getElementById('name').style.backgroundColor="#FF8080";
					else 
						document.getElementById('name').style.backgroundColor="#80FF80";
					if(nameErr=="Morate unijeti ime" || nameErr=="Samo znakovi i blanko znakovi su dozvoljeni")
						document.getElementById('name').class="NOTOK";
					
					if(nameErr=="Morate unijeti ime" || nameErr=="Samo znakovi i blanko znakovi su dozvoljeni")
						slika1.src= "https://zamger.etf.unsa.ba/images/16x16/brisanje.png";
					else if( nameErr=="Validno ime")
						slika1.src="https://zamger.etf.unsa.ba/images/16x16/zad_ok.png";
					if(nameErr=="Morate unijeti ime" || nameErr=="Samo znakovi i blanko znakovi su dozvoljeni")
					slika1class="NOTOK";
					else if( nameErr=="Validno ime")
					 slika1class="OK";
				 document.getElementById("error1").innerHTML=nameErr;
				 
				 document.getElementById('email').value=email;
					if(emailErr=="Morate unijeti email" || emailErr=="Nije validan email formata" ||  emailErr=="Validan email") 
						document.getElementById('slika2').style.visibility="visible";
					else
						document.getElementById('slika2').style.visibility="hidden";
					if(emailErr=="Morate unijeti email" || emailErr=="Nije validan email formata" )
						document.getElementById('email').style.backgroundColor="#FF8080";
					else 
						document.getElementById('email').style.backgroundColor="#80FF80";
					if(emailErr=="Morate unijeti email" || emailErr=="Nije validan email formata")
						document.getElementById('email').class="NOTOK";
					if(emailErr=="Morate unijeti email" || emailErr=="Nije validan email formata")
						document.getElementById('slika2').src= "https://zamger.etf.unsa.ba/images/16x16/brisanje.png";
					else if( emailErr=="Validan email")
						document.getElementById('slika2').src="https://zamger.etf.unsa.ba/images/16x16/zad_ok.png";
					if(emailErr=="Morate unijeti email" || emailErr=="Nije validan email formata")
					document.getElementById('slika2').class="NOTOK";
					else if( emailErr=="Validan email")
					 document.getElementById('slika2').class="OK";
				document.getElementById("error2").innerHTML=emailErr;
					
					document.getElementById('telefon').value=telefon;
					if(telErr=="Morate unijeti telefon" || telErr=="Nije validan format telefona" ||  telErr=="Validan broj") 
						document.getElementById('slika3').style.visibility="visible";
					else
						document.getElementById('slika3').style.visibility="hidden";
					if(telErr=="Morate unijeti telefon" || telErr=="Nije validan format telefona" )
						document.getElementById('telefon').style.backgroundColor="#FF8080";
					else 
						document.getElementById('telefon').style.backgroundColor="#80FF80";
					if(telErr=="Morate unijeti telefon" || telErr=="Nije validan format telefona")
						document.getElementById('telefon').class="NOTOK";
					if(telErr=="Morate unijeti telefon" || telErr=="Nije validan format telefona")
						document.getElementById('slika3').src= "https://zamger.etf.unsa.ba/images/16x16/brisanje.png";
					else if( telErr=="Validan broj")
						document.getElementById('slika3').src="https://zamger.etf.unsa.ba/images/16x16/zad_ok.png";
					if(telErr=="Morate unijeti telefon" || telErr=="Nije validan format telefona")
					document.getElementById('slika3').class="NOTOK";
					else if( telErr=="Validan broj")
					 document.getElementById('slika3').class="OK";
				  document.getElementById("error3").innerHTML=telErr;
				 
				 
				 
				 
				 document.getElementById('godiste').value=godiste;
					if(godErr=="Godiste nije u validnom opsegu" || godErr=="nije unijet broj" ||  godErr=="Validan broj") 
						document.getElementById('slika4').style.visibility="visible";
					else
						document.getElementById('slika4').style.visibility="hidden";
					if(godErr=="Godiste nije u validnom opsegu" || godErr=="nije unijet broj" )
						document.getElementById('godiste').style.backgroundColor="#FF8080";
					else 
						document.getElementById('godiste').style.backgroundColor="#80FF80";
					
					if(godErr=="Godiste nije u validnom opsegu" || godErr=="nije unijet broj")
						document.getElementById('godiste').class="NOTOK";
					if(godErr=="Godiste nije u validnom opsegu" || godErr=="nije unijet broj")
						document.getElementById('slika4').src= "https://zamger.etf.unsa.ba/images/16x16/brisanje.png";
					else if( godErr=="Validan broj")
						document.getElementById('slika4').src="https://zamger.etf.unsa.ba/images/16x16/zad_ok.png";
					if(godErr=="Godiste nije u validnom opsegu" || godErr=="nije unijet broj")
					document.getElementById('slika4').class="NOTOK";
					else if( godErr=="Validan broj")
					 document.getElementById('slika4').class="OK";
					document.getElementById("error4").innerHTML=godErr;
				
				
				document.getElementById('pass2').value=pass2;

					if(passErr2=="Ponovite password" || passErr2=="Passwordi nisu identicni" )
						document.getElementById('pass2').style.backgroundColor="#FF8080";
					else 
						document.getElementById('pass2').style.backgroundColor="#80FF80";
					if(passErr2=="Ponovite password" || passErr2=="Passwordi nisu identicni" || passErr2=="Identican password")
						document.getElementById('slika5').style.visibility="visible";
					else
						document.getElementById('slika5').style.visibility="hidden";
					
					
					if(passErr2=="Ponovite password" || passErr2=="Passwordi nisu identicni")
						document.getElementById('slika5').src= "https://zamger.etf.unsa.ba/images/16x16/brisanje.png";
					else if( passErr2=="Validan broj")
						document.getElementById('slika5').src="https://zamger.etf.unsa.ba/images/16x16/zad_ok.png";
					if(passErr2=="Ponovite password" || passErr2=="Passwordi nisu identicni")
					document.getElementById('slika5').class="NOTOK";
					else if( passErr2=="Validan broj")
					 document.getElementById('slika5').class="OK";
					
			 document.getElementById("error5").innerHTML=passErr2;
			 
			 document.getElementById('drzava').value=drzava;
			 document.getElementById('valuta').value=valuta;
			if (drzava!="" ||valuta!=""){
			 if(valutaErr==0 || valutaErr==2 )
						document.getElementById('valuta').style.backgroundColor="#FF8080";
					else 
						document.getElementById('valuta').style.backgroundColor="#80FF80";
					if(valuta==0 || valuta==1 || valuta==2)
						document.getElementById('slika10').style.visibility="visible";
					else
						document.getElementById('slika10').style.visibility="hidden";
					
					
					if(valutaErr==0 || valutaErr==2)
						document.getElementById('slika10').src= "https://zamger.etf.unsa.ba/images/16x16/brisanje.png";
					else if( valutaErr=="Validan broj")
						document.getElementById('slika10').src="https://zamger.etf.unsa.ba/images/16x16/zad_ok.png";
					if(valutaErr==0|| valutaErr==2)
					document.getElementById('slika10').class="NOTOK";
					else if( valutaErr=="Validan broj")
					 document.getElementById('slika10').class="OK";
				}}
            }
			
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }
	  ajax.open("GET", "phpSkripte/kontaktValidiranje.php?ime=" + ime + "&email=" + email +"&telefon=" + telefon +"&godiste=" + godiste +"&pass=" + pass +"&pass2=" + pass2 ,true);
	ajax.send();
	
	
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
function staviPrazno(ID){
	
	if (ID>0 && ID <1000){
	  var obj = document.getElementById(ID) ;
	  obj.innerHTML="";
	}
}



function logujKorisnika(){
		var username= document.getElementById('login1').value;
			var password=document.getElementById('login2').value;
	 var ajax = new XMLHttpRequest();
	
		var username;
			var password;
        ajax.onreadystatechange = function() 
        {
			
		
	
			var kom;
            var obj = document.getElementById('neka') ;
            if (ajax.readyState == 4 && ajax.status == 200)
            {
				  var tekst = ajax.responseText;
					kom = JSON.parse(tekst);
				if (kom.ok=="ok"){
					alert("Uspjesno ste se logovali kao korisnik");
					Load("../Naslovnica.php")
				}
				else {
					
					alert("niste se uspjesno logovali");
				}
				}

            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }	
	
	  ajax.open("GET", "phpSkripte/REST_logiranje.php?username="+username+"&password=" + password,true);
	 
	ajax.send();
}


function novosti(ID)
{
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() 
        {
            var obj = document.getElementById(ID) ;
            if (ajax.readyState == 4 && ajax.status == 200)
            {
				  var tekst = ajax.responseText;
				kom = JSON.parse(tekst);
				 var p = kom.novosti[0];
				var s='<br>'+ p.Detaljnije +'<br>'
				+ '<input class="my-stylish-button" value="sakrij detaljnije" type="submit" onclick = "staviPrazno('+ID+');">';
			//\" s = " .. " \"
                obj.innerHTML = s;
					
            }
            else if (ajax.readyState == 4 && ajax.status == 404)
                obj.innerHTML = "Greska: nepoznat URL";
        }
         ajax.open("GET", "phpSkripte/REST_detaljnije.php?ID="+ID,true);
	 
	ajax.send();

}
/*
setInterval(function() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
         if (request.readyState == 4 && request.status == 200) {
			 
         }
		 
      }
    request.open('GET', '../Naslovnica.php', true);
    request.send();

}, 5000);

*/




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
				+'&nbsp;&nbsp;<input class="my-stylish-button" type="button" value="Pošalji poruku" id ="dugme" onclick="postaviKomentar('+ID+');"><br><br>'
					+ '<input class="my-stylish-button" value="sakrij detaljnije" type="submit" onclick = "staviPrazno('+ID+');">';
				
				}
				if (ID>0 && ID <1000){
					
				document.getElementById(ID).innerHTML=s;
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