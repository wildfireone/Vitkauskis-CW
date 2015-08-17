<?php
session_start();
$db = @mysql_connect('localhost','root','');
mysql_select_db('eim',$db);
if ( $_SESSION['role'] == "admin" ) {
    $q = mysql_query("SELECT * FROM `threads` WHERE `id` = '" . $_GET['thread_id'] . "'");
} else {
    $q = mysql_query("SELECT * FROM `threads` WHERE `id` = '" . $_GET['thread_id'] . "' AND `author` = '" . $_SESSION['user_id'] . "'");
}
if(isset($_GET['thread_id'])) {
    if(is_numeric($_SESSION['user_id']) AND is_numeric($_GET['thread_id']) ) {
        $existence = mysql_fetch_array($q);
        if ( mysql_num_rows($q) > 0 ) {
            $ins = mysql_query("DELETE FROM `threads` WHERE `id` = '" . $existence['id'] . "'");
            echo"thread deleted. <a href='index.php'>Main page</a>";exit;
        } else {
            echo "Error occured while deleting thread. check privileges <a href='thread.php?id=" . $existence['id'] . "'>Go back</a>";exit;
        }
    } else {
        echo "Invalid thread try again <a href='thread.php?id=" . $_GET['thread_id'] . "'>Go back</a>";exit;
    }
}
?>