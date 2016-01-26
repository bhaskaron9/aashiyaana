<?php
	$host = 'localhost';
	$user = 'root';
	$pw = '';
	$db = 'flat_finder';
	$error_message = 'Couldn\'t Connect to the Database';
	$conn=mysql_connect($host,$user,$pw);
	if($conn &&mysql_select_db($db))
	{echo "connected";}
	else 
		die($error_message);
?>