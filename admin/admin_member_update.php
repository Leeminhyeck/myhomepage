<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT']."/myhome/db/db_connector.php";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";

    if ( $_SESSION["userlevel"] != 1 &&isset($_SESSION["userlevel"]))
    {
        alert_back("삭제권한이 없습니다");
    }

    $num   = $_POST["num"];
    $level = $_POST["level"];
    $point = $_POST["point"];

    $sql = "update members set level=$level, point=$point where num=$num";
    mysqli_query($con, $sql);

    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'admin.php';
	     </script>
	   ";
?>

