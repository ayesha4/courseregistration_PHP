<?php 
 include '../config.php';

$id = $_GET['RegisterID'];
$sql = "DELETE FROM registration WHERE RegisterID = {$id}" or die ("check query");
$result= mysqli_query($conn,$sql) or die("qery unsucess");
header("Location: {$hostname}/admin/registertable.php");



?>