

<?php


require "Mail.php";
function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: text/html');
    header('Access-Control-Allow-Origin: *');
}


function rest_get($request, $data) { 

}


function rest_post($request, $data) { 

 $godiste = $data["godiste"];
   $telefon = $data["telefon"];
   $email = $data["email"];
   $name = $data["ime"];
    $comment = $data["komentar"];
	
	$message = "Postovani $name,\r\n";
$message.="Vas telefon  je $telefon , godiste  je $godiste , a komentar je $comment"	;
 $message .= "\r\nHvala,\r\n";
  $message .= "-- Dibi optika tim";						
										       
	ini_set("display_errors", 1);
	$kome =$email;
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
    $headers = array("From" => $from, "Subject" => $naslov, "CC" => $cc,  "Content-Type"  => 'text/plain; charset=UTF-8');
    $body = $message;
    $mail->send($kome, $headers, $body);

	
	

$ok="ok";
	$arr = array( 'ok' => $ok);
echo json_encode($arr);

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



