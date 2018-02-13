<?php
// Include header
include("includes/header.php");
include("includes/db.php");

	// get ID
	$id = mysqli_real_escape_string($conn, $_GET['id']);

// Post Code
$query = 'SELECT * FROM collegepost WHERE id = '.$id;


	// Get Result
	$result = mysqli_query($conn, $query);

	// Fetch Data
	$post = mysqli_fetch_assoc($result);
	//var_dump($posts);

	// Free Result
	mysqli_free_result($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="container">
	<a href="post.php" class="Sbutton">Back</a>
	<h1 class="title"><?php echo $post['title']; ?></h1>
		<div class="post-box">
			<small class="created">Created On: <?php echo $post['created_at']; ?> By <?php echo $post['author']; ?></small>
			<p class="body1"><?php echo $post['body']; ?></p>
			<img src="dataImg/CollegePost/<?php echo $post['image']; ?>" width="600px" height="300px" align="center"/>
		</div>
</div>
</body>
</html>
<?php
// Include Footer
include("includes/footer.php");
?>