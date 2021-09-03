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
    <div class="content">
      <div>Responsive Navigation Menu Bar Design</div>
      <div>using only HTML & CSS</div>
    </div>

  </body>
</html>
<!--end of navbar-->

<!-- add car  Modal for add the value of cars table-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Car Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="add_new_car.php" enctype="multipart/form-data">
         <div class="form-group">
         <label >Vehicle Model</label>
         <input type="text" class="form-control" name="vehicle_mdl" placeholder="Vehicle Model" required>
         </div>

         <div class="form-group">
         <label >Vehicle Number</label>
         <input type="text" class="form-control" name="vehicle_nmbr" placeholder="Vehicle Number" required>
         </div>

         <div class="form-group">
         <label >Vehicle Image</label>
         <input type="file" class="form-control" name="vehicle_image" placeholder="Vehicle Image" required>
         </div>

         <div class="form-group">
         <label >Seat Capacity</label>
         <input type="text" class="form-control" name="seat_capacity" placeholder="Seat Capacity" required>
         </div>

         <div class="form-group">
         <label >Rent Per Day</label>
         <input type="text" class="form-control" name="rentpday" placeholder="Rent Per Day" required>
         </div>

         <div class="form-group">
         <label >Status</label>
         <input type="text" class="form-control" name="status"  placeholder="Status" required>
         </div>   
         
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="add">ADD CAR </button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- END OF ADD CAR DETAILS-->

<!-- Delete Modal for Delete the value of cars table-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="eDITModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!--starting of cars dashboard table-->

    <div class="container">
    <div class="jumbotron">
    <h2> Welcome To Car Agency Dashboard</h2>
    <!--add alert for adding data --> 
    <?php
    if (isset($_SESSION['data_add/delete']) && $_SESSION['data_add/delete']!='') {
      echo '<div class="alert alert-success" role="alert">';
      echo '<h>'.$_SESSION['data_add/delete'].'</h>';
      echo '</div>';
      unset($_SESSION['data_add/delete']);
    }
    
    ?>
    <!--add new car-->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"> ADD NEW CAR </button></th>
    <hr>
    <?php
      $query="select * from cars where vehicle_agency='{$_SESSION['agencyxy']}'";
      $query_run=mysqli_query($con,$query);

    ?>
    <table class="table table-bordered" style="background-color:white">
        <thead class="table-dark">
            <tr>
               <th> ID </th>
               <th> Vehicle Model </th>
               <th> Vehicle Number </th>
               <th> Vehicle Image </th>
               <th> Seat Capacity </th>
               <th> Rent Per Day </th>
               <th> Creation Date </th>
               <th> Status </th>
               <th> EDIT </th>
               <th> DELETE </th>
            
            
            </tr>       
        
        </thead>
    <?php
      if (mysqli_num_rows($query_run)>0) {

        while ($row=mysqli_fetch_array($query_run)) {


              ?>
              <tbody>
                  <tr>
                   <th> <?php echo $row['id'];?> </th>
                   <th> <?php echo $row['vehicle_mdl'];?> </th>
                   <th> <?php echo $row['vehicle_nmbr'];?> </th>
                   <th> <?php echo '<img src="images/'.$row['vehicle_image'].'" width="120px" height="100px">'?> </th>
                   <th> <?php echo $row['seat_capacity'];?> </th>
                   <th> <?php echo $row['rentpday'];?> </th>
                   <th> <?php echo $row['date'];?> </th>
                   <th> <?php echo $row['status'];?> </th>
                   <form action="editcar.php" method="post">
                     <input type="hidden" name='id' value="<?php echo $row['id'] ?>">
                   <th><button type="submit" class="btn btn-primary" name="edit_btn"> EDIT </button></th>
                   </form>
                   <form action="delete_cars.php" method="post">
                     <input type="hidden" name='id' value="<?php echo $row['id'] ?>">
                   <th><button type="delete" name="delete" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"> DELETE </button></th>
                   </form>
                   <form action="view_agency.php" method="post">
                     <input type="hidden" name='id' value="<?php echo $row['id'] ?>">
                   <th><button type="delete" name="view" class="btn btn-success" > VIEW </button></th>
                   </form>
                   </tr>
              </tbody>
    <?php
        }
          
      }
      else {
          echo "No record found";
      }

    ?>
    </table>
    
    </div>
    
    
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>
</html>

