<?php

require "Mail.php";
	$name=$_GET['Name'];
	echo $name;
   $veza = new PDO('mysql:host=localhost;dbname=dibioptics;charset=utf8', 'ezugor', 'password');
     $veza->exec("set names utf8");
     $admini = $veza->query("select Username, Password, Email from korisnik ");

     if (!$admini) { echo "greska!";}
	 
	 $length=8;
		$chars="";
     foreach ($admini as $admin) {
     	if($name==$admin['Username']){
			echo "postoji zaista ovaj korisnik";
     			$date=time();
     			$razlika=$date-$_GET['Vrijeme'];
     			if($razlika <= 86400){
						echo "u roku je generisao novu sifru";
	if($chars=="")
	$chars = "abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ0123456789"; 
	srand((double)microtime()*1000000); 
	$i = 0; 
	$pass = '' ; 
    while ($i < $length) { 
        $num = rand() % strlen($chars); 
        $tmp = substr($chars, $num, 1); 
        $pass = $pass . $tmp; 
        $i++; 
    } 
				
	   $veza =new PDO('mysql:host=localhost;dbname=dibioptics;charset=utf8', 'ezugor', 'password');
				     $veza->exec("set names utf8");
				   $rezultat = $veza->prepare("UPDATE korisnik SET  Password = md5(?) where Username =?");
					$rezultat->execute(array($pass,$name));
	$message = "Postovani $name,\r\n";
$message.="Vasa nova sifra je $pass"	;
 $message .= "Hvala,\r\n";
  $message .= "-- Dibi optika tim";						
										       
	ini_set("display_errors", 1);
	$kome = $admin['Email'];
	$from = "ezugor1@etf.unsa.ba"	;
	$naslov= "dibi optika";
    $mail = Mail::factory("smtp", 
        array(
            "host"     => "ssl://webmail.etf.unsa.ba",
            "username" => "ezugor1@etf.unsa.ba",
            "password" => "",
            "auth"     => true,
            "port"     => 465
        )
    );
    $headers = array("From" => $from, "Subject" => $naslov, "Content-Type"  => 'text/plain; charset=UTF-8');
    $body = $message;
    $mail->send($kome, $headers, $body);
	
    if (PEAR::isError($mail)) {
        echo "<h1>NE VALJA</h1>";
    }
	else echo "<h1>Poslano uspješno...</h1>";
	

    $message = "Sifra vam je poslana na email";
				}
				
				

else {	
			echo "na svu zalost isteklo vrijeme";
		$message = "Postovani $name,\r\n";
		$message .="Link za resetovanje passworda je istekao, molim Vas da ponovo generisete novu sifru"	;
		$message .= "Hvala,\r\n";
		$message .= "-- Dibi optika tim";	
			
	ini_set("display_errors", 1);
	$kome = $admin['Email'];
	$from = "ezugor1@etf.unsa.ba"	;
	$naslov= "dibi optika";
    $mail = Mail::factory("smtp", 
        array(
            "host"     => "ssl://webmail.etf.unsa.ba",
            "username" => "ezugor1@etf.unsa.ba",
            "password" => "",
            "auth"     => true,
            "port"     => 465
        )
    );
    $headers = array("From" => $from, "Subject" => $naslov, "Content-Type"  => 'text/plain; charset=UTF-8');
    $body = $message;
    $mail->send($kome, $headers, $body);
	
    if (PEAR::isError($mail)) {
        echo "<h1>NE VALJA</h1>";
    }
	else echo "<h1>Poslano uspješno...</h1>";

				}
		}		
	 }					
					
?>