<?php
require('db.php');
require('function.php');
$cat_res=mysqli_query($con,"select * from category where Category_Status=1");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res))
{
  $cat_arr[]=$row;
}
 ?> 
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shopping Bazar</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/logofyp.JPG">
  
    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="assets/ShopPage/css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="assets/ShopPage/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/ShopPage/css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="assets/ShopPage/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="assets/ShopPage/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="assets/ShopPage/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="assets/ShopPage/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="assets/ShopPage/css/custom.css">


    <!-- Modernizr JS -->
    <script src="assets/ShopPage/js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="index.php"><img src="assets/img/logo/logo_fyp_whitebg.png" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php">Home</a></li>
                                   <li class="drop"><a href="#">Categories</a>
                                            <ul class="dropdown ">
                                              
                                                 <?php
                                    foreach($cat_arr as $list)
                                    {
                                        ?>
                                        <li><a  class="mega__item" href="categories.php?id=<?php echo $list['Category_ID']?>" target="_blank" ><?php
                                        echo $list['Category_Name']?></a></li>
                                        <?php
                                    }
                                      ?>
                                                    </ul>
                                                </li>
                                      
                                        <li><a href="contact.php">contact</a></li>
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="index.php">Home</a></li>
                                            <li>

                                          <?php
                                    foreach($cat_arr as $list)
                                    {
                                        ?>
                                        <li><a href="categories.php?id=<?php echo $list['Category_ID']?>"><?php
                                        echo $list['Category_Name']?></a></li>
                                        <?php
                                    }
                                      ?>
                                  </li>
                                      
                                         
                                            <li><a href="contact.php">contact</a></li>
                                        </ul>
                                    </nav>
                                </div>  
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <div class="header__search search search__open">
                                        <a href="#"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <div class="header__account">
                                        <a href="#"><i class="icon-user icons"></i></a>
                                    </div>
                                    <div class="htc__shopping__cart">
                                        <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
                                        <a href="#"><span class="htc__qua">0</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
  