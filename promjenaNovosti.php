
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


     $veza = new PDO("mysql:dbname=optikadibi;host=127.12.90.2;charset=utf8", "ediba", "dibac.DiBi");
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select IDNovosti, Naslov, Tekst, UNIX_TIMESTAMP(Datum) vrijeme2, Autor, Detaljnije, Slika from novosti order by Datum desc");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }

	
   ?>
	<br><br><br>


	 <table>
	 
 <?php foreach ($rezultat as $Novosti) {?>	

	<tr> 
	 <td><form   method="post"  action="promjenaNovosti.php" > 
	 <table> <tr><th>ID:</th><th>Autor:</th><th>Naslov:</th><th>Datum objave:</th><th>Tekst:</th>
	 
	 <th>Detaljnije:</th><th>Slika:</th>
	 
	 <th>Dugme</th> <tr><td><input type="text"  title="prvi znak mora biti slovo"  name="idNovosti"  value="<?php echo $Novosti["IDNovosti"];?>" disabled=true > </td>
	 &nbsp;&nbsp;<td><input type="text"   name="autorNovosti"  value="<?php echo $Novosti["Autor"];?>"  ></td>
	 
	 
	&nbsp;&nbsp; <td><input type="text"  name="naslovNovosti"  value="<?php echo $Novosti["Naslov"];?>"  ></td>
	 
	&nbsp;&nbsp; <td><input type="text"   name="datumObjaveNovosti"  value="<?php echo date('d.m.Y. (h:i)', $Novosti['vrijeme2']);?>" disabled=true >
	 </td><td>
	 &nbsp;&nbsp;<input type="text"    name="tekstNovosti"  value="<?php echo $Novosti["Tekst"];?>"  ></td>
	<td><input type="text"   id ="detaljnije" name="detaljnije"  value="<?php echo $Novosti["Detaljnije"];?>"  >
	</td>
	<td><input type="text"   id ="slika" name="slika"  value="<?php echo $Novosti["Slika"];?>"  >
	</td>
		&nbsp;&nbsp;
	<td><input class="my-stylish-button"  name="promijena" onclick="value='<?php echo  $Novosti["IDNovosti"];?>'" type="submit">
	
	
	</td>
	
	
	
	
	</tr></table></form>	</td>
	</tr>		
 	 
	 <?php }?>

	 </table>
	
	<br><br>		 


	 <?php
	 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id=$_POST["promijena"];
	  $name=$_POST["autorNovosti"];
	  $naslov=$_POST["naslovNovosti"];
	  $tekst=$_POST["tekstNovosti"];
	 $detaljnije=$_POST["detaljnije"];
	  $slika=$_POST["slika"];
	  #izmjena, komentar :D
	  	$rezultat= $veza-> prepare( "UPDATE novosti SET Autor = ?, Naslov =?,Tekst=?, Detaljnije=?, Slika=? WHERE IDNovosti=?"); 
		$rezultat->execute(array($name,$naslov,$tekst,$detaljnije,$slika,$id));
		if (!$rezultat) {
          $greska = $kom->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
    
}

?>

</div></div>

<footer id="Copy">
    Copyright &copy; Ediba Žugor 2015.
</footer>

</body>
	
 