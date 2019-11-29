<?php 

if(isset($_POST['data']) && !empty($_POST['data']))
	$json = $_POST['data'];
else
	$json = file_get_contents('php://input');

$data = json_decode($json);
echo $resource_type;
if($data === NULL){
	echo "Error decodificando";

}
else
{
	
	$query = "INSERT INTO " . $resource_type . " VALUES( null, " ;

	switch ($resource_type) {
		case 'actividades':
			$query = $query . "'". $data->nombre . "', '" . $data->descripcion ."')";
			break;
		case 'actividades_mantenimiento':
			$query = $query . $data->id_actividades . ", " . $data->id_mantenimiento .", " . $data->realizado . ")";
			break;
		case 'mantenimiento':
			$query = $query . "'" . $data->tipo . "', '" . $data->observaciones . "', " . $data->id_maquinas . ", " . $data->id_personal . ", null, '" . $data->fecha_proximo ."', '" . $data->comentarios . "', '" . $data->ayuda . "')";
			break;
		case 'maquinas':
			$query = $query . "'" . $data->descripcion . "', '" . $data->activo_fijo . "', '" . $data->imagen ."')";
			break;
		case 'personal':
			$query = $query . "'" . $data->nombre . "', '" . $data->apellido_paterno . "', '" . $data->apellido_materno . "')";
			break;
		case 'usuarios':
			$query = $query . $data->id_personal .", '" . $data->password . "', " . $data->permisos . ")";
		default:
			$query = "select * from * where 2 = 1";
			break;
	}

	if($query != "")
	{
		if ($link->query($query) === TRUE) 
		{
	    	echo json_encode([ "data" => "ok"]);
		} 
		else 
		{
	    	echo json_encode([ "data" => "error"]);
		}
	}
	
}
	