<?php

	function ver_tipos(){
		$enlace=mysql_connect("localhost","root")or die(mysql_error());
		$db=mysql_select_db("prueba",$enlace)or die(mysql_error());
		$con="SELECT * FROM `tipo_hospedaje`";
		$res=mysql_query($con,$enlace);
		mysql_close($enlace);
		if(mysql_num_rows($res)>0){
			while($fila=mysql_fetch_array($res)){
					$row[]=$fila;
			}
			return $row;
		}
		else{
			$row=[];
			return $row;
		}
	}
?>