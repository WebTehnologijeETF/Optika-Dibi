<!DOCTYPE html>
	<html> 
	<head>

		
		<meta charset="utf-8">
		
		<title>Optičke usluge | Mjerenje vida | Izrada naočala | Cijena | Prodaja | Akcija</title>
	
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="jsFiles/meniSkripta.js"></script>
<script src="jsFiles/ucitavanje.js"></script>

	</head>
	
<body id ="main" >
<header class="izbornik">
<img src="pictures/logo.jpg" alt="slikaca">
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
        <a  onclick="Load('Katalog.php');">Accessories </a>
        </div>
	
	
	</li>
    <li><a  onclick="Load('Usluge.php');">Usluge</a></li>
    <li><a  onclick="Load('Kontakt.php');">Kontakt</a></li>
</ul>
<div style="clear:both"></div>
<div class="header_underline"> </div>
</header>

 
<div class="podloga" >
<?php include 'login.php';?>

<div class="lijeviKontakt">
<div class="scroll2">
<h1>Najnovija kolekcija</h1>
	<article >										
<a href="pictures/naocale1.jpg" title="RAY BAN 5121 2000">
										
<img src="pictures/naocale1.jpg" alt="RAY BAN 5121 2000" title="RAY BAN 5121 2000"  />
</a>

												<h2><a href="pictures/naocale1.jpg" title="RAY BAN 5121 2000">RAY BAN 5121 2000</a></h2>
												

			<h3>Cijena: 210.00 KM</h3>
									
								</article><hr  />


<article >
									
										

		
<a href="pictures/naocale2.jpg" title="RAY BAN 8677 1073">
										


<img src="pictures/naocale2.jpg" alt="RAY BAN 8677 1073" title="RAY BAN 8677 1073"  />
</a>

												<h2><a href="pictures/naocale2.jpg" title="RAY BAN 8677 1073">RAY BAN 8677 1073</a></h2>
												

												<div ><h3>Cijena: 230.00 KM</h3></div>
											
							
								</article><hr />

								<article >
									
<a href="pictures/naocale3.jpg" title="PRADA VPS 03B 2AZ">
										


<img src="pictures/naocale3.jpg" alt="PRADA VPS 03B 2AZ" title="PRADA VPS 03B 2AZ"  />
</a>

												<h2><a href="pictures/naocale3.jpg" title="PRADA VPS 03B 2AZ">PRADA VPS 03B 2AZ</a></h2>
												
<p></p>
												<div ><h3>Cijena: 640.00 KM</h3></div>
											
									
								</article><hr  />

								<article >
							
									

									
<a href="pictures/naocale4.jpg" title="PRADA 55B 1BO">
										


<img src="pictures/naocale4.jpg" alt="PRADA 55B 1BO" title="PRADA 55B 1BO" />
</a>


									
												<h2><a href="pictures/naocale4.jpg" title="PRADA 55B 1BO">PRADA 55B 1BO</a></h2>
												
<p></p>
												<h3>Cijena: 750.00 KM</h3>
										
								</article><hr />

								<article >
												
<a href="pictures/naocale5.jpg" title="PERSOL 2975 926">
										


<img src="pictures/naocale5.jpg" alt="PERSOL 2975 926" title="PERSOL 2975 926" />
</a>


								
								
												<h2><a href="pictures/naocale5.jpg" title="PERSOL 2975 926">PERSOL 2975 926</a></h2>
												
<p></p>
										<h3>Cijena: 340.00 KM</h3>
										
								</article><hr  />

</div></div>
	<div class="desniKontakt">
		<h1>Tabelarni prikaz usluga:</h1>
<div class="scroll">

<table>
<tr><th>Dioptrijski okviri</th><th>Dioptrijske leće</th><th>Sunčane naočale</th><th>Accessories</th></tr>
<tr><td>Prada</td><td>Sting</td><td>Jednodnevne leće</td><td>Clip-On</td></tr>
<tr><td>Diesel</td><td>Ozzy</td><td>Dvotjedne leće</td><td>Krpice</td></tr>
<tr><td>Ray Ban</td><td>Avanglion</td><td>Mjesečne</td><td>Futrole za naočale</td></tr>
<tr><td>Versace</td><td>Giorgo Armani</td><td>Tromjesečne</td><td>Lančići za naočale</td></tr>
<tr><td>D&amp;G</td><td>Ray Ben</td><td>Leće za astigmatizam</td><td>Okulder</td></tr>
<tr><td>Burberry</td><td>Prada</td><td>Tvrde i polutvrde leće</td><td>Sprejevi za čišćenje</td></tr>
<tr><td>Vogue</td><td>Versace</td><td>Leće u boji </td></tr>
<tr><td>Persol</td><td>Burberry</td><td>Umjetne suze</td></tr>
<tr><td>Gucci</td><td>Vogue</td><td>Otopine</td></tr>
<tr><td>Hugo Boss</td><td>Ralph Loren</td></tr>
<tr><td>Dior</td><td>Persol</td></tr>
<tr><td>Tommy Hilfinger</td><td>Carrera</td></tr>
<tr><td>Giorgio Armani</td><td>Police</td></tr>
<tr><td>Max Mara</td></tr>
<tr><td>Escada</td></tr>
<tr><td>Marc by Marc Jacobs</td></tr>
</table>
</div>
</div>
<p>
</div>
<footer id="Copy">
    Copyright &copy; Ediba Žugor 2015.
</footer>


</body>