
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  
	<script src="ucitavanje.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tutorijal 8, Uvod</title>
  </head>
  <body>
    
<h1>Vijesti</h1>

<?php

     $veza = new PDO("mysql:dbname=dibioptics;host=localhost;charset=utf8", "ezugor", "password");
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select IDNovosti, Naslov, Tekst, UNIX_TIMESTAMP(Datum) vrijeme2, Autor, Detaljnije, Slika from Novosti order by Datum desc");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }

	 
	 
	 	 $kom = new PDO("mysql:dbname=dibioptics;host=localhost;charset=utf8", "ezugor", "password");
     $kom->exec("set names utf8");
     $rez = $kom->query("select IDKomentar, Autor, UNIX_TIMESTAMP(Datum_Vrijeme) vrijeme2, Email, Tekst, Novosti from Komentar order by Novosti asc");
     if (!$rez) {
          $greska = $kom->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	
	 ?>
	 
	 <div id="main"><?php

     foreach ($rezultat as $Novosti) {
   ?>
	 

	
	<?php echo "<br>"."<strong>"."Autor: "."</strong>".$Novosti["Autor"]."<br>"; ?>
	
	<?php echo "<strong>"."Datum objave:"."</strong>".date('d.m.Y. (h:i)', $Novosti['vrijeme2'])."<br>"; ?>
	
	
	<?php echo "<h3>" . ucfirst(strtolower( $Novosti['Naslov'])) . "</h3>";?>
	
	     <?php if($Novosti["Slika"] != NULL): ?>
	 
	 <?php echo " <img src=".$Novosti['Slika']." alt='Slika '>"; ?>
	 
	<?php echo "<h2 >"."<a href='" .$Novosti["Slika"] . "' title='slikica'>"." </a>"."</h2>"; ?>
	 	
    <?php endif; ?>
	
 	<?php echo " <p>". $Novosti['Tekst']."</p>"; ?>
<?php $ID="";?>
	
	
	 <input type="hidden" name="stil" value='<?php echo $Novosti['Slika']; ?>'>
                 <?php if($Novosti['Detaljnije']!=NULL):
                    $detaljnije = "'" .str_replace( PHP_EOL, '<br/>', $Novosti['Detaljnije'] )."'";
                    $datum = "'" .str_replace( PHP_EOL, '<br/>', date('d.m.Y. (h:i)', $Novosti['vrijeme2']) )."'";
                    $naslov ="'" . str_replace( PHP_EOL, '<br/>',  $Novosti['Naslov'] )."'";
                    $slika = "'" .str_replace( PHP_EOL, '<br/>', $Novosti['Slika'] )."'";
                    $tekst = "'" .str_replace( PHP_EOL, '<br/>',  $Novosti['Tekst'] )."'";
                    $autor = "'" .str_replace( PHP_EOL, '<br/>', $Novosti["Autor"] )."'";
					$ID = "'" .str_replace( PHP_EOL, '<br/>', $Novosti["IDNovosti"] )."'";
            endif;
		
		$brojac=0;
    
  foreach ($rez as $Koment) {
  
	if ($Novosti['IDNovosti']==$Koment['IDKomentar']){
		
		$brojac++;
	}    
 }
 ?> <input type="hidden" name="kk" value='<?php echo $Koment['kk']; ?>'>
                 
                <?php    $email = "'" .str_replace( PHP_EOL, '<br/>', $Koment['Email'] )."'";
                    $datum = "'" .str_replace( PHP_EOL, '<br/>', date('d.m.Y. (h:i)', $Koment['vrijeme2']) )."'";
                  
                    $tekst = "'" .str_replace( PHP_EOL, '<br/>',  $Koment['Tekst'] )."'";
                    $autor = "'" .str_replace( PHP_EOL, '<br/>', $Koment["Autor"] )."'";
					$ID = "'" .str_replace( PHP_EOL, '<br/>', $Novosti["IDNovosti"] )."'";
                ?>
				
				
	       <input class="komentari" value="<?php echo $brojac."Komentara "; ?>" onclick="komentari(<?php echo $ID; ?>); return false;" type="button">; 
    
	<?php
	 }
	?>


	
	
	</div>
	
	</body>
</html>