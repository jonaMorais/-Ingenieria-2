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

		<main class="container">

				<!--  CODIGO PHP-->
				<?php
					//VISUALIZAR UNA PUBLICACION el identificador le entra por un get
					//Realizamos la conexion
					//$idpublicacion = $_POST['var1'];
					$idpubli=$_GET['idpubli'];
					//Estructura de control por si falla
					//seleccion de la base de datos
					include_once('conexion.php');
					$link = conect();
					mysqli_query($link,"SET NAMES 'utf8'");
					
					
					$consulta="SELECT * 
							FROM publicacion
							WHERE (idpublicacion=".$idpubli.")";
					//realizo la consulta
					$peticion= mysqli_query($link,$consulta);	
					//MUESTRO INFORMACION DE LA PUBLICACION
					//MAQUETACION
					while($fila = mysqli_fetch_array($peticion)){
						echo "
						<div class='row'>
							<div class='col-md-6 col-md-offset-2'>
									<h2>".$fila['titulo']."</h2><br>
							</div>
							
							<div class='col-md-6 col-md-offset-1'>
								<img id='publi' alt='Logo de CouchInn' width=500px heigth=500px src='img/".$fila['foto']."'>
							</div>
							<div class='col-md-6 col-md-offset-3'>
							";
							?><?php
								
								if(!empty($_SESSION['email'])){
								?>
									<button class="btn btn-color btn-primary btn-lg" type="button" onclick="location.href = '#' ">COUCH</button>
								<?php
								}
							?>

							<?php
							echo "</div>
							<div class='col-md-7 col-md-offset-1'>";
						echo	'	<p class="lead">
										<strong>Ciudad: </strong>'.$fila['ciudad'].'
									<br>
								';
							echo "	<strong>Cantidad de plazas: </strong>".$fila['cantPlazas']." <br>
								<strong>Descripcion: </strong>".$fila['descripcionPubli']."<br>
								"?><?php
									$consulta2="SELECT nombre 
												FROM tipo_hospedaje
												WHERE(idTipo=".$fila['idTipo'].")";
									$res=mysqli_query($link,$consulta2);
									$datotipo=mysqli_fetch_array($res,MYSQLI_NUM);
									echo "<strong> Tipo de Hospedaje: </strong>".$datotipo[0]."   ";
								?>
								<?php
								echo "
									</p>
								</div>
							</div>
								";
					}

					//SI ES USUARIO REGISTRADO PODRA VER EL BOTON COUCH
					//si inicio sesion mostrar el boton
					
					//mostrar el promedio de la puntuacion tengo el ide de la publicacion

					// consulta obtengo todas las puntuaciones de la publicacion
					//comando de promedio de sql
					$consultaprom="SELECT AVG(puntuacion)
								   FROM publicacion INNER JOIN calificacion ON publicacion.idPublicacion = calificacion.idPublicacion
								   WHERE (publicacion.idPublicacion='".$idpubli."')";
					//ejecuto la consulta
					$resultado=mysqli_query($link,$consultaprom);
					//lo cargo a una variable
					$promedio=mysqli_fetch_array($resultado,MYSQLI_NUM);

					//mostrar ese promedio de puntuacion solo la parte entera
					$miReal = $promedio[0];
					$numerofinal= intval($miReal);  

					echo '
					<div class="row">
						<div class="col-md-4 col-md-offset-1" >
						    <p class="lead"> Promedio de la publicacion : '.$numerofinal.' </p>
						    
						    
						</div>
					
					';
					//cerrar conexion
					mysqli_close($link);		
				?>
				<div class="col-md-7 col-md-offset-1">
					<button class="btn btn-color" type="button" onclick="location.href = '#' ">Mas Informacion</button><br><br>				
					<button class="btn btn-color" type="button" onclick="location.href = 'index.php' ">Volver</button>
				</div>
			</div>
		</main>
		
		<blockquote>

			<footer>

				Grupo 16

			</footer>

		</blockquote>	

	</body>

</html>