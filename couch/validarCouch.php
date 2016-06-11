<?php

	require_once('sesion_class.php');
	$sesion = new sesion;
	if($sesion->get()==false){
		?>
			<script language="javascript">
				alert('Acceso denegado.');
				window.location.href="index.php";
			</script>
		<?php
	}
	if( (isset($_POST['titulo'])) & (isset($_POST['descrip'])) & (isset($_POST['provincias'])) & (isset($_POST['localidades'])) & (isset($_POST['cantplazas'])) & (isset($_POST['tipo'])) ) {	
		if( ($_POST['titulo'] != "") & ($_POST['descrip'] != "") & ($_POST['provincias'] != "") & ($_POST['localidades'] != "") & ($_POST['cantplazas'] != "") & ($_POST['tipo'] != "")) {
			$titulo = $_POST['titulo'];
			$descrip = $_POST['descrip'];
			$cantplazas = $_POST['cantplazas'];
			$foto = addslashes (file_get_contents($_FILES['foto']['tmp_name']));
			$fotoTipo = $_FILES['foto']['type'];
			$prov = $_POST['provincias'];
			$loc = $_POST['localidades'];
			$id = $sesion->getIdUsuario();
			$tipo = $_POST['tipo'];

			include_once('conexion.php');
			$link = conect();

			$sql = "INSERT INTO `publicacion`(`titulo`, `descripcion`, `provincia`, `localidad`, `cantPlazas`, `foto`, `tipoImagen`, `idUsuarioPublica`, `idTipo`) VALUES ('$titulo','$descrip','$prov','$loc','$cantplazas','$foto','$fotoTipo','$id','$tipo')";
			mysqli_close($link);
			if(mysqli_query($link,$sql)){
				?>
					<script language="javascript">
						alert('El Couch ha sido creado correctamente.');
						window.location.href="index.php";
					</script>
				<?php
			}
			else{
				?>
					<script language="javascript">
						alert('No se ha podido crearse el couch correctamente.');
						window.location.href="altaDeCouch.php";
					</script>
				<?php
			}
		}
	}
	else{
		?>
		<script language="javascript">
			window.location.href="index.php";
		</script>
		<?php
	}

?>