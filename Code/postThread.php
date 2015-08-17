<?php
session_start();
$db = @mysql_connect('localhost','root','');
mysql_select_db('eim',$db);
if(isset($_GET['post'])) {
    if(is_numeric($_SESSION['user_id']) AND !empty($_POST['thread']) AND !empty($_POST['title']) ) {
        $q = mysql_query("SELECT * FROM `threads` WHERE `title` = '" . $_POST['title'] . "'");
        $existence = mysql_fetch_array($q);
        if ( mysql_num_rows($q) < 1 ) {
            $ins = mysql_query("INSERT INTO `threads` SET `title` = '" . $_POST['title'] . "' , `post` = '" . $_POST['thread'] . "', `author` = '" . $_SESSION['user_id'] . "'");
            echo"thread created. <a href='thread.php?id=" . mysql_insert_id($db) . "'>View thread</a>";exit;
        } else {
            echo "thread already exists <a href='postThread.php'>Go back</a>";exit;
        }
    } else {
        echo "Invalid thread try again <a href='postThread.php'>Go back</a>";exit;
    }
}
?>
<form action="postThread.php?post" method="post">
    Title: <input type="text" name='title'>
    <br/>
    Post: <textarea name="thread"></textarea>
    <br>
    <input type="submit">
</form>

<a href="index.php">Main page</a>