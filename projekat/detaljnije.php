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

?>

	<div class="spesl">		
					 <?php
		
        $autor = $_GET['autor'];
        $detaljnije = $_GET['det'];
        $datum = $_GET['datum'];
        $slika = $_GET['slika'];
        $naslov = $_GET['naslov'];
        $tekst = $_GET['tekst'];
		
		   $slika = str_replace("'", "", $slika);
        $slika = str_replace("<br/>", "", $slika);
        $autor = str_replace("'", "", $autor);
        $datum = str_replace("'", "", $datum);
        $naslov = str_replace("'", "", $naslov);
        $detaljnije = str_replace("'", "", $detaljnije);
        $tekst = str_replace("'", "", $tekst);
     echo '<div class="content-naslov">Novosti</div>';
    
         echo '<div class="novost">'.
            '<div class="naslov">'.
                 '<div>'.
                     '<div class="datum">'.
                       
                          "$datum".
                      '</div>'.              
            ' <div class="autor">'.$autor.'</div>'.
                  '</div>'.
                $naslov.
            '</div>'.
            '<div class="tekst">'.
                "<div ><img height='300' width='600' src='$slika'></img></div>"?>
            <?php echo $tekst.'</div>'.'<div class="tekst">'.$detaljnije.'</div>'.
            '<div class="border-bottom"></div>'.
       '</div>';
    ?>

	

			
</div>



<p>

</div></div>

<footer id="Copy">
    Copyright &copy; Ediba Žugor 2015.
</footer>

</body>
	
 