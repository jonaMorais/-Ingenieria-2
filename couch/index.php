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
					<table class="table table hover">
						<tr>
							<th>Titulo</th>
							<th>Ciudad</th>
							<th>CantPlazas</th>
							<th>Fotos</th>
							<th>Ver+</th>
						</tr>
					<?php
					
					foreach ($fila as $f) {
						?>
							<tr>
								<td><?php echo $f['titulo']; ?></td>
								<td><?php echo $f['ciudad']; ?></td>
								<td><?php echo $f['cantPlazas']; ?></td>
								<td><?php echo $f['foto']; ?></td>
								<td>Ver+</td>
							</tr>
						<?php
					}
					?>
						</table>
					<?php
				}
				else{
					echo "No hay datos que mostrar";
				}

			?>
		
		</main>
		
		<blockquote>

			<footer>

				Grupo 16

			</footer>

		</blockquote>	

	</body>

</html>