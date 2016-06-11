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

		<main>


			
			<form class="form-horizontal" action="validarCouch.php" method="POST" onsubmit=" return validarCouch(this)" enctype="multipart/form-data">
				<fieldset>
					<b>
						<h3>Alta de Couch</h3>
					</b>
					<div class="form-group">
						<label for="titulo">*Titulo:</label>
						<input class="form-control" type="text" id="titulo" name="titulo" placeholder="Título del couch">
					</div>
					<div class="form-group">
						<label for="descrip">*Descripcion:</label>
						<textarea class="form-control" rows="5" id="descrip" name="descrip" maxlength="255" placeholder="Descripción del couch"></textarea>
					</div>
					<div class="form-group">
						<label for="provincia">*Provincia:</label>
						<select class="form-control" id="provincias" name="provincias" onChange='cargaContenido(this.id)'>
							<?php
								require_once('busqueda.php');
								$con="SELECT * FROM `lista_provincias`";
								$resul=busqueda($con);
							?>
							<option value="0">---------</option>
							<?php
								if(!empty($resul)){
									foreach($resul as $r){
										echo "<option value=".$r['id'].">".$r['provincia']."</option>";
									}
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="localidad">*Localidad:</label>
						<select class="form-control" id="localidades" name="localidades">
							<option value="0">---------</option>
						</select>
					</div>
					<div class="form-group">
						<label for="cantplazas">*Cantidad de plazas:</label>
						<input class="form-control" type="number" id="cantplazas" name="cantplazas" placeholder="Cantidad de plazas del couch">
					</div>					
					<div class="form-group">
						<label for="tipo">*Tipo:</label>
						<select class="form-control" id="tipo" name="tipo">
							<?php
								require_once('busqueda.php');
								$con="SELECT * FROM `tipo_hospedaje` WHERE `oculto` IS NULL";
								$tipo=busqueda($con);
								echo "<option value='0'>---------</option>";
								if(!empty($tipo)){
									foreach ($tipo as $t) {
										echo "<option value=" . $t['idTipo'] . ">" . $t['nombre'] . "</option>";
									}
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="pass">*Foto:</label>
						<input class="btn btn-default" type="file" id="foto" name="foto" placeholder="Seleccione una foto">
					</div>
					<p>Todos los campos con * son obligatorios</p>
					<input class="btn btn-color" type="button" value="Volver" onclick="history.back(-1)">
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