<?php
	session_start();
	$username = "root";
	$password = "root";
	$hostname = "localhost"; 

	$conn = mysqli_connect($hostname, $username, $password, "paradox.io") 
	 or die("Unable to connect to MySQL.");

?>