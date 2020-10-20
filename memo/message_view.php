<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>이민혁 개인프로젝트</title>
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/myhome/css/common.css">
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/myhome/memo/css/message.css">
	<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/myhome/js/vendor/jquery-1.10.2.min.js"></script>
	<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/myhome/js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/myhome/js/main.js"></script>
</head>

<body>
	<header>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/myhome/header.php"; ?>
	</header>
	<section>
		<div id="message_box">
			<h3 class="title">
				<?php
				include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/db/db_connector.php";
				$mode = $_GET["mode"];
				$num  = $_GET["num"];


				$sql = "select * from message where num=$num";
				$result = mysqli_query($con, $sql);

				$row = mysqli_fetch_array($result);
				$send_id    = $row["send_id"];
				$rv_id      = $row["rv_id"];
				$regist_day = $row["regist_day"];
				$subject    = $row["subject"];
				$content    = $row["content"];

				$content = str_replace(" ", "&nbsp;", $content);	//str_replace (1,2)1 을 2로 변경
				$content = str_replace("\n", "<br>", $content);

				if ($mode == "send")
					$result2 = mysqli_query($con, "select name from members where id='$rv_id'");
				else
					$result2 = mysqli_query($con, "select name from members where id='$send_id'");

				$record = mysqli_fetch_array($result2);
				$msg_name = $record["name"];

				if ($mode == "send")
					echo "송신 쪽지함 > 내용보기";
				else
					echo "수신 쪽지함 > 내용보기";
				?>
			</h3>
			<ul id="view_content">
				<li>
					<span class="col1"><b>제목 :</b> <?= $subject ?></span>
					<span class="col2"><?= $msg_name ?> | <?= $regist_day ?></span>
				</li>
				<li>
					<?= $content ?>
				</li>
			</ul>
			<ul class="buttons">
				<li><button onclick="location.href='message_box.php?mode=rv'">수신 쪽지함</button></li>
				<li><button onclick="location.href='message_box.php?mode=send'">송신 쪽지함</button></li>
				<?php
				if ($mode == "rv"){
				?>
				<li><button onclick="location.href='message_response_form.php?num=<?= $num ?>'">답변 쪽지</button></li>
				<?php
				}
				?>
				<?php
				if($mode == "send"){
					?>
					<li><button onclick="location.href='message_modify.php?num=<?= $num ?>&mode=<?= $mode ?>'">수정</button></li>
				<?php
				}
				?>
				<li><button onclick="location.href='message_delete.php?num=<?= $num ?>&mode=<?= $mode ?>'">삭제</button></li>
					
			</ul>
		</div> <!-- message_box -->
	</section>
	<footer>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/myhome/footer.php"; ?>
	</footer>
</body>

</html>