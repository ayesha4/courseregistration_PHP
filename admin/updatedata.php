<?php
include 'D:\X\htdocs\courseregistration\config.php';
include 'header.php';
$id = $_POST['Id'];
$name = $_POST['Name'];
$about = $_POST['About'];
$startdate = $_POST['Startdate'];


$sql = "UPDATE courses SET Name='{$name}' , About = '{$about}', Startdate = '{$startdate}'  WHERE ID ={$id}";
$result = mysqli_query($conn,$sql) or die("unsucessful");
//to redirect 
header ("Location:http://{hostname}/admin/entry.php");


?>