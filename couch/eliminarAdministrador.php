<?php
	require_once('sesion_class.php');
	$sesion= new sesion;
	if($sesion->get()!=false){
		if($sesion->getRoll()!=1){
			?><script type="text/javascript">alert("Usted no es administrador.");</script><?php
			?><script type="text/javascript">window.location.replace("./index.php");</script><?php
		}
	}else{
			?><script type="text/javascript">alert("Acceso denegado.");</script><?php
			?><script type="text/javascript">window.location.replace("./index.php");</script><?php
	}
	if(isset($_POST['idusuario']) & !empty($_POST['idusuario'])){
		$idusuario=$_POST['idusuario'];
		require_once('conexion.php');
		$enlace=conect();
		$consulta="UPDATE `usuario` SET `admin`=NULL WHERE (idusuario=$idusuario)";
		$res=mysqli_query($enlace,$consulta);
		if($res){
			mysqli_close($enlace);
			?><script type="text/javascript">alert("El administrador fue eliminado.");</script><?php
			?><script type="text/javascript">window.location.replace("./listarAdministradores.php");</script><?php
		}else{
			mysqli_close($enlace);
			?><script type="text/javascript">alert("El administrador no pudo ser eliminado.");</script><?php
			?><script type="text/javascript">window.location.replace("./listarAdministradores.php");</script><?php
		}
	}else{
			?><script type="text/javascript">alert("No hay un administrador seleccionado a eliminar.");</script>
			<script type="text/javascript">window.location.replace("./listarAdministradores.php");</script><?php

	}
?>

	