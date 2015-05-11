

<style>
.error {color: #FF0000;}
</style>



<div class="lijeviKontakt">
<br><br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  > 
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
		
	
		<label title="Telefon mora biti u obliku xxx-xxx">Telefon *</label><br>
		<input type="text"  title="Telefon mora biti u obliku xxx-xxx" id ="telefon" name="tel" value="<?php echo $telefon;?>" style= 'backgroundColor:<?php if($telErr=="Morate unijeti telefon" || $telErr=="Nije validan format telefona" ) echo "#FF8080"; else echo "80FF80"; ?>'  > <span class="error"><?php echo $telErr;?>
		<img alt='slika7'  class='NOTOK' id='slika3' style='visibility: <?php if($telErr=="Morate unijeti telefon" || $telErr=="Nije validan format telefona" ||  $telErr=="Validan broj") echo "visible"; else echo "hidden"; ?>'
		src= <?php if($telErr=="Morate unijeti telefon" || $telErr=="Nije validan format telefona")echo "https://zamger.etf.unsa.ba/images/16x16/brisanje.png";  else if( $telErr=="Validan broj") echo "https://zamger.etf.unsa.ba/images/16x16/zad_ok.png"; ?>
		class=<?php if($telErr=="Morate unijeti telefon" || $telErr=="Nije validan format telefona")echo "NOTOK";  else if( $telErr=="Validan broj") echo "OK"; ?>
		></span><br>
			
			
		<label>Godište </label><br>
		<input type="number" name="num" min="1910" max="1997" id ="godiste" value="<?php echo $godiste;?>" style= 'backgroundColor:<?php if( $godErr=="Godiste nije u validnom opsegu" || $godErr=="nije unijet broj") echo "#FF8080"; else echo "80FF80"; ?>'  > <span class="error"><?php echo $godErr;?>
		<img alt='slika8'  class='NOTOK' id='slika4' style='visibility: <?php if( $godErr=="Godiste nije u validnom opsegu" ||  $godErr=="Validno godiste" || $godErr=="nije unijet broj") echo "visible"; else echo "hidden"; ?>'
		src= <?php if( $godErr=="Godiste nije u validnom opsegu" ||$godErr=="nije unijet broj")echo "https://zamger.etf.unsa.ba/images/16x16/brisanje.png";  else if( $godErr=="Validno godiste") echo "https://zamger.etf.unsa.ba/images/16x16/zad_ok.png"; ?>
		class=<?php if($godErr=="Godiste nije u validnom opsegu"|| $godErr=="nije unijet broj")echo "NOTOK";  else if( $godErr=="Validno godiste" ) echo "OK"; ?>
		></span><br><br>
		
		
		<label>Password: </label><br>
		<input type="text" name="pass"  id ="pass" > <br><br>
		
		
		<label>Ponovi password: </label><br>
		<input type="text" name="pass2"  id ="pass2" style= 'backgroundColor:<?php if( $passErr2=="Ponovite password" || $passErr2=="Passwordi nisu identicni" ) echo "#FF8080"; else echo "80FF80"; ?>'  > <span class="error"><?php echo $passErr2;?>
		<img alt='slika9'  class='NOTOK' id='slika5' style='visibility: <?php if( $passErr2=="Ponovite password" ||  $passErr2=="Passwordi nisu identicni" || $passErr2=="Identican password" ) echo "visible"; else echo "hidden"; ?>'
		src= <?php if( $passErr2=="Ponovite password" ||  $passErr2=="Passwordi nisu identicni")echo "https://zamger.etf.unsa.ba/images/16x16/brisanje.png";  else if( $passErr2=="Identican password") echo "https://zamger.etf.unsa.ba/images/16x16/zad_ok.png"; ?>
		class=<?php if($passErr2=="Ponovite password" ||  $passErr2=="Passwordi nisu identicni")echo "NOTOK";  else if( $passErr2=="Identican password" ) echo "OK"; ?>
		></span><br><br>
		
		

		
		<label title="država" >Država</label><br>
		<input type="text" value="" title="Unesite državu" id ="drzava" name="drzava" ><img alt="slika9" src="https://zamger.etf.unsa.ba/images/16x16/zad_ok.png" class="NOTOK" id="slika5"><label title="drzava" class="not" id="upozorenje5" >Unesite validnu državu</label><br>
		<label title="valuta"  >Valuta</label><br>
		<input type="text" value="" title="Unesite valutu" id ="valuta" name="valuta" ><img alt="slika10" src="https://zamger.etf.unsa.ba/images/16x16/zad_ok.png" class="NOTOK" id="slika6"><label title="tri slova" class="not" id="upozorenje6" >Unesite odgovarajuću valutu za državu</label><br>
		<label title="Morate unijeti validno ime">Poruka </label><br>
		<textarea title="Morate unijeti validno ime" id ="poruka" value="<?php echo $comment;?>" name="poruka" value="" ></textarea><br><br>

		&nbsp;&nbsp;<input type="submit" value="Pošalji poruku" id ="dugme"><br><br>
		<label >Search Google:</label>
  <input type="search" name="googlesearch" id ="pretrazi">


</form>

</div>


