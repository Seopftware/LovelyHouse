<?php
	require_once("dbconfig.php");
	$bNo = $_GET['bno'];

	if(!empty($bNo) && empty($_COOKIE['board_free_' . $bNo])) {
		$sql ='update board_free set b_hit = b_hit + 1 where b_no = '.$bNo;
		$result = $db->query($sql);
		if(empty($result)) {
			?>
			<script>
				alert('오류가 발생했습니다.');
				history.back();
			</script>
			<?php
		} else {
			setcookie('board_free_' . $bNo, TRUE, time() + (60 * 60 * 24), '/');
		}
	}

	$sql ='SELECT b_title, b_content, b_date, b_hit, b_id FROM board_free WHERE b_no = '.$bNo;
	$result = $db->query($sql);
	$row =$result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>자유게시판 | 러블리 하우스</title>

		    <!-- Bootstrap Core CSS -->
		    <link href="css/bootstrap.min.css" rel="stylesheet">

		    <!-- Custom CSS -->
		    <link href="css/stylish-portfolio.css" rel="stylesheet">

		    <!-- Custom Fonts -->
		    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
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
<br><br>

	<div class="container">
		    	<div class="text-center well well-sm page-header">
			    	<h1>러블리 하우스 후기</h1>
			  	</div>
        <div class="well well-sm">


							</div>
							</div>

							    <div class="container marketing">

							      <footer>
							        <p class="pull-right"><a href="#">Back to top</a></p>
							        <p>&copy; 런던 대표 한인민박 "러블리 하우스" &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
							      </footer>

							    </div>
</body>
</html>
