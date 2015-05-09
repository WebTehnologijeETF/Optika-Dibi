
	
<div class="lijeviKontakt">
<div class="scroll2">
<?php
/*
$d = new DateTime("05.06.2015. 12:10:20.\r\n");
$d1 = new DateTime("05.06.2015. 12:10:21.\r\n");
$dsad = new DateTime();
$dsad->setTimezone(new DateTimeZone("Europe/Sarajevo"));
if ($d < $d1) echo "Tacno"; else echo "Baha";
*/

$fajl = scandir("novosti");
 // Zato sto su na Windowsu uvijek prva dva fajla . i .. Nije najbolje rijesenje jer nece raditi na linux-u. Pretpostavljam da ce ovo zavisiti od toga koji je OS na serveru koji mi daje hosting
 //TODO: Dodati i za linux
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
	
	
	<?php if($imaDetaljnije == true): ?>
	<details >
                <summary>Detaljnije</summary>
					<?php echo " $detaljnije"; ?>
               
            </details>
	     <?php endif; ?>	
    
   
  </div>
  										

	
<?php	
	endfor;
?>

	</div></div>