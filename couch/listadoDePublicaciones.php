<?php
	
	//---Primero realizo el include del archivo de conexion.php
	include_once('conexion.php');

	//---Guardo el valor que retorna la funcion en la variable $link
	$link = conect();

	//---Consulta sql con Limit, porque con LIMIT? porque en la pagina principal solo voy a mostrar algunos couchs, no todos.
	$sql = "SELECT * FROM publicacion LIMIT 5";
	
	//---Ejecuto la consulta sql en la base de datos y lo guardo en result
	$result = mysqli_query($link,$sql);

	//---La funcion mysqli_num_rows($result) me devuelve el numero de tuplas que devolvio el resultado de la consulta almacenado en $result y almaceno el valor en la variable $numRow
	$numRow = mysqli_num_rows($result);


	//---Si $numRow es mayor a cero es porque hya uno, dos o n valores devueltos en la consulta
	if($numRow > 0){

		//---Transformo el valor que devolvio la consulta en un arreglo asociativo y lo almaceno en $row
		while ($row = mysqli_fetch_assoc($result)) {
			$fila[] = $row;
		}
	}
	else{
		echo "No hay datos que mostrar";
	}

?>