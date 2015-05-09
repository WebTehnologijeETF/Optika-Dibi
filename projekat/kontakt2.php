<?php
echo "<h4>Provjerite da li ste ispravno popunili kontakt formu:</h4>";
echo "<br> Da li ste sigurni da zelite poslati ove podatke?<br>";
 echo '<table>';
	 echo '<tr>';
	 echo '<td class="table-header">Ime</td>'; 
	 echo '<td class="table-header">Email</td>';
	 echo '<td class="table-header">Broj telefon</td>';
	 echo '<td class="table-header">Godiste</td>';
	 echo '<td class="table-header">Poruka</td>';
	 echo '<td></td>'; 
	 echo '</tr>';

	 echo '<tr>'; 
		 echo '<td>' . $name . '</td>';
		 echo '<td>' . $email . '</td>';
		 echo '<td>' . $telefon . '</td>';
		 echo '<td>' . $godiste . '</td>';
		 echo '<td>' . $comment . '</td>';
		 echo '<td>' . '<form method="get">' . '<button class="my-stylish-button" type="submit" name="action" value="Siguran sam' . '0' . '">Siguran sam</button>' . '</form>'; '</td>';
		 echo '</tr>';
		 echo '</table>';

echo "<br><br>Ako ste pogresno popunili formu, mozete ispod prepraviti unesene podatke.<br>";


		 echo '<div class="title">' . 'Promjena' . '</div>';
		 echo '<form>' . 'Name: ' . '<input type="text" name="name" value="' . $name . '">' . '<br/>' . 'email: ' . '<input type="email" name="email" value="' . $email. '">' . '<br/>' . 'Broj telefona: ' . '<input type="text" name="tel" value="' . $telefon . '">' . '<br/>' . '<button class="my-stylish-button" name="action" type="submit" value="add">Slanje</button>'.'<button class="my-stylish-button" name="action" type="submit" value="add">Reset</button>'; '</form>'; 
		 
	


?>