<?php
ob_start();
require('connection.inc.php');
if(!isset($_SESSION['usercvgfth'])){
    header('location:login_user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
   
    <title>Car Dashboard</title>
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
        <li><a  href="index.php">Home</a></li>
        <li><a class="active" href="cars.php">Vehicles</a></li>
        <li><a href="user_order.php">Orders</a></li>
        <li><a href="">Gallery</a></li>
        <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<?php echo $_SESSION['usercvgfth']?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Profile</a>
    <a class="dropdown-item" href="logout_user.php">Logout</a>
    <a class="dropdown-item" href="#">Raise a Complain</a>
  </div>
</div>
      </ul>
    </nav>
  </body>
</html>
<!--end of navbar-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


<div class="container">
<div class="jumbotron">
<h2>Pay Now</h2>
<p>Please Make The Payment through the payment method given below</p>
<table class="table table-bordered" style="background-color:white">
        <thead class="table-dark">
            <tr>
               <th> Vehicle </th>
               <th> Vehicle Number </th>
               <th> Pickup Date </th>
               <th> Total Payable </th>
            </tr>
        </thead>
<?php
    $qry="select * from cars where id='{$_SESSION['ordersydffdf']}'";
        $qry_run=mysqli_query($con,$qry);
          while($rtw=mysqli_fetch_array($qry_run)){
?>
        <tbody>
            <td> <?php echo '<img src="images/'.$rtw['vehicle_image'].'" width="120px" height="100px">'?></td>
            <td> <?php echo $rtw['vehicle_nmbr']?></td>
            <td> <?php echo $rtw['from_date']?></td>
            <td> <?php echo '₹'.'&nbsp'.$rtw['payment']?></td>
        </tbody>
<?php
}
?>
</table>

<form action="payment_user.php" method="post">
<div class="form-check">
          <input class="form-check-input" type="radio" name="payment_method" id="gridRadios1" value="online method" disabled>
          <div class="alert alert-danger" role="alert">
          <label class="form-check-label" for="gridRadios1">
            Online(upi,debit card,credit card) **coming soon :)**.
          </label>
           </div>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="payment_method" id="gridRadios2" value="cash on delhivery" >
          <label class="form-check-label" for="gridRadios2">
           Cash On delivery
          </label>
        </div>
        <div class="form-group row">
         <div class="col-sm-10">
         <button type="submit" class="btn btn-primary" name="pay">Pay Now</button>
       </div>
         </div>
      </div>
    </div>
</form>
<?php
if (isset($_POST['pay'])) {
    $id=$_SESSION['ordersydffdf'];
    $payment_method=$_POST['payment_method'];
    $qsy="update cars set payment_method='$payment_method' where id='$id'";
    $qsy_run=mysqli_query($con,$qsy);
    if($qsy_run){
        $_SESSION['ordersydffdf']=$id;
        header('location:index.php');
    }
    else {
     echo "error".mysqli_error($con);
    }
}
ob_end_flush();
?>