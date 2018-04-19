<?php
  session_start();
	require_once("dbconfig.php");

  if(!isset($_SERVER['HTTP_REFERER'])) {
    exit('주소 접근이 금지되어 있습니다.');
  }

  if(!isset($_SESSION['ses_username'])){
    echo "<script>alert(\"게시글을 작성하시려면 로그인이 필요합니다.\")</script>";
    echo "<script>history.back();</script>";

  }

	//$_GET['bno']이 있을 때만 $bno 선언
	if(isset($_GET['bno'])) {
		$bNo = $_GET['bno'];
	}

	if(isset($bNo)) {
		$sql = 'SELECT b_title, b_content, b_id, b_no, b_file from board_free where b_no = ' . $bNo;
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
	}
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="smarteditor/js/service/HuskyEZCreator.js" charset="utf-8"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>

</head>

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

<br>
  <div class="container">
    	<div class="text-center well well-sm page-header">
	    	<h1>러블리 하우스 후기 작성하기</h1>
	  	</div>
			<form action="write_update.php" method="post" enctype="multipart/form-data">
				<?php
				if(isset($bNo)) {
					echo '<input type="hidden" name="bno" value="' . $bNo . '">';
				}
				?>
        <div class="well well-sm">
					<div class="row">
            <div class="col-xs-2">
						<label for="session-editor-title">작성자</label>
            							<td class="id">
            								<?php
            								if(isset($bNo)) {
            									echo $row['b_id'];
            								} else { ?>
                                <input type="text" name="bID" id="bID" value="<?php echo $_SESSION['ses_nickname']?>"readonly/>
            								<?php } ?>
            							</td>
           </div>
        </div>
					<div class="row">
                    <div class="col-xs-12">
						<label for="session-editor-title"><br>제목</label>
						<textarea class="form-control" name="bTitle" id="bTitle" rows="1" maxlength="30" required
                oninvalid="this.setCustomValidity('제목을 입력해주세요.')" oninput="setCustomValidity('')"><?php echo isset($row['b_title'])?$row['b_title']:null?></textarea>
	          </div>
          </div>
					<fieldset class="form-group">
					<div class="row">
                    <div class="col-xs-12">
                        <br>
						<label for="session-editor-comments">내용</label>
						<textarea class="form-control" name="bContent" id="ir1" rows="25"><?php echo isset($row['b_content'])?$row['b_content']:null?></textarea>
                <script type="text/javascript">
                var oEditors = [];
                nhn.husky.EZCreator.createInIFrame({
                	oAppRef: oEditors,
                	elPlaceHolder: "ir1",
                	sSkinURI: "/smarteditor/SmartEditor2Skin.html",
                	fCreator: "createSEditor2"
                });

                function submitContents(elClickedObj) {
                	oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.
                	// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.

                	try {
                		elClickedObj.form.submit();
                	} catch(e) {}
                }

                </script>
    				<small class="text-muted">러블리 하우스에서의 즐거웠던 추억을 떠올리며 작성해 주세요~!^^ </small>
          </div>
          </div>

					<div class="row">
                    <div class="col-xs-12">
                      <br>
  					<label for="session-editor-comments">이미지 업로드</label>
            <?php if(isset($row['b_file'])) { ?>
            <ul>이전 파일 : <?php echo "<font color='3F6FF8'>".$row['b_file']."</font>";?>
              <br>
              <?php } ?>

            <input type="file" name="file01">

            <br><br>
					</div>
                    </div>
					<div class="row">
                    <div class="col-xs-12">
					<button type="submit" class="btn btn-primary" onclick="submitContents()">
						<?php echo isset($bNo)?'수정하기':'작성하기'?>
					</button>
          <a href="index.php" class="btn btn-default">목록보기</a>
					</div>
          </div>
        </form>
				<!--</form>-->
		</div>
</div>
</body>

</html>
