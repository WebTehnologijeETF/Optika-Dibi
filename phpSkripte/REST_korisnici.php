

<?php
function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: text/html');
    header('Access-Control-Allow-Origin: *');
}
function rest_get($request, $data) { 

$idkorisnik = $data['username'];

  $veza = new PDO("mysql:dbname=optikadibi;host=127.12.90.2;charset=utf8", "ediba", "dibac.DiBi");
     $veza->exec("set names utf8");
if ($idkorisnik=="lap"){
$upit = $veza->prepare("SELECT * FROM korisnik");
$upit->bindValue(1, $idkorisnik, PDO::PARAM_INT);
$upit->execute();
print "{ \"korisnici\": " . json_encode($upit->fetchAll()) . "}";}
else{
	
$upit = $veza->prepare("SELECT * FROM korisnik WHERE Username=?");
$upit->bindValue(1, $idkorisnik, PDO::PARAM_INT);
$upit->execute();
	print "{ \"korisnici\": " . json_encode($upit->fetchAll()) . "}";	
	
}


}
function rest_post($request, $data) { 


	 $veza = new PDO("mysql:dbname=optikadibi;host=127.12.90.2;charset=utf8", "ediba", "dibac.DiBi");
     $veza->exec("set names utf8");

  $name=$data["username"];
	  $pass=$data["password"];
	  $email=$data["email"];
	  $privilegije=$data["privilegije"];
	  	$rezultat= $veza-> prepare( "INSERT INTO korisnik (Username, Password , Email,privilegije)

    VALUES (?,md5(?),?,?)"
	);
	$rezultat->execute(array($name,$pass,$email,$privilegije));
	     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }

	 $ok="ok";
	$arr = array('ok' => $ok);
echo json_encode($arr);

}
function rest_delete($request,$data) { 
$idkomentar = $data['username'];

   $veza = new PDO("mysql:dbname=optikadibi;host=127.12.90.2;charset=utf8", "ediba", "dibac.DiBi");
     $veza->exec("set names utf8");

$upit2 = $veza->prepare("delete from komentar where Autor =?");
$upit2->bindValue(1, $idkomentar, PDO::PARAM_INT);
$upit2->execute();

$upit = $veza->prepare("delete from korisnik where Username =?");
$upit->bindValue(1, $idkomentar, PDO::PARAM_INT);
$upit->execute();
 $ok="ok";
	$arr = array('ok' => $ok);
echo json_encode($arr);
}

function rest_put($request, $data) { 
	$password = $data['password'];
	$username = $data['username'];
	$email = $data['email'];

  $veza = new PDO("mysql:dbname=optikadibi;host=127.12.90.2;charset=utf8", "ediba", "dibac.DiBi");
     $veza->exec("set names utf8");

	$rezultat = $veza->prepare("UPDATE korisnik SET   Email = ? where Username =?");

	$rezultat->execute(array($email,$username));
     if ( !$rezultat) {
          $greska = $kom->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
 $ok="ok";
	$arr = array('ok' => $ok);
echo json_encode($arr);
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



