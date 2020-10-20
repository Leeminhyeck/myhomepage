<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>이민혁 개인프로젝트</title>
    <link rel="stylesheet" type="text/css" href="http://<?=$_SERVER['HTTP_HOST']?>/myhome/css/common.css">
    <link rel="stylesheet" type="text/css" href="http://<?=$_SERVER['HTTP_HOST']?>/myhome/css/main.css">
    <script src="http://<?=$_SERVER['HTTP_HOST']?>/myhome/js/vendor/jquery-1.10.2.min.js"></script>
    <script src="http://<?=$_SERVER['HTTP_HOST']?>/myhome/js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://<?=$_SERVER['HTTP_HOST']?>/myhome/board/css/board.css">
    <script src="http://<?=$_SERVER['HTTP_HOST']?>/myhome/js/main.js"></script>
</head>

<body>
    <header>
        <?php include "./header.php"; ?>
    </header>
    <section>
        <?php include "./main.php"; ?>
    </section>
    <section>
        <?php include "./announce.php";?>
    </section>
    <footer>
        <?php include "./footer.php"; ?>
    </footer>
</body>

</html>