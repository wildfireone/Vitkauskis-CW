<?php
session_start();
$db = @mysql_connect('localhost','root','');
mysql_select_db('eim',$db);
if(isset($_GET['post'])) {
    if(is_numeric($_POST['userid']) AND !empty($_POST['password'])) {
        $q = mysql_query("SELECT * FROM `user` WHERE `user_id` = '" . $_POST['userid'] . "' AND `password` = '" . $_POST['password'] . "'");
        $existence = mysql_fetch_array($q);
        if ( mysql_num_rows($q) > 0 ) {
            $_SESSION['user_id'] = $existence['user_id'];
            $_SESSION['password'] = $existence['password'];
            $_SESSION['role'] = $existence['role'];
            echo"successfully signed in <a href='index.php'>Go back</a>";exit;
        } else {
            echo "userID does not exist <a href='login.php''>Go back</a>";exit;
        }
    } else {
        echo "Invalid password or user id <a href='login.php'>Go back</a>";exit;
    }
}
?>
<form action="login.php?post" method="post">
    User id(numbers only)):<input type="text" name='userid'>
    <br/>
    Password: <input type="text" name='password'>
    <br>
    <input type="submit">
</form>

<a href="index.php">Main page</a>