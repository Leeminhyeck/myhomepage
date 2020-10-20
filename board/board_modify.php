<?php
    session_start();
    $num = $_POST["num"];
    $page = $_POST["page"];

    $subject = $_POST["subject"];
    $content = $_POST["content"];
    $check = $_POST["check"];
    
    include_once $_SERVER['DOCUMENT_ROOT']."/myhome/db/db_connector.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/myhome/db/create_table.php";
    
    if(!isset($_SESSION["userid"]) || ($_SESSION["userid"] !== "admin"&&$_SESSION["userid"] !==$id)){
        mysqli_close($con);
        alert_back("수정권한이 없습니다.");
    }
    $regist_day = date("Y-m-d (H:i)");
    $upload_dir = "./data/";
    
    //파일 삭제 
    if($check == "true"){
        $sql = "select * from board where num = $num";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $copied_name = $row["file_copied"];
        if ($copied_name)
        {
            $file_path = "./data/".$copied_name;
            unlink($file_path);
        }
    }        
        
    // create_table($con, "board");

    
    $upfile_name	 = $_FILES["newfile"]["name"];
	$upfile_tmp_name = $_FILES["newfile"]["tmp_name"];
    $upfile_type     = $_FILES["newfile"]["type"];
    $upfile_size     = $_FILES["newfile"]["size"];
    $upfile_error    = $_FILES["newfile"]["error"];

    
if((isset($_POST["check"])&& $_POST["check"] =="true")||($upfile_name && !$upfile_error)){
    if ($upfile_name && !$upfile_error)
	{
		$file = explode(".", $upfile_name);
		$file_name = $file[0];
		$file_ext  = $file[1];

		$new_file_name = date("Y_m_d_H_i_s");
		$new_file_name = $new_file_name."_".$file_name;
		$copied_file_name = $new_file_name.".".$file_ext;      
		$uploaded_file = $upload_dir.$copied_file_name;

		if( $upfile_size  > 1000000 ) {
				echo("
				<script>
				alert('업로드 파일 크기가 지정된 용량(1MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
				history.go(-1)
				</script>
				");
				exit;
		}

		if (!move_uploaded_file($upfile_tmp_name, $uploaded_file) )
		{
				echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");
				exit;
		}
	}
	else 
	{
		$upfile_name      = "";
		$upfile_type      = "";
		$copied_file_name = "";
	}
    
    
    
    
    $sql = "update board set subject='$subject', content='$content', regist_day = '$regist_day', file_name = '$upfile_name', file_type = '$upfile_type', file_copied = '$copied_file_name'";
    $sql .= " where num=$num";
}else{
    $sql = "update board set subject='$subject', content='$content', regist_day = '$regist_day";
    $sql .= " where num=$num";
}
    
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	      <script>
	          location.href = 'board_list.php?page=$page';
	      </script>
      ";
    ?>

   
