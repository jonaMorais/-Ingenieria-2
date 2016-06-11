<!DOCTYPE html>

<html>

	<?php

		require_once('sesion_class.php');
		$sesion= new sesion;
		if($sesion->get()==false){?>
			<script type="text/javascript">alert("Acceso denegado!!!");</script>
			<script type="text/javascript">window.location.replace("./index.php");</script>
			<?php
		}

		//---Incluimos el head
		include_once('view/head.html');
		require_once('busqueda.php');
	?>

	<body class="container">

		<?php

			//---Incluimos el header
			include_once('view/header.html');

			//---Incluimos el nav
			include_once('view/navBar/navBar.php');

			include_once('busqueda.php');
			$idUser = $sesion->getIdUsuario();
			$sql = "SELECT * FROM usuario WHERE idusuario='$idUser'";
			$fila = busqueda($sql);
		
		?>

		<main>
			
			<?php
				
				foreach($fila as $f){
					echo "<div style='padding-left:400px'>";
					if($f['foto']!=null){
						echo "<img src='mostrarImagenUsuario.php?id_User=$idUser' class='img-circle' alt='Foto de perfil' width='304' height='304'>";
					}
					else{
						switch($f['sexo']){
							case 1:
								echo "<img src='img/Otro.jpg' class='img-circle' alt='Foto de perfil' width='304' height='304'>";
								break;
							case 2:
								echo "<img src='img/Hombre.jpg' class='img-circle' alt='Foto de perfil' width='304' height='304'>";
								break;
							case 3:
								echo "<img src='img/Mujer.jpg' class='img-circle' alt='Foto de perfil' width='304' height='304'>";
								break;
						}
					}
					echo "</div>";
			?>
				
					<form class="form-horizontal" action="validarModificacionPerfil.php" method="POST" onsubmit=" return validarUsuarioAdd()">
						<fieldset>	
							<b>
								<h3>Modificar perfil:</h3>
							</b>
							<div class="form-group">
								<label for="mail">E-mail:</label>
								<input class="form-control" type="text" id="mail" name="mail" placeholder="Ingrese su mail" disabled value=<?php echo $f['email'];?>>
							</div>
							<div class="form-group">
								<label for="nombre">Nombre:</label>
								<input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" value=<?php echo $f['nombre'];?>>
							</div>
							<div class="form-group">
								<label for="apellido">Apellido:</label>
								<input class="form-control" type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido" value=<?php echo $f['apellido'];?>>
							</div>
							<div class="form-group">
								<label for="fecha">Fecha de nacimiento:</label>
								<input class="form-control" type="text" id="fechaNacimiento" name="fechaNacimiento" placeholder="Ingrese su fecha de nacimineto" value=<?php echo $f['fechanacimiento'];?> readonly>
							</div>
							<div class="form-group">
								<label for="telefono">Telefono:</label>
								<input class="form-control" type="number" id="telefono" name="telefono" placeholder="Ingrese su telefono" value=<?php echo $f['telefono'];?>>
							</div>
							<div class="form-group">
								<label for="sexo">Sexo:</label>
								<select class="form-control" id="sexo" name="sexo">
									<?php
										$con="SELECT * FROM `sexo`";
										$sex=busqueda($con);
										foreach($sex as $s){
											if($s['idSexo']==$f['sexo']){
												echo "<option value=".$s['idSexo']." selected>".$s['nombre']."</option>";
											}
											else{
												echo "<option value=".$s['idSexo'].">".$s['nombre']."</option>";
											}
										}
									?>
								</select>
							</div>
							<input class="btn btn-color" type="button" value="Volver" onclick="history.back(-1)">
							<input class="btn btn-color" type="submit" value="Modificar datos">
						</fieldset>
					</form>

			<?php
				}
			?>

		</main>

		<blockquote class="container col-sm-10 col-sm-offset-0">

			<footer>

				Grupo 16

			</footer>

		</blockquote>	

	</body>

</html>