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
$editsql="SELECT * FROM categorymaster WHERE categoryid=".$_GET["rid"]."";
$result=mysqli_query($conn,$editsql);
$row=mysqli_fetch_array($result);

if(isset($_POST["btnSubmit"]))
{	

	$sql="UPDATE categorymaster SET categoryname='".$_POST["categoryname"]."' WHERE categoryid=".$_POST["categoryid"]."";
	
if(mysqli_query($conn,$sql))
{

		header('location:manage-category.php');

}
else
{
		
echo mysql_error();
	
}

}?>


<form name="frmSubmit" id="frmSubmit" action="" method="post" enctype="multipart/form-data">
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" class="form-table">
   
 <tr>
      <th>Category:</th>
      <td><input type="text" name="categoryname" id="categoryname"  title="Category Name" class="text" style="width:300px;" value="<?Php echo $row["categoryname"];?>" /></td>
    </tr>
 
   <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnSubmit" value="Submit"/>
        <input type="hidden" name="categoryid" value="<?php echo $row["categoryid"];?>" /></td>

    </tr>
  </table>
</form>
<?Php require('include/footer.php');?>