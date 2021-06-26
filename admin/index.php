<?php 

//<?=$a is shortform for php echo $a -->
include '../header.php';

?>


<div class="container mt-5">
<div class="row">

  <div class="col-sm-4 ">
    <div class="card"style="width: 18rem;">
    <img src="admin-images\registration.jpg" class="card-img-top" alt="..." onmouseover="onHover();" 
      onmouseout="offHover();">
      <div class="card-body">
        <h5 class="card-title"> Edit & Add Courses</h5>
        
        <a href="entry.php" class="btn btn-outline-secondary">Go</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card" style="width: 18rem;">
    <img src="admin-images\registration.jpg" class="card-img-top" alt="..." onmouseover="onHover();" 
      onmouseout="offHover();">
      <div class="card-body">
        <h5 class="card-title">Student Registrations</h5>
        
        <a href="registertable.php" class="btn btn-outline-secondary">Go </a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card" style="width: 18rem;">
    <img src="admin-images\registration.jpg" class="card-img-top" alt="..." onmouseover="onHover();" 
      onmouseout="offHover();">
      <div class="card-body">
        <h5 class="card-title">View Enrolled</h5>
        
        <a href="enrolled.php" class="btn btn-outline-secondary">Go </a>
      </div>
    </div>
  </div>
</div>



