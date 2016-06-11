<!DOCTYPE html>

<html>

	<?php

		require_once('sesion_class.php');
		$sesion= new sesion;
		include_once('busqueda.php');
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
			$con="SELECT * FROM publicacion ORDER BY idPublicacion desc LIMIT 5";
			$res=busqueda($con);
			if(!empty($res)){?>
				<div class="panel panel-default table-responsive col-sm-7 col-sm-offset-0">
					<div class="panel-heading">
						<h2>Los Couchs más actuales</h2>							
					</div>
					<div class="panel-body">
						<table class="table table hover">
							<tr>
								<th>Fotos</th>
								<th>Titulo</th>
								<th>Descripcion</th>
								<th></th>
							</tr>
						<?php
						foreach ($res as $r){?>
							<tr><?php
								$idUser= $r['idUsuarioPublica'];
								$sql = "SELECT premium FROM usuario WHERE idusuario='$idUser'";
								$result = busqueda($sql);
								if(!empty($result)){
									foreach($result as $res){
										if($res['premium'] == 1){
											echo "<td><img src=mostrarImagen.php?id_Publi=$r[idPublicacion] id='imagen' class='img-rounded'></td>";
										}
										else{
											echo "<td><img src=img/logo.png id='imagen' class='img-rounded'></td>";
										}
										echo "<td><br><a href=visualizarpublicacion.php?idpubli=$r[idPublicacion]>$r[titulo]</a></td>";
									}
								}
								?>
								<td><br><div class="descripcion"><?php echo $r['descripcion']; ?></div></td>
								<td>
									<div>
										<br>
										<input class="btn btn-color" type="button" value="Ver couch" onclick="window.location.href='visualizarpublicacion.php?idpubli=<?php echo $r['idPublicacion'];?>'">
									</div>	
								</td>
							</tr>
							<?php
						}?>
						</table>
					</div>
				</div>
					<?php
			}
			else{
				echo "No hay datos que mostrar";
			}?>

			<div class=" col-sm-4 col-sm-offset-1">
				<div class="panel panel-default">
					<div class="panel-body">
						<img src="img/asdasd.jpg" height="90%" width="90%">
					</div>
					<p>CouchInn surge gracias a nuestros viajes y gratas experencias anteriores y la necesidad de compartirlo con todo el mundo. Gracias a couchInn esperamos que puedan
					conocer todo el pais al igual que nosotros y disfrutar de la buena gente que lo compone.</p>
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