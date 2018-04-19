<?php
  session_start(); // 세션시작
  include "userconfig.php"; //db연결을 위해로드

  if(isset($_POST['email'])){

    $userEmail=$_POST['email'];
    $userPwd=$_POST['password'];

    $sql="SELECT * FROM userinfor WHERE email ='".$userEmail."' and password='".$userPwd."'";
    //mysqli 연결의 끈을 생성시키고, 쿼리를 실행
    //테이블로부터 id와 pwd가 일치하는 것을 $res에 저장
    $result=$connect->query($sql);
    $row=$result->fetch_array(MYSQLI_ASSOC);
    if($row!==null) {
      $_SESSION['ses_username']= $row['name'];
      $_SESSION['ses_useremail']= $row['email'];
      $_SESSION['ses_userphone']= $row['phone'];
      $_SESSION['ses_nickname']= $row['nickname'];

      $userName=$_SESSION['ses_username'];
      echo "<script>alert(\"$userName 님 로그인에 성공하셨습니다.\");</script>";
      ?>
      <script language="JavaScript" type="text/javascript">
        opener.location.reload();
        window.close();
        </script>
        <?php
    } else {
      echo "<script>alert(\"일치하는 아이디 또는 비밀번호가 없습니다. 다시 시도해주세요.\");</script>";
    }
    }


?>

<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">

<head>
    <!-- BootStrap RDX 적용 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <script src="login.js"></script>
    <link rel="stylesheet" href="login.css">

    <!-- ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ -->
</head>
  <body>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
			<div class="search-box">
				<div class="caption">
					<h3>러블리 하우스 로그인</h3>
					<p>로그인하시고 다양한 혜택을 누리시기 바랍니다~!</p>
				</div>
				<form action="" method="post" class="loginForm">
					<div class="input-group">
						<input type="text" name="email" class="form-control" placeholder="E-mail">
						<input type="password" name="password" class="form-control" placeholder="Password">
						<input type="submit" class="form-control" value="Log In">
					</div>
				</form>
			</div>
		</div>

		<div class="col-md-4">
			<div class="aro-pswd_info">
				<div id="pswd_info">
					<h4>최소 비밀번호 요구사항</h4>
					<ul>
						<li id="letter" class="invalid">적어도 <strong>한 문자 이상</strong></li>
						<li id="capital" class="invalid">적어도 <strong>한 대문자 이상</strong></li>
						<li id="number" class="invalid">적어도 <strong>한 숫자 이상</strong></li>
						<li id="length" class="invalid">적어도 <strong>여덟 글자 이상</strong></li>
						<li id="space" class="invalid">반드시<strong> 사용해야하는 문자 [~,!,@,#,$,%,^,&,*,-,=,.,;,']</strong></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
