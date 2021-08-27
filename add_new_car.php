<?php
require('connection.inc.php');
if (isset($_POST['add'])) {
  $vehicle_mdl=$_POST['vehicle_mdl'];
  $vehicle_nmbr=$_POST['vehicle_nmbr'];
  $vehicle_image= $_FILES["vehicle_image"]["name"];
  $seat_capacity=$_POST['seat_capacity'];
  $rentpday=$_POST['rentpday'];
  $status=$_POST['status'];
  $vehicle_agency=$_SESSION['agencyxy'];

  $qry="insert into cars(vehicle_mdl,vehicle_nmbr,vehicle_image,seat_capacity,rentpday,status,vehicle_agency) values('$vehicle_mdl','$vehicle_nmbr','$vehicle_image','$seat_capacity','$rentpday','$status','$vehicle_agency')";
  $qry_run=mysqli_query($con,$qry);
  if($qry_run){
        move_uploaded_file($_FILES["vehicle_image"]["tmp_name"],"images/".$_FILES["vehicle_image"]["name"]);
        $_SESSION['data_add/delete']="Data Addedd Successfully";
        header('location:dashboard_agency.php');
        
  }
  else {
    $_SESSION['data_add/delete']="Data Not Added,Try Again";
    header('location:dashboard_agency.php');
  }
}

?>
