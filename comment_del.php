<?php
  $no_s=$_GET['no_s'];// 게시글 번호
  $bbs1_no=$_GET['bbs1_no']; // 게시글 번호(2)

  $d_no=$_GET['d_no']; // 코멘트 순번
  $replys=$_GET['replys']; // 코멘트 답글번호

  	if(isset($_GET['replys_all'])) {
      $replys_all=$_GET['replys_all']; // 코멘트 삭제
  	}

  	if(isset($_GET['replys_rr'])) {
      $replys_rr=$_GET['replys_rr']; // 코멘트 답글 삭제
  	}

	require_once("dbconfig.php");
  $sql="SELECT * FROM bbs1_comment WHERE no='$d_no'";
  $result=$db->query($sql);
  $data=$result->fetch_array();

  $q_count="SELECT count(*) from bbs1_comment where bbs1_no='$bbs1_no' and replys='$d_no'";
  $r_count=$db->query($q_count);
  $count=$r_count->fetch_array();
  $total_comment=$count[0]+1;

  if($replys_all='all') { // 코멘트와 코멘트 답글 삭제하기
      $query_1="DELETE FROM bbs1_comment WHERE bbs1_no='$no_s' AND no='$d_no'";
      $result_1=$db->query($query_1);

      $query_2="DELETE FROM bbs1_comment WHERE bbs1_no='$no_s' AND replys='$d_no' ";
      $result_2=$db->query($query_2);

      $query_3="UPDATE board_free SET comment=comment-$total_comment WHERE no='$bbs1_no'";
      $result_3=$db->query($query_3);
      
  } else if ($replys_rr=='rr') { // 답글만 삭제하는 경우
    $query_1="DELETE FROM bbs1_comment where no='$d_no' and bbs1_no='$bbs1_no' and replys='$replys'";
    $result_1=$db->query($query_1);

    $query_2="UPDATE board_free SET comment=comment-1 where no='$bbs1_no' ";
    $result_2=$db->query($query_2);
  }
?>

<script>
window.alert("댓글이 삭제 되었습니다.");
location.href='view.php?bno=<?=$bbs1_no?>&lo_reply_1=#lo_reply_1';
</script>
