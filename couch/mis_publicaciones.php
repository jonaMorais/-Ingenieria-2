<!DOCTYPE html>

<html>

	<?php
		require_once('sesion_class.php');
		$sesion= new sesion;
		//---Incluimos el head
		include_once('view/head.html');
		if($sesion->get()==false){
			?><script type="text/javascript">alert("Acceso denegado.");</script><?php
			?><script type="text/javascript">window.location.replace("./index.php");</script><?php
		}
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
				require_once('busqueda.php');
				$id=$sesion->getIdUsuario();
				$con= "SELECT * FROM `publicacion` WHERE idUsuarioPublica = $id";
				$res=busqueda($con);
				if(!empty($con)){
					?>
					<div class="panel panel-default col-sm-8 col-sm-offset-2">
						<div class="panel-heading">
							<h2>Mis publicaciones</h2>							
						</div>
						<div class="panel-body">
						<table class="table table hover">
							<tr>
								<th>Nro</th>
								<th>Foto</th>
								<th>Titulo</th>
								<th style='padding-left:150px'>Acciones</th>
							</tr>
					<?php
					
					foreach ($res as $r) {
						?>
							<tr>
								<td><?php echo $r['idPublicacion']; ?></td>
								<?php
									echo "<td><img src=mostrarImagen.php?id_Publi=$r[idPublicacion] id='imagen' class='img-rounded'></td>";
								?>
								<?php echo "<td><br><a href=visualizarpublicacion.php?idpubli=$r[idPublicacion]>$r[titulo]</a></td>";?>
								<td>
									<br>
									<div class="col-sm-2 col-sm-offset-2 ">
										<form action="modificar_publicacion.php" method="POST">
											<input type="hidden" name="Tipo" id="tipo" value=<?php echo $r['idPublicacion']; ?>>
											<input class="btn btn-color" type="submit" value="Modificar">
										</form>
									</div>
									<!-- PAUSAR Y DESPAUSAR-->
									<?php 
										$consu="SELECT oculto
												FROM publicacion
												WHERE (idPublicacion=".$r['idPublicacion'].")";
										$resu=busqueda($consu);
										foreach($resu as $p){
											if ($p['oculto'] ==0){

												?>
												<div class="col-sm-1 col-sm-offset-2">
													<form  action="pausarPublicacion.php" method="POST">
														<input type="hidden" name="pausar" id="pausar" value=<?php echo $r['idPublicacion']; ?>>
														<input class="btn btn-color" type="submit" value="Pausar" onclick= "return confirm('¿esta seguro que desea pausar esta publicacion?')">
													</form>
												</div>
												<?php 
											}else{
												?>
												<div class="col-sm-2 col-sm-offset-2">
													<form  action="despausarPublicacion.php" method="POST">
														<input type="hidden" name="despausar" id="despausar" value=<?php echo $r['idPublicacion']; ?>>
														<input class="btn btn-color" type="submit" value="Despausar" >
													</form>
												</div>

												<?php 
											}
										}
									?>
									<!-- ELIMINAR PUBLICACION -->
									<div class="col-sm-1 col-sm-offset-2">
										<form  action="eliminarPublicacion.php" method="POST" >
											<input type="hidden" name="publicacion" id="publicacion" value=<?php echo $r['idPublicacion']; ?>>
											<input class="btn btn-color" type="submit" value="Eliminar" onclick= "return confirm('¿esta seguro que desea eliminar esta publicacion?')">
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
		<div style='padding-left:675px'>
			<form  action="agregarTipo.php" method="POST">
				<input class="btn btn-color" type="button" value="Eliminar publicación" onclick="window.location.href='./agregarTipo.php'">
			</form>
		</div>
		<blockquote class="container col-sm-10 col-sm-offset-0">

		<?php
			require_once('view/footer.html');
		?>

		</blockquote>	

	</body>

</html>