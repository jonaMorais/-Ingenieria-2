<?php

	require_once('sesion_class.php');
	$sesion = new sesion;

	if( (isset($_POST['titulo'])) & (isset($_POST['descrip'])) & (isset($_POST['provincias'])) & (isset($_POST['localidades'])) & (isset($_POST['cantplazas'])) & (isset($_POST['tipo'])) ) {
		if( ($_POST['titulo'] != "") & ($_POST['descrip'] != "") & ($_POST['provincias'] != "") & ($_POST['localidades'] != "") & ($_POST['cantplazas'] != "") & ($_POST['tipo'] != "")) {
			$titulo = $_POST['titulo'];
			$descrip = $_POST['descrip'];
			$cantplazas = $_POST['cantplazas'];
			$foto = addslashes (file_get_contents($_FILES['foto']['tmp_name']));
			$fotoTipo = $_FILES['foto']['type'];
			$prov = $_POST['provincias'];
			$loc = $_POST['localidades'];
			$id = $_POST['publi'];
			$tipo = $_POST['tipo'];
			include_once('conexion.php');
			$link = conect();
			$sql = "UPDATE `publicacion` SET `titulo`='$titulo', `descripcion`='$descrip', `provincia`='$prov', `localidad`='$loc', `cantPlazas`='$cantplazas', `foto`='$foto', `tipoImagen`='$fotoTipo', `idTipo`='$tipo' WHERE `idPublicacion`='$id'";
			if(mysqli_query($link,$sql)){
				mysqli_close($link);
				?>
					<script language="javascript">
						alert('El Couch ha sido actualizado correctamente.');
						window.location.href="mis_publicaciones.php";
					</script>
				<?php
			}
			else{
				mysqli_close($link);
				?>
					<script language="javascript">
						alert('No ha podido actualizarse el couch correctamente.');
						window.location.href="mis_publicaciones.php";
					</script>
				<?php
			}
		}
	}
	else{
		header("Location: index.php");
	}

?>