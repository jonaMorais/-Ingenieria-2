<?php
	
	$idpubli=$_GET['idpubli'];
	include_once('conexion.php');
	$link = conect();
	$sql = "SELECT * FROM publicacion WHERE idPublicacion='$idpubli'";

	$result = mysqli_query($link,$sql);
	$numRow = mysqli_num_rows($result);
	if($numRow > 0){
		while ($row = mysqli_fetch_assoc($result)) {
			$fila[] = $row;
		}
	}



?>