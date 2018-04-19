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
        <div class="well well-sm">
					<div class="row">
            <div class="col-xs-2">
						<label for="session-editor-title">작성자</label>
						<h4 id="boardTitle"><?php echo $row['b_title']?></h4>
           </div>
           <div class="col-xs-3">
					<label for="session-editor-title">작성일</label>
					<h4 id="boardDate"><?php echo $row['b_date']?></span></h4>
          </div>
           <div class="col-xs-2">
					<label for="session-editor-title">조회수</label>
					<h4><span id="boardHit" style="text-align:center"><?php echo $row['b_hit']?>회</span></h4>
          </div>
        </div>
					<div class="row">
                    <div class="col-xs-12">
						<label for="session-editor-title"><br>제목</label>
						<h2 id="boardTitle"><?php echo $row['b_title']?></h2>
	          </div>
          </div>
					<fieldset class="form-group">
					<div class="row">
                    <div class="col-xs-12">
                        <br>
						<label for="session-editor-comments">내용</label>
						<h2 id="boardContent"><?php echo $row['b_content']?></h2>
					<small class="text-muted"><br><br>글이 재미있으셨나요? 그렇다면 댓글로 고마운 마음을 표현해주세요! </small>
					</div>
                    </div>
					<div class="row">
                    <div class="col-xs-12">
			<div class="btnSet" style="text-align:right">
				<a href="write.php?bno=<?php echo $bno?>" class="btn btn-primary">수정</a>
				<a href="delete.php?bno=<?php echo $bno?>" class="btn btn-danger">삭제</a>
				<a href="index.php" style="text-align:center" class="btn btn-info">목록</a>
			</div>
					</div>
          </div>
							<div id="boardComment">
								<?php require_once('comment.php')?>
							</div>
							</div>
							</div>
</body>
</html>
