<?php include('config.php');
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

$msg='';
if(isset($_POST["btn_update"])){
	
	$ordersql="INSERT INTO ordermaster(orderdate,membername,address,email,mobileno,netamount)VALUES('".date("Y-m-d H:i:s")."','".$_POST["membername"]."','".$_POST["address"]."','".$_POST["email"]."','".$_POST["mobileno"]."','".$_POST["netamount"]."')";
	if(mysqli_query($conn,$ordersql)){
		$orderid=mysqli_insert_id($ordersql);
		
		$orderDsql="SELECT shoppingmaster.*,productmaster.productname,productmaster.rate,productmaster.imagename FROM shoppingmaster INNER JOIN productmaster ON shoppingmaster.productid = productmaster.productid where shoppingmaster.sessionid='".session_id()."'";
		$orderDresult=mysqli_query($conn,$orderDsql);
		while($order=mysqli_fetch_array($orderDresult)){
			$amt=0;
			$amt=round($order["quantity"] * $order["rate"]);
			$orderDetails="INSERT INTO orderdetails(productid,quantity,rate,amount,orderid)VALUES(".$order["productid"].",".$order["quantity"].",".$order["rate"].",".$amt.",".$orderid.")";
			mysqli_query($conn,$orderDetails);
		}
		$Ssql="delete from shoppingmaster where sessionid='".session_id()."'";
		if(mysqli_query($conn,$Ssql))
		{
			header('location:bill.php?oid='.$orderid);
		}
			
	}else{
		echo mysql_error();
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Big-Bazer</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" href="validation/css/validationEngine.jquery.css" type="text/css"/>
	<link rel="stylesheet" href="validation/css/template.css" type="text/css"/>
<script src="validation/js/jquery-1.8.2.min.js" type="text/javascript">
	</script>
	<script src="validation/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
	</script>
	<script src="validation/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
	</script>
<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#myform").validationEngine();
		});

		/**
		*
		* @param {jqObject} the field where the validation applies
		* @param {Array[String]} validation rules for this field
		* @param {int} rule index
		* @param {Map} form options
		* @return an error string if validation failed
		*/
		function checkHELLO(field, rules, i, options){
			if (field.val() != "HELLO") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
			}
		}
	</script>


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
              <th>Amount</th>
              <th>Delete</th>
			  <th></th>
            </tr>
            <?Php 
			$productsql="SELECT shoppingmaster.*,productmaster.productname,productmaster.rate,productmaster.imagename FROM shoppingmaster INNER JOIN productmaster ON shoppingmaster.productid = productmaster.productid where shoppingmaster.sessionid='".session_id()."'";
			$productresult=mysqli_query($conn,$productsql);if(mysqli_num_rows($productresult)!=0){
				$pno=0;
				$namt=0;
				while($product=mysqli_fetch_array($productresult)){$pno++;
				$amt=0;
				$amt=round($product["quantity"] * $product["rate"]);
				$namt = $namt + $amt;
				?>
             <tr style bgcolor="#FFFFFF">
              <td><?Php echo $pno;?></td>
              <td><img src="product-master/<?Php echo $product["imagename"];?>" height="45" width="45" />
                </th>
              <td><?Php echo $product["productname"];?></td>
              <td><?Php echo $product["rate"];?></td>
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
            <tr >
              <th colspan="8">&nbsp; </th>
            </tr>
            <?php }else{echo '<tr><th colspan="7">No Shopping Summary Found</th></tr>';}?>
          </table>
          <form method="post" id ="myform">
<table class="table" align="center">
	       <tr>
    	<td> Name</td>
        <td>
        	<input type="text" name="membername" class="validate[required]"  placeholder="Name" class="form-control" />
        </td>
    </tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
    	<td>*Address</td>
        <td>
        	<input type="text" name="address" class="validate[required]" class="form-control" placeholder="Address" colspan=5 rowspan=10 />
        </td>
    </tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr>
    	<td>*Email</td>
        <td>
        	<input type="text" name="email" class="validate[required,custom[email]]" class="form-control" placeholder="you@gmail.com" />
    	    </tr>
			<tr></tr>
			<tr></tr>
			<tr></tr>
 
     <tr>
    	<td>Mobile</td>
        <td>
        	<input type="text" name="mobileno" class="validate[required,custom[integer,minSize[10],maxSize[10]]]" class="form-control" placeholder="mobile" />
        </td>
    </tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
    <tr>
    	<td colspan="2" align="center">
        	<input type="submit" name="btn_update" value="Checkout" class="btn btn-lg btn-success" /> 
        </td>
		
		<td><input type="hidden" name="netamount" id="netamount" value="<?Php echo $namt;?>" />
                  &nbsp; <a href="shopping-cancel.php" align="center" style="color:#000;font-weight:bold;font-size:12px;text-transform:uppercase;">Cancel</a></div>
      </td>
    </tr>
</table>
                   </div>
            </div>
          </form>
        </div>
        <div class="bottom_prod_box_big"></div>
      </div>
    </div>
    
  <?Php include('include/footer.php');?>
</div>
</body>
</html>