<?php
    include_once "./db/db_connector.php";

    $id   = $_POST["id"];
    $pass = $_POST["pass"];

    // $con = mysqli_connect("localhost", "root", "?z159357z", "sample");
    $sql = "select * from members where id='$id'";
    $result = mysqli_query($con, $sql);

   $num_match = mysqli_num_rows($result); //$result 의 레코드 갯수

   if(!$num_match) 
   {
     echo("
           <script>
             window.alert('등록되지 않은 아이디입니다!')
             history.go(-1)
           </script>
         ");
    }
    else
    {
        $row = mysqli_fetch_array($result);
        $db_pass = $row["pass"];

        mysqli_close($con);

        if($pass != $db_pass)
        {

           echo("
              <script>
                window.alert('비밀번호가 틀립니다!')
                history.go(-1)
              </script>
           ");
           exit;
        }
        else
        {
            session_start();
            $_SESSION["userid"] = $row["id"];
            $_SESSION["username"] = $row["name"];
            $_SESSION["userlevel"] = $row["level"];
            $_SESSION["userpoint"] = $row["point"];

            echo("
              <script>
                location.href = 'index.php';
              </script>
            ");
        }
     }        
?>
