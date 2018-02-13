<?php
// Include header
include("includes/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/contactus.css">
</head>
<body>
	<div class="container">
	<form action="includes/login.php" method="POST">
		<fieldset>

			<!-- Form Name -->
			<legend>Login Information</legend>

			<!-- Text input--> 
			<label>Collage Id</label>
			<input  name="collegeid" type="text" maxlength="8" class="input"> 
			<br>
			
			<!-- select option-->						<label>Department</label>  
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
		        <option value="fy">First Year</option>
		        <option value="se">Second Year</option>
		        <option value="te">Thrid Year</option>
    		</select><br>
			<!-- Password input-->
			<label>Password</label>
			<input name="password" type="password" > <br>
			
			<!-- Button (Double) -->
			<button  name="submit" class="button">Submit</button>
			<button name="reset" type="reset" class="button">Reset</button>
		</fieldset>
	</form>
</div>
<?php 
// to check login
	if(isset($_SESSION['id'])){
		echo "You are LogIN!";
	}

?>

<!-- Register Form-->
<div class="container">
<form action="includes/register.php" method="POST">	
	<fieldset>
		<!-- Form Name -->
		<legend>Register</legend>

			<!-- Text input-->
			<label >Name</label>  
			<input name="name" type="text"> <br>
			
			<!-- select option-->						<label>Department</label>  
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
		        <option value="TE">Thrid Year</option>
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
</body>
</html>


<?php
// Include Footer
include("includes/footer.php");
?>