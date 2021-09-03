<?php
require('connection.inc.php');
if(!isset($_SESSION['agencyxy'])){
    header('location:login_agency.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
   
    <title>Car Agency Dashboard</title>
</head>
<body>


<!--navbar for all the codes -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   <!--------- <title>Responsive Navigation Menu</title>------>
    <link rel="stylesheet" href="agency.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <nav>
      <div class="logo">Car Rental</div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>
      <ul>
        <li><a class="active" href="dashboard_agency.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Gallery</a></li>
        <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <?php echo $_SESSION['agencyxy'] ?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Profile</a>
    <a class="dropdown-item" href="logout_agency.php">Logout</a>
    <a class="dropdown-item" href="#">Raise a Complain</a>
  </div>
</div>
      </ul>
    </nav>
    
  </body>
</html>
<!--end of navbar-->
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Car Details</h5>
        
      </div>
      <div class="modal-body">
      <form method="post" action="editcar.php" enctype="multipart/form-data">
        
          <?php 
          if(isset($_POST['edit_btn'])){
              $id=$_POST['id'];
           $upq="select * from cars where id='$id'";
           
          $ruq=mysqli_query($con,$upq);
          
           while($rpw=mysqli_fetch_array($ruq)){
               ?>
         <div class="form-group">
             <input type="hidden" name="id" value="<?php echo $rpw['id']?>">
         </div>
         <div class="form-group">
         <label >Vehicle Model</label>
         <input type="text" class="form-control"  name="vehicle_mdl" placeholder="<?php echo $rpw['vehicle_mdl']?>" value="<?php echo $rpw['vehicle_mdl']?>">
         </div>

         <div class="form-group">
         <label >Vehicle Number</label>
         <input type="text" class="form-control" name="vehicle_nmbr" placeholder="<?php echo $rpw['vehicle_nmbr']?>" value="<?php echo $rpw['vehicle_nmbr']?>">
         </div>

         <div class="form-group">
         <label >Vehicle Image</label>
         <input type="file" class="form-control" name="vehicle_image" value="<?php echo $rpw['vehicle_image']?>">
         <tr><td><?php echo '<img src="images/'.$rpw['vehicle_image'].'" width="120px" height="100px">'?></td></tr>
         </div>

         <div class="form-group">
         <label >Seat Capacity</label>
         <input type="text" class="form-control" name="seat_capacity" placeholder="<?php echo $rpw['seat_capacity']?>" value="<?php echo $rpw['seat_capacity']?>">
         </div>

         <div class="form-group">
         <label >Rent Per Day</label>
         <input type="text" class="form-control" name="rentpday" placeholder="<?php echo $rpw['rentpday']?>" value="<?php echo $rpw['rentpday']?>">
         </div>

         <div class="form-group">
         <label >Creation Date</label>
         <input type="text" class="form-control" name="date" placeholder="<?php echo $rpw['date']?>" readonly>
         </div>
         <div class="form-group">
         <label >Status</label>
         <input type="text" class="form-control" name="status" placeholder="<?php echo $rpw['status']?>" value="<?php echo $rpw['status']?>">
         </div>  
         

         
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="edit">Save changes</button>
      </form>
      <form action="editcar.php" method="post">
      <button type="close" class="btn btn-secondary" name="close">Close</button>
      </form>
      </div>
      <?php
           }
          }
          ?>
    </div>
  </div>

  <?php
  if (isset($_POST['edit'])) {
  $id=$_POST['id']; 
  $vehicle_mdl=$_POST['vehicle_mdl'];
  $vehicle_nmbr=$_POST['vehicle_nmbr'];
  $vehicle_image= $_FILES["vehicle_image"]["name"];
  $seat_capacity=$_POST['seat_capacity'];
  $rentpday=$_POST['rentpday'];
  $status=$_POST['status'];

 $query="update cars set vehicle_mdl='$vehicle_mdl',vehicle_nmbr='$vehicle_nmbr',vehicle_image='$vehicle_image',seat_capacity='$seat_capacity',rentpday='$rentpday',status='$status' where id='$id'";
  
  $qry_run=mysqli_query($con,$query);
  if($qry_run){
        move_uploaded_file($_FILES["vehicle_image"]["tmp_name"],"images/".$_FILES["vehicle_image"]["name"]);
        $_SESSION['data_add/delete']="Data Updated Successfully";
        header('location:dashboard_agency.php');
        
  }
  else {
    $_SESSION['data_add/delete']="Data Not Updated,Try Again";
    header('location:dashboard_agency.php');
  }
}
  ?>

<?php
if (isset($_POST['close'])) {
   header('location:dashboard_agency.php');
}

?>
