<?php
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
        <li><a class="active" href="#">Vehicles</a></li>
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
<table class="table table-bordered" style="background-color:white">
<div class="card" style="width: 18rem;">
  <div class="card-body">
<?php if(isset($_POST['rent'])){
      $id=$_POST['id'];
      $upq="select * from cars where id='$id'";
      $ruq=mysqli_query($con,$upq);
          while($rpw=mysqli_fetch_array($ruq)){
?>
<?php echo '<img src="images/'.$rpw['vehicle_image'].'" width="120px" height="100px">'?>
  <h5 class="card-title"><?php echo "Vehicle No:".$rpw['vehicle_nmbr']?></h5>
    <p class="card-text">Rent per Day:<?php echo $rpw['rentpday']?>₹</p>
    
    <form method="post" action="checkout_user.php">
    <input type="hidden" name="id" value="<?php echo $rpw['id']?>">
    <input type="hidden" name="rentpday" value="<?php echo $rpw['rentpday']?>">
    <label for="exampleInputEmail1">Enter Start Date</label>
    <input type="date" class="form-control" name="from_date" placeholder="DD/MM/YYYY" required>
    <label for="exampleInputEmail1">Number Of Days</label>
    <select name="nodays" class="form-select" aria-label="Default select example" required>
        <option selected>Number Of Days For Rent</option>
          <option value="1">one</option>
             <option value="2">Two</option>
               <option value="3">Three</option>
                <option value="4">four</option>
                 <option value="5">five</option>
                  <option value="6">six</option>
                   <option value="7">seven</option>
    </select>
    <label for="exampleInputEmail1">Enter District</label>
    <input type="text" class="form-method" name="dist" required>
    <label for="exampleInputEmail1">Enter City</label>
    <input type="text" class="form-method" name="city"required>
    <label for="exampleInputEmail1">Enter pincode</label>
    <input type="text" class="form-method" name="pin" required>
    <label for="exampleInputEmail1">Enter Contact Number</label>
    <input type="text" class="form-method" name="contact" required>
    <button type="submit" class="btn btn-primary" name="rent_car">Rent Car</button>
    </form>
<?php
   }
}?>
</div>
</div> 
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<?php
if(isset($_POST['rent_car'])){
    $rentpday=$_POST['rentpday'];
    $id=$_POST['id'];
    $dist=$_POST['dist'];
    $city=$_POST['city'];
    $pin=$_POST['pin'];
    $contact=$_POST['contact'];
    $trom_date=strtotime($_POST['from_date']);
    $from_date=$_POST['from_date'];
    $nodays=$_POST['nodays'];
    $day_diff=$nodays*60*60*24;
    $do_date=$trom_date + $day_diff;
    $to_date=date("d/m/Y",$do_date);
    $user=$_SESSION['usercvgfth'];
    $payment=$rentpday*$nodays;
    $t=time();
    $ts=date("d/m/Y",$t);
    $car="Rented by".$user;
    $order="update cars set from_date='$from_date',to_date='$to_date',nodays='$nodays',user='$user',payment='$payment',dist='$dist',city='$city',pin='$pin',contact='$contact',order_date='$ts',status='$car' where id='$id'";
    $order_run=mysqli_query($con,$order);
    if($order_run){
        $_SESSION['ordersydffdf']=$_POST['id'];
        header('location:payment_user.php');
    }
    else {
        echo "error".mysqli_error($con);
    }
}
?>
