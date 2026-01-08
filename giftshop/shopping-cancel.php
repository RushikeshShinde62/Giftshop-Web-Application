<?php include('config.php');?>
<div id="main_container">
  <?Php include('include/header.php');?>
  <div id="main_content">
  
    <?Php include('include/leftbar.php');?><div id="main_container">
 
  
    
    <div class="center_content">
      <div class="center_title_bar">Our Services</div>
      <?Php $sql="delete from shoppingmaster where sessionid='".session_id()."'";if(mysql_query($sql)){?>
      <p style="margin-left:120px;margin-top:50px;">Your shopping has been canceled. </p>
      <br />
      <p style="margin-left:170px;"><a href="home.php">Home</a> </p>
      <?Php }?>
    </div>
      <?Php include('include/footer.php');?>
</div>
</body>
</html>