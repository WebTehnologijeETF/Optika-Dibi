<!DOCTYPE html>
	<html> 

	<head>

		
		<meta charset="utf-8">
		
		<title>Optičke usluge | Mjerenje vida | Izrada naočala | Cijena | Prodaja | Akcija</title>
	
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="jsFiles/meniSkripta.js"></script>
		<script src="jsFiles/jsFile.js"></script>
<script src="jsFiles/ucitavanje.js"></script>

	</head>
	
<body id ="main" >
<header class="izbornik">
<img src="pictures/logo.jpg" alt="sk">



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
		<a onclick="Load('Naslovnica.php');">Varilux 1+1</a>
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
        <a onclick="Load('Katalog.php');">Dioptrijske leće</a>
        <a  onclick="Load('Katalog.php');">Sunčane naočale</a>
        <a  onclick="Load('Katalog.php');"> >Accessories </a>
        </div>
	
	
	</li>
    <li><a  onclick="Load('Usluge.php');">Usluge</a></li>
    <li><a  onclick="Load('Kontakt.php'); ">Kontakt</a></li>
</ul>
<div style="clear:both"></div>
<div class="header_underline"> </div>
</header>

<div class="podloga" >
	<div class="dodatna"><br><br>
	<em>Ključ 20-godišnjeg uspjeha Jo-Jo optike je briga za klijenta, profesionalnost, individualni pristup, ljubaznost i raznolika ponuda te cijene pristupačne svakom klijentu.</em>
	<br>
	<?php
	
header('Content-type: text/html; charset=utf-8');

  	 session_start();
if (isset($_SESSION['username']) ){
$validnost=true;
		 $username = $_SESSION['username'];
		
		 ?>
		 
		 Logirani ste kao : <h3><?php echo $username?></h3><br>
		 <a href ="logOut.php">logOut</a>
		 <a href ="Admin.php">Admin panel </a>


<br><br><br>
Izaberite od ponudenog:
<br>



<ul id="sddm">
     <li><a 
        onmouseover="mopen('m3')" 
        onmouseout="mclosetime()"
		onclick="dodajNovost(3);return false;">Novosti</a>
        <div id="m3" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a  onclick="dodajNovost(1);return false;">Promjena</a>
        <a  onclick="dodajNovost(2);return false;">Brisanje</a>
        <a  onclick="dodajNovost(3);return false;">Dodavanje</a>
        </div>
    </li>
    <li><a onclick="prikaziSve(); return false;" 
	 onmouseover="mopen('m4')" 
        onmouseout="mclosetime()">Komentari</a>
	       <div id="m4" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a  onclick="prikaziSve(); return false;">Brisanje</a>
        </div>
	</li>
	<li><a onclick="dodajKorisnika(3);return false;"
	 onmouseover="mopen('m5')" 
        onmouseout="mclosetime()">Korisnici</a>
	       <div id="m5" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a  onclick="dodajKorisnika(1);return false;">Promjena</a>
		  <a  onclick="dodajKorisnika(2);return false;">Brisanje</a>
        <a  onclick="dodajKorisnika(3);return false;">Dodavanje</a>
        </div>
	</li>
   
</ul>
	  <div id="prikaz"></div>
	<?php  
	  
  }
  else {
  ?>
   
   Pogresno ste unijeli username ili password 
   <a href="Naslovnica.php">Natrag</a>
  <?php 
  }?>
   
   

</div></div>

<footer id="Copy">
    Copyright &copy; Ediba Žugor 2015.
</footer>

</body>
	
 