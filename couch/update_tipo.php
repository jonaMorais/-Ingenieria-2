<?php
	require_once('sesion_class.php');
	$sesion= new sesion();
	if($sesion->get()!=false){
		if($sesion->getRoll()!=1){
			?><script type="text/javascript">alert("Usted no es administrador.");</script>
			<script type="text/javascript">window.location.replace("./index.php");</script>
			<?php
		}
	}
	else{
		?><script type="text/javascript">alert("Acceso denegado.");</script>
		<script type="text/javascript">window.location.replace("./index.php");</script>
		<?php
	}	
	if(isset($_POST['Tipo']) and isset($_POST['nombre'])){
		if(!empty($_POST['Tipo']) and !empty($_POST['nombre'])){
			$id=$_POST['Tipo'];
			$nom=$_POST['nombre'];
			if(isset($_POST['check'])){
				$oc=$_POST['check'];
			}
			else{
				$oc=null;
			}
		}
		require_once('conexion.php');
		$enlace=conect();
		$con="UPDATE `tipo_hospedaje` SET `nombre`='$nom', `oculto`='$oc' WHERE `tipo_hospedaje`.`idTipo`='$id'";
		$res=mysqli_query($enlace, $con);
		if($res){
			?><script type="text/javascript">alert("Tipo de couch modificado.");</script>
			<script type="text/javascript">window.location.replace("./listarTipos.php");</script>
			<?php
		}
		else{
			?><script type="text/javascript">alert("Ya existe un tipo de couch con ese nombre.");</script>
			<script type="text/javascript">window.location.replace("./listarTipos.php");</script>
			<?php
		}
	}
	else{
		header("Location: index.php");
	}
?>