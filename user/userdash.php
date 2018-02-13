<?php 
session_start();
	if(isset($_SESSION['id'])){
		echo "";
	}else{
		header('location: ../login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Entry</title>
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../css/contactus.css">
	<link rel="stylesheet" href="../css/dash.css">
</head>
<body>
<div class="main">
		<div class="container">
		
			<div id="branding">
				<h1><span class="highlight">BIGBUZZ </span>Event Managment</h1>
			</div>
		</div>
</div>
<!-- Table  -->
<div class="container">
<a href="../logout.php" class="button">Logout</a>
	<h2>Colored Table Header</h2>

	<table>
	  <tr>
	    <th>Cultural</th>
	    <th>Sports</th>

	  </tr>
	  <tr>
	    <td><a href="dataEnter.php">Dance</a></td>
	    <td><a href="#">Cricket</a></td>
	  </tr>
	  <tr>
	    <td><a href="#">Acting</a></td>
	    <td><a href="#">Kabbadi</a></td>
	  </tr>
	  <tr>
	    <td><a href="#">Singing</a></td>
	    <td><a href="#">Kho-Kho</a></td>
	  </tr>
	  <tr>
	    <td><a href="#"></a></td>
	    <td><a href="#">Batminton</a></td>
	</tr>
	</table>
</div>
</body>
</html>

<?php
include("../includes/footer.php");

?>