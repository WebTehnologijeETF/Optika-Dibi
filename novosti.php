
	<script src="jsFiles/ucitavanje.js"></script>
<div class="naslovnica">




<?php
header('Content-type: text/html; charset=utf-8');

     $veza = new PDO("mysql:dbname=optikadibi;host=127.12.90.2;charset=utf8", "ediba", "dibac.DiBi");
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select IDNovosti, Naslov, Tekst, UNIX_TIMESTAMP(Datum) vrijeme2, Autor, Detaljnije, Slika from novosti order by Datum desc");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }

	 
  foreach ($rezultat as $Novosti) {
	  
   $kom = new PDO("mysql:dbname=optikadibi;host=127.12.90.2;charset=utf8", "ediba", "dibac.DiBi");
     $kom->exec("set names utf8");
     $rez = $kom->query("select IDKomentar, Autor, UNIX_TIMESTAMP(Datum_Vrijeme) vrijeme2, Email, Tekst, Novosti from komentar ");
     if (!$rez) {
          $greska = $kom->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	
   ?>
	 

	
	<?php echo "<br>"."<strong>"."Autor: "."</strong>".$Novosti["Autor"]."<br>"; ?>
	
	<?php echo "<strong>"."Datum objave:"."</strong>".date('d.m.Y. (h:i)', $Novosti['vrijeme2'])."<br>"; ?>
	
	
	<?php echo "<h3>" . ucfirst(strtolower( $Novosti['Naslov'])) . "</h3>";?>
	
	     <?php if($Novosti["Slika"] != NULL): ?>
	 
	 <?php echo " <img src=".$Novosti['Slika']." alt='Slika' class='naslovneSlike'>"; ?>
	 
	<?php echo "<h2 >"."<a href='" .$Novosti["Slika"] . "' title='slikica'>"." </a>"."</h2>"; ?>
	 	
    <?php endif; ?>
	
 	<?php echo " <p>". $Novosti['Tekst']."</p>"; ?>
<?php $ID="";
		$brojac=0;
		foreach ($rez as $Koment){
    
	if($Koment['Novosti']==$Novosti['IDNovosti']){
		$brojac=$brojac+1;
		
		}}
?>
	
	
	 <input type="hidden" name="stil" value='<?php echo $Novosti['Slika']; ?>'>
                 <?php if($Novosti['Detaljnije']!=NULL):
					$ID = "'" .str_replace( PHP_EOL, '<br/>', $Novosti["IDNovosti"] )."'";?>
					 <?php echo '<input class="detaljnije" value="Detaljnije" onclick="novosti('.$ID.'); return false;" type="button">'; 
            endif;
		

 ?> 
                 
                <?php  
					$ID = "'" .str_replace( PHP_EOL, '<br/>', $Novosti["IDNovosti"] )."'";
                ?>
				

	      <?php echo ' <input class="komentari" value="'.$brojac.'Komentara" onclick="komentari('.$ID.'); return false;" type="button">';?>
		  
		  <div id=<?php echo $Novosti["IDNovosti"]?>></div>
    <br><br>
	<?php
	 }
	?>

	
	
 
	</div>
	
