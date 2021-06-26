<?php 
//session_start();
include '../header.php';
include '../config.php';
$sql ="SELECT COUNT(DISTINCT userid) as enrollcount from registration;";
$result = mysqli_query($conn,$sql) or die("unsucessful");


$sql2 ="SELECT COUNT(DISTINCT userid) as enrolled from registration WHERE Status='confirm';";
$result2 = mysqli_query($conn,$sql2) or die("unsucessful");

$sql3 = "SELECT c.ID,c.Name AS coursename,c.Startdate, r.registerID,u.userID,u.Name AS username,u.contact FROM registration r 
                INNER JOIN usertable u
                ON r.userid = u.UserID
                INNER JOIN courses c
                ON r.courseid = c.ID 
                WHERE r.Status = 'confirm';" ;
$result3 = mysqli_query($conn,$sql3) or die("qery unsucess");
?>
<div class="mt-3">
<h5 style="text-align:center">No. of Students Registered :
<?php 
$row = mysqli_fetch_assoc($result);
echo $row['enrollcount'];
?>
</h5>
<h5 style="text-align:center">No. of Students Enrolled :
<?php 
$row2 = mysqli_fetch_assoc($result2);
echo $row2['enrolled'];
?>
</h5>



<div class="container mt-2">
<?php if(mysqli_num_rows($result3)>0){
    while ($row3 = mysqli_fetch_assoc($result3)){ ?>
<table class="table table-bordered mb-3" style="width:40rem">
<h6>COURSE NAME : <?php echo $row3['coursename'];?><br> Start Date :<?php echo $row3['Startdate'];?></h6>
  <thead>
    <tr class="table-secondary" >
      <th scope="col">Register ID</th>
      <th scope="col">UserID</th>
      <th scope="col">Name</th>
      <th scope="col">Contact</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th><?php echo $row3['registerID'];?></th>
      <td><?php echo $row3['userID'];?></td>
      <td><?php echo $row3['username'];?></td>
      <td><?php echo $row3['contact'];?></td>
    </tr>
    
  </tbody>
</table>

<?php }} ?>
</div></div>