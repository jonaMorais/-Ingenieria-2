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
				<!-- FORMULARIO DE TARJETA  -->
			<!-- ACA SE INGRESA LOS DATOS DE LA TARJETA SE VERIFICA Y SE ACTIVA EL PREMIUM-->
			<form class="form-horizontal" name="formulariopremium" action="activarpremium.php" method="POST" onsubmit=" return validar()">

				<fieldset>
					
					<b>
						<h3>Formulario de Tarjeta</h3>
					</b>
					<div class="form-group">
						<label for="mail">Numero de tarjeta: </label>
						<input type="text" name="NumeroTar" size="18" onkeypress="return valida(event)" maxlength="16" />
					</div>

					<div class="form-group">
						<label for="pass">Codigo de seguridad: </label>
						<input type="text" name="CodSeg"  size="5" onkeypress="return valida(event)" maxlength="4">
					</div>
					<div class="form-group">
							<label for="dato">Costo por Ser Premium: u$s 20 final</label>
					</div>
					<input class="btn btn-color" type="button" onclick="pregunta()" value="Activar Premium"/>
					<button class="btn btn-color" type="button" onclick="location.href = 'index.php'">Volver</button>
						
			</form>



		</main>
		
		<blockquote>

			<footer>

				Grupo 16

			</footer>

		</blockquote>	

	</body>

</html>
