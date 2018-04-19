<?php
	require_once("dbconfig.php");
	$bno = $_GET['bno'];

	if(!empty($bno) && empty($_COOKIE['board_free_' . $bno])) {
		$sql = 'update board_free set b_hit = b_hit + 1 where b_no = ' . $bno;
		$result = $db->query($sql);
		if(empty($result)) {
			?>
			<script>
				alert('오류가 발생했습니다.');
				history.back();
			</script>
			<?php
		} else {
			setcookie('board_free_' . $bno, TRUE, time() + (60 * 60 * 24), '/');
		}
	}

	$sql = 'select b_title, b_content, b_date, b_hit, b_id from board_free where b_no = ' . $bno;
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
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
				        echo file_get_contents('0.nav.php');
				        ?>
				      </ol>
				    </nav>
<br><br>

	<div class="container">
		    	<div class="text-center well well-sm page-header">
			    	<h1>러블리 하우스 후기</h1>
			  	</div>
	<article class="boardArticle" >
		<div id="boardView">
			<h3 id="boardTitle"style="text-align:center"><?php echo $row['b_title']?></h3>
			<div id="boardInfo" style="text-align:center">
				<span id="boardID" >작성자: <?php echo $row['b_id']?></span>
				<span id="boardDate">작성일: <?php echo $row['b_date']?></span>
				<span id="boardHit">조회: <?php echo $row['b_hit']?></span>
			</div>
			<div id="boardContent" style="text-align:center"><?php echo $row['b_content']?></div>
			<div class="btnSet" style="text-align:center">
				<a href="write.php?bno=<?php echo $bno?>">수정</a>
				<a href="delete.php?bno=<?php echo $bno?>">삭제</a>
				<a href="index.php" style="text-align:center">목록</a>
			</div>
		<div id="boardComment">
			<?php require_once('comment.php')?>
		</div>
	</article>
	</div>
</body>
</html>
