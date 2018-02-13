<?php
include('../includes/db.php'); 
session_start();
	if(isset($_SESSION['id'])){
		echo "";
	}else{
		header('location: ../login.php');
	}
?>
<!-- Add Data  -->

<?php 
if(isset($_POST['add'])){
	$name1 = $_POST['name1'];
	$name2 = $_POST['name2'];
	$name3 = $_POST['name3'];
	$name4 = $_POST['name4'];
	$name5 = $_POST['name5'];

if(empty($name1) || empty($name2) || empty($name5) ) {
	header("Location:dataEnter.php?dataEnter=empty");

	}else{
	$query = "INSERT INTO `team`(`id`, `name1`, `name2`, `name3`, `name4`,`name5`) VALUES (NULL,'$name1','$name2','$name3','$name4','$name5')";

	$run = mysqli_query($conn,$query);

	header("Location:dataEnter.php?dataEnter=AddInserted");
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Team Members</title>
	<link rel="stylesheet" href="../css/contactus.css">
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../css/dash.css">
	<style>
		input[type=text]{
		width: 50%;
		padding: 8px 10px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
		}
		.entry{
			width: 50%;
		}
	</style>
</head>
<body>
<div class="main">
	<div class="container">
	
		<div id="branding">
			<h1><span class="highlight">EveBUZZ </span>Event Managment</h1>
		</div>
	</div>
</div>
	<div class="container">
	<a class="Sbutton" href="index.php"> Back </a>
		<h2 align="center">Add Team Members Name</h2>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			<table class="entry" align="center">
			  <tr>
			    <th>Cultural</th>
			  </tr>
			  <tr>
			    <td><input type="text" id="fname" name="name1"></td> 
			  </tr>
			   <tr>
			    <td><input type="text" id="fname" name="name2"></td>  
			  </tr>
			   <tr>
			    <td><input type="text" id="fname" name="name3"></td>
			  </tr>
			  <tr>
			    <td><input type="text" id="fname" name="name4"></td>
			  </tr>
			  <tr>
			  	<td><select name="name5">
				<option value="" disabled selected hidden>Select Participation Price</option>
		        <option value="20">20</option>
    			</select></td>
			  </tr>
			</table>

			<div align="center">
				<button name="add" class="button" type="submit" >Add</button>
			</div>
		</form>
	</div>
</body>
</html>
<?php
// Include Footer
include("../includes/footer.php");
?>