<head>
	<link rel="stylesheet" href="tour.css">
		    <!-- Bootstrap Core CSS -->
		    <link href="css/bootstrap.min.css" rel="stylesheet">

		    <!-- Custom CSS -->
		    <link href="css/stylish-portfolio.css" rel="stylesheet">

		    <!-- Custom Fonts -->
		    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

<body>
	        <nav>
			      <ol>
        <?php
        session_start();
        if(!isset($_SESSION['ses_username'])) {
        echo file_get_contents('0.nav.php');
      } else {
        include '0.login_nav.php';
      }
        ?>
			      </ol>
			    </nav>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">투어 목록</p>
                <div class="list-group">
                    <a href="mainexam.php?id=4.tour" class="list-group-item">런던 야경 투어</a>
                    <a href="4.tour_2.php" class="list-group-item">런던 근교 투어</a>
                    <a href="4.tour_3.php" class="list-group-item active">축구장 투어</a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="thumbnail">
                    <img class="img-responsive" src="/image/londonsoccer.PNG" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right">100,000원</h4>
                        <h4><a href="https://en.wikipedia.org/wiki/London_Arena" target="_blank">축구장 투어</a>
                        </h4>
												<p>
													남자라면 한번쯤은 영국의 프리미어리그를 눈 앞에서 직접 보고 싶어합니다. 제가 책임지겠습니다. 티켓 구해드리겠습니다. 몸만 오시면 됩니다. 원하는 경기 말씀해주시면 됩니다.<br>
													주인장 아저씨는 한다면 합니다~~^^
												</p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">리뷰 1개</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                             별 3.0
                        </p>
                    </div>
                </div>

                <div class="well">

                    <div class="text-right">
                        <a class="btn btn-success">코멘트 남기기</a>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            오직아스날
                            <span class="pull-right">2017-05-25</span>
                            <p>투어 신청하고 아스날 경기장인 아레스 아레나에 다녀왔습니다. 티켓 가격도 무지 싸게 구해다 주셔서 가성비 좋게 잘 다녀온거 같아요. 감사합니다.</p>
                        </div>
                    </div>

                    <hr>



                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">
    </div>
    <!-- /.container -->
		    <div class="container marketing">

		      <footer>
		        <p class="pull-right"><a href="#">Back to top</a></p>
		        <p>&copy; 런던 대표 한인민박 "러블리 하우스" &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
		      </footer>

		    </div>
</body>
