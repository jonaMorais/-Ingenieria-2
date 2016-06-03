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

		<main class="container">
				<?php
					//CONSULTO QUE EL EMAIL ESTE REGISTRADO EN LA BASE DE DATOS
					//conexion

					

					if(empty($_POST['email'])){
						echo '<script type="text/javascript">alert("EL CAMPO ESTA VACIO");</script>
							<meta http-equiv="REFRESH" content="0; url=formulariocontra.php">
						';
					}else{
							$email=$_POST['email'];
							include_once('conexion.php');
							$link = conect();
							mysqli_query($link,"SET NAMES 'utf8'");
							//usuario servidor
							
							//require_once("conexion.php");
							//$conect = conect();
							//consulta si esta o no en la base de datos
							$consulta="SELECT *
										FROM usuario
										WHERE(email='".$email."')";
							$resultado=mysqli_query($link,$consulta);
							$tiene=mysqli_num_rows($resultado);
							if($tiene==0){
								echo '<script type="text/javascript">alert("EL EMAIL NO SE ENCUENTRA EN EL SISTEMA");</script>';
								echo'<meta http-equiv="REFRESH" content="0; url=formulariocontra.php">';
								//echo'	<meta http-equiv="REFRESH" content="0; url=formulariocontra.html">';
							}else{
								//LE HAGO UNA CONSULTA DE UPDATE A ESE EMAIL
								echo '<script type="text/javascript">alert("SE MODIFICA LA CONTRASEÑA DEFAUL:123456");</script> ';
								$clavepredeterminada=123456;
								$claveencrip=md5($clavepredeterminada);
								$consulta2="UPDATE usuario
										SET clave='".$claveencrip."'
										WHERE(email='".$email."')";
								mysqli_query($link,$consulta2);
								echo'<meta http-equiv="REFRESH" content="0; url=index.php">';

								//echo '<meta http-equiv="REFRESH" content="0; url=formulariocontra.html"> ';
							}
							//cerrar conexion
							mysqli_close($link);
					}
				?>

		</main>
		<blockquote>

			<footer>

				Grupo 16

			</footer>

		</blockquote>	

	</body>

</html>
