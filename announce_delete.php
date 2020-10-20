<?php

    $num   = $_GET["num"];
    $page   = $_GET["page"];

    include_once $_SERVER['DOCUMENT_ROOT']."/myhome/db/db_connector.php";
    $sql = "select * from announce where num = $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $copied_name = $row["file_copied"];

	if ($copied_name)
	{
		$file_path = "./data/".$copied_name;
		unlink($file_path);
    }

    $sql = "delete from announce where num = $num";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'index.php?page=$page';
	     </script>
	   ";
?>

