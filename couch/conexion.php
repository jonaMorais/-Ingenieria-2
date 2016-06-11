<?php

	function conect(){

		$server_link = mysqli_connect("Localhost","root","","prueba") or die("Error: " . mysqli_error());
		mysqli_set_charset($server_link,'utf8');
		return $server_link;
	}


?>