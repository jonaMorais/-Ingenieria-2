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


			<div id="lateral" class="panel panel-success">
				<div class="panel-heading-custom">
					<h3 class="panel-title">Panel title</h3>
				</div>
				<div class="panel-body">
					<ul id="opciones">
						<li><a href="#">Opcion numero 1</a></li>
						<li><a href="#">Opcion numero 2</a></li>
						<li><a href="#">Opcion numero 3</a></li>
						<li><a href="#">Opcion numero 4</a></li>
						<li><a href="#">Opcion numero 5</a></li>
						<li><a href="#">Opcion numero 6</a></li>
					</ul>
				</div>
			</div>


			<form class="form-horizontal" action="listado.php" method="POST" onsubmit=" return validarBusquedaAvanzada(this)">
				<fieldset>	
					<b>
						<h3>Filtrar busqueda:</h3>
					</b>
					<div class="form-group">
						<label for="mail">Ciudad:</label>
						<input class="form-control" type="text" id="ciudad" name="ciudad" placeholder="Ingrese la ciudad">
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
								require_once('ver_tipos.php');
								$tipos=ver_tipos();
								foreach($tipos as $t){
									if($t[2]==null){
										echo "<option id=Tipo value=$t[0]>$t[1]</option>";
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