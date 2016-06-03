<?php
	function busqueda($consulta){
		echo $consulta;
		include_once('conexion.php');
		$enlace = conect();
		$res = mysqli_query($enlace,$consulta);
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