

<?php
function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: text/html');
    header('Access-Control-Allow-Origin: *');
}
function rest_get($request, $data) { 

$idvijesti = $data['ID'];
  $veza = new PDO("mysql:dbname=optikadibi;host=127.12.90.2;charset=utf8", "ediba", "dibac.DiBi");
     $veza->exec("set names utf8");
if ($idvijesti==1000){
$upit = $veza->prepare("SELECT * FROM novosti");
$upit->bindValue(1, $idvijesti, PDO::PARAM_INT);
$upit->execute();
print "{ \"novosti\": " . json_encode($upit->fetchAll()) . "}";}
else{
	
$upit = $veza->prepare("SELECT * FROM novosti WHERE IDNovosti=?");
$upit->bindValue(1, $idvijesti, PDO::PARAM_INT);
$upit->execute();
	print "{ \"novosti\": " . json_encode($upit->fetchAll()) . "}";	
	
}


}
function rest_post($request, $data) { 

	$tekst = $data['tekst'];
	$autor = $data['autor'];
	$detaljnije = $data['detaljnije'];
	$naslov = $data['naslov'];
	$slika = $data['slika'];
   $veza = new PDO("mysql:dbname=optikadibi;host=127.12.90.2;charset=utf8", "ediba", "dibac.DiBi");
     $veza->exec("set names utf8");

$rezultat= $veza-> prepare( "INSERT INTO novosti (Autor, Naslov , Tekst, Detaljnije, Slika)
    VALUES (?,?,?,?,?)"
	);
	$rezultat->execute(array($autor,$naslov,$tekst,$detaljnije,$slika));

	 $ok="ok";
	$arr = array('ok' => $ok);
echo json_encode($arr);
}
function rest_delete($request,$data) { 
$idkomentar = $data['ID'];
   $veza = new PDO("mysql:dbname=optikadibi;host=127.12.90.2;charset=utf8", "ediba", "dibac.DiBi");
     $veza->exec("set names utf8");
$upit2 = $veza->prepare("delete from komentar where Novosti =?");
$upit2->bindValue(1, $idkomentar, PDO::PARAM_INT);
$upit2->execute();

$upit = $veza->prepare("delete from novosti where IDNovosti =?");
$upit->bindValue(1, $idkomentar, PDO::PARAM_INT);
$upit->execute();
$ok="ok";
	$arr = array('ok' => $ok);
echo json_encode($arr);
}

function rest_put($request, $data) { 
	$tekst = $data['tekst'];
	$autor = $data['autor'];
	$detaljnije = $data['detaljnije'];
	$naslov = $data['naslov'];
	$slika = $data['slika'];
	$ID=$data['ID'];
  $veza = new PDO("mysql:dbname=optikadibi;host=127.12.90.2;charset=utf8", "ediba", "dibac.DiBi");
     $veza->exec("set names utf8");
	  	$rezultat= $veza-> prepare( "UPDATE novosti SET Autor = ?, Naslov =?,Tekst=?, Detaljnije=?, Slika=? WHERE IDNovosti=?"); 

		$rezultat->execute(array($autor,$naslov,$tekst,$detaljnije,$slika,$ID));
		if (!$rezultat) {
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



