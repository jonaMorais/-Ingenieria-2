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

			<?php
		
				//---Incluimos el listado de publicaciones
				include_once('listadoDePublicaciones.php');

				if($numRow > 0){
					?>
					<div class="panel panel-default col-sm-7 col-sm-offset-0">
						<div class="panel-heading">
							<h2>Los Couchs más actuales</h2>							
						</div>
						<div class="panel-body">
						<table class="table table hover">
							<tr>
								<th>Titulo</th>
								<th>Descripcion</th>
								<th>Fotos</th>
							</tr>
					<?php
					
					foreach ($fila as $f) {
						?>
							<tr>
								<td><?php echo $f['titulo']; ?></td>
								<td><?php echo $f['descripcion']; ?></td>
								<?php
									echo "<td><img src=mostrarImagen.php?id_Publi=$f[idPublicacion] height=30% width=30%></td>";
								?>
							</tr>
						<?php
					}
					?>
						</table>
						</div>
						</div>
					<?php
				}
				else{
					echo "No hay datos que mostrar";
				}

			?>

			<div class=" col-sm-4 col-sm-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<img src="algo.jpg" height="90%" width="90%">
				</div>
				<p>Aca podría ir explicadito lo que es la página de CouchInn</p>
			</div>
		</div>
		
		</main>

		<blockquote class="container col-sm-10 col-sm-offset-0">

			<footer>

				Grupo 16

			</footer>

		</blockquote>	

	</body>

</html>