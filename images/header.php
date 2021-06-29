<?php 
include 'config.php';
session_start();
if(!isset($_SESSION["username"])){
  header("Location: {$hostname}/login.php");

}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
  
  <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
  <a class="btn btn-light btn-outline-dark" data-bs-toggle="button" href="#" onclick="window.history.back(-1)">Back</a>

 
    <a class="navbar-brand" href="#">WELCOME ! user :  <?php echo $_SESSION['username']."/role:". $_SESSION["user_role"] ?> </a>
    
    <a 
    <?php 
    if(isset($_SESSION["username"])){
 if($_SESSION["user_role"]=='admin'){
  
  echo "href='../logout.php'";
   
    }
    elseif($_SESSION["user_role"]=='user'){
      
    echo "href='./logout.php'";
     }} ?>
      class="btn btn-danger" data-bs-toggle="button">Logout </a>
  </div>
  
</nav>
