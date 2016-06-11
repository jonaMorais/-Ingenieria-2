<?php
	
	require_once('conexion.php');
	$enlace=conect();
	require_once('busqueda.php');
	// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
	mysqli_set_charset($enlace,'utf8');
	$listadoSelects=array(
		"provincias"=>"lista_provincias",
		"localidades"=>"lista_localidades"
	);

	function validaSelect($selectDestino){
		// Se valida que el select enviado via GET exista
		global $listadoSelects;
		if(isset($listadoSelects[$selectDestino])) return true;
		else return false;
	}

	function validaOpcion($opcionSeleccionada){
		// Se valida que la opcion seleccionada por el usuario en el select tenga un valor numerico
		if(is_numeric($opcionSeleccionada)){
			return true;
		}
		else{
			return false;
		}
	}

	$selectDestino=$_GET["select"]; $opcionSeleccionada=$_GET["opcion"];

	if(validaSelect($selectDestino) && validaOpcion($opcionSeleccionada)){
		$tabla=$listadoSelects[$selectDestino];
		$con="SELECT id, localidad FROM $tabla WHERE relacion='$opcionSeleccionada'";
		$res=busqueda($con);
	
		// Comienzo a imprimir el select
		echo "<label for=localidad>*Localidad:</label>";
		echo "<select class=form-control name='".$selectDestino."' id='".$selectDestino."' onChange='cargaContenido(this.id)'>";
		echo "<option value='0'>---------</option>";
		if(!empty($res)){
			// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
			/*$registro[1]=htmlentities($registro[1]);*/
			// Imprimo las opciones del select
			foreach($res as $r){
				echo "<option value='".$r['id']."'>".$r['localidad']."</option>";
			}
		}			
		echo "</select>";
	}
?>