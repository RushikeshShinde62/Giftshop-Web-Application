<?php
////session_start();
//$CONN = mysqli_connect('localhost','root','');
//if($CONN){
//	$DB=mysqli_select_db('giftshop', $CONN);
//	if(!$DB){
//		mysqli_close($CONN);
//		echo "Cannot Select DataBase";
//	}
//}else{
//	echo "Cannot connect to mySql Server.";
//}?>
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
?>
