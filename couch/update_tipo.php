<?php
	$id=$_POST['Tipo'];
	$nom=$_POST['nombre'];
	if(isset($_POST['check'])){
		$oc=$_POST['check'];
	}
	else{
		$oc=null;
	}
	if($id!=null and $id>0){
		if($nom!=null){
			$enlace=mysql_connect("localhost","root")or die(mysql_error());
			$db=mysql_select_db("prueba",$enlace)or die(mysql_error());
			$con="SELECT * FROM `tipo_hospedaje` WHERE `idTipo`='$id'";
			$res=mysql_query($con,$enlace);
			if(mysql_num_rows($res)>0){
				if($oc!=null){
					$con2="SELECT * FROM `publicacion` p INNER JOIN `tipo_hospedaje` th ON (p.idTipo=th.idTipo)";
					$res2=mysql_query($con2,$enlace);
					if(mysql_num_rows($res2)==0){
						$con3="UPDATE `tipo_hospedaje` SET `nombre`='$nom', `oculto`='$oc' WHERE `tipo_hospedaje`.`idTipo`='$id'";
						$res3=mysql_query($con3,$enlace);
						if($res3){
							?><script type="text/javascript">alert("Tipo de couch modificado.");</script>
							<script type="text/javascript">window.location.replace("./modificar_tipo.php");</script>
							<?php
						}
						else{
							?><script type="text/javascript">alert("No se pudo modificar el tipo de couch deseado.");</script>
							<script type="text/javascript">window.location.replace("./modificar_tipo.php");</script>
							<?php
						}
					}
					else{
						?><script type="text/javascript">alert("No se pudo ocultar el tipo de couch deseado.");</script>
						<script type="text/javascript">window.location.replace("./modificar_tipo.php");</script>
						<?php
					}
				}
				else{
					$con2="UPDATE `tipo_hospedaje` SET `nombre`='$nom', `oculto`=NULL WHERE `tipo_hospedaje`.`idTipo`='$id'";
					$res2=mysql_query($con2,$enlace);
					if($res2){
						?><script type="text/javascript">alert("Tipo de couch modificado.");</script>
						<script type="text/javascript">window.location.replace("./modificar_tipo.php");</script>
						<?php
					}
					else{
						?><script type="text/javascript">alert("No se pudo modificar el tipo de couch deseado.");</script>
						<script type="text/javascript">window.location.replace("./modificar_tipo.php");</script>
						<?php
					}
				}
			}
			else{
				?><script type="text/javascript">alert("Ya existe un tipo de couch con ese nombre.");</script>
				<script type="text/javascript">window.location.replace("./modificar_tipo.php");</script>
				<?php
			}
		}
		else{
			?><script type="text/javascript">alert("El campo Nombre esta vacio.");</script>
			<script type="text/javascript">window.location.replace("./modificar_tipo.php");</script>
			<?php
		}
	}
	else{
		?><script type="text/javascript">alert("Debe seleccionar una opcion.");</script>
		<script type="text/javascript">window.location.replace("./modificar_tipo.php");</script>
		<?php
	}
	mysql_close($enlace);
?>