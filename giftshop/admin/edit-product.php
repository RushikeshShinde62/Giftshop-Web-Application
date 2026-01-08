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
$editsql="SELECT * FROM productmaster WHERE productid=".$_GET["rid"]."";
$result=mysqli_query($conn,$editsql);$row=mysqli_fetch_array($result);

if(isset($_POST["btnSubmit"]))
{

	$destPath = $_SERVER['DOCUMENT_ROOT']."bigbazer/product-master/";
	
$fileName=$_FILES['imagename']['name'];
	if($fileName!="")
{
		
$info = pathinfo($_FILES['imagename']['name']);
		
$ext  = $info['extension'];
		
$fileName = str_replace(array("."," "),"",microtime()).".".$ext;
	
if(move_uploaded_file($_FILES['imagename']['tmp_name'],$destPath.$fileName))
{

			$imagename=$fileName;
	
	}
else
{

			$imagename=$row["imagename"];
		
}
	
}
else
{
	
	$imagename=$row["imagename"];

	}
	
$sql="UPDATE productmaster SET productname='".$_POST["productname"]."',rate=".$_POST["rate"].",description='".$_POST["description"]."',imagename='".$imagename."',categoryid=".$_POST["categoryid"]." WHERE productid=".$_POST["productid"]."";
	if(mysqli_query($conn,$sql))
{

 header('location:manage-product.php');
	
}
else
{
		
echo mysql_error();
	
}
}?>


<form name="frmSubmit" id="frmSubmit" action="" method="post" enctype="multipart/form-data">
  
<table border="0" width="100%" cellpadding="0" cellspacing="0" class="form-table">
   
 <tr>
      <th>Category Name:</th>
      <td><select name="categoryid" class="select" style="width:200px;">
       
   <?Php $catsql="SELECT * FROM categorymaster ORDER BY categoryid ASC";
$cat_res=mysqli_query($conn,$catsql);
while($cat=mysqli_fetch_array($cat_res))
{
			 
 $sel="";
			  
if($row["categoryid"]==$cat["categoryid"])
{
			
  $sel='selected="selected"';
			
  }
		
	  ?>
       
   <option value="<?Php echo $cat["categoryid"];?>" <?Php echo $sel;?> ><?Php echo $cat["categoryname"];?></option>
      
    <?Php
 }
?>
   
     </select></td>
    </tr>
    <tr>
      <th>Product Name:</th>
      <td><input type="text" name="productname" id="productname"  title="Product Name" class="text" style="width:300px;" value="<?Php echo $row["productname"];?>" /></td>
    </tr>
    <tr>
      <th>Product Rate:</th>
      <td><input type="text" name="rate" id="rate"  title="Product Rate" class="text" style="width:300px;" value="<?Php echo $row["rate"];?>"/></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><textarea name="description" id="description" rows="2" cols="50" title="Description" class="textarea" style="width:400px;"><?Php echo $row["description"];?></textarea></td>
    </tr>
    <tr>
      <th>Product Image:</th>
      <td><input type="file" name="imagename" id="imagename"  title="Product Image" class="text" style="width:300px;" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnSubmit" value="Submit"/>
        <input type="hidden" name="productid" value="<?php echo $row["productid"];?>" /></td>
    </tr>
  </table>
</form>
<?Php require('include/footer.php');?>