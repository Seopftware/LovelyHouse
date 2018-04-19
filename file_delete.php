<?php
  include("dbconfig.php");

	if(isset($_GET['bno'])) {
		$bNo = $_GET['bno'];
	}

	if(isset($bNo)) {
		$sql = 'select b_file from board_free where b_no = ' . $bNo;
		$result = $db->query($sql);
		$row = $result->fetch_assoc();

  if($row['b_file']) {
    $qy="update board_free set
      b_file=''
      where b_no='$bNo' ";
    $result=$db->query($qy);
    $del_file="./data/".$row['b_file'];

    if($row['b_file'] && is_file($del_file)) unlink($del_file);
  }
}
?>

<script language="javascript">
alert('파일이 삭제 되었습니다.');
opener.location.reload();
window.close();
</script>
