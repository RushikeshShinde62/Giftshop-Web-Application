<?Php require('include/header.php');
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
if(isset($_POST["btnSubmit"])){
	$destPath = $_SERVER['DOCUMENT_ROOT']."bigbazer1/product-master/";
	$fileName=$_FILES['imagename']['name'];
	$info = pathinfo($_FILES['imagename']['name']);
	$ext  = $info['extension'];
	
		$sql="INSERT INTO productmaster(productname,rate,description,imagename,categoryid)VALUES('".$_POST["productname"]."',".$_POST["rate"].",'".$_POST["description"]."','".$fileName."',".$_POST["categoryid"].")";
		if(mysqli_query($conn,$sql)){
			header('location:manage-product.php');
		}else{
			echo mysql_error();
		}
	}
?>

<form name="frmSubmit" id="frmSubmit" action="" method="post" enctype="multipart/form-data">
  <table border="0" width="100%" cellpadding="0" cellspacing="0" class="form-table">
    <tr>
      <th>Category Name:</th>
      <td>
<select name="categoryid" class="select" style="width:200px;">
          <?Php $catsql="SELECT * FROM categorymaster ORDER BY categoryid ASC";$cat_res=mysqli_query($conn,$catsql);?>
<option value="">-----select catergoryid-----</option><?php
while($cat=mysqli_fetch_array($cat_res)){?>

          <option value="<?Php echo $cat["categoryid"];?>"><?Php echo $cat["categoryname"];?></option>
          <?Php }?>
        </select></td>
    </tr>
    <tr>
      <th>Product Name:</th>
      <td><input type="text" name="productname" id="productname"  title="Product Name" class="text" style="width:300px;" /></td>
    </tr>
    <tr>
      <th>Product Rate:</th>
      <td><input type="text" name="rate" id="rate"  title="Product Rate" class="text" style="width:300px;" /></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><textarea name="description" id="description" rows="2" cols="50" title="Description" class="textarea" style="width:400px;"></textarea></td>
    </tr>
    <tr>
      <th>Product Image:</th>
      <td><input type="file" name="imagename" id="imagename"  title="Product Image" class="text" style="width:300px;" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnSubmit" value="Submit"/></td>
    </tr>
  </table>
</form>
<?Php require('include/footer.php');?>