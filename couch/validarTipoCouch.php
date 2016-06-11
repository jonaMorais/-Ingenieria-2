<?php

	require_once('sesion_class.php');
	$sesion = new sesion;
	if($sesion->get()!=false){
		if($sesion->getRoll()!=1){
			?><script type="text/javascript">alert("Usted no es administrador.");</script><?php
			?><script type="text/javascript">window.location.replace("./index.php");</script><?php
		}
	}
	else{
		?><script type="text/javascript">alert("Acceso denegado.");</script><?php
		?><script type="text/javascript">window.location.replace("./index.php");</script><?php
	}
	if( isset($_POST['tipo'])){	
		if( $_POST['tipo'] != ""){
			$nombre = $_POST['tipo'];
			include_once('conexion.php');
			$link = conect();
			$sql = "INSERT INTO `tipo_hospedaje`(`nombre`) VALUES ('$nombre')";
			if(mysqli_query($link,$sql)){
				?>
					<script language="javascript">
						alert('El tipo de Couch ha sido creado correctamente.');
						window.location.href="listarTipos.php";
					</script>
				<?php
			}
			else{
				?>
					<script language="javascript">
						alert('Ya existe un tipo de couch con ese mismo nombre.');
						window.location.href="listarTipos.php";
					</script>
				<?php
			}
		}
	}
	else{
		header("Location: index.php");
	}
?>