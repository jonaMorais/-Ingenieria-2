<?php

	require_once('sesion_class.php');
	$sesion = new sesion;
	if($sesion->get()!=false){
		?><script type="text/javascript">alert("Usted ya esta logueado.");</script>
		<script type="text/javascript">window.location.replace("./index.php");</script>
		<?php
	}

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
			mysqli_close($link);
			if($numRow > 0){
				$row = mysqli_fetch_array($result);
				$sesion->setidUsuario($row[0]);
				$sesion->setMail($mail);
				$sesion->setRoll($row[6]);
				$sesion->setPremium($row[5]);
				$sesion->setFechaPremium($row[7]);
				$sesion->setPassword($clave);
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