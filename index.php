<?php
	//Open sans /betica no lite
	//Se definen los recursos disponibles
	$allowedResourceTypes = [
		'tabla', 
		'tabla2'
	];

	//Obtiene el tipo de recurso
	$resourceType = $_GET['resorce_type'];

	//Valida que el recurso sea valido
	if(!in_array($resorceType, $allowedResourceTypes)) {die;}


	header('Conyent-Type: application/json');

	$resourceId = array_key_exists('resource_id', $_GET) ? $_GET['resource_id'] : '';

	//Se procesa la respuesta
	switch(strtoupper($_SERVER['REQUEST_METHOD']))
	{
		case 'GET':
			break;
		case 'POST':
			$json = file_get_contents('php://input');
			$books[] = json_decode($json, true);

			echo array_keys( $books )[ count($books) -1];
			break;
		case 'PUT':
			if(!empty($resourceId) && array_key_exists($resourceId, $books))
			{
				$json = file_get_contents('php://input');
				$books[ $resourceId ] = json_decode($json, true);
			}
			break;
		case 'DELETE':
			if(!empty($resourceId) && array_key_exists($resourceId, $books))
			{
				unset($books[ $resourceId]);
			}
			break;

	}
?>