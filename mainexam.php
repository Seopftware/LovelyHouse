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
    <title>WELCOME_*러블리 하우스*</title>
    <!--Navigation Bar-->

    <script type="text/javascript">
<!--
function getCookie(name){
var wcname = name + '=';
var wcstart, wcend, end;
var i = 0;
  while(i <= document.cookie.length) {
   wcstart = i;
 wcend   = (i + wcname.length);
 if(document.cookie.substring(wcstart, wcend) == wcname) {
  if((end = document.cookie.indexOf(';', wcend)) == -1)
   end = document.cookie.length;
  return document.cookie.substring(wcend, end);
   }
 i = document.cookie.indexOf('', i) + 1;

   if(i == 0)
  break;
  }
  return '';
}
if(getCookie('MainPopUp') != 'create') {
 window.open('popup.html','','width=800,  height=460,top=0,left=0');
}
//-->
</script>

</head>
  <body>
    <nav>
      <ol>
        <?php
        session_start();
        $admin='london@lovelyhouse.com';
      if(!isset($_SESSION['ses_username'])) {
        echo file_get_contents('0.nav.php');
      } else {
          if($_SESSION['ses_useremail'] == $admin) {
            include '0.admin_nav.php';
        } else {
            include '0.login_nav.php';
        }
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
        <p>&copy; 런던 대표 한인민박 "러블리 하우스" &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div>
  </body>
</html>
