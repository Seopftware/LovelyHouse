<?php
	require_once("dbconfig.php");
	//$_POST['bno']이 있을 때만 $bno 선언
	if(isset($_POST['bno'])) {
		$bNo = $_POST['bno'];
	}

	//bno이 없다면(글 쓰기라면) 변수 선언
	if(empty($bNo)) {
		$bID = $_POST['bID'];
		$date = date('Y-m-d H:i:s');
	}

	//항상 변수 선언
	$bTitle = $_POST['bTitle'];
	$bContent = $_POST['bContent'];

	if($_FILES['file01']['name']) {
		$size=$_FILES['file01']['size'];
		$imagesize="2097152";
		if($size > (int)$imagesize) {
			echo "<script>alert(\"파일용량은 2MB 이하로 제한합니다.\")</script>";
			echo "<script>history.back();</script>";
		}

		$file01_name=strtolower($_FILES['file01']['name']); //파일명과 확장자를 소문자로 변경
		$file01_split=explode(".", $file01_name); // 12345.jpg .을 기준으로
		$extexplode=$file01_split[count($file01_split)-2.3]; //파일명만 가져오기
		$file01_type=$file01_split[count($file01_split)-1]; // 확장자만 가져오기

		$img_ext=array('jpg','jpeg','gif','png'); //이미지 확장자 종류를 배열에 입력
		if(array_search($file01_type, $img_ext) === false) {
			echo "<script>alert(\"사용가능한 이미지 확장자 종류가 아닙니다.\");</script>";
			echo "<script>history.back();</script>";
		}

		$tates=date("mdhis", time()); // 날짜 (월,일,시간,분,초)
		$newfile01=chr(rand(97,122)).chr(rand(97,122)).$tates.rand(1,9).rand(1,9).".".$file01_type; //소문자 알파벳 2개 숫자 랜덤 2개

		$dir="./data/"; //업로드할 디렉토리 지정
		move_uploaded_file($_FILES['file01']['tmp_name'], $dir.$newfile01); //파일 업로드 (앞에는 가상경로를 나타내고 뒤에는 실제경로)
		chmod($dir.$newfile01, 0777); //파일 권한 수정
	}


//글 수정
if(isset($bNo)) {
	//수정 할 글과 글 번호 맞는지 체크

	if(!empty($newfile01)){
		$sql = 'update board_free set b_title="' . $bTitle . '", b_content="' . $bContent . '", b_file="'.$newfile01.'" where b_no = ' . $bNo;
		$msgState = '수정';

	} else {
		$newfile01="";
		$sql = 'update board_free set b_title="' . $bTitle . '", b_content="' . $bContent . '", b_file="'.$newfile01.'" where b_no = ' . $bNo;
		var_dump($sql);
		$msgState = '수정';
	}

	} //글 등록
	 else if(empty($newfile01)){
	 	$newfile01="";
		$sql = 'INSERT INTO board_free(b_no, b_title, b_content, b_date, b_hit, b_id, b_file) VALUES (null, "' . $bTitle . '", "' . $bContent . '", "' . $date . '", 0, "' . $bID . '","'.$newfile01.'")';
		var_dump($sql);
		$msgState = '등록';
	} else if(!empty($newfile01)){
		$sql = 'INSERT INTO board_free(b_no, b_title, b_content, b_date, b_hit, b_id, b_file) VALUES (null, "' . $bTitle . '", "' . $bContent . '", "' . $date . '", 0, "' . $bID . '","'.$newfile01.'")';
		$msgState = '등록';
		var_dump($sql);
	 	if ($sql->connect_error) {
		    die('데이터베이스 연결에 문제가 있습니다.');
	  }
	}

//메시지가 없다면 (오류가 없다면)
if(empty($msg)) {
	$result = $db->query($sql);
	var_dump($result);

	//쿼리가 정상 실행 됐다면,
	if($result) {
		$msg = '정상적으로 글이 ' . $msgState . '되었습니다.';
		if(empty($bNo)) {
			$bNo = $db->insert_id;
		}
		$replaceURL = './view.php?bno=' . $bNo;
	} else {
		$msg = '글을 ' . $msgState . '하지 못했습니다.';
?>
		<script>
			alert("<?php echo $msg?>");
			history.back();
		</script>
<?php
		exit;
	}
}

?>
<script>
	alert("<?php echo $msg?>");
	location.replace("<?php echo $replaceURL?>");
</script>
