<?php 

//include 'functions.php';
include 'config.php';
session_start();
 if(isset($_SESSION["username"])){
 if($_SESSION["user_role"]=='admin'){
   header("Location: {$hostname}/admin/index.php");
    }
    elseif($_SESSION["user_role"]=='user'){
      header("Location: {$hostname}/index.php");
      }}
 ?>
 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/login.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>

<div class="box">
<div class="left">
<img src="images\nathan-dumlao-ewGMqs2tmJI-unsplash.jpg" alt="nah">
</div>

<div class="right sha neo">
<div class="container " style="width:40rem">
<form method ="POST" action= "<?php $_SERVER['PHP_SELF']; ?>">

<div class="container mt-5 log">
<div class="row m-4">
<h2>Welcome to Login page</h2>
<div class="col mr-5">
<div id="formhead" class="form-text"></div>
  <div class=" mb-2">
      
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input class="form-control" name="username" type="text" placeholder="Default input">
    
  </div>
  <div class="mb-4">
    <label for="exampleInputPassword1" class="form-label" >Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="********">
  </div>

  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Select UserType</label>
  </div>
  <select class="form-select " name="role" id="inputGroupSelect04">
    
    <option value="user" selected>User</option>
    <option value="admin">Admin</option>
  </select>
   </div>

  <button type="submit" name="login" class="btn btn-primary">Login</button>
  </div>
  </div>
</form>
<?php
  if(isset($_POST['login'])){
    include "config.php";
    if(empty($_POST['username']) || empty($_POST['password'])){
      echo '<div class="alert alert-danger">Enter all the fields</div>';
      die();
    }else{
      //getting values from form
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $password = md5($_POST['password']);
      $role = mysqli_real_escape_string($conn, $_POST['role']);
 $sql = "SELECT Name, UserID, Username, Role FROM usertable WHERE Username = '{$username}' AND Password= '{$password}' AND Role='{$role}'";

 $result = mysqli_query($conn, $sql) or die("Query Failed.");
//if any entries r forund
if(mysqli_num_rows($result) > 0){
//username and password matches
  while($row = mysqli_fetch_assoc($result)){

 $_SESSION["username"] = $row['Username'];
 $_SESSION["name"] = $row['Name'];
 $_SESSION["user_id"] = $row['UserID'];
  $_SESSION["user_role"] = $row['Role'];
if($_SESSION["user_role"]=='admin'){
 header("Location: {$hostname}/admin/index.php");
  }
  elseif($_SESSION["user_role"]=='User'){
    header("Location: {$hostname}/index.php");
     }
    }
 }else{
 echo '<div class="alert alert-danger">Username and Password are not matched.</div>';
                }
           }
        }
    ?>
</div>
</div>
</div>




