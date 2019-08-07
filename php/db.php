<?php
	$con = new mysqli("localhost", "root", "", "higherfeat");

	if($con->connect_error){
		$error = $con->connect_error;
	}


?>