<!DOCTYPE html>

<html>

	<?php
		require_once('sesion_class.php');
		$sesion= new sesion;
		if($sesion->get()==false){
			?><script type="text/javascript">alert("Acceso denegado.");</script><?php
			?><script type="text/javascript">window.location.replace("./index.php");</script><?php
		}
		//---Incluimos el head
		include_once('view/head.html');
	?>

	<body class="container">
		<?php
			//---Incluimos el header
			include_once('view/header.html');
			//---Incluimos el nav
			include_once('view/navBar/navBar.php');
		?>

		<main class="container">
			<?php
				$idUsuario=$sesion->getIdUsuario();
				require_once('busqueda.php');
				require_once('conexion.php');
				$enlace=conect();
				$consulta="	SELECT *
							FROM usuariosolicita
							WHERE(IdUsuario=$idUsuario)";
				$res=busqueda($consulta);
				if(!empty($res)){
					foreach($res as $resul){
					// titulo y descripcion
						$consultaNombre="SELECT titulo,descripcion FROM publicacion WHERE(idPublicacion=".$resul['idPublicacion'].") ";
						$res2=mysqli_query($enlace,$consultaNombre);
						$rows2=mysqli_fetch_array($res2);
			?>
			<div class="panel panel-default col-sm-8 col-sm-offset-2">
				<div class="panel-heading">
					<h2>Solicitudes realizadas</h2>							
				</div>
				<div class="panel-body">
				<table class="table table hover">
					<tr>
						<th>Foto</th>
						<th>Titulo publicacion</th>
						<th>Descripcion</th>
						<th>Estado</th>
						<th>Fecha de solicitud<th>
					</tr>
					<tr>
						<td><?php echo "<img src=mostrarImagen.php?id_Publi=".$resul['idPublicacion']." id='imagen' class='img-rounded'>"; ?></td>
						<td><a href=visualizarpublicacion.php?idpubli=<?php echo $resul['idPublicacion']?>><?php echo $rows2[0] ?></a></td>
						<td><?php echo $rows2[1]; ?></td>
						<td><?php echo $resul['estado']; ?></td>
						<td><?php echo $resul['fechaSolicitud']; ?> </td> 
					</tr>
			<?php
					}	
			?>
				</table>

			<?php
				}else{
			?>		<script type="text/javascript">alert("No hay solicitudes realizadas");</script>
					
			<?php
					echo "No hay solicitudes realizadas.";
					mysqli_close($enlace);
				}
			?>
			<br><br>
			<button class="btn btn-color" type="button" onclick="location.href = 'index.php'">Volver</button>
			</div>
		</main>
			
		<blockquote >

			<footer>

				Grupo 16

			</footer>

		</blockquote>	

	</body>

</html>