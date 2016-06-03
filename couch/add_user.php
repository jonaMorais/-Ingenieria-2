<?php
	$MAIL= $_POST['mail'];
	$NOM= $_POST['nombre'];
	$APE= $_POST['apellido'];
	$PAS= $_POST['pass'];
	$FEC= $_POST['datepicker'];
	$TEL= $_POST['telefono'];
	if($MAIL!=null){
		if($NOM!=null){
			if($APE!=null){
				if($PAS!=null){
					if($FEC!=null){
						if($TEL!=null){
							$enlace=mysql_connect("localhost","root")or die(mysql_error());
							$db=mysql_select_db("prueba",$enlace)or die(mysql_error());
							$con="SELECT * FROM `usuario` WHERE email='$MAIL'";
							$cla=md5($PAS);
							$con2="INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `email`, `clave`, `fechapremium`, `admin`, `premium`, `telefono`) VALUES (NULL, '$NOM', '$APE', '$MAIL', '$cla', NULL, NULL, NULL, '$TEL');";
							$res=mysql_query($con,$enlace);
							if(mysql_num_rows($res)==0){
								$res=mysql_query($con2,$enlace);
								?><script type="text/javascript">alert("Usuario agregado.");</script>
								<script type="text/javascript">window.location.replace("./registro.html");</script>
								<?php
							}
							else{
								?><script type="text/javascript">alert("Ya existe un usuario con ese E-mail.");</script><?php
								?><script type="text/javascript">window.location.replace("./registro.html");</script><?php
							}
							mysql_close($enlace);
						}
						else{
							?><script type="text/javascript">window.location.replace("El campo telefono esta vacio.");</script><?php
							?><script type="text/javascript">window.location.replace("./registro.html");</script><?php
						}
					}
					else{
						?><script type="text/javascript">window.location.replace("El campo fecha de nacimiento esta vacio.");</script><?php
						?><script type="text/javascript">window.location.replace("./registro.html");</script><?php
					}
				}
				else{
					?><script type="text/javascript">window.location.replace("El campo contraseña esta vacio.");</script><?php
					?><script type="text/javascript">window.location.replace("./registro.html");</script><?php
				}
			}
			else{
				?><script type="text/javascript">window.location.replace("El campo apellido esta vacio.");</script><?php
				?><script type="text/javascript">window.location.replace("./registro.php");</script><?php
			}
		}
		else{
			?><script type="text/javascript">window.location.replace("El campo nombre esta vacio.");</script><?php
			?><script type="text/javascript">window.location.replace("./registro.php");</script><?php
		}
	}
	else{
		?><script type="text/javascript">window.location.replace("El campo E-mail esta vacio.");</script><?php
		?><script type="text/javascript">window.location.replace("./registro.php");</script><?php
	}
?>