<?php
session_start();    //클라이언트의 정보를 서버에 저장하는 것을 session 이라한다.
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["username"])) $username = $_SESSION["username"];
else $username = "";
if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
else $userlevel = "";
if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
else $userpoint = "";
?>
<div id="top"> 
    <h3>
        <a href="http://<?=$_SERVER['HTTP_HOST']?>/myhome/index.php">이민혁 개인 프로젝트</a>
    </h3>
    <ul id="top_menu">
        <?php
        if (!$userid) {
        ?>
            <li><a href="http://<?=$_SERVER['HTTP_HOST']?>/myhome/member_form.php">회원 가입</a> </li>
            <li> | </li>
            <li><a href="http://<?=$_SERVER['HTTP_HOST']?>/myhome/login_form.php">로그인</a></li>
        <?php
        } else {
            $logged = $username . "(" . $userid . ")님[Level:" . $userlevel . ", Point:" . $userpoint . "]";
        ?>
            <li><?= $logged ?> </li>
            <li> | </li>
            <li><a href="http://<?=$_SERVER['HTTP_HOST']?>/myhome/logout.php">로그아웃</a> </li>
            <li> | </li>
            <li><a href="http://<?=$_SERVER['HTTP_HOST']?>/myhome/member_modify_form.php">정보 수정</a></li>
            <li> | </li>
            <li><a href="http://<?=$_SERVER['HTTP_HOST']?>/myhome/member_delete.php">회원 탈퇴</a></li>
        <?php
        }
        ?>
        <?php
        if ($userlevel == 1) {
        ?>
            <li> | </li>
            <li><a href="http://<?=$_SERVER['HTTP_HOST']?>/myhome/admin/admin.php">관리자 모드</a></li>
        <?php
        }
        ?>
    </ul>
</div>
<div id="menu_bar">
    <ul>
        <li><a href="http://<?=$_SERVER['HTTP_HOST']?>/myhome/index.php">HOME</a></li>
        
        <li><a href="http://<?=$_SERVER['HTTP_HOST']?>/myhome/memo/message_form.php">쪽지 보내기</a></li>
        <li><a href="http://<?=$_SERVER['HTTP_HOST']?>/myhome/board/board_form.php">자유 게시판</a></li>
        <li><a href="http://<?=$_SERVER['HTTP_HOST']?>/myhome/free/write_edit_form.php">고객 센터</a></li>
    </ul>
</div>

<div class="slideshow">

            <!--사진 슬라이드-->
            <div class="slideshow_slides">

                <a href="#">
                    <img src="http://<?=$_SERVER['HTTP_HOST']?>/myhome/img/slide-1.jpg" alt="slide1">
                </a>
                
                <a href="#">
                    <img src="http://<?=$_SERVER['HTTP_HOST']?>/myhome/img/slide-2.jpg" alt="slide2">         
                </a>

                <a href="#">
                    <img src="http://<?=$_SERVER['HTTP_HOST']?>/myhome/img/slide-3.jpg" alt="slide3">
                </a>

                <a href="#">
                    <img src="http://<?=$_SERVER['HTTP_HOST']?>/myhome/img/slide-4.jpg" alt="slide4">
                </a>
            </div>

            <!--인디케이터-->
            <div class="slideshow_indicator">
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
            </div>
            
        </div>