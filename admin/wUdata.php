<?php
// Include header
//include("../includes/header.php");
include("../includes/db.php");

// Post Code
$query = 'SELECT * FROM team ';


	// Get Result
	$result = mysqli_query($conn, $query);

	// Fetch Data
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//var_dump($posts);

	// Free Result
	mysqli_free_result($result);


?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Data</title>
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
<div class="container">
	<a class="button" href="index.php"> Back </a>
	<table align="center" style="margin: 25px 0 0">
		<tr>
			<th>Sr.No</th>
			<th>Nane Of Participants</th>
			<th>Price For PArticipations</th>
		</tr>
		<tr>
			<?php 
			include("../include/db.php");
				$sql ="SELECT * FROM  team";
				$run = mysqli_query($conn,$sql);

				if(mysqli_num_rows($run)< 1){
					echo "<tr><td colspan='3'>No record Found</td></tr>";
				}else{ $count = 0;
					while($data=mysqli_fetch_assoc($run)){
						$count++;
						?>
						<tr>
						    <td><?php echo $count; ?></td>
						    <td><?php echo $data['name1']. ' ,' .$data['name2']. ' ,' .$data['name3']; ?></td>

						    </td>
						    <td><?php echo $data['name5']; ?></td>
						    
						 </tr>


		<?php
					}
				}
			
		?>
	  

		</tr>
	</table>
</div>
<?php
// Include Footer
include("../includes/footer.php");
?>