<?php
require('connection.inc.php');
unset($_SESSION['agencyxy']);
unset($_SESSION['data_add/delete']);
header('location:login_agency.php');
?>