<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
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
	    	<h1>러블리 하우스 후기 작성하기</h1>
	  	</div>
			<form action="./write_update.php" method="post">
				<?php
				if(isset($bno)) {
					echo '<input type="hidden" name="bno" value="' . $bno . '">';
				}
				?>
        <div class="well well-sm">
					<div class="row">
            <div class="col-xs-2">
						<label for="session-editor-title">아이디</label>
            							<td class="id">
            								<?php
            								if(isset($bno)) {
            									echo $row['b_id'];
            								} else { ?>
            								<input type="text" name="bID" id="bID">
            								<?php } ?>
            							</td>
        		<small class="text-muted">게시글 작성자명으로 사용</small>
           </div>
           <div class="col-xs-2">
					<label for="session-editor-title">비밀번호</label>
							<td class="password"><input type="password" name="bPassword" id="bPassword"></td>
          		<small class="text-muted">게시글 수정 및 삭제시 이용</small>
          </div>
        </div>
					<div class="row">
                    <div class="col-xs-12">
						<label for="session-editor-title"><br>제목</label>
						<textarea class="form-control" name="bTitle" id="bTitle" rows="1" maxlength="30"> <?php echo isset($row['b_title'])?$row['b_title']:null?></textarea>
	          </div>
          </div>
					<fieldset class="form-group">
					<div class="row">
                    <div class="col-xs-12">
                        <br>
						<label for="session-editor-comments">내용</label>
						<textarea class="form-control" name="bContent" id="bContent" rows="10" maxlength="300"><?php echo isset($row['b_content'])?$row['b_content']:null?></textarea>
						<small class="text-muted">러블리 하우스에서의 즐거웠던 추억을 떠올리며 작성해 주세요~!^^ </small>
					</div>
                    </div>
					<!--</fieldset> -->
					<div class="row">
                    <div class="col-xs-12">
						<button type="" class="btn btn-primary pull-right" name="pick-date-button" value="pick-date-button" id="pick-date-button">Pick New Date Range</button>
						<button type="button" class="btn btn-primary pull-right" name="use-session-dates-button" value="use-session-dates-button" id="use-session-dates-button">Use Dates From Original Session</button>
					</div>
                    </div>
					<div class="row">
                    <div class="col-xs-12">
					<button type="submit" class="btn btn-primary">
						<?php echo isset($bno)?'수정하기':'작성하기'?>
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
