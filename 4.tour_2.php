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
                    <a href="4.tour_2.php" class="list-group-item active">런던 근교 투어</a>
                    <a href="4.tour_3.php" class="list-group-item">축구장 투어</a>
								</div>
            </div>

            <div class="col-md-9">

                <div class="thumbnail">
                    <img class="img-responsive" src="/image/nearbylondon.PNG" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right">80,000원</h4>
                        <h4><a href="https://en.wikipedia.org/wiki/Oxford" target="_blank">런던 근교 투어</a>
                        </h4>
												<p>
													런던 외곽의 도시들로 투어를 갑니다. 옥스포드, 비스타 빌리지, 그리고 바쓰까지. 이 중 한곳만 선택 가능 하십니다. <br>옥스포드 선택시 세계의 명문대 옥스포드 대학교를 방문합니다.
													비스타 빌리지는 영국의 전원 생활을 잠시나마 느껴볼 수 있는 곳입니다. 바쓰는 영국 특유의 온천 문화를 즐길 수 있는 곳이기도 합니다. 색다른 유럽의 온천과 함께 피로를 푸시고 싶은 분에게 추천드립니다.
												</p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">리뷰 2개</p>
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
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            런던에 살고싶은 소녀
                            <span class="pull-right">2017-05-25</span>
                            <p>런던에 이번 방문에 4번째 인데, 런던에도 이런 모습이 있는 줄 처음알았습니다. 주인장님의 멋드러지는 해설은 덤~</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            옥스포드가자!
                            <span class="pull-right">2017-05-23</span>
                            <p>옥스포드 대학교에 가고 싶어서 투어 신청 후 옥스포드에 다녀왔습니다. 세계 최고의 명문대 다운 자태를 보여주더군요. 꼭 가고 싶네요.</p>
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
