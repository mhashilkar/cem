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
		if(preg_match("/^[a-zA-z]*$/", $name)){
			header("Location:../collegeEvent.php?register=invalid");
			exit();
		}else{
			//Check if email is valid
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				header("Location:../collegeEvent.php?register=invalidEmail");
				exit();
			}else{
				$sql = "SELECT * FROM users WHERE collegeid ='$collegeid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if($resultCheck > 0){
					header("Location:../collegeEvent.php?register=idIsTaken");
					exit();
				}else{
					//Insert User to database
					$sql ="INSERT INTO users (firstname, department,year,email,collegeid,password) Values ('$name','$department','$year','$email','$collegeid','$password');";
					mysqli_query($conn,$sql);
					header("Location:../collegeEvent.php?register=RegisterSucess");
					exit();

				}
				
			}
		}
		
	}
}else{
	header("Location:../collegeEvent.php");
	exit();
}

?>
