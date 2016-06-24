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
				$consulta="	SELECT * FROM calificacion WHERE(idusuarioPublica=$idUsuario) and (idPublicacion<>0)";
				$res=busqueda($consulta);
				if(!empty($res)){
					?>
						<div class="panel panel-default col-sm-8 col-sm-offset-2">
							<div class="panel-heading">
								<h2>Usuarios a calificar</h2>							
							</div>
							<div class="panel-body">
								<table class="table table hover">
							<tr>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Titulo publicacion</th>
								<th>Foto publicacion</th>
								<th style='padding-left:50px'>Accion/Puntaje</th>
							</tr>
					<?php
					foreach($res as $resul){
					// titulo y descripcion
						$idpubli=$resul['idPublicacion'];
						$consultaPubli="SELECT titulo FROM publicacion WHERE(idPublicacion=$idpubli) ";
						$res2=mysqli_query($enlace,$consultaPubli);
						if($res2){
							$rows2=mysqli_fetch_array($res2);

							$idUsuSolicita=$resul['idUsuarioSolicita'];
							$consultaNombreUsu="SELECT idusuario, nombre, apellido FROM usuario WHERE(idusuario=$idUsuSolicita)";
							$res3=mysqli_query($enlace,$consultaNombreUsu);
							$rows3=mysqli_fetch_array($res3);

							?>
			
				
					<tr>
						<td><?php echo $rows3[1]; ?></td>
						<td><?php echo $rows3[2]; ?></td>
						<td><a href=visualizarpublicacion.php?idpubli=<?php echo $resul['idPublicacion']?>><?php echo $rows2[0] ?></a></td>
						<td><?php echo "<img src=mostrarImagen.php?id_Publi=".$resul['idPublicacion']." id='imagen' class='img-rounded'>"; ?></td>
						
							
							<?php
							//obtengo lista de calificaciones q hice al usuario
							$puntaje="SELECT * FROM calificacion WHERE(idUsuarioSolicita=$idUsuSolicita)and (idusuarioPublica=$idUsuario) and(idPublicacion=0) ";
							/*
							//obtengo calificaciones de todos sin verificar el idpublicacion
							$puntaje="SELECT * FROM calificacion WHERE(idUsuarioSolicita=$idUsuSolicita)and (idusuarioPublica=$idUsuario) ";
							*/
							$re=mysqli_query($enlace,$puntaje);
							$datos=mysqli_fetch_array($re);
								if(!isset($datos)){
									?>
									<td> 
										<div class="col-sm-1 col-sm-offset-2">
										<form  action="calificarUsuario.php" method="POST">
											<input type="hidden" name="idpublicacion" id="idpublicacion" value=<?php echo $idpubli; ?>>
											<input type="hidden" name="usuarioSolicita" id="usuarioSolicita" value=<?php echo $rows3['idusuario']; ?>>
											<input class="btn btn-color" type="submit" value="Calificar usuario">
										</form>
										</div>
									</td> 
									<?php
								}else{
									?> 
										<td style='padding-left:100px'> Puntaje: <?php echo $datos[1]; ?></td>
									</tr>
									<?php
								}

							
							
						}
									
					}	
			?>
				</table>

			<?php
				}else{
			?>		
				<div class="alert alert-info">
							<strong>No hay usuarios para calificar</strong> 
					</div>
				
					
			<?php
				}
					mysqli_close($enlace);
					
				
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