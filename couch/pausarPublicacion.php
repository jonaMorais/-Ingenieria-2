<?php
	require_once('sesion_class.php');
	$sesion= new sesion;
	$idusu=$sesion->getIdUsuario();
	if(isset($idusu)){
		if($idusu!='' & $idusu!=null){
			if(isset($_POST['pausar'])){
				if(!empty($_POST['pausar'])){
					$idpubli=$_POST['pausar'];
					require_once('conexion.php');
					$enlace=conect();
					$consulta2="UPDATE `publicacion` SET `oculto`=1 WHERE (idPublicacion=$idpubli)";
					$res=mysqli_query($enlace,$consulta2);
					if($res){
						mysqli_close($enlace);
						?><script type="text/javascript">alert("La publicacion fue pausada.");</script>
						<script type="text/javascript">window.location.replace("./mis_publicaciones.php");</script>
						<?php
					}else{
						mysqli_close($enlace);
						?><script type="text/javascript">alert("La publicacion no puede ser pausada");</script>
						<script type="text/javascript">window.location.replace("./mis_publicaciones.php");</script>
						<?php		
					}
				}else{
					?>
						<script type="text/javascript">alert("No hay una publicacion a pausar");</script>
						<script type="text/javascript">window.location.replace("./mis_publicaciones.php");</script>
					<?php
				}
			}else{
				?>
					<script type="text/javascript">alert("No hay una publicacion a pausar");</script>
					<script type="text/javascript">window.location.replace("./mis_publicaciones.php");</script>
				<?php
			}


		}else{
			?>
				<script type="text/javascript">alert("No hay una sesion iniciada");</script>
				<script type="text/javascript">window.location.replace("./index.php");</script>
			<?php
		}
	}else{
		?>
			<script type="text/javascript">alert("No hay una sesion iniciada");</script>
			<script type="text/javascript">window.location.replace("./index.php");</script>
		<?php
	}
?>