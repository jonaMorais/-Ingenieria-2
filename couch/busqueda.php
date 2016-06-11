<?php
	
	function busqueda($consulta){
		require_once('conexion.php');
		$enlace = conect();
		$res = mysqli_query($enlace,$consulta);
		mysqli_close($enlace);
		if(mysqli_num_rows($res) > 0){
			while ($fila = mysqli_fetch_assoc($res)) {
				$row[] = $fila;
			}
			return $row;
		}
		else{
			$row=[];
			return $row;
		}
	}
?>