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
			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Buscar publicacion">
					
					<input type="submit" class="btn btn-default" value="buscar">
				</div>
			</form>
			<ul class="nav navbar-nav navbar-right">
			<?php
				if($sesion->get() != false){
					echo "<li><a href=#>Publicar Couch</a></li>";
					$datos = $sesion->get();
					?>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $datos['email'];?><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Perfil</a></li>
							<?php
								if($datos['roll'] != null){
									?>
										<li><a href="administracion.php">Administracion</a></li>
									<?php
								}			
							?>
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