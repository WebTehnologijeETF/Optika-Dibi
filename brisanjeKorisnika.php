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

USPJEŠNO STE SE LOGOVALI KAO ADMINISTRATOR STRANICE
<br>
	<?php session_start();
if (isset($_SESSION['username']) ){
$validnost=true;
		 $username = $_SESSION['username'];
		
		 ?>
		 
		 Logirani ste kao : <h3><?php echo $username?></h3><br>
		 <a href ="logOut.php">logOut</a>
		 <a href ="Admin.php">Admin panel </a>
<?php }?>
<br><br><br>
Izaberite od ponudenog:
<br>


<ul id="sddm">
     <li><a 
        onmouseover="mopen('m3')" 
        onmouseout="mclosetime()"
		onclick="Load('dodavanjeNovosti.php');">Novosti</a>
        <div id="m3" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a  onclick="Load('promjenaNovosti.php');">Promjena</a>
        <a  onclick="Load('BrisanjeNovosti.php');">Brisanje</a>
        <a  onclick="Load('dodavanjeNovosti.php');">Dodavanje</a>
        </div>
    </li>
    <li><a onclick="Load('brisanjeKomentara.php');"
	 onmouseover="mopen('m4')" 
        onmouseout="mclosetime()">Komentari</a>
	       <div id="m4" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a  onclick="Load('brisanjeKomentara.php');">Brisanje</a>
        </div>
	</li>
	<li><a onclick="Load('dodavanjeKorisnika.php');"
	 onmouseover="mopen('m5')" 
        onmouseout="mclosetime()">Korisnici</a>
	       <div id="m5" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a  onclick="Load('promjenaKorisnika.php');">Promjena</a>
		  <a  onclick="Load('brisanjeKorisnika.php');">Brisanje</a>
        <a  onclick="Load('dodavanjeKorisnika.php');">Dodavanje</a>
        </div>
	</li>
   
</ul>
<?php


     $veza = new PDO("mysql:dbname=dibioptics;host=localhost;charset=utf8", "ezugor", "password");
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select Username, Password, Email from Korisnik ");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
   ?>
	<br><br><br>

<form   method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" > 
	<?php $brojac=0;?>
	
	 <table>
	 <tr><th>Username:</th><th>Password:</th><th>Email:</th><th>Dugme</th> </tr>
 <?php foreach ($rezultat as $Korisnik) {
	 $brojac++;
	 ?>	
	<tr>
	
	 <td>	<input type="text"   id ="Username" name="Username"  value="<?php echo $Korisnik["Username"];?>" disabled=true >
	 </td>
	 
	 <td><input type="text"   id ="Password" name="Password"  value="<?php echo $Korisnik["Password"];?>" disabled=true >
	 </td>
	 <td><input type="text"   id ="Email" name="Email"  value="<?php echo $Korisnik["Email"];?>" disabled=true >
	 </td>
	 	<td>	&nbsp;&nbsp;<input class="my-stylish-button" type="submit"name="obrisi" id ="ObrisiDugme" onclick="value='<?php echo  $Korisnik["Username"];?>'"></td>
	 </tr>
	 <?php }?>
	 </table>
			     <br><br>
				 
</form>




	 <?php
	 

	 
	 	$brisanjeID=$NekaNovina="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brisanjeID=$_POST["obrisi"];
	if ($brojac==1){echo "greska ";}
	else {
	$rezultat = $veza->prepare("delete from Korisnik where Username =?");
	$rezultat->execute(array($brisanjeID));
     if ( !$rezultat) {
          $greska = $kom->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
	}}
	
}

?>

</div></div>

<footer id="Copy">
    Copyright &copy; Ediba Žugor 2015.
</footer>

</body>
	
 