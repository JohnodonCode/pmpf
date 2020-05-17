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
function source_code($site) {
	$lines = file($site);
	foreach ($lines as $line_num => $line) { 
	return htmlspecialchars($line);
	}
}
function ssl_check() {
	if ($_SERVER['HTTPS'] != "on") { 
		return "SSL is disabled.";
	} else{
		echo "SSL is enabled.";
	}
}
function memory_usage() {
	echo "Initial: ".memory_get_usage()." bytes <br />";
	for ($i = 0; $i < 100000; $i++) {
		$array []= md5($i);
	}
	for ($i = 0; $i < 100000; $i++) {
		unset($array[$i]);
	}
	echo "Final: ".memory_get_usage()." bytes <br />";
	echo "Peak: ".memory_get_peak_usage()." bytes <br />";
}
function discordOauth($client_id, $client_secret, $redirect_uri, $permissions) {
	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	ini_set('max_execution_time', 300); //300 seconds = 5 minutes. In case if your CURL is slow and is loading too much (Can be IPv6 problem)
	error_reporting(E_ALL);

	define('OAUTH2_CLIENT_ID', $client_id);
	define('OAUTH2_CLIENT_SECRET', $client_secret);

	$authorizeURL = 'https://discordapp.com/api/oauth2/authorize?client_id=656990364762243103&redirect_uri='.$redirect_uri.'&response_type=code&scope='.$permissions.'';
	$tokenURL = 'https://discordapp.com/api/oauth2/token';
	$apiURLBase = 'https://discordapp.com/api/users/@me';
	if(isset($_GET['action'])) {
	if($_GET['action'] == 'login') {

		$params = array(
		  'client_id' => OAUTH2_CLIENT_ID,
		  'redirect_uri' => $redirect_uri,
		  'response_type' => 'code',
		  'scope' => $permissions
		);
	  
		// Redirect the user to Discord's authorization page
		header('Location: https://discordapp.com/api/oauth2/authorize' . '?' . http_build_query($params));
		die();
	  }
	}
	  
	  
	  // When Discord redirects the user back here, there will be a "code" and "state" parameter in the query string
	  if(isset($_GET['code'])) {
	  
		// Exchange the auth code for a token
		$token = apiRequest($tokenURL, array(
		  "grant_type" => "authorization_code",
		  'client_id' => OAUTH2_CLIENT_ID,
		  'client_secret' => OAUTH2_CLIENT_SECRET,
		  'redirect_uri' => $redirect_uri,
		  'code' => get('code')
		));
	  
	  
		$logout_token = $token->access_token;
		$_SESSION['access_token'] = $token->access_token;
	  
	  
		header('Location: ' . $_SERVER['PHP_SELF']);
	  }
	  if (isset($_GET['error'])) {
		return "User denied the request.";
	  } else {
	  if(session('access_token')) {
		
		$user = apiRequest($apiURLBase);
	  
		return $user;
	  
	  }}
	  
}
function apiRequest($url, $post=FALSE, $headers=array()) {
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  
	$response = curl_exec($ch);
  
  
	if($post)
	  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
  
	$headers[] = 'Accept: application/json';
  
	if(session('access_token'))
	  $headers[] = 'Authorization: Bearer ' . session('access_token');
  
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  
	$response = curl_exec($ch);
	return json_decode($response);
  }
  
  function get($key, $default=NULL) {
	return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
  }
  
  function session($key, $default=NULL) {
	return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
  }
