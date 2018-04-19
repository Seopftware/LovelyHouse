<?php
	session_start();
	require_once("dbconfig.php");
	$bNo = $_GET['bno'];
	$re_wt=$_GET['re_wt']; // 코멘트 답글 입력란이 Y면 답글 입력란 생성
	$lo_reply_1=$_GET['lo_reply_1']; //페이지 로케이션
	$d_no=$_GET['d_no']; //코멘트 순번.

	if(!empty($bNo) && empty($_COOKIE['board_free_' . $bNo])) {
		$sql ='update board_free set b_hit = b_hit + 1 where b_no = '.$bNo;
		$result = $db->query($sql);
		if(empty($result)) {
			?>
			<script>
				alert('오류가 발생했습니다.');
				history.back();
			</script>
			<?php
		} else {
			setcookie('board_free_' . $bNo, TRUE, time() + (60 * 60 * 24), '/');
		}
	}

	$sql ='SELECT b_title, b_content, b_date, b_hit, b_id, b_file FROM board_free WHERE b_no = '.$bNo;
	$result = $db->query($sql);
	$row =$result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>자유게시판 | 러블리 하우스</title>

		    <!-- Bootstrap Core CSS -->
		    <link href="css/bootstrap.min.css" rel="stylesheet">

		    <!-- Custom CSS -->
		    <link href="css/stylish-portfolio.css" rel="stylesheet">

		    <!-- Custom Fonts -->
		    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
</head>
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
<br>

	<div class="container">
		    	<div class="text-center well well-sm page-header">
			    	<h1>러블리 하우스 후기</h1>
			  	</div>
        <div class="well well-sm">
					<div class="row">
            <div class="col-xs-2">
						<label for="session-editor-title">게시글 번호</label>
            <h4 id="boardTitle"><?php echo $bNo?></h4>
           </div>
            <div class="col-xs-2">
						<label for="session-editor-title">작성자</label>
            <h4 id="boardTitle"><?php echo $row['b_id']?></h4>
           </div>
           <div class="col-xs-3">
					<label for="session-editor-title">작성일</label>
					<h4 id="boardDate"><?php echo $row['b_date']?></span></h4>
          </div>
           <div class="col-xs-2">
					<label for="session-editor-title">조회수</label>
					<h4><span id="boardHit" style="text-align:center"><?php echo $row['b_hit']?>회</span></h4>
          </div>
        </div>
					<div class="row">
                    <div class="col-xs-12">
						<label for="session-editor-title"><br>제목</label>
						<h2 id="boardTitle"><?php echo $row['b_title']?></h2>
	          </div>
          </div>
					<fieldset class="form-group">
					<div class="row">
                    <div class="col-xs-12">
                        <br>
						<label for="session-editor-comments">내용</label>
						<h2 id="boardContent"><?php echo $row['b_content']?></h2>
						<?php if(!$row['b_file']==null) { ?>
						<div align='center'><img src='./data/<?=$row['b_file']?>' width='100' height='100'></div>
						<?php } ?>

					<small class="text-muted"><br><br>글이 재미있으셨나요? 그렇다면 댓글로 고마운 마음을 표현해주세요! </small>
					</div>
                    </div>
					<div class="row">
                    <div class="col-xs-12">
			<div class="btnSet" style="text-align:right">
				<?php
      if(!isset($_SESSION['ses_username'])) {
				?>
				<a href="index.php" style="text-align:center" class="btn btn-info">목록</a>
      <?php } else {
          if($_SESSION['ses_useremail'] == $admin) { ?>
				<a href="delete.php?bno=<?php echo $bNo?>" class="btn btn-danger">삭제</a>
				<a href="index.php" style="text-align:center" class="btn btn-info">목록</a>

      <?php  } else { ?>
				<form name="delete">
				<input type="hidden" name="bno" value="<?php echo $bNo?>">
				<div class="btnSet">
					<button type="submit" class="btn btn-danger" onclick="move(); return false;">삭제</button>
					<a href="index.php" class="btn btn-info">목록</a>
					<a href="write.php?bno=<?php echo $bNo?>" class="btn btn-primary">수정</a>
				</div>
			</form>

    <?php   }
      }
				?>
			</div>
					</div>
          </div>
