<?php
$conn = mysqli_connect("localhost", "root", 'wnslafjq');
mysqli_select_db($conn, "userinfor");
$sql = "INSERT INTO userinfor (name,email,username,password,passconfirm,created) VALUES('".$_POST['name']."', '".$_POST['email']."', '".$_POST['username']."', '".$_POST['password']."', '".$_POST['passconfirm']."', now())";
$result = mysqli_query($conn, $sql);
header('Location: http://localhost/infortest.php');
?>
