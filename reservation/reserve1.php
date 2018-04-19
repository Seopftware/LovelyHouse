<head>
    <!-- BootStrap RDX 적용 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="reservation.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="reservation.js"></script>


    <!-- DatePicker -->
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
    <title>예약화면 | 러블리 하우스</title>

    <!-- <script type="text/javascript">
      $(document).ready(function(){
        $(."error").hide();

        $("#checkVal").click(function(event){
          var userName=$("#userName").val();
          var userEmail=$("#userEmail").val();
          var userPhone=$("#userPhone").val();

          if(chkValid(userName)) {
            $("#errMsg_01").hide();
          } else {
            $("#errMsg_01").show();
            $("#errMsg_01").text("이름은 한글자 이상 입력해주세요.");
            event.preventDefault();
          }

          if(chkValEmail(userEmail)) {
            $("#errMsg_02").hide();
          } else {
            $("#errMsg_02").show();
            $("#errMsg_02").text("이메일 형식에 맞춰주세요. ex)abc@abc.com");
          }

          if(chkValPhone(userPhone)) {
            $("#errMsg_03").hide();
          } else {
            $("#errMsg_03").show();
            $("#errMsg_03").text("숫자만 입력해주세요~^^");
          }
        });
      });

      var chkValId=function(id) -->
</head>
<body>

