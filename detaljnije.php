
	<div class="spesl">		
					 <?php
		
        $autor = $_GET['autor'];
        $detaljnije = $_GET['det'];
        $datum = $_GET['datum'];
        $slika = $_GET['slika'];
        $naslov = $_GET['naslov'];
        $tekst = $_GET['tekst'];
		
		
     echo '<div class="content-naslov">Novosti</div>';
    
         echo '<div class="novost">'.
            '<div class="naslov">'.'<br>'.
                 '<div>'.
                     '<div class="datum">'.
                       
                          "$datum".
                      '</div>'.              
            ' <div class="autor">'.$autor.'</div>'.
                  '</div>'.'<h3>'.
                $naslov.'</h3>'.
            '</div>'.
            '<div class="tekst">'.
                "<div ><img height='300' width='600' src='$slika'></img></div>"?>
            <?php echo $tekst.'</div>'.'<div class="tekst">'.$detaljnije.'</div>'.
            '<div class="border-bottom"></div>'.
       '</div>';
    ?>

	<a href ="Naslovnica.php">natrag</a>

			
</div>


 