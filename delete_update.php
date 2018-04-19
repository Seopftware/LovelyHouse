<?php
  require_once("dbconfig.php");

  //$_POST['bno']가 있을 때만 $bno 선언
  if(isset($_POST['bno'])) {
    $bno=$_POST['bno'];
  }

  //글 삭제
  if(isset($bno)) {
    //삭제 할 글의 비밀번호가 입력된 비밀번호와 맞는지 체크
    $sql = 'select * from board_free where b_no='.$bno;
    $result=$db->query($sql);
    $row=$result->fetch_assoc();
  }

  if($row['b_file']) {
    $del_file='./data/'.$row['b_file'];
    if($row['b_file'] && is_file($del_file)) {
      unlink($del_file);
    }
  }

  $sql='delete from board_free where b_no='.$bno;
  $result=$db->query($sql);
  // 쿼리가 정상 실행 됬다면,
  if($result) {
    $msg='정상적으로 글이 삭제되었습니다.';
    $replaceURL='./index.php';
  } else {
    $msg='글을 삭제하지 못했습니다';
    ?>
    <script>
      alert("<?php echo $msg?>");
      history.back();
    </script>
    <?php
      exit;
  }
?>
<script>
  alert("<?php echo $msg?>");
  location.replace("<?php echo $replaceURL ?>");
</script>
