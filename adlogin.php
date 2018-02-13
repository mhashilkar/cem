<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['aid'])){
	header('location: admin/index.php');
}

?>
<?php 
include('includes/header.php');

if(isset($_POST['submit'])){

	include("includes/db.php");

	$adminid = mysqli_real_escape_string($conn,$_POST['adminid']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);

	//Error handlers
	//Check if input are empty
	if(empty($adminid)  || empty($password)){
		header("Location:adlogin.php?adlogin=FillAllFields");
		exit();
	}else{
		// select the user 
		$sql = "SELECT * FROM admin WHERE adminid ='$adminid' AND password = '$password'";
		$run = mysqli_query($conn,$sql);
		$row= mysqli_num_rows($run);

		if($row < 1){
			header("Location:adlogin.php?adlogin=UserWithThisId");
			exit();
		}else{
			$data = mysqli_fetch_assoc($run);
			$aid = $data['aid'];


			$_SESSION['aid'] = $aid;
			header("location: admin/index.php");

		}
	}
}

?>

<div class="container">
	<form action="adlogin.php" method="POST">
		<fieldset>

			<!-- Form Name -->
			<legend>Admin Login</legend>

			<!-- Text input--> 
			<label>Admin Id</label>
			<input  name="adminid" type="text" maxlength="8" class="input"> 
			<br>
		
			<!-- Password input-->
			<label>Password</label>
			<input name="password" type="password" > <br>
			
			<!-- Button (Double) -->
			<button  name="submit" class="button">Submit</button>
			<button name="reset" type="reset" class="button">Reset</button><br><br>


		</fieldset>
	</form>
</div>




<?php
// Include Footer
include("includes/footer.php");
?>
</body>
</html>