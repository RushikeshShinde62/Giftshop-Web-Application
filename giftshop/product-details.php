<?php 
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

include("config.php");
 include("include/head.php");
$msg='';
if(isset($_POST["btnSubmit"])){
	$versql="select * from shoppingmaster where productid=".$_POST["productid"]." AND sessionid='".session_id()."'";
	$res=mysqli_query($conn,$versql);
	if(mysqli_num_rows($res)!=0){
		$msg="You have already buy this product please update quantity";
	}else{
		$sql="INSERT INTO shoppingmaster(productid,quantity,sessionid)VALUES('".$_POST["productid"]."',".$_POST["quantity"].",'".session_id()."')";
		if(mysqli_query($conn,$sql)){
			header('location:view-shopping.php');
		}else{
			echo mysql_error();
		}
	}
}

?>

<body>
<div id="main_container">
  <?Phpinclude('include/header.php');?>
  <div id="main_content">
  
    <?Php include('include/leftbar.php');?>
    <div class="center_content">
      <div class="center_title_bar">Product Details</div>
      <?Php if(isset($_GET["pid"]) && $_GET["pid"]!="" && is_numeric($_GET["pid"])){$productsql="SELECT * FROM productmaster where productid=".$_GET["pid"]."";$productresult=mysqli_query($conn,$productsql);$product=mysqli_fetch_array($productresult);?>
      <div class="prod_box_big" style="background-color:#C9C9C9">
        <div class="top_prod_box_big"></div>
        <div class="center_prod_box_big">
          <div class="product_img_big"><img src="product-master/<?Php echo $product["imagename"];?>" height="120" width="120" /></div>
          <div class="details_big_box">
            <div class="product_title_big"><?Php echo $product["productname"];?></div>
            <div class="specifications"> Description: <span class="blue"><?Php echo $product["description"];?></span><br />
              Rate: <span class="blue"> Rs. <?Php $a=$product["rate"];$p=$a*0.8; echo $p?></span><br />
            </div>
          </div>
        </div>
        <form name="frm" action="#" method="post">
          <div class="center_prod_box_big">
            <div class="contact_form">
              <div class="form_row">
                <label class="contact"><strong>Quantity:</strong></label>
                <select name="quantity" id="quantity" class="contact_input">
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                  <option value="6">06</option>
                  <option value="7">07</option>
                  <option value="8">08</option>
                  <option value="9">09</option>
                  <option value="10">10</option>
                </select>
              </div>
              <div class="form_row">
                <input type="hidden" name="productid"  value="<?Php echo $product["productid"];?>" />
                <input type="submit" name="btnSubmit" id="btnSubmit" value="Add To Cart" />
              </div>
              <div class="form_row">
                <p><?Php echo $msg;?></p>
              </div>
            </div>
          </div>
        </form>
        <div class="bottom_prod_box_big"></div>
      </div>
      <?Php }else{
		  echo 'No Details Found';
		  }?>
    </div>
   

  <?Php include('include/footer.php');?>
</div>
</body>
</html>