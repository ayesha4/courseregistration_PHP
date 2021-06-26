<?php include '../header.php'; 
include '../config.php';


if (isset($_POST['update'])){
  $id =$_POST['ID'];
  $Name = $_POST['Name'];
  $About = $_POST['About'];
  $Date = $_POST['Startdate'];
 
 $sql ="UPDATE courses SET Name='{$Name}' , About = '{$About}', Startdate = '{$Date}'  WHERE ID ={$id}";
 
 $result = mysqli_query($conn,$sql) or die("unsucessful");
 header("Location: {$hostname}/admin/entry.php");
}

?>

<div id="main-content">
   
    <?php 
    include 'D:\X\htdocs\courseregistration\config.php';
    //from url GET  is super global variable 
    //we get id from change smade in url of chANGE ID
    $id = $_GET['ID'];
    //run a query to get the required id
    $sql="SELECT * FROM courses WHERE ID = {$id}";
    $result = mysqli_query($conn , $sql) or die( "check query"); 
        if(mysqli_num_rows($result)>0){
//if any record gets fetched 
        while($row = mysqli_fetch_assoc($result)){
    ?>

    <div class="container mt-5" style="width:40rem">

    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

    <div class="mb-2">
  <label for="formGroupExampleInput"  class="form-label" >ID</label>
  <input type="text" name="ID" value="<?php echo $row['ID'] ?>" class="form-control"  readonly fixed>
</div>
<div class="mb-2">
  <label for="formGroupExampleInput2"  class="form-label">Name</label>
  <input type="text" name ="Name" value="<?php echo $row['Name'] ?>" class="form-control"  >
</div>
<div class="mb-2">
  <label for="formGroupExampleInput2"  class="form-label">About</label>
  <input type="text"  name="About" value="<?php echo $row['About'] ?>" class="form-control" >
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2"  class="form-label">Start Date</label>
  <input type="date" name="Startdate" value="<?php echo $row['Startdate'] ?>" class="form-control"  >
</div>
  
     
      <input class="submit btn btn-outline-success"  name="update" type="submit" value="Update"/>
    </form>

    </div>
    <?php } }

?>
</div>
</div>
</body>
</html>