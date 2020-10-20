<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/myhome/db/db_connector.php";

    if(($_SERVER["REQUEST_METHOD"]=="POST")){
        if(!isset($_POST["subject"])){
            alert_back("subject 값을 불러올수 없습니다.");
        }
        if(!isset($_POST["content"])){
            alert_back("content 값을 불러올수 없습니다.");
        }
        if(!isset($_GET["num"])){
            alert_back("num 값을 불러올수 없습니다.");
        }
        $num = $_GET["num"];
        $subject = $_POST["subject"];
        $content = $_POST["content"];
    }else{
        echo ("
			<script>
			alert('Action 방식이 다릅니다! ');
			history.go(-1)
			</script>
            ");
            exit;
    }
    test_input($subject);
    test_input($content);

    $sql = "update message set subject = '{$subject}', content = '{$content}' where num = '{$num}'";
    mysqli_query($con,$sql);

    mysqli_close($con);                // DB 연결 끊기

echo "
	   <script>
	    location.href = 'message_view.php?mode=send&num={$num}';
	   </script>
	";
?>