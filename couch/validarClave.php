<?php

	require_once('sesion_class.php');
	$sesion = new sesion;
	if($sesion->get()==false){
		?>
			<script language="javascript">
				window.location.href="index.php";
			</script>
		<?php
	}
	if( (isset($_POST['claveAct'])) & (isset($_POST['pass1'])) & (isset($_POST['pass2'])) ) {	
		if( ($_POST['claveAct'] != "") & ($_POST['pass1'] != "") & ($_POST['pass2'] != "") ) {
			if($_POST['pass1'] != $_POST['claveAct']){
				if($_POST['pass1'] == $_POST['pass2']){
					$claveAct= $_POST['claveAct'];
					$pass1 = $_POST['pass1'];
					$p1 = md5($pass1);
					include_once('conexion.php');
					$link = conect();
					$datos = $sesion->getPass();
					if($datos == $claveAct){
						$id = $sesion->getIdUsuario();
						$sql = "UPDATE usuario SET clave='$p1' WHERE idusuario='$id'";
						if(mysqli_query($link,$sql)){
							mysqli_close($link);
							$sesion->setPassword($pass1);
							?>
								<script language="javascript">
									alert('Su contrase\361a ha sido actualizada correctamente');
									window.location.href="index.php";
								</script>
							<?php
						}
						else{
							mysqli_close($link);
							?>
								<script language="javascript">
									alert('No se pudo actualizar su contrase\361a, intentelo nuevamente');
									window.location.href="cambiarContr.php";
								</script>
							<?php
						}	
					}
					else{
						?>
							<script language="javascript">
								alert('Clave actual erronea');
								window.location.href="cambiarContr.php";
							</script>
						<?php
					}
				}
			}
			else{
				?>
					<script language="javascript">
						alert('La nueva clave debe ser diferente a la anterior');
						window.location.href="cambiarContr.php";
					</script>
				<?php
			}
		}
		else{
			?>
				<script language="javascript">
					alert('Complete todos los campos');
					window.location.href="cambiarContr.php";
				</script>
			<?php
		}
	}
	else{
		?>
			<script language="javascript">
				window.location.href="index.php";
			</script>
		<?php
	}

?>