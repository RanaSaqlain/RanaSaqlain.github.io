<?php
require_once "loader.php";
include_once("../db.php");
$customer_id=null;
$detail = array();
if(session_id() == "")
{
  session_start();
}
if(isset($_SESSION["Customer_id"]))
{

$customer_id = $_SESSION['Customer_id'];


}
 if ($_SERVER['REQUEST_METHOD']=='POST'){
 if(isset($_POST['srnoedit']))
  {
    $srno=$_POST['srnoedit'];
    $FName=$_POST[]
    $LName=$_POST[]
    $Street=$_POST[]
    $House=$_POST[]
    $City=$_POST[]
    $Zipcode=$_POST[]
    $Phone=$_POST[]
    Update_custfname.value=;
Update_custlname.value=;
Update_custstreet.value=
Update_custhouse.value=;
Update_custcity.value=;
Update_custzipcode.value=;
Update_custphone.value=;
    
  }
}


$sql="SELECT * FROM customer where id='$customer_id'";
$result = mysqli_query($con,$sql); 

 if ($result) {

      while ($row = mysqli_fetch_assoc($result)) {
        $detail[] = $row; 
      }}

?>
<!DOCTYPE html>
<html>
<head lang="en">
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
     <link rel="stylesheet" type="text/css" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
      <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
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


    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-responsive">
  <thead>
    <tr>
      <th scope="col">Customer ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Street</th>
      <th scope="col">House</th>
      <th scope="col">City</th>
      <th scope="col">Zip Code</th>
      <th scope="col">Phone</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
  <?php  
        if ($detail != null) {
          foreach ($detail as $key => $row) {
          
       ?>
       <tr>
      <th scope="row"> <?php  echo $row["id"];  ?></th>
      <td><?php  echo $row["First_Name"];  ?></td>
      <td><?php  echo $row["Last_Name"];  ?></td>
     <td><?php  echo $row["Street"] ;  ?></td>
     <td><?php  echo $row["House"] ;  ?></td>
     <td><?php  echo $row["City"] ;  ?></td>
     <td><?php  echo $row["Zipcode"] ;  ?></td>
     <td><?php  echo $row["Phone"] ;  ?></td>
     <div class="col-md-12 mt-5">
  <button type="button" class=" edit btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"  id="$row['id']"  >
  Update Profile
</button>
    </tr>
    <?php  // code...
      }
 }  ?> 
    
  </tbody>
</table>

        </div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <input type="hidden" name="srnoedit" id="srnoedit">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="Update_custfname" id="Update_custfname" class="form-control">
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="Update_custlname" id="Update_custlname" class="form-control">
        </div>
          <div class="form-group">
            <label>Street</label>
            <input type="text" name="Update_custstreet" id="Update_custstreet" class="form-control">
        </div>
        <div class="form-group">
            <label>House</label>
            <input type="text" name="Update_custhouse" id="Update_custhouse" class="form-control">
        </div>
        <div class="form-group">
            <label>City</label>
            <input type="text" name="Update_custcity" id="Update_custcity" class="form-control">
        </div>
        <div class="form-group">
            <label>ZipCode</label>
            <input type="text" name="Update_custzipcode" id="Update_custzipcode" class="form-control">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="Update_custphone" id="Update_custphone" class="form-control">
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Update Profile</button>
      </div>
    </div>
  </div>
</div>
      
    
</div>
  </div>
           
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
  <script>
      
edits=document.getElementsByClassName('edit');
Array.from(edits).forEach((element)=>{
element.addEventListener("click",(e)=>{
console.log("edit ");
tr=e.target.parentNode.parentNode;
FName=tr.getElementsByTagName("td")[0].innerText;
LName=tr.getElementsByTagName("td")[1].innerText;
Street=tr.getElementsByTagName("td")[2].innerText;
House=tr.getElementsByTagName("td")[3].innerText;
City=tr.getElementsByTagName("td")[4].innerText;
Zipcode=tr.getElementsByTagName("td")[5].innerText;
Phone=tr.getElementsByTagName("td")[6].innerText;
console.log(FName,LName,Street,House,City,Zipcode,Phone);
Update_custfname.value=FName;
Update_custlname.value=LName;
Update_custstreet.value=Street
Update_custhouse.value=House;
Update_custcity.value=City;
Update_custzipcode.value=Zipcode;
Update_custphone.value=Phone;

srnoedit.value=e.target.id;
console.log(e.target.id)
$('#exampleModal').modal('toggle');



})
  })
</script>
</body>

</html>