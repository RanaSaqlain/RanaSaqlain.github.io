<?php
require_once "loader.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Shopping Bazar Team">
  <title>ShoppingBazar | Users </title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body style="width:98.9%;">
  <!-- Sidenav -->
 <?php

include("leftsidebar.php");
 ?>
  <!-- Main content -->
  <div class="main-content row" id="panel" >
    <!-- Topnav -->
    <?php

include("topnav.php");
 ?>
    <!-- Header -->
    <!-- Header -->
    
        <div class="container">
          
                  <h2 class="text-center">Current Order Details</h2>

                   <table class="table">
  <thead>
    <tr>
      <th scope="col">Order ID</th>
      <th scope="col">Payment</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">231F</th>
      <td>Done</td>
      <td>In Processing</td>
      <td><button type="button" class="btn btn-danger">Cancel Order</button></td>
    </tr>
    <tr>
      <th scope="row">87D</th>
      <td>COD</td>
      <td>Ready To Deliver</td>
      <td><button type="button" class="btn btn-danger">Cancel Order</button></td>
    </tr>
    <tr>
      <th scope="row">1272D</th>
      <td>COD</td>
      <td>Sended</td>
      <td><button type="button" class="btn btn-danger">Cancel Order</button></td>
    </tr>
  </tbody>
</table>


        </div>
    
      <!-- Footer -->
    <?php
    include "footer.php";

    ?>
   
  </div>
   <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
