<?php
require('connection.inc.php');
if (isset($_POST['delete'])) {
   $id=$_POST['id'];
   $qrty="delete from cars where id='$id'";
   $qry_run=mysqli_query($con,$qrty);
   if($qry_run){
   $_SESSION['data_add/delete']="Data Deleted Successfully";
   header('location:dashboard_agency.php');
   }
}
?>