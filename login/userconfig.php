<?php
	$mysql_hostname="localhost";
	$mysql_user="root";
	$mysql_password="wnslafjq";
	$mysql_database="userinfor";
	$connect=mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("db connect error");
	mysqli_select_db($connect, $mysql_database) or die("db connect error");
	?>
