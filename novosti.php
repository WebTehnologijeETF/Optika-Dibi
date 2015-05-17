
	<script src="ucitavanje.js"></script>
<div class="lijeviKontakt">
<div class="scroll2">



<?php
header('Content-type: text/html; charset=utf-8');

     $veza = new PDO("mysql:dbname=dibioptics;host=localhost;charset=utf8", "ezugor", "password");
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select IDNovosti, Naslov, Tekst, UNIX_TIMESTAMP(Datum) vrijeme2, Autor, Detaljnije, Slika from Novosti order by Datum desc");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }


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
	
	
	
	 <input type="hidden" name="stil" value='<?php echo $Novosti['Slika']; ?>'>
                 <?php if($Novosti['Detaljnije']!=NULL):
                    $detaljnije = "'" .str_replace( PHP_EOL, '<br/>', $Novosti['Detaljnije'] )."'";
                    $datum = "'" .str_replace( PHP_EOL, '<br/>', date('d.m.Y. (h:i)', $Novosti['vrijeme2']) )."'";
                    $naslov ="'" . str_replace( PHP_EOL, '<br/>',  $Novosti['Naslov'] )."'";
                    $slika = "'" .str_replace( PHP_EOL, '<br/>', $Novosti['Slika'] )."'";
                    $tekst = "'" .str_replace( PHP_EOL, '<br/>',  $Novosti['Tekst'] )."'";
                    $autor = "'" .str_replace( PHP_EOL, '<br/>', $Novosti["Autor"] )."'";
                ?>
				
	       <?php echo '<input class="detaljnije" value="Detaljnije" onclick="novosti('.$datum.','.$autor.','.$naslov.','.$slika.','.$tekst.','.$detaljnije.'); return false;" type="button">'; 
   
    ?> 

        <?php endif;?>
    

	
	<?php }
	
	 $kom = new PDO("mysql:dbname=dibioptics;host=localhost;charset=utf8", "ezugor", "password");
     $kom->exec("set names utf8");
     $rez = $kom->query("select IDKomentar, Autor, UNIX_TIMESTAMP(Datum_Vrijeme) vrijeme2, Email, Tekst, Novosti from Komentar order by Novosti asc");
     if (!$rez) {
          $greska = $kom->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	
	
	
     foreach ($rez as $Koment) {
   ?>
	 

	
	<?php echo "<br>"."<strong>"."Autor: "."</strong>".$Koment["Autor"]."<br>"; ?>
	
	<?php echo "<strong>"."Datum objave:"."</strong>".date('d.m.Y. (h:i)', $Koment['vrijeme2'])."<br>"; ?>
	
	
	<?php echo "<h3>" . ucfirst(strtolower( $Koment['Naslov'])) . "</h3>";?>
	
	     <?php if($Koment["Slika"] != NULL): ?>
	 
	 <?php echo " <img src=".$Koment['Slika']." alt='Slika '>"; ?>
	 
	<?php echo "<h2 >"."<a href='" .$Koment["Slika"] . "' title='slikica'>"." </a>"."</h2>"; ?>
	 	
    <?php endif; ?>
	
 	<?php echo " <p>". $Koment['Tekst']."</p>"; ?>
	    

	
	<?php }
	
	
	
	
	
	
	
	
?>
<?php
/*$fajl = scandir("novosti");

$novosti = array();
$datumi = array();


for ($i=2; $i<count($fajl); $i++) {
    $ucitaj = file("novosti/".$fajl[$i]);
    array_push($novosti, $fajl[$i]);
    array_push($datumi, $ucitaj[0]);
}

//Sortiranje

    for ($i=0; $i<count($novosti) - 1; $i++) {
        if (new DateTime($datumi[$i]) < new DateTime($datumi[$i+1])) {
            $v = $datumi[$i+1];
            $datumi[$i+1] = $datumi[$i];
            $datumi[$i] = $v;
            $v = $novosti[$i+1];
            $novosti[$i+1] = $novosti[$i];
            $novosti[$i] = $v;
            
        }
    }


for ($i=0; $i<count($novosti); $i++):
  $sadrzaj = file("novosti/".$novosti[$i]);


    $opis = "";
    $detaljnije = "";
    $imaDetaljnije = false;

    for ($j=4; $j<count($sadrzaj);$j++) {
        if($sadrzaj[$j] == "--\r\n") {
            $imaDetaljnije = true;
            continue;
        }
        if ($imaDetaljnije == false) {
            $opis .= " ".$sadrzaj[$j];
        }
        else {
            $detaljnije .= " ".$sadrzaj[$j];
        }
    }
	?>
	
	

  <div class="<?php if($sadrzaj[3] == "\r\n") echo "novostiTekstBezSlike"; else echo "novostiTekst"; ?>">
     <?php if($sadrzaj[3] != "\r\n"): ?>
	 
	 <?php echo " <img src='$sadrzaj[3]' alt='Slika '>"; ?>
	 
	<?php echo "<h2 ><a href='" . $sadrzaj[3] . "' title='slikica'> $sadrzaj[0]</a></h2>"; ?>
	 	
    <?php endif; ?>
	
	<?php echo "<br><strong>Autor: </strong>$sadrzaj[1]<br>"; ?>
	
	<?php echo "<strong> Datum objave: </strong>$sadrzaj[0]<br>"; ?>
	
	
	<?php echo "<h3>" . ucfirst(strtolower($sadrzaj[2])) . "</h3>";?>
	
 	<?php echo " <p>$opis</p>"; ?>
	
	
	
	
	 <input type="hidden" name="stil" value='<?php echo $slika; ?>'>
                 <?php if($imaDetaljnije): 
                    $detaljnije = "'" .str_replace( PHP_EOL, '<br/>', $detaljnije )."'";
                    $datum = "'" .str_replace( PHP_EOL, '<br/>', $sadrzaj[0] )."'";
                    $naslov ="'" . str_replace( PHP_EOL, '<br/>', $sadrzaj[2] )."'";
                    $slika = "'" .str_replace( PHP_EOL, '<br/>', $sadrzaj[3] )."'";
                    $tekst = "'" .str_replace( PHP_EOL, '<br/>', $opis )."'";
                    $autor = "'" .str_replace( PHP_EOL, '<br/>', $sadrzaj[1] )."'";
                ?>

         <?php echo '<input class="detaljnije" value="Detaljnije" onclick="novosti('.$datum.','.$autor.','.$naslov.','.$slika.','.$tekst.','.$detaljnije.'); return false;" type="button">'; 
   
    ?> 

        <?php endif;?>
    
   
  </div>
  										

	
<?php	
	endfor;
?>
*/?>

	</div></div>
	
