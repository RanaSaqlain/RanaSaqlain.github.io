<?php 
require_once('top.php');
$product_id=mysqli_real_escape_string($con,$_GET['id']);
$get_product=get_products_detail($con,$product_id);
 $catid=mysqli_real_escape_string($con,$_GET['id']);
 $get_cat_name=get_cats_name($con,$catid);
?>
  <div class="ht__bradcaump__area" >
            <div class="ht__bradcaump__wrap" >
                <div class="container">
                    <div class="row" >
                      
                        <div class="col-xs-12">
                        <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <a class="breadcrumb-item" href='categories.php?id=<?php echo $get_product['0']['C_ID']?>'>
                                    <?php echo $get_cat_name['0']['Category_Name'] ?>
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
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2><?php echo $list['product_Name'] ?></h2>
                                <ul  class="pro__prize">
                                
                                    <li><?php echo $list['product_sprice']."$" ?></li>
                                </ul>
                                <p class="pro__info"> <?php echo $list['product_Description'] ?></p>
                                <div class="ht__pro__desc">
                                    <div class="sin__desc">
                                        <h3><span>Availability:</span><?php echo $list['product_instock']?></h3>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <p><span>Categories:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="#">Fashion,</a></li>
                                        </ul>
                                    </div>
                                    
                                    </div>
                                </div>

                        </div>
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