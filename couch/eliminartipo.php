<!DOCTYPE html>

<html>

	<?php

		require_once('sesion_class.php');
		$sesion= new sesion;

		//---Incluimos el head
		include_once('view/head.html');

	?>
	<script language="Javascript"> 
				function pregunta(){ 

					if (confirm('¿Estas seguro de eliminar el tipo de hospedaje?')){ 
     					  document.formulariotipo.submit() 
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
			<!-- CHEQUEO SI ESTA SIENDO UTILIZADO POR UNA PUBLICACION, EN CASO Q NO ELIMINO -->
			<?php
					//tipo de hospedaje elegido
					$nombre=$_POST['tipohospedaje'];
					//Realizamos la conexion
					include_once('conexion.php');
					$link = conect();
					mysqli_query($link,"SET NAMES 'utf8'");
					//realizo la consulta
					//el tipo elegido se encuentra en alguna publicacion
					$consulta="	SELECT count(*) AS total 
								FROM publicacion INNER JOIN tipo_hospedaje ON publicacion.idTipo = tipo_hospedaje.idTipo
								WHERE (tipo_hospedaje.nombre='".$nombre."');
																";
					$resultado=mysqli_query($link,$consulta);
					$valor=mysqli_fetch_array($resultado,MYSQLI_NUM);
				
					//si esta se envia un msj - sino se elimina para elegir el tipo
					
					if($valor[0]>0){
						echo'	<script type="text/javascript">alert("NO SE PUEDE ELIMINAR, ESTA SIENDO UTILIZADO EN UNA PUBLICACION");</script>
								<meta http-equiv="REFRESH" content="0; url=formulariotipos.php">
								';
					}else{
							//SE ELIMINA EL HOSPEDAJE YA QUE NO ESTA LIGADO A UNA PUBLICACION
							mysqli_query($link,"DELETE FROM tipo_hospedaje 
													WHERE (nombre='".$nombre."')");
							//ESTA CONSULTA ES CONTROLAR SI LA TABLA ESTA VACIA DONDE REDIRECCIONAR Y NO SEGUIR MOSTRANDO EL FORMULARIO DE ELIMINACION
							$consulta="SELECT count(*) AS cant
									   FROM tipo_hospedaje";
							$resultadodos=mysqli_query($link,$consulta);
							$rowdos=mysqli_fetch_array($resultadodos,MYSQLI_NUM);
							if($rowdos[0]>0){
								echo '	<script type="text/javascript">alert("SE ELIMINO CORRECTAMENTE");</script>
										<meta http-equiv="REFRESH" content="0; url=formulariotipos.php">';
							}
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


