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
				$email2=$_SESSION['email'];

				$email=$_POST['email'];
				$nombre=$_POST['nombre'];
				$apellido=$_POST['apellido'];
				$telefono=$_POST['telefono'];
				//SE PUEDE DEJAR VACIO ES OPCIONAL
				$sexo=$_POST['sexo'];
				$imagen=$_POST['imagen'];
				$vari=true;
				$mensaje='';
				//CONEXION CON BASE DE DATOS
				include_once('conexion.php');
				$link = conect();
				mysqli_query($link,"SET NAMES 'utf8'");
				//realizo la consulta
				//VALIDAR LOS DATOS

				if(empty($email)){
					$mensaje=$mensaje.'EL CAMPO EMAIL ESTA VACIO - ';
					$vari=false;

				}else{
						//realizo la consulta
						//si distinto al mio
						if($email!=$email2){
							$consulta1="SELECT COUNT(*) AS total
										FROM usuario
										WHERE (email='".$email."') and (email != '".$email2."')";
							$result=mysqli_query($link,$consulta1);
							$valor=mysqli_fetch_array($result,MYSQLI_NUM);
							
							if($valor[0]==1){
								$mensaje=$mensaje.'EL EMAIL SIENDO USADO  - ';
								$vari=false;
							}else{
								$_SESSION['email']=$email;
							}


						}

				}
				if(empty($nombre)){
					$mensaje=$mensaje.'EL CAMPO NOMBRE ESTA VACIO - ';
					$vari=false;
				}
				if(empty($apellido)){
					$mensaje=$mensaje.'EL CAMPO APELLIDO ESTA VACIO - ';
					$vari=false;
				}
				if(empty($telefono)){
					$mensaje=$mensaje.'EL CAMPO TELEFONO ESTA VACIO - ';
					$vari=false;
				}
				
				

				if($vari==true){
					if(!empty($imagen)){
						//elegi una imagen se la cargo
						$consulta="UPDATE usuario SET nombre='".$nombre."',apellido='".$apellido."',email='".$email."',telefono=".$telefono.",sexo='".$sexo."',fotop='".$imagen."' WHERE (email='".$email2."')";
						mysqli_query($link,$consulta);
						echo '<script type="text/javascript">alert("MODIFICACION REALIZADA");</script>
							  <meta http-equiv="REFRESH" content="0; url=formularioperfilmod.php">';
					}else{
						//no elegi ninguna imagen dejo como esta
						$consulta2="UPDATE usuario SET nombre='".$nombre."',apellido='".$apellido."',email='".$email."',telefono=".$telefono.",sexo='".$sexo."' WHERE (email='".$email2."')";
						mysqli_query($link,$consulta2);
						echo '<script type="text/javascript">alert("MODIFICACION REALIZADA");</script>
								<meta http-equiv="REFRESH" content="0; url=formularioperfilmod.php">';

					}
				}else{
					echo '	<script type="text/javascript">alert("'.$mensaje.'");</script>
							<script type="text/javascript">alert("ERROR DEL FORMULARIO");</script>
							<meta http-equiv="REFRESH" content="0; url=formularioperfilmod.php">';
				}
				//cerrar conexion
				mysqli_close($link);

			?>

				</main>



		<blockquote>

			<footer>

				Grupo 16

			</footer>

		</blockquote>	

	</body>

</html>

