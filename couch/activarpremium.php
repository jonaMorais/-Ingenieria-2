<!DOCTYPE html>

<html>

	<?php

		require_once('sesion_class.php');
		$sesion= new sesion;
		
		//---Incluimos el head
		include_once('view/head.html');
		
	?>

	<script>
			function valida(e){
			    tecla = (document.all) ? e.keyCode : e.which;
			    //Tecla de retroceso para borrar, siempre la permite
			    if (tecla==8){
			        return true;
			    }
			    // Patron de entrada, en este caso solo acepta numeros
			    patron =/[0-9]/;
			    tecla_final = String.fromCharCode(tecla);
			    return patron.test(tecla_final);
			}
		</script>
		<script language="Javascript"> 
				function pregunta(){ 
					if (confirm('¿Estas seguro de activar el premium?')){ 
     					  document.formulariopremium.submit() 
   					 } 
				} 
		</script>
	<body class="container">

		<?php

			//---Incluimos el header
			include_once('view/header.html');

			//---Incluimos el nav
			include_once('view/navBar/navBar.php');

		?>

		<main>

			<?php
				
				
				//SE VERIFICA LA INFORMACION Y SE ACTUALIZA INFORMACION DEL USUARIO PARA Q SEA PREMIUM
				//puedo acceder al registro del que inicio sesion
				if(empty($_SESSION['email'])){
					echo '<script type="text/javascript">alert("NO INICIO SESION");</script> 
						<meta http-equiv="REFRESH" content="0; url=index.php">
					';

				}else{
						$email=$_SESSION['email'];				
						//variables del formulario
						$NumeTarjeta=$_POST['NumeroTar'];
						$CodigoSeg=$_POST['CodSeg'];
						//en caso q no cumpla algunos de los campos se pasara a false
						$DatosValidos=true;
						$mensaje='';
						//VALIDAR CAMPOS
						//validacion de la tarjeta de credito
						if(empty($NumeTarjeta)){
							$mensaje='EL CAMPO NUMERO DE TARJETA ESTA VACIO - ';
							$DatosValidos=false;
						}else{
							if(strlen($NumeTarjeta)!= 16){
								$mensaje=$mensaje.'INGRESAR LOS 16 DIGITOS DE LA TARJETA - ';
								$DatosValidos=false;
							}
						}
					
						//validacion codigo de seguridad
						echo '<br>';
						if(empty($CodigoSeg)){
							$mensaje=$mensaje.'EL CAMPO CODIGO DE SEGURIDAD ESTA VACIO - ';
							$DatosValidos=false;
						}else{
							if(strlen($CodigoSeg)!=4){
								$mensaje=$mensaje.'INGRESE LOS 4 DIGITOS DE SEGURIDAD - ';
								$DatosValidos=false;
							}
						}
						//AVISAR QUE YA ES PREMIUM
						//obtengo por el email si es premium o no
								
						//TODOS LOS CAMPOS CORRECTOS Y VALIDADOS
						echo '<br>';
						if($DatosValidos==true){
							//Realizamos la conexion
							include_once('conexion.php');
							$link = conect();
							mysqli_query($link,"SET NAMES 'utf8'");
							//realizo la consulta
							//obtengo por el email el premium y edito
							//CONSULTA SI YA ES PREMIUM
							$resultado=mysqli_query($link,"SELECT premium 
														   FROM usuario 
														   WHERE (email='".$email."')
														   ");
							//convierto en un valor puede ser 0 o 1 
							$datopremium=mysqli_fetch_array($resultado,MYSQLI_NUM);
							//realizo la consulta
							//depende de lo q sea se le notificara o se lo enviara al formulario para proceder
							if($datopremium[0]>0){
								echo'
									<script type="text/javascript">alert("USTED YA ES PREMIUM");</script>
									<meta http-equiv="REFRESH" content="0; url=formulariopremium.php">
									';
							}else{
									//habilita a ser premium
									$consultapremium=("UPDATE usuario 
													   SET premium=1
													   WHERE email='".$email."' ");
									mysqli_query($link,$consultapremium);
									//le asigno una fecha
									$fecha=date('o-m-d');
									$consultafecha=("UPDATE usuario
													 SET fechapremium='".$fecha."'
													 WHERE email='".$email."'
													");
									mysqli_query($link,$consultafecha);
									//cerrar conexion
									mysqli_close($link);
									echo '<script type="text/javascript">alert("VALIDANDO INFORMACION...");</script>';
									echo '<script type="text/javascript">alert("USTED SE AH HECHO PREMIUM");</script>
											<meta http-equiv="REFRESH" content="0; url=index.php">';
								}
						}else{
							//CAMPOS INCOMPLETOS O INVALIDOS
							echo '<script type="text/javascript">alert("'.$mensaje.'");</script>
								  <script type="text/javascript">alert("ERROR DEL FORMULARIO");</script>
								  <meta http-equiv="REFRESH" content="0; url=formulariopremium.php">';
						}
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


