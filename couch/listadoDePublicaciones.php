<?php
	include_once('conexion.php');
	$link = conect();
	$sql = "SELECT * FROM publicacion ORDER BY idPublicacion desc LIMIT 5";
	$result = mysqli_query($link,$sql);
	$numRow = mysqli_num_rows($result);
	if($numRow > 0){
		while ($row = mysqli_fetch_assoc($result)) {
			$fila[] = $row;
		}
	}
?>