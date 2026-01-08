<?Php require('include/header.php');?>

<table border="0" cellpadding="0" cellspacing="0" width="100%" class="table_list">
 
 <tr>
    <th width="5%">SR No</th>
    <th width="80%">Category</th>
    <th width="10%">Edit</th>
    <th width="10%">Delete</th>
  </tr>
 
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
 $sql="SELECT * FROM categorymaster ORDER BY categoryid ASC";$result=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);
if($rowcount!=0){$srno=0;while($row=mysqli_fetch_array($result)){$srno++;?>
  <tr>
  
  <td><?Php echo $srno;?></td>
    <td><?Php echo $row["categoryname"];?></td>
    <td>
<a href="edit-category.php?rid=<?Php echo $row["categoryid"];?>" title="Edit">Edit</a></td>
    
<td><a href="delete-category.php?rid=<?Php echo $row["categoryid"];?>" title="Delete">Delete</a></td>
  </tr>
  <?Php }}else{?>
  <tr>
   
 <th>No Record Found...</th>
  </tr>
  <?Php }?>
</table>
<?Php require('include/footer.php');?>
