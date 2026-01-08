<?php include("include/head.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Big-Bazer</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
<div id="main_container">
  <?Php include('include/header.php');?>
  <div id="main_content">
   
        <?Php include('include/leftbar.php');?>
		<style>
	
	.off
	{
	
	color:#006699;
	background-color:#CCCCCC;
	font-weight:bold;
	font-style:italic;
	}
	</style>
    <div class="center_content">
      <div class="center_title_bar">Products</div>
      <?Php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "giftshop";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
	echo "connected";
}
	  if(isset($_GET["cid"]) && $_GET["cid"]!="" && is_numeric($_GET["cid"])){
		  $productsql="SELECT * FROM productmaster where categoryid=".$_GET["cid"]." ORDER BY productid ASC";
		  	  $productresult=mysqli_query($conn,$productsql);

	  }else{
		  $productsql="SELECT * FROM productmaster ORDER BY productid ASC";
		  	  $productresult=mysqli_query($conn,$productsql);

	  }
	  if(mysqli_num_rows($productresult)!=0)
	  {
		  $pno=0;
		  while($product=mysqli_fetch_array($productresult))
		  {
			  $pno++;
		  ?>
      <div class="prod_box">
        <div class="top_prod_box"></div>
        <div class="center_prod_box">
          <div class="product_title" style="background-color:#CCCCCC"><a href="product-details.php?pid=<?Php echo $product["productid"];?>"><?Php echo $product["productname"];?></a></div>
          <div class="product_img" style="background-color:#CCCCCC"><a href="product-details.php?pid=<?Php echo $product["productid"];?>"><img src="product-master/<?Php echo $product["imagename"];?>" height="120" width="120" /></a></div>
          <div class="prod_price" style="background-color:#CCCCCC"><span class="price">Rs. <?Php $p=$product["rate"]; echo $p;
		  															$a=$p*0.8;?></span></div>
		  <div class="off"><?Php echo"with 20% off value is";?></div>
												
		  <div class="prod_price" style="background-color:#CCCCCC"><span class="price">Rs. <?Php  echo $a?></span></div>
        </div>
       
        <div class="prod_details_tab" align="center" style="background-color:#CCCCCC"> <a href="product-details.php?pid=<?Php echo $product["productid"];?>" class="prod_details"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;More </a></div>
      </div>
      <?Php }
	  }else{echo 'No Product Found';}?>
    </div>
  <?Php include('include/footer.php');?>
</div>
</body>
</html>