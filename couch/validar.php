<?php

	if( (isset($_POST['mail'])) & (isset($_POST['pass'])) ) {
		
		if( ($_POST['mail'] != "") & ($_POST['pass'] != "") ) {
	
			$mail = $_POST['mail'];
			$clave = $_POST['pass'];
			$c = md5($clave); 

			include_once('conexion.php');
			$link = conect();

			$sql = "SELECT * FROM usuario WHERE email='$mail' AND clave='$c'";
			$result = mysqli_query($link,$sql);
			$numRow = mysqli_num_rows($result);

			if($numRow > 0){

				require_once('sesion_class.php');
				$sesion = new sesion;
				$row = mysqli_fetch_array($result);
				$sesion->set($row[0], $mail, $row[6], $row[7],$clave);
				header("Location: index.php");	
			}
			else{
				?>
					<script language="javascript">
						alert('Contraseña o mail erroneo');
						window.location.href="login.php";
					</script>
				<?php
			}

		}
		else{
			?>
				<script language="javascript">
					alert('Complete todos los campos');
					window.location.href="login.php";
				</script>
			<?php
		}
	}
	else{
		?>
			<script language="javascript">
				alert('Complete todos los campos');
				window.location.href="login.php";
			</script>
		<?php
	}

?>