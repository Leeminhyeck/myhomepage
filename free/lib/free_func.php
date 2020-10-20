<?php
function free_delete($id1,$num1,$page1,$page){
  $message="";
  $delete = 'delete';
  if($_SESSION['userid']=="admin"||$_SESSION['userid']==$id1){
    $message='<form style="display:inline" action="'.$page1.'?mode=delete&page='.$page.'" method="post">
    <input type="hidden" name="num" value="'.$num1.'">
    <input type="hidden" name="mode" value="'.$delete.'">
    <input type="hidden" name="action" value="'.$page1.'">
    <input type="hidden" name="page" value="'.$page.'">
    <input type="submit" value="삭제">
    </form>';
  }
  return $message;
}

function free_ripple_delete($id1,$num1,$page1,$page,$hit,$parent){
  $message="";
  $mode='delete_ripple';
  if($_SESSION['userid']=="admin"||$_SESSION['userid']==$id1){
    $message='<form style="display:inline" action="'.$page1.'?mode=delete_ripple&page='.$page.'&hit='.$hit.'" method="post">
    <input type="hidden" name="num" value="'.$num1.'">
    <input type="hidden" name="action" value="'.$page1.'">
    <input type="hidden" name="mode" value="'.$mode.'">
    <input type="hidden" name="page" value="'.$page.'">
    <input type="hidden" name="hit" value="'.$hit.'">
    <input type="hidden" name="parent" value="'.$parent.'">
    <input type="submit" value="삭제">
    </form>';
  }
  return $message;
}

?>

<!-- if($_SESSION['userid']=="admin"||$_SESSION['userid']==$ripple_id){
  echo ('<form action="delete_ripple.php" method="post">
    <input type="hidden" name="num" value="'.$ripple_num.'">
    <input type="submit" value="삭제">
    </form>'); -->

    <!-- if($_SESSION['userid']=="admin"||$_SESSION['userid']==$memo_id){
      echo ('<form action="delete.php" method="post">
        <input type="hidden" name="num" value="'.$memo_num.'">
        <input type="submit" value="삭제">
        </form>');
    } -->
