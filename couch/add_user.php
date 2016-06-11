<?php

	if(isset($_POST['mail']) and isset($_POST['nombre']) and isset($_POST['apellido']) and isset($_POST['pass']) and isset($_POST['fechaNacimiento']) and isset($_POST['telefono']) and isset($_POST['sexo'])){
		if(!empty($_POST['mail']) and !empty($_POST['nombre']) and !empty($_POST['apellido']) and !empty($_POST['pass']) and !empty($_POST['fechaNacimiento']) and !empty($_POST['telefono']) and !empty($_POST['sexo'])){
			$MAIL= $_POST['mail'];
			$NOM= $_POST['nombre'];
			$APE= $_POST['apellido'];
			$PAS= $_POST['pass'];
			$FEC= $_POST['fechaNacimiento'];
			$TEL= $_POST['telefono'];
			$SEXO= $_POST['sexo'];
		}
	}
	else{
		?><script type="text/javascript">window.location.replace("./registro.php");</script><?php
	}
	if(isset($_FILES['foto'])){
		if(!empty($_FILES['foto'])and $_FILES['foto']['tmp_name']!=""){
			$foto = addslashes (file_get_contents($_FILES['foto']['tmp_name']));
			$fotoTipo = $_FILES['foto']['type'];
			$sub="'$foto', '$fotoTipo')";
		}
		else{
			$sub="NULL, NULL)";
		}
	}
	require_once('conexion.php');
	$enlace=conect();
	$con="SELECT * FROM `usuario` WHERE email='$MAIL'";
	$cla=md5($PAS);
	$con2="INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `email`, `clave`, `fechapremium`, `admin`, `premium`, `fechanacimiento`, `telefono`, `sexo`, `foto`, `tipoImagen`) VALUES (NULL, '$NOM', '$APE', '$MAIL', '$cla', NULL, NULL, NULL, '$FEC', '$TEL', '$SEXO', ".$sub;
	$res=mysqli_query($enlace,$con);
	if(mysqli_num_rows($res)==0){
		$res=mysqli_query($enlace,$con2);
		mysqli_close($enlace);
		?><script type="text/javascript">alert("Usuario agregado.");</script>
		<script type="text/javascript">window.location.replace("./registro.php");</script>
		<?php
	}
	else{
		mysqli_close($enlace);
		?><script type="text/javascript">alert("Ya existe un usuario con ese E-mail.");</script><?php
		?><script type="text/javascript">window.location.replace("./registro.php");</script><?php
	}
?>