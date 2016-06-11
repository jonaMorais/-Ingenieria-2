<?php
	if(isset($_POST['email']) and !empty($_POST['email'])){
		$email=$_POST['email'];
		include_once('conexion.php');
		$link = conect();
		$consulta="SELECT * FROM usuario WHERE email='$email'";
		$resultado=mysqli_query($link,$consulta);
		if(mysqli_num_rows($resultado)==0){
			?><script type="text/javascript">alert("El E-mail ingresado no existe en el sistema.");</script><?php
			?><script type="text/javascript">window.location.replace("./index.php");</script><?php
		}else{
			$clavepredeterminada=123456;
			$claveencrip=md5($clavepredeterminada);
			$consulta2="UPDATE usuario SET clave='$claveencrip' WHERE email='$email'";
			$res=mysqli_query($link,$consulta2);
			if($res){
				mysqli_close($link);
				?><script type="text/javascript">alert("La contrase\361a fue modificada, su nueva contrase\361a es: 123456.");</script><?php
				?><script type="text/javascript">window.location.replace("./index.php");</script><?php
			}
			else{
				mysqli_close($link);
				?><script type="text/javascript">alert("La contrase\361a no pudo ser modificada.");</script><?php
				?><script type="text/javascript">window.location.replace("./index.php");</script><?php
			}
		}
	}
	else{
		header("Location: index.php");
	}
?>