<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>이민혁 개인프로젝트</title>
<link rel="stylesheet" type="text/css" href="http://<?=$_SERVER['HTTP_HOST']?>/myhome/css/common.css">
<link rel="stylesheet" type="text/css" href="http://<?=$_SERVER['HTTP_HOST']?>/myhome/board/css/board.css">
<script src="http://<?=$_SERVER['HTTP_HOST']?>/myhome/js/vendor/jquery-1.10.2.min.js"></script>
<script src="http://<?=$_SERVER['HTTP_HOST']?>/myhome/js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
<script src="http://<?=$_SERVER['HTTP_HOST']?>/myhome/board/js/board.js"></script>
</head>
<body> 
<header>
<?php include $_SERVER['DOCUMENT_ROOT']."/myhome/header.php";?>
</header>  
<section>
	
   	<div id="board_box">
	    <h3 id="board_title">
	    		게시판 > 글 쓰기
		</h3>
<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/myhome/db/db_connector.php";
	$num  = $_GET["num"];
	$page = $_GET["page"];
	
	$sql = "select * from board where num=$num";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$id       = $row["id"];
	$name       = $row["name"];
	$subject    = $row["subject"];
	$content    = $row["content"];		
	$file_name  = $row["file_name"];

	if(!isset($_SESSION["userid"])||($_SESSION["userid"] !== "admin"&&$_SESSION["userid"] !==$id)){
        mysqli_close($con);
        alert_back("수정권한이 없습니다.");
    }
?>
		<form  name="board_form" method="post" action="board_dml.php" enctype="multipart/form-data">
		<input type="hidden" name="mode" value="modify">
	    	 <ul id="board_form">
				<li>
					<input type="hidden" name="num" value="<?=$num?>">
					<input type="hidden" name="page" value="<?=$page?>">
					<span class="col1">이름 : </span>
					<span class="col2"><?=$name?></span>
				</li>		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text" value="<?=$subject?>"></span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"><?=$content?></textarea>
	    			</span>
	    		</li>
	    		<li>
					<span class="col1"> 첨부 파일 : </span>
					<span class="col2"><input type="file" name="newfile"></span>
					<span class="col2"><?=$file_name?></span>
				</li>
				<li>
					<span>기존 파일 삭제하기<input type="checkbox" name="check" value="true"></span>
				</li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">수정하기</button></li>
				<li><button type="button" onclick="location.href='board_list.php'">목록</button></li>
			</ul>
	    </form>
	</div> <!-- board_box -->
</section> 
<footer>
<?php include $_SERVER['DOCUMENT_ROOT']."/myhome/footer.php";?>
</footer>
</body>
</html>
