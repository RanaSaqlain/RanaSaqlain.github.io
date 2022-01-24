<?php
session_start();
session_destroy();
if (isset($_COOKIE["Manager"])) {
  
      unset($_COOKIE['Manager']['managerid']); 
    setcookie("['Manager']['managerid']", null, -1, '/'); 
     unset($_COOKIE['Manager']['managername']); 
    setcookie("['Manager']['managerid']", null, -1, '/'); 
     
}
header("Location:../login.php");
exit();
?>