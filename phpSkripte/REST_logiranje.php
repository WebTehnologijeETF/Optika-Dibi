

<?php
function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: text/html');
    header('Access-Control-Allow-Origin: *');
}
function rest_get($request, $data) { 
$idkorisnik = $data['username'];
$password =md5($data['password']);
  $veza = new PDO('mysql:host=localhost;dbname=dibioptics;charset=utf8', 'ezugor', 'password');
$veza->exec("set names utf8");
	
	
	$rezultat= $veza-> prepare( "SELECT * FROM korisnik WHERE Username=?");
	$rezultat->execute(array($idkorisnik));
	     if (!$rezultat) {
          $greska = $veza->errorInfo();
       
     }

	 session_start();

$ok="nok";
foreach ($rezultat as $kor){
	if ($kor['Password']==$password){
		
		$ok="ok";
		$_SESSION['username'] = $idkorisnik;
		$_SESSION['privilegije']=$kor['privilegije'];
		$_SESSION['password'] = $password;
		$_SESSION['email'] = $kor['Email'];
}
}
$arr = array( 'ok' => $ok);
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



