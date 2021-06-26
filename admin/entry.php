<?php 

include '../header.php';
include '../config.php';

if (isset($_POST['save'])){
  $Name = $_POST['Name'];
  $About = $_POST['About'];
  $Date = $_POST['Startdate'];
 
 $sql ="INSERT INTO courses (Name,About,Startdate) VALUES
  ('{$Name}','{$About}','{$Date}') ";
 
 $result = mysqli_query($conn,$sql) or die("unsucessful");

}

$sql = "SELECT * FROM courses ";
$result = mysqli_query($conn,$sql) or die("qery unsucess");


?>

<div class="container" style="width:50rem;">
<form method="POST" action= "<?php $_SERVER['PHP_SELF']; ?>">

  <div class="container mt-3">
<div class="mb-1">
  <label for="formGroupExampleInput" class="form-label">Name</label>
  <input type="text" class="form-control" name="Name" id="formGroupExampleInput" placeholder="">
</div>
<div class="mb-1">
  <label for="formGroupExampleInput2" class="form-label">About</label>
  <input type="text" class="form-control" Name="About" id="formGroupExampleInput2" placeholder="">
</div>
<div class="mb-2">
  <label for="formGroupExampleInput2" class="form-label">Date Of Start</label>
  <input type="date" class="form-control" Name="Startdate" id="formGroupExampleInput2" placeholder="">
</div>
  <input class="btn btn-outline-primary" type="submit" name="save" value="Save">

</form>
</div>
</div>


<div class="container mt-3">
<table class="table table-bordered table-responsive-md table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">About</th>
      <th scope="col">Startdate</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  if(mysqli_num_rows($result)>0){
  while ($row = mysqli_fetch_assoc($result)){
   ?>
    <tr>
      <td><?php echo $row['ID'];?></td>
      <td><?php echo $row['Name']; ?></td>
      <td><?php echo $row['About'] ;?></td>
      <td><?php echo $row['Startdate'];?></td>
      <td> 
      <a class="edit btn btn-primary btn-dark btn-sm" name="edit" role="button" href="edit.php?ID=<?php echo $row['ID'];?>">EDIT</a>
      <a class="delete btn btn-primary btn-dark btn-sm" method="post" name="delete" role="button" href="delete.php?ID=<?php echo $row['ID'];?>">DELETE</a>
      </td>
      <?php } ?>
    </tr>
    
  </tbody>
</table>
<?php
  }
     else{
         echo "<h2>NO RECORD </h2>";
     }
    
    ?>
</div>
