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
