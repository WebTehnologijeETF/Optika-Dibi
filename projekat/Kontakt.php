<!DOCTYPE html>
	<html> 
	<head>
		<meta charset="utf-8">
		
		<title>Optičke usluge | Mjerenje vida | Izrada naočala | Cijena | Prodaja | Akcija</title>
	
	<link rel="stylesheet" type="text/css" href="style.css">

<script src="meniSkripta.js"></script>
<script src="ucitavanje.js"></script>

<style>
.error {color: #FF0000;}
</style>
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


<div class="lijeviKontakt">
<h2><a href="Naslovnica.html">DIBI OPTIKA Hotonj</a></h2><br><br>
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



<?php include 'kontakt_forma.php';?>
<div class="desniKontakt">
<br><br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  > 
		<?php 

		include $prikazi;?>


</form>


</div>

	<img src="Dibi3.jpg" alt="reklama3" title="reklama3"  />
	<img src="Dibi4.jpg" alt="reklama4" title="reklama4"  />



	<p >
	
	

	<footer id="Copy"></footer>
    Copyright &copy; Ediba Žugor 2015.
</div>		
	
</body>