<?php 

$id =$_GET['ID'];
include 'D:\X\htdocs\courseregistration\config.php';

//run a query
$sql = "DELETE FROM courses WHERE ID = {$id}" or die ("check query");

$result= mysqli_query($conn,$sql) or die("qery unsucess");

header("Location: {$hostname}/admin/entry.php");

mysqli_close($conn);


?>