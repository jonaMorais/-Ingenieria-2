<!DOCTYPE html>

<html>

	<?php

		require_once('sesion_class.php');
		$sesion= new sesion;
		if($sesion->get()==false){
			?><script type="text/javascript">alert("Acceso denegado.");</script><?php
			?><script type="text/javascript">window.location.replace("./index.php");</script><?php
		}
		if(isset($_POST['Tipo']) and !empty($_POST['Tipo'])){
			$id=$_POST['Tipo'];
		}
		else{
			header('Location: index.php');
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
			$con="SELECT * FROM `publicacion` WHERE idPublicacion= '$id'";
			$pub=busqueda($con);
		?>

		<main>
			<?php
				foreach($pub as $p){?>
					<form class="form-horizontal" action="actualizar_couch.php" method="POST" onsubmit=" return validarCouch(this)" enctype="multipart/form-data">
						<fieldset>
							<b>
								<h3>Modificar couch:</h3>
							</b>
							<div class="form-group"><?php
								echo "<br>";
								echo "<img class=visualizacionImagen src=mostrarImagen.php?id_Publi=$p[idPublicacion] style='padding-left:300px'"?>
								<br>
							</div>
							<div class="form-group">
								<input type="hidden" name="publi" id="publi" value=<?php echo $id; ?>>
							</div>
							<div class="form-group">
								<label for="titulo">*Titulo:</label>
								<input class="form-control" type="text" id="titulo" name="titulo" placeholder="Título del couch" value=<?php echo $p['titulo'];?>>
							</div>
							<div class="form-group">
								<label for="descrip">*Descripcion:</label>
								<textarea class="form-control" rows="5" id="descrip" name="descrip" maxlength="255" placeholder="Descripción del couch" ><?php echo $p['descripcion'];?></textarea>
							</div>
							<div class="form-group">
								<label for="provincia">*Provincia:</label>
								<select class="form-control" id="provincias" name="provincias" onChange='cargaContenido(this.id)'>
									<?php
										$con="SELECT * FROM `lista_provincias`";
										$prov=busqueda($con);
									?>
									<option value="0">---------</option>
									<?php
										if(!empty($prov)){
											foreach($prov as $pv){
												if($pv['id']==$p['provincia']){
													echo "<option value=".$pv['id']." selected>".$pv['provincia']."</option>";
												}
												else{
													echo "<option value=".$pv['id'].">".$pv['provincia']."</option>";
												}
											}
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="localidad">*Localidad:</label>
								<select class="form-control" id="localidades" name="localidades">
									<option value="0">---------</option>
									<?php
										$con="SELECT * FROM `lista_localidades` WHERE relacion ='$p[provincia]'";
										$loc=busqueda($con);
										if(!empty($loc)){
											foreach($loc as $l){
												if($l['id']==$p['localidad']){
													echo "<option value=".$l['id']." selected>".$l['localidad']."</option>";
												}
												else{
													echo "<option value=".$l['id'].">".$l['localidad']."</option>";
												}
											}
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="cantplazas">*Cantidad de plazas:</label>
								<input class="form-control" type="number" id="cantplazas" name="cantplazas" placeholder="Cantidad de plazas del couch" value=<?php echo $p['cantPlazas'];?>>
							</div>					
							<div class="form-group">
								<label for="tipo">*Tipo:</label>
								<select class="form-control" id="tipo" name="tipo">
									<option value=''>---------</option>
									<?php
										$con="SELECT * FROM `tipo_hospedaje` WHERE oculto IS NULL";
										$tipo=busqueda($con);							
										foreach ($tipo as $t) {
											if($t['idTipo']==$p['idTipo']){
												echo "<option value=".$t['idTipo']." selected>".$t['nombre']."</option>";
											}
											else{
												echo "<option value=".$t['idTipo']." selected>".$t['nombre']."</option>";
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
					</form><?php
				}?>

			</main>
		
		<blockquote>

			<footer>

				Grupo 16

			</footer>

		</blockquote>	

	</body>

</html>