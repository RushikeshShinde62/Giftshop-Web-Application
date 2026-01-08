<?php include('config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Gift-Shop</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
<div id="main_container">
  <?Php include('include/header.php');?>
  <div id="main_content">
    
    <?Php include('include/leftbar.php');?>
	<style>
	.diwali
	{
	font-family:"Times New Roman", Times, serif;
	font-size:24px;
	color:#CC3300;
	font-style:italic;
	}
	.off
	{
	
	color:#006699;
	background-color:#CCCCCC;
	font-weight:bold;
	font-style:italic;
	}
	</style>
    <div class="center_content">
	<div class="diwali"><marquee>Summer special offer 20% off on each product</marquee></div>
<marquee><blink><font face="Arial, Helvetica, sans-serif"><font face="Courier New, Courier, monospace"><em><strong></strong></em></font></font></blink></marquee>

      <div class="center_title_bar">Products</div>
	  
	  <marquee><img src="images/cnt_image1.gif" height="120" width="120">
      <img src="product-master/swet4.jpg" height="120" width="120"></img>
      <img src="product-master/t2.jpg" height="120" width="120"></img>
      <img src="product-master/d4.jpg" height="120" width="120"></img>
      <img src="product-master/w4.jpg" height="120" width="120"></img>
      <img src="product-master/sun6.jpg" height="120" width="120"></img>  </marquee>
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
	 
		  $productsql="SELECT * FROM product ORDER BY productno ASC";
	  
	  $productresult=mysqli_query($conn,$productsql);if(mysqli_num_rows($productresult)!=0){$pno=0;while($product=mysqli_fetch_array($productresult)){$pno++;?>
      <div class="prod_box">
        <div class="top_prod_box"></div>
        <div class="center_prod_box"> 
          <div class="product_title" style="background-color:#CCCCCC"><a href="product-details.php?pid=<?Php echo $product["productno"];?>"><?Php echo $product["product"];?></a></div>
          <div class="product_img" style="background-color:#CCCCCC"><a href="product-details.php?pid=<?Php echo $product["productno"];?>"><img src="product-master/<?Php echo $product["imagn"];?>" height="120" width="120" /></a></div>
          <div class="prod_price" style="background-color:#CCCCCC" ><span class="price"> Rs.<?Php $p=$product["price"];echo $p; ;
		  													$a=$p*0.8;
															?></span></div>
         <div class="off"><?Php echo"with 20% off value is";?></div>
												
		  <div class="prod_price" style="background-color:#CCCCCC"><span class="price">Rs. <?Php echo $a;?></span></div>
        </div>
     <div class="prod_details_tab" align="center" style="background-color:#CCCCCC"> <a href="product-details.php?pid=<?Php echo $product["productno"];?>" class="prod_details"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;More </a></div>
      </div>
	  
	 

      <?Php }}else{echo 'No Product Found';}?>
    </div>
      <?Php include('include/footer.php');?>
</div>
</body>
</html>