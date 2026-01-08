<?Php 
//require('../config.php');
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
$MSG='';
if(isset($_POST["btnSubmit"])){	

	$sql="SELECT * FROM adminmaster WHERE  username='".$_POST["username"]."' AND password='".$_POST["password"]."'";

	$result=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);

	if($rowcount!=0){

		$row=mysql_fetch_array($result);
		$_SESSION["UID"]=$row["adminid"];
		$_SESSION["UNAME"]=$row["username"];	
		$_SESSION["PASS"]=$row["password"];
		header('location:welcome.php');		
	}else{
		$MSG='Invalid Username or Password...';
	}
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel :Login</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td colspan="2"><img src="images/head.jpg" height="75" width="100%"/></td>
  </tr>
  <tr>
    <td width="70%"height="300px" align="center"><form name="frmLogin" id="frmLogin" action="" method="post" enctype="multipart/form-data">
        <table border="0" cellpadding="2" cellspacing="2" width="500" class="form-table" align="center">
          <tr>
            <td colspan="2" height="50" valign="top"><div id="login-status"> <span class="login-status-icon"></span>
                <div id="login-status-message">
                  <?Php if(isset($MSG)){echo $MSG;}?>
                </div>
              </div></td>
          </tr>
          <tr>
            <th colspan="2" height="30px" style="text-align:center;">Administrator Login</th>
          </tr>
          <tr>
            <th>User Name: </th>
            <td><input type="text" name="username" id="username" title="User Name" class="text" AUTOCOMPLETE="off" tabindex="1" /></td>
          </tr>
          <tr>
            <th>Password: </th>
            <td><input type="password" name="password" id="password" class="text" AUTOCOMPLETE="off" /></td>
          </tr>
          <tr>
            <th colspan="2" align="center" height="30" style="text-align:center;"><input type="submit" name="btnSubmit" value="Submit"/>
            </th>
          </tr>
        </table>
      </form></td>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <th style="color:#CCC;background:#39F;" height="22" colspan="2">  &copy; Copyright 2018<a href="#" target="_blank" style="color:#FFF;">E-SHOPPERInc. All rights reserved.</a> </th>
  </tr>
</table>
</body>
</html>
