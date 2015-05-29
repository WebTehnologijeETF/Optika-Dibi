<!DOCTYPE html>
	<html> 
	<head>
  <?php require "Mail.php";?>
		
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

    $veza = new PDO("mysql:dbname=optikadibi;host=127.12.90.2;charset=utf8", "ediba", "dibac.DiBi");
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select Username, Password, Email from korisnik ");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	
   ?>



<div class="lijeviKontakt">

<form   method="post" enctype="multipart/form-data" action="generisanjeSifre.php" > 
		
		<label title="unesite validan email" >E-mail *</label><br>
		<input type="email"  title="unesite validan email" id ="email" name="email" >
	<br>
		&nbsp;&nbsp;<input class="my-stylish-button" type="submit" value="Generisi sifru" id ="dugme">
			   
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
		 if($chars=="")
		$chars = "abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ0123456789"; 
    srand((double)microtime()*1000000); 
    $i = 0; 
    $pass = '' ; 
 
    while ($i < $length) { 
        $num = rand() % strlen($chars); 
        $tmp = substr($chars, $num, 1); 
        $pass = $pass . $tmp; 
        $i++; 
    } 

		ini_set("display_errors", 1);
	$kome=$email;
	$data="Vasa nova sifra je :".$pass;
	$from = "ezugor1@etf.unsa.ba"	;
	$naslov= "dibi optika";
	 echo "<h1>Kome: $email</h1>";
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
    $body = $data;
    $mail->send($kome, $headers, $body);
	
    if (PEAR::isError($mail)) {
        echo "<h1>NE VALJA</h1>";
    }
	else echo "<h1>Poslano uspješno...</h1>";
	
	
    $message = "Sifra vam je poslana na email";
	
	$rezultat = $veza->prepare("UPDATE korisnik SET  Password = md5(?), Email = ? where Username =?");
	$rezultat->execute(array($pass,$Korisnik["Email"],$Korisnik["Username"]));
     if ( !$rezultat) {
          $greska = $kom->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	

    

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