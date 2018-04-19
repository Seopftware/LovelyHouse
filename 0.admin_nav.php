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
                <li><a href="/mainexam.php?id=1.home"><b>메인</b></a></li>
                <!-- <li><a href="/mainexam.php?id=2.room">객실 관리</a></li>
                <li><a href="/mainexam.php?id=3.reserve">예약 관리</a></li>
                <li><a href="/mainexam.php?id=4.tour">관광 상품 관리</a></li> -->
                <li><a href="/mainexam.php?id=4.tour">회원 관리</a></li>
                <li><a href="/mainexam.php?id=4.tour">예약 관리</a></li>
                <li><a href="index.php">게시판 관리</a></li>
              </ul>
              <form class="navbar-form navbar-right">
                <a><?php echo $is_logged; ?>입니다.</a>

                <a href="/login/logout.php" class="btn btn-danger">Logout</a>
              </form>
            </div><!--/.navbar-collapse -->
