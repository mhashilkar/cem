<?php 

session_start();
if(isset($_POST['submit'])){

	include("db.php");

	$collegeid = mysqli_real_escape_string($conn,$_POST['collegeid']);
	$department = mysqli_real_escape_string($conn,$_POST['department']);
	$year = mysqli_real_escape_string($conn,$_POST['year']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);

	//Error handlers
	//Check if input are empty
	if(empty($collegeid) || empty($department) || empty($year) || empty($password)){
		header("Location:../collegeEvent.php?login=FillAllFields");
		exit();
	}else{
		// select the user 
		$sql = "SELECT * FROM users WHERE collegeid ='$collegeid' AND department='$department' AND year='$year' AND password='$password' ";

		$result = mysqli_query($conn,$sql);
		$row = mysqli_num_rows($result);
			if($row < 1){
				header("Location:../collegeEvent.php?login=Passwordinvalid");
				exit();
			}
		}
}else{
	header("Location:../collegeEvent.php?login=error");
	exit();
}

?>