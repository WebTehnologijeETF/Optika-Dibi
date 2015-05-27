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


<div class="lijeviKontakt">

<form   method="post"  action="saljiMail.php" > 
		<label title="prvi znak mora biti slovo" >To: *</label><br>                                                                  
		<input type="text"  title="Kome se salje mail" id ="to" name="to"   ><br>
		
		
		<label title="unesite validan email" >E-mail *</label><br>
		<input type="email"  title="unesite validan email" id ="email" name="email" >
	<br>
		<label title="Morate unijeti validno ime">Poruka </label><br>
		<textarea title="Morate unijeti validno ime" id ="poruka"  name="comment"  ></textarea><br><br>
		

		&nbsp;&nbsp;<input class="my-stylish-button" type="submit" value="Pošalji poruku" id ="dugme">
			     <input class="my-stylish-button" name="action" type="reset" value="Reset"><br><br>
				 
				 

</form>
<a href="Naslovnica.php">natrag</a>
	 	<?php
		
if ($_SERVER["REQUEST_METHOD"] == "POST"){
			
   $email = $_POST["email"];
   $name = $_POST["to"];
    $comment = $_POST["comment"];
		ini_set("SMTP","webmail.etf.unsa.ba");
		ini_set("smtp_port","25");
		ini_set('sendmail_from','ezugor1@etf.unsa.ba');
    $to = $name;
    $naslov = "Dibi optika najbolja optika";	
	
	$header = "From: ".$to."\r\n"."Reply-To: ".$naslov."\r\n"."Content-Type: text/html; charset=\"UTF-8\""."\r\n";
    $poruka = "Ime: ".$name."\r\n".$comment;

    $dodatno =  "Reply-To: " . $email;
    $poslanMail = mail($to, $naslov, $poruka, $dodatno);
echo ($poslanMail == 1) ? "Zahvaljujemo vam sto ste nas kontaktirali." : "Došlo je do greške pri slanju maila.";}
//echo "<script> document.location.href = 'kontakt.php'; </script>";
?>
			

</div>




<p>

</div></div>

<footer id="Copy">
    Copyright &copy; Ediba Žugor 2015.
</footer>

</body>