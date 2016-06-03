<nav class="navbar navbar-couch">

	<div class="container-fluid">

		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button id="nav-toggle-button" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Inicio<span class="sr-only">(current)</span></a></li>
				<li><a href="publicaciones.php">Publicaciones</a></li>
			</ul>
			<form class="navbar-form navbar-left" role="search" action="listado.php" method="POST" onsubmit=" return validarBusqueda(this)">
				<div class="form-group">
					<input type="text" id="busqueda" name="busqueda" class="form-control" placeholder="Buscar couch">
					<input class="btn btn-default" type="button" value="Avanzado" onclick="window.location.href='./avanzado.php'">
					<input type="submit" class="btn btn-default" value="buscar">
				</div>
			</form>
			<ul class="nav navbar-nav navbar-right">
			<?php
				if($sesion->get()!=false){
					$nom=$sesion->get();
					if($nom['roll']!=null){?>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Administracion<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Ver tipos de couch</a></li>
								<li><a href="agregarTipo.php">Agregar tipo de couch</a></li>
								<li><a href="modificar_tipo.php">Modificar tipo de couch</a></li>
								<li><a href="#">Eliminar tipo de couch</a></li>
							</ul>
						</li><?php
					}
					echo "<li><a href=#>Publicar Couch</a></li>";
					?>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $nom['email'];?><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Perfil</a></li>
							<li><a href="cambiarContr.php">Modificar constraseña</a></li>
							<li><a href="logout.php">Cerrar Sesión</a></li>
						</ul>
					</li>
					<?php
				}
				else{
					echo "<li><a href=registro.php>Registrarse</a></li>";
					echo "<li><a href=login.php>Iniciar sesion</a></li>";
				}
			?>
			</ul>
		</div><!-- /.navbar-collapse -->

	</div><!-- /.container-fluid -->

</nav>