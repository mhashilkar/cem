<?php 
include("../includes/db.php");
if(isset($_GET['pid'])){
	$pid = $_GET['pid'];
	$query="DELETE FROM `intercollegepost` WHERE `id` ='$pid' ";
	$result=mysqli_query($conn,$query);
	header('location:editTableI.php?post=DeletedSucessfuly');
}


?>