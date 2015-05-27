	 <?php	 $kom = new PDO("mysql:dbname=dibioptics;host=localhost;charset=utf8", "ezugor", "password");
     $kom->exec("set names utf8");
     $rez = $kom->query("select IDKomentar, Autor, UNIX_TIMESTAMP(Datum_Vrijeme) vrijeme2, Email, Tekst, Novosti from Komentar where Novosti='$ID' order by Novosti asc");
     if (!$rez) {
          $greska = $kom->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }?>
	 
	 <?php

 foreach ($rez as $Koment) {?>
    
         <div class="novost">
            <div class="naslov">
                 <div>
                     <div class="datum"><?php 
                       
                     echo     date('d.m.Y. (h:i)', $Koment['vrijeme2']) ?>
					 <br>
                      </div>              
					 <?php if ($Koment["Email"]!=""){?>
						 <div class="autor">
							<a href="mailto:<?php echo $Koment["Email"]?>"><?php echo $Koment["Autor"]?> </a>
						</div>
					
				<?php echo $Koment["Email"] ?>
                  </div>
           			  
				<?php	  }
					  else {?>
						  
						  <div class="autor"><?php echo $Koment["Autor"] ?></div>
			</div><?php
					  }?>
	</div>
            <div class="tekst"><?php echo $Koment["Tekst"]?><br><br></div>
            <?php
	 }		?>	