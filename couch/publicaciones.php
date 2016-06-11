<!DOCTYPE html>

<html>

	<?php
		require_once('sesion_class.php');
		$sesion= new sesion;
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
		?>

		<main class="container">

			<?php
		
				//---Incluimos el listado de TODAS las publicaciones
				$sql = "SELECT * FROM publicacion ORDER BY fechaPublicacion";
				$result=busqueda($sql);
				if(!empty($result)){
					?>
					<div class="panel panel-default col-sm-7 col-sm-offset-2">
						<div class="panel-heading">
							<h2>Todos los Couch</h2>							
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
					
					foreach ($result as $f) {
						?>
							<tr><?php
								$idUser=$f['idUsuarioPublica'];
								$con2="SELECT premium FROM usuario WHERE idusuario='$idUser'";;
								$res2=busqueda($con2);
								foreach($res2 as $r){
									if($r['premium']== 1){
										echo "<td><img src=mostrarImagen.php?id_Publi=$f[idPublicacion] id='imagen'></td>";
									}
									else{
										echo "<td><img src=img/logo.png id='imagen'></td>";
									}
								}?>
								<?php echo "<td><br><a href=visualizarpublicacion.php?idpubli=$f[idPublicacion]>$f[titulo]</a></td>";?>
								<td><br><div class="descripcion"><?php echo $f['descripcion']; ?></div></td>
								<td>
									<div>
										<br>
										<input class="btn btn-color" type="button" value="Ver couch" onclick="window.location.href='visualizarpublicacion.php?idpubli=<?php echo $f['idPublicacion'];?>'">
									</div>	
								</td>
							</tr>
						<?php
					}
					?>
						</table>
						</div>
						</div>
					<?php
				}
				else{
					echo "No hay datos que mostrar";
				}
			?>

		</div>
		
		</main>

		<blockquote class="container col-sm-10 col-sm-offset-0">

			<footer>

				Grupo 16

			</footer>

		</blockquote>	

	</body>

</html>