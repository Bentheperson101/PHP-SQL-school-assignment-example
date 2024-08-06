<!--
	Benjamin Kosty
	connectDB.php
	8/13/2023
-->

<?php
	$servername = $_POST['servername'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$dbName = "assignment_example";
	
	$dbConn = mysqli_connect($servername, $username, $password, $dbName);
	if(!$dbConn)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected Successfully <br>";
	
	$dbObj = mysqli_select_db($dbConn, $dbName);
?>