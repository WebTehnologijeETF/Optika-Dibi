

<?php
function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: text/html');
    header('Access-Control-Allow-Origin: *');
}
function rest_get($request, $data) { 

$idvijesti = $data['ID'];
  $veza = new PDO('mysql:host=localhost;dbname=dibioptics;charset=utf8', 'ezugor', 'password');
$veza->exec("set names utf8");
if ($idvijesti==1000){
$upit = $veza->prepare("SELECT * FROM komentar");
$upit->bindValue(1, $idvijesti, PDO::PARAM_INT);
$upit->execute();
print "{ \"komentari\": " . json_encode($upit->fetchAll()) . "}";}
else{
	
$upit = $veza->prepare("SELECT * FROM komentar WHERE Novosti=?");
$upit->bindValue(1, $idvijesti, PDO::PARAM_INT);
$upit->execute();
	print "{ \"komentari\": " . json_encode($upit->fetchAll()) . "}";	
	
}


}
function rest_post($request, $data) { 
  $veza = new PDO('mysql:host=localhost;dbname=dibioptics;charset=utf8', 'ezugor', 'password');
	$veza->exec("set names utf8");
	
session_start();
if (isset($_SESSION['username']) ){
	$username = $_SESSION['username'];
	$poruka = $data['tekst'];
	$email=$_SESSION['email'];
	$ID=$data['ID'];
	
	$upit2 = $veza->prepare("SELECT * FROM korisnik WHERE Username=?");
	$upit2->bindValue(1, $username, PDO::PARAM_INT);
	$upit2->execute();

	$rezultat= $veza-> query( "INSERT INTO komentar (Autor, Email , Tekst,Novosti)
    VALUES ('$username', '$email', '$poruka','$ID')"
	);
}
else {
	
	$username ="anonimac";
	$poruka = $data['tekst'];
	$email= "";
	$ID=$data['ID'];
	
	$rezultat= $veza-> query( "INSERT INTO komentar ( Tekst,Novosti)
    VALUES ('$poruka','$ID')"
	);
	

}

 $ok="ok";
	$arr = array('ok' => $ok);
echo json_encode($arr);
}
function rest_delete($request,$data) { 
$idkomentar = $data['ID'];

  $veza = new PDO('mysql:host=localhost;dbname=dibioptics;charset=utf8', 'ezugor', 'password');
$veza->exec("set names utf8");

$upit = $veza->prepare("delete from komentar where IDKomentar =?");
$upit->bindValue(1, $idkomentar, PDO::PARAM_INT);
$upit->execute();

 	 $ok="ok";
	$arr = array('ok' => $ok);
echo json_encode($arr);
}

function rest_put($request, $data) { }
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



