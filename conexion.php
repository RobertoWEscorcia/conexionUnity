<?php 

$mysql_host = "127.0.0.1:3307";
$mysql_user = "root";
$mysql_password= "";
$mysql_database = "conexion_unity";


$link = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_database);
if (!$link) 
{
    die('No pudo conectarse: ' . mysqli_error());
}





