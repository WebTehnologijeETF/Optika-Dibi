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
        $ID = $_POST['ID'];
        $ID = str_replace("'", "", $ID);
	 
	 	 $kom = new PDO("mysql:dbname=dibioptics;host=localhost;charset=utf8", "ezugor", "password");
     $kom->exec("set names utf8");
     $rez = $kom->query("select IDKomentar, Autor, UNIX_TIMESTAMP(Datum_Vrijeme) vrijeme2, Email, Tekst, Novosti from Komentar where Novosti='$ID' order by Novosti asc");
     if (!$rez) {
          $greska = $kom->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
		
		
		
    
    ?>

	

			
</div>

<br><br><br>

<?php 
		
// define variables and set to empty values
$name = $email =$comment= "";
 $nameErr= $emailErr="";
 
 

 $validnost=false;
 $cek1=true;
 $cek2=true;


 $valid_pass=false;

 
 
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
 
	$cek2=true;
  } else {
    $email = test_input($_POST["email"]);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  	$emailErr = "Nije validan email formata";
	$cek2=false;
}
	else {$emailErr="Validan email";
	$cek2=true;}
  }


  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
}
  

	 
if ($cek1 && $cek2 ){
	$validnost=true; 
//	   $rez = $kom->query("select IDKomentar, Autor, UNIX_TIMESTAMP(Datum_Vrijeme) vrijeme2, Email, Tekst, Novosti from Komentar where Novosti='$ID' order by Novosti asc");
	
	$rezultat= $kom-> query( "INSERT INTO Komentar (Autor, Email , Tekst,Novosti)
    VALUES ('$name', '$email', '$comment','$ID')"
	);
	     if (!$rezultat) {
          $greska = $kom->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 
}
}?>



<form   method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" > 
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

		<label title="Morate unijeti validno ime">Poruka </label><br>
		<textarea title="Morate unijeti validno ime" id ="poruka" value="<?php echo $comment;?>" name="comment" value="" ></textarea><br><br>
		
		<input   id ="ID" name="ID" value="<?php echo $ID;?>" type="hidden"> 
 	

		&nbsp;&nbsp;<input class="my-stylish-button" type="submit" value="Pošalji poruku" id ="dugme">
			     <input class="my-stylish-button" name="action" type="reset" value="Reset"><br><br>
				 
			

</form>

<?php

 foreach ($rez as $Koment) {
    
         echo '<div class="novost">'.
            '<div class="naslov">'.
                 '<div>'.
                     '<div class="datum">'.
                       
                          date('d.m.Y. (h:i)', $Koment['vrijeme2']) .'<br>'.
                      '</div>'.              
            ' <div class="autor">'. $Koment["Autor"] .'</div>'.'<br>'.
                  '</div>'.
                 $Koment["Email"].'<br>'.
            '</div>'.
            '<div class="tekst">'. $Koment["Tekst"].'<br>'.'</div>'.'</div>';
	 }		?>	



<p>

</div></div>

<footer id="Copy">
    Copyright &copy; Ediba Žugor 2015.
</footer>

</body>
	
 