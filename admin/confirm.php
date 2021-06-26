<?php 
include '../config.php';
//from url GET  is super global variable 
//we get id from change smade in url of chANGE ID
$id = $_GET['RegisterID'];
$status='confirm';
//run a query to get the required id
$sql ="UPDATE registration SET Status='{$status}' WHERE RegisterID ={$id}";

$result = mysqli_query($conn , $sql) or die( "check query");
header("Location: {$hostname}/admin/registertable.php");


?>