<?php
	$hostname="localhost";
	$username="root";	
	$password="2603";
	$dbname="library";
	$con=mysqli_connect($hostname,$username,$password,$dbname);
	if(!$con)
		die("connection failed".mysqli_connect_error());
?>