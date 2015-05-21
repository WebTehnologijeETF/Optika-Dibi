<?php 
		
// define variables and set to empty values
$name = $email =$comment= "";
 $nameErr= $emailErr="";
 
 

 $validnost=false;
 $cek1=false;
 $cek2=false;


 $valid_pass=false;

 
 
	 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Morate unijeti ime";
	$cek1=false;
  } else {
    $name = test_input($_POST["name"]);
	if (trim($name) == '' ) $nameErr = "Morate unijeti ime";
	else	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
 	 $nameErr = "Samo znakovi i blanko znakovi su dozvoljeni";
	 $cek1=false;
	}
	else {$nameErr="Validno ime";
	$cek1=true;}
 }


  if (empty($_POST["email"])) {
    $emailErr = "Morate unijeti email";
	$cek2=false;
  } else {
    $email = test_input($_POST["email"]);
	if (trim($email) == '' ) $emailErr = "Morate unijeti email";
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  	$emailErr = "Nije validan email formata";
	$cek2=false;
}
	else {$emailErr="Validan email";
	$cek2=true;}
  }


  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
  
 
}


if ($cek1 && $cek2 ){
	$validnost=true; 
	
}?>
