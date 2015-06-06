<!DOCTYPE html>
	<html> 
	<head>

		
		<meta charset="utf-8">
		
		<title>Optičke usluge | Mjerenje vida | Izrada naočala | Cijena | Prodaja | Akcija</title>
	
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="meniSkripta.js"></script>
		<script src="jsFile.js"></script>
<script src="ucitavanje.js"></script>

	</head>
	
<body id ="main" >
<header class="izbornik">
<img src="logo.jpg" alt="sk">



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
    <li><a  onclick="Load('ONama.html');" >O nama</a></li>
    <li><a onclick="Load('Katalog.html');"
	 onmouseover="mopen('m2')" 
        onmouseout="mclosetime()">Katalog proizvoda</a>
	       <div id="m2" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a  onclick="Load('Katalog.html');">Dioptrijski okviri</a>
        <a onclick="Load('Katalog.html');">Dioptrijske leće</a>
        <a  onclick="Load('Katalog.html');">Sunčane naočale</a>
        <a  onclick="Load('Katalog.html');"> >Accessories </a>
        </div>
	
	
	</li>
    <li><a  onclick="Load('Usluge.html');">Usluge</a></li>
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


     $veza = new PDO("mysql:dbname=dibioptics;host=localhost;charset=utf8", "ezugor", "password");
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select IDNovosti, Naslov, Tekst, UNIX_TIMESTAMP(Datum) vrijeme2, Autor, Detaljnije, Slika from Novosti order by Datum desc");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }

	 
	 
	 	 $kom = new PDO("mysql:dbname=dibioptics;host=localhost;charset=utf8", "ezugor", "password");
     $kom->exec("set names utf8");
     $rez = $kom->query("select IDKomentar, Autor, UNIX_TIMESTAMP(Datum_Vrijeme) vrijeme2, Email, Tekst, Novosti from Komentar order by Novosti asc");
     if (!$rez) {
          $greska = $kom->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
  

	 session_start();
if (isset($_SESSION['username']) ){
$validnost=true;
		 $username = $_SESSION['username'];
		
		 ?>
		 
		 Logirani ste kao : <h3><?php echo $username?></h3><br>
		 <a href ="logOut.php">logOut</a>
		 <a href ="Admin.php">Admin panel </a>
<?php 
}
else {


	 $validnost=false;
	 if ($_SERVER["REQUEST_METHOD"] == "POST") {

	 
		 if (isset($_SESSION['login1'])){
			 		 	 session_start();
		 $username = $_SESSION['login1'];
			$validnost=true;
		 
		 
		 ?>
		 
		 Logirani ste kao : <?php echo $username?>
		 <a href ="logOut">logOut<br>
		 <?php }
	 else if (isset($_REQUEST['login1'])) {

		$username = $_REQUEST['login1'];
  $v = new PDO("mysql:dbname=dibioptics;host=localhost;charset=utf8", "ezugor", "password");
     $v->exec("set names utf8");

     $r = $v->query("select Username, Password, Email from korisnik ");

	
     if (!$r) {
          $greska = $v->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }

	  $name=$_POST["login1"];
	  $pass=$_POST["login2"];
	
	 foreach ($r as $Kor){
		 if ($name==$Kor['Username'] && $pass==$Kor['Password']){
		 $validnost=true;
		 print $name." ".$pass;
		 $_SESSION['username'] = $username;}
		 
	 }
	     if (!$r) {
          $greska = $v->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
    
}}}

	
  
  if ($validnost){?>
	  
USPJEŠNO STE SE LOGOVALI KAO ADMINISTRATOR STRANICE

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
        <a  onclick="dodajNovost(1);return false;;">Promjena</a>
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
	<li><a onclick="Load('dodavanjeKorisnika.php');"
	 onmouseover="mopen('m5')" 
        onmouseout="mclosetime()">Korisnici</a>
	       <div id="m5" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a  onclick="Load('promjenaKorisnika.php');">Promjena</a>
		  <a  onclick="Load('brisanjeKorisnika.php');">Brisanje</a>
        <a  onclick="Load('dodavanjeKorisnika.php');">Dodavanje</a>
        </div>
	</li>
   
</ul>
	  <div id="prikaz"></div>
	<?php  
	  
  }
  else {
  ?>
   
   Pogresno ste unijeli username ili password
   
  <?php 
  }?>
   
   

</div></div>

<footer id="Copy">
    Copyright &copy; Ediba Žugor 2015.
</footer>

</body>
	
 