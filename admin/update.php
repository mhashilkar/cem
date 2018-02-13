<?php 
include("../includes/db.php");
	$pid = $_POST['pid'];
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
				header("Location: update.php?uploadsuccess");
			}else{
				header("Location:update.php?post=FileSizeIsMore");
			}

		}else{
			header("Location:update.php?post=ErrorOnFileUpload");
		}

	}else{
		header("Location:update.php?post=ThisFileCannotUpload");
	}

			//Insert User to database
			$sql ="UPDATE `collegepost` SET `title` = '$title', `body` = '$body', `author` = '$author', `image` = '$fileNameNew' WHERE `collegepost`.`id` = '$pid'";
			mysqli_query($conn,$sql);
			header("Location:editTable.php?post=UpdateSuceesfully");
		


?>