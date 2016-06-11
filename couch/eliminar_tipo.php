<?php

	require_once('sesion_class.php');
	$sesion= new sesion;
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
	if(isset($_POST['Tipo']) and !empty($_POST['Tipo'])){
		$id=$_POST['Tipo'];
		include_once('conexion.php');
		$link=conect();
		$con="SELECT * FROM `publicacion` p INNER JOIN `tipo_hospedaje` th ON p.idTipo = th.idTipo WHERE th.idTipo='$id'";
		$res=mysqli_query($link,$con);
		if(mysqli_num_rows($res)>0){
			?><script type="text/javascript">alert("No se puede eliminar el tipo de couch deseado ya que esta siendo usado actualmente.");</script><?php
			?><script type="text/javascript">window.location.replace("./listarTipos.php");</script><?php
		}
		else{
			$con="DELETE FROM `tipo_hospedaje` WHERE idTipo='$id'";
			$res=mysqli_query($link,$con);
			if($res){
				mysqli_close($link);
				?><script type="text/javascript">alert("El tipo de couch fue eliminado.");</script><?php
				?><script type="text/javascript">window.location.replace("./listarTipos.php");</script><?php
			}
			else{
				mysqli_close($link);
				?><script type="text/javascript">alert("El tipo de couch no pudo ser eliminado.");</script><?php
				?><script type="text/javascript">window.location.replace("./listarTipos.php");</script><?php
			}
		}						
	}
	else{
		header("Location: listarTipos.php");
	}
?>



