
  <style>
 table { border-collapse: collapse; }
 table, td, tr { border: 2px solid #6485E8; } 
 body { color: #848484; font-size: 20px; } 
 .table-header { color: #6485E8; }
 .my-stylish-button { background-color: #6485E8; color: white; border-radius: 15px; }
 .title { margin-top: 25px; margin-bottom: 25px; color: #6485E8; font-size: 25px; text-decoration: underline; }
 </style>

<br><br>
<h4>Provjerite da li ste ispravno popunili kontakt formu:</h4>
<br> Da li ste sigurni da zelite poslati ove podatke?<br>

				
				<form  method="post" action='validirajMail.php'>

 <table id ="proslijedi" name= "proslijedi">
	 <tr>
	 <td class="table-header" >Ime</td> 
	 <td class="table-header" >Email</td>
	 <td class="table-header">Broj telefon</td>
	 <td class="table-header">Godiste</td>
	 <td class="table-header">Poruka</td>

	 </tr>
	 
	 <tr>

		 <td><?php echo $name ;?></td>
		 <td><?php echo $email;?></td>
		 <td><?php echo $telefon;?></td>
		 <td><?php echo $godiste;?></td>
		 <td><?php echo $comment;?></td></tr>
 <input type="hidden" name="siguran" value="da">
  <input type="hidden" name="name" value="<?php echo $name; ?>">
   <input type="hidden" name="email" value="<?php echo $email; ?>">
    <input type="hidden" name="telefon" value="<?php echo $telefon; ?>">
	 <input type="hidden" name="godiste" value="<?php echo $godiste ;?>">
	  <input type="hidden" name="comment" value="<?php echo $comment ;?>">
<tr><td colspan ="5"><input class="my-stylish-button" name="action" type="submit"  value="Siguran sam"></td>
		 </tr>
		 </table>
			 
</form>




