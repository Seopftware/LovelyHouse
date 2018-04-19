<?php
  $is_logged=$_SESSION['ses_username'];
?>
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="/mainexam.php?id=1.home"><b>러블리 하우스</b></a></li>
                <li><a href="/mainexam.php?id=2.room">객실 안내</a></li>
                <li><a href="/mainexam.php?id=3.reserve">예약 안내</a></li>
                <li><a href="/mainexam.php?id=4.tour">관광 상품 안내</a></li>
                <li><a href="index.php">후기 게시판</a></li>
              </ul>
              <form class="navbar-form navbar-right">
                <a><?php echo $is_logged; ?>님 </a>

                <a href="/login/logout.php" class="btn btn-danger">Logout</a>
              </form>
            </div><!--/.navbar-collapse -->

          <script type="text/javascript">
            function popupOpen(){
          	var popUrl = "/login/login.php";	//팝업창에 출력될 페이지 URL
          	var popOption = "width=1000, height=550, resizable=no, scrollbars=no, status=no;";    //팝업창 옵션(optoin)
          	window.open(popUrl,"",popOption);
          	}
          </script>
