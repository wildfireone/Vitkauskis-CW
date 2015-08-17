<?php
session_start();
$db = @mysql_connect('localhost','root','');
mysql_select_db('eim',$db);
if ( $_SESSION['role'] == "admin" ) {
    $q = mysql_query("SELECT * FROM `threads` WHERE `id` = '" . $_GET['thread_id'] . "'");
} else {
    $q = mysql_query("SELECT * FROM `threads` WHERE `id` = '" . $_GET['thread_id'] . "' AND `author` = '" . $_SESSION['user_id'] . "'");
}
if(isset($_GET['post'])) {
    if(is_numeric($_SESSION['user_id']) AND !empty($_POST['thread']) AND !empty($_POST['title']) AND is_numeric($_GET['thread_id']) ) {
        $existence = mysql_fetch_array($q);
        if ( mysql_num_rows($q) > 0 ) {
            $ins = mysql_query("UPDATE `threads` SET `title` = '" . $_POST['title'] . "' , `post` = '" . $_POST['thread'] . "' WHERE `id` = '" . $existence['id'] . "'");
            echo"thread updated. <a href='thread.php?id=" . $existence['id'] . "'>View thread</a>";exit;
        } else {
            echo "Error occured while updating thread. check privileges <a href='thread.php?id=" . $existence['id'] . "'>Go back</a>";exit;
        }
    } else {
        echo "Invalid thread try again <a href='editThread.php?thread_id=" . $_GET['thread_id'] . "'>Go back</a>";exit;
    }
}

$thread = mysql_fetch_array($q);
?>
<form action="editThread.php?post&thread_id=<?=$thread['id']?>" method="post">
    Title: <input type="text" name='title' value="<?=$thread['title']?>">
    <br/>
    Post: <textarea name="thread"><?=$thread['post']?></textarea>
    <br>
    <input type="submit">
</form>
<a href="thread.php?id=<?=$thread['id']?>">Go back</a>
<br>
<a href="index.php">Main page</a>