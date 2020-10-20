<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>이민혁 개인프로젝트</title>
<link rel="stylesheet" type="text/css" href="http://<?=$_SERVER['HTTP_HOST']?>/myhome/css/common.css">
<link rel="stylesheet" type="text/css" href="http://<?=$_SERVER['HTTP_HOST']?>/myhome/css/member.css">
<script src="http://<?=$_SERVER['HTTP_HOST']?>/myhome/js/vendor/jquery-1.10.2.min.js"></script>
<script src="http://<?=$_SERVER['HTTP_HOST']?>/myhome/js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
<script src="http://<?=$_SERVER['HTTP_HOST']?>/myhome/js/main.js"></script>

<script type="text/javascript" src="./js/member.js"></script>

</head>
<body> 
	<header>
    	<?php include "header.php";?>
    </header>
    
	<section>
        <div id="main_content">
      		<div id="join_box">
			  
			  <form  name="member_form" method="post" action="member_insert.php">
			    <h2>회원 가입</h2>
					<hr>
			
					<div class="form">
						<ul>
							<li>
								<p for="id">아이디</p>  
							<input type="text" name="id">
							<a href="#"><img src="./img/check_id.gif" 
								onclick="check_id()"></a>
							</li>
							
							<li>
							<p for="password">비밀번호</p>
						<input type="password" name="pass">
							</li>

							<li>
							<p for="password_ck">비밀번호 확인</p>
						<input type="password" name="pass_confirm">
							</li>
							<li>
							<p for="name">이름</p>
						<input type="text" name="name">
							</li>
							<li>
							<p for="e-mail">이메일</p>
						<input type="text" name="email1">@<input type="text" name="email2">
							</li>
							<hr>
							<li>
							<img style="cursor:pointer" src="./img/button_save.gif" onclick="check_input()">&nbsp;
                  			<img id="reset_button" style="cursor:pointer" src="./img/button_reset.gif" onclick="reset_form()">
							</li>
						</ul>
					</div>

			   </form>
			  
        	</div> <!-- join_box -->
        </div> <!-- main_content -->
	</section> 
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>

