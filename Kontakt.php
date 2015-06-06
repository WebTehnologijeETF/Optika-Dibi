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
<?php 
	 session_start();
if (isset($_SESSION['username']) ){

		 $username = $_SESSION['username'];
		
		 ?>
		 
		 Logirani ste kao : <h3><?php echo $username?></h3><br>
		 <a href ="logOut.php">logOut</a>
		 <a href ="Admin.php">Admin panel </a>
		 
<?php 
}
else {?>
<div class="lijevo" >
<form   method="post" enctype="multipart/form-data" action="Admin.php" > 
 <label title="Unesite username" >Username: </label><br>                                                                  
		<input type="text"  title="Username" id ="login1" name="login1" value="" ><br>
		<label title="Unesite password" >Password: </label><br>                                                                  
		<input type="password"  title="Sifra" id ="login2" name="login2"value=""   ><br>
	<input class="my-stylish-button" type="submit" value="Login" id ="login"><br>
	<a href="generisanjeSifre.php">Zaboravili ste svoju sifru?</a>

</form>

</div>

<?php
}
?>

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

<?php 
		
// define variables and set to empty values
$name = $email = $telefon = $godiste= $comment=$pass=$pass2= "";
 $nameErr= $emailErr =$telErr= $godErr=$passErr=$passErr2="";
 
 

 $validnost=false;
 $cek1=false;
 $cek2=false;
 $cek3=false;
 $cek4=true;
 $ima=false;
 $valid1=true;
 $valid2=true;
 $valid_pass=false;
 $prikazi ='Potvrda_sigurnosti.php';
 
 
	 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Morate unijeti ime";
	$cek1=false;
  } else {
    $name = test_input($_POST["name"]);
	if (trim($name) == '' ) $nameErr = "Morate unijeti ime";
	else	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
 	 $nameErr = "Samo znakovi i blanko znakovi su dozvoljeni";
	 $cek1=false;
	}
	else {$nameErr="Validno ime";
	$cek1=true;}
 }


  if (empty($_POST["email"])) {
    $emailErr = "Morate unijeti email";
	$cek2=false;
  } else {
    $email = test_input($_POST["email"]);
	if (trim($email) == '' ) $emailErr = "Morate unijeti email";
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  	$emailErr = "Nije validan email formata";
	$cek2=false;
}
	else {$emailErr="Validan email";
	$cek2=true;}
  }

  if (empty($_POST["telefon"])) {
    $telErr = "Morate unijeti telefon";
	$cek3=false;
  } else {
    $telefon = $_POST["telefon"];
		if (trim($telefon) == '' ) $telErr = "Morate unijeti telefon";
	
	else if (!preg_match("/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})$/",$telefon)){
		$telErr= "Nije validan format telefona";
		$cek3=false;
	}
		else {
			$telErr="Validan broj";
	$cek3=true;
	}
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["godiste"])) {
    $godiste = "";
	$cek4=true;
  } else {
    $godiste = $_POST["godiste"];
	if (!is_numeric($godiste))
	{
		$godErr="nije unijet broj";
		$cek4=false;
		
	}
	else if ( intval($godiste)<1910 || intval($godiste)>1997 ){
		$godErr="Godiste nije u validnom opsegu";
		$cek4=false;
	}
	else {
		$godErr="Validno godiste";
		$cek4=true;
	}
  }
  
    if (empty($_POST["pass"])) {
    $pass = "";
  } else {
    $pass = test_input($_POST["pass"]);
  }
  

  
    if (empty($_POST["pass2"])) {
    $pass2 = "";
	if ($pass==""){
		$valid_pass2=true;
	$passErr2="";
		
	}
	else {
		$valid_pass2=false;
		$passErr2="Ponovite password";
	
	}
  } else {
		$pass2 = test_input($_POST["pass2"]);
	if ( $pass2!=$pass ){
		$passErr2="Passwordi nisu identicni";
		$valid_pass2=false;
	}
	else {
		$passErr2="Identican password";
		$valid_pass2=true;
	}
  }
}


if ($cek1 && $cek2 && $cek3 && $cek4 && $valid_pass2){
	$validnost=true; 
	?><div class="desniKontakt"><?php
	include("kontakt2.php");?>
	</div><?php
}?>
<br><br>


