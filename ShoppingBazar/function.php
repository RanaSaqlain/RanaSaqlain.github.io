<?php
if (session_id() =="") {
     session_start();
      if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
			  $_SESSION['subtotal'] =  0;

			  	if (isset($_COOKIE["cart"])) {
			  		$cart = json_decode($_COOKIE["cart"]);
			  		if ($cart != null) {
			  		$_SESSION['cart'][] = $cart;
			  		}
			  		
			  	}
  			
		    }
		

 }

function get_products($con,$type='')
{
	$sql="SELECT * FROM `products`";
	if ($type=='latest')
	 {
		$sql.="  where `product_Status`='1' order by product_id desc LIMIT 8";
	}

	
	$res=mysqli_query($con,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$data[]=$row;
	}
	return $data;
}
function get_products_cat($con,$cat_id='')
{
	$sql="SELECT * FROM `products`";
	if($cat_id!='')
	{
		$sql.=" inner join category on  products.C_ID = category.Category_ID where `Category_ID` ='$cat_id'";
	}

		$sql.=" order by product_id desc  LIMIT 7";
	// print_r($sql);exit();
	$res= mysqli_query($con,$sql);

	$data=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$data[]=$row;

	}
	
	return $data;
}
function get_cats_name($con,$catid='')
{
	$sql="SELECT category.Category_Name FROM category WHERE category.Category_ID = (SELECT products.C_ID FROM products WHERE products.product_id = '$catid')";

	$res= mysqli_query($con,$sql);

	$data="";
	while($row=mysqli_fetch_assoc($res))
	{
		$data=$row['Category_Name'];

	}
	
	return $data;
}

function get_products_detail($con,$product_id)
{
$sql="SELECT * FROM `products` WHERE product_id=$product_id";
$sql.=" order by product_id desc  LIMIT 7";
	$res= mysqli_query($con,$sql);
$data=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$data[]=$row;

	}
	
	return $data;
}

function get_searched_product($con,$srch)
{
  $sql = " SELECT products.* from products WHERE product_Name LIKE '%$srch%' OR product_Description LIKE '%$srch%' OR product_Color LIKE '%$srch%' or product_sprice LIKE '%$srch%'  LIMIT 8";
  $res= mysqli_query($con,$sql);

	$data=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$data[]=$row;

	}
	
	return $data;


}
 function addtocart($con,$id)
{


	$output = "";
  $get_product=get_products_detail($con,$id);
  
    
   if (isset($_SESSION['cart'][$id])) {
     if ( $get_product["0"]["product_instock"] > $_SESSION['cart'][$id]["quantity"])
      {
      	 $_SESSION['cart'][$id]["quantity"]  =  $_SESSION['cart'][$id]["quantity"] +1;
      	 $output  = " Product  Quantity increased ";
      }else
      {
      	$output = "Stock is already in your Cart";

      }           
        }else
        {
        		if ($get_product["0"]["product_instock"] >0) {
        			
        	
            $_SESSION['cart'][$id]=[
                 
                    "id" =>$get_product["0"]["product_id"] ,
                     "image" =>  $get_product["0"]["product_Image"],
                     "name"=>$get_product["0"]["product_Name"],
                    "quantity"=>1,
                    "price"=>$get_product["0"]["product_sprice"],

              
          ];
          $output = " Product  Added in Cart ";
        }else
        {
        $output = "Sorry , This Product is currently not avaiable";	
        }

      }
       

getcarttotal();
        return $output;
}
function delfromcart($id)
{
	if (isset($_SESSION["cart"][$id])) {

		$_SESSION["cart"][$id][] = null; 
		unset($_SESSION["cart"][$id]);
	}
	getcarttotal();
	return " Product Removed ";
}

function  getcarttotal()
{

	$_SESSION['subtotal'] = null;
	 if (isset($_SESSION['cart'])) {

     foreach ($_SESSION['cart'] as $key => $value) {
     			if($value != null )
     			{
     				$_SESSION['subtotal']  +=$value['price'] * $value['quantity'];
     			}
     
 } }
}
function increaseitemquantity($con,$id)
{
	  $get_product=get_products_detail($con,$id);
$output ="";
   if (isset($_SESSION['cart'][$id])) {
     if ( $get_product["0"]["product_instock"] > $_SESSION['cart'][$id]["quantity"]) {
      	 $_SESSION['cart'][$id]["quantity"]  =  $_SESSION['cart'][$id]["quantity"] +1;
      	 $output  = " Product  Quantity increased ";
      }else
      {
      	$output = "Stock is already in your Cart";
      }
		getcarttotal();
		return $output;
}
}
function decreaseitemquantity($id)
{
	$output ="";
if (isset($_SESSION["cart"][$id])) {
	if($_SESSION["cart"][$id]["quantity"] > 0){
   $_SESSION["cart"][$id]["quantity"] -=1;
   $output = "Quantity decreased";
	}else
	{
		$output =  delfromcart($id);

	}
		
		}
		getcarttotal();
		
		return $output;
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
if (isset($_POST['opp'])) {
	

if ($_POST['opp']=="cookie") {
   $cookie_array = array();
   		if (isset($_SESSION["cart"])) {
   					if($_SESSION["cart"] != null)
   					{
   						$cookie_array[] = $_SESSION['cart'];
   			setcookie("cart", json_encode($cookie_array), time() + (86400 * 60), "/");
   					}
   			
   		}


}}

}
?>