<?php 
session_start();
include("../includes/db.php");
	if(isset($_SESSION['id'])){
		echo "";
	}else{
		header('location: ../login.php');
	}
?>
<?php



?>