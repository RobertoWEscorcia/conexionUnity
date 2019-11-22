<?php 


//log consultas


$file = fopen("logs.txt", "a");
date_default_timezone_set('America/Mexico_City');
$fecha = time();
$fecha = date("Y-m-d H:i:s");

fwrite($file, "RUTA: ". $_SERVER["REQUEST_URI"] . " | METODO: ". $_SERVER['REQUEST_METHOD'] . " | IP: " . $_SERVER['REMOTE_ADDR'] . " | FECHA: " . $fecha .PHP_EOL);

fclose($file);


$matches = [];

if(preg_match('/\/([^\/]+)\/([^\/]+)\/([^\/]+)/', $_SERVER["REQUEST_URI"], $matches))
{
	$_GET['resource_type'] = $matches[2];
	$_GET['resource_id'] = $matches[3];
	error_log(print_r($matches, 1));
	require 'server.php';
} elseif (preg_match('/\/([^\/]+)\/([^\/]+)/', $_SERVER["REQUEST_URI"], $matches))
{
	$_GET['resource_type'] = $matches[2];	
	error_log(print_r($matches, 1));
	require 'server.php';	
} 
else
{
	echo "No matches";
	error_log('No matches');
	
	//http_response_code(404);
}

