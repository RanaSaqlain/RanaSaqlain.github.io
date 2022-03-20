<?php
include_once("top.php");
include_once("function.php");
include_once("db.php");

 $srched = array();
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if( isset($_POST["srchbtn"]) )
    {
        $srch = $_POST['srch'];
     
      $srched=  get_searched_product($con , $srch);
    }
     if(isset($_POST['delbtn']))
    {
       $id = $_POST['idel'];
     $response = delfromcart($id);
     if ($response != null) {
        echo '<script type="text/javascript">
    swal("Shopping Bazar!", "'.$response.'");
</script>';
     }
    }
    
}
if ($_SESSION['cart'] == null) {
  echo '<script type="text/javascript">
    swal("Shopping Bazar!", "Please Add products to your cart");
    setTimeout(function(){
                                window.location = "index.php";
                            },10);
</script>';
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
        <!-- End Offset Wrapper -->
                   <?php 

                    if ($srched != null) {
                            include("srchedproducts.php");
                    }
                   ?>
     <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" >
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">checkout</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
         <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkout__inner">
                            <div class="accordion-list">
                                <div class="accordion">
                                    
                                    <div class="accordion__title" >
                                     <a  href="#"id="formaddress"> Address Information</a>   
                                    </div>
                                    <div class="accordion__body">
                                        <div class="bilinfo">
                                            <form action="#" id="addressFormData">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="First name" name="fname" id="fname" required="">
                                                        </div>
                                                    </div><div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="Last name" name="Lname" id="lname" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="Street Address" name="street" id="street" required="" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="Apartment/Block/House" id="house" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="City/State" name="city"  id='city' required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="number" placeholder="Post code/ zip" name="zip" id="zip" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="email" placeholder="Email address" name="email" id="email" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="number" placeholder="Phone number" name="phone" id="phone" required="">
                                                        </div>
                                                    </div>
                                                     <div class="col-md-6 " style="margin-top:1rem;">
                                                     	
                                                           <div class="form-check">
  															<input class="form-check-input" type="checkbox" id="gridCheck" id="chk1" checked="true">
													      <label class="form-check-label" for="gridCheck">
													        Save for Next time & create my account
														      </label>
														    </div>
                                                  
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="accordion__title">
                                       <span id="address_verification">payment information</span> 
                                    </div>
                                    <div class="accordion__body">
                                        <div class="paymentinfo">
                                            <div class="single-method">
                                            	<button class="btn btn-light" id="CODBTN">
                                            		<a href="#"  ><i class="zmdi zmdi-long-arrow-right"></i>Cash On Delivery</a>
                                            	</button>
                                                
                                            </div>
                                            <div class="single-method " style="margin-top:2rem">
                                               
                                                <button type="button" class="btn btn-light " data-toggle="modal" data-target="#exampleModal">
 												<a href="#" class="paymentinfo-credit-trigger"><i class="zmdi zmdi-long-arrow-right"></i>Online Transaction</a>
												</button>





												<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Shopping Bazar</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        


      		<!-- Payments method front-end starts -->
 		<div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h3 class="accordion-header" id="flush-headingOne">
      <a><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="background-color: #ffffff; border: none;">
        Credit card | Visa Card |Debit Card  
      </button></a>
    </h3>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      

       	<!-- Form of Stripe -->
       	<form action="checkout.php" class="row g-3 " style="margin-top:2rem"  method="post" id="paymentFrm" >
  <div class="col-md-6">
    <label for="name_s" class="form-label">Name</label>
    <input type="text" name="card-name"  class="form-control" id="name_S" required="">
  </div>
  <div class="col-md-6">
    <label for="num_s" class="form-label">Card Number</label>
    <input type="text" name="card-number"  class="form-control card-number" id="num_S" required="">
  </div>
  <div class="col-md-12">
    <label for="cvc_s" class="form-label">CVC</label>
    <input type="text" name="card-cvc"  class="form-control card-cvc" id="cvc_S" required="">
  </div>
  
  <div class="col-md-6">
    <label for="exp_month_s" class="form-label">Expiration Month (MM)</label>
    <input  type="text" name="card-expiry-month"  class="form-control card-expiry-month" id="exp_month_s" required="">
  </div>
    <div class="col-md-6">
    <label for="exp_year_s" class="form-label">Expiration year (MM)</label>
    <input  type="text" name="card-expiry-year"  class="form-control card-expiry-year"  id="exp_year_s" required="">
  </div>
  <div class="col-12 text-center" >
    <button type="submit" class="btn btn-success" name="paybtn" id="payBtn" style="margin-top:2rem;width:30%;" >Pay</button>
  </div>
</form>
      <!-- End Form  -->
       	
  </div>
    </div>
  </div>
  <div class="accordion-item" style="margin-top: 2rem;">
    <h3 class="accordion-header" id="flush-headingTwo">
      <a href="#"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" style="background-color: #ffffff; border:none; ">
       Paypal 
      </button><a>
    </h3>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      	<div id="paypal-button-container"></div>


      </div>
    </div>
  </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
     
      </div>
    </div>
  </div>
</div>






                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="order-details">
                            <h5 class="order-details__title">Your Order</h5>
                            <div class="order-details__item">
                            	<?php 
                    if (isset($_SESSION['cart'])) {
                    
                    
                    foreach ($_SESSION['cart'] as $key => $value) {
                              
                              if ($value != null) {                          
                    ?> 
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="<?php echo $value["image"] ?>" alt="ordered item">
                                    </div>
                                    <div class="single-item__content">
                                        <a href="ProductDetail.php?id=<?php echo $value['id'] ?>"><?php  echo $value['name']; ?></a>
                                        <span class="quantity">QTY:<?php  echo $value['quantity']; ?></span>
                                <span class="price">$ <?php  echo ($value['price'] * $value['quantity'] ); ?> </span>
                                       
                                    </div>
                                    <div class="single-item__remove">
                                       <form action="" method="post"> 
                                             <input type="hidden" name="idel" value="<?php echo $value['id'] ?>">
                                              <a href="#"> <button type="submit" name="delbtn" ><i class="zmdi zmdi-delete"></i></button></a> </form>
                                    </div>
                                </div>
                            <?php }}}?>
                               
                            </div>
                            <div class="order-details__count">
                                <div class="order-details__count__single">
                                    <h5>sub total</h5>
                                    <span class="price">$ <?php  if (isset($_SESSION['subtotal'])) {
                            echo $_SESSION['subtotal'];
                        }  ?></span>
                                </div>
                                <div class="order-details__count__single">
                                    <h5>Tax</h5>
                                    <span class="price">$0.00</span>
                                </div>
                            </div>
                            <div class="ordre-details__total">
                                <h5>Order total</h5>
                                <span class="price">$ <?php  if (isset($_SESSION['subtotal'])) {
                            echo $_SESSION['subtotal'];
                        }  ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
         <script src="assets/ShopPage/js/bootstrap.bundle.min.js"></script>
<?php
include_once("footer.php");
	?>