<?php 
include '../config.php';
include '../header.php';
$sql = "SELECT r.registerID,u.userID,u.Name AS username,c.Name AS coursename FROM registration r 
                INNER JOIN usertable u
                ON r.userid = u.UserID
                INNER JOIN courses c
                ON r.courseid = c.ID";
$result = mysqli_query($conn,$sql) or die("qery unsucess");

?>
<div class="container mt-4 ">
<table class="table table-bordered table-hover  table-responsive">
  <thead>
    <tr>
      <th scope="col">Register ID</th>
      <th scope="col">USER ID</th>
      <th scope="col">USER NAME</th>
      <th scope="col">REGISTERED COURSE</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  
  <tbody>
  <?php if(mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)){ ?>
    <tr>
      <td ><?php echo $row['registerID'];?></td>
      <td><?php echo $row['userID'];?></td>
      <td><?php echo $row['username'];?></td>
      <td><?php echo $row['coursename'];?></td>
      <td> 
      
      <a class="edit btn  btn-outline-success btn-sm" name="confirm" role="button" href="decline.php?RegisterID=<?php echo $row['registerID'];?>">Decline</a>
      <a class="delete btn btn-outline-danger  btn-sm" role="button" href="confirm.php?RegisterID=<?php echo $row['registerID'];?>">Confirm</a>
      
      </td>
      <?php } }  ?>
    </tr>
  </tbody>
</table>
</div>
