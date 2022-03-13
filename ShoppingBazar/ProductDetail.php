<?php 
 $srched = array();

require_once('top.php');
require_once "function.php";
require 'db.php';
$product_id=mysqli_real_escape_string($con,$_GET['id']);
$get_product=get_products_detail($con,$product_id);
 $catid=mysqli_real_escape_string($con,$_GET['id']);
 $get_cat_name=get_cats_name($con,$catid);
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if( isset($_POST["srchbtn"]) )
    {
        $srch = $_POST['srch'];
     
      $srched=  get_searched_product($con , $srch);
    }
    if(isset($_POST['addtocart']))
    {
       $id = $_POST['pid'];
        $response = addtocart($con,$id);
     if ($response != null) {
         echo '<script type="text/javascript">
    swal("Shopping Bazar!", "'.$response.'");
</script>';  }          

    }



}
?>

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
<!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                          <div class="search__inner">
                                <form action="" method="post">
                                    <input placeholder="Looking for ....  " name="srch" type="text" required="">
                                    <button type="submit" name="srchbtn"></button>
                                </form>

                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
 <?php include("Cart.php"); ?>
        </div>
            <?php 

                    if ($srched != null) {
                            include("srchedproducts.php");
                    }
                   ?>
   

  <div class="ht__bradcaump__area"  style="background: rgba(0, 0, 0, 0) url(#) no-repeat scroll center center / cover ;" >
            <div class="ht__bradcaump__wrap" >

                <div class="container">
                    <div class="row" >
                      
                        <div class="col-xs-12">
                        <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <a class="breadcrumb-item" href='categories.php?id=<?php echo $get_product['0']['C_ID']?>'>
                                    <?php echo $get_cat_name?>
                                  </a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active"><?php echo $get_product['0']['product_Name'] ?></span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100">
            <?php
            foreach($get_product as $list)
                            {

                            ?>
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                           <img src="<?php echo $list['product_Image'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                                
                            </div>
                        </div>
                        <hr/>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2 style="text-align: center; text-decoration: underline;"><?php echo $list['product_Name'] ?></h2>
                                <ul  class="pro__prize">
                                
                                    <li><?php echo $list['product_sprice']."$" ?></li>
                                </ul>
                                <p class="pro__info"> <?php echo $list['product_Description'] ?></p>
                                <div class="ht__pro__desc">
                                    <div class="sin__desc">
                                        <h3><span>Availabe Products # :</span><?php echo ' '.$list['product_instock']?></h3>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <p><span>Categories:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="categories.php?id=<?php echo $get_product['0']['C_ID']?>"> <?php echo $get_cat_name?></a></li>
                                        </ul>
                                    </div>
                                    
                                    </div>
                                     <div class="fr__list__btn " style="margin-top:1rem;">
                                             <form action="" method="post" >
                                                    <input type="hidden" name="pid" value="<?php echo $list['product_id'] ?>">
                                                    <button type="submit" name="addtocart" >
                                                        <a class="fr__btn">Add To Cart</a></button>
                                                </form>
                                                            
                                  </div>
                                </div>

                        </div>
                    </div><hr>
                    </div>
                </div>
            </div>
            <?php 
        }
        ?>
            <!-- End Product Details Top -->
        </section>


    <?php 
     require('footer.php');
 ?>