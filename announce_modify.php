<?php
    $num = $_GET["num"];
    $page = $_GET["page"];

    $subject = $_POST["subject"];
    $content = $_POST["content"];
          
    include_once $_SERVER['DOCUMENT_ROOT']."/myhome/db/db_connector.php";
    $sql = "update announce set subject='$subject', content='$content' ";
    $sql .= " where num=$num";
    mysqli_query($con, $sql);

    mysqli_close($con);

    echo "
	      <script>
	          location.href = 'index.php?page=$page';
	      </script>
	  ";
?>

   
