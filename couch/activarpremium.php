<?php
	if(isset($_POST['id']) and isset($_POST['tarjeta']) and isset($_POST['codigo'])){
		if(!empty($_POST['id']) and !empty($_POST['tarjeta']) and !empty($_POST['codigo'])){
			$id = $_POST["id"];
			$tarjeta = $_POST["tarjeta"];
			$codigo = $_POST["codigo"];
		}
	}
	else{
		?><script type="text/javascript">alert("Acceso denegado.");</script>
		<script type="text/javascript">window.location.replace("./index.php");</script>
		<?php
	}
	require_once('conexion.php');
	$enlace = conect();
	$fecha=date('o-m-d');
	$con = "UPDATE `usuario` SET `fechapremium`='$fecha' , `premium`='1' WHERE `usuario`.`idusuario`='$id'";
	$res = mysqli_query($enlace,$con);
	mysqli_close($enlace);
	if($res){
		require_once('sesion_class.php');
		$sesion=new sesion;
		$sesion->setPremium(1);
		$sesion->setFechaPremium($fecha);
		?><script type="text/javascript">alert("Felicidades, usted se ha vuelto un usuario premium.");</script>
		<script type="text/javascript">window.location.replace("./index.php");</script>
		<?php
	}
	else{
		?><script type="text/javascript">alert("No pudo realizarse la transaccion.");</script>
		<script type="text/javascript">window.location.replace("./index.php");</script>
		<?php
	}
?>