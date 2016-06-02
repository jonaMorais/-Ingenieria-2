<?php
	$MAIL= $_POST['mail'];
	$PAS= $_POST['pass'];
	if($MAIL!=null){
		if($PAS!=NULL){
			$enlace=mysql_connect("localhost","root")or die(mysql_error());
			$db=mysql_select_db("prueba",$enlace)or die(mysql_error());
			$cla=md5($PAS);
			$con="SELECT * FROM `usuario` WHERE email='$MAIL' and clave='$cla'";
			$res=mysql_query($con,$enlace);
			if(mysql_num_rows($res)>0){
				$fila=mysql_fetch_array($res);
				require_once('sesion_class.php');
				$sesion=new sesion;
				$ROLL= $fila[6];
				$sesion->set($MAIL,$PAS,$ROLL);
				mysql_close($enlace);
				?><script type="text/javascript">alert("Usted se ha logeado correctamente.");</script>
				<script type="text/javascript">window.location.replace("./index.php");</script>
				<?php
			}
			else{
				?><script type="text/javascript">alert("Usuario o Contraseña incorrecta.");</script>
				<script type="text/javascript">window.location.replace("./login.html");</script>
				<?php
			}
		}
		else{
			?><script type="text/javascript">alert("El campo Email esta vacio.");</script>
			<script type="text/javascript">window.location.replace("./login.html");</script>
			<?php
		}
	}
	else{
		?><script type="text/javascript">alert("El campo Contraseña esta vacio.");</script>
		<script type="text/javascript">window.location.replace("./login.html");</script>
		<?php
	}
?>