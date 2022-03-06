<?php
function get_products($con,$type='')
{
	$sql="SELECT * FROM `products`";
	if ($type=='latest')
	 {
		$sql.="  where `product_Status`='1' order by product_id desc LIMIT 10";
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
	$sql="SELECT products.*,category.* FROM products INNER JOIN category on products.product_id where products.product_id=$catid";


			// print_r($sql);exit();
	$res= mysqli_query($con,$sql);

	$data=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$data[]=$row;

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
?>