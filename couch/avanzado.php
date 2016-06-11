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

			<form class="form-horizontal" action="listado.php" method="POST" onsubmit=" return validarBusquedaAvanzada(this)">
				<fieldset>	
					<b>
						<h3>Filtrar busqueda:</h3>
					</b>
					<div class="form-group">
						<label for="provincia">Provincia:</label>
						<select class="form-control" id="provincias" name="provincias">
							<option value="0">---------</option>
							<?php
								require_once('busqueda.php');
								$con="SELECT * FROM `lista_provincias`";
								$resul=busqueda($con);
								if(!empty($resul)){
									foreach($resul as $r){
										echo "<option value=".$r['id'].">".$r['provincia']."</option>";
									}
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="localidad">Localidad:</label>
						<select class="form-control" id="localidades" name="localidades">
							<option value="0">---------</option>
							<?php
								require_once('busqueda.php');
								$con="SELECT * FROM `lista_localidades`";
								$resul=busqueda($con);
								if(!empty($resul)){
									foreach($resul as $r){
										echo "<option value=".$r['id'].">".$r['localidad']."</option>";
									}
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="fecha">Fecha desde:</label>
						<input class="form-control" type="text" id="datepicker" name="datepicker" placeholder="Ingrese la fecha desde" readonly>
					</div>
					<div class="form-group">
						<label for="fecha">Fecha hasta:</label>
						<input class="form-control" type="text" id="datepicker2" name="datepicker2" placeholder="Ingrese la fecha hasta" readonly>
					</div>
					<div class="form-group">
						<label for="apellido">Cantidad de plazas:</label>
						<input class="form-control" type="number" id="plazas" name="plazas" placeholder="Ingrese la cantidad de plazas">
					</div>
					<div class="form-group">
						<label for="pass">tipo de couch:</label>
						<select class="form-control" id="Tipos" name="tipos">
							<option id="Tipo" value="0">------------------------</option>
							<?php
								require_once('busqueda.php');
								$con="SELECT * FROM `tipo_hospedaje` WHERE `oculto` IS NULL";
								$tipos=busqueda($con);
								if(!empty($tipos)){
									foreach($tipos as $t){
										echo "<option id=Tipo value=$t[idTipo]>$t[nombre]</option>";
									}
								}
							?>
						</select><br>
					</div>
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