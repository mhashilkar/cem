<?php 
session_start();
if(isset($_SESSION['id'])){
	echo "";
}else{
	//header('location:../login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Entry</title>
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../css/dash.css">
	<link rel="stylesheet" href="../css/contactus.css">
	<style>
		img{
			max-width: 50px;
			max-height: 50px;
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
<!-- Table  -->
<div class="container">
	<a href="index.php" class="Sbutton">Back</a>
	<h2></h2>

	<form action="editTable.php" method="post">
		<label>Enter Title Name</label>
		<input type="text" name="title">
		<button name="submit" class="Sbutton" type="submit" >Search</button>
	</form>

	<table>
	  <tr>
	    <th>Title</th>
	    <th>Body</th>
	    <th>Author</th>
	    <th>Image</th>
	    <th>Action</th>
	  </tr>
		<?php 
			include("../includes/db.php");
			if(isset($_POST['submit'])){

				$title = mysqli_real_escape_string($conn,$_POST['title']);
				$sql ="SELECT * FROM `collegepost` WHERE `title` LIKE '%$title%'";
				$run = mysqli_query($conn,$sql);

				if(mysqli_num_rows($run)< 1){
					echo "<tr><td colspan='5'>No record Found</td></tr>";
				}else{ $count = 0;
					while($data=mysqli_fetch_assoc($run)){
						$count++;
						?>
						<tr>
						    <td><?php echo $count; ?></td>
						    <td><?php echo $data['title']; ?></td>
						    <td><?php echo $data['author']; ?></td>
						    <td><img src="../dataImg/CollegePost/<?php echo $data['image']; ?>"></td>
						    <td><a href="updateCpost.php?pid=<?php echo $data['id'];?>">Edit</a> || <a onClick="return confirm('Are You Sure ?');" title="Delete" href="delete.php?pid=<?php echo $data['id'];?>">Delete</a></td>
						 </tr>
		<?php
					}
				}
			}
		?>
	  
	
	</table>
</div>
</body>
</html>

<?php
include("../includes/footer.php");

?>