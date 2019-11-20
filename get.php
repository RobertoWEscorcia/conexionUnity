<?php 

$tabla = $_GET['resource_type'];
$query = 'select * from ' . $tabla;
if(isset($_GET['resource_id']) && !empty($_GET['resource_id']))
{
	$id = $_GET['resource_id'];
	$query = $query . " where id_" . $tabla . " = " . $id;
}

$result = $link->query($query) or die ('Consulta fallida: ' . mysqli_error());
$data = array();

while($row = mysqli_fetch_assoc($result))
{
	array_push($data, $row);
}


echo json_encode($data, JSON_PRETTY_PRINT);

mysqli_free_result($result);