<?php
	//////////Establishing Database connection
	$server = "localhost";
	$username = "root";
	$password = "password";
	$dbname = "spk";
	
	$connection = mysqli_connect($server, $username, $password, $dbname);
	
	if(!$connection){
		die("Awaiting Resources");
	}
?>