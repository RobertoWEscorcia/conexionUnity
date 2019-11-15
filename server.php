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

	require("conexion.php");
	
	//Se definen los recursos disponibles
	$allowed_resource_types = [
		'conexion', 
		'tabla2'
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
			//Muestra los datos solicitados desde la url
			
			break;
		//Agregar
		case 'POST':
			//Obtiene los datos json que vengan de la peticion
			$json = file_get_contents('php://input');
			//Agrega datos
			
			//Regresa el id del elemento guardado
			
			break;
		//Modificar
		case 'PUT':
			//Verifica que tenga el id para modificar
			if(!empty($resource_id))
			{
				//Obtiene los datos json de la peticion
				$json = file_get_contents('php://input');
				//Modifica los datos 
				
			}
			break;
		//Eliminar
		case 'DELETE':
			//verifica que tenga el id a eliminar
			if(!empty($resource_id))
			{
				//Eliminar datos
				
			}
			break;

	}
?>