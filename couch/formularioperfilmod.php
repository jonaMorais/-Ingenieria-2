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
					if (confirm('¿Estas seguro de modificar su perfil?')){ 
     					  document.formulariomodificar.submit() 
   					 } 
				} 
		</script>
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
	<body class="container">

		<?php

			//---Incluimos el header
			include_once('view/header.html');

			//---Incluimos el nav
			include_once('view/navBar/navBar.php');

		?>

		<main class="container">
				<form class='form-horizontal' name='formulariomodificar' action='modificarperfil.php' method='post' onsubmit=" return validar(this)">
					
					<?php
						$emails=$_SESSION['email'];
						//Realizamos la conexion
						include_once('conexion.php');
						$link = conect();
						mysqli_query($link,"SET NAMES 'utf8'");
						//realizo la consulta
						$consulta="SELECT email, nombre, apellido,  fechanacimiento, telefono, sexo, fotop
									FROM usuario 
									WHERE (email='".$emails."') ";

						//guardamos la consulta
						//MAQUETACION DEL FORMULARIO Y CARGA DE INFORMACION 
						$resultado=mysqli_query($link,$consulta);
						while($fila = mysqli_fetch_array($resultado)){
							echo " 	
							<fieldset>
							
								<b>
									<h3>Modificar Perfil</h3>
								</b>
								<div class='form-group'>
									<label for='email'>E-mail: </label>
									<input class='form-control' type='email' name='email' size='25'  value= '".$fila['email']."' required/>
								</div>
								<div class='form-group'>
									<label for='nombre'>Nombre: </label>
									<input class='form-control' type='text' name='nombre' size='25'  value= '".$fila['nombre']."' required/>
								</div>
								<div class='form-group'>
									<label for='apellido'>Apellido: </label>
									<input class='form-control' type='text' name='apellido' size='25'  value= '".$fila['apellido']."' required/>
								</div>
								<div class='form-group'>
									<label for='telefono'>Telefono: </label>
									<input class='form-control' type='text' onkeypress='return valida(event)' name='telefono' size='20'  value= ".$fila['telefono']." required/>
								</div>
								<div class='form-group'>
									<label for='fechanacimiento'>Fecha de nacimiento: </label>
									<input class='form-control' readonly type='text' name='fechanacimiento' size='20'  value= '".$fila['fechanacimiento']."' required/>
								</div>
								<b>
										<h3>Opcional </h3>
								</b>
								
									<div class='form-group'>
										<label for='sexo'>Sexo: </label>
										<select name='sexo' style='width:200px;'>
										"
											?>
											<?php
											if(empty($fila['sexo'])){
												//si esta vacio
												echo "<option value='".$fila['sexo']."'>---------</option>
													  <option value='masculino'>masculino</option>
													  <option value='femenino'>femenino</option>
												";

											}else{
												if($fila['sexo']=='masculino'){
													echo "<option value='".$fila['sexo']."'>".$fila['sexo']."</option>
													<option value='femenino'>femenino</option>";

												}else{
													echo "<option value='masculino'>masculino</option>
													<option value='".$fila['sexo']."'>".$fila['sexo']."</option>";
												}
											}
											?>
											<?php
											echo
										"
										</select>
									</div>
									<div class='form-group'>
										<label for='imagen'>Imagen de Perfil: </label>
										<input  type='file' name='imagen' id='imagen' value='img/".$fila['fotop']."'/>
																	
										"
										?>
										<?php
										if(empty($fila['fotop'])){
											echo"<label> Actualmente sin imagen </label>";
										}else{
											echo "
												<label> Imagen actual </label> <br>
												<img id='imagenperfil' alt='imagen perfil' width=300px heigth=300px src='img/".$fila['fotop']."'>
												</div>
												";
										}
										?>
										<?php
										echo "</div>";
								}
								//cerrar conexion
								mysqli_close($link);
					?>		

			<tr>
			<td>
				<input class='btn btn-color' type="button" onclick="pregunta()" value="Modificar"/>
				<button class='btn btn-color' type="button" onclick="location.href = 'index.php'">Volver</button>
			</td>
			</tr>
		</form>

		</main>



		<blockquote>

			<footer>

				Grupo 16

			</footer>

		</blockquote>	

	</body>

</html>

