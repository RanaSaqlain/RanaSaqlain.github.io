   <footer id="htc__footer">
            <!-- Start Footer Widget -->
            <div class="footer__container bg__cat--1">
                <div class="container">
                    <div class="row">
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer">
                                <h2 class="title__line--2">ABOUT US</h2>
                                <div class="ft__details">
                                    <p>WE Sell Products Online .... </p>
                                    <div class="ft__social__link">
                                        <ul class="social__link">
                                            <li><a href="#"><i class="icon-social-twitter icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-instagram icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-facebook icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-google icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-linkedin icons"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-2 col-sm-6 col-xs-12 xmt-40">
                            <div class="footer">
                                <h2 class="title__line--2">information</h2>
                                <div class="ft__inner">
                                    <ul class="ft__list">
                                        <li><a href="aboutus.php">About us</a></li>
                                        <li><a href="DI.php">Delivery Information</a></li>
                                        <li><a href="Privacyp.php">Privacy & Policy</a></li>
                                        <li><a href="TermCon.php">Terms  & Condition</a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                     
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-2 col-sm-6 col-xs-12 xmt-40 smt-40">
                            <div class="footer">
                                <h2 class="title__line--2">Our service</h2>
                                <div class="ft__inner">
                                    <ul class="ft__list">
                                        <li><a href="Customers/login.php">My Account</a></li>
                                        <li><a href="show-cart">My Cart</a></li>
                                        <li><a href="Customers/login.php">Login</a></li>
                                        <li><a href="wishlist">Wishlist</a></li>
                                        <li><a href="checkout">Checkout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-sm-6 col-xs-12 xmt-40 smt-40">
                            <div class="footer">
                                <h2 class="title__line--2">NEWSLETTER </h2>
                                <div class="ft__inner">
                                    <form method="post">
                                    <div class="news__input">
                                        <input type="email" placeholder="Your Mail*" required>
                                        <div class="send__btn">
                                            <a class="fr__btn" href="#" type="button" name="Submit">Send Mail</a>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                    </div>
                </div>
            </div>
            <!-- End Footer Widget -->
            <!-- Start Copyright Area -->
            <div class="htc__copyright bg__cat--5">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="copyright__inner">
                                <p>Copyright© <a href="index">Shopping Bazar</a> 2021. All right reserved.</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Copyright Area -->
        </footer>
        <!-- End Footer Style -->
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="assets/ShopPage/js/vendor/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
         $(document).ready(function() {

            
           $(window).on("beforeunload", function() { 
              $.ajax({
                      url:"function.php",
                      method:"post",
                      dataType:"json",
                      data:{opp:"cookie"},
                      success:function(response){
                       

        }
     });
            });
        });
    </script>

     <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
       <script src="assets/Jquery/jquery-3_6.js"></script>
<script type="text/javascript">
//set your publishable key
Stripe.setPublishableKey('pk_test_51JOGznLJmPxt11F1RwQ1Nletc5hY6uuED40cfdyuqXkBfHaETq3zYFlol8IiDJZgVMF1pHnLNvNwYESfquK2pC3M00N34KZZbC');


  function sendform()
  {
   var fname= $('#fname').val();
          var lname = $('#lname').val();
          var street = $('#street').val();
          var house = $('#house').val();
          var city = $('#city').val();
          var  zip = $('#zip').val();
          var email = $('#email').val();
          var phone = $('#phone').val();
           var  stripeToken = $("#stripeToken").val();

             $.ajax({
              url: "function.php",
              type: "POST",
              dataType: "json",
              data: {opp : "checkout",firstname:fname,lastname:lname,streetno:street,houseno:house,city:city,zip:zip,email:email,phone:phone,stripeToken:stripeToken},
              
              success:function(response){
                if(response == 'index.php'){
                            swal("Shopping Bazar", " Shopping Cart is empty , Add Products");
                            setTimeout(function(){
                                window.location = response;
                            },5);
                        }else
                        {
                             window.location = response;
                        }

              }
            });



  }
