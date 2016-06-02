<?php

	function conect(){

		$server_link = mysqli_connect("Localhost","root","","prueba") or die("Error: " . mysql_error());
		return $server_link;
	}


?>