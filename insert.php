<?php
include 'db.php';

 if (isset($_POST['submit'])) {
 	$name = $_POST['name'];
 	

 	$query = "insert into tabletb (name) values ('$name')";
 	$run = mysqli_query($con, $query);

 	if ($run) {
 		echo "Data inserted";
 		header('location:index.php');
 	}

 	else
 	{	
 		echo "error";
 	}

 }



 ?>