<div class="desniKontakt">
<br><br>
<div  > 


 <div>
<br>Ako ste pogresno popunili formu, mozete ispod prepraviti unesene podatke.<br>
</div>
			
			

<style>
.error {color: #5970B2;}
</style>
<form   method="post" enctype="multipart/form-data" action="Kontakt.php" > 
		<label title="prvi znak mora biti slovo" >Ime *</label><br>                                                                  
		<input type="text"  title="prvi znak mora biti slovo" id ="ime" name="name"  value="<?php echo $name;?>" style= 'backgroundColor:<?php if($nameErr=="Morate unijeti ime" || $nameErr=="Samo znakovi i blanko znakovi su dozvoljeni" ) echo "#FF8080"; else echo "80FF80"; ?>'  > <span class="error"><?php echo $nameErr;?>
		<img alt='slika5'  class='NOTOK' id='slika1' style='visibility: <?php if($nameErr=="Morate unijeti ime" || $nameErr=="Samo znakovi i blanko znakovi su dozvoljeni" ||  $nameErr=="Validno ime") echo "visible"; else echo "hidden"; ?>'
		src= <?php if($nameErr=="Morate unijeti ime" || $nameErr=="Samo znakovi i blanko znakovi su dozvoljeni")echo "https://zamger.etf.unsa.ba/images/16x16/brisanje.png";  else if( $nameErr=="Validno ime") echo "https://zamger.etf.unsa.ba/images/16x16/zad_ok.png"; ?>
		class=<?php if($nameErr=="Morate unijeti ime" || $nameErr=="Samo znakovi i blanko znakovi su dozvoljeni")echo "NOTOK";  else if( $nameErr=="Validno ime") echo "OK"; ?>
		></span><br>
		
		
		<label title="unesite validan email" >E-mail *</label><br>
		<input type="email"  title="unesite validan email" id ="email" name="email" value="<?php echo $email;?>" style= 'backgroundColor:<?php if($emailErr=="Morate unijeti email" || $emailErr=="Nije validan email formata" ) echo "#FF8080"; else echo "80FF80"; ?>'  > <span class="error"><?php echo $emailErr;?>
		<img alt='slika6'  class='NOTOK' id='slika2' style='visibility: <?php if($emailErr=="Morate unijeti email" || $emailErr=="Nije validan email formata" ||  $emailErr=="Validan email") echo "visible"; else echo "hidden"; ?>'
		src= <?php if($emailErr=="Morate unijeti email" || $emailErr=="Nije validan email formata")echo "https://zamger.etf.unsa.ba/images/16x16/brisanje.png";  else if( $emailErr=="Validan email") echo "https://zamger.etf.unsa.ba/images/16x16/zad_ok.png"; ?>
		class=<?php if($emailErr=="Morate unijeti email" || $emailErr=="Nije validan email formata")echo "NOTOK";  else if( $emailErr=="Validan email") echo "OK"; ?>
		></span><br>
		
	
		<label title="Telefon mora biti u obliku xxx-xxx">Telefon *</label><br>
		<input type="text"  title="Telefon mora biti u obliku xxx-xxx" id ="telefon" name="telefon" value="<?php echo $telefon;?>" style= 'backgroundColor:<?php if($telErr=="Morate unijeti telefon" || $telErr=="Nije validan format telefona" ) echo "#FF8080"; else echo "80FF80"; ?>'  > <span class="error"><?php echo $telErr;?>
		<img alt='slika7'  class='NOTOK' id='slika3' style='visibility: <?php if($telErr=="Morate unijeti telefon" || $telErr=="Nije validan format telefona" ||  $telErr=="Validan broj") echo "visible"; else echo "hidden"; ?>'
		src= <?php if($telErr=="Morate unijeti telefon" || $telErr=="Nije validan format telefona")echo "https://zamger.etf.unsa.ba/images/16x16/brisanje.png";  else if( $telErr=="Validan broj") echo "https://zamger.etf.unsa.ba/images/16x16/zad_ok.png"; ?>
		class=<?php if($telErr=="Morate unijeti telefon" || $telErr=="Nije validan format telefona")echo "NOTOK";  else if( $telErr=="Validan broj") echo "OK"; ?>
		></span><br>
			
			
		<label>Godište </label><br>
		<input type="number" name="godiste" min="1910" max="1997" id ="godiste" value="<?php echo $godiste;?>" style= 'backgroundColor:<?php if( $godErr=="Godiste nije u validnom opsegu" || $godErr=="nije unijet broj") echo "#FF8080"; else echo "80FF80"; ?>'  > <span class="error"><?php echo $godErr;?>
		<img alt='slika8'  class='NOTOK' id='slika4' style='visibility: <?php if( $godErr=="Godiste nije u validnom opsegu" ||  $godErr=="Validno godiste" || $godErr=="nije unijet broj") echo "visible"; else echo "hidden"; ?>'
		src= <?php if( $godErr=="Godiste nije u validnom opsegu" ||$godErr=="nije unijet broj")echo "https://zamger.etf.unsa.ba/images/16x16/brisanje.png";  else if( $godErr=="Validno godiste") echo "https://zamger.etf.unsa.ba/images/16x16/zad_ok.png"; ?>
		class=<?php if($godErr=="Godiste nije u validnom opsegu"|| $godErr=="nije unijet broj")echo "NOTOK";  else if( $godErr=="Validno godiste" ) echo "OK"; ?>
		></span><br><br>
			<label>Password: </label><br>
		<input type="text" name="pass"  id ="pass" > <br><br>
		
		
		<label>Ponovi password: </label><br>
		<input type="text" name="pass2"  id ="pass2" style= 'backgroundColor:<?php if( $passErr2=="Ponovite password" || $passErr2=="Passwordi nisu identicni" ) echo "#FF8080"; else echo "80FF80"; ?>'  > <span class="error"><?php echo $passErr2;?>
		<img alt='slika9'  class='NOTOK' id='slika5' style='visibility: <?php if( $passErr2=="Ponovite password" ||  $passErr2=="Passwordi nisu identicni" || $passErr2=="Identican password" ) echo "visible"; else echo "hidden"; ?>'
		src= <?php if( $passErr2=="Ponovite password" ||  $passErr2=="Passwordi nisu identicni")echo "https://zamger.etf.unsa.ba/images/16x16/brisanje.png";  else if( $passErr2=="Identican password") echo "https://zamger.etf.unsa.ba/images/16x16/zad_ok.png"; ?>
		class=<?php if($passErr2=="Ponovite password" ||  $passErr2=="Passwordi nisu identicni")echo "NOTOK";  else if( $passErr2=="Identican password" ) echo "OK"; ?>
		></span><br><br>
		
		

		
		<label title="država" >Država</label><br>
		<input type="text" value="" title="Unesite državu" id ="drzava" name="drzava" ><img alt="slika9" src="https://zamger.etf.unsa.ba/images/16x16/zad_ok.png" class="NOTOK" id="slika5"><label title="drzava" class="not" id="upozorenje5" >Unesite validnu državu</label><br>
		<label title="valuta"  >Valuta</label><br>
		<input type="text" value="" title="Unesite valutu" id ="valuta" name="valuta" ><img alt="slika10" src="https://zamger.etf.unsa.ba/images/16x16/zad_ok.png" class="NOTOK" id="slika6"><label title="tri slova" class="not" id="upozorenje6" >Unesite odgovarajuću valutu za državu</label><br>
		<label title="Morate unijeti validno ime">Poruka </label><br>
		<textarea title="Morate unijeti validno ime" id ="poruka" value="<?php echo $comment;?>" name="comment" value="" ></textarea><br><br>
		
	
 	

		&nbsp;&nbsp;<input class="my-stylish-button" type="submit" value="Pošalji poruku" id ="dugme">
			     <input class="my-stylish-button" name="action" type="reset" value="Reset"><br><br>
				 
			
		<label >Search Google:</label>
  <input type="search" name="googlesearch" id ="pretrazi">

</form>
			
			
</div>


</div>

	<img src="Dibi3.jpg" alt="reklama3" title="reklama3"  />
	<img src="Dibi4.jpg" alt="reklama4" title="reklama4"  />



	<p >
	
	

	<footer id="Copy">
    Copyright &copy; Ediba Žugor 2015.
	</footer>
</div>		
	
</body>