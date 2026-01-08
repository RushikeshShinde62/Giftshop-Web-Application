<?Php include('../config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
  <td colspan="2"><img src="images/head.jpg" width="100%" height="80px" />
    <div class="welcome-text"> User Name:- admin</div>
    <a href="logout.php" class="btn-logout">Log-Out</a></td>
</tr>
<tr>
  <td style="border-left:1px solid #cbcbcb;width:10%;vertical-align:top;"><div id="main-nav">
      <div class="main-head"></div>
      <div class="main-image"><a href="welcome.php"><img src="images/admin.jpg" width="120" height="120"></a></div>
      <div class="main-head">Admin Control & Management</div>
      <div class="main-mid" id="accordion">
        <h2><a href="#">Category Management</a></h2>
        <div>
          <ul>
            <li><a href="add-category.php"><span>Add New Category</span></a></li>
            <li><a href="manage-category.php"><span>Manage Category</span></a></li>
          </ul>
        </div>
        <h2><a href="#">Product Management</a></h2>
        <div>
          <ul>
            <li><a href="add-product.php"><span>Add New Product</span></a></li>
            <li><a href="manage-product.php"><span>Manage Product</span></a></li>
          </ul>
        </div>

        <h2><a href="#">Order Management</a></h2>
        <div>
          <ul>
            <li><a href="manage-order.php"><span>Manage Order</span></a></li>
          </ul>
        </div>


      </div>
    </div></td>
  <td  style="border-left:1px solid #cbcbcb;vertical-align:top;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="table_head">
      <tr>
        <th width="40%" align="left">&nbsp;</th>
        <th width="60%" align="left" id="response"></th>
        <th width="10%" align="right" valign="middle" class="action"> </th>
      </tr>
    </table>
