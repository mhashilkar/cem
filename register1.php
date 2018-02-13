<?php 
include("includes/header.php");

?>
<?php 
// DataBase Handling Of Login/Register Page.

if(isset($_POST['submit'])){
	include_once("includes/db.php");

	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$department = mysqli_real_escape_string($conn,$_POST['department']);
	$year = mysqli_real_escape_string($conn,$_POST['year']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$collegeid = mysqli_real_escape_string($conn,$_POST['collegeid']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);

	//Error Handlers
	//
	if(empty($name) || empty($department) || empty($year) || empty($email) || empty($collegeid) || empty($password)) {
		header("Location:register1.php?register=empty");
		exit();
	}else{
		// Check if input Characters are valid
		if(preg_match("/^[a-zA-z]*$/", $name)){
			header("Location:register1.php?register=invalid");
			exit();
		}else{
			//Check if email is valid
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				header("Location:register1.php?register=invalidEmail");
				exit();
			}else{
				$sql = "SELECT * FROM users WHERE collegeid ='$collegeid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if($resultCheck > 0){
					header("Location:register1.php?register=idIsRegister");
					exit();
				}else{
					//Insert User to database
					$sql ="INSERT INTO users (firstname, department, year, email, collegeid, password) Values ('$name','$department', '$year', '$email', '$collegeid', '$password');";
					mysqli_query($conn,$sql);
					header("Location:register1.php?register=RegisterSucess");
					exit();

				}
				
			}
		}
		
	}
}else{
	//header("location:register.php");
	//exit();
}

?>


<!-- Register Form-->
<div class="container">
	<a class="Sbutton" href="login.php">Back</a>
<form action="register1.php" method="POST">	
	<fieldset>
		<!-- Form Name -->
		<legend>Register</legend>

			<!-- Text input-->
			<label >Name</label>  
			<input name="name" type="text"> <br>
			
			<!-- select option-->						
			<label>Department</label>  
			<select name="department">
				<option value="" disabled selected hidden>Please Choose Department</option>
		        <option value="CO">Computer Engineering</option>
		        <option value="CE">Civil Engineering</option>
		        <option value="ME">Mechanical Engineering</option>
    		</select><br>
			
			<!-- select option-->
			 <label>Year</label>
			<select name="year">
				<option value="" disabled selected hidden>Please Choose Year</option>
		        <option value="FE">First Year</option>
		        <option value="SE">Second Year</option>
		        <option value="TE">Third Year</option>
		        <option value="BE">Fourth Year</option>
    		</select><br>
			
			<!-- Text input-->
			<label >Email</label>  
			<input type="text"  name="email"  placeholder="@viva-technology.org"> <br>
			 
			<!-- Text input-->
			<label>College Id</label>  
			<input name="collegeid" type="text" maxlength="8"> <br>

			<!-- Password input-->
			<label>Password</label>
		   	<input type="password" name="password"> <br>
			
			<!-- Button -->
			<button name="submit" class="button" type="submit" >Submit</button>
			<button name="reset" type="reset"  class="button" >Reset</button>


	</fieldset>
</form>
</div>

<?php 
include("includes/footer.php");

?>


