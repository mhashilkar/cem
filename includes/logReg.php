<?php 
// DataBase Handling Of Login/Register Page.

if(isset($_POST['submit'])){
	include_once("db.php");

	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$department = mysqli_real_escape_string($conn,$_POST['department']);
	$year = mysqli_real_escape_string($conn,$_POST['year']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$collegeid = mysqli_real_escape_string($conn,$_POST['collegeid']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);

	//Error Handlers
	//
	if(empty($name) || empty($department) || empty($year) || empty($email) || empty($collegeid) || empty($password)) {
		header("Location:../collegeEvent.php?register=empty");
		exit();
	}else{
		// Check if input Characters are valid
		if(!preg_match('/[^a-zA-Z0-9\.]/', $your_variable)){}
//54.38

	}
}else{
	header("Location:../collegeEvent.php");
	exit();
}

?>