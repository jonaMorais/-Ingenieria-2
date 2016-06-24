<!DOCTYPE html>

<html>

	<?php
		require_once('sesion_class.php');
		$sesion= new sesion;
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
		<main>

			<?php
				
				if($sesion->get()!=false){
					if($sesion->getRoll()!=1){
						?><script type="text/javascript">alert("Usted no es administrador.");</script><?php
						?><script type="text/javascript">window.location.replace("./index.php");</script><?php
					}
				}else{
						?><script type="text/javascript">alert("Acceso denegado.");</script><?php
						?><script type="text/javascript">window.location.replace("./index.php");</script><?php
				}

				if(isset($_POST['datepicker']) & !empty($_POST['datepicker2'])){
					require_once('conexion.php');
					require_once('busqueda.php');
					$enlace=conect();
					$fechaIni=$_POST['datepicker'];
					$fechaLim=$_POST['datepicker2'];
					$consulta="	SELECT *
								FROM usuariosolicita
								WHERE ((fechaAceptado>='$fechaIni') and (fechaAceptado<='$fechaLim')and (estado='aceptado'))";
					$res=busqueda($consulta);
					
					if(!empty($res)){


						?>
						<div class="panel panel-default col-sm-8 col-sm-offset-2">
							<div class="panel-heading">
								<h2>Resumen de solicitudes aceptadas</h2>							
							</div>
							<div class="panel-body">
								<table class="table table hover">
									<tr>
										<th>Email</th>
										<th>Titulo publicacion</th>
										<th>Desde</th>
										<th>Hasta</th>
										<th>Fecha de aceptacion</th>
									</tr>

						<?php
						//echo substr($resul['estado'], 0, 4);  para mostrar una parte de un string
							foreach($res as $resul){
								//email del usuario
								$consultaEmail="SELECT email FROM usuario WHERE (idusuario=".$resul['IdUsuario'].")";
								$res1=mysqli_query($enlace,$consultaEmail);
								$rows1=mysqli_fetch_array($res1);
								// nombre de la publicacion
								$consultaNombre="SELECT titulo FROM publicacion WHERE(idPublicacion=".$resul['idPublicacion'].") ";
								$res2=mysqli_query($enlace,$consultaNombre);
								$rows2=mysqli_fetch_array($res2);
								?>
									<tr>
										<td><?php echo $rows1[0]; ?></td>
										<td><a href=visualizarpublicacion.php?idpubli=<?php echo $resul['idPublicacion']?>><?php echo $rows2[0] ?></a></td>
										<td><?php echo $resul['desde']; ?></td>
										<td><?php echo $resul['hasta']; ?></td>
										<td><?php echo $resul['fechaAceptado']; ?></td>
									</tr>
							<?php
							}	
							?>
							</table>

							<?php
					}else{
						
						?>	
							<div class="alert alert-info">
								<strong>No hay solicitudes aceptadas entre fecha la inicio y la fecha limite</strong> 
							</div>
							
						<?php
					}
					
					
					mysqli_close($enlace);

				}else{
					?>
						<div class="alert alert-info">
							<strong>No hay datos de fechas para obtener el resumen</strong> 
						</div>
					<?php
				}
				
				
			?>
			<button class="btn btn-color" type="button" onclick="location.href = 'obtenerResumen.php'">Volver</button>
			</div>
		</main>
		
		<blockquote class="container col-sm-4 col-sm-offset-0">

			<footer>

				Grupo 16

			</footer>

		</blockquote>	

	</body>

</html>