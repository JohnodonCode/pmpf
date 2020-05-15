<?php
function sth($init) {

	$hours = floor($init / 3600);
	$minutes = floor(($init / 60) % 60);
	$seconds = $init % 60;


	return sprintf("%02d", $hours);

}
function sthm($init) {

	$hours = floor($init / 3600);
	$minutes = floor(($init / 60) % 60);
	$seconds = $init % 60;


	return sprintf("%02d:%02d", $hours, $minutes);

}
function sthms($init) {

	$hours = floor($init / 3600);
	$minutes = floor(($init / 60) % 60);
	$seconds = $init % 60;


	return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

}
function download($download)
{
	$file_url = $download;
	header('Content-Type: application/download-file-23498fj3ijf49k');
	header("Content-Transfer-Encoding: Binary");
	header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");
	ob_clean();
	flush();
	readfile($file_url);
}
function doublehash($text) {
	$text = md5($text);
	$text = sha1($text);
	return $text;
}
function tripplehash($text) {
	$text = md5($text);
	$text = sha1($text);
	$text = md5($text);
	return $text;
}
function getip() {
	$ip = $_SERVER['REMOTE_ADDR'];
	return $ip;
}
function getcloudflareip() {
	if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
			  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
			  $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
	}
	$client  = @$_SERVER['HTTP_CLIENT_IP'];
	$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	$remote  = $_SERVER['REMOTE_ADDR'];

	if(filter_var($client, FILTER_VALIDATE_IP)) { $ip = $client; }
	elseif(filter_var($forward, FILTER_VALIDATE_IP)) { $ip = $forward; }
	else { $ip = $remote; }

	return $ip;
}
function simpleHTML($title, $content) {
	$title = str_replace('"', "'", $title);
	$content = str_replace('"', "'", $content);
	echo "
	<!DOCTYPE html>
	<html lang='en' dir='ltr'>
		<head>
			<meta charset='utf-8'>
			<title>".$title."</title>
		</head>
		<body>
			".$content."
		</body>
	</html>

	";
}
function styledHTML($title, $content, $style) {
	$title = str_replace('"', "'", $title);
	$content = str_replace('"', "'", $content);
	$style = str_replace('"', "'", $style);
	echo "
	<!DOCTYPE html>
	<html lang='en' dir='ltr'>
		<head>
			<meta charset='utf-8'>
			<title>".$title."</title>
			<style>".$style."</style>
		</head>
		<body>
			".$content."
		</body>
	</html>

	";
}

// Credit to dzone.com for the below functions:
function detect_city($ip) {
        
        $default = 'UNKNOWN';

        if (!is_string($ip) || strlen($ip) < 1 || $ip == '127.0.0.1' || $ip == 'localhost')
            $ip = '8.8.8.8';

        $curlopt_useragent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6 (.NET CLR 3.5.30729)';
        
        $url = 'http://ipinfodb.com/ip_locator.php?ip=' . urlencode($ip);
        $ch = curl_init();
        
        $curl_opt = array(
            CURLOPT_FOLLOWLOCATION  => 1,
            CURLOPT_HEADER      => 0,
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_USERAGENT   => $curlopt_useragent,
            CURLOPT_URL       => $url,
            CURLOPT_TIMEOUT         => 1,
            CURLOPT_REFERER         => 'http://' . $_SERVER['HTTP_HOST'],
        );
        
        curl_setopt_array($ch, $curl_opt);
        
        $content = curl_exec($ch);
        
        if (!is_null($curl_info)) {
            $curl_info = curl_getinfo($ch);
        }
        
        curl_close($ch);
        
        if ( preg_match('{<li>City : ([^<]*)</li>}i', $content, $regs) )  {
            $city = $regs[1];
        }
        if ( preg_match('{<li>State/Province : ([^<]*)</li>}i', $content, $regs) )  {
            $state = $regs[1];
        }

        if( $city!='' && $state!='' ){
          $location = $city . ', ' . $state;
          return $location;
        }else{
          return $default; 
        }
        
    }
