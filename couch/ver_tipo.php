<?php

	function ver_tipo($id){
		$enlace=mysql_connect("localhost","root")or die(mysql_error());
		$db=mysql_select_db("prueba",$enlace)or die(mysql_error());
		$con="SELECT * FROM `tipo_hospedaje` WHERE `idTipo`='$id'";
		$res=mysql_query($con,$enlace);
		mysql_close($enlace);
		if(mysql_num_rows($res)>0){
			$fila=mysql_fetch_array($res);
			return $fila;
		}
		else{
			$fila=[];
			return $fila;
		}
	}
?>