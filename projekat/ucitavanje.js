function Load(link)
    {
	 
       var ajax = new XMLHttpRequest();
			
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200 )
			{
				
				document.getElementById('main').innerHTML = changeMain(ajax.responseText);
				if (link=="Usluge.html")
					KreirajTabelu();
				if (link=="Kontakt.html")
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


function poziv(broj)
{

    if (broj===1){
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

    else if (broj===2){

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
    else {

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




function censor(censor) {
  var i = 0;

  return function(key, value) {
    if(i !== 0 && typeof(censor) === 'object' && typeof(value) == 'object' && censor == value) 
      return '[Circular]'; 

    if(i >= 29) // seems to be a harded maximum of 30 serialized objects?
      return '[Unknown]';

    ++i;

    return value;  
  }
}

function izvrsi()
{
    var izbor = document.getElementById("akcija").value.toLowerCase();
    switch(izbor)
    {
            case "dodavanje": 
                document.getElementsByClassName('usluge')[0].innerHTML = poziv(1);
            break;
            case "brisanje": 
                document.getElementsByClassName('usluge')[0].innerHTML = poziv(2);
            break;
            case "promjena":
                document.getElementsByClassName('usluge')[0].innerHTML = poziv(3);
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



function KreirajTabelu(objekat)
{
    var s="";
    if (undefined!==objekat ){
    for(var i = 0; i< objekat.length; i++)
    {
        var p = objekat[i];
        s+= "<tr><td class='margina'>ID: "+p.id+"</td></tr>";
        s+="<tr><th class='naziv'>"+p.naziv+"</th></tr>";
        s+="<tr><td class='podnaslov'>Cijena</td></tr>";
        s+="<tr><td class='cijena'>"+p.cijena+"</td></tr>";
        s+="<tr><td class='podnaslov'>Opis</td></tr>";
        s+="<tr><td class='opis'>"+p.opis+"</td></tr>";
		 s+="<tr><td class='kolicina'>"+p.kolicina+"</td></tr>";

    } 

    return s;}
    else return;
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
                for(var i = 0; i<proizvodi.length; i++)
                {
                    var p = proizvodi[i];

                    document.getElementsByClassName('margina')[i].style.paddingTop="20px";
                    document.getElementsByClassName("usluge-opis")[i].style.width="50%";
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
    
        return false;
}