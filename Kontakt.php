<!DOCTYPE html>
	<html> 
	<head>
		<meta charset="utf-8">
		
		<title>Optičke usluge | Mjerenje vida | Izrada naočala | Cijena | Prodaja | Akcija</title>
	
	<link rel="stylesheet" type="text/css" href="style.css">

<script src="jsFiles/meniSkripta.js"></script>


<style>
.error {color: #FF0000;}
</style>
	</head>
	
<body  id="main">
<header class="izbornik">
<img src="pictures/logo.png" alt="sk">

<ul id="sddm">
   <li><a 
        onmouseover="mopen('m1')" 
        onmouseout="mclosetime()"
		onclick="Load('Naslovnica.php');">Naslovnica</a>
        <div id="m1" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a  onclick="Load('Naslovnica.php');">Dioptrijski okviri</a>
        <a  onclick="Load('Naslovnica.php');">Oko 30% - 60% popusta</a>
        <a  onclick="Load('Naslovnica.php');">Kontaktne leće i otopine</a>
		<a 	onclick="Load('Naslovnica.php');">Varilux 1+1</a>
        </div>
    </li>
    <li><a  onclick="Load('ONama.php');" >O nama</a></li>
    <li><a onclick="Load('Katalog.php');"
			onmouseover="mopen('m2')" 
			onmouseout="mclosetime()">Katalog proizvoda</a>
	       <div id="m2" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a  onclick="Load('Katalog.php');">Dioptrijski okviri</a>
        <a 	onclick="Load('Katalog.php');">Dioptrijske leće</a>
        <a  onclick="Load('Katalog.php');">Sunčane naočale</a>
        <a  onclick="Load('Katalog.php');">Accessories </a>
        </div>
	
	
	</li>
    <li><a  onclick="Load('Usluge.php');">Usluge</a></li>
    <li><a  onclick="Load('Kontakt.php'); ">Kontakt</a></li>
</ul>
<div style="clear:both"></div>
<div class="header_underline"> </div>
</header>


<div class="podloga" >

<script src="jsFiles/ucitavanje.js"></script>

<div class="dodatna">
<div class="lijeviKontakt">
<h2><a href="Naslovnica.php">DIBI OPTIKA Hotonj</a></h2><br><br>
				<h3>Poslovnice</h3>
<ul class="list-unstyled">
	<li><strong> Adresa:</strong>  Hotonj2, Vogošća  </li>
	<li><strong>Telefon:</strong> 061/879-988</li>
	<li><strong>Radno vrijeme:</strong>Pon - Pet: 8:00 - 20:00h; Sub: 8:00- 14:00h</li>
</ul>


<hr class="puni" />
<ul class="list-unstyled">
	<li><strong>Adresa:</strong> Sarajevska 6, Zagreb - DUGAVE SUPER KONZUM </li>
	<li><strong>Telefon:</strong> 061/879-989</li>
	<li><strong>Radno vrijeme:</strong>Pon - Sub: 8:00 - 21:00h; Ned: 8:00- 13:00h</li>
</ul>
<hr class="puni" />
<ul class="list-unstyled">
	<li><strong>Adresa:</strong>Ludara 34, Sarajevo</li>
	<li><strong>Telefon:</strong>061/879-987</li>
	<li><strong>Radno vrijeme:</strong> Pon - Pet: 8:00 - 20:00h; Sub: 8:00- 13:00h</li>
</ul>
<hr class="puni" />
<ul class="list-unstyled">
	<li><strong>Adresa:</strong> Seosko polje bb, Ilidža</li>
	<li><strong>Telefon:</strong>061/879-986</li>
	<li><strong>Radno vrijeme:</strong> Pon - Sub: 8:00 - 21:00h</li>
</ul>
	<hr class="puni" />
<ul class="list-unstyled">
	<li><strong>Adresa:</strong>Rašida Bešlije 20,Travnik </li>
	<li><strong>Telefon:</strong> 061/879-985</li>
	<li><strong>Radno vrijeme:</strong> Pon - Sub: 8:00 - 21:00h</li>
</ul>							


</div>

<br><br>


<div class="desniKontakt">
<br><br>
<div  > 
			

<style>
.error {color: #5970B2;}
</style>


<div class="desniKontakt" id="kontaktForma">
<h2>Pošaljite nam upit </h2>
<br><h3>U slučaju nejasnoća,<br>
 pošaljite nam upit,<br> rado ćemo pomoći</h3>


		<label title="prvi znak mora biti slovo" >Ime *</label><br>                                                                  
		<input type="text"  title="prvi znak mora biti slovo" id ="name" name="name"  > <span class="error" id="error1">
		<img alt='slika5'  class='NOTOK' id='slika1' src="https://zamger.etf.unsa.ba/images/16x16/zad_ok.png" style='visibility:"hidden"'/>
		
		</span><br>
		
		
		<label title="unesite validan email" >E-mail *</label><br>
		<input type="email"  title="unesite validan email" id ="email" name="email"  > <span class="error" id="error2">
		<img alt='slika6'  class='NOTOK' id='slika2' src="https://zamger.etf.unsa.ba/images/16x16/zad_ok.png" style='visibility:"hidden"' /></span><br>
		
	
		<label title="Telefon mora biti u obliku xxx-xxx">Telefon *</label><br>
		<input type="text"  title="Telefon mora biti u obliku xxx-xxx" id ="telefon" name="telefon" > <span class="error" id="error3">
		<img alt='slika7'  class='NOTOK' id='slika3' src="https://zamger.etf.unsa.ba/images/16x16/zad_ok.png" style='visibility:"hidden"' /></span><br>
			
			
		
			<label title="Unesite adresu">Adresa *</label><br>
		<input type="text"  title="Unesite adresu" id ="adresa" name="adresa" > <span class="error" id="error4">
		<img alt='slika8'  class='NOTOK' id='slika4' src="https://zamger.etf.unsa.ba/images/16x16/zad_ok.png" style='visibility:"hidden"' /></span><br>
		
	
		<label title="Morate unijeti validno ime">Poruka </label><br>
		<textarea title="Morate unijeti validno ime" id ="poruka"  name="comment"  ></textarea><br><br>
		

		&nbsp;&nbsp;<input class="my-stylish-button" type="button" value="Pošalji poruku" onClick="kontaktValidacija(); return false;" id ="dugme">
			   <br><br>
				 
	

</div>			
</div>

</div>
	
	<p >
</div>
	

</div>		
	

	<footer id="Copy">
    Copyright &copy; Ediba Žugor 2015.
	</footer>

	
</body>