function source_code($site) {
	$lines = file($site);
	foreach ($lines as $line_num => $line) { 
	// loop thru each line and prepend line numbers
	return "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br>\n";
	}
}
function ssl_check() {
	if ($_SERVER['HTTPS'] != "on") { 
		return "SSL is disabled.";
	} else{
		echo "SSL is enabled.";
	}
}
function fb_fan_count($facebook_name){
    $data = json_decode(file_get_contents("https://graph.facebook.com/".$facebook_name));
    echo $data->likes;
}
function memory_usage() {
	echo "Initial: ".memory_get_usage()." bytes \n";
	for ($i = 0; $i < 100000; $i++) {
		$array []= md5($i);
	}
	// let's remove half of the array
	for ($i = 0; $i < 100000; $i++) {
		unset($array[$i]);
	}
	echo "Final: ".memory_get_usage()." bytes \n";
	echo "Peak: ".memory_get_peak_usage()." bytes \n";
}
function whois_query($domain) {
 
    // fix the domain name:
    $domain = strtolower(trim($domain));
    $domain = preg_replace('/^http:\/\//i', '', $domain);
    $domain = preg_replace('/^www\./i', '', $domain);
    $domain = explode('/', $domain);
    $domain = trim($domain[0]);
 
    // split the TLD from domain name
    $_domain = explode('.', $domain);
    $lst = count($_domain)-1;
    $ext = $_domain[$lst];
 
    // You find resources and lists 
    // like these on wikipedia: 
    //
    // http://de.wikipedia.org/wiki/Whois
    //
    $servers = array(
        "biz" => "whois.neulevel.biz",
        "com" => "whois.internic.net",
        "us" => "whois.nic.us",
        "coop" => "whois.nic.coop",
        "info" => "whois.nic.info",
        "name" => "whois.nic.name",
        "net" => "whois.internic.net",
        "gov" => "whois.nic.gov",
        "edu" => "whois.internic.net",
        "mil" => "rs.internic.net",
        "int" => "whois.iana.org",
        "ac" => "whois.nic.ac",
        "ae" => "whois.uaenic.ae",
        "at" => "whois.ripe.net",
        "au" => "whois.aunic.net",
        "be" => "whois.dns.be",
        "bg" => "whois.ripe.net",
        "br" => "whois.registro.br",
        "bz" => "whois.belizenic.bz",
        "ca" => "whois.cira.ca",
        "cc" => "whois.nic.cc",
        "ch" => "whois.nic.ch",
        "cl" => "whois.nic.cl",
        "cn" => "whois.cnnic.net.cn",
        "cz" => "whois.nic.cz",
        "de" => "whois.nic.de",
        "fr" => "whois.nic.fr",
        "hu" => "whois.nic.hu",
        "ie" => "whois.domainregistry.ie",
        "il" => "whois.isoc.org.il",
        "in" => "whois.ncst.ernet.in",
        "ir" => "whois.nic.ir",
        "mc" => "whois.ripe.net",
        "to" => "whois.tonic.to",
        "tv" => "whois.tv",
        "ru" => "whois.ripn.net",
        "org" => "whois.pir.org",
        "aero" => "whois.information.aero",
        "nl" => "whois.domain-registry.nl"
    );
 
    if (!isset($servers[$ext])){
        die('Error: No matching nic server found!');
    }
 
    $nic_server = $servers[$ext];
 
    $output = '';
 
    // connect to whois server:
    if ($conn = fsockopen ($nic_server, 43)) {
        fputs($conn, $domain."\r\n");
        while(!feof($conn)) {
            $output .= fgets($conn,128);
        }
        fclose($conn);
    }
    else { die('Error: Could not connect to ' . $nic_server . '!'); }
 
    return $output;
}
