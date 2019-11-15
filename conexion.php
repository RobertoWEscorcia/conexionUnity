<?php 

$mysql_host = "127.0.0.1:3307";
$mysql_user = "root";
$mysql_password= "";
$mysql_database = "tabla";


$link = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_database);
if (!$link) 
{
    die('No pudo conectarse: ' . mysqli_error());
}



//$tabla = $_GET['resource_id'];
$tabla = "tabla1";
$query = 'select * from ' . $tabla;

$result = $link->query($query) or die ('Consulta fallida: ' . mysqli_error());
$data = array();
while($row = mysqli_fetch_assoc($result))
{
	$data = $row;
}

echo json_encode($data, JSON_PRETTY_PRINT);

mysqli_free_result($result);

mysqli_close($link);