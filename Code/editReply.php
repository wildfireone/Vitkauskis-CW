<?php
session_start();
$db = @mysql_connect('localhost','root','');
mysql_select_db('eim',$db);
if ( $_SESSION['role'] == "admin" ) {
    $q = mysql_query("SELECT * FROM `replies` WHERE `id` = '" . $_GET['id'] . "'");
} else {
    $q = mysql_query("SELECT * FROM `replies` WHERE `id` = '" . $_GET['id'] . "' AND `author` = '" . $_SESSION['user_id'] . "'");
}
if(isset($_GET['post'])) {
    if(is_numeric($_SESSION['user_id']) AND !empty($_POST['reply'])  AND is_numeric($_GET['id']) ) {
        $existence = mysql_fetch_array($q);
        if ( mysql_num_rows($q) > 0 ) {
            $ins = mysql_query("UPDATE `replies` SET `reply` = '" . $_POST['reply'] . "' WHERE `id` = '" . $existence['id'] . "'");
            echo"reply updated. <a href='thread.php?id=" . $existence['thread_id'] . "'>Go back to thread</a>";exit;
        } else {
            echo "Error occured while updating reply. check privileges <a href='thread.php?id=" . $existence['id'] . "'>Go to thread back</a>";exit;
        }
    } else {
        echo "Invalid reply try again <a href='editReply.php?id=" . $_GET['id'] . "'>Go back</a>";exit;
    }
}

$reply = mysql_fetch_array($q);
?>
<form action="editReply.php?post&id=<?=$reply['id']?>" method="post">
    Post: <textarea name="reply"><?=$reply['reply']?></textarea>
    <br>
    <input type="submit">
</form>
<a href="thread.php?id=<?=$reply['thread_id']?>">Go back to thread</a>
<br>
<a href="index.php">Main page</a>