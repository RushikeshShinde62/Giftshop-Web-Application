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
      <div class="center_title_bar">Bill Summary</div>
      <div class="prod_box_big">
        <div class="top_prod_box_big"></div>
        <div class="center_prod_box_big">
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

		  if(isset($_GET["oid"]) && $_GET["oid"]!="" && is_numeric($_GET["oid"]))
{
			  $orderid=mysql_real_escape_string($_GET["oid"]);
		 
		  $orderid=0;
		  $ordersql="SELECT * from ordermaster where orderid=".$orderid."";

$orderresult=mysqli_query($conn,$ordersql);
if(mysqli_num_rows($orderresult)!=0)
{
$order=mysqli_fetch_array($orderresult);?>
          <table border="0" cellpadding="5" cellspacing="0" width="550">
            <tr style="background-color:#999; color:#FFF;font-weight:bold;font-size:12px;">
              <th colspan="4">Bill</th>
            </tr>
            <tr>
              <th align="right" width="60">Bill No:-</th>
              <td align="left" width="100"><?Php echo $order["orderid"];?></td>
              <th align="right" width="60">Name:-</th>
              <td align="left" width="100"><?Php echo $order["membername"];?></td>
            </tr>
            <tr>
              <th align="right">Bill Date:-</th>
              <td align="left"><?php echo date("d-m-Y",strtotime($order['orderdate']));?></td>
              <th align="right">Address:-</th>
              <td align="left"><?Php echo $order["address"];?></td>
            </tr>
            <tr>
              <th align="right">Email:-</th>
              <td align="left"><?php echo $order['email'];?></td>
              <th align="right">Mobile No:-</th>
              <td align="left"><?Php echo $order["mobileno"];?></td>
            </tr>
           
          </table>
          <table border="0" cellpadding="5" cellspacing="0" width="550">
            <tr style="background-color:#999; color:#FFF;font-weight:bold;font-size:12px;">
              <th>Sr No</th>
              <th>Image</th>
              <th>Product Name</th>
              <th>Rate</th>
              <th>Quantity</th>
              <th>Amount</th>
            </tr>
            <?Php 
			$productsql="SELECT orderdetails.*,productmaster.productname,productmaster.imagename FROM orderdetails INNER JOIN productmaster ON orderdetails.productid = productmaster.productid where orderdetails.orderid=".$_GET["oid"]."";
			$productresult=mysqli_query($conn,$productsql);if(mysqli_num_rows($productresult)!=0){
				$pno=0;
				$namt=0;
				while($product=mysqli_fetch_array($productresult)){$pno++;
				$amt=0;
				$a=$product["rate"]*0.8;
				$amt=round($product["quantity"] * $a);
				$namt = $namt + $amt;
				?>
            <tr style bgcolor="#FFFFFF">
              <td><?Php echo $pno;?></td>
              <td><img src="product-master/<?Php echo $product["imagename"];?>" height="45" width="45" />
                </th>
              <td><?Php echo $product["productname"];?></td>
              <td><?Php echo $a;?></td>
              <td><?Php echo $product["quantity"];?></td>
              <td><?Php echo $amt;?></td>
            </tr>
            <?Php{ }?>
            <tr style="background-color:#999; color:#FFF;font-weight:bold;font-size:12px;">
              <th colspan="5" align="right">Net Amount:- </th>
              <th><?Php echo $namt;?></th>
				 
            </tr>
            <tr style="background-color:#CCC; color:#FFF;font-weight:bold;font-size:12px;">
			
              <th colspan="8"> <a href="#" style="color:#FFF;font-weight:bold;font-size:12px;text-transform:uppercase;" onclick="window.print();" >Print</a></th>
			  <tr><th colspan="10" bgcolor="#666666" width="12px"><?Php echo"<br/> Including Shipping Charges 150 &nbsp;&nbsp;&nbsp;",$namt+150;?>	</th></tr>
            </tr>
			
            <?php }else{echo '<tr><th colspan="7">No Shopping Summary Found</th></tr>';}?>
          </table>
          <?php }else{echo '<h3> No Order Details Found...</h3>';}?>
        </div>
        <div class="bottom_prod_box_big"></div>
      </div>
    </div>
    
  <?Php include('include/footer.php');?>
</div>
</body>
</html>











