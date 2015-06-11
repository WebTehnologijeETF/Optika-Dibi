

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
<br>



<div style="clear:both"></div>
<div class="header_underline"> </div>

</header>
<?php
header('Content-type: text/html; charset=utf-8');

?>
		 
<div class="podloga" id="neka">

<?php include 'login.php';?>

	<div class="dodatna"><br><br>
	<em>Ključ 20-godišnjeg uspjeha Jo-Jo optike je briga za klijenta, profesionalnost, individualni pristup, ljubaznost i raznolika ponuda te cijene pristupačne svakom klijentu.</em>
	<br>
<?php include 'novosti.php';?>
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


<p>

</div>



</div>

<footer id="Copy">
    Copyright &copy; Ediba Žugor 2015.
</footer>

</body>
</html>