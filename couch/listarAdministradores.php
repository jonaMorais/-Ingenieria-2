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
			//obtener todos los usuarios q son administradores
				include_once('busqueda.php');
				$con="SELECT * FROM `usuario` WHERE (admin=1)";
				$res=busqueda($con);
				if(!empty($res)){
					?>
					<div class="panel panel-default col-sm-7 col-sm-offset-2">
						<div class="panel-heading">
							<h2>Administradores</h2>							
						</div>
						<div class="panel-body">
						<table class="table table hover">
							<tr>
								<th>Nombre</th>
								<th>Email</th>
								<th >Accion</th>
							</tr>
					<?php
					
					foreach ($res as $r) {
						?>
							<tr>
								<td><?php echo $r['nombre']; ?></td>
								<td><?php echo $r['email']; ?></td>
								<td>
								 <?php
								 	//no mostrar el boton en caso de ser administrador
								 $emailActual=$sesion->getMail();
								 if($emailActual != $r['email']){
								 ?>
									<div class="col-sm-0 col-sm-offset-0 ">
										<form action="eliminarAdministrador.php" method="POST">
											<input type="hidden" name="idusuario" id="idusuario" value=<?php echo $r['idusuario']; ?>>
											<input class="btn btn-color" type="submit" onclick= "return confirm('¿esta seguro que desea eliminar este administrador?')" value="Eliminar">
										</form>
									</div>
								<?php }   ?>	
								</td>
							</tr>
						<?php
					}
					?>
						</table>
					<?php
				}
				else{
					echo "No hay Administradores que mostrar";
				}
			?>
		</div>
		<input class="btn btn-color" type="button" value="Volver" onclick="window.location.href='./index.php'">


		</main>	
		
		<blockquote>

			<footer>

				Grupo 16

			</footer>

		</blockquote>	

	</body>

</html>
