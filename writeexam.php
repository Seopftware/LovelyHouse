<?php
	require_once("dbconfig.php");

	//$_GET['bno']이 있을 때만 $bno 선언
	if(isset($_GET['bno'])) {
		$bno = $_GET['bno'];
	}

	if(isset($bno)) {
		$sql = 'select b_title, b_content, b_id from board_free where b_no = ' . $bno;
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>자유게시판 | 러블리 하우스</title>
	<!-- <link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/board.css" /> -->

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

	<article class="boardArticle">
		<h3>러블리 하우스 후기 작성</h3>
		<div id="boardWrite">
			<form action="./write_update.php" method="post">
				<?php
				if(isset($bno)) {
					echo '<input type="hidden" name="bno" value="' . $bno . '">';
				}
				?>
				<table id="boardWrite">
					<caption class="readHide">러블리 하우스 후기 작성</caption>
					<tbody>
						<tr>
							<th scope="row"><label for="bID">아이디</label></th>
							<td class="id">
								<?php
								if(isset($bno)) {
									echo $row['b_id'];
								} else { ?>
								<input type="text" name="bID" id="bID">
								<?php } ?>
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="bPassword">비밀번호</label></th>
							<td class="password"><input type="password" name="bPassword" id="bPassword"></td>
						</tr>
						<tr>
							<th scope="row"><label for="bTitle">제목</label></th>
							<td class="title"><input type="text" name="bTitle" id="bTitle" value="<?php echo isset($row['b_title'])?$row['b_title']:null?>"></td>
						</tr>
						<tr>
							<th scope="row"><label for="bContent">내용</label></th>
							<td class="content"><textarea name="bContent" id="bContent"><?php echo isset($row['b_content'])?$row['b_content']:null?></textarea></td>
						</tr>
					</tbody>
				</table>
				<div class="btnSet">
					<button type="submit" class="btn btn-primary">
						<?php echo isset($bno)?'수정':'작성'?>
					</button>
					<a href="index.php" class="btn btn-default">목록</a>
				</div>
			</form>
		</div>
	</article>
</body>
</html>
