<?php
include 'db.php';
$id = $_GET['id'];
$query = "DELETE FROM tabletb WHERE id='$id'";
$res = mysqli_query($con, $query);
if($res) {
echo "Deleted";
header('location:index.php');
} else {
echo "Error: " . $sql . "" . mysqli_error($con);
}
?>aa