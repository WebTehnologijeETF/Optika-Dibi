

 
  <style>
 table { border-collapse: collapse; }
 table, td, tr { border: 2px solid #6485E8; } 
 body { color: #848484; font-size: 20px; } 
 .table-header { color: #6485E8; }
 .my-stylish-button { background-color: #6485E8; color: white; border-radius: 15px; }
 .title { margin-top: 25px; margin-bottom: 25px; color: #6485E8; font-size: 25px; text-decoration: underline; }
 </style>
 
   <?php
// define variables and set to empty values
$name = $email = $telefon = $godiste= $comment= "";
 $nameErr= $emailErr =$telErr= $godErr="";
 
 

 $validnost=false;
 $cek1=false;
 $cek2=false;
 $cek3=false;
 $cek4=true;
 $ima=false;
 $valid1=true;
 $valid2=true;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Morate unijeti ime";
	$cek1=false;
  } else {
    $name = test_input($_POST["name"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
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
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  	$emailErr = "Nije validan email formata";
	$cek2=false;
}
	else {$emailErr="Validan email";
	$cek2=true;}
  }

  if (empty($_POST["tel"])) {
    $telefon = "Morate unijeti telefon";
	$cek3=false;
  } else {
    $telefon = test_input($_POST["tel"]);
	$cek3=false;
	
	if (!preg_match("/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})$/",$telefon)){
		$telErr= "Nije validan format telefona";
	}
		else {$telErr="Validan broj";
	$cek3=true;}
  }

  if (empty($_POST["poruka"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["poruka"]);
  }

  if (empty($_POST["godiste"])) {
    $godiste = "";
	$cek4=true;
  } else {
    $godiste = test_input($_POST["godiste"]);
	if ( (int)$godiste<1910 || (int)$godiste<1997 ){
		$godErr="Godiste nije u validnom opsegu";
		$cek4=false;
	}
	else {
		$godErr="Validno godiste";
		$cek4=true;
	}
  }
 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($cek1 && $cek2 && $cek3 && $cek4){
	$validnost=true;
	
}

?>









		




