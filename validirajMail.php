	
		<!DOCTYPE html>
	<html> 
	<head>
		<meta charset="utf-8">
		
		<title>Optičke usluge | Mjerenje vida | Izrada naočala | Cijena | Prodaja | Akcija</title>
	
	<link rel="stylesheet" type="text/css" href="style.css">

<script src="meniSkripta.js"></script>
<script src="ucitavanje.js"></script>


	</head>
	
<body  id="main">

<header class="izbornik">
	<img src="logo.jpg" alt="sl">

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
    <li><a  onclick="Load('ONama.html');" >O nama</a></li>
    <li><a onclick="Load('Katalog.html');"
			onmouseover="mopen('m2')" 
			onmouseout="mclosetime()">Katalog proizvoda</a>
	       <div id="m2" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a  onclick="Load('Katalog.html');">Dioptrijski okviri</a>
        <a 	onclick="Load('Katalog.html');">Dioptrijske leće</a>
        <a  onclick="Load('Katalog.html');">Sunčane naočale</a>
        <a  onclick="Load('Katalog.html');">Accessories </a>
        </div>
	
	
	</li>
    <li><a  onclick="Load('Usluge.html');">Usluge</a></li>
    <li><a  onclick="Load('Kontakt.php'); ">Kontakt</a></li>
</ul>
<div style="clear:both"></div>
<div class="header_underline"> </div>
</header>


<div class="podloga" >

	 	<?php
		
if ($_POST){
			
$pomocna= $_POST["siguran"];
 $godiste = $_POST["godiste"];
   $telefon = $_POST["telefon"];
   $email = $_POST["email"];
   $name = $_POST["name"];
    $comment = $_POST["comment"];
			if ($pomocna=="da"){
		ini_set("SMTP","webmail.etf.unsa.ba");
		ini_set("smtp_port","25");
		ini_set('sendmail_from','ezugor1@etf.unsa.ba');
    $to = "ezugor1@etf.unsa.ba";
    $naslov = "Dibi optika najbolja optika";
    $cc = "vljubovic@etf.unsa.ba";	
	
	$header = "From: ".$to."\r\n"."Cc: ".$cc."\r\n"."Reply-To: ".$naslov."\r\n"."Content-Type: text/html; charset=\"UTF-8\""."\r\n";
    $poruka = "Ime: ".$name."\r\n"."Telefon: ".$telefon."\r\n"."Godiste: ".$godiste."\r\n".$comment;

    $dodatno = "CC: " . $cc . "\r\n" . "Reply-To: " . $email;
    $poslanMail = mail($to, $naslov, $poruka, $dodatno);
echo ($poslanMail == 1) ? "Zahvaljujemo vam sto ste nas kontaktirali." : "Došlo je do greške pri slanju maila.";}}
//echo "<script> document.location.href = 'kontakt.php'; </script>";
?>
	



</div>

	<img src="Dibi3.jpg" alt="reklama3" title="reklama3"  />
	<img src="Dibi4.jpg" alt="reklama4" title="reklama4"  />



	<p >
	
	

	<footer id="Copy"></footer>
    Copyright &copy; Ediba Žugor 2015.
	
</div>		
	
</body>