<?php 
include("../includes/db.php");
if(isset($_GET['pid'])){
	$pid = $_GET['pid'];
	$query="DELETE FROM `collegepost` WHERE `id` ='$pid' ";
	$result=mysqli_query($conn,$query);
	header('location:editTable.php?post=DeletedSucessfuly');
}


?>