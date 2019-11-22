<?php 


$tabla = $_GET['resource_type'];
$id = $_GET['resource_id'];


$query = "DELETE FROM " . $tabla . " WHERE id_" . $tabla . " = " . $id;


if ($link->query($query) === TRUE) 
{
	echo json_encode([ "data" => "ok"]);
} 
else 
{
	echo json_encode([ "data" => "error"]);
}