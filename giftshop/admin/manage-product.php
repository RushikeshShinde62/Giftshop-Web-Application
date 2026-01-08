<?Php require('include/header.php');?>
 
     <table border="0" cellpadding="0" cellspacing="0" width="100%" class="table_list">
        
<tr>
          <th width="5%">SR No</th>
          <th width="5%">Image</th>
          <th width="15%">Product Name</th>
          <th width="10%">Product Rate</th>
          <th width="45%">Description</th>
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
 $sql="SELECT * FROM productmaster ORDER BY productid ASC";
$result=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);
if($rowcount!=0)
{
$srno=0;
while($row=mysqli_fetch_array($result)){$srno++;?>
       
 <tr>
          <td><?Php echo $srno;?></td>
         
 <td><img src="../product-master/<?Php echo $row["imagename"];?>" height="62" width="62" /></td>
       
   <td><?Php echo $row["productname"];?></td>
          
<td><?Php echo $row["rate"];?></td>
         
 <td><?Php echo $row["description"];?></td>
        
  <td><a href="edit-product.php?rid=<?Php echo $row["productid"];?>" title="Edit">Edit</a></td>
     
  <td><a href="delete-product.php?rid=<?Php echo $row["productid"];?>" title="Delete">Delete</a></td>
        </tr>
        <?Php }}else{?>
        <tr>
          <th>No Record Found...</th>
        </tr>
        <?Php }?>
      </table>
      <?Php require('include/footer.php');?>
