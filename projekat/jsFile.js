var imeTextBox = document.getElementById("ime");
var emailTextBox = document.getElementById("email");
var teljefonTextBox = document.getElementById("telefon");
var GodisteTextBox = document.getElementById("godiste");
var dugmic=document.getElementById("dugme");
var porukaTextBox=document.getElementById("poruka");
var cek1=false;
var cek2=false;
var cek3=false;
var cek4=true;
imeTextBox.removeEventListener("onblur");
emailTextBox.removeEventListener("onblur");
teljefonTextBox.removeEventListener("onblur");
GodisteTextBox.removeEventListener("onblur");
dugmic.disabled=true;
porukaTextBox.disabled=true;

function check(){
	
	if(cek1 && cek2 && cek3 && cek4){
		dugmic.disabled=false;
	}
	else {
		dugmic.disabled=true;
	}
};

imeTextBox.addEventListener("blur", function(){
var ime= imeTextBox.value;

    if (ime !== '') {
        var regex = /^[A-Za-z0-9][^\s]{0,20}$/;
        if (ime.match(regex)) {
            imeTextBox.style.backgroundColor = "#80FF80";
			document.getElementById("slika1").style.visibility="visible";
			document.getElementById("slika1").src='https://zamger.etf.unsa.ba/images/16x16/zad_ok.png';
			document.getElementById("slika1").class="OK";
			document.getElementById("upozorenje1").style.visibility="hidden";
			document.getElementById("upozorenje1").class="yes";
			cek1=true;
			porukaTextBox.disabled=false;
		
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
    check();
});



emailTextBox.addEventListener("blur", function(){
var email= emailTextBox.value;
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  

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





