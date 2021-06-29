

<?php  
include '../header.php';
include '../config.php';
$user=$_SESSION["user_id"];
//$sql="SELECT *,IF(Status='confirm','selected','not selected') AS RESULT FROM `registration` WHERE userid=' $_SESSION["user_id"] = $_SESSION["user_id"]';";
$sql3 = "SELECT c.ID,c.Name AS coursename,c.About,c.Startdate, r.registerID,u.userID FROM registration r 
INNER JOIN usertable u
ON r.userid = u.UserID
INNER JOIN courses c
ON r.courseid = c.ID 
WHERE r.Status = 'confirm' AND u.UserID='$user'" ;
$result3 = mysqli_query($conn,$sql3) or die("qery unsucess");
if(mysqli_num_rows($result3)>0){
    while ($row = mysqli_fetch_assoc($result3)){
?>


<div class="container mt-3">
    <div class="row">
    <div class="col-4">
<div class="card border-success" >
  <h5 class="card-header border-success"><?php echo $row['coursename'];?></h5>
  <div class="card-body">
    <h6 class="card-title"><b>ID :</b><?php echo $row['registerID'];?></h6>
    <p class="card-text"><b>StartDate: </b><?php echo $row['Startdate'];?></p>
    <p class="card-text"><b>About :</b><?php echo $row['About'];?></p>
    
    <a href="#" class="btn btn-primary">Proceed to download</a>
  </div></div></div>
</div></div>
<?php }}else{
echo "YOU HAVE NOt BEEN SELECTED";

} ?>