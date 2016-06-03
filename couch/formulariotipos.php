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

		<main	>

			<h3>Administracion</h3>

			<div id="lateral" class="panel panel-success">
				<div class="panel-heading-custom">
					<h3 class="panel-title">Panel title</h3>
				</div>
				<div class="panel-body">
					<ul id="opciones">
						<li><a href="agregarTipo.php">Agregar tipo de couch</a></li>
						<li><a href="#">Listar tipos</a></li>
						<li><a href="#">Algo</a></li>
						<li><a href="#">Algo</a></li>
					</ul>
				</div>
			</div>

				<form name ="formulariotipo" class="form-horizontal" action="eliminartipo.php" method="POST" onsubmit=" return validarUsuario(this)">

				<fieldset>
					<b>
						<h3>Eliminar un tipo de hospedaje:</h3>
					</b>
					<div class="form-group">
						
						
					</div>
					<?php
					         	//Realizamos la conexion
								//Estructura de control por si falla
								//seleccion de la base de datos
								//realizo la consulta
					    	     include_once('conexion.php');
								$link = conect();
								mysqli_query($link,"SET NAMES 'utf8'");
								$consulta1="SELECT count(*) as total FROM tipo_hospedaje";
								$resultado1=mysqli_query($link,$consulta1);
								$valor=mysqli_fetch_array($resultado1,MYSQLI_NUM);
								if ($valor[0]==0){
									echo '<script type="text/javascript">alert("No hay tipos de hospedaje a eliminar");
										</script> 
										';
									echo "
										<select name='tipohospedaje' style='width:200px;'>
												<option value='--------'>--------</option>
										</select>
									";
								}else{

										
										$consulta2="SELECT nombre FROM tipo_hospedaje";
										//guardamos la consulta
										$resultado2=mysqli_query($link,$consulta2);
					     		     	//mostramos en el select las opciones
					     		     	echo "<select class='form-control' name='tipohospedaje' style='width:200px;'>";
					       		   		while($fila = mysqli_fetch_array($resultado2)){
											echo "
												
												<option value='".$fila['nombre']."'>".$fila['nombre']."</option>
												
												";
										}
										echo "</select> <br>                            ";
										echo "   <input class='btn btn-color' name='enviar' id='enviar'  type='button' onclick='pregunta()' value='Eliminar'>";

					       		}
								//cerrar conexion
								mysqli_close($link);

							?>
							<button class='btn btn-color' type="button" onclick="location.href = 'administracion.php'">Volver</button>
				</fieldset>
				

			</form>

							
		
		</main>
		
		<blockquote>

			<footer>

				Grupo 16

			</footer>

		</blockquote>	

	</body>

</html>