<!DOCTYPE html>
	<html> 
	<head>
  <?php require "Mail.php";?>
		
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
<br>

<div style="clear:both"></div>
<div class="header_underline"> </div>

</header>
<?php
header('Content-type: text/html; charset=utf-8');
?>
<div class="podloga" >
	<div class="dodatna"><br><br>
	<em>Ključ 20-godišnjeg uspjeha Jo-Jo optike je briga za klijenta, profesionalnost, individualni pristup, ljubaznost i raznolika ponuda te cijene pristupačne svakom klijentu.</em>
	<br>
	<div class="desniKontakt">
						
							
			<ul>


				<li>	stručno savjetovanje i mjerenje vida</li>
					<li>		servis svih vrsta naočala (popravka naočala)</li>
					<li>		mogućnost plaćanja gotovinom i karticama</li>
						
						
						
						<li>	stručna pomoć pri odabiru okvira i  leća</li>
							<li>	kontaktne leće i otopine</li>
							
					<li>	primamo recepte HZZO-a</li>
				

					<li>kvalitetna i brza izrada naočala </li>
					<li>	velik izbor sunčanih i dioptrijskih okvira</li>
						<li>	najbolji omjer cijene i kvalitete</li>
				

					</ul>	

			
</div>

<?php

      $veza = new PDO('mysql:host=localhost;dbname=dibioptics;charset=utf8', 'ezugor', 'password');
     $veza->exec("set names utf8");

     $rezultat = $veza->query("select Username, Password, Email from korisnik ");

     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	
   ?>



<div class="lijeviKontakt">
   <h2>Generisanje sifre</h2>
    <p>Mozete generisati ponovno password tako sto cete unijeti validan email u ponudjeno polje.<br>
	Klikom na link koji dobijete na mailu cete potvrditi zelju za generisanjem nove sifre.<br>
	Unesite email u ponudjeno polje kako bi ste zapoceli <br>
	</p>
    <form action="generisanjeSifre.php" method="post">

        <div class="fieldGroup"><label for="email">Email* :</label><div class="field"><input type="email" name="email" id="email" value="" maxlength="255"></div></div>
        <input type="hidden" name="subStep" value="1" />
        <div class="fieldGroup"><input class="my-stylish-button" type="submit" value="Generisi sifru" style="margin-left: 150px;" /></div>
        <div class="clear"></div>
    </form>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	
$length=8;
$chars="";
$validnost=false;
$email = $_POST["email"];
foreach ($rezultat as $Korisnik) {
	
	if ($Korisnik["Email"]==$email){
		$validnost=true;
		$uname=$Korisnik["Username"];
		$date=time();
			$message = "Postovani $uname,\r\n";
            $message .= "Molim Vas kliknite na naredni link kako bi ste resetovali password:\r\n";
            $message .= "-----------------------\r\n";
            $message .= " <a href= 'http://optikadibi-dibi.rhcloud.com/novaSifra.php?Name=".$uname."&Vrijeme=".$date."' > link za promjenu sifre</a>";
            $message .= "\r\n";
            $message .= "Molim Vas uvjerite se da ste kopirali citav link u Vas pretrazivac. Link istice nakon 24 sata iz sigurnosnih razloga.\r\n\r\n";
            $message .= "U slucaju da niste zahtjevali promjenu Vaseg passworda molimo Vas ignorisite ovu poruku.\r\n\r\n";
            $message .= "Hvala,\r\n";
            $message .= "-- Dibi optika tim";
          
	ini_set("display_errors", 1);
	$kome=$email;
	
	$from = "ezugor1@etf.unsa.ba"	;
	$naslov= "dibi optika";
    $mail = Mail::factory("smtp", 
        array(
            "host"     => "ssl://webmail.etf.unsa.ba",
            "username" => "ezugor1@etf.unsa.ba",
            "password" => "",
            "auth"     => true,
            "port"     => 465
        )
    );
    $headers = array("From" => $from, "Subject" => $naslov, "Content-Type"  => 'text/plain; charset=UTF-8');
    $body = $message;
    $mail->send($kome, $headers, $body);
	
    if (PEAR::isError($mail)) {
        echo "<h1>NE VALJA</h1>";
    }
	else echo "<h1>Poslano uspješno...</h1>";
	

	}
}

if (!$validnost){$message = "Niste unijeli dobar mail";}

echo "<script type='text/javascript'>alert('$message');</script>"; 


}

?>

			

</div>




<p>

</div></div>

<footer id="Copy">
    Copyright &copy; Ediba Žugor 2015.
</footer>

</body>