<!---/////////////////////////////[코 멘 트]//////////////////////////////////--->
<table border='0'   width='100%' cellspacing='0' cellpadding='0'>
<tr>
<td width='854' align='center'><hr></td>

<!-------코맨트 출력---------->
<table border='0'  width='800' cellspacing='0' cellpadding='0' id='lo_reply_1'>

<?php
var_dump($bNo);
$sql = 'SELECT * FROM bbs1_comment where bbs1_no=' . $bNo;
$result =$db->query($sql);
$row=$result->fetch_array();
$total_count=$row[0]; //코멘트 총 갯수
?>
<tr>
<td colspan='4' align='right'>
<font color='9C9A9A'>총 댓글 수: <?php echo "$total_count"; ?></font>&nbsp; &nbsp;
</td>

<?php
$sql="SELECT * FROM bbs1_comment where bbs1_no='$bNo' and replys='0' order by regdate asc, no asc"; // 날짜와 시간 오름차순 정렬, no(댓글 번호)
$result=$db->query($sql);
while($d=$result->fetch_array()) {
  var_dump($result->fetch_array());
?>

<tr>
<td width='674'  valign='middle' bgcolor='#E3E0E0'>
<span style='font-size:9pt; font-family:Tahoma; color:#727371'>
<?php
	echo $_SESSION['ses_nickname'];
?>

<?php
	echo $d_Y= substr($d['regdate'],0,4)."-";
	echo $d_m= substr($d['regdate'],4,2)."-";
	echo $d_d= substr($d['regdate'],6,2)."&nbsp;";
	echo $d_h= substr($d['regdate'],8,2).":";
	echo $d_i= substr($d['regdate'],10,2);
	?>
  </span>
  </td>

<td width='120' align='right' valign='middle' bgcolor='#E3E0E0'>
<?php if($_SESSION['ses_nickname']) { ?>
<a href='view.php?id=<?php echo $id; ?>&re_wt=Y&no=<?php echo $bNo;?>&d_no=<?php echo $d['no'];?>&#lo_reply_2' onfocus="this.blur()">
 <span style='font-size:9pt; font-family:Tahoma; color:#727371'>[답글달기]</span></a> &nbsp;
 <?php }?>
  </td>
<tr>
<td colspan='4' valign='top'bgcolor='#E3E0E0'>
		<?php echo "<font color='#073C62'>".nl2br($d['memo'])."</font>";?>
		<div align='right'>
		<a href='./comment_del.php?d_no=<?=$d['no']?>&no_s=<?=$row['no']?>&bbs1_no=<?=$d['bbs1_no']?>&replys_all=all' onfocus='this.blur()'>
		<font color='#FF0000' onclick="return confirm('정말로 삭제 하시겠습니까?')">[DEL]</font></a>
		&nbsp; &nbsp; &nbsp;
		</div>
		</td>

<?php }
////////////// 코맨트 (답글-출력)/////////////
$q_2="SELECT * FROM bbs1_comment where bbs1_no='".$bNo."' and replys='".$d['no']."' order by regdate asc";
$r_2=$db->query($q_2);

