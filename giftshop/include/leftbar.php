<?php include("config.php");?>
<?php include("head.php");?>
<div id="contentblock">
      <div id="leftpanel">
        <div class="lp_block">
          <div class="lp_tile"> <img src="images/lp_btn1.gif" width="15" height="15" alt="" class="lp_btn1" />
            <p class="lp_heading">Categories</p>
          </div>
       			
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
				
				 $sql="SELECT * FROM categorymaster ORDER BY categoryid ASC";
				 $result=mysqli_query($conn,$sql);

				 if(mysqli_num_rows($result)!=0)
				 {
					 $srno=0;while($row=mysqli_fetch_array($result))
					 {
						 $srno++;
						 ?>
    <ul><a href="index.php?cid=<?Php echo $row["categoryid"];?>"><?Php echo $row["categoryname"];?></a></ul>
    <?Php }}else{echo 'No Categories Found';}?>
				
				
        </div>
		
        <div class="lp_block1">
          <div class="lp_tile"> <img src="images/lp_btn1.gif" width="15" height="15" alt="" class="lp_btn1" />
            <p class="lp_heading">Shopping Cart</p>
          </div>
         
          	<?php include("include/rightbar.php");?>
        </div>
        <a href="http://all-free-download.com/free-website-templates/"><img src="images/lp_image.gif" width="279" height="129" alt="" class="lp_image" /></a> </div>
      <div id="contentpanel">
        		<div style="float:left; ">
          				
										
										


    

    
    <!--inner block ends up -->
  </div>
</div>