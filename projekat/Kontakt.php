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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
		<label title="prvi znak mora biti slovo" >Ime *</label><br>                                                                  
		<input type="text"  title="prvi znak mora biti slovo" id ="ime" name="name"  style= 'backgroundColor:<?php if($nameErr=="Morate unijeti ime" || $nameErr=="Samo znakovi i blanko znakovi su dozvoljeni" ) echo "#FF8080"; else echo "80FF80"; ?>'  > <span class="error"><?php echo $nameErr;?>
		<img alt='slika5'  class='NOTOK' id='slika1' style='visibility: <?php if($nameErr=="Morate unijeti ime" || $nameErr=="Samo znakovi i blanko znakovi su dozvoljeni" ||  $nameErr=="Validno ime") echo "visible"; else echo "hidden"; ?>'
		src= <?php if($nameErr=="Morate unijeti ime" || $nameErr=="Samo znakovi i blanko znakovi su dozvoljeni")echo "https://zamger.etf.unsa.ba/images/16x16/brisanje.png";  else if( $nameErr=="Validno ime") echo "https://zamger.etf.unsa.ba/images/16x16/zad_ok.png"; ?>
		class=<?php if($nameErr=="Morate unijeti ime" || $nameErr=="Samo znakovi i blanko znakovi su dozvoljeni")echo "NOTOK";  else if( $nameErr=="Validno ime") echo "OK"; ?>
		></span><br>
		
		
		<label title="unesite validan email" >E-mail *</label><br>
		<input type="email"  title="unesite validan email" id ="email" name="email"  style= 'backgroundColor:<?php if($emailErr=="Morate unijeti email" || $emailErr=="Nije validan email formata" ) echo "#FF8080"; else echo "80FF80"; ?>'  > <span class="error"><?php echo $emailErr;?>
		<img alt='slika6'  class='NOTOK' id='slika2' style='visibility: <?php if($emailErr=="Morate unijeti email" || $emailErr=="Nije validan email formata" ||  $emailErr=="Validan email") echo "visible"; else echo "hidden"; ?>'
		src= <?php if($emailErr=="Morate unijeti email" || $emailErr=="Nije validan email formata")echo "https://zamger.etf.unsa.ba/images/16x16/brisanje.png";  else if( $emailErr=="Validan email") echo "https://zamger.etf.unsa.ba/images/16x16/zad_ok.png"; ?>
		class=<?php if($emailErr=="Morate unijeti email" || $emailErr=="Nije validan email formata")echo "NOTOK";  else if( $emailErr=="Validan email") echo "OK"; ?>
		></span><br>
		
	
		<label title="Telefon mora biti u obliku xxx-xxx">Telefon *</label><br>
		<input type="text"  title="Telefon mora biti u obliku xxx-xxx" id ="telefon" name="tel"  style= 'backgroundColor:<?php if($telErr=="Morate unijeti telefon" || $telErr=="Nije validan format telefona" ) echo "#FF8080"; else echo "80FF80"; ?>'  > <span class="error"><?php echo $telErr;?>
		<img alt='slika7'  class='NOTOK' id='slika3' style='visibility: <?php if($telErr=="Morate unijeti telefon" || $telErr=="Nije validan format telefona" ||  $telErr=="Validan broj") echo "visible"; else echo "hidden"; ?>'
		src= <?php if($telErr=="Morate unijeti telefon" || $telErr=="Nije validan format telefona")echo "https://zamger.etf.unsa.ba/images/16x16/brisanje.png";  else if( $telErr=="Validan broj") echo "https://zamger.etf.unsa.ba/images/16x16/zad_ok.png"; ?>
		class=<?php if($telErr=="Morate unijeti telefon" || $telErr=="Nije validan format telefona")echo "NOTOK";  else if( $telErr=="Validan broj") echo "OK"; ?>
		></span><br>
			
			
		<label>Godište </label><br>
		<input type="number" name="num" min="1910" max="1997" id ="godiste" style= 'backgroundColor:<?php if( $godErr=="Godiste nije u validnom opsegu" ) echo "#FF8080"; else echo "80FF80"; ?>'  > <span class="error"><?php echo $godErr;?>
		<img alt='slika8'  class='NOTOK' id='slika4' style='visibility: <?php if( $godErr=="Godiste nije u validnom opsegu" ||  $godErr=="Validno godiste" ) echo "visible"; else echo "hidden"; ?>'
		src= <?php if( $godErr=="Godiste nije u validnom opsegu")echo "https://zamger.etf.unsa.ba/images/16x16/brisanje.png";  else if( $godErr=="Validno godiste") echo "https://zamger.etf.unsa.ba/images/16x16/zad_ok.png"; ?>
		class=<?php if($godErr=="Godiste nije u validnom opsegu")echo "NOTOK";  else if( $godErr=="Validno godiste" ) echo "OK"; ?>
		></span><br><br>

		
		<label title="država" >Država</label><br>
		<input type="text" value="" title="Unesite državu" id ="drzava" name="drzava" ><img alt="slika9" src="https://zamger.etf.unsa.ba/images/16x16/zad_ok.png" class="NOTOK" id="slika5"><label title="drzava" class="not" id="upozorenje5" >Unesite validnu državu</label><br>
		<label title="valuta"  >Valuta</label><br>
		<input type="text" value="" title="Unesite valutu" id ="valuta" name="valuta" ><img alt="slika10" src="https://zamger.etf.unsa.ba/images/16x16/zad_ok.png" class="NOTOK" id="slika6"><label title="tri slova" class="not" id="upozorenje6" >Unesite odgovarajuću valutu za državu</label><br>
		<label title="Morate unijeti validno ime">Poruka </label><br>
		<textarea title="Morate unijeti validno ime" id ="poruka" name="poruka" value="" ></textarea><br><br>

		&nbsp;&nbsp;<input type="submit" value="Pošalji poruku" id ="dugme"><br><br>
		<label >Search Google:</label>
  <input type="search" name="googlesearch" id ="pretrazi">


</form>




	<img src="Dibi3.jpg" alt="reklama3" title="reklama3"  />
	<img src="Dibi4.jpg" alt="reklama4" title="reklama4"  />
</div>


	<p >
	
	<?php include 'kontakt2.php';?>

	<footer id="Copy"></footer>
    Copyright &copy; Ediba Žugor 2015.
</div>		
	
</body>