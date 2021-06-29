<?php 

//session_start();
// echo $_SESSION['user_role'];

include '../header.php';
include '../config.php';

$sql = "SELECT * FROM courses";
$result = mysqli_query($conn,$sql) or die("qery unsucess");

?>
<div class="container mt-4">
<div class="row">
<?php if(mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)){ ?>
<div class="col-auto">
<div class=" posts card" style="width:14rem;height:15rem">
  
  <div class=" card-body">
    <h5 class="card-title"><?php echo $row['Name'];?></h5>
    <p class="card-text subtext">StartDate  :  <?php echo $row['Startdate']; ?></p>
    <p class="card-text subtext"><?php echo $row['About']; ?></p>
    <!-- <input class="btn btn-primary" type="submit"  value="Save"> -->
    <?php 
    $sql1 = "SELECT * FROM registration WHERE userid = {$_SESSION['user_id']} AND courseid= {$row['ID']}";
    $result1 = mysqli_query($conn,$sql1);
    
     if(mysqli_num_rows($result1)>0){
       echo "<button type='button'class=' btn btn-success align-bottom' >Registered</button>";
     }else{
    ?>
    <a id="reg" href="registerform.php?UserID=<?php echo $_SESSION['user_id'];?>&ID=<?php echo $row['ID']; ?> " name="register" style="" class="btn btn-outline-danger align-bottom">Register now</a> 
    
    <?php } ?></div>

</div></div>
<?php }} else{
         echo "<h2>No Active Courses Available. </h2>";
     } ?>

</div></div>