<div class="container">
  		    	<div class="text-center well well-sm page-header">
  			    	<h2>러블리 하우스 예약 화면입니다.</h2>

              <br>
              <p>예약에 필요한 고객님의 정보를 입력받고 있습니다. 입력해주신 정보는 철저하게 비밀이 보장되며, 예약 완료 후 입력해 주신 정보는 파기 될 예정입니다.</p>
  			  	</div>
    <div class="row">
    	<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab" style="padding-top:20px;">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab" style="padding-top:20px;">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab" style="padding-top:20px;">
                                <i class="glyphicon glyphicon-euro"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab" style="padding-top:20px;">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <form role="form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <div class="step33">
                        <h5><strong>예약자 기본 정보</strong></h5>
                        <hr>
                            <div class="row mar_ned">

                            </div>
                            <div class="row" style="padding-left:350px;">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">예약자 성함</label>
                                <input type="text" class="form-control" id="userName" name="userName" placeholder="예약하시는 분의 성함을 입력해주세요.">
                            </div>
                        </div>
                        <br>
                        <div class="row" style="padding-left:350px;">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">이메일 주소</label>
                                <input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="입력해주신 이메일로 예약 상세 내용이 발송됩니다.">
                            </div>
                        </div>
                        <br>
                        <div class="row" style="padding-left:350px;">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">휴대폰 번호</label>
                                <input type="phone" class="form-control" id="userNumber" name="userNumber" placeholder="에약하시는 분의 휴대폰 번호를 입력해주세요."> <br>
                            </div>
                        </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" onclick="check_onclick()" class="btn btn-primary next-step">저장 및 다음</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <div class="step33">
                        <h5><strong>방 예약 상세 정보</strong></h5>
                        <hr>
                             <div class="row mar_ned">
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"><stong>방 선택</stong></p>
                                </div>
                                <div class="col-md-8 col-xs-9">
                                    <label class="radio-inline">
                                      <input type="radio" name="roomRadioOptions" id="roomRadio1" value="option1" checked/> 가족룸(4인실)
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="roomRadioOptions" id="roomRadio2" value="option2"> 커플룸(2인실)
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="roomRadioOptions" id="roomRadio3" value="option3"> 개인룸(1인실)
                                    </label> <br><br>
                                    <label class="radio-inline">
                                      <input type="radio" name="roomRadioOptions" id="roomRadio4" value="option4"> 여성 도미토리룸(6인실)
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="roomRadioOptions" id="roomRadio5" value="option5"> 남성 도미토리룸(6인실)
                                    </label>
                                </div>
                            </div>
                            <div class="row mar_ned">
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"><stong>체크인/체크아웃 날짜</stong></p>
                                </div>
                                <div class="col-md-8 col-xs-9">
                                          <div id="datetimepicker6" class="input-append">
                                            <input type="text" data-format="yyyy-MM-dd"></input>
                                            <span class="add-on">
                                              <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                            </span>
                                          </div>
                                          <div id="datetimepicker7" class="input-append">
                                            <input type="text" data-format="yyyy-MM-dd"></input>
                                            <span class="add-on">
                                              <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                            </span>
                                          </div>
                                          <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
                                          <script type="text/javascript" src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
                                          <script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js"></script>
                                          <script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js"></script>
                                        <script type="text/javascript">
                                        $(function() {
                                          $('#datetimepicker6').datetimepicker({
                                            pickTime: false,
                                          });
                                          $('#datetimepicker7').datetimepicker({
                                            useCurrent: false, //Important! See issue #1075
                                            pickTime: false

                                          });
                                          $("#datetimepicker6").on("dp.change", function (e) {
                                              $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
                                          });
                                          $("#datetimepicker7").on("dp.change", function (e) {
                                              $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
                                          });

                                        });
                                      </script>
                                </div>
                            </div>
                              <div class="row mar_ned">
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"><stong>예약 인원 수</stong></p>
                                </div>
                                <div class="col-md-8 col-xs-9">
                                    <div class="row">
                                        <div class="col-md-4 col-xs-4 wdth">
                                            <select name="visa_status" id="visa_status" class="dropselectsec1">
                                                <option value="">어른(명)</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4명 이상(문의필수)</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-xs-4 wdth">
                                            <select name="visa_status" id="visa_status" class="dropselectsec1">
                                                <option value="">어린이(명)</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4명 이상(문의필수)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="row mar_ned">
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"><stong>반려견 여부</stong></p>
                                </div>
                                <div class="col-md-8 col-xs-9">
                                    <label class="radio-inline">
                                      <input type="radio" name="animalRadioOptions" id="animalRadio1" value="option1" checked/> 있음
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="animalRadioOptions" id="animalRadio2" value="option2"> 없음
                                    </label>
                                </div>
                            </div>
                             <div class="row mar_ned">
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"><stong>픽업 여부</stong></p>
                                </div>
                                <div class="col-md-8 col-xs-9">
                                    <label class="radio-inline">
                                      <input type="radio" name="pickupRadioOptions" id="pickupRadio1" value="option1" checked/> 희망함
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="pickupRadioOptions" id="pickupRadio2" value="option2"> 희망안함
                                    </label>
                                      <p><br>픽업 희망시 추가비용이 발생합니다.</p>

                                </div>
                            </div>
                            <div class="row mar_ned">
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"><stong>투어 신청</stong></p>
                                </div>
                                <div class="col-md-8 col-xs-9">
                                    <select name="highest_qualification" id="highest_qualification" class="dropselectsec">
                                        <option value="">희망하는 투어를 선택하세요.(중복선택시 주인장에게 문의바람)</option>
                                        <option value="1">런던 야경 투어(50,000원)</option>
                                        <option value="2">런던 근교 투어(80,000원)</option>
                                        <option value="3">런던 축구 경기장 투어_티켓포함(100,000원)</option>
                                        <option value="4">투어 희망 안함</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mar_ned">
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"><stong>특이사항</stong></p>
                                </div>
                                <div class="col-md-8 col-xs-9">
                                    <input type="text" name="specialization" id="specialization" placeholder="하시고 싶은 말씀이나 특이사항 있으면 적어주세요." class="dropselectsec" autocomplete="off">
                                </div>
                            </div>
                            <div class="row mar_ned">
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">이전</button></li>
                            <li><button type="button" class="btn btn-primary next-step">저장 및 다음</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <div class="step33">
                        <h5><strong>Basic Details</strong></h5>
                        <hr>
                            <div class="row mar_ned">

                            </div>

                            <div class="row mar_ned">
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"><stong>결제방법 선택</stong></p>
                                </div>
                                <div class="col-md-8 col-xs-9">
                                    <label class="radio-inline">
                                      <input type="radio" name="payRadioOptions" id="payRadio1" value="option1" onclick="Radio_OnOff('Radio_On');" checked/> 무통장
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="payRadioOptions" id="payRadio2" value="option2" onclick="Radio_OnOff('Radio_Off');"> 신용/체크 카드
                                    </label>
                                </div>
                                <div >
                                </div>
                            </div>
                            <div id="Radio_On" style="display:none" class="row mar_ned">
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"></p>
                                </div>
                                <p>무통장 입금입니다.</p>
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"><stong>입금자명 </stong></p>
                                </div>
                                <div class="col-md-8 col-xs-9">
                                    <input type="text" name="specialization" id="specialization" placeholder="입금하시는 분의 통장 이름을 적어주세요." class="dropselectsec" autocomplete="off">
                                </div>
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"><stong>입금 은행</stong></p>
                                </div>
                                <div class="col-md-8 col-xs-9">
                                    <select name="highest_qualification" id="highest_qualification" class="dropselectsec">
                                        <option value="">편하신 은행을 선택해주세요.</option>
                                        <option value="1">부산은행(123-123123-123) 예금주:김인섭</option>
                                        <option value="2">우리은행(456-456456-456) 예금주:김인섭</option>
                                        <option value="3">국민은행(789-789789-789) 예금주:김인섭</option>
                                    </select>
                                </div>
                            </div>
                            <div id="Radio_Off" style="display:none" class="row mar_ned">
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"></p>
                                </div>
                                <p>카드결제 입니다.</p>
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"><stong>카드명의인 </stong></p>
                                </div>
                                <div class="col-md-8 col-xs-9">
                                    <input type="text" name="specialization" id="specialization" placeholder="카드 명의 입력 ex)Inseop Kim." class="dropselectsec" autocomplete="off">
                                </div>
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"><stong>이용카드사</stong></p>
                                </div>
                                <div class="col-md-8 col-xs-9">
                                    <select name="highest_qualification" id="highest_qualification" class="dropselectsec">
                                        <option value="">카드 종류를 선택해주세요.</option>
                                        <option value="1">MASTER</option>
                                        <option value="2">VISA</option>
                                        <option value="3">AMERICAN EXPRESS</option>
                                    </select>
                                </div>
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"><stong>카드 유통기한</stong></p>
                                </div>
                                <div class="col-md-8 col-xs-9">
                                    <div class="row">
                                        <div class="col-md-4 col-xs-4 wdth">
                                            <select name="visa_status" id="visa_status" class="dropselectsec1">
                                                <option value="">월</option>
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                                <option value="5">05</option>
                                                <option value="6">06</option>
                                                <option value="7">07</option>
                                                <option value="8">08</option>
                                                <option value="9">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-xs-4 wdth">
                                            <select name="visa_status" id="visa_status" class="dropselectsec1">
                                                <option value="">년</option>
                                                <option value="1">2012</option>
                                                <option value="2">2013</option>
                                                <option value="3">2014</option>
                                                <option value="4">2015</option>
                                                <option value="5">2016</option>
                                                <option value="6">2017</option>
                                                <option value="7">2018</option>
                                                <option value="8">2019</option>
                                                <option value="9">2020</option>
                                                <option value="10">2021</option>
                                                <option value="11">2022</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mar_ned">
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">이전</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">최종확인</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <div class="step44">
                            <h5>예약이 완료 되었습니다.<br>기록해주신 이메일과 휴대폰을 통해서 자세한 예약 정보를 보내드리도록 하겠습니다.<br>러블리 하우스를 이용해 주셔서 감사합니다.</h5>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
   </div>
</div>
</body>

    <script>
    function Radio_OnOff(id){
      if(id=="Radio_On") {
        document.all["Radio_On"].style.display='';
        document.all["Radio_Off"].style.display='none';

      } else {
        document.all["Radio_On"].style.display='none';
        document.all["Radio_Off"].style.display='';
      }
    }

    function check_onclick() {
      theForm=document.step1;
        if(theForm.userName.value=="") {
          alert("예약자 성함란이 비어있습니다. 확인해주세요.");
          return theForm.userName.focus();
        }
    }


    </script>
