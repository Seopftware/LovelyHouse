<!DOCTYPE html>
<html>
<html lang="en">
<meta charset="utf-8">

<head>

    <!-- BootStrap RDX 적용 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <!-- ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ -->

    <!--Navigation Bar-->
</head>
  <body>
    <nav>
      <ol>
        <?php
        session_start();
        if(!isset($_SESSION['ses_username'])) {
        echo file_get_contents('0.nav.php');
      } else {
        echo file_get_contents('0.login_nav.php');
      }
        ?>
      </ol>
    </nav>

    <div class="container">
      <?php
      if(!empty($_GET['id'])) {
        // if($_GET['id']==5) {
        //   echo file_get_contents('index.php');
        // }
        echo file_get_contents($_GET['id'].'.php');


      }
      ?>
    </div>

      <!--하단의 CopyRight-->
    <div class="container marketing">

      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2014 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div>
  </body>
</html>
