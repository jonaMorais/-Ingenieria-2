<?php

	require_once('sesion_class.php');
	$sesion = new sesion;

	if( (isset($_POST['claveAct'])) & (isset($_POST['pass1'])) & (isset($_POST['pass2'])) ) {
		
		if( ($_POST['claveAct'] != "") & ($_POST['pass1'] != "") & ($_POST['pass2'] != "") ) {
	
			if($_POST['pass1'] != $_POST['claveAct']){
				if($_POST['pass1'] == $_POST['pass2']){

					$claveAct= $_POST['claveAct'];
			
					$pass1 = $_POST['pass1'];
					$p1 = md5($pass1);
				
					include_once('conexion.php');
					$link = conect();

					$datos = $sesion->get();

					if($datos['pass'] == $claveAct){
						$id = $datos['idusuario'];
						$sql = "UPDATE usuario SET clave='$p1' WHERE idusuario='$id'";
						if(mysqli_query($link,$sql)){
							?>
								<script language="javascript">
									alert('Su contraseña ha sido actualizada correctamente');
									window.location.href="index.php";
								</script>
							<?php
						}
						else{
							?>
								<script language="javascript">
									alert('No se pudo actualizar su contraseña, intentelo nuevamente');
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

?>