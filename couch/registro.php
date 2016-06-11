<!DOCTYPE html>

<html>

	<?php

		require_once('sesion_class.php');
		$sesion= new sesion;
		if($sesion->get()!=false){
			?><script type="text/javascript">alert("Usted ya se encuentra registrado.");</script>
			<script type="text/javascript">window.location.replace("./index.php");</script>
			<?php
		}
		//---Incluimos el head
		include_once('view/head.html');
		include_once('busqueda.php');
	?>


	<body class="container">

		<?php

			//---Incluimos el header
			include_once('view/header.html');

			//---Incluimos el nav
			include_once('view/navBar/navBar.php');

		?>

		<main>

			<form class="form-horizontal" action="add_user.php" method="POST" onsubmit=" return validarUsuarioAdd()" enctype="multipart/form-data">
				<fieldset>	
					<b>
						<h3>Registrarse:</h3>
					</b>
					<div class="form-group">
						<label for="mail">*E-mail:</label>
						<input class="form-control" type="text" id="mail" name="mail" placeholder="Ingrese su mail">
					</div>
					<div class="form-group">
						<label for="nombre">*Nombre:</label>
						<input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre">
					</div>
					<div class="form-group">
						<label for="apellido">*Apellido:</label>
						<input class="form-control" type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido">
					</div>
					<div class="form-group">
						<label for="pass">*Contraseña:</label>
						<input class="form-control" type="password" id="pass" name="pass" placeholder="Ingrese su contraseña">
					</div>
					<div class="form-group">
						<label for="pass2">*Confirmar contraseña:</label>
						<input class="form-control" type="password" id="pass2" name="pass2" placeholder="Ingrese su contraseña">
					</div>
					<div class="form-group">
						<label for="fecha">*Fecha de nacimiento:</label>
						<input class="form-control" type="text" id="fechaNacimiento" name="fechaNacimiento" placeholder="Ingrese su fecha de nacimineto" readonly>
					</div>
					<div class="form-group">
						<label for="telefono">*Telefono:</label>
						<input class="form-control" type="number" id="telefono" name="telefono" placeholder="Ingrese su telefono">
					</div>
					<div class="form-group">
						<label for="telefono">Sexo:</label>
						<select class="form-control" id="sexo" name="sexo">
							<?php
								$con="SELECT * FROM `sexo`";
								$res=busqueda($con);
								if(!empty($res)){
									foreach($res as $r){
										echo "<option value='$r[idSexo]'>$r[nombre]</option>";
									}
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="foto">Foto:</label>
						<input class="btn btn-default" type="file" id="foto" name="foto" placeholder="Seleccione una foto">
					</div>
					<p>Todos los campos con * son obligatorios</p>
					<input class="btn btn-color" type="button" value="Volver" onclick="window.location.href='./index.php'">
					<input class="btn btn-color" type="submit" value="Enviar">
				</fieldset>
			</form>

		</main>
		
		<blockquote>

			<footer>

				Grupo 16

			</footer>

		</blockquote>	

	</body>

</html>