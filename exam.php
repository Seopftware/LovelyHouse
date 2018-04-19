<head>
<link rel="stylesheet" type="text/css" href="/S15050/css/jquery_css/smoothness/jquery-ui-1.8.11.custom.css" media="screen" />
<script type="text/javascript" src="/S15050/js/jquery-ui-1.8.11.custom.js"></script>
<script type='text/javascript' src='/S15050/js/jquery.ui.datepicker-ko.js' charset="utf-8"></script>
<script type="text/javascript">

// datepicker은 기본적으로 <input type="text"  value="" id="start_dt" readonly="readonly"/> 처럼 <input type="text">1개가 필수로 보임
// setDefaults() 에서 버튼을 생성하면 <input type="text"  value="" id="start_dt" readonly="readonly"/>옆에 버튼이 생긴다.
// textbox와 버튼 두개 중에 아무거나 눌러도 달력 화면은 뜸
// 버튼을 따로 만들고 싶으면 아래 주석들 참고

 window.onload = function(){

  $('.ui-datepicker-trigger').hide();  // <input type="text"> 박스옆에 버튼이 생기는대 기존의 버튼을 숨김 ( 이 소스에서는 속성이 hidden 처리 )

  $('#imgPicker').bind('click', function(){  // 내가 원하는 위치에 <img>테그로 버튼 만들어서 click() 이벤트 준다.

   $('.ui-datepicker-trigger').trigger('click');  //  <img>테그로 만든 버튼을 클릭하면 기존의 <input type="text">옆의 이미지 버튼 이벤트를 강제로 발생 시킴
  });
 };

// ====================2015 09 10 달력셋팅 START====================
 $(function() {

   $.datepicker.setDefaults({
    changeMonth: true,
    changeYear: true,
    dateFormat: 'yy-mm-dd',
    showButtonPanel: true,
    showOtherMonths: true,
    selectOtherMonths: true,
    showOn: 'button',
    buttonImageOnly: true,
    buttonImage: '/S15050/snsadmin/images/btn_write_cal.gif',  // <input type="text"> 옆에 생성 할 버튼 이미지
    option: $.datepicker.regional['ko'],
    minDate: '-3y',
    maxDate: '+1y',
    currentText: getToday(),
    onSelect: function(dateText, inst){

      $('#startD').val(dateText); // 일자를 클릭하면 하단에 새로 만든 <input type="hidden"> 박스에 선택한 날짜를 넣음
      $('#btn').trigger('click');  // 일자클릭시 강제로 검색 버튼의 이벤트를 발생 시켜서 하단의 <from> 전송
    }
  });

 // hidden 처리된 기존의 <input type="text">테그 꼭!! 필요하다 넣어줘야 함 숨기려면 hidden 해도 됨
  $('#start_dt').datepicker({});

 // 달력화면 위치 설정
  $('.ui-datepicker').css({ "margin-left" : "160px", "margin-top": "0px"});

 });
// ==================== 2015 09 10 달력셋팅 -END- ====================

</script>
</head>
 <body>
  <input type="hidden" class="text_date01" value="" id="start_dt" name="start_dt" readonly="readonly"/> // 기존의 <input type="text">박스와 버튼 부분 ( 이게 꼭 있어야 함 )

  <img src="/S15050/snsadmin/images/btn_write_cal.gif" id="imgPicker" alt="달력보기" style="cursor:pointer;"/>  // 새로만든 달력 버튼

  // 검색버튼 눌렀을대 전송할 폼데이터
  <form action="list.do" name="brdSearch" method="post">
   <input type="hidden" name="type"   value="<c:out value='${boardInfo.TYPE}'/>" title="타입" />
   <input type="hidden" name="category" value="<c:out value='${paramMap.CATEGORY}'/>"  title="카테고리" />
   <input type="hidden" name ="start" id="startD" title="달력날짜"/>
   <input type="text" name="sw" value="<c:out value='${paramMap.SW}'/>" title="검색어" style="width: 386px;" class="text" />
   <input type="image" src="/btn_search01.gif" alt="검색" title="검색" class="image" id="btn"/>
  </form>

 </body>
</html>
