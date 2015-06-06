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

    $veza = new PDO("mysql:dbname=dibioptics;host=localhost;charset=utf8", "ezugor", "password");
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
	
	
	/* global $mySQL;
    if ($SQL = $mySQL->prepare("SELECT `Username`,`Email`,`Password` FROM `users_enc` WHERE `ID` = ? LIMIT 1"))
    {
        $SQL->bind_param('i',$userID);
        $SQL->execute();
        $SQL->store_result();
        $SQL->bind_result($uname,$email,$pword);
        $SQL->fetch();
        $SQL->close();*/
        $expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
        $expDate = date("Y-m-d H:i:s",$expFormat);
      /*  $key = md5($uname . '_' . $email . rand(0,10000) .$expDate . PW_SALT);
        if ($SQL = $mySQL->prepare("INSERT INTO `recoveryemails_enc` (`UserID`,`Key`,`expDate`) VALUES (?,?,?)"))
        {
            $SQL->bind_param('iss',$userID,$key,$expDate);
            $SQL->execute();
            $SQL->close();*/
          //  $passwordLink = "<a href=\"?a=recover&email=" . $pass . "&u=" . urlencode(base64_encode($uname)) . "\">http://www.oursite.com/forgotPass.php?a=recover&email=" . $pass . "&u=" . urlencode(base64_encode($userID)) . "</a>";
            
			$passwordLink= "<a href ='Naslovnica.php'>"."Naslovnica.php"."</a>";
			$message = "Postovani $uname,\r\n";
            $message .= "Molim Vas kliknite na naredni link kako bi ste resetovali password:\r\n";
            $message .= "-----------------------\r\n";
            $message .= "$passwordLink\r\n";
            $message .= "-----------------------\r\n";
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
            "password" => "nepricaj456",
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
	


	
	
/*
		ini_set("SMTP","webmail.etf.unsa.ba");
		ini_set("smtp_port","25");
		ini_set('sendmail_from','ezugor1@etf.unsa.ba');
    $to = $email;
    $naslov = "Dibi optika najbolja optika";	
	
	$header = "From: ".$to."\r\n"."Reply-To: ".$naslov."\r\n"."Content-Type: text/html; charset=\"UTF-8\""."\r\n";
    $poruka = "Vasa nova sifra je : ".$pass;

    $dodatno =  "Reply-To: " . $email;
    $poslanMail = mail($to, $naslov, $poruka, $dodatno);
	
	*/
    $message = "Sifra vam je poslana na email";
	
	$rezultat = $veza->prepare("UPDATE Korisnik SET  Password = md5(?), Email = ? where Username =?");
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