<?php 

session_start();
include '../config.php';

$id = $_GET['ID'];
$user = $_GET['UserID'];
$sql ="INSERT INTO registration (courseid,userid) VALUES
  ('{$id}','{$user}') ";
$result = mysqli_query($conn,$sql) or die("unsucessful");

 header("Location: {$hostname}/user/courses.php");
?>