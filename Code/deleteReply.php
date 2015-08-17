<?php
session_start();
$db = @mysql_connect('localhost','root','');
mysql_select_db('eim',$db);
if ( $_SESSION['role'] == "admin" ) {
    $q = mysql_query("SELECT * FROM `replies` WHERE `id` = '" . $_GET['id'] . "'");
} else {
    $q = mysql_query("SELECT * FROM `replies` WHERE `id` = '" . $_GET['id'] . "' AND `author` = '" . $_SESSION['user_id'] . "'");
}
if(isset($_GET['id'])) {
    if(is_numeric($_SESSION['user_id']) AND is_numeric($_GET['id']) ) {
        $existence = mysql_fetch_array($q);
        if ( mysql_num_rows($q) > 0 ) {
            $ins = mysql_query("DELETE FROM `replies` WHERE `id` = '" . $existence['id'] . "'");
            echo"reply deleted. <a href='thread.php?id=" . $existence['thread_id'] . "'>Go back to thread</a>";exit;
        } else {
            echo "Error occured while deleting reply. check privileges <a href='thread.php?id=" . $existence['thread_id'] . "'>Go back to thread</a>";exit;
        }
    } else {
        echo "Invalid reply try again <a href='index.php'>Go back</a>";exit;
    }
}
?>