//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        swal("Shopping Bazar!", response.error.message);
        $('#payBtn').removeAttr("disabled");
        //display the errors on the form
        $(".payment-errors").html(response.error.message);
    } else {
        var form$ = $("#paymentFrm");
        //get token id
        var token = response['id'];
        //insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' id='stripeToken' value='" 
+ token + "' />");
        //submit form to the server
         // form$.get(0).submit();
            sendform();





    }
}
$(document).ready(function() {
   
    //on form submit
    $("#paymentFrm").submit(function(event) {
        //disable the submit button to prevent repeated clicks
        $('#payBtn').attr("disabled", "disabled");
        
        //create single-use token to charge the user
        Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
        
        //submit from callback
        return false;
    });


     function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}
        function verfication()
        {

          var fname= $('#fname').val();
          var lname = $('#lname').val();
          var street = $('#street').val();
          var house = $('#house').val();
          var city = $('#city').val();
          var  zip = $('#zip').val();
          var email = $('#email').val();
          var phone = $('#phone').val();

          if (fname == "" ||   $.isNumeric(fname)  ) {
            
            swal("Shopping Bazar!", "First name Canot have Number in it ");
            return false;
          }
           else if (lname == "" ||   $.isNumeric(lname)  ) {
            
            swal("Shopping Bazar!", "Last name Canot have Number in it ");
             return false;
          }
        if (street == "") {
            
            swal("Shopping Bazar!", " Please Provide Street No ");
             return false;
          }  
          if (house == "") {
            
            swal("Shopping Bazar!", "Please Provide House No");
             return false;
          }
           
            if (city == "") {
            
            swal("Shopping Bazar!", "Please Provide City");
             return false;
          }
       
        if (zip == "") {
            
            swal("Shopping Bazar!", "Please Provide Zip Code");
             return false;
          }
            if (phone == "" ) {
             swal("Shopping Bazar!", "Please Provide Phone");
              return false;
          }
            if (email == ""  ) {
             swal("Shopping Bazar!", "Please Provide Email");
              return false;
          }else if(!validateEmail(email)){
             swal("Shopping Bazar!", "Please Provide Correct Email");
              return false;
          }
           
           return true; 
          
        }
    $('#address_verification').on('click',function(){
           if (!(verfication())){
           setTimeout(function(){
            $('#formaddress').trigger("click")

    },1);
           }

    });
    $('#CODBTN').on('click',function(){
            var fname= $('#fname').val();
          var lname = $('#lname').val();
          var street = $('#street').val();
          var house = $('#house').val();
          var city = $('#city').val();
          var  zip = $('#zip').val();
          var email = $('#email').val();
          var phone = $('#phone').val();
   

        $.ajax({
              url: "function.php",
              type: "POST",
              dataType: "json",
              data: {opp : "checkout",firstname:fname,lastname:lname,streetno:street,houseno:house,city:city,zip:zip,email:email,phone:phone},
              
              success:function(response){
                        if(response == 'index.php'){
                            swal("Shopping Bazar", " Shopping Cart is empty , Add Products");
                            setTimeout(function(){
                                window.location = response;
                            },5);
                        }else
                        {
                             window.location = response;
                        }

                 
              }
            });

    });
});
</script>
<script
    src="https://www.paypal.com/sdk/js?client-id=AShs2zj0_fLDPuXVhHWXdvG2glfP3-MhnbxYbVxCO5a8PHmrria1kAgWlkfPhRHQ-N6wUByZBwSUUTwq&disable-funding=credit,card,paylater&commit=true"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
  </script>
  <script type="text/javascript">
      $(document).ready(function() {
            function sendpaypalform(){
                var fname= $('#fname').val();
          var lname = $('#lname').val();
          var street = $('#street').val();
          var house = $('#house').val();
          var city = $('#city').val();
          var  zip = $('#zip').val();
          var email = $('#email').val();
          var phone = $('#phone').val();
          

             $.ajax({
              url: "function.php",
              type: "POST",
              dataType: "json",
              data: {opp : "checkout",firstname:fname,lastname:lname,streetno:street,houseno:house,city:city,zip:zip,email:email,phone:phone,paypal:"yes"},
              
              success:function(response){
                if(response == 'index.php'){
                            swal("Shopping Bazar", " Shopping Cart is empty , Add Products");
                            setTimeout(function(){
                                window.location = response;
                            },5);
                        }else
                        {
                             window.location = response;
                        }

              }
            });
            }
           paypal.Buttons({
    createOrder: function(data, actions) {

      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: <?php  if (isset($_SESSION['subtotal'])) {echo $_SESSION['subtotal'];}else{echo"0.00";} ?>
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
                   
                  if(details["status"] == "COMPLETED"){
                        sendpaypalform();
                  }

      });
    },onCancel: function (data) {
    // Show a cancel page, or return to cart
    swal("Shopping Bazar","You Emited the transaction");
  }
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.
       
    

      });
  </script>
<script type="text/javascript">
           setTimeout(function(){
 
          console.clear();
      
   },15000);
  
</script>
    <!-- Bootstrap framework js -->
    <script src="assets/ShopPage/js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="assets/ShopPage/js/plugins.js"></script>
    <script src="assets/ShopPage/js/slick.min.js"></script>
    <script src="assets/ShopPage/js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="assets/ShopPage/js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="assets/ShopPage/js/main.js"></script>
    
</body>

</html>