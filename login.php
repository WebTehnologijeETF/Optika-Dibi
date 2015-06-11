
<script src="jsFiles/ucitavanje.js"></script>
<?php 
	 session_start();
	
if (isset($_SESSION['username']) && isset($_SESSION['privilegije'])){
	
		$privilegije =$_SESSION['privilegije'];
		 $username = $_SESSION['username'];
		 if ($privilegije==0){
		
		 ?>
		 
		 Logirani ste kao : <h3><?php echo $username?></h3><br>
		 <a href ="logOut.php">logOut</a>
		 <a href ="Admin.php">Admin panel </a>
		 
<?php 
}
else  if ($privilegije==1){ 
		 $username = $_SESSION['username'];
		 ?>
		 
		 Logirani ste kao : <h3><?php echo $username?></h3><br>
		 <a href ="logOut.php">logOut</a>
		 
<?php 
}}
else {?>
<div class="lijevo" >
<form>
 <label title="Unesite username" >Username: </label><br>                                                                  
		<input type="text"  title="Username" id ="login1" name="login1" value="" ><br>
		<label title="Unesite password" >Password: </label><br>                                                                  
		<input type="password"  title="Sifra" id ="login2" name="login2"value=""   ><br>
	<input class="my-stylish-button" type="button" value="Login" id ="login" onClick="logujKorisnika();return false;"><br>
	
</form>
<a href="generisanjeSifre.php">Zaboravili ste svoju sifru?</a>

</div>

<?php
}
?>
