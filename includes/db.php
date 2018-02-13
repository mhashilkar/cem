<?php
$hostname = "localhost";
$username = "root";
$password = "Mhashilkar@786";
$dbName = "cem";

$conn = mysqli_connect($hostname, $username, $password, $dbName);

// Check data IS connected
if(!$conn){
	echo "Not Connected";
}

?>
