<?php
session_start();
$CONN = mysql_connect('localhost','root','');
if($CONN){
	$DB=mysql_select_db('giftshop', $CONN);
	if(!$DB){
		mysql_close($CONN);
		echo "Cannot Select DataBase";
	}
}else{
	echo "Cannot connect to mySql Server.";
}?>
