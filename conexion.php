<?php 

$link = mysql_connect('mysql_host', 'mysql_user', 'mysql_password') or die ('No se pudo conectar: ' . mysql_error());

echo 'Connected successfully';

mysql_select_db("my_database") or die ('No se pudo conectar a la tabla');

$query = 'qwerty';
$result = mysql_query($query) or die ('Consulta fallida: ' . mysql_error());

while($line = mysql_fetch_array($result, MYSQL_ASSOC))
{
	foreach($line as $col_value)
	{
		$col_value;
	}
}

mysql_free_result($result);

mysqk_close($link);