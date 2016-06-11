<!DOCTYPE html>

<html>

	<?php
		require_once('sesion_class.php');
		$sesion= new sesion;
		if($sesion->get()!=false){
			if($sesion->getRoll()!=1){
				?><script type="text/javascript">alert("Usted no es administrador.");</script><?php
				?><script type="text/javascript">window.location.replace("./index.php");</script><?php
			}
		}
		else{
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
		
				//---Incluimos el listado de las publicaciones
				include_once('busqueda.php');
				$con="SELECT * FROM `tipo_hospedaje`";
				$res=busqueda($con);
				if(!empty($res)){
					?>
					<div class="panel panel-default col-sm-7 col-sm-offset-2">
						<div class="panel-heading">
							<h2>Tipos de couch</h2>							
						</div>
						<div class="panel-body">
						<table class="table table hover">
							<tr>
								<th>Nro</th>
								<th>Nombre</th>
								<th id="columna">Acciones</th>
							</tr>
					<?php
					
					foreach ($res as $r) {
						?>
							<tr>
								<td><?php echo $r['idTipo']; ?></td>
								<td><?php echo $r['nombre']; ?></td>
								<td>
									<div class="col-sm-2 col-sm-offset-6 ">
										<form action="actualizar_tipo.php" method="POST">
											<input type="hidden" name="Tipo" id="tipo" value=<?php echo $r['idTipo']; ?>>
											<input class="btn btn-color" type="submit" value="Modificar">
										</form>
									</div>
									<div class="col-sm-2 col-sm-offset-1">
										<form  action="eliminar_tipo.php" method="POST">
											<input type="hidden" name="Tipo" id="tipo" value=<?php echo $r['idTipo']; ?>>
											<input class="btn btn-color" type="submit" value="Eliminar">
										</form>
									</div>
								</td>
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
		</div>
		
		</main>
		<div id="agregarTipo">
			<form  action="agregarTipo.php" method="POST">
				<input class="btn btn-color" type="button" value="Agregar nuevo tipo de couch" onclick="window.location.href='./agregarTipo.php'">
			</form>
		</div>
		<blockquote class="container col-sm-10 col-sm-offset-0">

			<footer>

				Grupo 16

			</footer>

		</blockquote>	

	</body>

</html>