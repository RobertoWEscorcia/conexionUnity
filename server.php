<?php

	

	//Se especifica que serán datos json
	header('Conyent-Type: application/json');
	/*

	Autentificación


	if(
		!array_key_exists('HTTP_X_HASH', $_SERVER) ||
		!array_key_exists('HTTP_X_TIMESTAMP', $_SERVER) ||
		!array_key_exists('HTTP_X_UID', $_SERVER)
	)
	{
		header( 'Status-Code: 403');

		echo json_encode(
			[
				'error' => 'No autorizado',
			]
		);

		die;
	}

	list($hash, $uid, $timestamp) = [ $_SERVER['HTTP_X_HASH'], $_SERVER['HTTP_X_UID'], $_SERVER['HTTP_X_TIMESTAMP']];
	$secret = "Frase secreta";
	$new_hash = sha1($uid.$timestamp.$secret);

	if($new_hash !== $hash)
	{
		header('Status-Code : 403');

		echo json_encode(
			[
				'error' => 'No autorizado hash no valido',
			]
		);

		die;
	}
	*/


	
	//Se definen los recursos disponibles
	$allowed_resource_types = [
		'mantenimiento', 
		'maquinas',
		'personal',
		'usuarios',
		'actividades_mantenimiento',
		'actividades'
	];

	//Obtiene el tipo de recurso
	$resource_type = $_GET['resource_type'];

	//Valida que el recurso solicitado este permitido
	if(!in_array($resource_type, $allowed_resource_types)) 
	{
		header('Status-Code : 400');

		echo json_encode(
			[
				'error' => 'Recurso no valido',
			]
		);
		
		die;
	}
	
	

	//$resource_id = array_key_exists('resource_id', $_GET) ? $_GET['resource_id'] : '';

	//Se procesa la respuesta
	switch(strtoupper($_SERVER['REQUEST_METHOD']))
	{
		//Consultar
		case 'GET':
			echo "GET";
			//Muestra los datos solicitados desde la url
			require("conexion.php");
			require("get.php");
			require("cerrar.php");
			break;
		//Agregar
		case 'POST':
			//Obtiene los datos json que vengan de la peticion
			//Agrega datos
			require("conexion.php");
			require("post.php");
			require("cerrar.php");

			//Regresa el id del elemento guardado
			
			break;
		//Modificar
		case 'PUT':
			if(isset($_GET['resource_id']) && !empty($_GET['resource_id'])) { $resource_id = $_GET['resource_id']; }
			//Verifica que tenga el id para modificar
			if(!empty($resource_id))
			{
				//Obtiene los datos json de la peticion
				$json = file_get_contents('php://input');
				echo "put";
				//Modifica los datos 
				
			}
			break;
		//Eliminar
		case 'DELETE':
			if(isset($_GET['resource_id']) && !empty($_GET['resource_id'])) { $resource_id = $_GET['resource_id']; }
			//verifica que tenga el id a eliminar
			if(!empty($resource_id))
			{
				echo "DELETE";
				
			}
			break;

	}
?>