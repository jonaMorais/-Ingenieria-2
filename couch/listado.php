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
			<?php
				if(isset($_POST['busqueda'])){
					$titulo=$_POST['busqueda'];
					$tit="`titulo` LIKE '%$titulo%' OR `descripcion` LIKE '%$titulo%'";
					$con = "SELECT * FROM `publicacion` WHERE "."$tit";
				}
				else{
					$con="SELECT * FROM `publicacion` WHERE ";
					$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE ";
					$sub="";
					if(isset($_POST['provincias'])){
						if(!empty($_POST['provincias'])){
							$prov=$_POST['provincias'];
							$sub=$sub."AND `provincia` = '$prov' ";
						}
					}
					if(isset($_POST['localidades'])){
						if(!empty($_POST['localidades'])){
							$loc=$_POST['localidades'];
							$sub=$sub."AND `localidad` = '$loc' ";
						}
					}
					if(isset($_POST['plazas'])){
						if(!empty($_POST['plazas'])){
							$plaza=$_POST['plazas'];
							$sub=$sub."AND `cantPlazas` = '$plaza' ";
						}
					}
					if(isset($_POST['tipos'])){
						if(!empty($_POST['tipos'])){
							$tipo=$_POST['tipos'];
							$sub=$sub."AND `idTipo` = '$tipo' ";
						}
					}
					if(isset($_POST['datepicker']) and isset($_POST['datepicker2'])){
						if(!empty($_POST['datepicker']) and !empty($_POST['datepicker2'])){
							$desde=$_POST['datepicker'];
							$hasta=$_POST['datepicker2'];
							$con2=$con2."`desde`='$desde' AND `hasta`='$hasta' ";
							$sub=$sub."AND `idPublicacion` NOT IN (".$con2.")";
						}
						else{
							if(!empty($_POST['datepicker'])){
								$desde=$_POST['datepicker'];
								$con2=$con2."`desde`='$desde' ";
								$sub=$sub."AND `idPublicacion` NOT IN (".$con2.")";
							}
							if(!empty($_POST['datepicker2'])){
								$hasta=$_POST['datepicker2'];
								$con2=$con2."`hasta`='$hasta' ";
								$sub=$sub."AND `idPublicacion` NOT IN (".$con2.")";
							}
						}
					}
					$con=$con.substr($sub, 3, strlen($sub)-3);
				}
				require_once('busqueda.php');
				$resul=busqueda($con);
					if(!empty($resul)){
						foreach($resul as $res){?>
							<table class="table table hover">
							<tr>
								<th>Fotos</th>
								<th>Titulo</th>
								<th>Provincia</th>
								<th>Localidad</th>
								<th>CantPlazas</th>
								<th></th>
							</tr>
							<tr>
								<?php
								$idUser=$res['idUsuarioPublica'];
								$con2="SELECT premium FROM usuario WHERE idusuario='$idUser'";;
								$res2=busqueda($con2);
								foreach($res2 as $r){
									if($r['premium']== 1){
										echo "<td><img src=mostrarImagen.php?id_Publi=$res[idPublicacion] id='imagen'></td>";
									}
									else{
										echo "<td><img src=img/logo.png id='imagen'></td>";
									}
								}
								echo "<td><a href=visualizarpublicacion.php?idpubli=$res[idPublicacion]>$res[titulo]</a></td>";
								?>
								<td>
									<?php
										$con="SELECT `provincia` FROM `lista_provincias` WHERE id='$res[provincia]'";
										$prov=busqueda($con);
										if(!empty($prov)){
											foreach($prov as $p){
												echo $p['provincia'];
											}
										}
									?>
								</td>
								<td>
									<?php
										$con="SELECT `localidad` FROM `lista_localidades` WHERE id='$res[localidad]'";
										$loc=busqueda($con);
										if(!empty($loc)){
											foreach($loc as $l){
												echo $l['localidad'];
											}
										}
									?>
								</td>
								<td><?php echo $res['cantPlazas'];?></td>
								<td>
									<div>
										<br>
										<input class="btn btn-color" type="button" value="Ver couch" onclick="window.location.href='visualizarpublicacion.php?idpubli=<?php echo $res['idPublicacion'];?>'">
									</div>
								</td>
							</tr>
						<?php
						}
					}
					else{?>
						<script type="text/javascript">alert("No se obtuvieron resultados.");</script>
						<?php
						
						echo "No se obtuvieron resultados.";
					}?>

				</table>
		</main>
		
		<blockquote>

			<footer>

				Grupo 16

			</footer>

		</blockquote>	

	</body>

</html>