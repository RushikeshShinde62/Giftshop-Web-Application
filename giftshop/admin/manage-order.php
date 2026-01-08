<?Php require('include/header.php');?>
     
 <table border="0" cellpadding="0" cellspacing="0" width="100%" class="table_list">
     
   <tr>
          <th width="6%">SR No</th>
          <th width="8%">Order No</th>
      
    <th width="8%">Order Date</th>
          <th width="20%">Name</th>
       
   <th width="25%">Address</th>
          <th width="20%">Email</th>
        
  <th width="8%">Mobile No</th>
          <th width="10%">View</th>
       
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
 $sql="SELECT * FROM ordermaster ORDER BY orderid ASC";
$result=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);
if($rowcount!=0){$srno=0;while($row=mysqli_fetch_array($result)){$srno++;?>
      
  <tr>
       
   <td><?Php echo $srno;?></td>
         
 <td><?Php echo $row["orderid"];?></td>
        
  <td><?php echo date("d-m-Y",strtotime($row['orderdate']));?></td>
         
 <td><?Php echo $row["membername"];?></td>
         
 <td><?Php echo $row["address"];?></td>
         
 <td><?Php echo $row["email"];?></td>
         
 <td><?Php echo $row["mobileno"];?></td>
         
 <td><a href="view-order.php?rid=<?Php echo $row["orderid"];?>" title="Delete">View</a></td>
         
 <td><a href="delete-order.php?rid=<?Php echo $row["orderid"];?>" title="Delete">Delete</a></td>
        </tr>
     
   <?Php }}else{?>
        <tr>
          <th>No Record Found...</th>
        </tr>
     
   <?Php }?>
     
 </table>
     
 <?Php require('include/footer.php');?>
