
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
$shoppingsql="SELECT * from shoppingmaster where sessionid='".session_id()."'";
$countresult=mysqli_query($conn,$shoppingsql);
$totalitam=mysqli_num_rows($countresult);
$amtsql="SELECT shoppingmaster.*,productmaster.productname,productmaster.rate,productmaster.imagename FROM shoppingmaster INNER JOIN productmaster ON shoppingmaster.productid = productmaster.productid where shoppingmaster.sessionid='".session_id()."'";
$fnamt=0;
$amtresult=mysqli_query($conn,$amtsql);if(mysqli_num_rows($amtresult)!=0){
	$fnamt=0;
	while($fproduct=mysqli_fetch_array($amtresult)){
		$famt=0;
		$p=$fproduct["rate"]*0.8;
		$famt=round($fproduct["quantity"] * $p);
		$fnamt = $fnamt + $famt;
	}
}?>

<div class="right_content">
  <div class="shopping_cart">
    <div class="cart_title"></div>
    <div class="cart_details"> <?Php echo $totalitam;?> ITEMS <br />
      <span class="border_cart"></span> Total: <span class="price">Rs .<?Php echo round($fnamt);?></span> </div>
    <div class="cart_icon"><a href="view-shopping.php" title="Shopping Summary"><img src="images1/shoppingcart.png" alt="" title="" width="48" height="48" border="0" /></a></div>
  </div>
</div>
