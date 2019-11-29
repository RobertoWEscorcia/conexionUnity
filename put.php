<?php 
$_PUT = file_get_contents('php://input');
$id = $_GET['resource_id'];
$tabla = $_GET['resource_type'];
$data = json_decode($_PUT);

if($data === NULL){
	echo "Error decodificando";
}
else
{
	
	$query = "UPDATE " . $resource_type . " SET " ;




	switch ($resource_type) {
		case 'actividades':
			$query = $query . "nombre =  '". $data->nombre . "', descripcion = '" . $data->descripcion ."'";
			break;
		case 'actividades_mantenimiento':
			$query = $query . "id_actividades = " . $data->id_actividades . ", id_mantenimiento = " . $data->id_mantenimiento .", realizado = " . $data->realizado;
			break;
		case 'mantenimiento':
			$query = $query . "tipo = '" . $data->tipo . "', observaciones = '" . $data->observaciones . "', id_maquina = " . $data->id_maquinas . ", id_personal = " . $data->id_personal . ", fecha_proximo = '" . $data->fecha_proximo ."', comentarios = '" . $data->comentarios . "', ayuda = '" . $data->ayuda . "'";
			break;
		case 'maquinas':
			$query = $query . "descripcion = '" . $data->descripcion . "', activo_fijo = '" . $data->activo_fijo . "', imagen = '" . $data->imagen . "'";
			break;
		case 'personal':
			$query = $query . "nombre = '" . $data->nombre . "', apellido_paterno = '" . $data->apellido_paterno . "', apellido_materno = '" . $data->apellido_materno . "'";
		case 'usuarios':
			$query = $query . "id_personal = " .  $data->id_personal .", password = '" . $data->password . "', permisos = " . $data->permisos ;
		default:
			$query = "select * from * where 2 = 1";
			break;
	}

	if($query != "")
	{
		$query = $query . " WHERE id_" . $tabla . " = " . $id;

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
	