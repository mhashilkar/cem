<?php
// Include header
include("includes/header.php");
include("includes/db.php");

// Post Code
$query = 'SELECT * FROM collegepost ORDER BY created_at DESC';


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
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="container">
		<?php foreach($posts as $post) : ?>
			<div class="post-box">
				<h3 class="title"><?php echo $post['title']; ?></h3>
				<small class="created">Created On: <?php echo $post['created_at']; ?> By <?php echo $post['author']; ?></small>
				<p class="body"><?php echo $post['body']; ?></p>
				<a class="Sbutton" href="readMore.php?id=<?php echo $post['id']; ?>">Read More</a>
			</div>
		<?php endforeach; ?>
	</div>
</body>
</html>
<?php
// Include Footer
include("includes/footer.php");
?>