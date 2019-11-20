<?php 

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

