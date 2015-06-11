

<?php
function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: text/html');
    header('Access-Control-Allow-Origin: *');
}


	 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function rest_get($request, $data) { 

$name = $email = $telefon = $godiste= $comment=$pass=$pass2= "";
 $nameErr= $emailErr =$telErr= $godErr=$passErr=$passErr2="";
 
 

 $validnost="F";
 $cek1=false;
 $cek2=false;
 $cek3=false;
 $cek4=true;
 $ima=false;
 $valid1=true;
 $valid2=true;
 $valid_pass=true;

 $prikazi ='Potvrda_sigurnosti.php';
 


  if (empty($data["ime"])) {
    $nameErr = "Morate unijeti ime";
	$cek1=false;
  } else {
    $name = test_input($data["ime"]);
	if (trim($name) == '' ) $nameErr = "Morate unijeti ime";
	else	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
 	 $nameErr = "Samo znakovi i blanko znakovi su dozvoljeni";
	 $cek1=false;
	}
	else {$nameErr="Validno ime";
	$cek1=true;}
 }


  if (empty($data["email"])) {
    $emailErr = "Morate unijeti email";
	$cek2=false;
  } else {
    $email = test_input($data["email"]);
	if (trim($email) == '' ) $emailErr = "Morate unijeti email";
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  	$emailErr = "Nije validan email formata";
	$cek2=false;
}
	else {$emailErr="Validan email";
	$cek2=true;}
  }

  if (empty($data["telefon"])) {
    $telErr = "Morate unijeti telefon";
	$cek3=false;
  } else {
    $telefon = $data["telefon"];
		if (trim($telefon) == '' ) $telErr = "Morate unijeti telefon";
	
	else if (!preg_match("/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})$/",$telefon)){
		$telErr= "Nije validan format telefona";
		$cek3=false;
	}
		else {
			$telErr="Validan broj";
	$cek3=true;
	}
  }

  if (empty($data["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($data["comment"]);
  }

  if (empty($data["godiste"])) {
    $godiste = "";
	$cek4=true;
  } else {
    $godiste = $data["godiste"];
	if (!is_numeric($godiste))
	{
		$godErr="nije unijet broj";
		$cek4=false;
		
	}
	else if ( intval($godiste)<1910 || intval($godiste)>1997 ){
		$godErr="Godiste nije u validnom opsegu";
		$cek4=false;
	}
	else {
		$godErr="Validno godiste";
		$cek4=true;
	}
  }
  
    if (empty($data["pass"])) {
    $pass = "";
  } else {
    $pass = test_input($data["pass"]);
  }
  

  
    if (empty($data["pass2"])) {
    $pass2 = "";
	if ($pass==""){
		$valid_pass2=true;
	$passErr2="";
		
	}
	else {
		$valid_pass2=false;
		$passErr2="Ponovite password";
	
	}
  } else {
		$pass2 = test_input($data["pass2"]);
	if ( $pass2!=$pass ){
		$passErr2="Passwordi nisu identicni";
		$valid_pass2=false;
	}
	else {
		$passErr2="Identican password";
		$valid_pass2=true;
	}
  }


if ($cek1 && $cek2 && $cek3 && $cek4 && $valid_pass2 ){
	$validnost="T"; 
//	include("kontakt2.php");
}


	$arr = array( 'godErr' => $godErr, 'emailErr' => $emailErr, 'telErr' => $telErr, 'nameErr' => $nameErr, 'passErr' => $passErr, 'passErr2' => $passErr2, 'validnost' => $validnost);
echo json_encode($arr);
}


function rest_post($request, $data) { 


}
function rest_delete($request,$data) { 

}

function rest_put($request, $data) { 


}
function rest_error($request) { }

$method  = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];

switch($method) {
    case 'PUT':
        parse_str(file_get_contents('php://input'), $put_vars);
        zag(); $data = $put_vars; rest_put($request, $data); break;
    case 'POST':
        zag(); $data = $_POST; rest_post($request, $data); break;
    case 'GET':
        zag(); $data = $_GET; rest_get($request, $data); break;
    case 'DELETE':
        zag(); $data = $_REQUEST; rest_delete($request, $data); break;
    default:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        rest_error($request); break;
}
?>



