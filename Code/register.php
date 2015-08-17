<?php
$db = @mysql_connect('localhost','root','');
mysql_select_db('eim',$db);
if(isset($_GET['post'])) {
    if(is_numeric($_POST['userid']) AND !empty($_POST['password'])) {
        $q = mysql_query("SELECT * FROM `user` WHERE `user_id` = '" . $_POST['userid'] . "'");
        $existence = mysql_fetch_row($q);
        if ( mysql_num_rows($q) < 1 ) {
            mysql_query("INSERT INTO `user` SET `user_id` = '" . $_POST['userid'] . "' , `password` = '" . $_POST['password'] . "'");
            echo"successfully registered <a href='index.php'>Go back</a>";exit;
        } else {
            echo "userID already exists<a href='register.php'>Go back</a>";exit;
        }
    } else {
        echo "Invalid password or user id <a href='register.php'>Go back</a>";exit;
    }
}
?>
<form action="register.php?post" method="post">
    User id(numbers only)):<input type="text" name='userid'>
    <br/>
    Password: <input type="text" name='password'>
    <br>
    <input type="submit">
</form>

<a href="index.php">Main page</a>