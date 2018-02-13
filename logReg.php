<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<div class="container">
	<form class="form-horizontal">
		<fieldset>

			<!-- Form Name -->
			<legend>Login Information</legend>

			<!-- Text input--> 
			<label>Collage Id</label>
			<input  name="collegeid" type="text" required=""> 
			<br>
			
			<!-- Password input-->
			<label >Department</label>
			<input  name="password" type="password" required=""> <br>
			
			<!-- Password input-->
			<label>Password</label>
			<input name="confirmpassword" type="password" required=""> <br>
			
			<!-- Button (Double) -->
			<button  name="button1id">Save</button>
			<button name="button2id">Cancel</button>
			

		</fieldset>
	</form>
</div>

<!-- Register Form-->
<div class="container">
	
<fieldset>
	<!-- Form Name -->
	<legend>Register</legend>

		<!-- Text input-->
		<label >Name</label>  
		<input name="Name" type="text"> <br>
		
		<!-- Text input-->
		<label>Deparment</label>  
		<input name="username" type="text" required=""><br>
		
		<!-- Password input-->
		 <label>Year</label>
		<input name="password2" type="password" required=""> <br>
		
		<!-- Text input-->
		<label >Email</label>  
		<input name="emailaddr" type="text" placeholder="@viva-technology.org" required=""> <br>
		 
		<!-- Text input-->
		<label>College Id</label>  
		<input name="hostkey" type="text" required=""> <br>

		<!-- Password input-->
		<label>Password</label>
	   	<input name="password" type="password" required=""> <br>
		
		<!-- Button -->
		<button name="submit" >Submit</button>
		
	</fieldset>
</form>
</div>
</body>
</html>