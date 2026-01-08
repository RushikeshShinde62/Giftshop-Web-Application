<?Php include('../config.php');

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
$sql="DELETE FROM ordermaster WHERE orderid=".$_GET["rid"]."";

if(mysqli_query($conn,$sql))
{
	
$query="DELETE FROM orderdetails WHERE orderid=".$_GET["rid"]."";
	
mysqli_query($conn,$query);

header('location:manage-order.php');

}
else
{
	
echo mysql_error();
}?>