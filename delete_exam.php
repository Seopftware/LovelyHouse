<?php
	require_once("dbconfig.php");

	//$_GET['bno']이 있어야만 글삭제가 가능함.
	if(isset($_GET['bno'])) {
		$bno = $_GET['bno'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>자유게시판 | Kurien's Library</title>
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
			    	<h1>러블리 하우스 후기 삭제하기</h1>
			  	</div>		<?php
			if(isset($bno)) {
				$sql = 'select count(b_no) as cnt from board_free where b_no = ' . $bno;
				$result = $db->query($sql);
				$row = $result->fetch_assoc();
				if(empty($row['cnt'])) {
		?>
		<script>
			alert('글이 존재하지 않습니다.');
			history.back();
		</script>
		<?php
			exit;
				}

				$sql = 'select b_title from board_free where b_no = ' . $bno;
				$result = $db->query($sql);
				$row = $result->fetch_assoc();
		?>
		<div id="boardDelete">
			<form action="delete_update.php" method="post">
				<input type="hidden" name="bno" value="<?php echo $bno?>">
				<table>
					<caption class="readHide">자유게시판 글삭제</caption>
					<thead>
						<tr>
							<th scope="col" colspan="2">글삭제</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">글 제목</th>
							<td><?php echo $row['b_title']?></td>
						</tr>
						<tr>
							<th scope="row"><label for="bPassword">비밀번호</label></th>
							<td><input type="password" name="bPassword" id="bPassword"></td>
						</tr>
					</tbody>
				</table>

				<div class="btnSet">
					<button type="submit" class="btnSubmit btn">삭제</button>
					<a href="index.php" class="btnList btn">목록</a>
				</div>
			</form>
		</div>
	<?php
		//$bno이 없다면 삭제 실패
		} else {
	?>
		<script>
			alert('정상적인 경로를 이용해주세요.');
			history.back();
		</script>
	<?php
			exit;
		}
	?>
</div>
</body>
</html>
