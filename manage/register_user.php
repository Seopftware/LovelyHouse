<?php
$conn = mysqli_connect("localhost", "root", 'wnslafjq');
mysqli_select_db($conn, "userinfor");
$result = mysqli_query($conn, "SELECT * FROM userinfor");
?>

<head>
  <body>

  <?php
  while($row = mysqli_fetch_assoc($result)) {
    echo "ID :", $row['id'],"  Email :", $row['email'],"  UserName :",$row['username'];
    echo "<br/>";
  }
  ?>

  </body>
</head>
