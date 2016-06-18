<?php
	require_once('sesion_class.php');
	$sesion= new sesion;
	$idusu=$sesion->getIdUsuario();	
	if(isset($idusu)){
		if($idusu!='' & $idusu!=null){
			if(isset($_POST['publicacion'])){
				if($_POST['publicacion']!='' & $_POST['publicacion']!=null){
					$idpubli=$_POST['publicacion'];
					require_once('conexion.php');
					$enlace=conect();
					$consulta="SELECT count(*) as total
							   FROM publicacion INNER JOIN usuariosolicita ON publicacion.idPublicacion = usuariosolicita.idPublicacion
							   WHERE (publicacion.idPublicacion = '$idpubli')
							   ";
					$res=mysqli_query($enlace,$consulta);
					$valor=mysqli_fetch_array($res,MYSQLI_NUM);
					if($valor[0]>0){
						?><script type="text/javascript">alert("La publicacion no puede ser eliminada, porque tiene solicitudes pendientes");</script>
						  <script type="text/javascript">window.location.replace("./mis_publicaciones.php");</script>
						<?php
					}else{
						$con="DELETE FROM `publicacion` WHERE idPublicacion='$idpubli'";
						$res=mysqli_query($enlace,$con);
						if($res){
							mysqli_close($enlace);
							?><script type="text/javascript">alert("La publicacion fue eliminada.");</script><?php
							?><script type="text/javascript">window.location.replace("./mis_publicaciones.php");</script><?php
						}
						else{
							mysqli_close($enlace);
							?><script type="text/javascript">alert("La publicacion no pudo ser eliminada.");</script><?php
							?><script type="text/javascript">window.location.replace("./mis_publicaciones.php");</script><?php
						}
					}

				}else{
						?>
						<script type="text/javascript">alert("No hay una publicacion a eliminar");</script>
						<script type="text/javascript">window.location.replace("./mis_publicaciones.php");</script>
						<?php
					}
			}else{
				?>
				<script type="text/javascript">alert("No hay una publicacion a eliminar");</script>
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