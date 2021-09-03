<?php
require('connection.inc.php');
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
   <?php if(isset($_SESSION['usercvgfth'])){ echo "".$_SESSION['usercvgfth']."";
   }
   else {
     echo "Guest";
   }?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <a class="dropdown-item" href="login_user.php">login</a>
    <a class="dropdown-item" href="login_agency.php">login(For Staff Only)</a>
    <a class="dropdown-item" href="logout_user.php"><?php if (isset($_SESSION['usercvgfth'])){echo "logout";
    }
    else {
      echo "";
    }?></a>
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
<?php 
           $upq="select * from cars";
           
          $ruq=mysqli_query($con,$upq);
          
           while($rpw=mysqli_fetch_array($ruq)){
               ?>
<?php echo '<img src="images/'.$rpw['vehicle_image'].'" width="120px" height="100px">'?>
  <div class="card-body">
  <h5 class="card-title"><?php echo "Vehicle No:".$rpw['vehicle_nmbr']?></h5>
    <p class="card-text">Rent per Day:<?php echo '₹'.'&nbsp'.$rpw['rentpday']."/-"?></p>
    <p class="card-text">DESCRIPTION:<?php echo '<br>'?><?php echo $rpw['car_desc']?></p>
    <form action="checkout_user.php" method="post">
    <input type="hidden" name="id" value="<?php echo $rpw['id'];?>">
    <button type="submit" class="btn btn-primary" name="rent">Rent Car</button>
    </form>
  </div>
</div> 
</table>
<?php
}?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

