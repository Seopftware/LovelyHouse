<? session_start(); ?> // 세션 사용하기
<?php
  //미리 정의된 ID와 암호
  $membed_id="user";
  $member_password="password";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>러블리 하우스 로그인</title>
  </head>

  <body>
      //POST 방식으로 전달된 데이터를 읽어올 때는 $_POST["변수명"]을 사용

      //아이디가 전달되었는지 검사하기
      <? if(!isset($_POST["member_id"])) { ?>
        <p style="text-align: center;">아이디가 입력되지 않았습니다.</p>
        <p style="text-align: center;"><a href="login.php">로그인하기</a></p>

      //비밀번호가 전달되었는지 검사
      <? } else if(!isset($_POST["member_password"])) { ?>
        <p style="text-align: center;">비밀번호가 입력되지 않았습니다.</p>
        <p style="text-align: center;"><a href="login.php">로그인하기</a></p>

      //아이디와 비밀번호가 전달되었다면
      <? } else { ?>
        //아이디를 잘못입력했을 시
        <? if(strcmp())
      }
  </body>
