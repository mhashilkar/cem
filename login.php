<?php
session_start();
if(isset($_SESSION['id'])){
	header('location: user/index.php');
}

?>
<?php 
include('includes/header.php');

if(isset($_POST['submit'])){

	include("includes/db.php");

	$collegeid = mysqli_real_escape_string($conn,$_POST['collegeid']);
	$department = mysqli_real_escape_string($conn,$_POST['department']);
	$year = mysqli_real_escape_string($conn,$_POST['year']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);

	//Error handlers
	//Check if input are empty
	if(empty($collegeid) || empty($department) || empty($year) || empty($password)){
		header("Location:login.php?login=FillAllFields");
		exit();
	}else{
		// select the user 
		$sql = "SELECT * FROM users WHERE collegeid ='$collegeid' AND password = '$password'";
		$run = mysqli_query($conn,$sql);
		$row= mysqli_num_rows($run);

		if($row < 1){
			header("Location:login.php?login=UserWithThisId");
			exit();
		}else{
			$data = mysqli_fetch_assoc($run);
			$id = $data['id'];


			$_SESSION['id'] = $id;
			header("location: user/index.php");

		}
	}
}else{
	//header("Location: login.php?login=error");
	//exit();
}

?>

<div class="container">
	<form action="login.php" method="POST">
		<fieldset>

			<!-- Form Name -->
			<legend>Login Information</legend>

			<a class="Sbutton" name="aname" href="adlogin.php">Admin Login</a> <br>

			<!-- Text input--> 
			<label>Collage Id</label>
			<input  name="collegeid" type="text" maxlength="8" class="input"> 
			<br>
			
			<!-- select option-->						
			<label>Department</label>  
			<select name="department">
				<option value="" disabled selected hidden>Please Choose Department</option>
		        <option value="CO">Computer Engineering</option>
		        <option value="CE">Civil Engineering</option>
		        <option value="ME">Mechanical Engineering</option>
		        <option value="ME">Electronics Engineering</option>
    		</select><br>
			
			<!-- select option-->
			 <label>Year</label>
			<select name="year">
				<option value="" disabled selected hidden>Please Choose Year</option>
		        <option value="fy">First Year</option>
		        <option value="se">Second Year</option>
		        <option value="te">Third Year</option>
		        <option value="te">Fourth Year</option>
    		</select><br>
			<!-- Password input-->
			<label>Password</label>
			<input name="password" type="password" > <br>
			
			<!-- Button (Double) -->
			<button  name="submit" class="button">Submit</button>
			<button name="reset" type="reset" class="button">Reset</button><br><br>

			<!-- Already Login -->
			<div class="link">
			<p>
				You Haven't Registerd Yet??<br>
				Then Click Below......<br><br>
				<a class="button" href="register1.php"> Register Here </a>
			</p>
			</div>

		</fieldset>
	</form>
</div>




<?php
// Include Footer
include("includes/footer.php");
?>