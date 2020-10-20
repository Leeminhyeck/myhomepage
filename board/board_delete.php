<?php
    session_start();
    $num   = $_GET["num"];
    $page   = $_GET["page"];
    
    if(isset($_SESSION["userid"])||isset($_SESSION["userid"]) !== "admin"&&$_SESSION["userid"] !==$id){
      mysqli_close($con);
      alert_back("삭제권한이 없습니다.");
    }
    include_once $_SERVER['DOCUMENT_ROOT']."/myhome/db/db_connector.php";
    $sql = "select * from board where num = $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $copied_name = $row["file_copied"];
    $id = $row["id"];



  //해당된 파일을 찾아서 삭제처리
	if ($copied_name)
	{
		$file_path = "./data/".$copied_name;
		unlink($file_path);
    }

    $sql = "delete from board where num = $num";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'board_list.php?page=$page';
	     </script>
	   ";
?>