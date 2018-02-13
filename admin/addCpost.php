<?php 
session_start();
if(isset($_SESSION['id'])){
	echo "";
}else{
	//header('location:../login.php');
}

?>
<?php 
// DataBase Handling Of Login/Register Page.

if(isset($_POST['submit'])){
	include("../includes/db.php");

	$title = mysqli_real_escape_string($conn,$_POST['title']);
	$body = mysqli_real_escape_string($conn,$_POST['body']);
	$author = mysqli_real_escape_string($conn,$_POST['author']);
	//Image upload & Propertise
	$file = $_FILES['file'];


	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	// Which File Has to upload
	$allowed = array('jpg','jpeg','png','gif');

	// Check the file has propper extention

	if(in_array($fileActualExt, $allowed)){
		if($fileError ===  0 ){
			if ($fileSize < 1000000) { //10MB
				// Give unique name to file
				$fileNameNew = uniqid('',true).".".$fileActualExt;
				// TO send the file upload folder
				$fileDestination ='../dataImg/CollegePost/'.$fileNameNew;
				// Move to temperare loaction file uploaded to uploaded folder
				move_uploaded_file($fileTmpName, $fileDestination);
				header("Location: addCpost.php?uploadsuccess");
			}else{
				header("Location:addCpost.php?post=FileSizeIsMore");
			}

		}else{
			header("Location:addCpost.php?post=ErrorOnFileUpload");
		}

	}else{
		header("Location:addCpost.php?post=ThisFileCannotUpload");
	}
	//Error Handlers
	if(empty($title) || empty($body) || empty($author)) {
		header("Location:addCpost.php?post=empty");
		}else{
			//Insert User to database
			$sql ="INSERT INTO `collegepost`(`id`, `title`, `body`, `author`, `image`) VALUES (NULL,'$title','$body','$author','$fileNameNew')";
			mysqli_query($conn,$sql);
			header("Location:addCpost.php?post=AddedSucessfully");
		}
}else{
	//header("location:addCpost.php");

	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../css/contactus.css">
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
	<form method="POST" action="addCpost.php" enctype="multipart/form-data">	

		<!-- Form Name -->
		<h2>Insert College Post</h2>
			<!-- Text input-->
			<label >Title</label>  
			<input name="title" type="text" class="input"> <br>
			
			<!-- Text input-->
			<label >Body</label>  
			<textarea name="body" cols="30" rows="10" class="input"></textarea> <br>
			
			<!-- Text input-->
			<label>Author</label>  
			<input name="author" type="text"> <br>

			<!--image -->
			<input type="file" name="file"> <br>
			 
			<!-- Button -->
			<button name="submit" class="button" type="submit" >Submit</button>			
	</form>
</div>
</body>
</html>
<?php include('../includes/footer.php') ?>