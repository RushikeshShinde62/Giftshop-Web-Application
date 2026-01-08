<?php include('config.php');?>
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
    <div class="center_content">
      <div class="center_title_bar">Shopping Summary</div>
      <div class="prod_box_big">
        <div class="top_prod_box_big"></div>
        <div class="center_prod_box_big">
          <table border="0" cellpadding="5" cellspacing="0" width="550">
            <tr style="background-color:#999; color:#FFF;font-weight:bold;font-size:12px;">
              <th>Sr No</th>
              <th>Image</th>
              <th>Product Name</th>
              <th>Rate</th>
              <th>Quantity</th>
              <th>Amount with 20%discount</th>
              <th>Delete</th>
			  <th></th>
                   
            
            </tr>
			<tr></tr>
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

			
			$productsql="SELECT shoppingmaster.*,productmaster.productname,productmaster.rate,productmaster.imagename FROM shoppingmaster INNER JOIN productmaster ON shoppingmaster.productid = productmaster.productid where shoppingmaster.sessionid='".session_id()."'";
			$productresult=mysqli_query($conn,$productsql);if(mysqli_num_rows($productresult)!=0){
				$pno=0;
				$namt=0;
				while($product=mysqli_fetch_array($productresult)){$pno++;
				$amt=0;
				$p=$product["rate"];
				$a=$p*0.8;
				$amt=round($product["quantity"] * $a);
				$namt = $namt + $amt;
				?>
            <tr style bgcolor="#FFFFFF">
              <td><?Php echo $pno;?></td>
              <td><img src="product-master/<?Php echo $product["imagename"];?>" height="45" width="45" />
                </th>
              <td><?Php echo $product["productname"];?></td>
              <td><?Php echo $a?></td>
              <td><?Php echo $product["quantity"];?></td>
              <td><?Php echo $amt;?></td>
             
              <td><a href="deletecartitem.php?rid=<?Php echo $product["shoppingid"];?>" title="Delete">Delete</a></td>
			  <td></td>
            </tr>
            <?Php }?>
            <tr style="background-color:#999; color:#FFF;font-weight:bold;font-size:12px;">
              <th colspan="7" align="right">Total :- </th>
              <th><?Php echo $namt;?></th>
            </tr>
            <tr style="background-color:#CCC; color:#FFF;font-weight:bold;font-size:12px;">
              <th colspan="8"> <a href="checkout.php" style="color:#FFF;font-weight:bold;font-size:12px;text-transform:uppercase;">Checkout</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="shopping-cancel.php" style="color:#FFF;font-weight:bold;font-size:12px;text-transform:uppercase;">Cancel</a></th>
            </tr>
            <?php }else{echo '<tr><th colspan="7">No Shopping Summary Found</th></tr>';}?>
          </table>
        </div>
        <div class="bottom_prod_box_big"></div>
      </div>
    </div>
   
  <?Php include('include/footer.php');?>
</div>
</body>
</html>