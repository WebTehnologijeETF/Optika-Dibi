

function check(){
	
	if(cek1 && cek2 && cek3 && cek4 && valid1 && valid2){
		dugmic.disabled = false;
	}
	else {
		dugmic.disabled = true;
	}
}



function pozovi(){
var imeTextBox = document.getElementById("ime");
var emailTextBox = document.getElementById("email");
var teljefonTextBox = document.getElementById("telefon");
var GodisteTextBox = document.getElementById("godiste");
var drzavaTextBox = document.getElementById("drzava");
var valutaTextBox = document.getElementById("valuta");
dugmic=document.getElementById("dugme");
var porukaTextBox=document.getElementById("poruka");
cek1=false;
 cek2=false;
 cek3=false;
 cek4=true;
ima=false;
 valid1=true;
valid2=true;

/*
imeTextBox.removeEventListener("onblur");
emailTextBox.removeEventListener("onblur");
teljefonTextBox.removeEventListener("onblur");
GodisteTextBox.removeEventListener("onblur");

valutaTextBox.removeEventListener("onblur");
drzavaTextBox.removeEventListener("onblur");
dugmic.disabled = true;
porukaTextBox.disabled = true;


imeTextBox.addEventListener("blur", function(){
var ime = imeTextBox.value;

    if (ime !== '') {
        var regex = /^[A-Za-z0-9][^\s]{0,20}$/;
        if (ime.match(regex)) {
            imeTextBox.style.backgroundColor = "#80FF80";
			document.getElementById("slika1").style.visibility = "visible";
			document.getElementById("slika1").src = 'https://zamger.etf.unsa.ba/images/16x16/zad_ok.png';
			document.getElementById("slika1").class = "OK";
			document.getElementById("upozorenje1").style.visibility = "hidden";
			document.getElementById("upozorenje1").class = "yes";
			cek1 = true;
			porukaTextBox.disabled = false;
		
        } else {
            imeTextBox.style.backgroundColor = "#FF8080";
			document.getElementById("slika1").style.visibility="visible";
			document.getElementById("slika1").src='https://zamger.etf.unsa.ba/images/16x16/brisanje.png';
				document.getElementById("upozorenje1").class="not";
						document.getElementById("upozorenje1").style.visibility="visible";
            imeTextBox.focus();
			cek1=false;
			porukaTextBox.disabled=true;
        }
         check();
    } else {
			document.getElementById("slika1").style.visibility="visible";
			document.getElementById("slika1").src= 'https://zamger.etf.unsa.ba/images/16x16/brisanje.png';
	document.getElementById("slika1").class="NOT OK";
	document.getElementById("upozorenje1").class="not";
	document.getElementById("upozorenje1").style.visibility="visible";
        imeTextBox.style.backgroundColor = "white";
		porukaTextBox.disabled=true;
		cek1=false;
    }
   
});



emailTextBox.addEventListener("blur", function(){
var email= emailTextBox.value;
var mailformat = "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$";

    if (email !== '') {
        if (email.match(mailformat)) {
            emailTextBox.style.backgroundColor = "#80FF80";
			document.getElementById("slika2").style.visibility="visible";
			document.getElementById("slika2").src='https://zamger.etf.unsa.ba/images/16x16/zad_ok.png';
			document.getElementById("slika2").class="OK";
			document.getElementById("upozorenje2").class="yes";
			document.getElementById("upozorenje2").style.visibility="hidden";
			cek2=true;
        } else {
            emailTextBox.style.backgroundColor = "#FF8080";
			document.getElementById("slika2").style.visibility="visible";
			document.getElementById("slika2").src='https://zamger.etf.unsa.ba/images/16x16/brisanje.png';
			document.getElementById("slika2").class="NOT OK";
			document.getElementById("upozorenje2").class="not";
			document.getElementById("upozorenje2").style.visibility="visible";
            emailTextBox.focus();
			cek2=false;
        }
    } else {
			document.getElementById("slika2").style.visibility="visible";
			document.getElementById("slika2").src= 'https://zamger.etf.unsa.ba/images/16x16/brisanje.png';
		document.getElementById("slika2").class="NOT OK";
        emailTextBox.style.backgroundColor = "white";
		document.getElementById("upozorenje2").class="not";
		document.getElementById("upozorenje2").style.visibility="hidden";
		cek2=false;
    }
    check();
});



teljefonTextBox.addEventListener("blur", function(){
var telefon= teljefonTextBox.value;
  var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})$/;   

    if (telefon !== '') {
        if (telefon.match(phoneno)) {
            teljefonTextBox.style.backgroundColor = "#80FF80";
			document.getElementById("slika3").style.visibility="visible";
			document.getElementById("slika3").src='https://zamger.etf.unsa.ba/images/16x16/zad_ok.png';
			document.getElementById("slika3").class="OK";
			document.getElementById("upozorenje3").class="yes";
						document.getElementById("upozorenje3").style.visibility="hidden";
			cek3=true;
        } else {
            teljefonTextBox.style.backgroundColor = "#FF8080";
			document.getElementById("slika3").style.visibility="visible";
			document.getElementById("slika3").src='https://zamger.etf.unsa.ba/images/16x16/brisanje.png';
			document.getElementById("slika3").class="NOT OK";
			document.getElementById("upozorenje3").class="not";
						document.getElementById("upozorenje3").style.visibility="visible";
            teljefonTextBox.focus();
			cek3=false;
        }
    } else {
			document.getElementById("slika3").style.visibility="visible";
			document.getElementById("slika3").src= 'https://zamger.etf.unsa.ba/images/16x16/brisanje.png';
			document.getElementById("slika3").class="NOT OK";
			teljefonTextBox.style.backgroundColor = "white";
			document.getElementById("upozorenje3").class="not";
						document.getElementById("upozorenje3").style.visibility="hidden";
			cek3=false;
    }
    check();
});



GodisteTextBox.addEventListener("blur", function(){
var godiste= GodisteTextBox.value;

    if (godiste !== '') {
        if ( parseInt( godiste, 10)>=1910 && parseInt( godiste, 10)<=1997) {
            GodisteTextBox.style.backgroundColor = "#80FF80";
			document.getElementById("slika4").style.visibility="visible";
			document.getElementById("slika4").src='https://zamger.etf.unsa.ba/images/16x16/zad_ok.png';
			document.getElementById("slika4").class="OK";
			document.getElementById("upozorenje4").class="yes";
			document.getElementById("upozorenje4").style.visibility="hidden";
			cek4=true;
        } else {
            GodisteTextBox.style.backgroundColor = "#FF8080";
			document.getElementById("slika4").style.visibility="visible";
			document.getElementById("slika4").src='https://zamger.etf.unsa.ba/images/16x16/brisanje.png';
			document.getElementById("slika4").class="NOT OK";
			document.getElementById("upozorenje4").class="not";
						document.getElementById("upozorenje4").style.visibility="visible";
            GodisteTextBox.focus();
			cek4=false;
        }
    } else {
			document.getElementById("slika4").style.visibility="visible";
			document.getElementById("slika4").src= 'https://zamger.etf.unsa.ba/images/16x16/brisanje.png';
			document.getElementById("slika4").class="NOT OK";
			document.getElementById("upozorenje4").class="not";
			document.getElementById("upozorenje4").style.visibility="hidden";
			GodisteTextBox.style.backgroundColor = "white";
			cek4=true;
    }
    check();
});



drzavaTextBox.addEventListener("blur", function(){
var drzava= String(drzavaTextBox.value);

			
			if(drzava===''){
			
			document.getElementById("slika5").style.visibility="hidden";
					document.getElementById("slika5").src= 'https://zamger.etf.unsa.ba/images/16x16/zad_ok.png';
					document.getElementById("slika5").class="OK";
					document.getElementById("upozorenje5").class="yes";
					document.getElementById("upozorenje5").style.visibility="hidden";
					drzavaTextBox.style.backgroundColor = "white";
					valid2 = true;
					ima=false;
			
			}
			else{
			
				var ajax = new XMLHttpRequest();
					var v = "https://restcountries.eu/rest/v1/name/" + drzava;
			
			ajax.onreadystatechange = function() {
			if (ajax.readyState == 4 && ajax.status == 200)
			{


 			drzavaTextBox.style.backgroundColor = "#80FF80";
			document.getElementById("slika5").style.visibility="visible";
			document.getElementById("slika5").src='https://zamger.etf.unsa.ba/images/16x16/zad_ok.png';
			document.getElementById("slika5").class="OK";
			document.getElementById("upozorenje5").class="yes";
			document.getElementById("upozorenje5").style.visibility="hidden";
			valid2=true;
			ima=true;

	
				
			}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					drzavaTextBox.style.backgroundColor = "#FF8080";
					document.getElementById("slika5").style.visibility="visible";
					document.getElementById("slika5").src='https://zamger.etf.unsa.ba/images/16x16/brisanje.png';
					document.getElementById("slika5").class="NOT OK";
					document.getElementById("upozorenje5").class="not";
					document.getElementById("upozorenje5").style.visibility="visible";
					drzavaTextBox.focus();
					valid2 = false;
					ima=true;
				}
		
		 }
			ajax.open("GET", v, true);
			ajax.send();
		}

			check();
			
});



valutaTextBox.addEventListener("blur", function(){
var valuta= valutaTextBox.value;

	if(valuta===''){
			
					if(ima==true){
					valid1 = false;
					document.getElementById("slika6").style.visibility="visible";
					document.getElementById("slika6").src= 'https://zamger.etf.unsa.ba/images/16x16/brisanje.png';
					document.getElementById("slika6").class=" NOK";
					document.getElementById("upozorenje6").class="not";
					document.getElementById("upozorenje6").style.visibility="hidden";
					valutaTextBox.style.backgroundColor = "white";


	}
	else{ valid1=true;


				document.getElementById("slika6").style.visibility="hidden";
					document.getElementById("slika6").src= 'https://zamger.etf.unsa.ba/images/16x16/brisanje.png';
					document.getElementById("slika6").class=" OK";
					document.getElementById("upozorenje6").class="not";
					document.getElementById("upozorenje6").style.visibility="hidden";
					valutaTextBox.style.backgroundColor = "white";
	}
	
	
	}
	else{
	
	var ajax = new XMLHttpRequest();
			var v = "https://restcountries.eu/rest/v1/currency/" + valuta;
			var pomocna=false;
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
			
				var drzava = String(document.getElementById('drzava').value);
			
				var data = JSON.parse(ajax.responseText);
				for (var i=0; i <30;i++){
					if (data[i].name == drzava){pomocna=true;}

				}
				if(!pomocna)
				{
					
					valutaTextBox.style.backgroundColor = "#FF8080";
					document.getElementById("slika6").style.visibility="visible";
					document.getElementById("slika6").src='https://zamger.etf.unsa.ba/images/16x16/brisanje.png';
					document.getElementById("slika6").class="NOT OK";
					document.getElementById("upozorenje6").class="not";
					document.getElementById("upozorenje6").style.visibility="visible";
					valutaTextBox.focus();
					valid1 = true;
					
				}
				else {
				
					  valutaTextBox.style.backgroundColor = "#80FF80";
					document.getElementById("slika6").style.visibility="visible";
					document.getElementById("slika6").src='https://zamger.etf.unsa.ba/images/16x16/zad_ok.png';
					document.getElementById("slika6").class="OK";
					document.getElementById("upozorenje6").class="yes";
					document.getElementById("upozorenje6").style.visibility="hidden";
					valid1=false;
				
				}

				
				}
					if (ajax.readyState == 4 && ajax.status == 404)
				{
					valutaTextBox.style.backgroundColor = "#FF8080";
					document.getElementById("slika6").style.visibility="visible";
					document.getElementById("slika6").src='https://zamger.etf.unsa.ba/images/16x16/brisanje.png';
					document.getElementById("slika6").class="NOT OK";
					document.getElementById("upozorenje6").class="not";
					document.getElementById("upozorenje6").style.visibility="visible";
					valutaTextBox.focus();
					valid1 = false;
				}
		}
		
			ajax.open("GET", v, true);
			ajax.send();

	
	}
	
	 check();	
		
});*/



}











