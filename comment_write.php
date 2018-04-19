<?php
  session_start();
  include('dbconfig.php');
  $nickname=$_SESSION['ses_nickname'];

  $bbs1_no=$_POST['bbs1_no']; //게시글 번호

  $replys=$_POST['replys']; // 코멘트 답글 번호

  $memo=$_POST['memo']; // 코멘트 내용


  if(!$_SESSION['ses_nickname']) {
		echo "<script>alert(\"로그인 후 이용해 주세요.\");</script>";
		echo "<script>history.back();</script>";
  }

  $regdate=date("YmdHis", time()); //날짜 시간

  $sql="INSERT INTO bbs1_comment(bbs1_no, nickname, memo, replys, regdate)
        VALUES('".$bbs1_no."', '".$nickname."', '".$memo."', '".$replys."', '".$regdate."')";
  $result=$db->query($sql);

  $sql1="UPDATE board_free set comment=comment+1 where b_no='$bbs1_no'";
  $result=$db->query($sql1);
?>

<script>
  window.alert("댓글이 등록 되었습니다.");
  location.href="view.php?bno=<?php echo $bbs1_no?>";
</script>
