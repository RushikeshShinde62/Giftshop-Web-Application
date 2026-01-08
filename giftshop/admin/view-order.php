<?Php include('include/header.php');
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
      if(isset($_GET["rid"]) && $_GET["rid"]!="" && is_numeric($_GET["rid"]))
      $orderid=mysql_real_escape_string($_GET["rid"]);
      else
      $orderid=0;
      $ordersql="SELECT * from ordermaster where orderid=".$orderid."";
$orderresult=mysqli_query($conn,$ordersql);
$rowcount=mysqli_num_rows($orderresult);
if($rowcount!=0)
{
$order=mysqli_fetch_array($orderresult);?>

<table border="0" width="100%" cellpadding="0" cellspacing="0" class="table_view">
  <tr style="background-color:#999; color:#FFF;font-weight:bold;font-size:12px;text-align:center;">
    <th colspan="4" style="text-align:center;">Bill</th>
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
<table border="0" width="100%" cellpadding="0" cellspacing="0" class="table_view">
  <tr style="background-color:#999; color:#FFF;font-weight:bold;font-size:12px;">
    <th>Sr No</th>
    <th>Image</th>
    <th>Product Name</th>
    <th>Rate</th>
    <th>Quantity</th>
    <th>Amount</th>
  </tr>
  <?Php 
			$productsql="SELECT orderdetails.*,productmaster.productname,productmaster.imagename FROM orderdetails INNER JOIN productmaster ON orderdetails.productid = productmaster.productid where orderdetails.orderid=".$_GET["rid"]."";
			$productresult=mysqli_query($conn,$productsql);
			$rowcount=mysqli_num_rows($productresult);
			if($rowcount!=0){
				$pno=0;
				$namt=0;
				while($product=mysqli_fetch_array($productresult)){$pno++;
				$amt=0;
				$amt=round($product["quantity"] * $product["rate"]);
				$namt = $namt + $amt;
				?>
  <tr>
    <td><?Php echo $pno;?></td>
    <td><img src="../product-master/<?Php echo $product["imagename"];?>" height="45" width="45" />
      </th>
    <td><?Php echo $product["productname"];?></td>
    <td><?Php echo $product["rate"];?></td>
    <td><?Php echo $product["quantity"];?></td>
    <td><?Php echo $amt;?></td>
  </tr>
  <?Php }?>
  <tr style="background-color:#999; color:#FFF;font-weight:bold;font-size:12px;">
    <th colspan="5" align="right">Net Amount:- </th>
    <th><?Php echo $namt;?></th>
  </tr>
  <?php }else{echo '<tr><th colspan="7">No Shopping Summary Found</th></tr>';}?>
</table>
<?php }else{echo '<h3> No Order Details Found...</h3>';}?>
<?Php include('include/footer.php');?>
