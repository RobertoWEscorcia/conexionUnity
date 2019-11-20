<?php 

$json = $_POST['data'];


$data = json_decode($json);

if($data === NULL){
	echo "Error decodificando";
}
else
{
	
	$query = "INSERT INTO " . $resource_type . " VALUES( null, '" . $data->nombre . "', '" . $data->descripcion ."')";

	if ($link->query($query) === TRUE) {
	    echo json_encode([ "data" => "ok"]);
	} else {
	    echo json_encode([ "data" => "error"]);
	}
}
	