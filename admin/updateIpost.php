<?php 
include('../includes/header.php');
session_start();
if(isset($_SESSION['id'])){
	echo "";
}else{
	//header('location:../login.php');
}

?>
<?php 
// Getting the data using id
include("../includes/db.php");
$pid = $_GET['pid'];
$sql = "SELECT * FROM `intercollegepost` WHERE `id`='$pid'";
$run = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($run);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../css/contactus.css">
</head>
<body>
<div class="container">
	<form method="POST" action="updateI.php" enctype="multipart/form-data">	

		<!-- Form Name -->
		<h2>Update College Post</h2>
			<!-- Text input-->
			<label >Title</label>  
			<input name="title" type="text" class="input" value="<?php echo $data['title']; ?>"> <br>
			
			<!-- Text input-->
			<label >Body</label>  
			<textarea name="body" cols="30" rows="10" class="input"><?php echo $data['body']; ?></textarea> <br>
			
			<!-- Text input-->
			<label>Author</label>  
			<input name="author" type="text" value="<?php echo $data['author']; ?>"> <br>

			<!--image -->
			<input type="file" name="file" value="<?php echo $data['image']; ?>"> <br>

			<!-- This input tag is for get the id  -->
			<input type="hidden" name="pid" value="<?php echo $data['id']; ?>">

			<!-- Button -->
			<button name="submit" class="button" type="submit" >Update</button>			
	</form>
</div>
</body>
</html>
<?php include('../includes/footer.php') ?>