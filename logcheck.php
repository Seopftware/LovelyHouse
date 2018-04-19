<?php
  session_start();
  $is_logged=$_SESSION['ses_username'];
  echo "<br/><br/><br/><br/><br/><br/> session['uid']=".$is_logged;
?>
