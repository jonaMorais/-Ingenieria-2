<?php
	require_once('sesion_class.php');
	$sesion = new sesion;
	if($sesion->get()==false){
		?>
		<script type="text/javascript">alert("Acceso denegado!!!");</script>
		<script type="text/javascript">window.location.replace("./index.php");</script>
		<?php
	}
	else{
		$sesion->logout();
		header("Location: index.php");
	}
?>