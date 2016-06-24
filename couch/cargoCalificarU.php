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
	if(  (isset($_POST['idpublicacion'])) & (isset($_POST['usuarioSolicita'])) & (isset($_POST['puntuacion']))  ){
		
			$idusu=$sesion->getIdUsuario();
			?>
					<script type="text/javascript">alert("Se realizo la calificacion correctamente");</script>
					<script type="text/javascript">window.location.replace("./visualizarUsuariosCalificar.php");</script>
			<?php
			// CARGA EN LA BASE DE DATOS
			require_once('conexion.php');
			require_once('busqueda.php');
			$enlace=conect();
			$today=DATE('Y-m-d');
			$consulta="INSERT INTO `calificacion`(`puntuacion`, `comentario`, `idusuarioPublica`, `idPublicacion`, `idUsuarioSolicita`,`fechaCalificacion`) VALUES (".$_POST['puntuacion'].",'".$_POST['comentario']."',$idusu,0,".$_POST['usuarioSolicita'].",'$today')";
			$res=mysqli_query($enlace,$consulta);

			if($res){
				?>
					<script type="text/javascript">alert("Se realizo la calificacion correctamente");</script>
					<script type="text/javascript">window.location.replace("./visualizarUsuariosCalificar.php");</script>
				<?php

			}else{
				?>
					<script type="text/javascript">alert("No se pudo realizar la calificacion");</script>
					<script type="text/javascript">window.location.replace("./visualizarUsuariosCalificar.php");</script>
				<?php
			}
			mysqli_close($enlace);
			
	}else{
		?>
		<script type="text/javascript">alert("No hay datos para calificar");</script>
		<script type="text/javascript">window.location.replace("./visualizarUsuariosCalificar.php");</script>
	<?php
	}
?>
