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
					$tit="`titulo` LIKE '%$titulo%'";
					$con = "SELECT * FROM `publicacion` WHERE "."$tit";
				}
				else{
					$con="SELECT * FROM `publicacion` WHERE ";
					if(isset($_POST['ciudad'])){
						if(!empty($_POST['ciudad'])){
							$ciudad=$_POST['ciudad'];
							$ciu="`ciudad` = '$ciudad'";
							$con=$con."$ciu";
							if(isset($_POST['plazas'])){
								if(!empty($_POST['plazas'])){
									$plazas=$_POST['plazas'];
									$pla="`cantPlazas` = '$plazas'";
									$con=$con.' AND '."$pla";
									if(isset($_POST['tipos'])){
										if(!empty($_POST['tipos'])){
											$tipos=$_POST['tipos'];
											$tipo="`idTipo` = '$tipos'";
											$con=$con.' AND '."$tipo";
											if(isset($_POST['datepicker'])){
												if(!empty($_POST['datepicker'])){
													$desde=$_POST['datepicker'];
													if(isset($_POST['datepicker2'])){
														if(!empty($_POST['datepicker2'])){
															$hasta=$_POST['datepicker2'];
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `desde` = '$desde' AND `hasta` = '$hasta'";
															$con=$con.' AND `idPublicacion` NOT IN( '."$con2)";
														}
														else{
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `desde` = '$desde'";
															$con=$con.' AND `idPublicacion` NOT IN( '."$con2)";
														}
													}
												}
												else{
													if(isset($_POST['datepicker2'])){
														if(!empty($_POST['datepicker2'])){
															$hasta=$_POST['datepicker2'];
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `hasta` = '$hasta'";
															$con=$con.' AND `idPublicacion` NOT IN( '."$con2)";
														}
													}
												}
											}
										}
										else{
											if(isset($_POST['datepicker'])){
												if(!empty($_POST['datepicker'])){
													$desde=$_POST['datepicker'];
													if(isset($_POST['datepicker2'])){
														if(!empty($_POST['datepicker2'])){
															$hasta=$_POST['datepicker2'];
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `desde` = '$desde' AND `hasta` = '$hasta'";
															$con=$con.' AND `idPublicacion` NOT IN( '."$con2)";
														}
														else{
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `desde` = '$desde'";
															$con=$con.' AND `idPublicacion` NOT IN( '."$con2)";
														}
													}
												}
												else{
													if(isset($_POST['datepicker2'])){
														if(!empty($_POST['datepicker2'])){
															$hasta=$_POST['datepicker2'];
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `hasta` = '$hasta'";
															$con=$con.' AND `idPublicacion` NOT IN( '."$con2)";
														}
													}
												}
											}
										}
									}
									else{
										if(isset($_POST['tipos'])){
											$tipos=$_POST['tipos'];
											$tipo="`idTipo` = '$tipos'";
											$con=$con.' AND '."$tipo";
											if(isset($_POST['datepicker'])){
												if(!empty($_POST['datepicker'])){
													$desde=$_POST['datepicker'];
													if(isset($_POST['datepicker2'])){
														if(!empty($_POST['datepicker2'])){
															$hasta=$_POST['datepicker2'];
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `desde` = '$desde' AND `hasta` = '$hasta'";
															$con=$con.' AND `idPublicacion` NOT IN( '."$con2)";
														}
														else{
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `desde` = '$desde'";
															$con=$con.' AND `idPublicacion` NOT IN( '."$con2)";
														}
													}
												}
												else{
													if(isset($_POST['datepicker2'])){
														if(!empty($_POST['datepicker2'])){
															$hasta=$_POST['datepicker2'];
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `hasta` = '$hasta'";
															$con=$con.' AND `idPublicacion` NOT IN( '."$con2)";
														}
													}
												}
											}
										}
									}
								}
								else{
									if(isset($_POST['tipos'])){
										if(!empty($_POST['tipos'])){
											$tipos=$_POST['tipos'];
											$tipo="`idTipo` = '$tipos'";
											$con=$con.' AND '."$tipo";
											if(isset($_POST['datepicker'])){
												if(!empty($_POST['datepicker'])){
													$desde=$_POST['datepicker'];
													if(isset($_POST['datepicker2'])){
														if(!empty($_POST['datepicker2'])){
															$hasta=$_POST['datepicker2'];
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `desde` = '$desde' AND `hasta` = '$hasta'";
															$con=$con.' AND `idPublicacion` NOT IN( '."$con2)";
														}
														else{
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `desde` = '$desde'";
															$con=$con.' AND `idPublicacion` NOT IN( '."$con2)";
														}
													}
												}
												else{
													if(isset($_POST['datepicker2'])){
														if(!empty($_POST['datepicker2'])){
															$hasta=$_POST['datepicker2'];
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `hasta` = '$hasta'";
															$con=$con.' AND `idPublicacion` NOT IN( '."$con2)";
														}
													}
												}
											}
										}
										else{
											if(isset($_POST['datepicker'])){
												if(!empty($_POST['datepicker'])){
													$desde=$_POST['datepicker'];
													if(isset($_POST['datepicker2'])){
														if(!empty($_POST['datepicker2'])){
															$hasta=$_POST['datepicker2'];
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `desde` = '$desde' AND `hasta` = '$hasta'";
															$con=$con.' AND `idPublicacion` NOT IN( '."$con2)";
														}
														else{
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `desde` = '$desde'";
															$con=$con.' AND `idPublicacion` NOT IN( '."$con2)";
														}
													}
												}
												else{
													if(isset($_POST['datepicker2'])){
														if(!empty($_POST['datepicker2'])){
															$hasta=$_POST['datepicker2'];
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `hasta` = '$hasta'";
															$con=$con.' AND `idPublicacion` NOT IN( '."$con2)";
														}
													}
												}
											}
										}
									}									
								}
							}
						}
						else{
							if(isset($_POST['plazas'])){
								if(!empty($_POST['plazas'])){
									$plazas=$_POST['plazas'];
									$pla="`cantPlazas` = '$plazas'";
									$con=$con."$pla";
									if(isset($_POST['tipos'])){
										if(!empty($_POST['tipos'])){
											$tipos=$_POST['tipos'];
											$tipo="`idTipo` = '$tipos'";
											$con=$con.' AND '."$tipo";
											if(isset($_POST['datepicker'])){
												if(!empty($_POST['datepicker'])){
													$desde=$_POST['datepicker'];
													if(isset($_POST['datepicker2'])){
														if(!empty($_POST['datepicker2'])){
															$hasta=$_POST['datepicker2'];
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `desde` = '$desde' AND `hasta` = '$hasta'";
															$con=$con.' AND `idPublicacion` NOT IN( '."$con2)";
														}
														else{
															if(isset($_POST['datepicker2'])){
																if(!empty($_POST['datepicker2'])){
																	$hasta=$_POST['datepicker2'];
																	$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `desde` = '$desde'";
																	$con=$con.' AND `idPublicacion` NOT IN( '."$con2)";
																}
															}
														}
													}
												}
												else{
													if(isset($_POST['datepicker2'])){
														if(!empty($_POST['datepicker2'])){
															$hasta=$_POST['datepicker2'];
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `hasta` = '$hasta'";
															$con=$con.' AND `idPublicacion` NOT IN( '."$con2)";
														}
													}
												}
											}
										}
										else{
											if(isset($_POST['datepicker'])){
												if(!empty($_POST['datepicker'])){
													$desde=$_POST['datepicker'];
													if(isset($_POST['datepicker2'])){
														if(!empty($_POST['datepicker2'])){
															$hasta=$_POST['datepicker2'];
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `desde` = '$desde' AND `hasta` = '$hasta'";
															$con=$con.' AND '.'`idPublicacion` NOT IN( '."$con2)";
														}
														else{
															if(isset($_POST['datepicker'])){
																if(!empty($_POST['datepicker'])){
																	$desde=$_POST['datepicker'];
																	$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `desde` = '$desde'";
																	$con=$con.' AND '.'`idPublicacion` NOT IN( '."$con2)";
																}
															}
														}
													}
												}
												else{
													if(isset($_POST['datepicker2'])){
														if(!empty($_POST['datepicker2'])){
															$hasta=$_POST['datepicker2'];
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `hasta` = '$hasta'";
															$con=$con.' AND '.'`idPublicacion` NOT IN( '."$con2)";
														}
													}
												}
											}
										}
									}
								}
								else{
									if(isset($_POST['tipos'])){
										if(!empty($_POST['tipos'])){
											$tipos=$_POST['tipos'];
											$tipo="`idTipo` = '$tipos'";
											$con=$con."$tipo";
											if(isset($_POST['datepicker'])){
												if(!empty($_POST['datepicker'])){
													$desde=$_POST['datepicker'];
													if(isset($_POST['datepicker2'])){
														if(!empty($_POST['datepicker2'])){
															$hasta=$_POST['datepicker2'];
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `desde` = '$desde' AND `hasta` = '$hasta'";
															$con=$con.' AND `idPublicacion` NOT IN( '."$con2)";
														}
														else{
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `desde` = '$desde'";
															$con=$con.' AND '.'`idPublicacion` NOT IN( '."$con2)";
														}
													}
												}
												else{
													if(isset($_POST['datepicker2'])){
														if(!empty($_POST['datepicker2'])){
															$hasta=$_POST['datepicker2'];
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `hasta` = '$hasta'";
															$con=$con.' AND '.'`idPublicacion` NOT IN( '."$con2)";
														}
													}
												}	
											}
										}
										else{
											if(isset($_POST['datepicker'])){
												if(!empty($_POST['datepicker'])){
													$desde=$_POST['datepicker'];
													if(isset($_POST['datepicker2'])){
														if(!empty($_POST['datepicker2'])){
															$hasta=$_POST['datepicker2'];
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `desde` = '$desde' AND `hasta` = '$hasta'";
															$con=$con.'`idPublicacion` NOT IN( '."$con2)";
														}
														else{
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `desde` = '$desde'";
															$con=$con.'`idPublicacion` NOT IN( '."$con2)";
														}
													}
												}
												else{
													if(isset($_POST['datepicker2'])){
														if(!empty($_POST['datepicker2'])){
															$hasta=$_POST['datepicker2'];
															$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE `hasta` = '$hasta'";
															$con=$con.'`idPublicacion` NOT IN( '."$con2)";
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
				require_once('busqueda.php');
				$resul=busqueda($con);?>
				<table class="table table hover">
					<tr>
						<th>Titulo</th>
						<th>Ciudad</th>
						<th>CantPlazas</th>
						<th>Fotos</th>
						<th>Ver+</th>
					</tr><?php
					if(!empty($resul)){
						foreach($resul as $res){?>
							<tr>
								<td><?php echo $res['titulo'];?></td>
								<td><?php echo $res['ciudad'];?></td>
								<td><?php echo $res['cantPlazas'];?></td>
								<td><?php echo $res['foto'];?></td>
								<td>Ver+</td>
							</tr>
						<?php
						}
					}
					else{?>
						<script type="text/javascript">alert("No se obtuvieron resultados.");</script>
						<?php
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