while($d_2=$r_2->fetch_array()){
?>
<tr>
<td  width='100%' height='5' valign='top' colspan='4'  >
<table border='0' width='100%' height='5' valign='middle'>
<tr>
<td width='10'>&nbsp;</td>
<td width='10' align='center'>
<span style='font-size:11pt; color:#8A8A88'>└</span>
</td>


<td width='75%' align='left'>
<span style='font-size:9pt; color:#8A8A88'>
<?php
  echo $_SESSION['ses_nickname'];
?>
&nbsp; &nbsp; &nbsp; &nbsp;
<?php
echo $d_2_Y= substr($d_2['regdate'],0,4)."-";
echo $d_2_m= substr($d_2['regdate'],4,2)."-";
echo $d_2_d= substr($d_2['regdate'],6,2)."&nbsp;";
echo $d_2_h= substr($d_2['regdate'],8,2).":";
echo $d_2_i= substr($d_2['regdate'],10,2);
?>
 <br>
<?php echo $d_2['memo'];?></span>
&nbsp; &nbsp;
		<div align='right'>
        <a href="comment_del.php?d_no=<?=$d_2['no']?>&no_s=<?=$row['no']?>&bbs1_no=<?=$d_2['bbs1_no']?>&replys=<?=$d_2['replys']?>&reply_rr=rr" onfocus="this.blur()" >
		<span style='font-size:8pt; color:#5A5B5A' onclick="return confirm('정말로 삭제 하시겠습니까?')">[del]</span></a>
		&nbsp; &nbsp; &nbsp;
		</div>

</td>

</tr>
</table>
</td>
<?php	}
//////////////  코맨트 (답글-출력) [끝]///////////// ?>



<?php /// 코맨트 (답글-입력) ///
 if($re_wt=='Y' and $d_no==$d['no']){
?>
<form name='replys'  action='comment_write.php' method='post'>
<input type=hidden name='id' value='<?php $data['id']?>'>
<input type=hidden name='bbs1_no' value='<?=$data['no']?>' >
<input type=hidden name='replys' value='<?=$d['no']?>'>



<tr>
<td id='lo_reply_2' colspan='2' align='right'>
<span style='font-size:11pt; color:#8A8A88'>└</span>
</td>

<td  align='center' valign='middle'>
<textarea name='memo' style="width:90%; height:30px;"></textarea>
</td>

<td align='center' valign='middle'>
<input type=submit value='submit' style="width:80px; height:20px;" />
</td>
</form>
<?php
	}
 /// 코맨트 (답글-입력) [끝] ///?>


<tr>
<td  width='100%' height='5' valign='top' colspan='4'>&nbsp;</td>

</tr>
 </table>

<?php /////////// 코맨트 (입력) ////////////
  if($_SESSION['ses_nickname']){  //회원아이디가 있으면 실행
?>
  <table border='0' width='800' cellspacing='0' cellpadding='0'>
  <tr>
<td width='100%' height='30' colspan='5' align='center' valign='middle' bgcolor='#FFFFFF'>
<hr size='0.1' width='95%' color='#B2B2B2' />
</td>

	 <tr>
<form name='replys'  action='comment_write.php' method='post'>
<input type=hidden name='bbs1_no' value='<?php echo $row['no']?>' title='게시판글 번호'>
<input type=hidden name='replys' value='0'>

<td width=120 align='center' valign='middle' bgcolor='#E7CADE'>
<?php
  echo $_SESSION['ses_nickname'];
?>
</td>

<td width='20' align='left' bgcolor='#FFD2F1'>&nbsp;</td>


<td width='100' align='right' bgcolor='#FFD2F1'>Comment &nbsp;</td>

	   <td align='left' bgcolor='#FFD2F1'>
	   <textarea name='memo' cols=80 rows=3 style='width=100%'></textarea>
	   </td>


	   <td width=30> <input type=submit value='O K'></td>
	   </tr>
	   	 </form>
    </table>
	<?php } //회원아이디가 있으면 여기까지?>

 <!---//////////코맨트 (입력) [끝] //////////--->

</td>
</tr>
</table>
<!---/////////////////////////////[코 멘 트 ((끝))]//////////////////////////////////--->

</TD>
</TR>
</TABLE>

</body>

							</div>
							</div>
							</div>

							    <div class="container marketing">

							      <footer>
							        <p class="pull-right"><a href="#">Back to top</a></p>
							        <p>&copy; 런던 대표 한인민박 "러블리 하우스" &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
							      </footer>

							    </div>
</body>
	<script language="javascript">
	var theForm=document.delete;
	function move() {
		if(confirm("게시글을 정말로 삭제하시겠습니까?")) {
			theForm.method= "post";
			theForm.target = "_self";
			theForm.action = "delete_update.php";
			theForm.submit();
		} else{
			return false;
		}
	}
	</script>

</html>
