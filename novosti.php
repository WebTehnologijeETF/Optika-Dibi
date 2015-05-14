
	<script src="ucitavanje.js"></script>
<div class="lijeviKontakt">
<div class="scroll2">
<?php

header('Content-type: text/html; charset=utf-8');
$fajl = scandir("novosti");

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
        if($sadrzaj[$j] == "--".PHP_EOL) {
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

	</div></div>