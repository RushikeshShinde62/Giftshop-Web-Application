<?Php 
include('../config.php');


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "giftshop";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
	echo "connected";
}$sql="DELETE FROM categorymaster WHERE categoryid=".$_GET["rid"]."";
if(mysqli_query($conn,$sql)){
	header('location:manage-category.php');
}else{
	echo mysql_error();
}?>