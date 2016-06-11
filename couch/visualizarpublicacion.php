<!DOCTYPE html>

<html>

	<?php

		require_once('sesion_class.php');
		$sesion= new sesion;
		require_once('busqueda.php');
		//---Incluimos el head
		include_once('view/head.html');

	?>

	<body class="container">

		<?php

			//---Incluimos el header
			include_once('view/header.html');

			//---Incluimos el nav
			include_once('view/navBar/navBar.php');

			//incluimos la consulta para ver el contenido
				include_once('mostrarDatosDelCouch.php');

		?>

		<main>
			<ol class="breadcrumb">
				<li><a href="#" onclick="history.back(-1)">Volver al listado</a></li>
			</ol>
			<div class ="panel panel-default table-responsive col-sm-14 col-sm-offset-0">
				<?php

					foreach ($fila as $f) {
				
				?>

				<div class="panel-heading">
					<h2 id="titulo"><?php echo $f['titulo']; ?></h2>				
				</div>
				<table class="table table hover">
					<tr>
						<th>Descripcion</th>
						<th>provincia</th>
						<th>Localidad</th>
						<th>Cant Plazas</th>
						<th>Fotos</th>
						<th>Fecha de Publicacion</th>

					</tr>

					<tr>
						<?php		
							echo "<td><div class=descripcion>" . $f['descripcion'] . "</div></td>";?>
							<td>
							<?php
								$con="SELECT `provincia` FROM `lista_provincias` WHERE id='$f[provincia]'";
								$prov=busqueda($con);
								if(!empty($prov)){
									foreach($prov as $p){
										echo $p['provincia'];
									}
								}
							?>
							</td>
							<td>
							<?php
								$con="SELECT `localidad` FROM `lista_localidades` WHERE id='$f[localidad]'";
								$loc=busqueda($con);
								if(!empty($loc)){
									foreach($loc as $l){
										echo $l['localidad'];
									}
								}
							?>
							</td><?php
							echo "<td>" . $f['cantPlazas'] . "</td>";
							echo "<td>" . "<img class=visualizacionImagen src=mostrarImagen.php?id_Publi=$f[idPublicacion]>" . "</td>";
							echo "<td>" . $f['fechaPublicacion'] . "</td>";
						?>
					</tr>
					<tr>
						<td>Puntaje:</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><button class="btn btn-color">Solicitar Couch</button> <button class="btn btn-color">Ver comentarios</button></td>
					</tr>
				</table>
				<?php

					}

				?>
			</div>

		</main>
		
		<blockquote class="container col-sm-10 col-sm-offset-0">

			<footer>

				Grupo 16

			</footer>

		</blockquote>

	</body>

</html>