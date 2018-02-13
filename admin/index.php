<?php 
session_start();
	if(isset($_SESSION['aid'])){
		echo "";
	}else{
		header('location: ../adlogin.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Page</title>
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../css/dash.css">
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
<!-- Table  -->
<div class="container">
	<a href="../logout.php" class="Sbutton">Logout</a>
	<h2 align="center">Admin Dash Board</h2>
		<a class="Sbutton" href="wUdata.php"> Watch User Add Data</a>
	<table>
	  <tr>
	    <th>Inter College Post</th>
	    <th>College Posts</th>
	  </tr>
	  <tr>
	    <td><a class="Sbutton" href="addIpost.php">Insert</a></td>
	    <td><a class="Sbutton" href="addCpost.php">Insert</a></td>
	  </tr>
	  <tr>
	    <td><a class="Sbutton" href="editTableI.php">Update / Delete</a></td>
	    <td><a class="Sbutton" href="editTable.php">Update / Delete</a></td>
	  </tr>
	</table>
</div>
</body>
</html>

<?php
include("../includes/footer.php");

?>