<?php
session_start();
$db = @mysql_connect('localhost','root','');
mysql_select_db('eim',$db);
if(isset($_GET['post'])) {
    if(is_numeric($_SESSION['user_id']) AND !empty($_POST['thread_id']) ) {
        $q = mysql_query("SELECT * FROM `threads` WHERE `id` = '" . $_POST['thread_id'] . "'");
        $existence = mysql_fetch_row($q);
        if ( mysql_num_rows($q) > 0 ) {
            $ins = mysql_query("INSERT INTO `replies` SET `thread_id` = '" . $_POST['thread_id'] . "' , `reply` = '" . $_POST['reply'] . "', `author` = '" . $_SESSION['user_id'] . "'");
            echo"replied. <a href='thread.php?id=" . $_POST['thread_id'] . "'>Go back to thread</a>";exit;
        } else {
            echo "thread does not exist <a href='index.php'>Go back</a>";exit;
        }
    } else {
        echo "Invalid reply  <a href='reply.php?thread_id=" . $_POST['thread_id'] . "'>Go back</a>";exit;
    }
}
?>
<form action="reply.php?post" method="post">
    <input type="hidden" value="<?=$_GET['thread_id']?>" name="thread_id">
    Post: <textarea name="reply"></textarea>
    <br>
    <input type="submit">
</form>
<a href="thread.php?id=<?=$_GET['thread_id']?>">Go back</a>
<br>
<a href="index.php">Main page</a>